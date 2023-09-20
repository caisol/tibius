    <!--employee dashboard wrapper start-->
    <div class="candidate_dashboard_wrapper jb_cover">
        <div class="container">

            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="emp_dashboard_sidebar jb_cover">
						<?php if(isset($profile->profile_picture) && $profile->profile_picture!="") { ?>
						<img width="285 px;" height="261 px;" src="<?php echo PROFILE_IMAGES.$profile->profile_picture;?>" class="img-responsive" alt="post_img">
						<?php }else{ ?>
						<img src="<?php echo FRONT_D_IMAGES; ?>profile.jpg" class="img-responsive" alt="post_img" />
						<?php } ?>
                        
                        <div class="emp_web_profile candidate_web_profile jb_cover">

                            <h4><?php echo ($this->session->userdata('candidate_name'))?$this->session->userdata('candidate_name'):'N/A';?></h4>
                            <!--<p>@username</p>-->
                            <!--<div class="skills jb_cover">
                                <div class="skill-item jb_cover">
                                    <h6>profile<span>70%</span></h6>
                                    <div class="skills-progress"><span data-value="70%"></span>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                        <div class="emp_follow_link jb_cover">
                           <ul class="feedlist">
                                <li><a href="<?php echo base_url('dashboard');?>" class="<?php echo (isset($candi_page) && $candi_page=="dashboard")?'link_active':''; ?>"><i class="fas fa-tachometer-alt"></i> dashboard </a></li>
                                <li>
                                    <a href="<?php echo base_url('candidate-edit-profile');?>" class="<?php echo (isset($candi_page) && $candi_page=="edit_profile")?'link_active':''; ?>" > <i class="fas fa-edit"></i>edit profile
                                    </a>
                                </li>
                                <li><a href="<?php echo base_url('candidate-resume');?>" class="<?php echo (isset($candi_page) && $candi_page=="edit_resume")?'link_active':''; ?>" ><i class="fas fa-file  "></i>resume </a></li>
                                <li><a href="<?php echo base_url('favourite-jobs');?>" class="<?php echo (isset($candi_page) && $candi_page=="favourite_jobs")?'link_active':''; ?>" ><i class="fas fa-heart"></i>favourite</a></li>
                                <li><a href="<?php echo base_url('matching-jobs');?>" class="<?php echo (isset($candi_page) && $candi_page=="matching_jobs")?'link_active':''; ?>" ><i class="fas fa-check-square"></i>Matching</a></li>
                                <li><a href="<?php echo base_url('applied-jobs');?>" class="<?php echo (isset($candi_page) && $candi_page=="applied_jobs")?'link_active':''; ?>" ><i class="fas fa-check-square"></i>applied job</a></li>
                                <li><a href="<?php echo base_url('skills');?>" class="<?php echo (isset($candi_page) && $candi_page=="skills")?'link_active':''; ?>" ><i class="fas fa-envelope"></i>skills</a></li>
                                <li><a href="<?php echo base_url('messages');?>" class="<?php echo (isset($candi_page) && $candi_page=="messages")?'link_active':''; ?>" ><i class="fas fa-envelope"></i>message</a></li>

                            </ul>
                            <ul class="feedlist logout_link jb_cover">
                                <li><a href="<?php echo base_url('logout');?>"><i class="fas fa-power-off"></i> log out  </a></li>
                                <!--<li>
                                    <a href="#" data-toggle="modal" data-target="#myModal"><i class="fas fa-trash-alt"></i>delete profile
                                </a>
                                </li>-->

                            </ul>
                        </div>
                    </div>
                    <div class="modal fade delete_popup" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                        <div class="delett_cntn jb_cover">
                                            <h1><i class="fas fa-trash-alt"></i> delete account</h1>
                                            <p>Are you sure! You want to delete your profile. This
                                                <br> can't be undone!</p>

                                            <div class="delete_jb_form">

                                                <input type="password" name="password" placeholder="Enter Password">
                                            </div>
                                            <div class="header_btn search_btn applt_pop_btn">

                                                <a href="#">save updates</a>

                                            </div>
                                            <div class="cancel_wrapper">
                                                <a href="#" class="" data-dismiss="modal">cancel</a>
                                            </div>
                                            <div class="login_remember_box jb_cover">
                                                <label class="control control--checkbox">You accepts our <a href="#">Terms and Conditions </a> and <a href="#">Privacy Policy</a>
                                                    <input type="checkbox">
                                                    <span class="control__indicator"></span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
				<?php $this->load->view($candidate_content);?>
				</div>
        </div>
    </div>

    <!--employee dashboard wrapper end-->