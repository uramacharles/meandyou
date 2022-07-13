<?php
if (isset($_POST["delete_post"])) {
	$id = filter_input(INPUT_POST, "post_id");

	$delete = new posts;
	$ret = $delete->deletepost($id);
	if($ret == "true"){
		$_SESSION['message'] = "Post Deleted";
		echo"<script>swal('Successful','Post Deleted.','success');</script>";
	}else{
		$_SESSION['message'] = "Error encountered while processing your request. Please try again. ";
		echo"<script>swal('Opps!','Error encountered while processing your request. Please try again.','error');</script>";
	}
}
if (isset($_POST["delete_comment"])) {
	$id = filter_input(INPUT_POST, "comm_id");
	$delete = new posts;
	$ret = $delete->delete_comment($id);
	if($ret == "true"){
		$_SESSION['message'] = "Comment Deleted";
		echo"<script>swal('Successful','Comment Deleted.','success');</script>";
	}else{
		$_SESSION['message'] = "Error encountered while processing your request. Please try again. ";
		echo"<script>swal('Opps!','Error encountered while processing your request. Please try again.','error');</script>";
	}
}

if(isset($_POST["delete_picture"])){
	$picture_url = filter_input(INPUT_POST, "picture_url");
	$post_id = filter_input(INPUT_POST, "post_id");
	$picture = new posts;
	$ret = $picture->deletepicture($post_id,$picture_url);
	if($ret == "true"){
		$_SESSION['message'] = "Picture Deleted";
		echo"<script>swal('Successful','Picture Deleted.','success');</script>";
	}else{
		$_SESSION['message'] = "Error encountered while processing your request. Please try again. ";
		echo"<script>swal('Opps!','Error encountered while processing your request. Please try again.','error');</script>";
	}
}

if(isset($_POST['editpost'])){
	$add = new posts;
	/*===================================
	Get the details needed Get the category of the product from a check box inserted into an array
	========================================*/
	$post_id = filter_input(INPUT_POST, "post_id");
	$title = filter_input(INPUT_POST, "title");
	$post = filter_input(INPUT_POST, "post");

	$categ = array();
	for($j=0; $j<=$catcount-2;$j+=2){
		$cat = str_replace(" ", "_", $category[$j+1]);
		if(!is_null(filter_input(INPUT_POST, $cat))){
			$categ[] = filter_input(INPUT_POST, $cat);
		}
	}
	/*===================================
	Set the variables to be uploaded
	========================================*/
	$add->setText("title",$title);
	$add->setText("post",$post);
	$add->setCategory($categ);

	$res = $add->editPost($post_id);

	if($res == "true"){
		/*============================================================
			Update the working id and address
		===========================================================*/
		$_SESSION["post_id"] = $post_id;
		$_SESSION["post_address"] = str_replace(" ", "-", $title);

		echo"<script>swal('Successfully Changed');</script>";
	}elseif($res == "false"){
		echo"<script>swal('Please Try Again');</script>";
	}else{
		echo"<script>swal('Opps!',' $res ','warning');</script>";
	}
}

if(isset($_POST['changelandpicture'])){

	$post_id = filter_input(INPUT_POST, "post_id");
	$add = new posts;

	/*===================================
	Create the Folder for the upload.
	========================================*/
	$patharray = array('posts','images');
	$path = $add->createUserDirectory($patharray);
	$imagepath1 = "";
	/*==========================================================================
	For the Picture that will be used as a landing picture..
	============================================================================*/
	$r = $_FILES['post_land_images']['name'];
	if(strlen($r) - stripos($r,'.') == 4){
		$myName1 = $_FILES['post_land_images']['name'];
		$myTemp1 = $_FILES['post_land_images']['tmp_name'];
		$imagepath1 .= $add->uploadfile($myName1,$myTemp1,$path,"0");
	}else{
		if(isset($imagepath1) && !empty($imagepath1) && !is_null($imagepath1)){
			$imagepath1 .= "#../posts/images/defaultpost.jpg";
		}else{
			$imagepath1 = "../posts/images/defaultpost.jpg";
		}
	}
	$res = $add->change_land_image($post_id,$imagepath1);
	if($res == "true"){
		echo"<script>swal('Successfully changed');</script>";
	}elseif($res == "false"){
		echo"<script>swal('Please Try Again');</script>";
	}else{
		echo"<script>swal('Opps!',' $res ','warning');</script>";
	}
}

if(isset($_POST['addotherpicture'])){

	$post_id = filter_input(INPUT_POST, "post_id");
	$add = new posts;

	/*===================================
	Create the Folder for the upload.
	========================================*/
	$patharray = array('posts','images');
	$path = $add->createUserDirectory($patharray);
	$imagepath2 = "";

	/*===================================
	For the post pictures
	========================================*/
	$r2 = $_FILES['post_other_images']['name'][0];

	$count = count($_FILES['post_other_images']['name']);
	if($count >=1){
		if(strlen($r2) - stripos($r2,'.') == 4){
			for($i=0;$i<$count;$i++){
				$myName2 = $_FILES['post_other_images']['name'][$i];
				$myTemp2 = $_FILES['post_other_images']['tmp_name'][$i];
				if($i == 0){
					$imagepath2 .= $add->uploadfile($myName2,$myTemp2,$path,$i);
				}else{
					$imagepath2 .= "#".$add->uploadfile($myName2,$myTemp2,$path,$i);
				}
			}
		}else{
			$imagepath2="";
		}
	}else{
		$imagepath2 = "";
	}
	$res = $add->add_other_image($post_id,$imagepath2);

	if($res == "true"){
		echo"<script>swal('Successfully changed');</script>";
	}elseif($res == "false"){
		echo"<script>swal('Please Try Again');</script>";
	}else{
		echo"<script>swal('Opps!',' $res ','warning');</script>";
	}
}
?>
