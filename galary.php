<?php include_once("controller/autoload.php"); ?>
<?php include_once("header.php");?>
<?php 
    if(!isset($_GET["ty"]) && !isset($_GET["g_id"])){
        header("location:publications.php");
    }
 ?>
<body style="background: url(asset/images/main-back.jpg) fixed no-repeat;">
<?php include_once("navigation.php");?>

<div class="page-wrapper"> 
    <!--Page Title-->
    <section class="page-title" style="background-image:url(asset/images/galary.png);">
        <div class="mask"></div>
        <div class="auto-container">
            <h1>Galary</h1>
        </div>
    </section>
    <div class="container">
        <section class="info-section">
           <?php include_once("controller/u_fatchgalary.php"); ?>
        </section>
        <section>
            <!-- Styled Pagination -->
            <div class="styled-pagination text-center">
                <span id="result"></span>
                <hr style="border-width: 0.5em; ">
                <div class="row col-xs-12 text-right">
                    <?php 
                    echo $pageControl;
                    ?>
                </div>
            </div>
        </section>

    </div>

</div>
<!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-long-arrow-up"></span></div>
<?php include("footer.php");?>
