<?php
  include_once('../controller/adminautoload.php');
  include_once('../controller/adminonlysessioncontrol.php');
  include_once('../controller/posts_edit_redirect_control.php');
?>
<?php include_once('header.php'); ?>
  <body>
<?php include_once('adminnav.php'); ?>

<div class="w3-main" id="main">

  <div class="container" id="hide" >

    <div class="container animated fadeInLeftBig" >
		<h1 class="text-center" style="position: relative; z-index: 10; top : 20%; text-decoration: underline;text-decoration-style: double; padding-bottom: 0.2em;padding-top: 2em;"><a href="adminboard.php">Me And You </a> > <a href="posts.php">Posts</a> ><a href="post.php?by=<?php echo $post_id; ?>&title=<?php echo $post_titlelink; ?>">Post</a> > comments </h1>

	    <!--Page Title-->
	    <section class="page-title" style="background-image:url(<?php echo $post_land_image; ?>);">
	        <div class="auto-container">
	            <h1><?php echo $post_title; ?></h1>
	            <i><a href="<?php echo $source; ?>">Source</a></i>
	        </div>
	    </section>

	    <div class="container documents" >
            <div class="column col-sm-12 col-xs-12">
                     
		  		<?php include_once('../controller/posts_edit_delete_control.php'); ?>
            	<div class="row">
					<div class="pannel">
						<div class="pannel-head"><legend style="color:blue;font-weight:bold">Comments:</legend></div>
						<?php if(is_array($addcomm)): ?>
		            		<?php for($j=0;$j<=$adcomcount-4;$j+=4): ?>
								<div class="pannel-body">
									<label style="color:blue"><?php echo $addcomm[$j+1]; ?></label>
									<pre><?php echo $addcomm[$j+2]; ?></pre>
									<i><?php echo $addcomm[$j+3]; ?></i>
								</div>
								<hr style="border-color:red;" />
								<div class="col-md-12">
									<form method="POST" action="<?php $_PHP_SELF; ?>" >
										<input type="hidden" name="comm_id" value="<?php echo $addcomm[$j]; ?>" />
										<button type="submit" name="delete_comment" class="btn btn-style-one">Delete Comment</button>
									</form>
								</div>
					        <?php endfor; ?>
						<?php else: ?>
							<div class="pannel-footer"><span class="pull-right">No Comment Yet</span></div>
						<?php endif; ?>
            		</div>
            	</div>
            </div>
	    </div>
		<div class="row ">
			<form method="POST" action="<?php $_PHP_SELF; ?>" >
				<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
				<input type="hidden" name="post_title" value="<?php echo $post_titlelink; ?>" />
				<button type="submit" name="edit_post_redirect" class="btn btn-style-five">Edit Post</button>
			</form>
		</div>

		<div class="row">  <!--Fetch the Newsletters with edit and delete functionalities-->
			<h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Posts:</h2>
			<div class="col-sm-12 ">
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