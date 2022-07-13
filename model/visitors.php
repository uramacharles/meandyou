<?php
/**
* 
*/
class visitors extends connection{
	use database;
	function __construct(){
		//Creeate the database to track the user's visits
		connection::connecter();
		//creating the table IF it is not already existing
		$this->qu="
			CREATE TABLE IF NOT EXISTS `visitors`(
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `day` int(3),
			  `month` varchar(11),
			  `year` int(5),
			  `count` int(11),
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
		";
		$this->mysqli->query($this->qu);
	}
	public function setnewuser(){
		connection::connecter();
		if($this->isExist( "visitors","id","WHERE day = '".date("d")."' AND month='".date("F")."' AND year='".date("Y")."'" ) >=1){
			
			connection::connecter();
			$num = $this->simpleSelect("visitors",
				array("id","count"),
				"WHERE day = '".date("d")."' AND month='".date("F")."' AND year='".date("Y")."'");
			connection::connecter();
			if($this->updateDatabase("visitors",
				array("day","month","year","count"),
				array(date("d"),date("F"),date("Y"),intval($num[1])+1),
				"WHERE id = '$num[0]'")){
				return true;
			}
		}else{
			connection::connecter();
			if($this->insertToDatabase("visitors",
				array("day","month","year","count"),
				array(date("d"),date("F"),date("Y"),1),"")){
				return true;
			}
		}
	}
	public function movesingleday($type,$counter,$direction){
		if($direction == "up"){
			if($type=="day"){
				return date("d", strtotime("+".$counter." day"));
			}elseif($type=="month"){
				return date("F", strtotime("+".$counter." month"));
			}else{
				return date("Y", strtotime("+".$counter." year"));
			}
		}elseif($direction == "down"){
			if($type=="day"){
				return date("d", strtotime("-".$counter." day"));
			}elseif($type=="month"){
				return date("F", strtotime("-".$counter." month"));
			}else{
				return date("Y", strtotime("-".$counter." year"));
			}
		}
	}
	public function sumdata($data_array){
		return array_sum($data_array);
	}
	public function getTodayVisitors(){
		connection::connecter();
		$this->day = date("d");
		$this->month = date("F");
		$this->year = date("Y");
		return $this->sumdata(
			$this->simpleSelect("visitors",
				array("count"),
				"WHERE day = '".date("d")."' AND month='".date("F")."' AND year='".date("Y")."'" )
		);
	}
	public function getYestVisitors(){
		connection::connecter();
		return $this->sumdata(
			$this->simpleSelect("visitors",
				array("count"),
				"WHERE day = '".$this->movesingleday("day",1,"down")."' AND month='".date("F")."' AND year='".date("Y")."'" )
		);
	}
	public function getTheMonthVisitors(){
		connection::connecter();
		return $this->sumdata(
			$this->simpleSelect("visitors",
				array("count"),
				"WHERE month ='".date("F")."' AND year='".date("Y")."'" )
		);
	}
	public function getLastMonthVisitors(){
		connection::connecter();
		return $this->sumdata(
			$this->simpleSelect("visitors",
			array("count"),
			"WHERE month ='".$this->movesingleday("month",1,"down")."' AND year='".date("Y")."'" )
		);
	}
	public function getTheYearVisitors(){
		connection::connecter();
		return $this->sumdata(
			$this->simpleSelect("visitors",
			array("count"),
			"WHERE year='".date("Y")."'")
		);
	}
	public function getLastYearVisitors(){
		connection::connecter();
		return $this->sumdata(
			$this->simpleSelect("visitors",
				array("count"),
				"WHERE year='".$this->movesingleday("year",1,"down")."'")
		);
	}
	public function getTotalVisitors(){
		connection::connecter();
		return $this->sumdata(
			$this->simpleSelect("visitors",array("count"),"")
		);
	}
}
?>