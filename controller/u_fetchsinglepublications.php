<?php  if(isset($_POST["search"])): ?>

    <?php
        $_SESSION["searchitem"] = filter_input(INPUT_POST, "searchitem");
        $_SESSION['category'] = "search";
        header("location:publications.php");
        //This is to trace the type of publications that will be returned to ease pagination
    ?>
<?php endif; ?>
<?php 
if(isset($_GET["title"])||isset($_SESSION["post_address"])){
	$get_old = new posts;
	if(isset($_GET["title"])){
		$id = intval($_GET["by"]);
		$tit = htmlentities($_GET['title']);
		$single = $get_old->getPostByTitle($tit,$id);
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
		$post_story = $single[3];
		$post_category = $get_old->getUserCategory($single[4]);
		$source = $single[5];
		$post_land_image = $get_old->formatUrl($single[6]);
		$post_other_image = explode("#", $single[7]);
		$imgcount = count($post_other_image);
		$post_date_updated = $single[8];
	}
}else{
	header("location:publications.php");
}

?>