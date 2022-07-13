<?php
$_SESSION['lastaddress']= $_SERVER['PHP_SELF'];
?>
    <body style="">
           <!-- Preloader -->
    <div class="preloader"></div>

     <!-- Main Header / Light Version-->
    <header class="main-header light-version navbar-inverse">
        <!-- Main Box --> 
    	<div class="main-box">
        	<div class="auto-container">
            	<div class="outer-container clearfix">
                    <!--Logo Box-->
                    <div class="container col-md-2 visible-lg visible-md " style="min-height: 5em; overflow-y: hidden;z-index:0;">
                            <a href="index.php"><figure class="image-box col col-xs-12" style="margin-left: -2em;"><img src="asset/images/banner.png" alt="logo Picture." style="height:6em;"></figure></a>
                    </div> 
                    
                    <!--Nav Outer-->
                    <div class="nav-outer clearfix col-md-10" style="">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header"  style="position: absolute; top: 2em;">
                                <!-- Toggle Button -->   	
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar" ></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix"  style="font-size: 10px;">
                                    <li><a href="contact-us.php">Contact Us</a> </li>
                                    <li class="dropddv">Category
                                        <div class="dropdcont">
                                            <?php for($i=0;$i<=$catcount-2;$i+=2): ?>
                                                <?php $name = str_replace(" ", "-", $category[$i+1]); ?>
                                                <nav>
                                                	<a href="publications.php?ct=<?php echo $category[$i+1]; ?>"><?php echo $category[$i+1]; ?></a>
                                                </nav>
                                            <?php endfor; ?>
                                        </div>
                                    </li>
                                 </ul>
                            </div>
                        </nav><!-- Main Menu End-->
                        
                    </div><!--Nav Outer End-->
                    
                    <!-- Hidden Nav Toggler -->
                    <div class="nav-toggler">
                    <button class="hidden-bar-opener"><span class="icon fa fa-bars"></span></button>
                    </div><!-- / Hidden Nav Toggler -->
                    
            	</div>    
            </div>
        </div>
    
    </header>
    <!--End Main Header -->
    
    
    <!-- Hidden Navigation Bar -->
    <section class="hidden-bar right-align">
        
        <div class="hidden-bar-closer">
            <button class="btn"><i class="fa fa-close"></i></button>
        </div>
        
        <!-- Hidden Bar Wrapper -->
        <div class="hidden-bar-wrapper">
    
            <!--Logo Box-->
            <div class="container col-md-2 " style="min-height: 5em; overflow-y: hidden;z-index:0; margin-right:0em;padding-top: 3em;">
                    <a href="index"><figure class="image-box col col-xs-12" style="margin-left: -2em;margin-right: 0em"><img src="asset/images/banner.png" alt="logo Picture." style="height:6em;"></figure></a>
            </div> 
            <!-- .Side-menu -->
            <div class="side-menu">
            <!-- .navigation -->
               <ul class="navigation">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact-us.php">Contact Us</a></li>
                    <li class="practdrop"><a href="#">Category <i class="fa fa-arrow-down"></i></a></li>
                        <?php for($i=0;$i<=$catcount-2;$i+=2): ?>
                            <?php $catname = str_replace(" ", "-", $category[$i+1]); ?>
                            <li class="pract"><a href="publications.php?ct=<?php echo $category[$i+1]; ?>"><?php echo $category[$i+1]; ?></a></li>
                        <?php endfor; ?>    
                </ul>
            </div><!-- /.Side-menu -->
        
            <div class="social-icons">
                <ul>
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                    <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        
        </div><!-- / Hidden Bar Wrapper -->
    </section>
    <!-- / Hidden Bar -->
