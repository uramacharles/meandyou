<?php
include_once('../controller/adminautoload.php');
include_once('../controller/adminonlysessioncontrol.php');
?>

<?php include_once("header.php"); ?>
  <body >
<?php include_once('adminnav.php'); ?>

<div class="w3-main" id="main">
    <br><br>
  <div class="w3-green container-fluid" style="padding-bottom: 20px;">     
    <a href="adminboard.php" class="btn btn-light w3-xlarge w3-left " style="margin-top: 3px; color: white;"><i class="fa fa-th-list"></i></a>
    <div class="w3-container w3-left">
      <h1 class="w3-text-white">Me And You</h1>
    </div>
  </div>

  <div class="container" id="hide">

    <div class="container well text-center w3-card-12"> 
        <span class=" w3-center "> <i class=" fa fa-check"></i></span>
        
        <h1 class="text">Welcome <span id="admin"><?php if(isset($_SESSION['admin_name'])){echo $_SESSION['admin_name'];}?></span>!!!</h1>
        <span><i class="fa fa-user" style="background-color: transparent;padding-top: 20px;"></i></span>
        <p class="lead"><b style="color: green">You have been successfully logged in.</b><br /><br />You can view your recent updates below.</p>
    </div>

    <div class="container">
      <?php include_once('../controller/adminquicknotification.php');?>
    </div>
  </div>
</div>

<?php include_once('footer.php'); ?>