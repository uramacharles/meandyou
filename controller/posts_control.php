<?php 
if(isset($_POST['addpost'])){
	$add = new posts;
	/*===================================
	Get the details needed Get the category of the product from a check box inserted into an array
	========================================*/
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
	Upload the picture.
	========================================*/

	/*===================================
	Create the Folder for the upload.
	========================================*/
	$patharray = array('posts','images');
	$path = $add->createUserDirectory($patharray);
	$imagepath1 = "";
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
			$imagepath1 .= "#../posts/default/post.jpg";
		}else{
			$imagepath1 = "../posts/default/post.jpg";
		}
	}
	/*===================================
	Set the variables to be uploaded
	========================================*/
	$add->setText("title",$title);
	$add->setText("post",$post);
	$add->setCategory($categ);

	$res = $add->addPost($imagepath1,$imagepath2);

	if($res == "true"){
		echo"<script>swal('Successfully added');</script>";
	}elseif($res == "false"){
		echo"<script>swal('Please Try Again');</script>";
	}else{
		echo"<script>swal('Opps!',' $res ','warning');</script>";
	}

}


?>