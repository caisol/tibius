	  <!-- map wrapper  start-->
    <div class="map_wrapper_top jb_cover">
		  <div class="map_wrapper map2_wrapper">
				<div id='map1'>
				<img src="<?php echo FRONT_IMAGES?>map.png" alt="img">
				</div>
		</div>
	 <div class="contact_field_wrapper comments_form">
			<div class="jb_heading_wraper left_rivew_heading">
                <h3>get in touch</h3>
                <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    <br> sed do eiusmod tempor incididunt </p>-->
            </div>
				<form id="contactus" >
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-pos">
                                    <div class="form-group i-name">

                                        <input type="text" class="form-control require" name="full_name"  id="namTen-first" placeholder=" Name*">
                                        <i class="fas fa-user-alt"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- /.col-md-12 -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-e">
                                    <div class="form-group i-email">
                                        <label class="sr-only">Email </label>
                                        <input type="email" class="form-control require" name="email"  id="emailTen" placeholder=" Email *" data-valid="email" data-error="Email should be valid.">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="col-md-12">
                                <div class="form-m">
                                    <div class="form-group i-message">

                                        <textarea class="form-control require" name="message" rows="5" id="messageTen" placeholder=" Message"></textarea>
                                        <i class="fas fa-comment"></i>
                                    </div>
                                </div>
                            </div>
							
							<div id="message_div" style="display:none;" class="form-group icon_form comments_form error">
								<label id="message_lbl" style="color:red;" class="control error">
								</label>
							</div>
							
                            <!-- /.col-md-12 -->
                            <div class="col-md-12">
                                <div class="tb_es_btn_div">
                                    <div class="response"></div>
                                    <div class="tb_es_btn_wrapper">
                                        <button type="button" id="submit_btn" class="submitForm">submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
			</div>
	</div>
	  <!-- map wrapper  end-->
<!-- custom js-->
	   <script>
	   
        function initMap() {
			document.addEventListener("DOMContentLoaded", function(event) { 
            var uluru = {
                lat: -36.742775,
                lng: 174.731559
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                scrollwheel: false,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
			});
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUefUH_2SIKK-fJrtsGH8izJ58_zthCWk&callback=initMap"></script>
	
	<script>
	submitSignupForm();
	function  submitSignupForm()
	{
		document.addEventListener("DOMContentLoaded", function(event) { 
			$("#submit_btn").click(function(){
				
				$('#message_div').css('display','none');
				$('#message_lbl').text("");
				
				$("#namTen-first").css('border-color','');
				$("#namTen-first").attr('placeholder','');
				
				$("#emailTen").css('border-color','');
				$("#emailTen").attr('placeholder','');
				
				$("#messageTen").css('border-color','');
				$("#messageTen").attr('placeholder','');
				var full_name = $("#namTen-first").val();
				var emailTen = $("#emailTen").val();
				var messageTen = $("#messageTen").val();
				
				if(full_name.length == 0)
				{
					$("#namTen-first").css('border-color','red');
					$("#namTen-first").attr('placeholder','Name is required');
				}
				else if(emailTen.length == 0)
				{
					$("#emailTen").css('border-color','red');
					$("#emailTen").attr('placeholder','Email is required');
				}
				else if(!isEmail(emailTen))
				{
					$("#emailTen").css('border-color','red');
					$("#emailTen").val('');
					$("#emailTen").attr('placeholder','Email is not valid');
				}
				else if(messageTen.length == 0)
				{
					$("#messageTen").css('border-color','red');
					$("#messageTen").attr('placeholder','Message is required');
				}
				else
				{
					
				$.post( "<?php echo base_url('do-contact');?>", { full_name: full_name,email: emailTen, message: messageTen })
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
							
							window.location.replace("<?php echo base_url('contact-us')?>");
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
	