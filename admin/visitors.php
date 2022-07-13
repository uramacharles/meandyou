<?php
  include_once('../controller/adminautoload.php');
  include_once('../controller/adminonlysessioncontrol.php');
  include_once('../controller/admincontrol.php');
?>
<?php include_once('header.php'); ?>
  <body>
<?php include_once('adminnav.php'); ?>

<div class="w3-main" id="main">

  <div class="container" id="hide" >

    <div class="container animated fadeInLeftBig" >
      <h1 class="text-center" style="position: relative; z-index: 10; top : 20%; text-decoration: underline;text-decoration-style: double; padding-bottom: 0.2em;padding-top: 2em;"><a href="adminboard.php">Me And You </a> >Admin</h1>


      <div class="row">
        <h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Admin:</h2>
        <div class="container well text-center w3-card-12">
            <h1 class="text"><?php if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']); } ?></h1>
        </div>
        <div class="col-sm-12 ">
         <div class="row">
            <h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Visitors</h2>
            <div class="col-sm-8 col-sm-offset-2">
              <?php $vtor = new visitors;?>        
              <div class="col col-md-6 col-md-offset-3 " id="visitors" style="padding-top: 2em;font-weight: bold;position: relative;top:5em;">
                <div class="col-md-6" style="font-size:15px; font-weight: bold; color:blue;background-color:white; padding: 1em;" >
                  <label >Todays Visitors:</label>
                  <span <span style="font-size:20px; font-weight: bold; color:white;background-color:blue;"><?php echo $vtor->getTodayVisitors(); ?></span>
                </div>

                <div class="col-md-6" style="font-size:15px; font-weight: bold; color:blue;background-color:white; padding: 1em;">
                  <label style="font-size:15px; font-weight: bold; color:blue;background-color:white;">Yesterday Visitors:</label>
                  <span <span style="font-size:20px; font-weight: bold; color:white;background-color:blue;"><?php echo $vtor->getYestVisitors(); ?></span>
                </div>

                <div class="col-md-6" style="font-size:15px; font-weight: bold; color:blue;background-color:white; padding: 1em;">
                  <label style="font-size:15px; font-weight: bold; color:blue;background-color:white;">Visitors For This Month:</label>
                  <span <span style="font-size:20px; font-weight: bold; color:white;background-color:blue;"><?php echo $vtor->getTheMonthVisitors(); ?></span>
                </div>

                <div class="col-md-6" style="font-size:15px; font-weight: bold; color:blue;background-color:white; padding: 1em;">
                  <label style="font-size:15px; font-weight: bold; color:blue;background-color:white;">Visitors For Last Month:</label>
                  <span <span style="font-size:20px; font-weight: bold; color:white;background-color:blue;"><?php echo $vtor->getLastMonthVisitors(); ?></span>
                </div>

                <div class="col-md-6" style="font-size:15px; font-weight: bold; color:blue;background-color:white; padding: 1em;">
                  <label style="font-size:15px; font-weight: bold; color:blue;background-color:white;">Visitors for The Year:</label>
                  <span <span style="font-size:20px; font-weight: bold; color:white;background-color:blue;"><?php echo $vtor->getTheYearVisitors(); ?></span>
                </div>

                <div class="col-md-6" style="font-size:15px; font-weight: bold; color:blue;background-color:white; padding: 1em;">
                  <label style="font-size:15px; font-weight: bold; color:blue;background-color:white;">Visitors By Last Year:</label>
                  <span <span style="font-size:20px; font-weight: bold; color:white;background-color:blue;"><?php echo $vtor->getLastYearVisitors(); ?></span>
                </div>

                <div class="col-md-6" style="font-size:15px; font-weight: bold; color:blue;background-color:white; padding: 1em;">
                  <label style="font-size:15px; font-weight: bold; color:blue;background-color:white;">Total Visitors:</label>
                  <span <span style="font-size:20px; font-weight: bold; color:white;background-color:blue;"><?php echo $vtor->getTotalVisitors(); ?></span>
                </div>
              </div> 
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<?php include_once('footer.php'); ?>