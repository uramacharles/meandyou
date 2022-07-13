

      <?php
      $fetch = new register;
      $results = $fetch->adminFetchProfiles();
      $count = count($results);
          //$this->items = array("id","name","description","phone_number","email");
       if(empty($results)): ?>
          <h3 style="color: green; padding-bottom: 2em; font-weight: bold;">Sorry, You will be updated soon.</h3>
       <?php else:?>

                      <?php for($i=0;$i<=$count-5;$i+=5):?>

                        <div class="row clearfix" style="background-color: white">
                            <!--Info Column-->
                            <h3 class="col-md-12 text-center"  style="border-top-width: 1em;border-top-color: green;color:blue;"><?php echo $results[$i+1]; ?></h3>
                            <div class="info-column col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="column-header"><h3>About</h3></div>
                                <div class="info-box">
                                    <div class="inner">
                                        <div class="icon"><span class="flaticon-user-1"></span></div>
                                        <h4></h4>
                                        <div class="text"><?php echo $results[$i+2]; ?></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--Info Column-->
                            <div class="info-column col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                              <?php $number = explode(";", $results[$i+3]); ?>
                                <div class="column-header"><h3>Phone Number(s)</h3></div>
                                <div class="info-box">
                                    <div class="inner">
                                        <div class="icon"><span class="flaticon-technology-4"></span></div>
                                        <h4>Call On</h4>
                                        <?php foreach($number as $values): ?>
                                          <div class="text"><?php echo $values; ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <!--Info Column-->
                            <div class="info-column col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <div class="column-header"><h3>Email us</h3></div>
                                <div class="info-box">
                                    <div class="inner">
                                        <div class="icon"><span class="flaticon-envelope"></span></div>
                                        <h4>Info Services</h4>
                                        <div class="text"><?php echo $results[$i+4]; ?></div>
                                        <div class="text">info@meandyou.com</div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                      <?php endfor; ?>
      <?php endif; ?>