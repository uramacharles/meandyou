<?php
	$getter = new posts;

    if(isset($_GET["ct"]) ){
        $_SESSION["ct"] = $titl = htmlentities(filter_input(INPUT_GET, "ct"));
        $pageControl = $getter->getConditionedPageVariables("posts","WHERE category = '$titl'");
        $post_array = $getter->getPostByCategory($titl);
    }else{
        $pageControl = $getter->getPageVariables("posts");
    	$post_array = $getter->getPosts();
    }
	//$tems = array("id","title","titlelink","category","source","post_land_image","date_updated")
	$count = count($post_array);
 if(empty($post_array)): ?>
 	<h3 style="color: green; padding-bottom: 2em; font-weight: bold;">No post is added yet. Please do so.</h3>
 <?php else:?>
	<?php for($i=0;$i<=$count-7;$i+=7):?>
        <div class="container default-portfolio-item col-md-3 col-sm-12 col-xs-12 ">
            <div class="inner-box" style="color:green;font-weight: bold;border-radius:5%;">
            	<span style="text-decoration-style:double;text-decoration-color: green;text-decoration: underline;text-orientation: mixed;"><?php echo $getter->getcategorypreview($post_array[$i+3]); ?></span>
                <figure class="image-box">
                	<img src="<?php echo  $getter->formatUrlforAdmin($post_array[$i+5]); ?>" alt="">
                </figure>
	        	
                <div class="overlay-box">
                    <div class="overlay-inner">
                        <div class="overlay-content">
                            <span style="color:white;"><?php echo $post_array[$i+1]; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                	<a href="post.php/<?php echo $post_array[$i+2]; ?>" style="color: blue; font-weight: bold;font-size:15px;" ><?php echo $post_array[$i+1]; ?></a>
                	<hr style="border-width: 0.2em; border-color:red"  />
                	<span><i><?php echo $post_array[$i+6]; ?></i></span>
                </div>
				<div class="col-md-12">
					<form method="POST" action="<?php $_PHP_SELF; ?>" >
						<input type="hidden" name="post_address" value="<?php echo $post_array[$i+2]; ?>" />
                        <input type="hidden" name="post_id" value="<?php echo $post_array[$i]; ?>" />
						<button type="submit" name="edit_post" class="btn btn-style-four">Read More</button>
					</form>
				</div>
				<div class="col-md-12">
					<form method="POST" action="<?php $_PHP_SELF; ?>" >
						<input type="hidden" name="post_id" value="<?php echo $post_array[$i]; ?>" />
						<button type="submit" name="delete_post" class="btn btn-style-one">Delete</button>
					</form>
				</div>

            </div>
        	<hr class="visible-sm visible-xs" style="border-width: 0.5em; border-color:red"  />
        </div>
	<?php endfor;?>
<?php endif;?>