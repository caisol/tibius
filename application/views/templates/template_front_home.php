<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo SITE_TITLE; ?></title>
	<!-- Fav  Icon Link -->
	<link rel="shortcut icon" type="image/png" href="<?php echo FRONT_IMAGES?>fav.png">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?php echo FRONT_CSS?>bootstrap.min.css">
	<!-- themify icons CSS -->
	<link rel="stylesheet" href="<?php echo FRONT_CSS?>themify-icons.css">
	<!-- Animations CSS -->
	<link rel="stylesheet" href="<?php echo FRONT_CSS?>animate.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="<?php echo FRONT_CSS?>styles.css">
	<link rel="stylesheet" href="<?php echo FRONT_CSS?>green.css" id="style_theme">
	<link rel="stylesheet" href="<?php echo FRONT_CSS?>responsive.css">
	<!-- morris charts -->
	<link rel="stylesheet" href="<?php echo FRONT?>charts/css/morris.css">
	
		<link href="<?php echo FRONT_CSS?>select2.min.css" rel="stylesheet" />

	<!-- jvectormap -->
	<link rel="stylesheet" href="<?php echo FRONT_CSS?>jquery-jvectormap.css">
	


	<script src="<?php echo FRONT_JS?>modernizr.min.js"></script>
</head>

<body>
	<!-- Pre Loader -->
	<div class="loading">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div>
	<!--/Pre Loader -->
	
	<div class="wrapper">		
		<!-- Page Content -->
		<div id="content">
			<!-- Top Navigation -->
			<div class="container top-brand">
				<nav class="navbar navbar-default">			
					<div class="navbar-header">
						<div class="sidebar-header"> <a href="<?php echo base_url("");?>"><img src="<?php echo FRONT_IMAGES?>logo-dark.png" class="logo" alt="logo"></a>
						</div>
					</div>
					<ul class="nav justify-content-end">
						<li class="nav-item">
							<a class="nav-link">
								<span title="Fullscreen" class="ti-fullscreen fullscreen"></span>
							</a>							
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="modal" data-target=".proclinic-modal-lg">
								<span class="ti-search"></span>
							</a>
							<div class="modal fade proclinic-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lorvens">
									<div class="modal-content proclinic-box-shadow2">
										<div class="modal-header">
											<h5 class="modal-title">Search Patient/Doctor:</h5>
											<span class="ti-close" data-dismiss="modal" aria-label="Close">
											</span>
										</div>
										<div class="modal-body">
											<form>
												<div class="form-group">
													<input type="text" class="form-control" id="search-term" placeholder="Type text here">
													<button type="button" class="btn btn-lorvens proclinic-bg">
														<span class="ti-location-arrow"></span> Search</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
							 aria-expanded="false">
								<span class="ti-announcement"></span>
							</a>
							<div class="dropdown-menu proclinic-box-shadow2 notifications animated flipInY">
								<h5>Notifications</h5>
								<a class="dropdown-item" href="#">
									<span class="ti-wheelchair"></span> New Patient Added</a>
								<a class="dropdown-item" href="#">
									<span class="ti-money"></span> Patient payment done</a>
								<a class="dropdown-item" href="#">
									<span class="ti-time"></span>Patient Appointment booked</a>
								<a class="dropdown-item" href="#">
									<span class="ti-wheelchair"></span> New Patient Added</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
							 aria-expanded="false">
								<span class="ti-user"></span>
							</a>
							<div class="dropdown-menu proclinic-box-shadow2 profile animated flipInY">
								<h5><?php echo isset($user_name)?$user_name:"User";?></h5>
								<a class="dropdown-item" href="#">
									<span class="ti-settings"></span> Settings</a>
								<a class="dropdown-item" href="#">
									<span class="ti-help-alt"></span> Help</a>
								<a class="dropdown-item" href="<?php echo base_url("logout");?>">
									<span class="ti-power-off"></span> Logout</a>
							</div>
						</li>
					</ul>
			
				</nav>
			</div>
			<!-- /Top Navigation -->
			<!-- Menu -->
			<div class="container menu-nav">
				<nav class="navbar navbar-expand-lg proclinic-bg text-white">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="ti-menu text-white"></span>
					</button>
			
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item dropdown active">
								<a class="nav-link "  href="<?php echo base_url("");?>" > Dashboard</a>
								<!--<div class="dropdown-menu">
									<a class="dropdown-item" href="../Vertical/index.html">Vertical</a>
									<a class="dropdown-item" href="../Vertical-RTL/index.html">Vertical RTL</a>
									<a class="dropdown-item" href="index.html">Horizantal</a>
								</div>-->
							</li>
							<?php if(true || isset($user_type) && $user_type==1) { ?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
								 aria-expanded="false"><span class="ti-wheelchair"></span> Patients</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="<?php echo base_url("add-patient");?>">Add Patient</a>
									<a class="dropdown-item" href="<?php echo base_url("manage-patients");?>">All Patients</a>
									<!--<a class="dropdown-item" href="about-patient.html">Patient Details</a>
									<a class="dropdown-item" href="edit-patient.html">Edit Patient</a>-->
								</div>
							</li>
							<?php } ?>
							<?php if(true || isset($user_type) && ($user_type==2 || $user_type==1)) { ?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
								 aria-expanded="false"><span class="ti-user"></span> Devices</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="<?php echo base_url("add-device");?>">Add Device</a>
									<a class="dropdown-item" href="<?php echo base_url("manage-devices");?>">All Devices</a>
									<a class="dropdown-item" href="<?php echo base_url("manage-device-orders");?>">Device Orders</a>
									<a class="dropdown-item" href="<?php echo base_url("import-devices");?>">Import Devices</a>
								</div>
							</li>
							<?php } ?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
								 aria-expanded="false"><span class="ti-pencil-alt"></span> Order information</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="<?php echo base_url("add-order");?>">Add Order</a>
									<a class="dropdown-item" href="<?php echo base_url("manage-orders");?>">All Orders</a>
								</div>
							</li>
							<!--<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
								 aria-expanded="false"><span class="ti-money"></span> Payments</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="add-payment.html">Add Payment</a>
									<a class="dropdown-item" href="payments.html">All Payments</a>
									<a class="dropdown-item" href="about-payment.html">Payment Invoice</a>
								</div>
							</li>-->
							<!--<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
								 aria-expanded="false"><span class="ti-key"></span> Room Allotments</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="add-room.html">Add Room Allotment</a>
									<a class="dropdown-item" href="rooms.html">All Rooms</a>
									<a class="dropdown-item" href="edit-room.html">Edit Room Allotment</a>
								</div>
							</li>-->
							<!--<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
								 aria-expanded="false"><span class="ti-layout-tab"></span> UI Kit</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="typography.html">Typography</a>
									<a class="dropdown-item" href="buttons.html">Buttons</a>
									<a class="dropdown-item" href="cards.html">Cards</a>
									<a class="dropdown-item" href="tabs.html">Tabs</a>
									<a class="dropdown-item" href="accordions.html">Accordions</a>
									<a class="dropdown-item" href="modals.html">Modals</a>
									<a class="dropdown-item" href="lists.html">Lists &amp; Media Object</a>
									<a class="dropdown-item" href="grid.html">Grid</a>
									<a class="dropdown-item" href="progress-bars.html">Progress Bars</a>
									<a class="dropdown-item" href="notifications-alerts.html">Notifications &amp; Alerts</a>
									<a class="dropdown-item" href="pagination.html">Pagination</a>
									<a class="dropdown-item" href="carousel.html">Carousel</a>
									<a class="dropdown-item" href="tables.html"> Tables</a>
									<a class="dropdown-item" href="charts-1.html">Morris</a>
									<a class="dropdown-item" href="charts-2.html">Flot</a>
									<a class="dropdown-item" href="map-1.html">Google Maps</a>
									<a class="dropdown-item" href="map-2.html">Vector Maps</a>
									<a class="dropdown-item" href="forms.html">Forms</a>
									<a class="dropdown-item" href="font-awesome.html">Font Awesome </a>
									<a class="dropdown-item" href="themify.html">Themify</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
								 aria-expanded="false"><span class="ti-file"></span> Other Pages</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="login.html">Login </a>
									<a class="dropdown-item" href="sign-up.html">Sign Up</a>
									<a class="dropdown-item" href="404.html">404</a>
									<a class="dropdown-item" href="blank-page.html">Blank Page</a>
									<a class="dropdown-item" href="pricing.html">Pricing</a>
									<a class="dropdown-item" href="faq.html">FAQ</a>
									<a class="dropdown-item" href="invoice.html">Invoice</a>
								</div>
							</li>-->
						</ul>
					</div>
				</nav>
			</div>
			<!-- /Menu -->
			
			
			
			
			
			
			
			
	<?php echo $contents; ?>
	
	
	
    <!--custom js files-->
	<!--Copy Rights-->
			<div class="container">
				<div class="d-sm-flex justify-content-center">
				  <span class="text-muted text-center d-block d-sm-inline-block">Copyright © <?php echo date("Y");?> Powered By <a href="https://vectortechsol.com/" target="_blank">VTS</a> Medzah.</span>
				</div>
			</div>
			<!-- /Copy Rights-->
		</div>
		<!-- /Page Content -->
	</div>
	<!-- Back to Top -->
	<a id="back-to-top" href="#" class="back-to-top">
		<span class="ti-angle-up"></span>
	</a>
	<!-- /Back to Top -->
	<!-- Jquery Library-->
	<script src="<?php echo FRONT_JS?>jquery-3.2.1.min.js"></script>
	<!-- Popper Library-->
	<script src="<?php echo FRONT_JS?>popper.min.js"></script>
	<!-- Bootstrap Library-->
	<script src="<?php echo FRONT_JS?>bootstrap.min.js"></script>
	
	<!-- Datatable  -->
	<script src="<?php echo FRONT; ?>datatable/jquery.dataTables.min.js"></script>
	<script src="<?php echo FRONT; ?>datatable/dataTables.bootstrap4.min.js"></script>
    
<script src="<?php echo FRONT_JS?>select2.min.js"></script>
	<!-- morris charts -->
	<script src="<?php echo FRONT?>charts/js/raphael-min.js"></script>
	<script src="<?php echo FRONT?>charts/js/morris.min.js"></script>
	<script src="<?php echo FRONT_JS?>custom-morris.js"></script>

	<!-- Custom Script-->
	<script src="<?php echo FRONT_JS?>custom.js"></script>
</body>

</html>