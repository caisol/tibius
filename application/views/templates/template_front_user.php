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
	<!-- Main CSS -->
	<link rel="stylesheet" href="<?php echo FRONT_CSS?>styles.css">
	<link rel="stylesheet" href="<?php echo FRONT_CSS?>green.css" id="style_theme">
	<link rel="stylesheet" href="<?php echo FRONT_CSS?>responsive.css">

	<script src="<?php echo FRONT_JS?>modernizr.min.js"></script>
</head>

<body class="auth-bg">
	<!-- Pre Loader -->
	<div class="loading">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div>
	<!--/Pre Loader -->
				
			
			
			
			
			
			
	<?php echo $contents; ?>
	
	<!-- Jquery Library-->
	<script src="<?php echo FRONT_JS?>jquery-3.2.1.min.js"></script>
	<!-- Popper Library-->
	<script src="<?php echo FRONT_JS?>popper.min.js"></script>
	<!-- Bootstrap Library-->
	<script src="<?php echo FRONT_JS?>bootstrap.min.js"></script>
	<!-- Custom Script-->
	<script src="<?php echo FRONT_JS?>custom.js"></script>
</body>

</html>