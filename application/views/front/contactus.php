<?php
$this->load->view($front_header);
?>
    <!-- top header wrapper start -->
    <div class="page_title_section">

        <div class="page_header">
            <div class="container">
                <div class="row">
                    <!-- section_heading start -->
                    <div class="col-lg-9 col-md-8 col-12 col-sm-7">

                        <h1>contact us</h1>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12 col-sm-5">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="<?php echo base_url(); ?>"> Home </a>&nbsp; / &nbsp; </li>
                                <li>contact us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top header wrapper end -->

<?php			

$this->load->view($contactus);
$this->load->view($map_wrapper);
//$this->load->view($news_letter);
?>

<?php	
$this->load->view($front_footer);
//$this->load->view($chatbox_wrapper);
?>	
	
	

    










