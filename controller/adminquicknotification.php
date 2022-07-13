<?php 
$notify = new visitors;
$visitors = $notify->getTotalVisitors();
?>
  <!-- Start Row -->
  <div class="row">
    <h2 class="page-header text-center" style="margin: 30px 20px"><span class="fa fa-bell"></span> Quick Notifications</h2>
    <!-- Start Quick Menu -->
    <div class="col-md-12">     
      <ul class="panel quick-menu clearfix" style="margin: auto; width: 60%;">
        <li class="col-sm-6">
          <a href="visitors"><i class="fa fa-user-plus"></i>Registered visitors<span class="label label-danger"><?php if(isset($visitors)){echo $visitors;} ?></span></a>
        </li>
      </ul>
      <!-- End Quick Menu -->
    </div>
  </div>
  <!-- End Row -->