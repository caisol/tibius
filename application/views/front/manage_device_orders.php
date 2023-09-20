<style>
input.form-control{
	padding: .5rem 8rem !important;
}
</style>
		<link rel="stylesheet" href="<?php echo FRONT; ?>datatable/dataTables.bootstrap4.min.css">

	<!-- Breadcrumb -->
				<!-- Page Title -->
				<div class="container mt-0">
					<div class="row breadcrumb-bar">
						<div class="col-md-6">
							<h3 class="block-title">Device Orders</h3>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="<?php echo base_url("");?>">
										<span class="ti-home"></span>
									</a>
								</li>
								<li class="breadcrumb-item">Device Orders</li>
								<li class="breadcrumb-item active">Device Orders</li>
							</ol>
						</div>
					</div>
				</div>
			<!-- /Page Title -->

			<!-- /Breadcrumb -->
			<!-- Main Content -->
			<div class="container">

				<div class="row">
				
									<!-- Widget Item -->
                    <div class="col-md-12">
                        <div class="widget-area-2 proclinic-box-shadow">
						<div style="margin-top: 10px !important;" class="form-group col-md-5">
										<label for="existing_patients">Select Device  </label>
										<select  name="existing_devices" class="form-control" id="existing_devices" >
											<?php if(isset($devices) && !empty($devices)){
												foreach($devices as $key=>$val) { ?>
											<option <?php echo (isset($orders->device_id) && $orders->device_id==$val->id)?"selected":""; ?>  value="<?php echo  isset($val->id)?$val->id:0; ?>" ><?php echo isset($val->device_name)?$val->device_name:"N/A"; ?></option>
											<?php }}?>
										</select>
										
										

									</div>
                            <div class="row no-mp">
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <img class="card-img-top" src="http://via.placeholder.com/640x420/ddd/000/" alt="Card image">
                                        <div class="card-body">
                                            <h4 class="card-title">Dr Daniel Smith</h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the
                                                bulk of the
                                                card's
                                                content.</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Device ID</strong></td>
                                                    <td id="Device-ID" ></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Device Category</strong></td>
                                                    <td id="Device-Category" ></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Device Barcode</strong></td>
                                                    <td id="Device-Barcode" ></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Special Instructions</strong></td>
                                                    <td id="Special-Instructions" ></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Weight</strong> </td>
                                                    <td id="Weight" ></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Lenght</strong> </td>
                                                    <td id="Lenght" ></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Width</strong></td>
                                                    <td id="Width" ></td>
                                                </tr>
												<tr>
                                                    <td><strong>Height</strong></td>
                                                    <td id="Height" ></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                       
                                    </div>
                                </div>
                            </div>
                
                        </div>
                    </div>
                    <!-- /Widget Item -->

					<!-- Widget Item -->
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
						<!-- Alerts-->
									<div style="display:none;" id="success_div" class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Successfully Done!</strong> Please add payment now
										<button type="button" class="close" onclick="$('#success_div').css('display','none');" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									
									<div  style="display:none;" id="error_div" class="alert alert-warning alert-dismissible fade show" role="alert">
										<strong>Holy guacamole!</strong> You should check in on some of those fields below.
										<button type="button" class="close" onclick="$('#error_div').css('display','none');" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									
									
									
									<!-- /Alerts-->
							<h3 class="widget-title">Order List</h3>							
							<div class="table-responsive mb-3">
								<table id="tableId" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th class="no-sort">
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="select-all">
													<label class="custom-control-label" for="select-all"></label>
												</div>
											</th>
											<th>Order ID</th>
											<th>Patient Name</th>
											<th>Contact</th>
											<th>Device Name</th>
											<th>Device BarCode</th>
											<th>Status</th>
											<th>Options</th>
											
										</tr>
									</thead>
									<tbody id="tableIdData" >
										<?php if(isset($devices) && !empty($devices)) { 
										foreach($devices as $key=>$val) { ?>
										<tr>
											<td>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="<?php echo isset($val->id)?$val->id:1;?>">
													<label class="custom-control-label" for="1"></label>
												</div>
											</td>
											<td><?php echo isset($val->id)?$val->id:"N/A";?></td>
											<td><?php echo isset($val->device_name)?$val->device_name:"N/A";?></td>
											<td><?php echo isset($val->device_barcode)?$val->device_barcode:"N/A";?></td>
											<td><?php echo isset($val->device_count)?$val->device_count:"N/A";?></td>
											<td>
												<ul class="pagination justify-content-center export-pagination">
												<li class="page-item">
													<a class="page-link" href="<?php echo base_url("edit-device/".$val->id)?>"><span class="ti-pencil-alt"></span> View</a>
												</li>
												<li class="page-item">
													<a class="page-link" href="<?php echo base_url("delete-device/".$val->id)?>">Take Action</a>
												</li>
												
											</ul>
											</td>
										</tr>
										<?php } } ?>
									</tbody>
								</table>
								<!--Export links-->
								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center export-pagination">
										<li class="page-item">
											<a class="page-link" href="#"><span class="ti-download"></span> csv</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#"><span class="ti-printer"></span>  print</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#"><span class="ti-file"></span> PDF</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#"><span class="ti-align-justify"></span> Excel</a>
										</li>
									</ul>
								</nav>
								
							</div>
						
						
						
						
						
						</div>
					</div>
					<!-- /Widget Item -->
					
                    
				</div>
			</div>
			<!-- /Main Content -->

	
				<script>
	submitSignupForm();
	function  submitSignupForm()
	{
		 
		

		 
		document.addEventListener("DOMContentLoaded", function(event) {
			
			$(document).ready(function() {
				$('#existing_devices').select2();
				var attachmentValue = $('#existing_devices').val();
				loadDeviceOrders(attachmentValue);
				
				
				
				$('#existing_devices').on('change', function() {
				  loadDeviceOrders(this.value);
				  
				});



			});
			
			
			url = new URL(window.location.href);

			if (url.searchParams.get('msg')) {
				var msg = url.searchParams.get('msg');
				if(msg && msg=="Success")
				{
					$('#success_div').css('display','block');
					$('#success_div').html('<strong>Successfully Done!</strong> Please wait you will be redirect to dashboard <button type="button" class="close" onclick="$(\'#success_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
					setTimeout(function() { $("#success_div").hide(); }, 5000);
				}
				else if(msg && msg=="Error")
				{
					$('#error_div').css('display','block');
					$('#error_div').html('<strong>Something went wrong!</strong> Server side validations.<button type="button" class="close" onclick="$(\'#error_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
					setTimeout(function() { $("#error_div").hide(); }, 5000);

				}
			}

// Payents datatable
    $('#tableId').DataTable({
        "order": [],
        "columnDefs": [{
            "targets": 'no-sort',
            "orderable": false,
        }]
    });		
	});
	}


	 function loadDeviceOrders(device_id)
   {
	   
	   if(device_id>0)
	   {
		   
		   $.post( "<?php echo base_url('get-device-orders');?>", { 
				device_id: device_id })
				  .done(function( data ) {
					
						var obj = jQuery.parseJSON(data);
						
						console.log(obj);
						/*$("#patient_info_div").html("");
						var patint_info_div_html="";
						
						$("#patient_address_div").html("");
						var patient_address_div_html="";
						
						$("#patient_contact_div").html("");
						var patient_contact_div_html="";
						*/
						
						if(!obj.status && obj.message)
						{
							
							console.log(obj);
						}
						else if(obj.status && obj.order_data && obj.devices)
						{
							
							devices = obj.devices;
							$('.card-img-top').attr('src','<?php echo DEVICE_IMAGES;?>'+devices.device_image)
							$('.card-title').html(devices.device_name);
							$('.card-text').html(devices.device_description);
							$('#Device-ID').html(devices.id);
							$('#Device-Category').html(devices.device_category);
							$('#Device-Barcode').html(devices.device_barcode);
							$('#Special-Instructions').html(devices.device_comments);
							$('#Weight').html(devices.device_numeric_weight+' '+devices.device_unit);
							$('#Lenght').html(devices.device_length+' in');
							$('#Width').html(devices.device_width+' in');
							$('#Height').html(devices.device_height+' in');
							$("#tableIdData").html('');
							var order_data = obj.order_data
							
							if(order_data)
							{
								var tableIdDataHtml="";
								$.each(order_data, function( index, value ) {
									orderStatus="<span class='badge badge-success'>New</span>";
									if(value.order_status=="Pending")
									{
										orderStatus="<span class='badge badge-warning'>Pending</span>";

									}
									else if(value.order_status=="Cancelled")
									{
										orderStatus="<span class='badge badge-danger'>Cancelled</span>";

									}
									else if(value.order_status=="Submitted")
									{
										orderStatus="<span class='badge badge-success'>Submitted</span>";

									}
								  tableIdDataHtml+='<tr>'+
											'<td>'+
												'<div class="custom-control custom-checkbox">'+
													'<input class="custom-control-input" type="checkbox" id="'+value.id+'">'+
													'<label class="custom-control-label" for="'+value.id+'"></label>'+
												'</div>'+
											'</td>'+
											'<td>'+value.id+'</td>'+
											'<td>'+value.first_name+'</td>'+
											'<td>'+value.email+'</td>'+
											'<td>'+value.device_name+'</td>'+
											'<td>'+value.device_barcode+'</td>'+
											'<td>'+orderStatus+'</td>'+
											'<td>'+
												'<ul class="pagination justify-content-center export-pagination">'+
												'<li class="page-item">'+
													'<a class="page-link" href="<?php echo base_url("order-summary")?>/'+value.id+'"><span class="ti-pencil-alt"></span> View</a>'+
												'</li>'+
												
											'</ul>'+
											'</td>'+
										'</tr>';
								});
								$("#tableIdData").html(tableIdDataHtml);
							}
							
							
						}
						else
						{
							$("#tableIdData").html('');
						}
				  });
	   }
	   
   }
	
	</script>
	
