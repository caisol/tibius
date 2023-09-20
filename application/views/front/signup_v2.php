<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?php echo base_url(); ?>" class="h1"><b>Medzah</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form  method="post">
	  
	  <div class="form-group row">
								<div class="col-sm-6">
								<!-- Faq Item -->
										<div class="block block-rounded mb-1">
											<div class="block-header block-header-default" >
												
													<div  class="text-left">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" checked value="1" type="radio" name="user_type" id="hstaff">
															<label class="custom-control-label" for="hstaff">Hospital Staff</label>
														</div>
													</div>
											</div>
											
										</div>
									</div>
									<div class="col-sm-6">
									<!-- Faq Item -->
											<div class="block block-rounded mb-1">
												<div class="block-header block-header-default" role="tab" id="faq1_h1">
													
												<div  data-toggle="collapse" data-parent="#faq1" href="#faq1_q1" aria-expanded="true" aria-controls="faq1_q1" class="text-left">
															<div class="custom-control custom-radio">
																<input class="custom-control-input" value="2" name="user_type" type="radio" id="sstaff">
																<label class="custom-control-label" for="sstaff">Shipping staff</label>
															</div>
														</div>
												</div>
												
											</div>
										</div>
								</div>
								
								<div id="faq1_q1" class="collapse " role="tabpanel" aria-labelledby="faq1_h1" data-parent="#faq1">
												
													<div class="input-group mb-3">
														
															<input name="sf_name" id="sf_name" placeholder="Shipping facility Name" class="form-control" required="" data-validation="length " data-validation-length="3-100"
															 data-validation-error-msg="Name has to be  value (3-100 chars)" data-validation-has-keyup-event="true">
															<div class="input-group-append">
																<div class="input-group-text">
																  <span class="fas fa-user"></span>
																</div>
															</div>
														
													</div>
													<div class="input-group mb-3">
														
														<input name="sf_address" id="sf_address" placeholder="Shipping Facility Address" class="form-control" required="" data-validation="length " data-validation-length="3-500"
														 data-validation-error-msg="Address has to be  value (3-500 chars)" data-validation-has-keyup-event="true">
														<div class="input-group-append">
															<div class="input-group-text">
															  <span class="fas fa-map-pin"></span>
															</div>
														</div>
													</div>
													<div class="input-group mb-3">
														
															<input name="sf_city" id="sf_city" placeholder="Shipping facility City" class="form-control" required="" data-validation="length " data-validation-length="3-100"
															 data-validation-error-msg="City has to be  value (3-100 chars)" data-validation-has-keyup-event="true">
														<div class="input-group-append">
															<div class="input-group-text">
															  <span class="fas fa-city"></span>
															</div>
														</div>
														
													</div>
													<div class="input-group mb-3">
														
															<input name="sf_zipcode" id="sf_zipcode" placeholder="Shipping Facility ZipCode" class="form-control" required="" data-validation="length " data-validation-length="3-20"
															 data-validation-error-msg="Zipcode has to be  value (3-20 chars)" data-validation-has-keyup-event="true">
														<div class="input-group-append">
															<div class="input-group-text">
															  <span class="fas fa-location-arrow"></span>
															</div>
														</div>
														
													</div>
												
											</div>
											
								
									<div class="input-group mb-3">
									  <input name="first_name" id="first_name" placeholder="First name" class="form-control" required="" data-validation="length alphanumeric" data-validation-length="3-100"
																	 data-validation-error-msg="User name has to be an alphanumeric value (3-100 chars)" data-validation-has-keyup-event="true">
									  <div class="input-group-append">
										<div class="input-group-text">
										  <span class="fas fa-user"></span>
										</div>
									  </div>
									</div>
									<div class="input-group mb-3">
									  <input name="middle_name" id="middle_name" placeholder="Middle name" class="form-control"  data-validation="length alphanumeric" data-validation-length="3-100"
										 data-validation-error-msg="User name has to be an alphanumeric value (3-100 chars)" data-validation-has-keyup-event="true">
									  <div class="input-group-append">
										<div class="input-group-text">
										  <span class="fas fa-user"></span>
										</div>
									  </div>
									</div>
									<div class="input-group mb-3">
									  <input name="last_name" id="last_name" placeholder="Last name" class="form-control"  data-validation="length alphanumeric" data-validation-length="3-100"
										 data-validation-error-msg="User name has to be an alphanumeric value (3-100 chars)" data-validation-has-keyup-event="true">
									  <div class="input-group-append">
										<div class="input-group-text">
										  <span class="fas fa-user"></span>
										</div>
									  </div>
									</div>
									<div class="input-group mb-3">
									 <input name="phone_number" id="phone_number" placeholder="Phone number" class="form-control"  data-validation="length" data-validation-length="3-20"
										 data-validation-error-msg="User name has to be an  value (3-20 chars)" data-validation-has-keyup-event="true">
									  <div class="input-group-append">
										<div class="input-group-text">
										  <span class="fas fa-user"></span>
										</div>
									  </div>
									</div>
								<div class="input-group mb-3">
								  <input type="email" placeholder="Email" name="email" id="email" class="form-control" required="" data-validation="email" data-validation-has-keyup-event="true">
								  <div class="input-group-append">
									<div class="input-group-text">
									  <span class="fas fa-envelope"></span>
									</div>
								  </div>
								</div>
						<div class="input-group mb-3">
						 <input type="password" placeholder="Password" name="password" id="password" class="form-control" data-validation="strength" data-validation-strength="2"
														 data-validation-has-keyup-event="true">
						  <div class="input-group-append">
							<div class="input-group-text">
							  <span class="fas fa-lock"></span>
							</div>
						  </div>
						</div>
					<div class="input-group mb-3">
					  <input type="password" placeholder="Confirm Password" name="pass_confirmation" id="pass_confirmation" class="form-control" data-validation="strength"
													 data-validation-strength="2" data-validation-has-keyup-event="true">
					  <div class="input-group-append">
						<div class="input-group-text">
						  <span class="fas fa-lock"></span>
						</div>
					  </div>
					</div>
				<div class="row">
					<div style="display:none;" id="success_div" class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Successfully Done!</strong> Please add payment now
						<button type="button" class="close" onclick="$('#success_div').css('display','none');" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					
					<div  style="display:none;" id="error_div" class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Holy guacamole!</strong> You should check in on some of those fields below.
						<button type="button" class="close" onclick="$('#error_div').css('display','none');" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
				  <div class="col-8">
					<div class="icheck-primary">
					  <input type="checkbox" id="agreeTerms" name="terms" value="agree">
					  <label for="agreeTerms">
					   I agree to the <a href="#">terms</a>
					  </label>
					</div>
				  </div>
				  <!-- /.col -->
				  <div class="col-4">
					<button id="submit_btn" type="button" class="btn btn-primary btn-block">Register</button>
				  </div>
				  <!-- /.col -->
				</div>
      </form>

      <!--<div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>-->

      <a href="<?php echo base_url("login");?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->



    


 <!-- sign up wrapper end -->
	<script>
	submitSignupForm();
	function  submitSignupForm()
	{
		 


		 
		document.addEventListener("DOMContentLoaded", function(event) {

			var user_type=1;
			$("#hstaff").click(function(){
				
				$("#faq1_q1").removeClass("show");
				user_type=1;
			});	

			$("#sstaff").click(function(){
				
				$("#faq1_q1").addClass("show");
				user_type=2;
			});	
			$("#submit_btn").click(function(){
				
				$('#success_div').css('display','none');
				$('#error_div').css('display','none');
				
				$("#first_name").css('background','#efefef');
				$("#first_name").css('border-color','#efefef');
				$("#first_name").css('color','#495057');
				$("#first_name").attr('placeholder','First name');
				
				$("#phone_number").css('background','#efefef');
				$("#phone_number").css('border-color','#efefef');
				$("#phone_number").css('color','#495057');
				$("#phone_number").attr('placeholder','Phone number');
				
				$("#email").css('background','#efefef');
				$("#email").css('border-color','#efefef');
				$("#email").css('color','#495057');
				$("#email").attr('placeholder','Email');
				
				$("#pass_confirmation").css('background','#efefef');
				$("#pass_confirmation").css('border-color','#efefef');
				$("#pass_confirmation").css('color','#495057');
				$("#pass_confirmation").attr('placeholder','Confirm Password');
				
				$("#password").css('background','#efefef');
				$("#password").css('border-color','#efefef');
				$("#password").css('color','#495057');
				$("#password").attr('placeholder','Password');
				
				var sf_name = $("#sf_name").val();
				var sf_address = $("#sf_address").val();
				var sf_city = $("#sf_city").val();
				var sf_zipcode = $("#sf_zipcode").val();
				
				var first_name = $("#first_name").val();
				var middle_name = $("#middle_name").val();
				var last_name = $("#last_name").val();
				var phone_number = $("#phone_number").val();
				var email = $("#email").val();
				var password = $("#password").val();
				var cpassword = $("#pass_confirmation").val();
				

				if(first_name.length == 0)
				{
					$("#first_name").css('color','#721c24');
					$("#first_name").css('background-color','#f8d7da');
					$("#first_name").css('border-color','#f5c6cb');
					$("#first_name").attr('placeholder','First name is required');
					$('html, body').animate({
						scrollTop: $("#first_name").offset().top
					}, 1000);

				}
				else if(phone_number.length == 0)
				{
					
	
					$("#phone_number").css('color','#721c24');
					$("#phone_number").css('background-color','#f8d7da');
					$("#phone_number").css('border-color','#f5c6cb');
					$("#phone_number").attr('placeholder','Phone number is required');
					$('html, body').animate({
						scrollTop: $("#phone_number").offset().top
					}, 1000);
				}
				else if(email.length == 0)
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
				else if(cpassword.length == 0)
				{
					$("#pass_confirmation").css('color','#721c24');
					$("#pass_confirmation").css('background-color','#f8d7da');
					$("#pass_confirmation").css('border-color','#f5c6cb');
					$("#pass_confirmation").attr('placeholder','Confirm password is required');
				}
				else if(cpassword!=password)
				{
					$('#error_div').css('display','block');
					$('#error_div').html('<strong>Passwords mismatch!</strong> Password and Confirm Password are not matched.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>');
					
				}
				else if(!$('#agreeTerms').is(":checked"))
				{
					$('#error_div').css('display','block');
					$('#error_div').html('<strong>Agree Terms!</strong> Please check for Terms.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>');
					
				}
				else
				{
					
				$.post( "<?php echo base_url('signup-submit');?>", { 
				user_type: user_type,
				sf_name: sf_name,
				sf_address: sf_address,
				sf_city: sf_city,
				sf_zipcode: sf_zipcode,
				first_name: first_name,
				last_name: last_name,
				middle_name: middle_name,
				phone_number: phone_number,
				email: email, password: password })
				  .done(function( data ) {
					
						var obj = jQuery.parseJSON(data);
						if(!obj.status && obj.message)
						{
							$('#error_div').css('display','block');
							$('#error_div').html('<strong>'+obj.message+'!</strong> Server side validations.<button type="button" class="close" onclick="$(\'#error_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
					
						}
						else if(obj.status)
						{
							$('#success_div').css('display','block');
							$('#success_div').html('<strong>Successfully Done!</strong> Please wait you will be redirect to dashboard <button type="button" class="close" onclick="$(\'#success_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
							setTimeout(function() { $("#success_div").hide(); }, 5000);
							
							window.location.replace("<?php echo base_url('')?>");
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
	







