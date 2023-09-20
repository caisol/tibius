<link rel="stylesheet" type="text/css" href="<?php echo FRONT_CSS; ?>services_detail_style.css"/>

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

                        <h1>About us </h1>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 col-sm-4">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="<?php echo base_url();?>"> Home </a>&nbsp; / &nbsp; </li>
                                <li>About us </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top header wrapper end -->
   
<?php			

//$this->load->view($work_wrapper);
//$this->load->view($counter_wrapper);
$this->load->view($job_agency_wrapper);
//$this->load->view($team_wrapper);
//$this->load->view($job_review);
//$this->load->view($download_app_wrapper);
$this->load->view($news_letter);
?>

<?php	
$this->load->view($front_footer);
$this->load->view($chatbox_wrapper);
?>	
	
	

    










