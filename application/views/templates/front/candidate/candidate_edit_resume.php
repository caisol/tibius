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

 <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="job_filter_category_sidebar company_wrapper jb_cover">
                                <div class="job_filter_sidebar_heading jb_cover">
                                    <h1> basic information <span><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fas fa-edit"></i></a></span></h1>
                                </div>
                                <div class="modal fade delete_popup company_popup" id="myModal1" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                    <div class="delett_cntn jb_cover">
                                                        <h1><i class="fas fa-edit"></i>basic information</h1>

                                                        <div class="category_wrapper jb_cover">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                    <div class="category_lavel jb_cover">
                                                                        <p>job :</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                                    <div class="delete_jb_form">

                                                                        <input type="text" name="current_job_title" id="current_job_title" value="<?php echo isset($profile->current_job_title)?$profile->current_job_title:''; ?>" placeholder="Job Title">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="category_wrapper jb_cover">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                    <div class="category_lavel jb_cover">
                                                                        <p>location :</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                                    <div class="delete_jb_form">

                                                                        <input type="text" name="address" id="address" value="<?php echo isset($profile->address)?$profile->address:''; ?>" placeholder="Address">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="category_wrapper jb_cover">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                    <div class="category_lavel jb_cover">
                                                                        <p>phone :</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                                    <div class="delete_jb_form">

                                                                        <input type="text" name="phone_number" id="phone_number" value="<?php echo isset($profile->phone_number)?$profile->phone_number:''; ?>" placeholder="Phone Number">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="category_wrapper jb_cover">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                    <div class="category_lavel jb_cover">
                                                                        <p>email :</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                                    <div class="delete_jb_form">

                                                                        <input type="email" name="email" id="email" value="<?php echo isset($profile->email)?$profile->email:''; ?>" placeholder="Email">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="category_wrapper jb_cover">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                    <div class="category_lavel jb_cover">
                                                                        <p>website
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                                    <div class="delete_jb_form">

                                                                        <input type="text" name="website" id="website" value="<?php echo isset($profile->website)?$profile->website:''; ?>" placeholder="www.example.com">
                                                                    </div>
                                                                </div>
																<div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                                
																	<div id="message_div" style="display:none;" class="form-group icon_form comments_form error">
																	<label id="message_lbl" style="color:red;" class="control error">
																	</label>
																	</div>
																</div>
                                                        </div>

                                                        <div class="padder_top jb_cover"></div>
                                                        <div class="header_btn search_btn applt_pop_btn">

                                                            <a href="javascript:void(0);" id="save_basic" >save updates</a>

                                                        </div>
                                                        <div class="cancel_wrapper">
                                                            <a href="#" data-dismiss="modal">cancel</a>
                                                        </div>
														</div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="job_overview_header jb_cover">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="jp_listing_overview_list_main_wrapper jb_cover">
                                                <div class="jp_listing_list_icon">
                                                    <i class="far fa-calendar"></i>
                                                </div>
                                                <div class="jp_listing_list_icon_cont_wrapper">
                                                    <ul>
                                                        <li>job description:</li>
                                                        <li><?php echo isset($profile->current_job_title)?$profile->current_job_title:''; ?></li>
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
                                                        <li><?php echo isset($profile->address)?$profile->address:''; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="jp_listing_overview_list_main_wrapper jb_cover">
                                                <div class="jp_listing_list_icon">
                                                    <i class="fa fa-info-circle"></i>
                                                </div>
                                                <div class="jp_listing_list_icon_cont_wrapper">
                                                    <ul>
                                                        <li>phone :</li>
                                                        <li><?php echo isset($profile->phone_number)?$profile->phone_number:''; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="jp_listing_overview_list_main_wrapper jb_cover">
                                                <div class="jp_listing_list_icon">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="jp_listing_list_icon_cont_wrapper">
                                                    <ul>
                                                        <li>email:</li>
                                                        <li><a href="#"><?php echo isset($profile->email)?$profile->email:''; ?></a></li>
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
                                                        <li><a href="#"><?php echo isset($profile->website)?$profile->website:''; ?></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="job_filter_category_sidebar company_wrapper jb_cover">
                                <div class="job_filter_sidebar_heading jb_cover">
                                    <h1>about us <span><a href="#" data-toggle="modal" data-target="#myModal2"><i class="fas fa-edit"></i></a></span></h1>
                                    <div class="modal fade delete_popup company_popup" id="myModal2" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                        <div class="delett_cntn jb_cover">
                                                            <h1><i class="fas fa-edit"></i>about us</h1>

                                                            <div class="category_wrapper jb_cover">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                        <div class="category_lavel jb_cover">
                                                                            <p>write yourself:</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                                        <div class="delete_jb_form">

                                                                            <textarea class="require" name="about_us" id="about_us" rows="5" placeholder="Write Yourself"><?php echo isset($profile->about_us)?$profile->about_us:''; ?></textarea>
                                                                        </div>
                                                                    </div>
																	
																	<div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                                
																	<div id="message_div_aboutus" style="display:none;" class="form-group icon_form comments_form error">
																	<label id="message_lbl_aboutus" style="color:red;" class="control error">
																	</label>
																	</div>
																	</div>
																
                                                                </div>
                                                            </div>

                                                            <div class="padder_top jb_cover"></div>
                                                            <div class="header_btn search_btn applt_pop_btn">

                                                                <a href="javascript:void(0);" id="save_aboutus" >save updates</a>

                                                            </div>
                                                            <div class="cancel_wrapper">
                                                                <a href="#" data-dismiss="modal">cancel</a>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="job_overview_header pdd jb_cover">
                                    <p><?php echo isset($profile->about_us)?$profile->about_us:''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="job_filter_category_sidebar company_wrapper jb_cover">
                                <div class="job_filter_sidebar_heading jb_cover">
                                    <h1> education background<span><a href="#" data-toggle="modal" data-target="#myModal4"><i class="fas fa-edit"></i></a></span></h1>
                                </div>
                                <div class="modal fade delete_popup company_popup" id="myModal4" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                    <div class="delett_cntn jb_cover">
                                                        <h1><i class="fas fa-edit"></i>education</h1>

                                                        <div class="category_wrapper jb_cover">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                    <div class="category_lavel jb_cover">
                                                                        <p>education 01 :</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input required type="text" name="title[]" id="title1" value="<?php echo isset($detailEducation[0]->title)?$detailEducation[0]->title:''; ?>" placeholder="Title">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input required type="text" name="institute[]" id="institute1" value="<?php echo isset($detailEducation[0]->institute)?$detailEducation[0]->institute:''; ?>" placeholder="Institute">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input required type="text" name="period[]" id="period1" value="<?php echo isset($detailEducation[0]->period)?$detailEducation[0]->period:''; ?>" placeholder="Period">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">

                                                                        <textarea required name="education_desc[]" id="education_desc1" rows="2" placeholder="Description"><?php echo isset($detailEducation[0]->education_desc)?$detailEducation[0]->education_desc:''; ?></textarea>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="category_wrapper gallery_browse jb_cover">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                    <div class="category_lavel jb_cover">
                                                                        <p>education 02 :</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input required type="text" name="title[]" id="title2" value="<?php echo isset($detailEducation[1]->title)?$detailEducation[1]->title:''; ?>" placeholder="Title">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input required type="text" name="institute[]" id="institute2" value="<?php echo isset($detailEducation[1]->institute)?$detailEducation[1]->institute:''; ?>" placeholder="Institute">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input required type="text" name="period[]" id="period2" value="<?php echo isset($detailEducation[1]->period)?$detailEducation[1]->period:''; ?>" placeholder="Period">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">

                                                                        <textarea required name="education_desc[]" id="education_desc2" rows="2"  placeholder="Description"><?php echo isset($detailEducation[1]->education_desc)?$detailEducation[1]->education_desc:''; ?></textarea>
                                                                    </div>

                                                                </div>
                                                            </div>
																<div class="col-lg-9 col-md-9 col-sm-12 col-12">
																		
																	<div id="message_div_education" style="display:none;" class="form-group icon_form comments_form error">
																	<label id="message_lbl_education" style="color:red;" class="control error">
																	</label>
																	</div>
																</div>
                                                        </div>

                                                        <div class="header_btn search_btn applt_pop_btn">

                                                            <a href="javascript:void(0);" id="save_education" >save updates</a>

                                                        </div>
                                                        <div class="cancel_wrapper">
                                                            <a href="#" data-dismiss="modal">cancel</a>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="job_overview_header jb_cover">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
										<?php if(isset($detailEducation) && !empty($detailEducation))
											foreach($detailEducation as $key=>$val) { ?>
                                            <div class="jp_listing_overview_list_main_wrapper education_board jb_cover">
                                                <div class="jp_listing_list_icon">
                                                    <i class="fas fa-graduation-cap"></i>
                                                </div>
                                                <div class="jp_listing_list_icon_cont_wrapper">
                                                    <ul>
                                                        <li><?php echo isset($val->period_start)?$val->period_start:'';?> - <?php echo isset($val->period_end)?$val->period_end:'';?></li>
                                                        <li><?php echo isset($val->title)?$val->title:'';?> <?php echo isset($val->institute)?' At '.$val->institute:'';?></li>
                                                    </ul>
                                                    <p><?php echo isset($val->education_desc)?$val->education_desc:'';?></p>
                                                </div>
                                            </div>
											<?php } ?>
                                          </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="job_filter_category_sidebar company_wrapper jb_cover">
                                <div class="job_filter_sidebar_heading jb_cover">
                                    <h1>work experience <span><a href="#" data-toggle="modal" data-target="#myModal6"><i class="fas fa-edit"></i></a></span></h1>
                                </div>
								
                                <div class="modal fade delete_popup company_popup" id="myModal6" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                    <div class="delett_cntn jb_cover">
                                                        <h1><i class="fas fa-edit"></i>experience</h1>

                                                        <div class="category_wrapper jb_cover" id="experience_div" >
														
														<div id="textboxexperience" class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                    <div class="category_lavel jb_cover">
                                                                        <p>experience 1 :</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                                    <div class="delete_jb_form gallery_link">   
                                                                        <input required type="text" name="title_exp[]" id="title_exp1" value="<?php echo isset($detailExperience[0]->title)?$detailExperience[0]->title:''; ?>" placeholder="Title">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input required type="text" name="company[]" id="company1" value="<?php echo isset($detailExperience[0]->company)?$detailExperience[0]->company:''; ?>" placeholder="Company">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input  class="experience_datepicker" required type="text" name="period_exp1[]" id="period_expfirst" value="<?php echo isset($detailExperience[0]->period_start)?$detailExperience[0]->period_start:''; ?>" placeholder="Start">
                                                                    </div>
																	<div class="delete_jb_form gallery_link">
                                                                        <input class="experience_datepicker"  required type="text" name="period_exp2[]" id="period_expsecond" value="<?php echo isset($detailExperience[0]->period_end)?$detailExperience[0]->period_end:''; ?>" placeholder="End or current">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">

                                                                        <textarea name="description_exp[]" id="description_exp1" rows="2" placeholder="Description"><?php echo isset($detailExperience[0]->description)?$detailExperience[0]->description:''; ?></textarea>
                                                                    </div>
																	<button id="removeButtonExperience" onclick="javascript:$('#textboxexperience').remove();" type="button" class="minus">-</button>

                                                                </div>
                                                            </div>
															
														<?php if(isset($detailExperience) && !empty($detailExperience)) {
																foreach($detailExperience as $key=>$val) { if($key==0){ continue;} $datepickerCounter2 = ($key+1)*($key+1)+20;?>
                                                            <div id="textboxexperience<?php echo $key+1;?>" class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                    <div class="category_lavel jb_cover">
                                                                        <p>experience <?php echo $key+1;?> :</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                                    <div class="delete_jb_form gallery_link">   
                                                                        <input required type="text" name="title_exp[]" id="title_exp1" value="<?php echo isset($val->title)?$val->title:''; ?>" placeholder="Title">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input required type="text" name="company[]" id="company1" value="<?php echo isset($val->company)?$val->company:''; ?>" placeholder="Company">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input  class="experience_datepicker" required type="text" name="period_exp1[]" id="period_exp<?php echo $key+1; ?>" value="<?php echo isset($val->period_start)?$val->period_start:''; ?>" placeholder="Start">
                                                                    </div>
																	<div class="delete_jb_form gallery_link">
                                                                        <input class="experience_datepicker"  required type="text" name="period_exp2[]" id="period_exp<?php echo $datepickerCounter2; ?>" value="<?php echo isset($val->period_end)?$val->period_end:''; ?>" placeholder="End or current">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">

                                                                        <textarea name="description_exp[]" id="description_exp1" rows="2" placeholder="Description"><?php echo isset($val->description)?$val->description:''; ?></textarea>
                                                                    </div>
																	<button id="removeButtonExperience<?php echo $key+1; ?>" onclick="javascript:$('#textboxexperience<?php echo $key+1; ?>').remove();" type="button" class="minus">-</button>

                                                                </div>
                                                            </div>
														<?php }} ?>
                                                        </div>
                                                        <!--<div class="category_wrapper gallery_browse jb_cover">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                    <div class="category_lavel jb_cover">
                                                                        <p>experience 2 :</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input required type="text" name="title_exp[]" id="title_exp2" value="<?php echo isset($detailExperience[1]->title)?$detailExperience[1]->title:''; ?>" placeholder="Title">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input required type="text" name="company[]" id="company2" value="<?php echo isset($detailExperience[1]->company)?$detailExperience[1]->company:''; ?>" placeholder="Company">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input required type="text" name="period_exp[]" id="period_exp2" value="<?php echo isset($detailExperience[1]->period)?$detailExperience[1]->period:''; ?>" placeholder="Period">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">

                                                                        <textarea name="description_exp[]" id="description_exp2" rows="2" placeholder="Description"><?php echo isset($detailExperience[1]->description)?$detailExperience[1]->description:''; ?></textarea>
                                                                    </div>

                                                                </div>
																
																<div class="col-lg-9 col-md-9 col-sm-12 col-12">
																		
																	<div id="message_div_experience" style="display:none;" class="form-group icon_form comments_form error">
																	<label id="message_lbl_experience" style="color:red;" class="control error">
																	</label>
																	</div>
																</div>
                                                            </div>
                                                        </div>-->
														
														
																<div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                    <div class="category_lavel jb_cover">
                                                                        <p></p>
                                                                    </div>
                                                                </div>
																<div class="col-lg-3 col-md-3 col-sm-12 col-12">
																		
																<button id="addButtonExperience" type="button" class="pluse">+</button>
																</div>
																<div class="col-lg-9 col-md-9 col-sm-12 col-12">
																		
																	<div id="message_div_experience" style="display:none;" class="form-group icon_form comments_form error">
																	<label id="message_lbl_experience" style="color:red;" class="control error">
																	</label>
																	</div>
																</div>
                                                        <div class="header_btn search_btn applt_pop_btn">

                                                            <a href="javascript:void(0);" id="save_experience" >save updates</a>

                                                        </div>
                                                        <div class="cancel_wrapper">
                                                            <a href="#" data-dismiss="modal">cancel</a>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="job_overview_header jb_cover">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
										<?php if(isset($detailExperience) && !empty($detailExperience)) { 
										foreach($detailExperience as $key=>$val) {  ?>
                                            <div class="jp_listing_overview_list_main_wrapper education_board jb_cover">
                                                <div class="jp_listing_list_icon">
                                                    <i class="fas fa-suitcase"></i>
                                                </div>
                                                <div class="jp_listing_list_icon_cont_wrapper">
                                                    <ul>
                                                        <li><?php echo isset($val->period_start)?$val->period_start:''; ?> - <?php echo isset($val->period_end)?$val->period_end:''; ?></li>
                                                        <li><?php echo isset($val->title)?$val->title:''; ?> <?php echo isset($val->company)?' At '.$val->company:''; ?></li>
                                                    </ul>
                                                    <p><?php echo isset($val->description)?$val->description:''; ?></p>
                                                </div>
                                            </div>
										<?php }} ?>
                                           

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="job_filter_category_sidebar company_wrapper jb_cover">
                                <div class="job_filter_sidebar_heading jb_cover">
                                    <h1> special qualification <span><a href="#" data-toggle="modal" data-target="#myModal7"><i class="fas fa-edit"></i></a></span></h1>
                                </div>
                                <div class="modal fade delete_popup company_popup" id="myModal7" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                    <div class="delett_cntn jb_cover">
                                                        <h1><i class="fas fa-edit"></i>qualification</h1>

                                                        <div class="category_wrapper gallery_browse jb_cover">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                    <div class="category_lavel jb_cover">
                                                                        <p>type here:</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-12 col-12" id="qualification_div" >
																	
																		<div  class="delete_jb_form gallery_link">
																			<input type="text" name="qualification[]" value="<?php echo isset($detailQualification[0]->title)?$detailQualification[0]->title:''; ?>" placeholder="01">
																			
																		</div>
																		
																		<?php if(isset($detailQualification) && !empty($detailQualification)) {
																				foreach($detailQualification as $key=>$val)
																				{
																					if($key==0)
																						continue;
																					?>
																					<div  class="delete_jb_form gallery_link">
																						<input type="text" name="qualification[]" value="<?php echo isset($val->title)?$val->title:''; ?>" placeholder="<?php echo $key;?>">
																						<button id="removeButton<?php echo $key;?>" onclick="javascript:$(this).parent().remove();" type="button" class="minus">-</button>
																						
																					</div>			
																				<?php }
																		}?>
																	
																	
																	<!--
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input type="text" name="qualification[]" value="<?php echo isset($detailQualification[1]->title)?$detailQualification[1]->title:''; ?>" placeholder="02">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input type="text" name="qualification[]" value="<?php echo isset($detailQualification[2]->title)?$detailQualification[2]->title:''; ?>" placeholder="03">
                                                                    </div>
                                                                    <div class="delete_jb_form gallery_link">
                                                                        <input type="text" name="qualification[]" value="<?php echo isset($detailQualification[3]->title)?$detailQualification[3]->title:''; ?>" placeholder="04">
                                                                    </div>
																	-->
                                                                </div>
																<div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                    <div class="category_lavel jb_cover">
                                                                        <p></p>
                                                                    </div>
                                                                </div>
																<div class="col-lg-3 col-md-3 col-sm-12 col-12">
																		
																<button id="addButton" type="button" class="pluse">+</button>
																</div> 
																<div class="col-lg-9 col-md-9 col-sm-12 col-12">
																		
																	<div id="message_div_qualification" style="display:none;" class="form-group icon_form comments_form error">
																	<label id="message_lbl_qualification" style="color:red;" class="control error">
																	</label>
																	</div>
																</div>
                                                            </div>
                                                        </div>

                                                        <div class="header_btn search_btn applt_pop_btn">

                                                            <a href="javascript:void(0);" id="save_qualification">save updates</a>

                                                        </div>
                                                        <div class="cancel_wrapper">
                                                            <a href="#" data-dismiss="modal">cancel</a>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="job_overview_header jb_cover">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
											<?php if(isset($detailQualification) && !empty($detailQualification)) { ?>
                                            <ul class="speical_qualification_wrapper">
                                                <?php foreach($detailQualification as $key=>$val ) { ?>
												<li><i class="fas fa-check-square"></i><?php echo isset($val->title)?$val->title:''; ?>
                                                </li>
												<?php } ?>
                                            </ul>
											<?php } ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
						<form id="resume_form" role="form" method="post" enctype="multipart/form-data" >
						     <div class="job_filter_category_sidebar company_wrapper jb_cover">
                                <div class="job_filter_sidebar_heading jb_cover">
                                    <h1> Resume File <span></span></h1>
                                </div>
								
								 <div class="header_btn search_btn jb_cover">
						<div class="resume_optional jb_cover">
															
                                                            <div class="width_50">
                                                                <input type="file" id="resume_file" name="resume_file" class="dropify" data-height="90" /><span class="post_photo">upload resume</span>
                                                            </div>
                                                            <p class="word_file"> microsoft word or pdf file only (5mb)</p>
															<br>
															<div class="width_50">
                                                                <?php if(isset($profile->resume) && $profile->resume!="") { ?>
						                                    <p class="word_file">Current Resume File </p><a target="_blank" href="<?php echo (RESUME_VIEW.$profile->resume)?>">View</a>
															<?php } ?>
                                                            <p>*</p>
															</div>
                                                            
															<div id="message_resume_div" style="display:none;" class="form-group icon_form comments_form error">
															<label id="message_resume_lbl" style="color:red;" class="control error">
															</label>
														</div>
														
                                                        </div>
														<div style="margin:20px 0px 0px 0px;" class="header_btn search_btn applt_pop_btn jb_cover">

															<button type="submit" class="applybutton" >Save changes</button>

														</div>
                            </div>
							
                               </div>
							   </form>
                       
                           
                        </div>
                    </div>
                </div>
            </div>
 <script>
 document.addEventListener("DOMContentLoaded", function(event) { 
 
 
 
 $( "#save_basic" ).click(function() {
				$('#message_div').css('display','none');
				$('#message_lbl').text("");
				
				$("#phone_number").css('border-color','');
				$("#email").attr('placeholder','');
				$("#website").attr('placeholder','');
				var phone_number = $("#phone_number").val();
				var email = $("#email").val();
				var website = $("#website").val();
				var address = $("#address").val();
				
				var current_job_title = $("#current_job_title").val();
				
				if(email.length == 0)
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
					formData.append("phone_number",phone_number);
					formData.append("email",email);
					formData.append("website",website);
					formData.append("address",address);
					formData.append("current_job_title",current_job_title);
					
					$.ajax({
						url: '<?php echo base_url('update-resume-profile');?>',
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
								
								window.location.replace("<?php echo base_url('candidate-resume')?>");
							}
						},
						cache: false,
						contentType: false,
						processData: false
					});
				}
});

$( "#save_aboutus" ).click(function() {
				
				$('#message_div_aboutus').css('display','none');
				$('#message_lbl_aboutus').text("");
				
				$("#about_us").css('border-color','');
				var about_us = $("#about_us").val();
				
				if(about_us.length == 0)
				{
					$("#about_us").css('border-color','red');
					$("#about_us").attr('placeholder','Please describe about your self');
				}
				else
				{
					var formData = new FormData();
					formData.append("about_us",about_us);
					$.ajax({
						url: '<?php echo base_url('update-resume-aboutus');?>',
						type: 'POST',
						data: formData,
						success: function (data) {
							var obj = jQuery.parseJSON(data);
							if(!obj.status && obj.message)
							{
								$('#message_div_aboutus').css('display','block');
								$('#message_lbl_aboutus').html(obj.message);
								setTimeout(function() { $("#message_div_aboutus").hide(); }, 5000);

								
							}
							else if(obj.status)
							{
								$('#message_div_aboutus').css('display','block');
								$('#message_lbl_aboutus').css("color","green");
								$('#message_lbl_aboutus').html("Success");
								if(obj.message)
								{
									$('#message_div_aboutus').css('display','block');
									$('#message_lbl_aboutus').html(obj.message);
								}
								
								setTimeout(function() { $("#message_div_aboutus").hide(); }, 7000);
								
								window.location.replace("<?php echo base_url('candidate-resume')?>");
							}
						},
						cache: false,
						contentType: false,
						processData: false
					});
				}
});


$( "#save_education" ).click(function() {
				
				$('#message_div_education').css('display','none');
				$('#message_lbl_education').text("");
				
				var title = $("input[name='title[]']").map(function(){
					return $(this).val();
				  }).get();
				
				var institute = $("input[name='institute[]']").map(function(){
					return $(this).val();
				  }).get();
				  
				var period = $("input[name='period[]']").map(function(){
					return $(this).val();
				  }).get();
				var education_desc = $("textarea[name='education_desc[]']").map(function(){
					return $(this).val();
				  }).get();
				  
				{
					var formData = new FormData();
					formData.append("education_desc",education_desc);
					formData.append("period",period);
					formData.append("institute",institute);
					formData.append("title",title);
					$.ajax({
						url: '<?php echo base_url('update-resume-education');?>',
						type: 'POST',
						data: formData,
						success: function (data) {
							var obj = jQuery.parseJSON(data);
							if(!obj.status && obj.message)
							{
								$('#message_div_education').css('display','block');
								$('#message_lbl_education').html(obj.message);
								setTimeout(function() { $("#message_div_education").hide(); }, 5000);

								
							}
							else if(obj.status)
							{
								$('#message_div_education').css('display','block');
								$('#message_lbl_education').css("color","green");
								$('#message_lbl_education').html("Success");
								if(obj.message)
								{
									$('#message_div_education').css('display','block');
									$('#message_lbl_education').html(obj.message);
								}
								
								setTimeout(function() { $("#message_div_education").hide(); }, 7000);
								
								window.location.replace("<?php echo base_url('candidate-resume')?>");
							}
						},
						cache: false,
						contentType: false,
						processData: false
					});
				}
});



$( "#save_experience" ).click(function() {
				
				$('#message_div_experience').css('display','none');
				$('#message_lbl_experience').text("");
				
				var title_exp = $("input[name='title_exp[]']").map(function(){
					return $(this).val();
				  }).get();
				
				var company = $("input[name='company[]']").map(function(){
					return $(this).val();
				  }).get();
				  
				var period_exp1 = $("input[name='period_exp1[]']").map(function(){
					return $(this).val();
				  }).get();
				  var period_exp2 = $("input[name='period_exp2[]']").map(function(){
					return $(this).val();
				  }).get();
				var description_exp = $("textarea[name='description_exp[]']").map(function(){
					return $(this).val();
				  }).get();
				  
				{
					var formData = new FormData();
					formData.append("description_exp",description_exp);
					formData.append("period_exp1",period_exp1);
					formData.append("period_exp2",period_exp2);
					formData.append("company",company);
					formData.append("title_exp",title_exp);
					$.ajax({
						url: '<?php echo base_url('update-resume-experience');?>',
						type: 'POST',
						data: formData,
						success: function (data) {
							var obj = jQuery.parseJSON(data);
							if(!obj.status && obj.message)
							{
								$('#message_div_experience').css('display','block');
								$('#message_lbl_experience').html(obj.message);
								setTimeout(function() { $("#message_div_experience").hide(); }, 5000);

								
							}
							else if(obj.status)
							{
								$('#message_div_experience').css('display','block');
								$('#message_lbl_experience').css("color","green");
								$('#message_lbl_experience').html("Success");
								if(obj.message)
								{
									$('#message_div_experience').css('display','block');
									$('#message_lbl_experience').html(obj.message);
								}
								
								setTimeout(function() { $("#message_div_experience").hide(); }, 7000);
								
								window.location.replace("<?php echo base_url('candidate-resume')?>");
							}
						},
						cache: false,
						contentType: false,
						processData: false
					});
				}
});

$( "#save_qualification" ).click(function() {
				
				$('#message_div_qualification').css('display','none');
				$('#message_lbl_qualification').text("");
				
				var qualification = $("input[name='qualification[]']").map(function(){
					return $(this).val();
				  }).get();
				  
				{
					var formData = new FormData();
					formData.append("qualification",qualification);
					$.ajax({
						url: '<?php echo base_url('update-resume-qualification');?>',
						type: 'POST',
						data: formData,
						success: function (data) {
							var obj = jQuery.parseJSON(data);
							if(!obj.status && obj.message)
							{
								$('#message_div_qualification').css('display','block');
								$('#message_lbl_qualification').html(obj.message);
								setTimeout(function() { $("#message_div_qualification").hide(); }, 5000);

								
							}
							else if(obj.status)
							{
								$('#message_div_qualification').css('display','block');
								$('#message_lbl_qualification').css("color","green");
								$('#message_lbl_qualification').html("Success");
								if(obj.message)
								{
									$('#message_div_qualification').css('display','block');
									$('#message_lbl_qualification').html(obj.message);
								}
								
								setTimeout(function() { $("#message_div_qualification").hide(); }, 7000);
								
								window.location.replace("<?php echo base_url('candidate-resume')?>");
							}
						},
						cache: false,
						contentType: false,
						processData: false
					});
				}
});



	
	$("form#resume_form").submit(function(e) {
			e.preventDefault();
				$('#message_resume_div').css('display','none');
				$('#message_resume_lbl').text("");
				
				
				if(document.getElementById('resume_file').files.length === 0){
					$('#message_resume_div').css('display','block');
					$('#message_resume_lbl').html("Resume is required");
					setTimeout(function() { $("#message_resume_div").hide(); }, 5000);
					return false;
				}
				else
				{
					var formData = new FormData();

					formData.append("resume", document.getElementById('resume_file').files[0]);
					$.ajax({
						url: '<?php echo base_url('update-resume-file');?>',
						type: 'POST',
						data: formData,
						success: function (data) {
							var obj = jQuery.parseJSON(data);
							if(!obj.status && obj.message)
							{
								$('#message_resume_div').css('display','block');
								$('#message_resume_lbl').html(obj.message);
								setTimeout(function() { $("#message_resume_div").hide(); }, 5000);

								
							}
							else if(obj.status)
							{
								$('#message_resume_div').css('display','block');
								$('#message_resume_lbl').css("color","green");
								$('#message_resume_lbl').html("Success");
								setTimeout(function() { $("#message_resume_div").hide(); }, 5000);
								
								window.location.replace("<?php echo base_url('candidate-resume');?>");
							}
						},
						cache: false,
						contentType: false,
						processData: false
					});
				}	
			
		});


	var counter = 2;

    $("#addButton").click(function () {

	if(counter>10){
           
			$('#message_div_qualification').css('display','block');
			$('#message_lbl_qualification').html("Only 10 qualifications allowed");
			setTimeout(function() { $("#message_div_qualification").hide(); }, 5000);
            return false;
	}

	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter)
	     .attr("class", 'delete_jb_form gallery_link');

	
		  
		  
		  newTextBoxDiv.after().html('<input id="textbox' + counter + '" type="text" name="qualification[]" value=""><button id="removeButton' + counter + '" onclick="javascript:$(this).parent().remove();" type="button" class="minus">-</button>');
		  
		  

	newTextBoxDiv.appendTo("#qualification_div");


	counter++;
     });

     $("#removeButton").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }

	counter--;

        $("#TextBoxDiv" + counter).remove();

     });

     $("#getButtonValue").click(function () {

	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
     });











if(<?php echo count($detailExperience)?>==0)
{
	var counterExperience = 2
}
else
{
	var counterExperience = <?php echo count($detailExperience)?>+1;
}


    $("#addButtonExperience").click(function () {

	if(counterExperience>10){
           
			$('#message_div_experience').css('display','block');
			$('#message_lbl_experience').html("Only 10 experiences allowed");
			setTimeout(function() { $("#message_div_experience").hide(); }, 5000);
            return false;
	}

	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDivExperience' + counterExperience)
	     .attr("class", 'delete_jb_form gallery_link');

	
		  
		  
		  newTextBoxDiv.after().html('<div id="textboxexperience' + counterExperience + '" class="row">'+
				'<div class="col-lg-3 col-md-3 col-sm-12 col-12">'+
					'<div class="category_lavel jb_cover">'+
						'<p>experience '+counterExperience+' :</p>'+
					'</div>'+
				'</div>'+
				'<div class="col-lg-9 col-md-9 col-sm-12 col-12">'+
					'<div class="delete_jb_form gallery_link">  '+ 
						'<input required type="text" name="title_exp[]" id="title_exp1" value="" placeholder="Title">'+
					'</div>'+
					'<div class="delete_jb_form gallery_link">'+
						'<input required type="text" name="company[]" id="company1" value="" placeholder="Company">'+
					'</div>'+
					'<div class="delete_jb_form gallery_link">'+
						'<input class="experience_datepicker" required type="text" name="period_exp1[]" id="period_exp'+((counterExperience*counterExperience)+150)+'" value="" placeholder="Start">'+
					'</div>'+
					'<div class="delete_jb_form gallery_link">'+
						'<input class="experience_datepicker" required type="text" name="period_exp2[]" id="period_exp'+((counterExperience*counterExperience)+120)+'" value="" placeholder="End or current">'+
					'</div>'+
					'<div class="delete_jb_form gallery_link">'+

						'<textarea name="description_exp[]" id="description_exp1" rows="2" placeholder="Description"></textarea>'+
					'</div>'+
					'<button id="removeButtonExperience' + counterExperience + '" onclick="javascript:$(\'#textboxexperience'+counterExperience+'\').remove();" type="button" class="minus">-</button>'+
				'</div>'+
			'</div>');
		  
		  

	newTextBoxDiv.appendTo("#experience_div");
$( function() {
	 
			$('.experience_datepicker').each(function(){
    $(this).datepicker();
});
			
 });

	counterExperience++;
     });

     $("#removeButtonExperience").click(function () {
	if(counterExperience==1){
          alert("No more textbox to remove");
          return false;
       }

	counterExperience--;

        $("#TextBoxDivExperience" + counterExperience).remove();

     });

     $("#getButtonValueExperience").click(function () {

	var msg = '';
	for(i=1; i<counterExperience; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textboxExperience' + i).val();
	}
    	  alert(msg);
     });




$( function() {
	 
			$('.experience_datepicker').each(function(){
    $(this).datepicker();
});
			
 });

		
});

function isEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
	
	
	
  
  
</script> 