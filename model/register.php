<?php
/**
* This class is used to register the users.
*/
class register extends connection{
//////////////////////////////////////////////////////
//////////Using the traits needed for the work
////////////////////////////////////////////////////
	use database, validator,format,mailer;
	function __construct(){
		connection::connecter();
		//creating the table IF it is not already existing
		$this->date = time();
		$this->chec = time();
		$this->date_exp = $this->date +600;
		//creating the table IF it is not already existing
		$this->query="
			CREATE TABLE IF NOT EXISTS `admintable`(
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(70) NOT NULL,
			  `description` text NOT NULL,
			  `phone_number` varchar(50) NOT NULL,
			  `level` varchar(50) NOT NULL,
			  `username1` varchar(100) NOT NULL,
			  `password1` varchar(100) NOT NULL,
			  `username2` varchar(100) NOT NULL,
			  `password2` varchar(100) NOT NULL,
			  `email` varchar(50) NOT NULL,
			  `date` varchar(20) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
		";
		$this->mysqli->query($this->query);
		//creating the table IF it is not already existing
		connection::connecter();
		$this->query="
			CREATE TABLE IF NOT EXISTS `recovery` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `email` varchar(50) NOT NULL,
			  `recovery_code` varchar(10) NOT NULL,
			  `date` varchar(50) NOT NULL,
			  `date_exp` varchar(50) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
		";
		$this->mysqli->query($this->query);
	}
	public function getlevel(){
		connection::connecter();
		return $this->simpleSelect("adminlevel",array("id","level"),"");
	}
	public function sendCode($code){
		connection::connecter();
		$this->codetosend = $code;
		$subject = "Recovery Code:";
		$from = "The House of Laws";
		$message = "<h1> Kindly type in the following code in the activation page so as to enable you login to your Dashboard.<br/> ".$this->codetosend."</h1>";
		$res = $this->sendMail($subject,$message,$from,$this->email);
		return $res;
	}
	public function sendRecoveryCode(){
		connection::connecter();
		$_SESSION['email'] = $this->email;
		unset($_SESSION['trialnum']);
		$this->date = date('Y-m-d');
		$ret = $this->isExist("admintable","id","WHERE email = '$this->email'");
		if($ret != "false"){
			$ret = $this->isExist("recovery","id","WHERE email = '$this->email'");
			$this->codetosend = rand(1000,9999999999);
			$dataname = array("email","recovery_code","date","date_exp");
			$datavalues = array($this->email,$this->codetosend,$this->date,$this->date_exp);
			if($ret != "false"   ){
				$result = $this->updateDatabase("recovery",$dataname,$datavalues,"");
				$this->sendCode($this->codetosend);
				return "<script>swal('Successful','A recovery code have been sent to your email.','email');</script>";
			}else{
				$result = $this->insertToDatabase("recovery",$dataname,$datavalues,"");
				$this->sendCode($this->codetosend);
				return "<script>swal('Successful','A recovery code have been sent to your email.','email');</script>";
			}
		}else{
			return "<script>swal('Not Successful','The email address supplied is not registered in this site.','error');</script>";
		}
	}
	public function resendRecoveryCode(){
		connection::connecter();
		unset($_SESSION['trialnum']);
		$this->date = date('Y-m-d');
		$this->email = $_SESSION['email'];
		$ret = $this->isExist("admintable","id","WHERE email = '$this->email'");
		if($ret != "false"   ){
			$this->codetosend = rand(1000,9999999999);
			$dataname = array("email","recovery_code","date","date_exp");
			$datavalues = array($this->email,$this->codetosend,$this->date,$this->date_exp);
			$result = $this->updateDatabase("recovery",$dataname,$datavalues,"");
			$this->sendCode($this->codetosend);
			return "<script>swal('Successful','Another recovery code have been sent to your email.','email');</script>";	 
		}else{
			return "<script>swal('Not Successful','The email address supplied is not registered in this site.','error');</script>";
		}
	}
	public function validateRecovery(){
		connection::connecter();
		$this->items = array("recovery_code");
		$this->email = $_SESSION['email'];
		$res = $this->simpleSelect("recovery",$this->items,"WHERE email = '$this->email'");
		$this->sentcode = $res[0];
		if($this->recoverycode == $this->sentcode ){
			$dataname = array("password1","password2");
			$datavalues = array($this->password,$this->password);
			$result = $this->updateDatabase("admintable",$dataname,$datavalues,"WHERE email = '$this->email'");
			if($result != "false" ){
				return "<script>swal('Successful','Successful. You can now login with the new password','success');</script>";
			}else{
				return "<script>swal('Not Successful','Try again','error');</script>";				
			}
		}else{
			return "<script>swal('Not Successful','Wrong recover code','error');</script>";	
		}
	}
	public function adadmin(){
		connection::connecter();
		$this->rep = $this->getResult();
		if($this->rep == "true"){
			$this->username1 = $this->username2 = $this->username;
			$this->password1 = $this->password2 = $this->password;
			$this->date = date('F m, Y');
			connection::connecter();
			$isexist = $this->isExist("admintable","id","WHERE username1 ='$this->username1' OR username2 ='$this->username2'");
			if($isexist != "false"){
				return "<script>swal('Not Successful','User Already Existing','error');</script>";
			}else{
				$dataname = array("name","description","phone_number","level","username1","password1","username2","password2","email","date");
				$datavalues = array($this->name,$this->description,$this->phone_number,$this->level,$this->username1,$this->password1,$this->username2,$this->password2,$this->email,$this->date);
				connection::connecter();
				$result = $this->insertToDatabase("admintable",$dataname,$datavalues,"");
				if($result != "false" ){
					return "true";
				}else{
					return "<script>swal('Not Successful','Try again','error');</script>";				
				}
			}
		}
	}
	public function adminFetchProfile(){
		connection::connecter();
		$this->id = $_SESSION['adminId'];
		$this->items = array("id","name","description","phone_number","level","username1","username2","date","email");
		$res = $this->simpleSelect("admintable",$this->items,"WHERE id = '$this->id'");
		return $res;
	}
	//For Users
	public function adminFetchProfiles(){
		connection::connecter();
		$this->items = array("id","name","description","phone_number","email");
		$res = $this->simpleSelect("admintable",$this->items,"");
		return $res;
	}

	public function super_adminFetchProfiles(){
		connection::connecter();
		$this->items = array("id","name","description","phone_number","level","email");
		$res = $this->simpleSelect("admintable",$this->items,"WHERE NOT level = 'mega_admin'");
		return $res;
	}

	public function mega_adminFetchProfile(){
		connection::connecter();
		$this->items = array("id","name","description","phone_number","level","username1","username2","date","email");
		$res = $this->simpleSelect("admintable",$this->items,"");
		return $res;
	}
	public function editAdminAccess1($id){
		connection::connecter();
		/*======================================================================
		This will edit the admin username and password of the first access
		=========================================================================*/
		$this->id = $id;
		$this->date = date('F d, Y');
		$isexist =$this->isExist("admintable","id","WHERE username1 = '$this->username1' AND password1 = '$this->old_password1'");
		if($isexist != "false"){
			$dataname = array("username1","password1","date");
			$datavalues = array($this->username1,$this->password1,$this->date);
			return $result = $this->updateDatabase("admintable",$dataname,$datavalues,"WHERE id = '$this->id'");
		}else{		
			return "<script>swal('Not Successful','User Already Existing','error');</script>";
		}
	}
	public function editAdminAccess2($id){
		connection::connecter();
		/*======================================================================
		This will edit the admin username and password of the first access
		=========================================================================*/
		$this->id = $id;
		$this->date = date('F d, Y');
		$isexist =$this->isExist("admintable","id","WHERE username2 = '$this->username2' AND password2 = '$this->old_password2'");
		if($isexist != "false"){
			$dataname = array("username2","password2","date");
			$datavalues = array($this->username2,$this->password2,$this->date);
			return $result = $this->updateDatabase("admintable",$dataname,$datavalues,"WHERE id = '$this->id'");
		}else{		
			return "<script>swal('Not Successful','User Already Existing','error');</script>";
		}
	}
	public function editAdminInfo($id){
		connection::connecter();
		/*======================================================================
		This function is also meant to fetch the pix path of a reviewer from his email address
		then insert the path to the database
		=========================================================================*/
		$this->id = $id;
		$this->date = date('F d, Y');
		$dataname = array("name","description","phone_number","date");
		$datavalues = array($this->name,$this->description,$this->phone_number,$this->date);
		return $result = $this->updateDatabase("admintable",$dataname,$datavalues,"WHERE id = '$this->id'");
	}
	public function editAdminEmail($id){
		connection::connecter();
		/*======================================================================
		This function is also meant to fetch the pix path of a reviewer from his email address
		then insert the path to the database
		=========================================================================*/
		$this->id = $id;
		$this->date = date('F d, Y');
		$dataname = array("email","date");
		$datavalues = array($this->email,$this->date);
		$result = $this->updateDatabase("admintable",$dataname,$datavalues,"WHERE id = '$this->id'");
		if($result !="false"){
			return "true";
		}else{
			return "false";
		}
	}
	public function editAdminLevel($id){
		connection::connecter();
		/*======================================================================
		This function is also meant to fetch the pix path of a reviewer from his email address
		then insert the path to the database
		=========================================================================*/
		$this->id = $id;
		$this->date = date('F d, Y');
		$dataname = array("level","date");
		$datavalues = array($this->level,$this->date);
		$result = $this->updateDatabase("admintable",$dataname,$datavalues,"WHERE id = '$this->id'");
		if($result !="false"){
			return "true";
		}else{
			return "false";
		}
	}
	public function deleteAdmin($id){
		connection::connecter();
		$this->id = $id;
		$result = $this->deleteFromDatabase("admintable","id", '$this->id');
		if($result !="false"){
			return "true";
		}else{
			return "false";
		}
	}
	public function deleteRecovery(){
		connection::connecter();
		/*===================================================================
		Delete the activation code from the activation table when the time have expired
		========================================================================*/
		$this->chec = time();
		$this->deleteExpiredFromDatabase("recovery","date_exp",$this->chec);
	}
}
?>