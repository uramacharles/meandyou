<?php
$review = new posts;
$latest = $review->getLatestPosts(5);
//		$this->items = array("id","title","titlelink","post_land_image","date_updated");
$co = count($latest);
for($i=0;$i<=$co-5;$i+=5):
?>
    <div class="post" >
        <figure class="post-thumb"><img src="<?php echo $review->formatUrl($latest[$i+3]); ?>" alt=""><a href="publicationspost.php?by=<?php echo $latest[$i];?>&title=<?php echo $latest[$i+2]; ?>" class="overlay-link"><span class="fa fa-link">View</span></a></figure>
        <div class="desc-text"><a href="publicationspost.php?by=<?php echo $latest[$i];?>&title=<?php echo $latest[$i+2]; ?>"><?php echo $latest[$i+1]; ?></a></div>
        <div class="time"><?php echo $latest[$i+4]; ?></div>
    </div>
    <hr />
<?php endfor; ?>