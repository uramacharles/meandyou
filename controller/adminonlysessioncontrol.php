<?php
	if(!isset($_SESSION['adminId'])){
		header('location:../admin/index.php');
	}
	if(isset($_SESSION['state'])){
		$state = $_SESSION['state'];
	}else{
		$state="Login";
	}
	if(isset($_POST['Logout'])){
		$log = new Login;
		$log->Logout();
	}
	if(isset($_POST['Login'])){
		$log = new Login;
		$log->tologin();	
	}
?>