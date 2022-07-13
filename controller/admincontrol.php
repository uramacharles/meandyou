<?php
$del = new register;
$del->deleteRecovery();
if (isset($_POST['addadmin'])) {
	$name = filter_input(INPUT_POST, "name");
	$username = filter_input(INPUT_POST, "username");
	$password = filter_input(INPUT_POST, "password");
	$ret_password = filter_input(INPUT_POST, "ret_password");
	$description = filter_input(INPUT_POST, "description");
	$phone_number = filter_input(INPUT_POST, "phone_number");
	$level = filter_input(INPUT_POST, "level");
	$email = filter_input(INPUT_POST, "email");
	
	$upload = new register;
	/*===================================
	Update the database
	========================================*/
	$upload->setText("name",$name);
	$upload->setText("username",$username);
	$upload->setText("description",$description);
	$upload->setText("phone_number",$phone_number);
	$upload->setText("level",$level);
	$upload->setText("email",$email);
	$upload->setPassword($password,$ret_password);
	$res = $upload->adadmin();
	if($res == "true"){
		echo "<script>swal('Successful.','New admin added','success');</script>";
	}elseif($res == "false"){
		echo "<script>swal('Not Successful','Please try again','error');</script>";
	}else{
		echo $res;
	}
}
if(isset($_POST['changefirst'])){
	$add = new register;
	$id = filter_input(INPUT_POST, "id");
	$old_password = md5(filter_input(INPUT_POST, "old_password"));
	$new_password = md5(filter_input(INPUT_POST, "new_password"));
	$username = filter_input(INPUT_POST, "username");
	/*===================================
	Chech if the username matches with the password
	========================================*/
	$add->setText("old_password1",$old_password);
	$add->setText("password1",$new_password);
	$add->setText("username1",$username);
	$res = $add->editAdminAccess1($id);
	if($res == "true"){
		echo "<script>swal('Successful.',  'First user password have been changed', 'success');</script>";
	}elseif($res == "false"){
		echo "<script>swal('Not Successful','Please try again','error');</script>";
	}else{
		echo $res;
	}
}
if(isset($_POST['changesecond'])){
	$add = new register;
	$id = filter_input(INPUT_POST, "id");
	$old_password = md5(filter_input(INPUT_POST, "old_password"));
	$new_password = md5(filter_input(INPUT_POST, "new_password"));
	$username = filter_input(INPUT_POST, "username");
	/*===================================
	Chech if the username matches with the password
	========================================*/
	$add->setText("old_password2",$old_password);
	$add->setText("password2",$new_password);
	$add->setText("username2",$username);
	$res = $add->editAdminAccess2($id);
	if($res == "true"){
		echo "<script>swal('Successful.',  'Second user password have been changed', 'success');</script>";
	}elseif($res == "false"){
		echo "<script>swal('Not Successful','Please try again','error');</script>";
	}else{
		echo $res;
	}
}
if(isset($_POST['details'])){
	$add = new register;
	$id = filter_input(INPUT_POST, "id");
	$name = filter_input(INPUT_POST, "name");
	$description = filter_input(INPUT_POST, "description");
	$phone_number = filter_input(INPUT_POST, "phone_number");
	/*===================================
	Update the update information
	========================================*/
	$add->setText("name",$name);
	$add->setText("description",$description);
	$add->setText("phone_number",$phone_number);
	$res = $add->editAdminInfo($id);
	if($res == "true"){
		echo "<script>swal('Successful.',  'Admin infornation have been saved', 'success');</script>";
	}elseif($res == "false"){
		echo "<script>swal('Not Successful','Please try again','error');</script>";
	}else{
		echo $res;
	}
}
if(isset($_POST['changeemail'])){
	$add = new register;
	$id = filter_input(INPUT_POST, "id");
	$email = filter_input(INPUT_POST, "email");
	/*===================================
	Update the update information
	========================================*/
	$add->setText("email",$email);
	$res = $add->editAdminEmail($id);
	if($res == "true"){
		echo "<script>swal('Successful.',  'Recovery email have been updated', 'success');</script>";
	}elseif($res == "false"){
		echo "<script>swal('Not Successful','Please try again','error');</script>";
	}else{
		echo $res;
	}
}
if(isset($_POST['change_level'])){
	$add = new register;
	$id = filter_input(INPUT_POST, "admin_id");
	$level = filter_input(INPUT_POST, "level");
	/*===================================
	Update the update information
	========================================*/
	if($level == "mega_admin"){
		echo "<script>swal('Opps!.',  'Sorry, Only one Mega Admin can be added.', 'error');</script>";
	}else{
		$add->setText("level",$level);
		$res = $add->editAdminLevel($id);
		if($res == "true"){
			echo "<script>swal('Successful.',  'Successful in Changing the level of the Admin', 'success');</script>";
		}elseif($res == "false"){
			echo "<script>swal('Not Successful','Please try again','error');</script>";
		}else{
			echo $res;
		}
	}
}
if(isset($_POST['delete_admin'])){
	$add = new register;
	$id = filter_input(INPUT_POST, "admin_id");
	/*===================================
	Update the update information
	========================================*/

	if($_SESSION["adlevel"] == "mega_admin"){
		$res = $add->deleteAdmin($id);
		if($res == "true"){
			echo "<script>swal('Successful.',  'Successfully deleted the Admin', 'success');</script>";
		}elseif($res == "false"){
			echo "<script>swal('Not Successful','Please try again','error');</script>";
		}else{
			echo $res;
		}
	}else{
		echo "<script>swal('Opps!.',  'Sorry, Only the Mega Admin can delete an Admin.', 'error');</script>";
	}
}
?>