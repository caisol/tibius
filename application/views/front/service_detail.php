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

                        <h1>Services Detail </h1>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 col-sm-4">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="<?php echo base_url();?>"> Home </a>&nbsp; / &nbsp; </li>
                                <li><?php echo isset($title)?$title:'Services'?> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top header wrapper end -->
   
<?php			

?>

<?php	
$this->load->view($service_detail);
$this->load->view($front_footer);
?>	
	
	

    










