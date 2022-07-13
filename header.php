<?php include_once('controller/fetch_category_control.php');  ?>
<?php include_once('controller/u_countvisitor.php');  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Me And You</title>
	<!--For sweet alert-->
	<script src="asset/css/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="asset/css/sweetalert/dist/sweetalert.css">
	<!-- Stylesheets -->
	<link href="asset/css/bootstrap.css" rel="stylesheet">
	<link href="asset/css/revolution-slider.css" rel="stylesheet">
	<link href="asset/css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="asset/images/logo.png" type="image/x-icon">
	<link rel="icon" href="asset/images/logo.png" type="image/x-icon">
	<!-- Responsive -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>    
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='Distribution' content='Global'/>   
	<meta name='Resource-Type' content='Document'/>
	<meta name="allow-search" content="yes"/>
	<meta name="rating" content="General"/>
	<meta name="keywords" content="Me and You, Relationship, Love, Sex, Levels of Friendship,Genuine Love,casual friends,close friends, intimate friends,intimate Friendship, Intimacy, intimacy in Friendship,Dating, Cutting,marriage,marriages" />
	<meta name="description" content="We are devoted to give you updates on the rudiments needed in your Relationship. We are out to check the rate of broken marriages, and unstable homes. We also give you first hand Mentoring on how to go about your Relationship, no matter the level you find yourself." />
	<!-- mobile meta (hooray!) -->
	<meta name='HandheldFriendly' content='True'>
	<meta name='MobileOptimized' content='320'>
	<meta name='viewport' content='width=device-width'/>

	<link href="asset/css/responsive.css" rel="stylesheet">
	<link href="asset/css/hover.css" rel="stylesheet" type="text/css"/>
	<link href="asset/css/jquery.easy_slides.css" rel="stylesheet" type="text/css"/>
	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
	<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Open Graph data -->
		<meta property="article:tag" content="Article Tag" />
		<!-- Open Graph data For Urama Charles C. -->
		<meta property="fb:admins" content="160310027920559" />
		<meta property="og:type" content="article" />

		<?php include_once("controller/u_fetch_header_control.php") ?>

		<?php if(isset($header_land_image) && $header_land_image != "" ):?>
			<meta property="og:title" content="<?php echo $header_title;?>"/>
			<meta property="og:url" content="publicationspost.php?by=<?php echo $header_id;?>&title=<?php echo $header_titlelink; ?>" />
			<meta property="og:image" content="<?php echo $header_land_image; ?>" />
			<meta property="og:description" content="<?php echo $header_story;?>" />
			<!--For Twitter-->
			<meta name="twitter:card" content="summary_large_image" />
			<meta name="twitter:title" content="New Trend: <?php echo $header_title;?>" />
			<meta name="twitter:url" content="publicationspost.php?by=<?php echo $header_id;?>&title=<?php echo $header_titlelink; ?>" />
			<meta name="twitter:description" content="<?php echo $header_story;?>" />
			<meta name="twitter:image" content="<?php echo $header_land_image; ?>" />
		<?php else: ?>
			<meta property="og:image" content="asset/images/logo.png" />
			<meta property="og:title" content="Me and You."/>
			<meta property="og:url" content="index.php" />
			<meta property="og:description" content="All you need to know about relationship" />
			<!--For Twitter-->
			<meta name="twitter:card" content="summary_large_image" />
			<meta name="twitter:title" content="Me and You." />
			<meta name="twitter:url" content="index.php" />
			<meta name="twitter:description" content="All you need to know about relationship." />
			<meta name="twitter:image" content="asset/images/logo.png" />
		<?php endif; ?>
</head>