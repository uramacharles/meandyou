<?php
  include_once('../controller/adminautoload.php');
  include_once('../controller/adminonlysessioncontrol.php');
  include_once('../controller/posts_edit_redirect_control.php');
?>
<?php include_once('header.php'); ?>
  <body>
<?php //include_once('adminnav.php'); ?>

<div class="w3-main" id="main">

  <div class="container" id="hide" >

    <div class="container animated fadeInLeftBig" >
		<h1 class="text-center" style="position: relative; z-index: 10; top : 20%; text-decoration: underline;text-decoration-style: double; padding-bottom: 0.2em;padding-top: 2em;"><a href="adminboard.php">Me And You </a> > <a href="posts.php">Posts</a> >Post</h1>

	    <!--Page Title-->
	    <section class="page-title" style="background-image:url(<?php echo $post_land_image; ?>);">
	        <div class="auto-container">
	            <h1><?php echo $post_title; ?></h1>
	            <i><a href="<?php echo $source; ?>">Source</a></i>
	        </div>
	    </section>

	    <div class="container documents" >
            <div class="column col-sm-12 col-xs-12">
                        
                <div class="subtitle">

                	<?php  echo $post_category; ?>
                	
                </div>
                <div class="content" style="text-align: justify; ">
                    <?php echo $post_story; ?>
            	</div>
            	<div class="row" style="padding-bottom: 2em; border-bottom-color: blue;border-bottom-width: 0.5em;">
            		<i style="color: red;font-size:15px;"><?php echo $post_date_updated; ?></i>
            	</div>
            	<div class="row">
            		<?php for($j=0;$j<$imgcount;$j++): ?>
				        <div class="container default-portfolio-item col-md-3 col-sm-12 col-xs-12 ">
				            <div class="inner-box" style="color:green;font-weight: bold;border-radius:5%; max-width: 15em;min-height: 8em;">
				                <figure class="image-box">
				                	<img src="<?php $im = new posts;  echo $im->formatUrlforAdmin($post_other_image[$j]); ?>" alt=""/>
				                </figure>
								<div class="col-md-12">
									<form method="POST" action="<?php $_PHP_SELF; ?>" >
										<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
										<input type="hidden" name="picture_url" value="<?php echo $post_other_image[$j]; ?>" />
										<button type="submit" name="delete_picture" class="btn btn-style-one">Delete Picture</button>
									</form>
								</div>
				            </div>
				        </div>
			        <?php endfor; ?>
            		
					<div class="row col-xs-12" style="height:2em;z-index: 2;">
						<form method="POST" action="<?php $_PHP_SELF; ?>" class="col-md-2 col-xs-12" >
							<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
							<input type="hidden" name="post_title" value="<?php echo $post_titlelink; ?>" />
							<button type="submit" name="edit_post_redirect" class="btn btn-style-five">Edit Post</button>
						</form>
						<form method="POST" action="<?php $_PHP_SELF; ?>" class="col-md-2 col-xs-12">
							<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
							<button type="submit" name="post_comments" class="btn btn-style-four" >View Comments</button>
						</form>
					</div>
            	</div>
            </div>
	    </div>
		<div class="row">
		    <h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Add More Posts</h2>
		    <div class="container well text-center w3-card-12">
		        <h1 class="text"><?php if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']); } ?></h1>
		    </div>
	        <div class="col-md-12">
	          <div class=" container well w3-card-24">
	                <?php include_once('../controller/posts_control.php'); ?>
	            <form action="<?php $_PHP_SELF; ?>" method="POST" id="postform" enctype="multipart/form-data">
	              <div class="form-group col-md-3">
	                  <label >Title</label>
	                  <input type="text" class="form-control col col-md-12" name="title" placeholder="" />
	              </div>
	              <div class="form-group col-md-3">
	                <label>Select Background Post Image*</label>
	                <input type="file" id="images1" class="hidden form-control" name="post_land_images" accept=".jpg, .png, .jpeg, .gif">
	                <label for="images1" class="btn btn-style-two btn-md" >Select picture</label>
	              </div>
	              <div class="form-group col-md-3">
	                <label>Select Other Images*</label>
	                <input type="file" id="images2" class="hidden form-control" name="post_other_images[]" accept=".jpg, .png, .jpeg, .gif" multiple="multiple" >
	                <label for="images2" class="btn btn-style-two btn-md" >Select picture</label>
	              </div>
	              <div class="form-group col-md-12">
	                <label class="col-md-12 " > Category*</label>
	                <?php for($i=0;$i<=$catcount-2;$i+=2): ?>
	                  <?php $category_name = str_replace(" ", "_", $category[$i+1]); ?>
	                  <div class="container col col-md-3" style="background-color:whitesmoke; color:green; padding: 0.1em">
	                    <pre style="border-width: 1px;" class="col-md-12"><?php echo $category[$i+1]; ?>&nbsp;<input type=checkbox name="<?php echo $category_name; ?>" value="<?php echo $category[$i]; ?>"/></pre>
	                  </div>
	                <?php endfor; ?>
	              </div>
	              <!--This is the template of the Text Editor-->
	              <div class="form-group col-md-12 col-sm-12 col-xs-12 " onload="iFrameOn()">
	                <label>Update *</label>
	            		<span class="alert-danger"></span>
                      <div id="edit_cb" style="width: 100%;padding: 1px">
                          <select id="fonts" class="col-md-2" onchange ="changeFont()" style="width:7em;">
                           <option value="Normal" selected>Normal</option>
                           <option value="Arial">Arial</option>
                           <option value="Comic Sans MS">Comic Sans MS</option>
                           <option value="Courier New">Courier New</option>
                           <option value="Monotype Corsiva">Monotype</option>
                           <option value="Tahoma New">Tahoma</option>
                           <option value="Times">Times</option>
                           <option value="Trebuchet New">Trebuchet</option>
                           <option value="Ubuntu">Ubuntu</option>
                          </select>
                          <input type="button" onclick="iBold()" value="B" class="btn btn-success" />
                          <input type="button" onclick="iItalic()" value="I" class="btn btn-success"/>
                          <input type="button" onclick="iUnderline()" value="U" class="btn btn-success"/>
                          <input type="number" id="FontSize" onclick ="iFontSize()" style="width: 4em;" />
                          <input type="button" onclick="iForeColor()" value="Color" class="btn btn-success"/>
                          <input type="button" onclick="iHorizontalRule()" value="HR" class="btn btn-success"/>
                          <input type="button" onclick="iUnorderedList()" value="Ul" class="btn btn-success"/>
                          <input type="button" onclick="iOrderedList()" value="Ol" class="btn btn-success"/>
                          <input type="button" onclick="iLink()" value="link" class="btn btn-success"/>
                          <input type="button" onclick="iUnlink()" value="unlink" class="btn btn-success"/>
                          <input type="file" oninput ="iImage()" value="" id="img" class="btn btn-success" style="display: none;" accept=".jpg, .png, .jpeg, .gif" multiple="multiple" />
                          <label for="img" class="btn btn-success">Image</label>
                      </div>
	                  <textarea style="" name="post" id="description" placeholder="Description" tabindex="2" required="required" class="form-control" rows="10"></textarea>
	                  <iframe style="width:100%;border-width: 1px;border-color: blue; min-height: 20em;" class="form-control" name="textEdit" id="textEdit"></iframe>
	              </div>

	              <div class="form-group" style="padding-bottom: 4em">
                    <div id="linkshowdiv" class="col-md-8"></div>
	                <button type="submit" name="addpost" class="btn btn-primary btn-style-four pull-right lead">Post</button>
	              </div>
	            </form>
	          </div>
	        </div>
    	</div>

		<div class="row">  <!--Fetch the Newsletters with edit and delete functionalities-->
			<h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Posts:</h2>
			<div class="col-sm-12 ">
		  <?php include_once('../controller/posts_edit_delete_control.php'); ?>
		  <div class="well w3-card-24 fetchsubscribersdiv animated bounceInUp ">
		      <?php include_once('../controller/adminfetchmoreposts.php'); ?>
		  </div>
			</div>
		</div>
		<!-- Styled Pagination -->
		<div class="styled-pagination text-center">
			<span id="result"></span>
			<hr style="border-width: 0.5em; ">
			<div class="row col-xs-12 text-right">
			  <?php 
			    echo $pageControl;
			  ?>
			</div>
		</div>
    </div>
  </div>
</div>
<?php include_once('footer.php'); ?>