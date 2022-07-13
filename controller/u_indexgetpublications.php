<?php
$review = new posts;
$latest = $review->getLatestPosts(5);
//		$this->items = array("id","title","titlelink","post_land_image","date_updated");
$co = count($latest);
for($i=0;$i<=$co-5;$i+=5):
?>      <div style="max-height: 30em;">
            <a href="newspost.php?by=<?php echo $latest[$i];?>&title=<?php echo $latest[$i+2]; ?>" class="overlay-link">
                <img src="<?php echo $review->formatUrl($latest[$i+3]); ?>" alt="" class="panel-heading col-sm-12 col-xs-12" style="width:100%;max-height: 20em" >
                <div class="panel-body col-md-12" style="font-family: gill san;font-size:18px; color:white"><?php echo $latest[$i+1]; ?></div>
                <div class="panel-footer col-md-12" style="color:red; font-weight: bold;font-family: algerian"><?php echo $latest[$i+4]; ?></div>
            </a>
        </div>
 
<?php endfor; ?>