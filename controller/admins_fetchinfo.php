<?php
$fetch = new register;
$results = $fetch->super_adminFetchProfiles();
$count = count($results);
        //$this->items = array("id","name","description","phone_number","level","email");
 if(empty($results)): ?>
    <h3 style="color: green; padding-bottom: 2em; font-weight: bold;">No Admin is yet added. Only You are the Existing Admin</h3>
 <?php else:?>

        <div class="container">
            <div class="container">
                <?php for($i=0;$i<=$count-6;$i+=6):?>
                    <div class="col-sm-5 wow fadeIn">
                        <h2 class="page-header text-center" style="margin: 30px 20px">
                            <span class="fa fa-edit"></span><?php echo $results[$i+1];?>
                        </h2>

                      <div class="well w3-card-24">
                        <div class="contact-form default-form">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" >
                                        <?php $number = explode(";", $results[3]); ?>
                                        <label>Phone Number:</label>
                                        <?php foreach ($number as $value):?>
                                            <input type="text" disabled="disabled" name="name" value="<?php echo $value;?>" placeholder="">
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" >
                                        <label>Email:</label>
                                        <input type="text" disabled="disabled" name="email" value="<?php echo $results[$i+5];?>" placeholder="">
                                    </div>

                                    <!--This is the template of the Text Editor-->
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 " onload="iFrameOn()">
                                      <label>Short description *</label>
                                      <pre>
                                          <?php echo $results[$i+2]; ?>
                                      </pre>
                                    </div>

                            <form method="post" action="<?php $_PHP_SELF; ?>" >
                                <div class="row clearfix">
                                        <div class="form-group col-md-4 col-sm-6 col-xs-12" >
                                            <input type="hidden" value="<?php echo $results[$i]; ?>" name="admin_id" />
                                            <label>Change Level:</label>
                                            <select name="level">
                                              <?php $get = new register; $level = $get->getlevel(); $levcount = count($level); ?>
                                              <?php for($p=0;$p<=$levcount-2;$p+=2): ?>
                                                <?php if($results[$i+4] == $level[$p+1]): ?>
                                                    <option value="<?php echo $level[$p+1]; ?>" selected><?php echo $level[$p+1]; ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $level[$p+1]; ?>"><?php echo $level[$p+1]; ?></option>
                                                <?php endif; ?>
                                              <?php endfor; ?>
                                            </select>
                                        </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="text-center"><button type="submit" name="change_level" class="theme-btn btn-style-one">Save Changes</button></div>
                                    </div>  
                                </div>
                            </form>
                              <div class="col-xs-12">
                                <form method="POST" action="<?php $_PHP_SELF; ?>" enctype="multipart/form-data">
                                  <input type="hidden" name="admin_id" value="<?php echo $results[0]; ?>">
                                  <input type="submit" name="delete_admin" class=" btn btn-style-four" value="Delete Admin"/>
                                </form>
                              </div>
                        </div>
                      </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
<?php endif; ?>