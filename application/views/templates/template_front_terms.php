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
			
				</nav>
			</div>
			<!-- /Top Navigation -->
			
			
			
			
			
			
			
			
			
	<?php echo $contents; ?>
	
	
	
    <!--custom js files-->
	<!--Copy Rights-->
			<div class="container">
				<div class="d-sm-flex justify-content-center">
				  <span class="text-muted text-center d-block d-sm-inline-block">Copyright © <?php echo date("Y");?> Powered By <a href="https://vectortechsol.com/" target="_blank">VTS</a> Medzah. </span>
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