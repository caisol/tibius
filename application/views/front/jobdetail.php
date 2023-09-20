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

                        <h1><?php echo isset($detail[0]->title)?custom_echo($detail[0]->title,25):'Job Detail'; ?></h1>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 col-sm-4">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="<?php echo base_url('');?>"> Home </a>&nbsp; / &nbsp; </li>
                                <li>Job Detail</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top header wrapper end -->
	
	
	<?php	
$this->load->view($single_job_cover);
$this->load->view($front_footer);
//$this->load->view($chatbox_wrapper);
?>	