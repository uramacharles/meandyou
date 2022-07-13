<?php
if(isset($_POST['addgalary'])){
	$add = new galary;
	/*===================================
	Create the Folder for the upload.
	========================================*/
	$patharray = array('posts','galary');
	$path = $add->createUserDirectory($patharray);
	$imagepath = "";
	/*===================================
	For the Galary pictures
	========================================*/
	$r2 = $_FILES['galary_images']['name'][0];
	$imagepath = "";
	$count = count($_FILES['galary_images']['name']);
	if($count >=1){
		if(strlen($r2) - stripos($r2,'.') == 4){
			for($i=0;$i<$count;$i++){
				$myName2 = $_FILES['galary_images']['name'][$i];
				$myTemp2 = $_FILES['galary_images']['tmp_name'][$i];
				//Upload the picture to the server
				$imagepath = $add->uploadfile($myName2,$myTemp2,$path,$i);
				//save the url to the database
				$res[] = $add->addgalary($imagepath);
			}
		}else{
			$imagepath="";
		}
	}else{
		$imagepath = "";
	}
	if( ! in_array("false", $res)){
		echo"<script>swal('Successfully added');</script>";
	}else{
		echo"<script>swal('We got some interuption on the way.');</script>";
	}
}
if (isset($_POST["delete_galary"])) {
	$id = filter_input(INPUT_POST, "galaryid");
	$delete = new galary;
	$ret = $delete->deletegalary($id);
	if($ret == "true"){
		$_SESSION['message'] = "Successfully removed from the list ";
		echo"<script>swal('Successful','Successfully removed from the list.','success');</script>";
	}else{
		$_SESSION['message'] = "Error encountered while processing your request. Please try again. ";
		echo"<script>swal('Opps!','".$ret."','error');</script>";
	}
}


?>