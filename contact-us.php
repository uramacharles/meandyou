<?php include_once("controller/autoload.php"); ?>
<?php //include_once("controller/u_contactuscontrol.php"); ?>
<?php include_once("header.php");?>

<body style="background: url(asset/images/main-back.jpg) fixed no-repeat;">
<?php include_once("navigation.php");?>

<div class="page-wrapper"> 
    <!--Page Title-->
    <section class="page-title" style="background-image:url(asset/images/contact.jpeg);">
        <div class="mask"></div>
        <div class="auto-container">
            <h1>Contact Us</h1>
        </div>
    </section>
    <div class="container documents">
        <section class="info-section">
            <div class="auto-container">
                <?php include_once("controller/u_contactus_fetch_info.php"); ?>
            </div>
        </section>
    </div>
    <div>
        <!--Contact Section-->
        <section class="contact-section">
            <div class="auto-container" >
                <!--Section Title-->
                <div class="sec-title-one" style="background-color: white">
                    <h2>Leave a message here</h2>
                </div>
                
                <div class="contact-form default-form">
                    <form action="<?php $_PHP_SELF; ?>" method="POST" id="contact">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" value="" placeholder="Name *" required>
                        </div>
                        
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="email" name="email" value="" placeholder="Email *" required>
                        </div>
                        
                         <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="subject" value="" placeholder="Subject *" required>
                        </div>
                        
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <textarea name="message" placeholder="Message" required></textarea>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="text-center"><button type="submit" name="contactussubmit" class="theme-btn btn-style-one">Submit Now </button></div>
                        </div>
                    </form>
                </div> 
            </div>
        </section>
    </div>

</div>
<!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-long-arrow-up"></span></div>
<?php include("footer.php");?>
