<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo SITE_TITLE; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo FRONT_PLUGINS_V2; ?>fontawesome-free/css/all.min.css">
  
  
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo FRONT_PLUGINS_V2; ?>overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo FRONT_CSS_V2; ?>adminlte.min.css">
   <link rel="stylesheet" href="<?php echo FRONT_CSS_V2; ?>layout.css">
  <script type="text/javascript" src="<?php echo FRONT_JS_V2; ?>chartjs/canvasjs.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="<?php echo FRONT_IMG_V2; ?>logo.jpg" alt="<?php echo SITE_TITLE; ?>" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!--<li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>-->

     
      <!-- Notifications Dropdown Menu -->
      <!--<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>-->
      
      <!--<li class="nav-item">
        <div class="user-panel d-flex">
        <div class="image">
          <img src="<?php echo FRONT_IMG_V2; ?>logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo isset($user_email)?$user_email:"Alex";?></a>
        </div>
      </div>
      </li>-->
	  
	  
                <li class="dropdown user user-menu open">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <img src="<?php echo FRONT_IMG_V2; ?>avatar5small.png" class="img-circle elevation-2" alt="User Image">
                        <span class="hidden-xs"><?php echo isset($user_email)?$user_email:"Alex";?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo FRONT_IMG_V2; ?>avatar5.png" class="img-circle" alt="User Image">

                            <p>
                                Alexander - Staff
                                <small>Member since May. 2021</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!--<li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            
                        </li>-->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url("logout")?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
				
	  
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>" class="brand-link">
      <img src="<?php echo FRONT_IMG_V2; ?>logo.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
    </a>

     <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!--<li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          </li>-->
		  <li class="nav-item">
            <a href="<?php echo base_url();?>" class="nav-link <?php echo (isset($last_segment) && $last_segment=="dashboard")?"active":""; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard
              </p>
            </a>
          </li>
		  <?php if(true || isset($user_type) && $user_type==1) { ?>
          <li class="nav-item">
            
			<a href="#" class="nav-link <?php echo (isset($last_segment) && $last_segment=="patients")?"active":""; ?> ">
              <i class="nav-icon fas fa-wheelchair"></i>
              <p>
                  Recipients
                <i class="fas fa-angle-right right"></i>
                
              </p>
            </a>
			<ul class="nav nav-treeview" style="display: none;">
              
              <li class="nav-item">
                <a href="<?php echo base_url("manage-patients");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Recipients</p>
                </a>
              </li>
			   <li class="nav-item">
                <a href="<?php echo base_url("manage-departments");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Departments</p>
                </a>
              </li>
            </ul>
          </li>
		  <?php } ?>
		  <?php if(true || isset($user_type) && ($user_type==2 || $user_type==1)) { ?>
          <li class="nav-item">
            <a href="#" class="nav-link <?php echo (isset($last_segment) && $last_segment=="devices")?"active":""; ?> ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                  Envelope
                <i class="fas fa-angle-right right"></i>
                
              </p>
            </a>
			<ul class="nav nav-treeview" style="display: none;">
              <!--<li class="nav-item">
                <a href="<?php echo base_url("add-device");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Device</p>
                </a>
              </li>-->
              
              <li class="nav-item">
                <a href="<?php echo base_url("manage-devices");?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Envelope</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="<?php echo base_url("manage-envelope-documents");?>" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Envelope Documents</p>
                </a>
            </li>
			  <li class="nav-item">
                <a href="<?php echo base_url("manage-device-orders");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Envelope Orders</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?php echo base_url("import-devices");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import Envelope</p>
                </a>
              </li>
			  
					
									
            </ul>
          </li>
		  <?php } ?>
		  
		  <?php if(true || isset($user_type) && ($user_type==2 || $user_type==1)) { ?>
          <li class="nav-item">
            <a href="#" class="nav-link <?php echo (isset($last_segment) && $last_segment=="orders")?"active":""; ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Order information
                <i class="fas fa-angle-right right"></i>
                
              </p>
            </a>
			<ul class="nav nav-treeview" style="display: none;">
              <!--<li class="nav-item">
                <a href="<?php echo base_url("add-order");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Order</p>
                </a>
              </li>-->
              
              <li class="nav-item">
                <a href="<?php echo base_url("manage-orders");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Orders</p>
                </a>
              </li>
			  
			  
					
									
            </ul>
          </li>
		  <?php } ?>

            <?php if(true || isset($user_type) && ($user_type==2 || $user_type==1)) { ?>
                <li class="nav-item">
                    <a href="<?php echo base_url("manage-users");?>" class="nav-link <?php echo (isset($last_segment) && $last_segment=="users")?"active":""; ?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Users information

                        </p>
                    </a>
                </li>
            <?php } ?>
		 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
			
			
			
	<?php echo $contents; ?>
	
	
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">Medzah</a>.</strong>
    All rights reserved.

  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo FRONT_PLUGINS_V2; ?>jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo FRONT_PLUGINS_V2; ?>bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo FRONT_PLUGINS_V2; ?>overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo FRONT_JS_V2; ?>adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo FRONT_PLUGINS_V2; ?>jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo FRONT_PLUGINS_V2; ?>raphael/raphael.min.js"></script>
<script src="<?php echo FRONT_PLUGINS_V2; ?>jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo FRONT_PLUGINS_V2; ?>jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo FRONT_PLUGINS_V2; ?>chart.js/Chart.min.js"></script>


<!-- AdminLTE for demo purposes -->
<script src="<?php echo FRONT_JS_V2; ?>demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo FRONT_JS_V2; ?>pages/dashboard2.js"></script>

<script src="<?php echo FRONT_PLUGINS_V2; ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo FRONT_PLUGINS_V2; ?>datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo FRONT_PLUGINS_V2; ?>datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo FRONT_PLUGINS_V2; ?>datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo FRONT_PLUGINS_V2; ?>datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo FRONT_PLUGINS_V2; ?>datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo FRONT_PLUGINS_V2; ?>jszip/jszip.min.js"></script>
<script src="<?php echo FRONT_PLUGINS_V2; ?>pdfmake/pdfmake.min.js"></script>
<script src="<?php echo FRONT_PLUGINS_V2; ?>pdfmake/vfs_fonts.js"></script>
<script src="<?php echo FRONT_PLUGINS_V2; ?>datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo FRONT_PLUGINS_V2; ?>datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo FRONT_PLUGINS_V2; ?>datatables-buttons/js/buttons.colVis.min.js"></script>	

<script src="<?php echo FRONT_JS_V2; ?>bootstrap-select.min.js"></script>

</body>
</html>
