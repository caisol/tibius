<style>
.applybutton{
	
    height: 50px;
    background: #02579B;
	    width: 100%;
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
<!--job single wrapper start-->
    <div class="job_single_wrapper jb_cover">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="job_filter_category_sidebar jb_cover">
                        <div class="job_filter_sidebar_heading jb_cover">
                            <h1>jobs overview</h1>
                        </div>
                        <div class="job_overview_header jb_cover">
                            <div class="jb_job_overview_img">
                                <img src="<?php echo FRONT_IMAGES?>job-logo-listing.png" alt="post_img" />
                                <h4><?php echo custom_echo($detail[0]->title,50); ?></h4>
                                <p><?php  echo (isset($detail[0]->company) && trim($detail[0]->company)!="")?$detail[0]->company:"Vectortechinc"; ?></p>
                                <ul class="job_single_lists">
                                    <li>
                                        <div class="job_adds_right <?php echo (isset($is_fav) && $is_fav==1)?'change':''; ?>">
                                            <a href="javascript:void(0);" id="favourite_id"><i class="far fa-heart"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="header_btn search_btn part_time_btn jb_cover">

                                            <a href="javascript:void(0);"><?php echo (isset($detail[0]->type) && trim($detail[0]->type)!="")?$detail[0]->type:"Apply Now"; ?></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="jp_listing_overview_list_main_wrapper jb_cover">
                                <div class="jp_listing_list_icon">
                                    <i class="far fa-calendar"></i>
                                </div>
                                <div class="jp_listing_list_icon_cont_wrapper">
                                    <ul>
                                        <li>Date Posted:</li>
                                        <li><?php 
										$date=date_create($detail[0]->created_at);
											
										echo date_format($date,"F d, Y"); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="jp_listing_overview_list_main_wrapper jb_cover">
                                <div class="jp_listing_list_icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="jp_listing_list_icon_cont_wrapper">
                                    <ul>
                                        <li>Location:</li>
                                        <li><?php echo (isset($detail[0]->location) && trim($detail[0]->location)!="")?$detail[0]->location:"N/A";?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="jp_listing_overview_list_main_wrapper jb_cover">
                                <div class="jp_listing_list_icon">
                                    <i class="fa fa-info-circle"></i>
                                </div>
                                <div class="jp_listing_list_icon_cont_wrapper">
                                    <ul>
                                        <li>Job Title:</li>
                                        <li><?php echo $detail[0]->title;?></li>
                                    </ul>
                                </div>
                            </div>
                            <!--<div class="jp_listing_overview_list_main_wrapper jb_cover">
                                <div class="jp_listing_list_icon">
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="jp_listing_list_icon_cont_wrapper">
                                    <ul>
                                        <li>Hours:</li>
                                        <li>N/A</li>
                                    </ul>
                                </div>
                            </div>-->
                            <div class="jp_listing_overview_list_main_wrapper jb_cover">
                                <div class="jp_listing_list_icon">
                                    <i class="far fa-money-bill-alt"></i>
                                </div>
                                <div class="jp_listing_list_icon_cont_wrapper">
                                    <ul>
                                        <li>Salary:</li>
                                        <li><?php echo (isset($detail[0]->salary) && trim($detail[0]->salary)!="")?$detail[0]->salary:"N/A";?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="jp_listing_overview_list_main_wrapper jb_cover">
                                <div class="jp_listing_list_icon">
                                    <i class="fa fa-th-large"></i>
                                </div>
                                <div class="jp_listing_list_icon_cont_wrapper">
                                    <ul>
                                        <li>Category:</li>
                                        <li>I.T industry</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="jp_listing_overview_list_main_wrapper jb_cover">
                                <div class="jp_listing_list_icon">
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="jp_listing_list_icon_cont_wrapper">
                                    <ul>
                                        <li>Experience:</li>
                                        <li><?php echo (isset($detail[0]->experience) && trim($detail[0]->experience)!="")?$detail[0]->experience:'N/A';?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="header_btn search_btn news_btn overview_btn  jb_cover">

                                <a href="javascript:void(0);" id="apply_now" >apply now !</a>

                            </div>
							<div class="header_btn search_btn news_btn overview_btn  jb_cover">
								<div id="message_div" style="display:none;" class="form-group icon_form comments_form error">
								<label id="message_lbl" style="color:red;" class="control error">
								</label>
								</div>
                            </div>
                            <div class="modal fade apply_job_popup" id="myModal41" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                <div class="apply_job jb_cover">
                                                    <h1>apply for this job :</h1>
                                                    <div class="search_alert_box jb_cover">
													<form id="jobs_form" role="form" method="post" enctype="multipart/form-data" >
                                                        <div class="apply_job_form">

                                                            <input required type="text" name="full_name" id="full_name" placeholder="full name">
                                                        </div>
                                                        <div class="apply_job_form">

                                                            <input required type="text" name="email" id="email" placeholder="Enter Your Email">
                                                        </div>
                                                        <div class="apply_job_form">
                                                            <textarea required class="form-control" name="message" id="message" placeholder="Message"></textarea>
                                                        </div>

                                                        <div class="resume_optional jb_cover">
                                                            <p>resume (optional)</p>
                                                            <div class="width_50">
                                                                <input type="file" id="resume" name="resume" class="dropify" data-height="90" /><span class="post_photo">upload resume</span>
                                                            </div>
                                                            <p class="word_file"> microsoft word or pdf file only (5mb)</p>
                                                        </div>
														<input type="hidden" id="applied_job" name="applied_job" value="<?php echo $detail[0]->id; ?>" >
														<div id="message_div" style="display:none;" class="form-group icon_form comments_form error">
															<label id="message_lbl" style="color:red;" class="control error">
															</label>
														</div>
                                                    </div>
                                                    <div class="header_btn search_btn applt_pop_btn jb_cover">

                                                        <button type="submit" class="applybutton" >apply now</button>

                                                    </div>
													</form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="jb_keyword_key_wrapper jb_cover">
                            <ul>
                                <li><i class="fa fa-tags"></i> trending Keywords :</li>
                                <li><a href="#">ui designer,</a></li>
                                <li><a href="#">developer,</a></li>
                                <li><a href="#">senior</a></li>
                                <li><a href="#">it company,</a></li>
                                <li><a href="#">design,</a></li>
                                <li><a href="#">call center</a></li>
                            </ul>
                        </div>-->
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="jb_listing_single_overview jb_cover">
                        <div class="jp_job_des jb_cover" style="word-spacing: 5px;" >
                            <h2 class="job_description_heading">Job Description</h2>
                            <?php //echo $detail[0]->desc; ?>
							
                            <?php echo "<p>".$desc_clean."</p>"; ?>
                        </div>
                        <!--<div class="jp_job_res jb_cover">
                            <h2 class="job_description_heading">Responsibilities</h2>
                            <p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit.</p>
                            <ul>
                                <li><i class="fa fa-caret-right"></i>&nbsp;&nbsp; Build next-generation web applications with a focus on the client side.</li>
                                <li><i class="fa fa-caret-right"></i>&nbsp;&nbsp; Redesign UI's, implement new UI's, and pick up Java as necessary.</li>
                                <li><i class="fa fa-caret-right"></i>&nbsp;&nbsp; Explore and design dynamic and compelling consumer experiences.</li>
                                <li><i class="fa fa-caret-right"></i>&nbsp;&nbsp; Design and build scalable framework for web applications.</li>
                            </ul>
                        </div>
                        <div class="jp_job_res jb_cover minimum_cover">
                            <h2 class="job_description_heading">Minimum qualifications</h2>

                            <ul>
                                <li><i class="fa fa-caret-right"></i>&nbsp;&nbsp; Build next-generation web applications with a focus on the client side.</li>
                                <li><i class="fa fa-caret-right"></i>&nbsp;&nbsp; Redesign UI's, implement new UI's, and pick up Java as necessary.</li>
                                <li><i class="fa fa-caret-right"></i>&nbsp;&nbsp; Explore and design dynamic and compelling consumer experiences.</li>
                                <li><i class="fa fa-caret-right"></i>&nbsp;&nbsp; Design and build scalable framework for web applications.</li>
                            </ul>
                        </div>
                        <div class="jp_job_res jb_cover">
                            <h2 class="job_description_heading">how to apply</h2>
                            <p>Google is and always will be an engineering company. We hire people with a broad set of ical skills who are ready to tackle some of technology's greatest challenges and make an impact on millions, if not billions, of users. At Google, engineers not only revolutionize search, they routinely </p>

                        </div>
                        --><!--<div class="jp_job_res jb_cover">
                            <h2 class="job_description_heading">location</h2>
                            <div class="map_wrapper jb_cover">
                                <div id='map'>
                                </div>
                            </div>

                        </div>-->
                        <!--<div class="jp_job_res jp_listing_left_wrapper jb_cover">
                            <div class="jp_listing_left_bottom_sidebar_social_wrapper">
                                <ul>
                                    <li>share :</li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>

                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>

                                </ul>
                            </div>
                        </div>-->
                    </div>
                   <!-- <div class="related_job_wrapper jb_cover">
                        <h1 class="related_job">related job</h1>
                        <div class="related_product_job jb_cover">

                            <div class="owl-carousel owl-theme">
                                <div class="item">

                                    <div class="job_listing_left_fullwidth jb_cover">
                                        <div class="row">
                                            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                <div class="jp_job_post_side_img">
                                                    <img src="images/lt2.png" alt="post_img" />
                                                    <br> <span>google</span>
                                                </div>
                                                <div class="jp_job_post_right_cont">
                                                    <h4><a href="#">Trainee Web Designer, (Fresher)</a></h4>

                                                    <ul>
                                                        <li><i class="flaticon-cash"></i>&nbsp; $12K - 15k P.A.</li>
                                                        <li><i class="flaticon-location-pointer"></i>&nbsp; Los Angeles, Califonia PO, 455001</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                <div class="jp_job_post_right_btn_wrapper">
                                                    <ul>
                                                        <li>
                                                            <div class="job_adds_right">
                                                                <a href="#!"><i class="far fa-heart"></i></a>
                                                            </div>
                                                        </li>
                                                        <li><a href="job_single.html">Part Time</a></li>
                                                        <li> <a href="#">apply</a></li>
                                                    </ul>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="job_listing_left_fullwidth jb_cover">
                                        <div class="row">
                                            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                <div class="jp_job_post_side_img">
                                                    <img src="images/lt1.png" alt="post_img" />
                                                    <br> <span>google</span>
                                                </div>
                                                <div class="jp_job_post_right_cont">
                                                    <h4><a href="#">Power Systems Experience Designer </a></h4>

                                                    <ul>
                                                        <li><i class="flaticon-cash"></i>&nbsp; $12K - 15k P.A.</li>
                                                        <li><i class="flaticon-location-pointer"></i>&nbsp; Los Angeles, Califonia PO, 455001</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                <div class="jp_job_post_right_btn_wrapper">
                                                    <ul>
                                                        <li>
                                                            <div class="job_adds_right">
                                                                <a href="#!"><i class="far fa-heart"></i></a>
                                                            </div>
                                                        </li>
                                                        <li><a href="job_single.html">Part Time</a></li>
                                                        <li> <a href="#">apply</a></li>
                                                    </ul>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="job_listing_left_fullwidth jb_cover">
                                        <div class="row">
                                            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                <div class="jp_job_post_side_img">
                                                    <img src="images/lt5.png" alt="post_img" />
                                                    <br> <span>google</span>
                                                </div>
                                                <div class="jp_job_post_right_cont">
                                                    <h4><a href="#">Trainee Web Designer, (Fresher)</a></h4>

                                                    <ul>
                                                        <li><i class="flaticon-cash"></i>&nbsp; $12K - 15k P.A.</li>
                                                        <li><i class="flaticon-location-pointer"></i>&nbsp; Los Angeles, Califonia PO, 455001</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                <div class="jp_job_post_right_btn_wrapper">
                                                    <ul>
                                                        <li>
                                                            <div class="job_adds_right">
                                                                <a href="#!"><i class="far fa-heart"></i></a>
                                                            </div>
                                                        </li>
                                                        <li><a href="job_single.html">Part Time</a></li>
                                                        <li> <a href="#">apply</a></li>
                                                    </ul>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="item">

                                    <div class="job_listing_left_fullwidth jb_cover">
                                        <div class="row">
                                            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                <div class="jp_job_post_side_img">
                                                    <img src="images/lt2.png" alt="post_img" />
                                                    <br> <span>google</span>
                                                </div>
                                                <div class="jp_job_post_right_cont">
                                                    <h4><a href="#">Trainee Web Designer, (Fresher)</a></h4>

                                                    <ul>
                                                        <li><i class="flaticon-cash"></i>&nbsp; $12K - 15k P.A.</li>
                                                        <li><i class="flaticon-location-pointer"></i>&nbsp; Los Angeles, Califonia PO, 455001</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                <div class="jp_job_post_right_btn_wrapper">
                                                    <ul>
                                                        <li>
                                                            <div class="job_adds_right">
                                                                <a href="#!"><i class="far fa-heart"></i></a>
                                                            </div>
                                                        </li>
                                                        <li><a href="job_single.html">Part Time</a></li>
                                                        <li> <a href="#">apply</a></li>
                                                    </ul>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="job_listing_left_fullwidth jb_cover">
                                        <div class="row">
                                            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                <div class="jp_job_post_side_img">
                                                    <img src="images/lt1.png" alt="post_img" />
                                                    <br> <span>google</span>
                                                </div>
                                                <div class="jp_job_post_right_cont">
                                                    <h4><a href="#">Power Systems Experience Designer </a></h4>

                                                    <ul>
                                                        <li><i class="flaticon-cash"></i>&nbsp; $12K - 15k P.A.</li>
                                                        <li><i class="flaticon-location-pointer"></i>&nbsp; Los Angeles, Califonia PO, 455001</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                <div class="jp_job_post_right_btn_wrapper">
                                                    <ul>
                                                        <li>
                                                            <div class="job_adds_right">
                                                                <a href="#!"><i class="far fa-heart"></i></a>
                                                            </div>
                                                        </li>
                                                        <li><a href="job_single.html">Part Time</a></li>
                                                        <li> <a href="#">apply</a></li>
                                                    </ul>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="job_listing_left_fullwidth jb_cover">
                                        <div class="row">
                                            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                <div class="jp_job_post_side_img">
                                                    <img src="images/lt5.png" alt="post_img" />
                                                    <br> <span>google</span>
                                                </div>
                                                <div class="jp_job_post_right_cont">
                                                    <h4><a href="#">Trainee Web Designer, (Fresher)</a></h4>

                                                    <ul>
                                                        <li><i class="flaticon-cash"></i>&nbsp; $12K - 15k P.A.</li>
                                                        <li><i class="flaticon-location-pointer"></i>&nbsp; Los Angeles, Califonia PO, 455001</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                <div class="jp_job_post_right_btn_wrapper">
                                                    <ul>
                                                        <li>
                                                            <div class="job_adds_right">
                                                                <a href="#!"><i class="far fa-heart"></i></a>
                                                            </div>
                                                        </li>
                                                        <li><a href="job_single.html">Part Time</a></li>
                                                        <li> <a href="#">apply</a></li>
                                                    </ul>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                --></div>
            </div>
        </div>
    </div>
    <!--job single wrapper end-->
<script>
submitJobsForm();
	function  submitJobsForm()
	{
		document.addEventListener("DOMContentLoaded", function(event) { 
		
		var user = '<?php echo isset($_SESSION['candidate_email'])?$_SESSION['candidate_email']:'';?>';
		$( "#apply_now" ).click(function() {
			if(user && user!="")
			{
				
				{
					var formData = new FormData();
					formData.append("job_id",'<?php echo isset($detail[0]->id)?$detail[0]->id:'';?>');
					$.ajax({
						url: '<?php echo base_url('apply-job-by-candidate');?>',
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
								
							}
						},
						cache: false,
						contentType: false,
						processData: false
					});
				} 
			}
			else
			{
				$('#myModal41').modal('show');
			}
			
});



$( "#favourite_id" ).click(function() {
			if(user && user!="")
			{
				
				{
					var formData = new FormData();
					formData.append("job_id",'<?php echo isset($detail[0]->id)?$detail[0]->id:'';?>');
					$.ajax({
						url: '<?php echo base_url('mark-favourite-job');?>',
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
								
							}
						},
						cache: false,
						contentType: false,
						processData: false
					});
				} 
			}
			else
			{
				window.location.replace("<?php echo base_url('login')?>");
			}
			
});



		$("form#jobs_form").submit(function(e) {
			e.preventDefault();
$('#message_div').css('display','none');
				$('#message_lbl').text("");
				
				$("#full_name").css('border-color','');
				$("#email").attr('placeholder','');
				$("#message").attr('placeholder','');
				var full_name = $("#full_name").val();
				var email = $("#email").val();
				var message = $("#message").val();
				var applied_job = $("#applied_job").val();
				
				if(full_name.length == 0)
				{
					$("#full_name").css('border-color','red');
					$("#full_name").attr('placeholder','Name is required');
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
				else if(message.length == 0)
				{
					$("#message").css('border-color','red');
					$("#message").attr('placeholder','Message is required');
				}
				else
				{
					var formData = new FormData();

					formData.append("resume", document.getElementById('resume').files[0]);
					formData.append("full_name ",full_name);
					formData.append("email ",email);
					formData.append("message ",message);
					formData.append("applied_job ",applied_job);
					$.ajax({
						url: '<?php echo base_url('jobs/submit-resume');?>',
						type: 'POST',
						data: formData,
						success: function (data) {
							var obj = jQuery.parseJSON(data);
							if(!obj.status && obj.message)
							{
								$('#message_div').css('display','block');
								$('#message_lbl').html(obj.message);
								setTimeout(function() { $("#message_div").hide();window.location.replace("<?php echo base_url('candidate-resume');?>"); }, 10000);

								
							}
							else if(obj.status)
							{
								$('#message_div').css('display','block');
								$('#message_lbl').css("color","green");
								$('#message_lbl').html("Success");
								setTimeout(function() { $("#message_div").hide(); }, 10000);
								
								window.location.replace("<?php echo base_url('job-detail/'. $detail[0]->id)?>");
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
    