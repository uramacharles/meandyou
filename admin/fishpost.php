<?php
  include_once('../controller/adminautoload.php');
  include_once('../controller/adminonlysessioncontrol.php');
  include_once('../controller/posts_edit_redirect_control.php');
?>
<?php include_once('header.php'); ?>
  <body>
<?php include_once('adminnav.php'); ?>

<div class="w3-main" id="main">

  <div class="container" id="" >

    <div class="container animated fadeInLeftBig" >
      <h1 class="text-center" style="position: relative; z-index: 10; top : 20%; text-decoration: underline;text-decoration-style: double; padding-bottom: 0.2em;padding-top: 2em;"><a href="adminboard.php">Me And You</a> >News Updates</h1>

      <div class="row">
        <h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Add News</h2>
        <div class="container well text-center w3-card-12">
            <h1 class="text"><?php if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']); } ?></h1>
        </div>

        <div class="col-md-12">
          <div class=" container well w3-card-24">
            <?php include_once('../controller/fishpost_control.php'); ?>
            <h3><i>1. lovelearnings.com</i></h3>
            <span class="alert-danger"></span>
            <form action="<?php $_PHP_SELF; ?>" method="POST" id="newsform" enctype="multipart/form-data">
              <div class="form-group col-md-12 ">
                  <label >Url:</label>
                  <input type="text" class="form-control col col-md-12" name="newsurl" placeholder="" />
              </div>
              <div class="form-group col-md-12">
                <label class="col-md-12 " > Category*</label>
                <?php for($i=0;$i<=$catcount-2;$i+=2): ?>
                  <?php $category_name = str_replace(" ", "_", $category[$i+1]); ?>
                  <div class="container col col-md-3" style="background-color:whitesmoke; color:green; padding: 0.1em">
                    <pre style="border-width: 1px;" class="col-md-12"><?php echo $category[$i+1]; ?>&nbsp;<input type="checkbox" name="<?php echo $category_name; ?>" value="<?php echo $category[$i]; ?>"/></pre>
                  </div>
                <?php endfor; ?>
              </div>
              <div class="form-group" style="padding-bottom: 4em">
                <button type="submit" name="addpost" class="btn btn-primary btn-style-four pull-right lead">Post</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="row">  <!--Fetch the Newsletters with edit and delete functionalities-->
        <h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Posts:</h2>
        <div class="col-sm-12 ">
          <?php include_once('../controller/posts_edit_delete_control.php'); ?>
          <div class="well w3-card-24 fetchsubscribersdiv animated bounceInUp ">
              <?php include_once('../controller/adminfetchposts.php'); ?>
          </div>
        </div>
      </div>
      <!-- Styled Pagination -->
      <div class="styled-pagination text-center">
        <span id="result"></span>
        <hr style="border-width: 0.5em; ">
        <div class="row col-xs-12 text-right">
          <?php 
            //echo $pageControl;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once('footer.php'); ?>