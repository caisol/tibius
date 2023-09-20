 
<?php
$this->load->view($front_header);
?>
    <!-- top header wrapper start -->
    <div class="page_title_section">

        <div class="page_header">
            <div class="container">
                <div class="row">
                    <!-- section_heading start -->
					
                    <div class="col-lg-9 col-md-8 col-12 col-sm-7">

                        <h1>Reset password</h1>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12 col-sm-5">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="<?php echo base_url();?>"> Home </a>&nbsp; / &nbsp; </li>
                                <li>Reset password</li>
                            </ul>
                        </div>
                    </div>
					 </div>
            </div>
        </div>
    </div>
    <!-- top header wrapper end -->


 <!-- login wrapper start -->
    <div class="login_wrapper jb_cover">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="login_top_box jb_cover">
                        
                        <div class="login_form_wrapper">
						<form id="login">
							<?php if(isset($message) && $message!="") { ?>
							<?php echo $message;?>
							<?php }else { ?>
						   <h2>Reset Password</h2>
                            <div class="form-group icon_form comments_form">

                                <input type="password" class="form-control require"  name="new_password" id="new_password" placeholder="Enter New Password*">
                                <i class="fas fa-lock"></i>
                            </div>
							<div class="form-group icon_form comments_form">

                                <input type="password" class="form-control require"  name="re_new_password" id="re_new_password" placeholder="Re-Enter New Password*">
                                <i class="fas fa-lock"></i>
								<input type="hidden" name="email" id="email" value="<?php echo $email;?>"/>
                            </div>
                           <div id="message_div" style="display:none;" class="form-group icon_form comments_form error">
								<label id="message_lbl" style="color:red;" class="control error">
								</label>
							</div>
							
                            
                            <div id="submit_btn" class="header_btn search_btn login_btn jb_cover">

                                <a  href="javascript:void(0);">Reset my password</a>
                            </div>
                            <div class="dont_have_account jb_cover">
                                <p>Don’t have an acount ? <a href="<?php echo base_url('sign-up') ?>">Sign up</a></p>
                            </div><?php } ?>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login wrapper end -->
	
	<!-- sign up wrapper end -->
	<script>
	submitSignupForm();
	function  submitSignupForm()
	{
		document.addEventListener("DOMContentLoaded", function(event) { 
			$("#submit_btn").click(function(){
				
				$('#message_div').css('display','none');
				$('#message_lbl').text("");
				
				$("#new_password").css('border-color','');
				$("#new_password").attr('placeholder','');
				var new_password = $("#new_password").val();
				var email = $("#email").val();
				
				$("#re_new_password").css('border-color','');
				$("#re_new_password").attr('placeholder','');
				var re_new_password = $("#re_new_password").val();
				
				if(new_password.length == 0)
				{
					$("#new_password").css('border-color','red');
					$("#new_password").attr('placeholder','Password is required');
				}
				else if(re_new_password.length == 0)
				{
					$("#re_new_password").css('border-color','red');
					$("#re_new_password").attr('placeholder','Re-password is required');
				}
				else if(new_password!=re_new_password)
				{
					$("#re_new_password").css('border-color','red');
					$("#re_new_password").val('');
					$("#re_new_password").attr('placeholder','Both passwords must be same');
				}
				else
				{
					
				$.post( "<?php echo base_url('reset-password-submit');?>", { re_new_password: re_new_password,new_password:new_password,email:email})
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
							$('#message_lbl').html("Congratulations! Your password has been updated successfully.");
							setTimeout(function() { $("#message_div").hide(); }, 10000);
							
							window.location.replace("<?php echo base_url('login')?>");
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
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '149584178483186',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.2'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<?php	
$this->load->view($front_footer);
//$this->load->view($chatbox_wrapper);
?>	
	
	

    










