<?php
if(isset($_POST["edit_post"])){
	$address = filter_input(INPUT_POST, "post_address");
	$id = filter_input(INPUT_POST, "post_id"); 
	$_SESSION["post_id"] = $id;
	$_SESSION["post_address"] = $address;
	header("location:post.php?by=$id&title=$address");
}
if(isset($_POST["edit_post_redirect"])){
	$address = filter_input(INPUT_POST, "post_title");
	$id = filter_input(INPUT_POST, "post_id"); 
	$_SESSION["post_id"] = $id;
	$_SESSION["post_address"] = $address;
	header("location:post_edit.php?by=$id&title=$address");
}
if(isset($_POST["post_comments"])){
	$id = filter_input(INPUT_POST, "post_id"); 
	$_SESSION["post_id"] = $id;
	header("location:viewcomments.php?post=$id");
}

if(isset($_GET["title"])||isset($_SESSION["post_address"])||isset($_GET["post"])){
	$get_old = new posts;
	if(isset($_GET["title"])){
		$id = intval($_GET["by"]);
		$tit = htmlentities($_GET['title']);
		$single = $get_old->getPostByTitle($tit,$id);
	}elseif(isset($_GET["post"])){
		$id = intval($_GET["post"]);
		$single = $get_old->getPostById($id);
		//Get the comments only when we are in the comment page.
		$addcomm = $get_old->getComments($id,"all");
		$adcomcount = count($addcomm);

	}elseif(isset($_SESSION["post_address"])){
		$id = intval($_SESSION["post_id"]);
		$tit = htmlentities($_SESSION['post_address']);
		$single = $get_old->getPostByTitle($tit,$id);

	}
		//$this->items = array("id","title","titlelink","post","category","source","post_land_image","post_other_image","date_updated");
	if($single != "false"){
		$post_id = $single[0];
		$post_title = $single[1];
		$post_titlelink = $single[2];
		$post_story = $get_old->formatTextareaUrlForAdmin($single[3]);
		$post_category = $get_old->getCategory($single[4]);
		$source = $single[5];
		$post_land_image = $get_old->formatUrlforAdmin($single[6]);
		$post_other_image = explode("#", $single[7]);
		$imgcount = count($post_other_image);
		$post_date_updated = $single[8];
	}
}

?>