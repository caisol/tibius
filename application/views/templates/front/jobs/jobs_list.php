<div class="col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="job_listing_left_side jb_cover">
                        <div class="filter-area jb_cover">

                            <select id="sort_by" onchange="sort_by(this.value)" >
                                <option <?php echo (isset($sort_by) && $sort_by==0)?"SELECTED":""; ?> value="0" >sort by</option>
                                <option <?php echo (isset($sort_by) && $sort_by==1)?"SELECTED":""; ?> value="1" >most recent </option>
                                <option <?php echo (isset($sort_by) && $sort_by==2)?"SELECTED":""; ?> value="2" >most popular</option>
                                <option <?php echo (isset($sort_by) && $sort_by==3)?"SELECTED":""; ?> value="3" >top rated</option>
                            </select>

                            <div class="list-grid">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#grid"> <i class="flaticon-four-grid-layout-design-interface-symbol"></i></a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#list"><i class="flaticon-list"></i></a>
                                    </li>

                                </ul>
                            </div>
                            <div class="showpro">
                                <p>You're Watching <?php echo isset($current_jobs_total)?$current_jobs_total:'0';?> to <?php echo isset($total_jobs)?$total_jobs:'0';?></p>
                            </div>
                        </div>
						<?php if(isset($jobs) && !empty($jobs)) { ?>
                        <div class="tab-content btc_shop_index_content_tabs_main jb_cover">
                            <div id="grid" class="tab-pane fade">
                                <div class="row">
                                    <?php foreach($jobs as $key=>$val) { ?>
									<div class="col-lg-6 col-md-6 col-sm-12">
										
                                        <div class="job_listing_left_fullwidth job_listing_grid_wrapper jb_cover">
                                            <div class="row">
											
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <!--<div class="jp_job_post_side_img">
                                                        <img src="<?php echo FRONT_IMAGES?>job-logo-listing.png" alt="post_img" />
                                                        <br> <span>VectSol</span>
                                                    </div>-->
                                                    <div class="jp_job_post_right_cont">
                                                        <h4><a href="<?php echo base_url('job-detail/'.$val->id)?>"><?php echo custom_echo($val->title,50); ?></a></h4>

                                                        <ul>
                                                            <li><i class="flaticon-cash"></i>&nbsp; <?php echo (isset($val->salary) && trim($val->salary)!="")?$val->salary:"N/A"; ?></li>
                                                            <li><i class="flaticon-location-pointer"></i>&nbsp;<?php echo (isset($val->location) && trim($val->location)!="")?$val->location:"N/A"; ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
											
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="jp_job_post_right_btn_wrapper jb_cover">
                                                        <ul>
                                                            <li>
                                                                <div class="job_adds_right <?php echo (isset($val->fav_status) && $val->fav_status==1)?'change':''; ?>">
                                                                    <a href="javascript:void(0);" onclick="favourite(<?php echo $val->id;?>);" ><i class="far fa-heart"></i></a>
                                                                </div>
                                                            </li>
                                                            <li><a href="#"> <?php echo (isset($val->type) && trim($val->type)!="")?$val->type:"All"; ?></a></li>
                                                            <li> <a href="<?php echo base_url('job-detail/'.$val->id)?>"> <!--data-toggle="modal" data-target="#myModal01"-->apply</a></li>
                                                        </ul>
                                                    </div>
                                                    <!--<div class="modal fade apply_job_popup" id="myModal01" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                                        <div class="apply_job jb_cover">
                                                                            <h1>apply for this job :</h1>
                                                                            <div class="search_alert_box jb_cover">

                                                                                <div class="apply_job_form">

                                                                                    <input type="text" name="name" placeholder="full name">
                                                                                </div>
                                                                                <div class="apply_job_form">

                                                                                    <input type="text" name="Email" placeholder="Enter Your Email">
                                                                                </div>
                                                                                <div class="apply_job_form">
                                                                                    <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                                                                </div>

                                                                                <div class="resume_optional jb_cover">
                                                                                    <p>resume (optional)</p>
                                                                                    <div class="width_50">
                                                                                        <input type="file" id="input-file-now-custom-01" class="dropify" data-height="90" /><span class="post_photo">upload resume</span>
                                                                                    </div>
                                                                                    <p class="word_file"> microsoft word or pdf file only (5mb)</p>
                                                                                </div>

                                                                            </div>
                                                                            <div class="header_btn search_btn applt_pop_btn jb_cover">

                                                                                <a href="#">apply now</a>

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
                                    <?php } ?>
                                </div>
                            </div>
                            <div id="list" class="tab-pane active">
                                <div class="row">
									<?php foreach($jobs as $key=>$val) { ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="job_listing_left_fullwidth jb_cover">
                                            <div class="row">
                                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                    <!--<div class="jp_job_post_side_img">
                                                        <img src="<?php echo FRONT_IMAGES?>job-logo-listing.png" alt="post_img" />
                                                        <br> <span>VectSol</span>
                                                    </div>-->
                                                    <div class="jp_job_post_right_cont">
                                                        <h4><a href="<?php echo base_url('job-detail/'.$val->id)?>"><?php echo custom_echo($val->title,50); ?></a></h4>

                                                        <ul>
                                                            <li><i class="flaticon-cash"></i>&nbsp; <?php echo (isset($val->salary) && trim($val->salary)!="")?$val->salary:"N/A"; ?></li>
                                                            <li><i class="flaticon-location-pointer"></i>&nbsp; <?php echo (isset($val->location) && trim($val->location)!="")?$val->location:"N/A"; ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                    <div class="jp_job_post_right_btn_wrapper">
                                                        <ul>
                                                            <li>
                                                                <div class="job_adds_right <?php echo (isset($val->fav_status) && $val->fav_status==1)?'change':''; ?> ">
                                                                    <a href="javascript:void(0);" onclick="favourite(<?php echo $val->id;?>);" ><i class="far fa-heart"></i></a>
                                                                </div>
                                                            </li>
                                                            <li><a href="#"><?php echo (isset($val->type) && trim($val->type)!="")?$val->type:"All"; ?></a></li>
                                                            <li> <a href="<?php echo base_url('job-detail/'.$val->id)?>" >apply</a></li>
                                                        </ul>
                                                    </div>
                                                   <!-- <div class="modal fade apply_job_popup" id="myModal1" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                                        <div class="apply_job jb_cover">
                                                                            <h1>apply for this job :</h1>
                                                                            <div class="search_alert_box jb_cover">

                                                                                <div class="apply_job_form">

                                                                                    <input type="text" name="name" placeholder="full name">
                                                                                </div>
                                                                                <div class="apply_job_form">

                                                                                    <input type="text" name="Email" placeholder="Enter Your Email">
                                                                                </div>
                                                                                <div class="apply_job_form">
                                                                                    <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                                                                </div>

                                                                                <div class="resume_optional jb_cover">
                                                                                    <p>resume (optional)</p>
                                                                                    <div class="width_50">
                                                                                        <input type="file" id="input-file-now-custom-1" class="dropify" data-height="90" /><span class="post_photo">upload resume</span>
                                                                                    </div>
                                                                                    <p class="word_file"> microsoft word or pdf file only (5mb)</p>
                                                                                </div>

                                                                            </div>
                                                                            <div class="header_btn search_btn applt_pop_btn jb_cover">

                                                                                <a href="#">apply now</a>

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
                                    <?php }?> </div>
                            </div>
                            <div class="blog_pagination_section jb_cover">
							<style>
							.pagination{
	margin:0;
	padding:0;
}
.pagination li{
	display: inline;
	padding: 6px 10px 6px 10px;
	border: 1px solid #ddd;
	margin-right: -1px;
	font: 13px/20px Arial, Helvetica, sans-serif;
	background: #FFFFFF;
}
.pagination li a{
	text-decoration:none;
	color: rgb(89, 141, 235);
}
.pagination li.first {
	border-radius: 5px 0px 0px 5px;
}
.pagination li.last {
	border-radius: 0px 5px 5px 0px;
}
.pagination li:hover{
	background: #EEE;
}

.pagination li.current {
	background: #89B3CC;
	border: 1px solid #89B3CC;
	color: #FFFFFF;
}
.currentActive{
	background:#02579B !important;
}
							</style>
                               <?php echo isset($pagination)?$pagination:''; ?>
							   <!-- <ul>
                                    <li>
                                        <a href="<?php ?>" class="prev"> <i class="flaticon-left-arrow"></i> </a>
                                    </li>
                                    <li><a href="#">1</a>
                                    </li>
                                    <li class="third_pagger"><a href="#">2</a>
                                    </li>
                                    <li class="d-block d-sm-block d-md-block d-lg-block"><a href="#">3</a>
                                    </li>
                                    <li class="d-none d-sm-block d-md-block d-lg-block"><a href="#">...</a>
                                    </li>
                                    <li class="d-none d-sm-block d-md-block d-lg-block"><a href="#">6</a>
                                    </li>

                                    <li>
                                        <a href="#" class="next"> <i class="flaticon-right-arrow"></i> </a>
                                    </li>
                                </ul>
                            --></div>
                        </div>
						</div>
                <?php } ?></div>
<script>
function favourite(id)
{
	var user = '<?php echo isset($_SESSION['candidate_email'])?$_SESSION['candidate_email']:'';?>';
	if(user && user!="")
			{
				
				{
					var formData = new FormData();
					var jobid = id
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
}

function sort_by(id)
{
	var formData = new FormData();
		var sortid = id
		formData.append("sortid",sortid);
		$.ajax({
			url: '<?php echo base_url('sorting-jobs');?>',
			type: 'POST',
			data: formData,
			success: function (data) {
				
				{
					setTimeout(function() { location.reload(true); }, 1000);
					
				}
				
			},
			cache: false,
			contentType: false,
			processData: false
		});
}
</script>			