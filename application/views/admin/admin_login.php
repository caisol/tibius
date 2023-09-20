
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VectorTechsol</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo ADMIN_LOGIN;?>bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo ADMIN_LOGIN;?>font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo ADMIN_LOGIN;?>ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo ADMIN_LOGIN;?>AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo ADMIN_LOGIN;?>blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url('admin')?>">VectorTechsol</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form id="login" action="<?php echo base_url('admin-login')?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User name">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  
	  <div id="message_div" style="display:none;" class="form-group icon_form comments_form error">
			<label id="message_lbl" style="color:red;" class="control error">
			</label>
		</div>
		
							
      <div class="row">
        <!--<div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>-->
        <!-- /.col -->
        <div class="col-xs-4">
          <button id="submit_btn" type="button" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!--<div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>-->
    <!-- /.social-auth-links -->

    <!--<a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo ADMIN_LOGIN;?>jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo ADMIN_LOGIN;?>bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo ADMIN_LOGIN;?>icheck.min.js"></script>
<script>

submitSignupForm();
	function  submitSignupForm()
	{
		document.addEventListener("DOMContentLoaded", function(event) { 
			$("#submit_btn").click(function(){
				
				$('#message_div').css('display','none');
				$('#message_lbl').text("");
				
				$("#user_name").css('border-color','');
				$("#password").attr('placeholder','');
				var user_name = $("#user_name").val();
				var password = $("#password").val();
				
				if(user_name.length == 0)
				{
					$("#user_name").css('border-color','red');
					$("#user_name").attr('placeholder','User name is required');
				}
				else if(password.length == 0)
				{
					$("#password").css('border-color','red');
					$("#password").attr('placeholder','Password is required');
				}
				else
				{
					
				$.post( "<?php echo base_url('admin-login');?>", { user_name: user_name, password: password })
				  .done(function( data ) {
					
						var obj = jQuery.parseJSON(data);
						if(!obj.status && obj.message)
						{
							$('#message_div').css('display','block');
							$('#message_lbl').html(obj.message);
							setTimeout(function() { $("#message_div").hide(); }, 5000);

							
						}
						else if(obj.status)
						{
							$('#message_div').css('display','block');
							$('#message_lbl').css("color","green");
							$('#message_lbl').html("Success");
							setTimeout(function() { $("#message_div").hide(); }, 5000);
							
							window.location.replace("<?php echo base_url('admin')?>");
						}
				  });
				}
			}); 
		});
	}
   
   
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
