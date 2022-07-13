<?php
	$getter = new news;

    if(isset($_GET["ct"]) ){
        $_SESSION["ct"] = $titl = htmlentities(filter_input(INPUT_GET, "ct"));
        $pageControl = $getter->getConditionedPageVariables("news","WHERE category = '$titl'");
        $news_array = $getter->getNewsByCategory($titl);
    }else{
        $pageControl = $getter->getPageVariables("news");
    	$news_array = $getter->getNews();
    }
        //$this->items = array("id","newsurl","category","date_updated");
	$count = count($news_array);
 if(empty($news_array)): ?>
 	<h3 style="color: green; padding-bottom: 2em; font-weight: bold;">No news is added yet. Please do so.</h3>
 <?php else:?>
	<?php for($i=0;$i <= $count-4;$i+=4):?>
        <?php
            $metadata = $getter->fetchdata($news_array[$i+1],false);
        ?>
        <div class="container default-portfolio-item col-md-3 col-sm-12 col-xs-12 ">
            <div class="inner-box" style="color:green;font-weight: bold;border-radius:5%;">
            	<!--span class="row" style="text-decoration-style:double;text-decoration-color: green;text-decoration: underline;text-orientation: mixed;"><?php echo $getter->getcategorypreview($news_array[$i+2]); ?></span-->
                <a href="<?php echo $news_array[$i+1]; ?>" target="_blank" >
                    <figure class="row image-box" style="max-height:8em;min-height:8em;">
                    	<img src="<?php //echo  $metadata['metaProperties']['og:url']['value']; ?>" alt="">
                    </figure>
                </a>
                <div class="row col-md-12" style="max-height: 8em;min-height: 8em;text-align: justify; font-size:13px;overflow-y: hidden;">
                    <?php 
                        echo $getter->truncateText($metadata['metaTags']['description']['value']);
                     ?>
                </div>
                <div class="row col-md-12" style="max-height: 0.5em;min-height: 0.5em; color: red;font-style: algerian;"><?php echo $news_array[$i+3]; ?></div>
				<div class="row col-md-12" style="padding-top: 2em">
					<form method="POST" action="<?php $_PHP_SELF; ?>" >
						<input type="hidden" name="news_id" value="<?php echo $news_array[$i]; ?>" />
						<button type="submit" name="delete_news" class="btn btn-style-one">Delete</button>
					</form>
				</div>

            </div>
        	<hr class="visible-sm visible-xs" style="border-width: 0.5em; border-color:red"  />
        </div>
	<?php endfor;?>
<?php endif;?>