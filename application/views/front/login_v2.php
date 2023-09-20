<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?php echo base_url(); ?>" class="h1"><b>Medzah</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form  method="post">
        <div class="input-group mb-3">
          <input type="email" placeholder="Email" name="email" id="email" class="form-control" required="" data-validation="email" data-validation-has-keyup-event="true">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input  type="password" placeholder="Password" name="password" id="password" class="form-control" data-validation="strength" data-validation-strength="2"
										 data-validation-has-keyup-event="true">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
		  
		  <div style="display:none;" id="success_div" class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Successfully Done!</strong> Please add payment now
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		
		<div style="display:none;" id="error_div" class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Holy guacamole!</strong> You should check in on some of those fields below.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
          <!-- /.col -->
          <div class="col-4">
            <button id="submit_btn" type="button" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!--<div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>-->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="<?php echo base_url("sign-up");?>">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="<?php echo base_url("sign-up");?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
	
<!-- Modal Popup-->
	<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Terms of Services</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					<label id="modal_message" >By signing up you agree to VTS Medzah </label>
									<small>
										<a href="<?php echo base_url("terms-services");?>">  Terms of Services</a></small>
					
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button onclick="window.location.href='<?php echo base_url("");?>'" type="button" class="btn btn-primary">Yes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /Modal Popup-->
	
	<script>
	submitSignupForm();
	function  submitSignupForm()
	{
		document.addEventListener("DOMContentLoaded", function(event) { 
			$("#submit_btn").click(function(){
				
				$('#success_div').css('display','none');
				$('#error_div').css('display','none');
				
				
				$("#email").css('background','#efefef');
				$("#email").css('border-color','#efefef');
				$("#email").css('color','#495057');
				$("#email").attr('placeholder','Email');
				
				
				$("#password").css('background','#efefef');
				$("#password").css('border-color','#efefef');
				$("#password").css('color','#495057');
				$("#password").attr('placeholder','Password');
				
				var email = $("#email").val();
				var password = $("#password").val();
				
				if(email.length == 0)
				{
					
	
					$("#email").css('color','#721c24');
					$("#email").css('background-color','#f8d7da');
					$("#email").css('border-color','#f5c6cb');
					$("#email").attr('placeholder','Email is required');
					$('html, body').animate({
						scrollTop: $("#email").offset().top
					}, 1000);
				}
				else if(!isEmail(email))
				{
					$("#email").css('color','#721c24');
					$("#email").css('background-color','#f8d7da');
					$("#email").css('border-color','#f5c6cb');
					$("#email").val('');
					$("#email").attr('placeholder','Email is not valid');
					$('html, body').animate({
						scrollTop: $("#email").offset().top
					}, 1000);
				}
				else if(password.length == 0)
				{
					$("#password").css('color','#721c24');
					$("#password").css('background-color','#f8d7da');
					$("#password").css('border-color','#f5c6cb');
					$("#password").attr('placeholder','Password is required');
				}
				else
				{
					
				$.post( "<?php echo base_url('login-submit');?>", { email: email, password: password })
				  .done(function( data ) {
					
						var obj = jQuery.parseJSON(data);
						if(!obj.status && obj.message)
						{
							$('#error_div').css('display','block');
							$('#error_div').html('<strong>'+obj.message+'!</strong> Server side validations.<button type="button" class="close" onclick="$(\'#error_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
					
						}
						else if(obj.status)
						{
							//$('#success_div').css('display','block');
							//$('#success_div').html('<strong>Successfully Done!</strong> Please wait you will be redirect to dashboard <button type="button" class="close" onclick="$(\'#success_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
							//setTimeout(function() { $("#success_div").hide(); }, 5000);
							$("#termsModal").modal("show");
						}
				  });
				}
			}); 
		});
	}
   function isEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
	</script>