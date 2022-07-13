<?php

if(isset($_POST['jscript'])){
	include_once('../controller/autoload.php');
	include_once('../model/connection.php');
	include_once('../model/database.php');
	include_once('../model/file.php');
	include_once('../model/texteditormodel.php');

	$upload = new texteditormodel;
	$imagepath = "";
	$path = $upload->createUserDirectory( array('uploads','image') );
	//For Picturs
	$r = $_FILES['pictures']['name'][0];
	$count = count($_FILES['pictures']['name']);
	if($count >=1){
		if(strlen($r) - stripos($r,'.') == 4){
			for($i=0;$i<$count;$i++){
				$myName = $_FILES['pictures']['name'][$i];
				$myTemp = $_FILES['pictures']['tmp_name'][$i];
				if($i == 0){
					$imagepath .= $upload->formatUrl( $upload->uploadfile($myName,$myTemp,$path,$i) );
				}else{
					$imagepath .= "#". $upload->formatUrl( $upload->uploadfile($myName,$myTemp,$path,$i) );
				}
			}
		}else{
			$imagepath="";
		}
	}else{
		$imagepath = "";
	}
	echo $ret = $upload->structureImageUrl($imagepath);
}


?>