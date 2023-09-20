 <link rel="stylesheet" href="<?php echo FRONT_D_CSS?>V3bootstrap.min.css">
 <style>
.applybutton{
	
    height: 50px;
    background: #02579B;
	
    float: left;
    text-align: center;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    font-size: 16px;
    color: #fff;
    border: 1px solid transparent;
    line-height: 48px;
    text-transform: capitalize;
    -webkit-backface-visibility: hidden;
    -moz-osx-font-smoothing: grayscale;
    transition: background-color 0.6s, color 0.6s;
    -webkit-transition: all 0.6s;
    -o-transition: all 0.6s;
    -ms-transition: all 0.6s;
    -moz-transition: all 0.6s;
    transition: all 0.6s;
}
</style>
 <div class="col-lg-9 col-md-12 col-sm-12 col-12">
					<form id="profile" role="form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="job_listing_left_fullwidth jb_cover">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="jp_job_post_side_img">
											<?php if(isset($profile->profile_picture) && $profile->profile_picture!="") { ?>
                                            <img width="92 px;" height="92 px;" src="<?php echo PROFILE_IMAGES.$profile->profile_picture;?>" alt="post_img">
											<?php }else{ ?>
											<img src="<?php echo FRONT_IMAGES;?>pf1.jpg" alt="post_img">
											<?php } ?>

                                        </div>
                                        <div class="jp_job_post_right_cont edit_profile_wrapper">
                                            <h4>JPEG or PNG 500x500px Thumbnail</h4>

                                            <div class="width_50">
                                                <input type="file" id="profile_picture" id="profile_picture" class="dropify" data-height="90" /><span class="post_photo">browse image</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="browse_img_banner jb_cover">

                                <div class="row">
                                    <!--<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>@username</label>
                                            <input type="text" name="name" placeholder="Luca Wallace">
                                        </div>
                                    </div>-->
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>First Name</label>
                                            <input type="text" value="<?php echo isset($profile->first_name)?$profile->first_name:""; ?>" name="first_name" id="first_name" placeholder="First Name">
                                        </div>
                                    </div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>Middle Name</label>
                                            <input type="text" value="<?php echo isset($profile->middle_name)?$profile->middle_name:""; ?>" name="middle_name" id="middle_name" placeholder="Middle Name">
                                        </div>
                                    </div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>Last Name</label>
                                            <input type="text" value="<?php echo isset($profile->last_name)?$profile->last_name:""; ?>" name="last_name" id="last_name" placeholder="Last Name">
                                        </div>
                                    </div>
									
									<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>Date Of Birth</label>
                                            <input type="text" value="<?php echo isset($profile->dob)?$profile->dob:""; ?>" name="dob" id="dob" placeholder="Date Of Birth">
                                        </div>
                                    </div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>Email</label>
                                            <input type="email" value="<?php echo isset($profile->email)?$profile->email:""; ?>" name="email" id="email" placeholder="Email Address">
                                        </div>
                                    </div>
									
									<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="pricing-controller">
									<label>
									<input id="relocate" name="relocate" type="checkbox" <?php echo (isset($profile->relocate) && $profile->relocate==1)?'checked':''; ?>>
									Willing to relocate
									</label>
									</div>
									</div>


									<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>Current Job Title</label>
                                            <input type="text" value="<?php echo isset($profile->current_job_title)?$profile->current_job_title:""; ?>" name="current_job_title" id="current_job_title" placeholder="Current Job Title">
                                        </div>
                                    </div>
									
									<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>Experience (In Years)</label>
                                            <input type="text" value="<?php echo isset($profile->experience)?$profile->experience:""; ?>" name="experience" id="experience" placeholder="Experience (In Years)">
                                        </div>
                                    </div>
									
									<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>Skills</label>
                                            <input type="text" data-role="tagsinput" value="<?php echo isset($skills)?$skills:""; ?>" name="skills" id="skills" >
                                        </div>
                                    </div>
									
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>Phone</label>
                                            <input type="text" name="phone_number" id="phone_number" value="<?php echo isset($profile->phone_number)?$profile->phone_number:""; ?>" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>Website</label>
                                            <input type="text" name="website" id="website" value="<?php echo isset($profile->website)?$profile->website:""; ?>" placeholder="www.example.com">
                                        </div>
                                    </div>

                                    <!--<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="select_box">
                                            <label>job description</label>
                                            <select>
                                                <option>it & computer</option>
                                                <option>marketing</option>
                                                <option>mechanical</option>
                                                <option>doctor</option>

                                            </select>
                                        </div>
                                    </div>-->
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>address</label>
                                            <input type="text" name="address" id="address" value="<?php echo isset($profile->address)?$profile->address:""; ?>" placeholder="Address">
                                        </div>
                                    </div>
                                    <!--<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>country</label>
                                            <input type="text" name="name" placeholder="India">
                                        </div>
                                    </div>-->
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>Zip code</label>
                                            <input type="text" name="zip_code" id="zip_code" value="<?php echo isset($profile->zip_code)?$profile->zip_code:""; ?>" placeholder="Zip Code">
                                        </div>
                                    </div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>State</label>
                                            <input type="text" name="state" id="state" value="<?php echo isset($profile->state)?$profile->state:""; ?>" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="contect_form3">
                                            <label>City</label>
                                            <input type="text" name="city" id="city" value="<?php echo isset($profile->city)?$profile->city:""; ?>" placeholder="City">
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
							<div class="browse jb_cover">
                            <!--<div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="job_filter_category_sidebar jb_cover">
                                        <div class="job_filter_sidebar_heading jb_cover">
                                            <h1> social networks</h1>
                                        </div>
                                        <div class="job_overview_header jb_cover">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="contect_form3">
                                                        <label>google</label>
                                                        <input type="email" name="email" placeholder="https://google.com/webstrot">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="contect_form3">
                                                        <label>facebook</label>
                                                        <input type="email" name="email" placeholder="https://www.facebook.com/webstrot">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="contect_form3">
                                                        <label>twitter</label>
                                                        <input type="email" name="email" placeholder="https://www.twitter.com/webstrot">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="contect_form3">
                                                        <label>linkedin</label>
                                                        <input type="email" name="email" placeholder="https://www.linkedin.com/webstrot">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="header_btn search_btn jb_cover">

                                                        <a href="#">add more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
							<!--<div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="job_filter_category_sidebar jb_cover">
                                        <div class="job_filter_sidebar_heading jb_cover">
                                            <h1> password & security</h1>
                                        </div>
                                        <div class="job_overview_header jb_cover">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="contect_form3">
                                                        <label>verification email</label>
                                                        <input type="email" name="email_verify" value="<?php echo isset($profile->email)?$profile->email:""; ?>" placeholder="Email Address">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="contect_form3">
                                                        <label>current pasword</label>
                                                        <input type="text" name="cpassword" id="cpassword" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="contect_form3">
                                                        <label>new pasword</label>
                                                        <input type="text"  name="npassword" id="npassword" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="contect_form3">
                                                        <label> repeat new pasword</label>
                                                        <input type="text" name="rpassword" id="rpassword" placeholder="Password">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            --><div class="row">
                               
								<div id="message_div" style="display:none;" class="form-group icon_form comments_form error">
									<label id="message_lbl" style="color:red;" class="control error">
									</label>
								</div>
                            </div>
							
							<div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="login_remember_box jb_cover">
                                        <!--<label class="control control--checkbox">Enable Two Step Verification Via Email
                                            <input type="checkbox">
                                            <span class="control__indicator"></span>
                                        </label>-->
                                        <div class="header_btn search_btn jb_cover">

                                            <button type="submit" class="applybutton">save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
					</form>
                </div>
<script>
submitJobsForm();
	function  submitJobsForm()
	{
		document.addEventListener("DOMContentLoaded", function(event) { 
		
		

		$( function() {
			$( "#dob" ).datepicker();
			
		 
			$('#zip_code').keyup(function () {
				$('#state').val('');
							$('#city').val('');
    $.ajax({
      type: "POST",
      url: '<?php echo base_url('address-by-zipcode');?>',
      data: {zip_code:$('#zip_code').val()},
	  success: function (data) {
							var obj = jQuery.parseJSON(data);
							
							if(obj.place_name)
							{
								$('#state').val(obj.place_name);
							}
							if(obj.state_name)
							{
								$('#city').val(obj.state_name);
							}
							
						}
    });
});
		} );
		
		
		$("form#profile").submit(function(e) {
			
				e.preventDefault();
				
				$('#message_div').css('display','none');
				$('#message_lbl').text("");
				$(".bootstrap-tagsinput").css('border-color','');

				
				$("#phone_number").css('border-color','');
				$("#email").attr('placeholder','');
				$("#website").attr('placeholder','');
				var phone_number = $("#phone_number").val();
				var email = $("#email").val();
				var website = $("#website").val();
				var address = $("#address").val();
				var first_name = $("#first_name").val();
				var middle_name = $("#middle_name").val();
				var last_name = $("#last_name").val();
				var dob = $("#dob").val();
				var relocate = $("#relocate").val();
				if($("#relocate").is(":checked")){
					relocate=1
				}
				else
				{
					relocate=0
				}
			
				var current_job_title = $("#current_job_title").val();
				var experience = $("#experience").val();
				var skills = $("#skills").val();
				var zip_code = $("#zip_code").val();
				var state = $("#state").val();
				var city = $("#city").val();
				
				
				if(first_name.length == 0)
				{
					$("#first_name").css('border-color','red');
					$("#first_name").attr('placeholder','First Name is required');
				}
				else if(email.length == 0)
				{
					$("#email").css('border-color','red');
					$("#email").attr('placeholder','Email is required');
				}
				else if(!isEmail(email))
				{
					$("#email").val('');
					$("#email").css('border-color','red');
					$("#email").attr('placeholder','Email is not valid');
				}
				else if(skills.length == 0)
				{
					$("#skills").css('border-color','red');
					$(".bootstrap-tagsinput").css('border-color','red');
					$("#skills").attr('placeholder','Skills are required');
				}
				else if(phone_number.length == 0)
				{
					$("#phone_number").css('border-color','red');
					$("#phone_number").attr('placeholder','Phone number is required');
				}
				else if(address.length == 0)
				{
					$("#address").css('border-color','red');
					$("#address").attr('placeholder','Address is required');
				}
				else if(website.length >200)
				{
					$("#website").css('border-color','red');
					$("#website").attr('placeholder','Website must be less than 200 letters');
				}
				else
				{
					var formData = new FormData();

					formData.append("profile_picture", document.getElementById('profile_picture').files[0]);
					formData.append("phone_number ",phone_number);
					formData.append("email ",email);
					formData.append("website ",website);
					formData.append("address ",address);
					formData.append("first_name",first_name);
					formData.append("middle_name",middle_name);
					formData.append("last_name",last_name);
					formData.append("dob",dob);
					formData.append("relocate",relocate);
					formData.append("current_job_title",current_job_title);
					formData.append("experience",experience);
					formData.append("skills",skills);
					formData.append("zip_code",zip_code);
					formData.append("state",state);
					formData.append("city",city);
				
					$.ajax({
						url: '<?php echo base_url('candidate/update-profile');?>',
						type: 'POST',
						data: formData,
						success: function (data) {
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
								if(obj.message)
								{
									$('#message_div').css('display','block');
									$('#message_lbl').html(obj.message);
								}
								
								setTimeout(function() { $("#message_div").hide(); }, 7000);
								
								window.location.replace("<?php echo base_url('candidate-edit-profile')?>");
							}
						},
						cache: false,
						contentType: false,
						processData: false
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

            