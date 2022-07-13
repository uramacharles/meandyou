<?php
if(isset($_POST["viewadmins"])){
	$adlevel = filter_input(INPUT_POST, "adlevel");
	$_SESSION["adlevel"] = $adlevel;
	header("location:admins.php");
}
?>