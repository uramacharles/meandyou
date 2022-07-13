<?php 
if(isset($_POST['addpost'])){
	$add = new posts;
	/*===================================
	Get the details needed Get the category of the product from a check box inserted into an array
	========================================*/
	 $newsurl = filter_input(INPUT_POST, "newsurl");

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
	$add->setText("newsurl",$newsurl);
	$add->setCategory($categ);
	echo $res = $add->fetchcontent($newsurl);

	if($res == "true"){
		echo"<script>swal('Successfully added');</script>";
	}elseif($res == "false"){
		echo"<script>swal('Please Try Again');</script>";
	}else{
		echo"<script>swal('Opps!',' $res ','warning');</script>";
	}
}


?>