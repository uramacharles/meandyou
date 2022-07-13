<?php
if (isset($_POST["delete_news"])) {
	$id = filter_input(INPUT_POST, "news_id");

	$delete = new news;
	$ret = $delete->deletenews($id);
	if($ret == "true"){
		$_SESSION['message'] = "news Deleted";
		echo"<script>swal('Successful','News Deleted.','success');</script>";
	}else{
		$_SESSION['message'] = "Error encountered while processing your request. Please try again. ";
		echo"<script>swal('Opps!','Error encountered while processing your request. Please try again.','error');</script>";
	}
}
?>