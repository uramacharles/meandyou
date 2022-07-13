<?php  if(isset($_POST["search"])||isset($_SESSION["searchitem"])): ?>
    <?php
        if(isset($_POST["search"])){
            $terms = filter_input(INPUT_POST, "searchitem");
        }else{
            $terms = $_SESSION["searchitem"];
        }
        $_SESSION['category'] = "search";
        $getter = new posts;
        $getter->setText("searchitem",$terms);
        $pageControl = $getter->getPageVariables("posts");
        $post_array = $getter->relayPost();
        //This is to trace the type of publications that will be returned to ease pagination
    ?>
<?php elseif(isset($_GET["ct"])): ?>
<?php 
        $categ = filter_input(INPUT_GET, "ct");
        $getter = new posts;
        $_SESSION['category'] = $categ;
        $getter->setText("category",$categ);
        $pageControl = $getter->getConditionedPageVariables("posts","WHERE category = '$categ'");
        $post_array = $getter->relayPost();
        //This is to trace the type of publications that will be returned to ease pagination
 ?>    
<?php else: ?>
<?php
    $_SESSION['category'] = "all";
    $getter = new posts;
    $pageControl = $getter->getPageVariables("posts");
    $post_array = $getter->relayPost();
?>
<?php endif; ?>

<?php 
        //$this->items = array("id","title","titlelink","category","source","post_land_image","date_updated");
    $count = count($post_array);

 if(empty($post_array)): ?>
 	<h3 style="color: green; padding-bottom: 2em; font-weight: bold;">No post is added yet. Please do so.</h3>
 <?php else:?>
	<?php for($i=0;$i<=$count-7;$i+=7):?>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <span class="col-md-12" style="text-decoration-style:double;text-decoration-color: green;text-decoration: underline;text-orientation: mixed;z-index: 20;font-weight: bold;"><?php echo $getter->getcategorypreview($post_array[$i+3]); ?></span>
            <div class="container default-portfolio-item col-md-12 col-sm-12 col-xs-12 " >
                <div class="inner-box" style="color:green;font-weight: bold;border-radius:5%;z-index: 20;">
                    <figure class="image-box">
                    	<img src="<?php echo  $getter->formatUrl($post_array[$i+5]); ?>" alt="">
                    </figure>
    	        	<a href="publicationspost.php?by=<?php echo $post_array[$i];?>&title=<?php echo $post_array[$i+2]; ?>">
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <div class="overlay-content">
                                    <span style="color:white;"><?php echo $post_array[$i+1]; ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="col-md-12">
                    	<a href="publicationspost.php?by=<?php echo $post_array[$i];?>&title=<?php echo $post_array[$i+2]; ?>" style="color: blue; font-weight: bold;font-size:15px;" ><?php echo $post_array[$i+1]; ?></a>
                    	<hr style="border-width: 0.2em; border-color:red; margin-bottom: 0;"  />
                    	<span><a href="<?php echo $post_array[$i+4]; ?>">Source</a></span>||<span><i><?php echo $post_array[$i+6]; ?></i></span>
                    </div>
                </div>
            	<hr class="visible-sm visible-xs" style="border-width: 0.5em; border-color:green"  />
            </div>
            
        </div>
	<?php endfor;?>
<?php endif;?>