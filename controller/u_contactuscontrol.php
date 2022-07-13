<?php
/*=================================================
Including the libery for the javascript post
=================================================*/
include_once('../controller/autoload.php');
//include_once('../model/connection.php');
//include_once('../model/database.php');
//include_once('../model/validator.php');
//include_once('../model/format.php');
//include_once('../model/mailer.php');
//include_once('../model/contactus.php');

if(isset($_POST['name'])){
	$name = filter_input(INPUT_POST, "name");
	$email = filter_input(INPUT_POST, "email");
	$subject = filter_input(INPUT_POST, "subject");
	$message = filter_input(INPUT_POST, "message");

	$relay = new contactus;

	$relay->setSingleName("name",$name);
	$relay->setLetterEmail($email);
	$relay->setText("subject",$subject);
	$relay->setText("message",$message);

	$result = $relay->sender("meandyou@issuetrend.com");
	if($result =="true"){
		echo"<script>swal('Thanks.','We will get back to you soon.','Success');</script>";
	}
}
?>