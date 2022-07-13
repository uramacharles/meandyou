<?php
$fetch = new register;
$results = $fetch->adminFetchProfile();
        //array("id","name","description","phone_number","level","username1","username2","date","email");
?>
<div class="container">
    <div class="container">
        <div class="col-sm-5 wow fadeIn">
            <h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Edit First Username And Password</h2>
            <div class="well w3-card-24">
                <div class="contact-form default-form">
                    <form method="post" action="<?php $_PHP_SELF; ?>" >
                        <div class="row clearfix">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12" >
                            	<label>Username</label>
                            	<input type="hidden" name="id" value="<?php echo $results[0];?>"/>
                                <input type="text" name="username" value="<?php echo $results[5];?>" placeholder="Username *">
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12" >
                            	<label>Old Password</label>
                                <input type="password" name="old_password" value="" placeholder="Old Password *">
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12" >
                            	<label>New Password</label>
                                <input type="password" name="new_password" value="" placeholder="New Password *">
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-center"><button type="submit" name="changefirst" class="theme-btn btn-style-one">Make Change To The First Password</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-5 wow fadeIn">
        	<h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Edit Second Username And Password</h2>
          <div class="well w3-card-24">
            <div class="contact-form default-form">
                <form method="post" action="<?php $_PHP_SELF; ?>" >
                    <div class="row clearfix">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12" >
                        	<label>Username</label>
                        	<input type="hidden" name="id" value="<?php echo $results[0];?>"/>
                            <input type="text" name="username" value="<?php echo $results[6];?>" placeholder="Username *">
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12" >
                        	<label>Old Password</label>
                            <input type="password" name="old_password" value="" placeholder="Old Password *">
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12" >
                        	<label>New Password</label>
                            <input type="password" name="new_password" value="" placeholder="New Password *">
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="text-center"><button type="submit" name="changesecond" class="theme-btn btn-style-one">Make Change To The Second Password</button></div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    <div class="container">
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
                fwrite($file, $results[2]);
         ?>
        <div class="col-sm-5 wow fadeIn">
            <h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Edit Name, Phone Number And Description</h2>
          <div class="well w3-card-24">
            <div class="contact-form default-form">
                <form method="post" action="<?php $_PHP_SELF; ?>" >
                    <div class="row clearfix">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12" >
                            <label>Name:</label>
                            <input type="hidden" name="id" value="<?php echo $results[0];?>"/>
                            <input type="text" name="name" value="<?php echo $results[1];?>" placeholder="Name *">
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12" >
                            <label>Phone Number:</label>
                            <input type="text" name="phone_number" value="<?php echo $results[3];?>" placeholder="Email *">
                        </div>

                        <!--This is the template of the Text Editor-->
                        <div class="form-group col-md-12 col-sm-12 col-xs-12 " onload="iFrameOn()">
                            <label>Short description *</label>
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
                            <textarea style="" name="description" id="description" placeholder="Description" tabindex="2" required="required" class="form-control" rows="10"><?php echo $results[2]; ?></textarea>
                            <iframe style="width:100%;border-width: 1px;border-color: blue;min-height: 20em;" class="form-control" name="textEdit" id="textEdit" src="../workdata/editable.php"></iframe>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div id="linkshowdiv" class="col-md-8"></div>
                            <div class="text-center"><button type="submit" name="details" class="theme-btn btn-style-one">Save Changes</button></div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
        <div class="col-sm-5 wow fadeIn">
            <h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-edit"></span> Edit Email</h2>
            <div class="well w3-card-24">
                <div class="contact-form default-form">
                    <form method="post" action="<?php $_PHP_SELF; ?>" >
                        <div class="row clearfix">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12" >
                                <label>Email:</label>
                                <input type="hidden" name="id" value="<?php echo $results[0];?>"/>
                                <input type="text" name="email" value="<?php echo $results[8];?>" placeholder="Email *">
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-center"><button type="submit" name="changeemail" class="theme-btn btn-style-one">Change Recovery Email</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-5 wow fadeIn">
            <h2 class="page-header text-center" style="margin: 30px 20px">
                <span class="fa fa-edit"></span>Level: <?php echo $results[4];?>
            </h2>
        </div>
    </div>
</div>