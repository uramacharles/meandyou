<?php include_once("controller/autoload.php"); ?>
<?php include_once("header.php");?>

<body style="background: url(asset/images/indexnews.jpg) fixed no-repeat;">
<div class="page-wrapper">
            <!--Logo Box-->
            <div class="container col-md-2 " style="min-height: 5em; overflow-y: hidden;z-index:0; margin-right:0em;padding-top: 0em;">
                    <a href="index.php"><figure class="image-box col col-xs-12" style="margin-left: -2em;"><img src="asset/images/banner.png" alt="logo Picture." style="height:6em;width:100%"></figure></a>
            </div> 
      <?php include_once("navigation.php");?>
    <!--Footer Column-->
    <div class="col col-md-12" style="padding-top: 5em">
        <div class="row col-sm-12 col-md-12" style="padding-bottom: 0.1em;padding-top: 0.1em; position: relative; background-color: transparent; position: relative;">
            <div class="mask3"></div>
            <div class="row col-sm-12 col-md-12" style="padding-bottom: 0.1em;padding-top: 0.1em; position: relative; background-color: transparent; position: relative;">
                <div class="slider slider_one_big_picture col-sm-12" style="width: 100%;height: 30em;">
                    <?php include("controller/u_indexgetpublications.php"); ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 wow fadeInLeft" style="min-height: 25em; background: url(asset/images/indexnews.jpg)center center no-repeat;">
                <div class="col-sm-12" style="width: 100%;">
                    <?php include("controller/u_fetchpublications.php"); ?>
                </div>
            </div>
        </div>
    </div>
    <!--Footer Column-->
    <div class="col col-md-8 col-md-offset-2">
    </div>
      
</div>
<!--End pagewrapper-->
<!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-long-arrow-up"></span></div>
    <?php include("footer.php");?>


