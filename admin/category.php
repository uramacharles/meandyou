<?php
  include_once('../controller/adminautoload.php');
  include_once('../controller/adminonlysessioncontrol.php');
?>
<?php include_once('header.php'); ?>
  <body>
<?php include_once('adminnav.php'); ?>

<div class="w3-main" id="main">

  <div class="container" id="hide" >

    <div class="container animated fadeInLeftBig" >
      <h1 class="text-center" style="position: relative; z-index: 10; top : 20%; text-decoration: underline;text-decoration-style: double; padding-bottom: 0.2em;padding-top: 2em;"><a href="adminboard">The House Of Laws </a> >Categories</h1>


      <div class="row">
        <h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Add Post Categories</h2>
        <div class="container well text-center w3-card-12">
            <h1 class="text"><?php if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']); } ?></h1>
        </div>
        <div class="col-md-12">
          <div class="well w3-card-24">
                <?php include_once('../controller/category_control.php'); ?>
            <span class="alert-danger"></span>
            <form action="<?php $_PHP_SELF; ?>" method="POST" id="stafform" enctype="multipart/form-data">
              <div class="form-group col-md-3">
                  <label > Name</label>
                  <input type="text" class="form-control col col-md-12" name="name" placeholder="" />
              </div>

              <div class="form-group" style="padding-bottom: 4em">
                <button type="submit" name="addcategory" class="btn btn-primary btn-style-four pull-right lead">Add Category</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="row"> 
        <h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Categories:</h2>
        <div class="col-sm-12 ">
          <div class="well w3-card-24 fetchsubscribersdiv animated bounceInUp ">
              <?php include_once('../controller/adminfetchcategory.php'); ?>
          </div>
        </div>
      </div>
      <div class="styled-pagination text-center">
        <span id="result"></span>
        <hr style="border-width: 0.5em; ">
        <div class="row col-xs-12 text-right">
          <?php 
            echo $pageControl;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once('footer.php'); ?>