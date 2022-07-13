<?php
/**============================================================
This class is focused on working on the products as far as it could
1. check if a product exist
2. add new product to the database
3. 
==============================================================*/
class practicearea extends connection{
/**============================================================
This are the Traits that will be needed for this work
==============================================================*/
	use database, validator,file,format;
/**============================================================
this will create the product table immediately when this class is called for the first time, if the table do not exist.
==============================================================*/
	function __construct(){
		connection::connecter();
		//creating the table IF it is not already existing
		$this->query="
			CREATE TABLE IF NOT EXISTS `practice_area`(
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(200) NOT NULL,
			  `description` text NOT NULL,
			  `imagepath` varchar(250) NOT NULL,
			  `date_updated` varchar(20) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
		";
		$this->mysqli->query($this->query);
	}
	public function practice_Area_Exist($name){
		Connection::connecter();
		$res = $this->isExist("practice_area","id","WHERE name = '$name' ");
		return $res;
	}
	public function addPracticeArea($imagepath){
		Connection::connecter();
		$this->imagepath = $imagepath;
		$this->date = date('F d, Y');
		$existing = $this->practice_Area_Exist($this->name);
		if($existing == "false"){
			$dataname = array("name","description","imagepath","date_updated");
			$datavalues = array($this->name,$this->description,$this->imagepath,$this->date);

			$result = $this->insertToDatabase("practice_area",$dataname,$datavalues,"");
			if($result !="false"){
				return "true";
			}else{
				return "false";
			}
		}else{
			return "<script>swal('Request Not Allowed','Practice Area Name Already Exists','Warning');</script>";
		}
	}
	public function deletePracticeArea($id){
		Connection::connecter();
		$this->id = $id;
		$ret = $this->isExist("practice_area","id","WHERE id = '$this->id'");
		if($ret != "false"){
			$this->item = array("imagepath");
			$res = $this->simpleSelect("practice_area",$this->item,"WHERE id = ".$this->id);
			if($res != "false"){
				unlink($res[0]);
				$result = $this->deleteFromDatabase("practice_area","id",$this->id);
				return $result;
			}else{
				return "<script>swal('Ahh!!!','Please try again','error');</script>";
			}
		}else{
			return"<script>swal('Ahh!!!','Please select a product','error');</script>";	
		}
	}
	public function editPracticeAreaInformation($id){
		Connection::connecter();
		$this->id = $id;
		$this->date = date('F d, Y');
		$dataname = array("name","description","date_updated");
		$datavalues = array($this->name,$this->description,$this->date);
		$result = $this->updateDatabase("practice_area",$dataname,$datavalues,"WHERE id = ".$this->id);
		if($result =="true"){
			return "true";
		}else{
			return "false";
		}
	}
	public function editPixPracticeArea($id,$imagepath){
		Connection::connecter();
		$this->imagepath = $imagepath;
		$this->id = $id;
		$this->date = date('F d, Y');
		$this->items = array("imagepath");
		$res = $this->simpleSelect("practice_area",$this->items,"WHERE id='$this->id'");
		if($res!="false"){
			$this->oldpath = $res[0];
			$this->date = date('F d, Y');
			$dataname = array("imagepath","date_updated");
			$datavalues = array($this->imagepath,$this->date);
			$result = $this->updateDatabase("practice_area",$dataname,$datavalues,"WHERE id = '$this->id'");
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
	public function getSinglePracticeArea($id){
		connection::connecter();
		$this->id = $id;
		$this->items = array("name","description","imagepath","date_updated");
		$res = $this->simpleSelect("practice_area",$this->items,"WHERE id =".$this->id);
		return $res;
	}
	public function getAllPracticeArea(){
		$this->from = $_SESSION['from'];
		$this->page_rows = $_SESSION['page_rows'];
		connection::connecter();
		$this->items = array("id","name","description","imagepath","date_updated");
		$res = $this->simpleSelect("practice_area",$this->items,"ORDER BY id DESC LIMIT $this->from,$this->page_rows");
		return $res;
	}
	public function getOnePracticeArea($id){
		$this->id = $id;
		connection::connecter();
		$this->items = array("id","name","description","imagepath","date_updated");
		$res = $this->simpleSelect("practice_area",$this->items,"WHERE id = '$this->id' ");
		return $res;
	}
	public function fetchLawyers($id){
		$this->id = $id;
		connection::connecter();
		$this->items = array("id","name","position");
		$this->column = "practice_area_id";
		$this->searchitem = array($this->id);
		connection::connecter();
		$res = $this->simpleSearch2("staffs",$this->column,$this->searchitem,$this->items,"AND NOT position = 'paralegals' ORDER BY id DESC ");
		return $res;

	}
	public function getPracticeArea(){
		connection::connecter();
		$this->from = $_SESSION['from'];
		$this->page_rows = $_SESSION['page_rows'];
		$this->items = array("id","name","date_updated");
		$res = $this->simpleSelect("practice_area",$this->items,"ORDER BY id DESC LIMIT $this->from,$this->page_rows");
		return $res;
	}
	public function getIndexPracticeArea(){
		connection::connecter();
		$this->items = array("id","name");
		$res = $this->simpleSelect("practice_area",$this->items,"ORDER BY id DESC");
		return $res;
	}
	public function listPracticeArea(){
		connection::connecter();
		$this->items = array("id","name");
		$res = $this->simpleSelect("practice_area",$this->items,"ORDER BY id DESC");
		return $res;
	}
}
?>