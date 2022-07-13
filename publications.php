<?php include_once("controller/autoload.php"); ?>
<?php include_once("header.php");?>

<body>
<div class="page-wrapper"> 
      <?php include_once("navigation.php");?>


    <!--Page Title-->
    <section class="page-title" style="background-image:url(asset/images/publications.jpeg);">
        <div class="auto-container">
            <h1>Publications</h1>
        </div>
    </section>



    <!--Sidebar Page-->
    <div class="sidebar-page-container">
                <!--Content Side-->      
                <div class="content-side col-lg-9 col-md-8">
                    <!-- Search Form -->
                    <div class="text-center visible-sm visible-xs" style="margin: auto;">
                        <div class="alert alert-danger" role="alert"></div>
                        <form method="POST" action="<?php $_PHP_SELF; ?>" id="searchform">
                            <div class="form-group">
                                <input type="search" id="search" name="searchitem" value="" placeholder="Search Now">
                                <button type="submit" name="search"><span class="icon fa fa-search"></span></button>
                            </div>
                        </form>
                        <div id="likeresult"></div>
                    </div>
                    <hr style="border-width:0.5em; " />
                    
                    <section class="" id="searchresults">
                        <?php include_once('controller/u_fetchpublications.php'); ?>
                    </section>

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
                    <!-- Recent Posts -->
                    <div class="widget recent-posts sidebar-widget text-center visible-sm visible-xs">
                        <div class="sidebar-title"><h3>Latest Publications</h3></div>
                        <?php include('controller/u_getlatestpublications.php'); ?>
                    </div>
                </div><!--End Content Side-->
                <!--Sidebar This box should show if the page is in small medium or large screen-->      
                <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 visible-md visible-lg">
                    <aside class="sidebar">
                        <!-- Search Form -->
                        <div class="widget search-box sidebar-widget">
                            <div class="alert alert-danger" role="alert"></div>
                            <form method="POST" action="<?php $_PHP_SELF; ?>" id="searchform">
                                <div class="form-group">
                                    <input type="search" id="search" name="searchitem" value="" placeholder="Search Now">
                                    <button type="submit" name="search"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                            <div id="likeresult"></div>
                        </div>
                        
                        <!-- Recent Posts -->
                        <div class="widget recent-posts sidebar-widget">
                            <div class="sidebar-title"><h3>Latest Publicatiuons</h3></div>
                            <?php include('controller/u_getlatestpublications.php'); ?>
                        </div>
                    </aside>
                </div><!--End Sidebar-->      
                
    </div>

</div>
<!--End pagewrapper-->
<!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-long-arrow-up"></span></div>
    <?php include("footer.php");?>
</body>
</html>