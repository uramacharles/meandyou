<?php
  include_once('../controller/adminautoload.php');
  include_once('../controller/adminonlysessioncontrol.php');
  include_once('../controller/adminfetch_redirect_control.php');
?>
<?php include_once('header.php'); ?>
  <body>
<?php include_once('adminnav.php'); ?>

<div class="w3-main" id="main">
  <?php 
    include_once('../controller/admincontrol.php');
   ?>

  <div class="container" id="hide" >

    <div class="container wow fadeInLeft" >
      <h1 class="text-center" style="position: relative; z-index: 10; top : 20%; text-decoration: underline;text-decoration-style: double; padding-bottom: 0.2em;padding-top: 2em;"><a href="adminboard.php">Me And You </a> >Edit Admin </h1>

        <div class="col-sm-12 ">
          <div class="well w3-card-24 wow fadeInBig ">
              <?php include_once('../controller/admins_fetchinfo.php'); ?>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<?php include_once('footer.php'); ?>
