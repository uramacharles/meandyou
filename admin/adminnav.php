  
  <?php $_SESSION['lastaddress'] = $_SERVER['PHP_SELF']; ?>
           <!-- Preloader -->
    <div class="preloader"></div>

  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="adminboard.php">Dashboard</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i>Admin  <i class="fa fa-caret-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="admin.php"><i class="fa fa-user-plus"></i> Add Admin</a></li>
            <li><a href="editadmin.php"><i class="fa fa-eye"></i> View Profile</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-wrench"></i>Working Data<i class="fa fa-caret-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="category.php"><i class="fa fa-upload"></i> category</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-book"></i>  News/Updates<i class="fa fa-caret-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="posts.php"><i class="fa fa-upload"></i> Post Updates</a></li>
            <li><a href="fishpost.php"><i class="fa fa-upload"></i> Post by Url</a></li>
            <li><a href="visitors.php"><i class="fa fa-eye"></i> View Visitors</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th"></i></a>
					<ul class="dropdown-menu col-md-2">
						<li>
              <form action="<?php $_PHP_SELF; ?>" method="POST" class="container">
                <button type="submit" class="btn btn-default " name="<?php echo $state;?>"><i class="fa fa-sign-out"></i><?php echo $state;?></button>
              </form>
              </li>
						<li><a href="editadmin.php"> <i class=" glyphicon glyphicon-wrench"></i> Settings</a></li>
					</ul><!-- end dropdown-menu -->
				</li>
        <li>  <a href="<?php $_PHP_SELF; ?>"><i class="fa fa-refresh"></i></a></li>
      </ul>
    </div>
  </div>
</nav>