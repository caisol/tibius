
	<!-- Breadcrumb -->
				<!-- Page Title -->
				<div class="container mt-0">
					<div class="row breadcrumb-bar">
						<div class="col-md-6">
							<h3 class="block-title">Add Order</h3>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.html">
										<span class="ti-home"></span>
									</a>
								</li>
								<li class="breadcrumb-item">Orders</li>
								<li class="breadcrumb-item active">Add Order</li>
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
							<h3 class="widget-title">Add Order</h3>
							<form>
								<div class="form-row">
									<input type="hidden" id="order_id" value="<?php echo isset($orders->id)?$orders->id:0; ?>" />
									<div class="form-group col-md-6">
										<label for="existing_patients">Select Existing Patient <span >OR</span> </label><button onclick="window.location.href='<?php echo base_url("add-patient"); ?>'" type="button" class="btn btn-primary"> Add Patient</button>
										<select  name="existing_patients" class="form-control" id="existing_patients" >
											<?php if(isset($patients) && !empty($patients)){
												foreach($patients as $key=>$val) { ?>
											<option <?php echo (isset($orders->patient_id) && $orders->patient_id==$val->id)?"selected":""; ?> value="<?php echo  isset($val->id)?$val->id:0; ?>" ><?php echo isset($val->first_name)?$val->first_name." ".$val->phone_number:"N/A"; ?></option>
											<?php }}?>
										</select>
										
										

									</div>
									
                                    
									<div class="form-group col-md-6">
										<label for="existing_patients">Select Device  </label>
										<select  name="existing_devices" class="form-control" id="existing_devices" >
											<?php if(isset($devices) && !empty($devices)){
												foreach($devices as $key=>$val) { ?>
											<option <?php echo (isset($orders->device_id) && $orders->device_id==$val->id)?"selected":""; ?>  value="<?php echo  isset($val->id)?$val->id:0; ?>" ><?php echo isset($val->device_name)?$val->device_name:"N/A"; ?></option>
											<?php }}?>
										</select>
										
										

									</div>
									
									<div class="form-group col-md-12">
									
										<div class="col-sm-4 mb-3">
											<div class="card">
												<div class="card-body">
													<h4 class="card-title">Device attachments</h4>
													<div id="attachmentsDiv">
													</div>
													
												</div>
											</div>
										</div>									
									</div>
									<div class="form-group col-md-6">
										<label for="problem">Address</label>
										<textarea placeholder="Address" class="form-control" id="address" rows="3"><?php echo isset($orders->address)?$orders->address:''; ?></textarea>
									</div>
									
									<div class="form-group col-md-6">
										<label for="order_status">Order Status</label>
										<select  name="order_status" class="form-control" id="order_status" >
											<option <?php echo (isset($orders->order_status) && $orders->order_status=="New")?"selected":""; ?>  value="New" >New</option>
											<option <?php echo (isset($orders->order_status) && $orders->order_status=="Pending")?"selected":""; ?> value="Pending" >Pending</option>
											<option <?php echo (isset($orders->order_status) && $orders->order_status=="Shipped")?"selected":""; ?> value="Shipped" >Shipped</option>
											<option <?php echo (isset($orders->order_status) && $orders->order_status=="Cancelled")?"selected":""; ?> value="Cancelled" >Cancelled</option>
											<option <?php echo (isset($orders->order_status) && $orders->order_status=="Delieverd")?"selected":""; ?> value="Delieverd" >Delieverd</option>
											<option <?php echo (isset($orders->order_status) && $orders->order_status=="Enque")?"selected":""; ?> value="Enque" >Enque</option>
											
										</select>
										
										

									</div>
									
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
									
									
									<div class="form-group col-md-6 mb-3">
										<button id="submit_btn" type="button" class="btn btn-primary btn-lg">Submit</button>
									</div>
								</div>
							</form>
							
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
			// In your Javascript (external .js resource or <script> tag)
			$(document).ready(function() {
				$('#existing_patients').select2();
				$('#existing_devices').select2();
				var attachmentValue = $('#existing_devices').val();
				getAttachments(attachmentValue);
				
				$('#existing_devices').on('change', function() {
				  getAttachments(this.value);
				});

			});
			
			$("#submit_btn").click(function(){
				
				$('#success_div').css('display','none');
				$('#error_div').css('display','none');
				
				
				$("#existing_patients").css('border-color','#efefef');
				$("#existing_devices").css('border-color','#efefef');
				
				$("#address").css('border-color','#efefef');
				
				
				var existing_patients = $("#existing_patients").val();
				var existing_devices = $("#existing_devices").val();
				var order_status = $("#order_status").val();
				var address = $("#address").val();
				var order_id = $("#order_id").val();
				if(existing_patients.length == 0)
				{
					
					$("#existing_patients").css('border-color','#f5c6cb');
					$('html, body').animate({
						scrollTop: $("#existing_patients").offset().top
					}, 1000);

				}
				else if(existing_devices.length == 0)
				{
					
					$("#existing_devices").css('border-color','#f5c6cb');
					$('html, body').animate({
						scrollTop: $("#existing_devices").offset().top
					}, 1000);
				}
				else if(address.length == 0)
				{
					
					$("#address").css('border-color','#f5c6cb');
					$('html, body').animate({
						scrollTop: $("#address").offset().top
					}, 1000);
				}
				else
				{
					
				$.post( "<?php echo base_url('order-submit');?>", { 
				existing_patients: existing_patients,
				existing_devices: existing_devices,
				order_status: order_status,
				address: address,
				order_id: order_id })
				  .done(function( data ) {
					
						var obj = jQuery.parseJSON(data);
						if(!obj.status && obj.message)
						{
							$('#error_div').css('display','block');
							$('#error_div').html('<strong>'+obj.message+'!</strong> Server side validations.<button type="button" class="close" onclick="$(\'#error_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
					
						}
						else if(obj.status)
						{
							$('#success_div').css('display','block');
							$('#success_div').html('<strong>Successfully Done!</strong> Please wait you will be redirect to dashboard <button type="button" class="close" onclick="$(\'#success_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
							setTimeout(function() { $("#success_div").hide(); }, 5000);
							
							window.location.replace("<?php echo base_url('manage-orders')?>");
						}
				  });
				}
			}); 
		});
	}
   
   function getAttachments(deviceid)
   {
	   $.post( "<?php echo base_url('get-device-attachments');?>", { 
				deviceid: deviceid })
				  .done(function( data ) {
					
						var obj = jQuery.parseJSON(data);
						$("#attachmentsDiv").html("");
						if(!obj.status && obj.message)
						{
							alert("");
							console.log(obj);
						}
						else if(obj.status && obj.device_attachments)
						{
							var device_attachments = obj.device_attachments
							var attachmentDivHtml="";
							$.each(device_attachments, function( index, value ) {
							  attachmentDivHtml+='<br>'+
													'<div class="text-left">'+
														'<div class="custom-control custom-checkbox">'+
															'<input class="custom-control-input" type="checkbox" checked id="ex-check-'+value.id+'">'+
															'<label class="custom-control-label" for="ex-check-2">'+value.name+'</label>'+
														'</div>'+
													'</div>';
							});
							$("#attachmentsDiv").html(attachmentDivHtml);
						}
				  });
   }
	</script>
	
	
