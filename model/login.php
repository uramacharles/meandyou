<?php
class login extends connection{
//////////////////////////////////////////////////////
//////////Using the traits needed for the work
////////////////////////////////////////////////////
	use database,validator;
	function __construct(){
		connection::connecter();
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
	}
	public function adminredirect($username,$password){
		connection::connecter();
		$this->un = $username;
		$this->pa = md5($password);
		$res = $this->isExist("admintable","id","WHERE username1 = '$this->un' AND password1 = '$this->pa'");
		if($res == 1){
			$_SESSION['firstpass'] = "true";
			unset($_SESSION['message']);
			return "true";
		}else{
			return "false";
		}
	}
	public function adminlogin($username,$password){
		connection::connecter();
		$this->un = $username;
		$this->pa = md5($password);
		$this->items = array("id","name");
		$ret = $this->isExist("admintable","id","WHERE username2 = '$this->un' AND password2 = '$this->pa'");
		if($ret == 1){
			$res = $this->simpleSelect("admintable",$this->items,"WHERE username2 = '$this->un' AND password2 = '$this->pa'");
			if($res != "false"){
				$_SESSION['adminId'] = $res[0];
				$_SESSION['admin_name'] = $res[1];
				$_SESSION['state'] = 'Logout';
				unset($_SESSION['trialnum']);
				header('location:adminboard');
			}else{
				return "false";
			}
		}else{
			return "false";
		}
	}
	public function login(){
		connection::connecter();
		$this->rep =$this->getResult();
		if($this->rep == "true"){
			connection::connecter();
			$this->items = array("id","email");
			$res = $this->simpleSelect("register",$this->items,"WHERE username = '$this->username' AND password = '$this->password'");
			if($res != "false"){
				$_SESSION['userId'] = $res[0];
				$_SESSION['state'] = 'Logout';
				$_SESSION['email']= $res[1];
				$_SESSION['trialnum'] = 0;
				header('location:shop.php');
			}else{
				$_SESSION['message']= "<script>swal('Unknown Username or Password');</script>";
				header('location:login');
			}
		}else{
			$_SESSION['message']= "<script>swal('LOGIN FAILED. PLEASE TRY AGAIN');</script>";
			return $this->rep;
		}
	}
	public function logout(){
		connection::connecter();
		session_destroy();
		$_SESSION['state']="Login";
		header('location:index');
	}
	public function tologin(){
		connection::connecter();
		session_destroy();
		$_SESSION['state']="Login";
		header('location:login');
	}
}
?>