<?php
class connection{
	public $username,$pword,$host,$database;public $mysqli;
	function connecter(){
		$this->usern = "uramacharles";
		$this->pword = "uramacopy";
		$this->host = "localhost";
		$this->database = "meandyou";
		$this->mysqli = new mysqli($this->host,$this->usern,$this->pword,$this->database);
	}
	function __distruct(){
		$this->mysqli->close();
	}
}
?>