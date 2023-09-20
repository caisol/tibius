    <!-- login wrapper start -->
    <div class="login_wrapper jb_cover">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="login_top_box jb_cover">
                        <div class="login_banner_wrapper">
                            <img style="width: 25%;" src="<?php echo FRONT_IMAGES?>vectorlogotransparent2.png" alt="logo">
							<div class="jb_saying_img_name" >
							<p style="color:red !important;" ><?php echo (isset($_GET['error']) && $_GET['error']!='')?base64_decode($_GET['error']):''; ?></p>
                            </div>
							<div id="login_facebook_div" class="header_btn search_btn facebook_wrap jb_cover">

                                <a  id="login_facebook" onclick="FBLogin();" href="javascript:void(0);">login with facebook <i class="fab fa-facebook-f"></i></a>

                            </div>
                            <div class="header_btn search_btn linkedin_wrap jb_cover">
								<?php 
								$state = substr(str_shuffle("0123456789abcHGFRlki"), 0, 10);
$url = "https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=86svcigtdo8a2s&redirect_uri=".base_url('in_authback')."&scope=r_liteprofile,r_emailaddress,w_member_social&state=".$state;

								?>
                                <a href="<?php echo $url;?>">login with Linkedin <i class="fab fa-linkedin"></i></a>

                            </div>
                            <div class="jp_regis_center_tag_wrapper jb_register_red_or">
                                <h1>OR</h1>
                            </div>
                        </div>
                        <div class="login_form_wrapper">
						<form id="login">                           
						   <h2>login</h2>
                            <div class="form-group icon_form comments_form">

                                <input type="text" class="form-control require"  name="email" id="email" placeholder="Email Address*">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="form-group icon_form comments_form">

                                <input type="password" name="password" id="password"  class="form-control require" placeholder="Password *">
                                <i class="fas fa-lock"></i>
                            </div>
							
							<div id="message_div" style="display:none;" class="form-group icon_form comments_form error">
								<label id="message_lbl" style="color:red;" class="control error">
								</label>
							</div>
							
                            <div class="login_remember_box">
                                <label class="control control--checkbox">Remember me
                                    <input type="checkbox">
                                    <span class="control__indicator"></span>
                                </label>
                                <a href="<?php echo base_url('forget-password');?>" class="forget_password">
									Forgot Password
								</a>
                            </div>
                            <div id="submit_btn" class="header_btn search_btn login_btn jb_cover">

                                <a  href="javascript:void(0);">login</a>
                            </div>
                            <div class="dont_have_account jb_cover">
                                <p>Don’t have an acount ? <a href="<?php echo base_url('sign-up') ?>">Sign up</a></p>
                            </div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login wrapper end -->
	
	<script>
	(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
window.fbAsyncInit = function() {
FB.init({
appId : '2996639667083920',
cookie : true, // enable cookies to allow the server to access
// the session
xfbml : true, // parse social plugins on this page
version : 'v2.3' // use version 2.3
});
FB.getLoginStatus(function(response) {
statusChangeCallback(response);
});
};
	</script>
	<!-- sign up wrapper end -->
	<script>
	submitSignupForm();
	function  submitSignupForm()
	{
		document.addEventListener("DOMContentLoaded", function(event) { 
			$("#submit_btn").click(function(){
				
				$('#message_div').css('display','none');
				$('#message_lbl').text("");
				
				$("#email").css('border-color','');
				$("#email").attr('placeholder','');
				var email = $("#email").val();
				var password = $("#password").val();
				
				if(email.length == 0)
				{
					$("#email").css('border-color','red');
					$("#email").attr('placeholder','Email is required');
				}
				else if(!isEmail(email))
				{
					$("#email").css('border-color','red');
					$("#email").val('');
					$("#email").attr('placeholder','Email is not valid');
				}
				else if(password.length == 0)
				{
					$("#password").css('border-color','red');
					$("#password").attr('placeholder','Password is required');
				}
				else
				{
					
				$.post( "<?php echo base_url('login-submit');?>", { email: email, password: password })
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
							
							window.location.replace("<?php echo base_url('dashboard')?>");
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
	
	<script>
	
 // This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
if (response.status === 'connected') {
// Logged into your app and Facebook.
// we need to hide FB login button
$('#fblogin').hide();
getUserInfo();
//fetch data from facebook

} else if (response.status === 'not_authorized') {
	$('#login_facebook_false').css('display','block');
	$('#login_facebook_true').css('display','none');
// The person is logged into Facebook, but not your app.
$('#status').html('Please log into this app.');
} else {
// The person is not logged into Facebook, so we're not sure if
// they are logged into this app or not.
$('#login_facebook_false').css('display','block');
	$('#login_facebook_true').css('display','none');
$('#status').html('Please log into facebook');
}
}

// This function is called when someone finishes with the Login
// Button. See the onlogin handler attached to it in the sample code below.
function checkLoginState() {
FB.getLoginStatus(function(response) {
statusChangeCallback(response);
});
}

function FBLogin()
{
FB.login(function(response) {
if (response.authResponse)
{
getUserInfo(); //Get User Information.
} else
{
alert('Authorization failed.');
}
},{scope: 'public_profile,email'});
}



function getUserInfo() {
	FB.api('/me',{fields: 'last_name,first_name,email'}, function(response) {
		if(response.first_name && response.first_name!="")
		{
			$('#login_facebook').html("login as "+response.first_name+" <i class=\"fab fa-facebook-f\"></i>");
			
			$('#login_facebook').attr('onclick','verifyLogin()');
		}
		else
		{
			$('#login_facebook').html("login with Facebook <i class=\"fab fa-facebook-f\"></i>");
			
			$('#login_facebook').attr('onclick','FBLogin()');
		}
		
		
		
});
}
function verifyLogin(response)
{FB.api('/me',{fields: 'last_name,first_name,email'}, function(response) {
		$.ajax({
			type: "POST",
			dataType: 'json',
			data: response,
			url: '<?php echo base_url('verify-facebook');?>',
			success: function(data) {
				var obj = (data);
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

				window.location.replace("<?php echo base_url('dashboard')?>");
				}

			}
	});
		
});
	
}


</script>


