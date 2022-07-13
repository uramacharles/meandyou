<html>
    <body>
        <!--Main Footer / Footer Style One-->
    
<footer class="main-footer footer-style-two">
    	
        <!--Footer Upper-->        
        <div class="footer-upper">
            <div class="auto-container">
                <div class="row clearfix">
                	
                    <!--Footer Column-->
                	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 column">
                        <div class="footer-widget logo-widget">
                            <figure class="logo-box"><a href="index.php"><img src="../asset/images/logo.png" alt=""></a></figure>
                        </div>
                    </div>
                    
                    <!--Footer Column-->
                	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 column">
                        <div class="footer-widget info-widget">
                        	<h2>Categories:</h2>
                            <ul class="info">
                                <?php for($i=0;$i<=$catcount-2;$i+=2): ?>
                                    <li><a href="../publications.php?ct=<?php echo $category[$i+1]; ?>" target="_blank"><?php echo $category[$i+1]; ?></a></li>
                                <?php endfor; ?>
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
                <div class="copyright">Copyright &copy; <a href="http://www.meandyou.com/about.php">Urama Charles Chiemeka. <b>U.C.C.C. IDEAS.</b></a>||  Urama & Sons Enterprises All rights reserved. 2018-<?php echo date('Y');?> ||<a href="../signature.php">signed.</a></div>
                
            </div>
        </div>
        
    </footer>
<script src="../asset/js/jquery.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>
<script src="../asset/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../asset/js/revolution.min.js"></script>
<script src="../asset/js/jquery.fancybox.pack.js"></script>
<script src="../asset/js/jquery.fancybox-media.js"></script>
<script src="../asset/js/owl.js"></script>
<script src="../asset/js/wow.js"></script>
<script src="../asset/js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="../asset/scripts/texteditor.js"></script>

<!--Scroll to top-->
    </body>
</html>