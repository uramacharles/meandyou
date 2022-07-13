<?php include_once("controller/autoload.php"); ?>
<?php include_once("controller/u_fetchsinglepublications.php"); ?>
<?php include_once("header.php");?>

<body>
<div class="page-wrapper"> 
      <?php include_once("navigation.php");?>

        <!--Page Title-->
        <section class="page-title" style="background-image:url(<?php echo $post_land_image; ?>); border-top-width: 4em;border-top-color: black;">
            <div class="auto-container">
                <h1><?php echo $post_title; ?></h1>
            </div>
        </section>


    <!--Sidebar Page-->
    <div class="sidebar-page-container">
                <!--Content Side-->      
                <div class="content-side col-lg-9 col-md-8">
                    <!-- Search Form -->
                    <div class="text-center visible-sm visible-xs" style="margin: auto;">
                        <div class="alert alert-danger" role="alert"></div>
                        <form method="POST" action="<?php $_PHP_SELF; ?>" id="searchform">
                            <div class="form-group">
                                <input type="search" id="search" name="searchitem" value="" placeholder="Search Now">
                                <button type="submit" name="search"><span class="icon fa fa-search"></span></button>
                            </div>
                        </form>
                        <div id="likeresult"></div>
                    </div>
                    
                    <section class=" col-md-10 col-md-offset-1" id="searchresults">
                        <div class="subtitle">

                            <?php  echo $post_category; ?>
                            
                        </div>
                        <div class="content" style="text-align: justify; ">
                            <?php echo $post_story; ?>
                        </div>
                        <div class="row" style="padding-bottom: 2em; border-bottom-color: blue;border-bottom-width: 0.5em;">
                            <span><a href="<?php echo $source; ?>">Source</a></span>||<i style="color: red;font-size:15px;"><?php echo $post_date_updated; ?></i>
                        </div>  
                        <div class="row">
                            <?php for($j=0;$j<$imgcount;$j++): ?>
                                <div class="container default-portfolio-item col-md-3 col-sm-12 col-xs-12 ">
                                    <div class="inner-box" style="color:green;font-weight: bold;border-radius:5%; max-width: 8em;min-height: 8em;">
                                        <figure class="image-box">
                                            <?php $pid = bcsub( bcmul($post_id, 12) , 3); ?>
                                            <a href="galary.php?ty=p&g_id=<?php echo $pid; ?>"><img src="<?php $im = new posts;  echo $im->formatUrl($post_other_image[$j]); ?>" alt=""/></a>
                                        </figure>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                        <!--
                            for comments
                        -->  
                        <div class="row well w3-card-24" style="width: 100%; height:30em;">
                            <?php include_once("controller/u_comment_control.php"); ?>
                            <form action="<?php $_PHP_SELF; ?>" method="POST" id="postform" enctype="multipart/form-data">
                              <div class="form-group col-md-12">
                                  <label >Email</label>
                                  <input type="hidden" class="form-control col col-md-12" name="post_id" placeholder="" required="required" value="<?php echo $post_id; ?>" />
                                  <input type="email" class="form-control col col-md-12" name="email" placeholder="" required="required" />
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
                                        <input type="file" oninput ="iImage()" value="" id="img" class="btn btn-success" style="display: none;" accept=".jpg, .png, .jpeg, .gif" multiple="multiple"/>
                                        <label for="img" class="btn btn-success">Image</label>
                                    </div>
                                    <textarea style="display:none;" name="comment" id="description" placeholder="Description" tabindex="2" required="required" rows="10"></textarea>
                                    <iframe style="width:100%;border-width: 1px;border-color: blue;height: 15em;min-height: 20em;" class="form-control" name="textEdit" class="form-control" id="textEdit"></iframe>
                                </div>
                                <div class="form-group" style="padding-bottom: 4em">
                                    <button type="submit" name="submit_comment" class="btn btn-primary btn-style-four pull-right lead">check</button>
                                </div>
                            </form>
                        </div>

                        <div class="row col-xs-12">
                            <?php include_once("controller/u_comment_few.php"); ?>
                        </div>
                        <div class="row col-xs-12" id="viewalldiv">
                            <?php include_once("controller/u_comment_all.php"); ?>
                        </div>
                    </section>
                    <!--section class="row col-md-12" style="padding-bottom: 4em;max-height: 10em">
                        <!-- Recent Posts ->
                        <div class="sidebar-title"><h3>Latest publications</h3></div>
                        <div class="slider slider_one_big_picture text-center visible-sm visible-xs">
                            <?php //include('controller/u_getlatestpublications.php'); ?>
                        </div> 
                    </section-->
                </div><!--End Content Side-->
                <!--Sidebar This box should show if the page is in small medium or large screen-->      
                <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 visible-md visible-lg">
                    <aside class="sidebar">
                        <!-- Search Form -->
                        <div class="widget search-box sidebar-widget">
                            <div class="alert alert-danger" role="alert"></div>
                            <form method="POST" action="<?php $_PHP_SELF; ?>" id="searchform">
                                <div class="form-group">
                                    <input type="search" id="search" name="searchitem" value="" placeholder="Search Now">
                                    <button type="submit" name="search"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                            <div id="likeresult"></div>
                        </div>
                        
                        <!-- Recent Posts -->
                        <div class="widget recent-posts sidebar-widget">
                            <div class="sidebar-title"><h3>Latest publications</h3></div>
                            <?php include('controller/u_getlatestpublications.php'); ?>
                        </div>
                    </aside>
                </div><!--End Sidebar-->  
    </div>

</div>
<!--End pagewrapper-->
<!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-long-arrow-up"></span></div>
    <?php include("footer.php");?>
</body>
</html>