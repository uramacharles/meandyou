
        <!--Main Footer / Footer Style One-->
<footer class="main-footer footer-style-two">
    	
        <!--Footer Upper-->        
        <div class="footer-upper">
            <div class="auto-container">
                <div class="row clearfix">	
                    <!--Footer Column-->
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column">
                        <div class="footer-widget subscribe-widget">
                        </div>
                    </div>
                    
                    <!--Footer Column-->
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column">
                        <div class="footer-widget logo-widget">
                            <!--Logo Box-->
                            <div class="container col-md-12 " style="min-height: 5em; overflow-y: hidden;z-index:0;">
                                    <a href="index"><figure class="image-box col col-xs-12" style="margin-left: -2em;margin-right: -3em"><img src="asset/images/banner.png" alt="logo Picture." style="height:6em;width:100%"></figure></a>
                            </div> 
                            <hr>
                           <ul class="navigation" style="padding-top: 2em;">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="contact-us">Contact Us</a> </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!--Footer Column-->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column">
                        <div class="footer-widget info-widget">
                            <h2>Category:</h2>

                                <?php for($i=0;$i<=$catcount-2;$i+=2): ?>
                                    <nav><a href="publications.php?ct=<?php echo $category[$i+1]; ?>"><?php echo $category[$i+1]; ?></a></nav>
                                <?php endfor; ?>
                            
                        </div>
                        <div class="social-icons">
                            <ul>
                                <li><a href="https://m.facebook.com/urama"><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://linkedin.com/company/t"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <!--Footer Bottom-->
    	<div class="footer-bottom">
            <div class="auto-container">
                <!--Copyright-->
                <div class="copyright">Copyright &copy; <a href="http://www.trendrev.com">Urama Charles Chiemeka.</a>||  Urama & Sons Enterprises All rights reserved. 2018-<?php echo date('Y');?> ||<a href="signature">signed.</a></div>
                
            </div>
        </div>
        
    </footer>
 

<script src="asset/js/jquery.js"></script> 
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="asset/js/revolution.min.js"></script>
<script src="asset/js/jquery.fancybox.pack.js"></script>
<script src="asset/js/jquery.fancybox-media.js"></script>
<script src="asset/js/owl.js"></script>
<script src="asset/js/wow.js"></script>
<script src="asset/js/script.js"></script>
<script src="asset/scripts/searchscript.js"></script>
<script src="asset/scripts/contactus.js"></script>
<script src="asset/scripts/indexscript.js"></script>
<script src="asset/scripts/jquery.easy_slides.js"></script>
<script type="text/javascript" src="asset/scripts/texteditor.js"></script>
 <script>
   $(document).ready(function() {
     $('.slider_one_big_picture').EasySlides({'autoplay': true,'stepbystep':false, 'show': 5})
     $('.slider_circle_10').EasySlides({'autoplay': true, 'show': 13})
     $('.slider_clock').EasySlides({'autoplay': true, 'show': 15})
     $('.slider_four_in_line').EasySlides({'autoplay': true, 'show': 9})

     $("#viewall").click(function(){
        $("#viewalldiv").show(1000);
     })
     $(".practdrop").click(function(){
        $(".pract").toggle(500);
     })
     $("#closeview").click(function(){
        $("#viewalldiv").hide(500);
     })
     $(".showtoggle").click(function(){
        $(".profprev").toggle(1000);
     })
   });
 </script>

<!--Scroll to top-->


    </body>
</html>