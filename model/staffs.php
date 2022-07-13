<?php
/**
* 
*/
class staffs extends connection{
	use database, validator,file,format;
	function __construct(){
		connection::connecter();
		//creating the table IF it is not already existing
		$this->query="
			CREATE TABLE IF NOT EXISTS `staffs`(
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(200) NOT NULL,
			  `position` varchar(15) NOT NULL,
			  `practice_area_id` varchar(15) NOT NULL,
			  `email` varchar(100) NOT NULL,
			  `phone_number` varchar(60) NOT NULL,
			  `profile` text NOT NULL,
			  `imagepath` varchar(250) NOT NULL,
			  `date_updated` varchar(20) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
		";
		$this->mysqli->query($this->query);
		
	}
	public function setPracticeArea($practice_area){
		$count = count($practice_area);
		$this->practice_area = "";
		for($i=0;$i<$count;$i++){
			if($i == $count-1){
				$this->practice_area .= $practice_area[$i];
			}else{
				$this->practice_area .= $practice_area[$i]." ";
			}
		}
	}
	public function staff_Exist($name){
		Connection::connecter();
		$res = $this->isExist("staffs","id","WHERE name = '$name' ");
		return $res;
	}
	public function addStaff($imagepath){
		Connection::connecter();
		$this->imagepath = $imagepath;
		$this->date = date('F d, Y');
		$existing = $this->staff_Exist($this->name);
		if($existing == "false"){
			$dataname = array("name","position","practice_area_id","email","phone_number","profile","imagepath","date_updated");
			$datavalues = array($this->name,$this->position,$this->practice_area,$this->email,$this->phone_number,$this->profile,$this->imagepath,$this->date);

			$result = $this->insertToDatabase("staffs",$dataname,$datavalues,"");
			if($result !="false"){
				return "true";
			}else{
				return "false";
			}
		}else{
			return "Staff Already Exists";
		}
	}
	public function deletestaff($id){
		Connection::connecter();
		$this->id = $id;
		$ret = $this->isExist("staffs","id","WHERE id = '$this->id'");
		if($ret != "false"){
			$this->item = array("imagepath");
			$res = $this->simpleSelect("staffs",$this->item,"WHERE id = ".$this->id);
			if($res != "false"){
				unlink($res[0]);
				$result = $this->deleteFromDatabase("staffs","id",$this->id);
				return $result;
			}else{
				return "Please try again";
			}
		}else{
			return"Please select a product";	
		}
	}
	public function editStaffInformation($id){
		Connection::connecter();
		$this->id = $id;
		$this->date = date('F d, Y');
		$dataname = array("name","email","position","practice_area_id","phone_number","profile","date_updated");
		$datavalues = array($this->name,$this->email,$this->position,$this->practice_area,$this->phone_number,$this->profile,$this->date);
		$result = $this->updateDatabase("staffs",$dataname,$datavalues,"WHERE id = ".$this->id);
		if($result =="true"){
			return "true";
		}else{
			return "false";
		}
	}
	public function editPixStaff($id,$imagepath){
		Connection::connecter();
		$this->imagepath = $imagepath;
		$this->id = $id;
		$this->date = date('F d, Y');
		$this->items = array("imagepath");
		$res = $this->simpleSelect("staffs",$this->items,"WHERE id='$this->id'");
		if($res!="false"){
			$this->oldpath = $res[0];
			$this->date = date('F d, Y');
			$dataname = array("imagepath","date_updated");
			$datavalues = array($this->imagepath,$this->date);
			$result = $this->updateDatabase("staffs",$dataname,$datavalues,"WHERE id = '$this->id'");
			if($result !="false"){
				unlink($this->oldpath);
				return "true";
			}else{
				return "false";
			}
		}else{
			return "false";
		}
	}
	public function getSingleStaff($id){
		connection::connecter();
		$this->id = $id;
		$this->items = array("id","name","position","practice_area_id","email","phone_number","profile","imagepath","date_updated");
		$res = $this->simpleSelect("staffs",$this->items,"WHERE id =".$this->id);
		return $res;
	}
	public function getStaffs(){
		Connection::connecter();
		$this->from = $_SESSION['from'];
		$this->page_rows = $_SESSION['page_rows'];
		$this->items = array("id","name","imagepath");
		$res = $this->simpleSelect("staffs",$this->items,"ORDER BY id DESC LIMIT $this->from,$this->page_rows");
		return $res;
	}
	public function getStaffsSearch($column,$likeitem){
		$this->from = $_SESSION['from'];
		$this->page_rows = $_SESSION['page_rows'];
		$this->items = array("id","name","imagepath");
		$this->column = $column;
		$this->searchitem = array($likeitem);
		connection::connecter();
		$res = $this->simpleSearch2("staffs",$this->column,$this->searchitem,$this->items,"ORDER BY id DESC LIMIT $this->from,$this->page_rows");
		return $res;

	}

}


?>