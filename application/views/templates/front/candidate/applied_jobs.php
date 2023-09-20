   <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">      
                                    <div class="manage_jobs_wrapper jb_cover">
                                        <div class="job_list mange_list applications_recent">

                                            <h6><?php echo count($applied_jobs); ?> applied jobs</h6>

                                        </div>
                                    </div>
                        </div>
                        <?php if(isset($applied_jobs) && !empty($applied_jobs)) { foreach($applied_jobs as $key=>$val) { ?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="jb_listing_left_fullwidth mt-0 jb_cover">
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                        <div class="jb_job_post_side_img">
                                            <!--<img src="images/lt1.png" alt="post_img" />-->
                                            <br> <span><?php echo isset($val->company)?$val->company:'N/A'; ?></span>
                                        </div>
                                        <div class="jb_job_post_right_cont">
                                            <h4><a href="<?php echo base_url('job-detail/'.$val->id); ?>"><?php echo $val->title; ?></a></h4>

                                            <ul>
                                                <li><i class="flaticon-cash"></i>&nbsp; <?php echo $val->salary; ?></li>
                                                <li><i class="flaticon-location-pointer"></i>&nbsp; <?php echo $val->location; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                        <div class="jb_job_post_right_btn_wrapper">
                                            <ul>
                                                <li>
                                                    <div class="job_adds_right">
                                                        <a href="javascript:void(0);" id="favourite_id"><i class="far fa-heart"></i></a>
														<input type="hidden" id="job_id" value="<?php echo $val->id; ?>"  />
                                                    </div>
                                                </li>
                                                <li><a href="#"><?php echo $val->type; ?></a></li>
                                                <li> <a href="#" class="applied_btn">applied</a></li>
                                            </ul>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php } }  ?>
						
						
                    </div>
                </div>
<script>
submitJobsForm();
	function  submitJobsForm()
	{
		document.addEventListener("DOMContentLoaded", function(event) { 
		
		var user = '<?php echo isset($_SESSION['candidate_email'])?$_SESSION['candidate_email']:'';?>';
		

$( "#favourite_id" ).click(function() {
			if(user && user!="")
			{
				
				{
					var formData = new FormData();
					var jobid = $('#job_id').val();
					formData.append("job_id",jobid);
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



		});
	}
  
</script>           