<?php
$header_land_image = "";
if(isset($_GET["title"])||isset($_SESSION["post_address"])){
	$headinfo = new posts;
	if(isset($_GET["title"])){
		$id = intval($_GET["by"]);
		$tit = htmlentities($_GET['title']);
		$metainfo = $headinfo->getPostMetaInfo($tit,$id);
	}elseif(isset($_SESSION["post_address"])){
		$id = intval($_SESSION["post_id"]);
		$tit = htmlentities($_SESSION['post_address']);
		$metainfo = $headinfo->getPostMetaInfo($tit,$id);
	}
		//$this->items = array("id","title","titlelink","post","post_land_image");
	if($metainfo != "false"){
		$header_id = $metainfo[0];
		$header_title = $metainfo[1];
		$header_titlelink = $metainfo[2];
		$header_story = strip_tags($headinfo->truncateHeaderText($metainfo[3]) );
		$header_land_image = $headinfo->formatUrl($metainfo[4]);
	}
}
?>