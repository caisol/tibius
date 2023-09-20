<div class="col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="job_listing_left_fullwidth jb_cover">
                                <div class="row">
                                    <div class="col-lg-8 col-md-7 col-sm-12 col-12">
                                        <div class="jp_job_post_side_img">
											<?php if(isset($profile->profile_picture) && $profile->profile_picture!="") { ?>
                                            <img width="92 px;" height="92 px;" src="<?php echo PROFILE_IMAGES.$profile->profile_picture;?>" alt="post_img">
											<?php }else{ ?>
											<img src="<?php echo FRONT_D_IMAGES; ?>pf1.jpg" alt="post_img">
											<?php } ?>
                                        </div>
                                        <div class="jp_job_post_right_cont">
                                            <h4><?php echo ($this->session->userdata('candidate_name'))?$this->session->userdata('candidate_name'):'N/A';?></h4>

                                            <ul>
                                                <li><i class="fas fa-suitcase"></i>&nbsp; Software Firm</li>
                                                <li><i class="flaticon-location-pointer"></i>&nbsp;<?php echo isset($profile->address)?$profile->address:'N/A'?></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-sm-12 col-12">
                                        <div class="jp_job_post_right_btn_wrapper jb_cover">
                                            <div class="header_btn search_btn jb_cover">

                                                <a href="#">view profile</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                            <div class="job_filter_category_sidebar jb_cover">
                                <div class="job_filter_sidebar_heading jb_cover">
                                    <h1> basic information</h1>
                                </div>
                                <div class="job_overview_header jb_cover">

                                    <div class="jp_listing_overview_list_main_wrapper jb_cover">
                                        <div class="jp_listing_list_icon">
                                            <i class="far fa-calendar"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>job description:</li>
                                                <li><?php echo (isset($profile->current_job_title) && $profile->current_job_title!="")?$profile->current_job_title:'N/A'; ?></li>
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
                                                <li><?php echo (isset($profile->address) && $profile->address!="")?$profile->address:'N/A'?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="jp_listing_overview_list_main_wrapper jb_cover">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>phone:</li>
                                                <li><?php echo (isset($profile->phone_number) && $profile->phone_number!="")?$profile->phone_number:'N/A'?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="jp_listing_overview_list_main_wrapper jb_cover">
                                        <div class="jp_listing_list_icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>email:</li>
                                                <li><a href="mailto"><?php echo isset($profile->email)?$profile->email:'N/A'?></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="jp_listing_overview_list_main_wrapper dcv jb_cover">
                                        <div class="jp_listing_list_icon">
                                            <i class="fas fa-globe-asia"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>website:</li>
                                                <li><a href="javascript:void(0)"><?php echo (isset($profile->website) && $profile->website!="")?$profile->website:'N/A'?></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>                        
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <!--<div class="job_filter_category_sidebar jb_cover">
                                        <div class="job_filter_sidebar_heading jb_cover">
                                            <h1> social profile</h1>
                                        </div>
                                        <div class="job_overview_header jb_cover">
                                            <div class="jp_listing_left_bottom_sidebar_social_wrapper">
                                                <ul>
                                                    <li></li>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>

                                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <!--<div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="job_filter_category_sidebar jb_cover">
                                        <div class="job_filter_sidebar_heading jb_cover">
                                            <h1> our location</h1>
                                        </div>
                                        <div class="job_overview_header jb_cover">
                                            <div id='map'>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="emp_job_post jb_cover">
                                        <div class="emp_job_side_img">
                                            <i class="fas fa-book"></i>

                                        </div>
                                        <div class="emp_job_side_text">
                                            <h1><?php echo isset($applied_jobs)?$applied_jobs:'0'?></h1>
                                            <p>applied jobs</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="emp_job_post jb_cover">
                                        <div class="emp_job_side_img greens">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <div class="emp_job_side_text">
                                            <h1><?php echo isset($matching_jobs)?$matching_jobs:'0';?></h1>
                                            <p>Matching jobs</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="emp_job_post jb_cover">
                                        <div class="emp_job_side_img parts">
                                            <i class="fas fa-envelope-open-text"></i>

                                        </div>
                                        <div class="emp_job_side_text">
                                            <h1><?php echo isset($favourite_jobs)?$favourite_jobs:'0';?></h1>
                                            <p>favourite jobs</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
						<?php if(isset($recent_applied_jobs) && !empty($recent_applied_jobs)) {?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="job_filter_category_sidebar jb_cover">
                                <div class="job_filter_sidebar_heading jb_cover">
                                    <h1> recent applied jobs</h1>
                                </div>
								<?php 
								foreach($recent_applied_jobs as $key=>$val) { ?>
                                <div class="job_overview_header apps_wrapper jb_cover">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="activity_app">
                                                <i class="fas fa-angle-right"></i>
                                            </div>

                                            <div class="activity_logos">
                                                <h4><?php echo $val->title."   Salary ".$val->salary; ?>
</h4>

                                                <ul>
                                                    <li><?php echo time_elapsed_string($val->created_at); ?></li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
								<?php } ?>
                             
                            </div>
                        </div>
						<?php } ?>
                    </div>
                </div>
            