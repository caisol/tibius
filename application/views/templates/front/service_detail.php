<!--job listing filter  wrapper start-->
    <div class="blog_single_wrapper jb_cover">
        <div class="container">

            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-12">

                    <div class="jp_first_blog_post_main_wrapper jb_cover">
                        <div class="jp_first_blog_post_img">
                            <img src="<?php echo FRONT_IMAGES.$service_image; ?>" class="img-responsive" alt="blog_img" />
                        </div>
                        <div class="jp_first_blog_post_cont_wrapper">
                            
                            <h3><a href="#"><?php echo isset($title)?$title:'';?> </a></h3>
                            
							<?php $this->load->view($services_content);?>
                        </div>
                      </div>

                   
                </div>
                <!--<div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="job_filter_category_sidebar jb_cover">
                        <div class="job_filter_sidebar_heading jb_cover">
                            <h1>search</h1>
                        </div>

                        <div class="category_jobbox jb_cover">
                            <div class="jp_blog_right_search_wrapper jb_cover">
                                <input type="text" placeholder="Search">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                   
                    </div>-->
                </div>
            </div>
        </div>
    </div>
	 <!-- blog single wrapper end-->