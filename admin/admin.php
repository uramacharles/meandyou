<?php
  include_once('../controller/adminautoload.php');
  include_once('../controller/adminonlysessioncontrol.php');
?>
<?php include_once('header.php'); ?>
  <body>
<?php include_once('adminnav.php'); ?>

<div class="w3-main" id="main">

  <div class="container" id="hide" >

    <div class="container animated fadeInLeftBig" >
      <h1 class="text-center" style="position: relative; z-index: 10; top : 20%; text-decoration: underline;text-decoration-style: double; padding-bottom: 0.2em;padding-top: 2em;"><a href="adminboard.php">Me And You </a> >Admin</h1>

<?php
  include_once('../controller/admincontrol.php');
?>
      <div class="row">
        <h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Admin:</h2>
        <div class="container well text-center w3-card-12">
            <h1 class="text"><?php if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']); } ?></h1>
        </div>
        <div class="col-sm-12 ">
         <div class="row">
            <h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Add Admin</h2>
            <div class="col-sm-8 col-sm-offset-2">
              <div class="well w3-card-24">
                <div class="contact-form default-form">
                    <form method="POST" action="<?php $_PHP_SELF; ?>" enctype="multipart/form-data">
                        <div class="row clearfix">
                        
                            <div class="form-group col-md-4 col-sm-6 col-xs-12" >
                                <label>Name</label>
                                <input type="text" name="name" value="" placeholder="Name *">
                            </div>

                            <div class="form-group col-md-4 col-sm-6 col-xs-12" >
                              <label>Username</label>
                                <input type="text" name="username" value="" placeholder="Username *">
                            </div>

                            <div class="form-group col-md-4 col-sm-6 col-xs-12" >
                              <label>Password</label>
                                <input type="password" name="password" value="" placeholder="password *">
                            </div>

                            <div class="form-group col-md-4 col-sm-6 col-xs-12" >
                                <label>Retype Password</label>
                                <input type="password" name="ret_password" value="" placeholder="retype password *">
                            </div>

                            <div class="form-group col-md-4 col-sm-6 col-xs-12" >
                                <label>Email</label>
                                <input type="email" name="email" value="" placeholder="Recovery Email *">
                            </div>

                            <div class="form-group col-md-4 col-sm-6 col-xs-12" >
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" value="" placeholder="080... or 090....;080...*">
                            </div>
                    
                            <div class="form-group col-md-4 col-sm-6 col-xs-12" >
                                <label>Level</label>
                                <select name="level">
                                  <?php $get = new register; $level = $get->getlevel(); $levcount = count($level); ?>
                                  <?php for($p=0;$p<=$levcount-2;$p+=2): ?>
                                    <option value="<?php echo $level[$p+1]; ?>"><?php echo $level[$p+1]; ?></option>
                                  <?php endfor; ?>
                                </select>
                            </div>

                            <!--This is the template of the Text Editor-->
                            <div class="form-group col-md-12 col-sm-12 col-xs-12 " onload="iFrameOn()">
                              <label>Short description *</label>
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
                                <textarea style="" name="description" id="description" placeholder="Description" tabindex="2" required="required" class="form-control" rows="10"></textarea>
                                <iframe style="width:100%;border-width: 1px;border-color: blue;min-height: 20em;" class="form-control" name="textEdit" id="textEdit"></iframe>
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-center"><button type="submit" name="addadmin" class="theme-btn btn-style-one">Submit Now </button></div>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<?php include_once('footer.php'); ?>