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
		<h1 class="text-center" style="position: relative; z-index: 10; top : 20%; text-decoration: underline;text-decoration-style: double; padding-bottom: 0.2em;padding-top: 2em;"><a href="adminboard.php">Me And You</a> > <a href="posts.php">Posts</a> > <a href="post.php?by=<?php echo $post_id; ?>&title=<?php echo $post_titlelink; ?>">Post</a> >Post_edit</h1>

	    <!--Page Title-->
	    <section class="page-title" style="background-image:url(<?php echo $post_land_image; ?>);">
	        <div class="auto-container">
	            <h1><?php echo $post_title; ?></h1>
	        </div>
	    </section>
		<div class="row">
		    <h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Edit Posts Details</h2>
		    <div class="container well text-center w3-card-12">
		        <h1 class="text"><?php if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']); } ?></h1>
		    </div>
	        <div class="col-md-12">
	          <div class=" container well w3-card-24">
		  		<?php include_once('../controller/posts_edit_delete_control.php'); ?>

	            <form action="<?php $_PHP_SELF; ?>" method="POST" id="postform" enctype="multipart/form-data">
	              <div class="form-group col-md-3">
	                  <label >Title</label>
	                  <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
	                  <input type="text" class="form-control col col-md-12" name="title" placeholder="" value="<?php echo $post_title; ?>" />
	              </div>
	              <div class="form-group col-md-12">
	                <label class="col-md-12 " > Category*</label>
                    <?php $post_cat = explode(" ", $single[4] ); ?>
	                <?php for($i=0;$i<=$catcount-2;$i+=2): ?>
	                  <?php $category_name = str_replace(" ", "_", $category[$i+1]); ?>
	                  <div class="container col col-md-3" style="background-color:whitesmoke; color:green; padding: 0.1em">
	                    <?php if(in_array($category[$i], $post_cat)): ?>
	                    	<pre style="border-width: 1px;" class="col-md-12"><?php echo $category[$i+1]; ?>&nbsp;<input type=checkbox name="<?php echo $category_name; ?>" value="<?php echo $category[$i]; ?>" checked/></pre>
	                	<?php else: ?>
	                    	<pre style="border-width: 1px;" class="col-md-12"><?php echo $category[$i+1]; ?>&nbsp;<input type=checkbox name="<?php echo $category_name; ?>" value="<?php echo $category[$i]; ?>"/></pre>
	                    <?php endif; ?>
	                  </div>
	                <?php endfor; ?>

<?php 
		// Create a file to add the information in it. This will help us pre feed the iframe with the data for editing.
	$fd = new posts;
	$p = array('workdata');
	$pt = $fd->createUserDirectory($p);
		$filename = $pt."/editable.php";
		if(file_exists($filename)){
			unlink($filename);
		}
		$file = fopen($filename, "w");
		fwrite($file, $post_story);
 ?>
	              </div>
	              <!--This is the template of the Text Editor-->
	              <div class="form-group col-md-12 col-sm-12 col-xs-12 " onload="iFrameOn()">
	                <label>Update *</label>
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
                      	<input type="file" oninput ="iImage()" value="" id="img" class="btn btn-success" style="display: none;" accept=".jpg, .png, .jpeg, .gif" multiple="multiple"/>
                      	<label for="img" class="btn btn-success">Image</label>
                    </div>
	                  <textarea style="" name="post" id="description" placeholder="Description" tabindex="2" required="required" class="form-control" rows="10"></textarea>
	                  <iframe style="width:100%;border-width: 1px;border-color: blue;min-height:30em;min-height: 20em;" class="form-control" name="textEdit" id="textEdit" src="../workdata/editable.php"></iframe>
	              </div>

	              <div class="form-group" style="padding-bottom: 4em">
	              	<div id="linkshowdiv" class="col-md-8"></div>
	                <button type="submit" name="editpost" class="btn btn-primary btn-style-four pull-right lead">Save Edit</button>
	              </div>
	            </form>
	          </div>
	        </div>
    	</div>
		<hr style="border-width: 0.5em; ">
    	<div class="row">
    		<h3>Change the Preview Picture:</h3>
			<form action="<?php $_PHP_SELF; ?>" method="POST" id="postform" enctype="multipart/form-data">
				<div class="form-group col-md-3">
				<label>Select Preview Image*</label>
	            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
				<input type="file" id="images1" class="hidden form-control" name="post_land_images" accept=".jpg, .png, .jpeg, .gif">
				<label for="images1" class="btn btn-style-two btn-md" >Select picture</label>
				</div>

				<div class="form-group" style="padding-bottom: 4em">
				<button type="submit" name="changelandpicture" class="btn btn-primary btn-style-four pull-right lead">Change</button>
				</div>
			</form>   		
    	</div>
		<hr style="border-width: 0.5em; ">
    	<div class="row">
    		<h3>Add More Pictures:</h3>
			<form action="<?php $_PHP_SELF; ?>" method="POST" id="postform" enctype="multipart/form-data">
				<div class="form-group col-md-3">
				<label>Select Other Images*</label>
	            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
				<input type="file" id="images2" class="hidden form-control" name="post_other_images[]" accept=".jpg, .png, .jpeg, .gif" multiple="multiple" >
				<label for="images2" class="btn btn-style-two btn-md" >Select picture</label>
				</div>

				<div class="form-group" style="padding-bottom: 4em">
				<button type="submit" name="addotherpicture" class="btn btn-primary btn-style-four pull-right lead">Add Picture</button>
				</div>
			</form>   		
    	</div>
    </div>
  </div>
</div>
<?php include_once('footer.php'); ?>