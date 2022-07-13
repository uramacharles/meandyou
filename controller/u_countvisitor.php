<?php
if(!isset($_SESSION['meandu_usercount'])){
	$visitor = new visitors;
	$ret = $visitor->setnewuser();
	if($ret =="true"){
		$_SESSION["meandu_usercount"] = "1";
	}
}
?>