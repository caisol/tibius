    <!-- latest job wrapper start e2e2e2  169EFB  CBF0FF-->
   <style>
   .latest_job_box{background-color:#f6f6f6;border-bottom:1px solid #FFFFFF;}
   .latest_job_toper{background-color: #02579B;}
   .latest_job_toper h1{
	   color:#FFFFFF;
   }
   .nav-link{
	   color:#FFFFFF !important;
   }
</style>   
	<?php if(isset($jobs) && !empty($jobs)) { ?>
	<div class="latest_job_wrapper jb_cover">
        <div class="container">
            <div class="row">
                <div class="job_main_overflow jb_cover">
                    <div class="latest_job_overlow jb_cover">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="latest_job_toper jb_cover">
                                <h1>latest jobs</h1>
                                <div class="latest_job_tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home"> all</a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#menu1">featured</a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#menu2"> contract</a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#menu3"> part time</a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#menu4"> full time</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
						
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="tab-content">
                                <div id="home" class="tab-pane active">                                  
									<?php foreach($jobs as $key=>$val){ ?>
									<div class="latest_job_box jb_cover">
										<div class="job_list">
											<a href="<?php echo base_url('job-detail/'.$val->id);?>"><!--<img src="<?php echo FRONT_IMAGES?>job-logo.png" alt="img">-->
												<h6><?php echo custom_echo($val->title,25); ?></h6></a>

										</div>
										<div  class="job_list_next">
											<p><?php echo (isset($val->company) && trim($val->company)!="")?custom_echo($val->company,25):"Vectortechinc"; ?></p>

										</div>
										<div class="job_list_next">
											<p><?php echo (isset($val->type) && trim($val->type)!="")?$val->type:"All"; ?></p>

										</div>
										<div class="job_list_next">
											<p><?php echo (isset($val->location) && trim($val->location)!="")?$val->location:"N/A"; ?></p>

										</div>
										<div class="job_list_next">
											<p><?php echo (isset($val->salary) && $val->salary!="")?$val->salary:'N/A'; ?></p>

										</div>
										<div class="job_list_next">
											<div class="header_btn search_btn apply_btn jb_cover">
	<!--data-toggle="modal" data-target="#myModal"-->
												<a href="<?php echo base_url('job-detail/'.$val->id);?>" >apply</a>

											</div>

										</div>
										<!--<div class="modal fade apply_job_popup" id="myModal" role="dialog">
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
										-->
									</div>
									<?php } ?>
									
									<p class="showing">Showing 1-<?php echo count($jobs);?> of <?php echo $total_jobs; ?> Latest Jobs</p>
									<span class="se_all_job"><a href="<?php echo base_url('jobs'); ?>#">See All Jobs <i class="fas fa-long-arrow-alt-right"></i></a></span>
								</div>
								
									<div id="menu1" class="tab-pane fade">
												<?php if(isset($featured) && !empty($featured))
												{
													foreach($featured as $key=>$val){?>
												<div class="latest_job_box jb_cover">
													<div class="job_list">
													<a href="<?php echo base_url('job-detail/'.$val->id);?>"><!--<img src="<?php echo FRONT_IMAGES?>job-logo.png" alt="img">-->
													<h6><?php echo custom_echo($val->title,25); ?></h6></a>

													</div>
													<div  class="job_list_next">
														<p><?php echo (isset($val->company) && trim($val->company)!="")?custom_echo($val->company,25):"Vectortechinc"; ?></p>

													</div>
													<div class="job_list_next">
														<p><?php echo (isset($val->type) && trim($val->type)!="")?$val->type:"All"; ?></p>

													</div>
													<div class="job_list_next">
														<p><?php echo (isset($val->location) && trim($val->location)!="")?$val->location:"N/A"; ?></p>

													</div>
													<div class="job_list_next">
														<p><?php echo (isset($val->salary) && $val->salary!="")?$val->salary:'N/A'; ?></p>

													</div>
													<div class="job_list_next">
														<div class="header_btn search_btn apply_btn jb_cover">

															<a href="<?php echo base_url('job-detail/'.$val->id);?>">apply</a>

														</div>

													</div>
													<!--<div class="modal fade apply_job_popup" id="myModal7" role="dialog">
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
																						<input type="file" id="input-file-now-custom-7" class="dropify" data-height="90" /><span class="post_photo">upload resume</span>
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
													-->
												</div>
												<?php }} ?>
												<?php if(count($featured)<=0){?>
												<p class="showing">Featured jobs are not available</p>
												<?php }else{ ?>
												<p class="showing">Showing 1-<?php echo count($featured)?> of <?php echo $total_featured; ?> Latest Jobs</p>
												<?php } ?>
												
												<span class="se_all_job"><a href="<?php echo base_url('jobs'); ?>">See All Jobs <i class="fas fa-long-arrow-alt-right"></i></a></span>
									</div>                                  
                                
								
								<div id="menu2" class="tab-pane fade">
								
                                            
											<?php 
											if(isset($contract) && !empty($contract)){
											foreach($contract as $key=>$val){?>
											<div class="latest_job_box jb_cover">
                                                <div class="job_list">
												<a href="<?php echo base_url('job-detail/'.$val->id);?>"><!--<img src="<?php echo FRONT_IMAGES?>job-logo.png" alt="img">-->
											<h6><?php echo custom_echo($val->title,25); ?></h6></a>

												</div>
												<div  class="job_list_next">
													<p><?php echo (isset($val->company) && trim($val->company)!="")?custom_echo($val->company,25):"Vectortechinc"; ?></p>

												</div>
												<div class="job_list_next">
													<p><?php echo (isset($val->type) && trim($val->type)!="")?$val->type:"All"; ?></p>

												</div>
												<div class="job_list_next">
													<p><?php echo (isset($val->location) && trim($val->location)!="")?$val->location:"N/A"; ?></p>

												</div>
												<div class="job_list_next">
													<p><?php echo (isset($val->salary) && $val->salary!="")?$val->salary:'N/A'; ?></p>

												</div>
												<div class="job_list_next">
													<div class="header_btn search_btn apply_btn jb_cover">

														<a href="<?php echo base_url('job-detail/'.$val->id);?>">apply</a>

													</div>

												</div>
											</div>
											<?php }} ?>
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
                                                                                    <input type="file" id="input-file-now-custom-23" class="dropify" data-height="90" /><span class="post_photo">upload resume</span>
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
												-->
                                           <?php if(count($contract)<=0){?>
										   <p class="showing">Contract jobs are not available</p>
										   <?php }else{ ?>
										   <p class="showing">Showing 1-<?php echo count($contract)?> of <?php echo $total_contract; ?> Latest Jobs</p>
										   <?php } ?>
                                            
                                            <span class="se_all_job"><a href="<?php echo base_url('jobs'); ?>">See All Jobs <i class="fas fa-long-arrow-alt-right"></i></a></span>
                                        </div>                                   
                               
								
								<div id="menu3" class="tab-pane fade">                                   
                                            
											<?php 
											if(isset($part_time) && !empty($part_time))
											{
											foreach($part_time as $key=>$val) {?>
											<div class="latest_job_box jb_cover">
                                               <div class="job_list">
												<a href="<?php echo base_url('job-detail/'.$val->id);?>"><!--<img src="<?php echo FRONT_IMAGES?>job-logo.png" alt="img">-->
											<h6><?php echo custom_echo($val->title,25); ?></h6></a>

												</div>
												<div  class="job_list_next">
													<p><?php echo (isset($val->company) && trim($val->company)!="")?custom_echo($val->company,25):"Vectortechinc"; ?></p>

												</div>
												<div class="job_list_next">
													<p><?php echo (isset($val->type) && trim($val->type)!="")?$val->type:"All"; ?></p>

												</div>
												<div class="job_list_next">
													<p><?php echo (isset($val->location) && trim($val->location)!="")?$val->location:"N/A"; ?></p>

												</div>
												<div class="job_list_next">
													<p><?php echo (isset($val->salary) && $val->salary!="")?$val->salary:'N/A'; ?></p>

												</div>
												<div class="job_list_next">
													<div class="header_btn search_btn apply_btn jb_cover">

														<a href="<?php echo base_url('job-detail/'.$val->id);?>">apply</a>

													</div>

												</div>
											</div>
											<?php }} ?>
											<!--<div class="modal fade apply_job_popup" id="myModal00" role="dialog">
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
                                                                                    <input type="file" id="input-file-now-custom-29" class="dropify" data-height="90" /><span class="post_photo">upload resume</span>
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
												-->
                                            <?php if(count($part_time)<=0){?>
											<p class="showing"> Part time jobs are not available</p>
											<?php }else{?>
											<p class="showing">Showing 1-<?php echo count($part_time); ?> of <?php echo $total_parttime; ?> Latest Jobs</p>
											<?php }?>
                                            
                                            <span class="se_all_job"><a href="<?php echo base_url('jobs'); ?>">See All Jobs <i class="fas fa-long-arrow-alt-right"></i></a></span>
                                        </div>                                   
                                 
								
								<div id="menu4" class="tab-pane fade">                                   
                                            
											<?php 
											if(isset($full_time) && !empty($full_time)) {
											foreach($full_time as $key=>$val) {?>
											<div class="latest_job_box jb_cover">
                                                <div class="job_list">
												<a href="<?php echo base_url('job-detail/'.$val->id);?>"><!--<img src="<?php echo FRONT_IMAGES?>job-logo.png" alt="img">-->
											<h6><?php echo custom_echo($val->title,25); ?></h6></a>

												</div>
												<div  class="job_list_next">
													<p><?php echo (isset($val->company) && trim($val->company)!="")?custom_echo($val->company,25):"Vectortechinc"; ?></p>

												</div>
												<div class="job_list_next">
													<p><?php echo (isset($val->type) && trim($val->type)!="")?$val->type:"N/A"; ?></p>

												</div>
												<div class="job_list_next">
													<p><?php echo (isset($val->location) && trim($val->location)!="")?$val->location:"N/A"; ?></p>

												</div>
												<div class="job_list_next">
													<p><?php echo (isset($val->salary) && $val->salary!="")?$val->salary:'N/A'; ?></p>

												</div>
												<div class="job_list_next">
													<div class="header_btn search_btn apply_btn jb_cover">

														<a href="<?php echo base_url('job-detail/'.$val->id);?>"> apply</a>

													</div>

												</div>
											</div>
											<?php }} ?>
											<!--<div class="modal fade apply_job_popup" id="myModalt" role="dialog">
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
                                                                                    <input type="file" id="input-file-now-custom-266" class="dropify" data-height="90" /><span class="post_photo">upload resume</span>
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
												-->
                                            <?php if(count($full_time)<=0){?>
                                            <p class="showing"> Full time jobs are not available</p>
											<?php }else
											{?>
												<p class="showing">Showing 1-<?php echo count($full_time)?> of <?php echo $total_fulltime; ?> Latest Jobs</p>
											<?php }?>
                                            <span class="se_all_job"><a href="<?php echo base_url('jobs'); ?>">See All Jobs <i class="fas fa-long-arrow-alt-right"></i></a></span>
                                        </div>                                  
							
						   </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?><!-- latest job wrapper end-->