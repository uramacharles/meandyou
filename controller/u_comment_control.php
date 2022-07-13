<?php
if(isset($_POST['submit_comment'])){
	$id = filter_input(INPUT_POST, "post_id");
	$email = filter_input(INPUT_POST, "email");
	$comm = filter_input(INPUT_POST, "comment");

	$comment = new posts;
	$comment->setLetterEmail($email);
	$comment->setText("comment",$comm);
	$ret = $comment->addcomment($id);
	if($ret == "true"){
		$_SESSION['message'] = "";
		echo"<script>swal('Successful','Comment Sent.','success');</script>";
	}else{
		$_SESSION['message'] = "Error encountered while processing your request. Please try again. ";
		echo"<script>swal('Opps!','Not Successful','error');</script>";
	}
}
?>