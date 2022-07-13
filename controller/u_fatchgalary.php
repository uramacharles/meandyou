<?php 
if(isset($_GET["ty"]) &&isset($_GET["g_id"])){
	$pageControl = "";
	$getter = new posts;
	$id = bcdiv( bcadd( $_GET["g_id"], 3) , 12);
	$imagepath = $getter->getPictures($id);
}else{
	$imagepath = "";
}
$co = count($imagepath);
?>

<!--Gallery Section-->
    <section class="gallery-section fullwidth-gallery-two gallery-page">
        <div class="mixitup-gallery">
            <!--Filter List-->
            <div class="images-outer clearfix">
				<?php for($i=0;$i < $co; $i++): ?>
	                <!--Default Portfolio Item -->
	                <div class="default-portfolio-item">
	                    <div class="inner-box">
	                        <figure class="image-box"><img src="<?php echo  $getter->formatUrl($imagepath[$i]); ?>" alt=""></figure>
	                        <div class="overlay-box">
	                            <div class="overlay-inner">
	                                <div class="overlay-content">
	                                    <a href="<?php echo  $getter->formatUrl($imagepath[$i]); ?>" class="lightbox-image option-btn theme-btn" title="Galary" data-fancybox-group="fancybox"><span class="fa fa-eye"></span></a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				<?php endfor; ?>
            </div>
        </div>
        
    </section>
