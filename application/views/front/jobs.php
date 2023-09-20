<?php
$this->load->view($front_header);
?>
<!-- top header wrapper start -->
    <div class="page_title_section">

        <div class="page_header">
            <div class="container">
                <div class="row">
                    <!-- section_heading start -->
                    <div class="col-lg-9 col-md-9 col-12 col-sm-8">

                        <h1>job listing</h1>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 col-sm-4">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="<?php echo base_url();?>"> Home </a>&nbsp; / &nbsp; </li>
                                <li>job listing</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top header wrapper end -->
    <!--job listing filter  wrapper start-->
    <div class="job_filter_listing_wrapper jb_cover">
        <div class="container">

            <div class="row">
<?php			

$this->load->view($jobs_left_filters);
$this->load->view($jobs_list);
//$this->load->view($news_app_wrapper);
?>
</div>
        </div>
    </div>

    <!--job listing filter  wrapper end-->
<?php	
$this->load->view($front_footer);
//$this->load->view($chatbox_wrapper);
?>	
	
	

    










