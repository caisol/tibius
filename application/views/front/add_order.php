<style>

.slider:hover {
  opacity: 1;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #FF0000;
  cursor: pointer;
}

.sliderticks {
  display: flex;
  justify-content: space-between;
  padding: 0 15px;
}

.sliderticks p {
  position: relative;
  display: flex;
  justify-content: center;
  text-align: center;
  width: 1px;
  
}
</style>
	<!-- Breadcrumb -->
				<!-- Page Title -->
				<div class="container mt-0">
					<div class="row breadcrumb-bar">
						<div class="col-md-6">
							<h3 class="block-title"><?php echo (isset($orders->id) && $orders->id>0)?"View Order":"Add Order" ; ?></h3>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="<?php echo base_url("");?>">
										<span class="ti-home"></span>
									</a>
								</li>
								<li class="breadcrumb-item">Orders</li>
								<li class="breadcrumb-item active"><?php echo (isset($orders->id) && $orders->id>0)?"View Order":"Add Order" ; ?></li>
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
							<h3 class="widget-title"><?php echo (isset($orders->id) && $orders->id>0)?"View Order":"Add Order" ; ?></h3>
							<form>
								<div class="form-row">
									<!--<div class="form-group col-md-3">
										<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox"  id="pcheck"><label class="custom-control-label" for="pcheck">Return Required</label></div></div>
									</div>-->
									<input type="hidden" id="order_id" value="<?php echo isset($orders->id)?$orders->id:0; ?>" />
									<div class="form-group col-md-12 ">
										<!--<label for="order_status">Order Status</label>
										<select  name="order_status" class="form-control" id="order_status" >
											<option <?php echo (isset($orders->order_status) && $orders->order_status=="New")?"selected":""; ?>  value="New" >New</option>
											<option <?php echo (isset($orders->order_status) && $orders->order_status=="Review")?"selected":""; ?> value="Pending" >Review</option>
											<option <?php echo (isset($orders->order_status) && $orders->order_status=="Submitted")?"selected":""; ?> value="Shipped" >Submitted</option>
											
											
										</select>
										-->
										
										<label for="fader">Order Status</label>
										<?php 
										if(isset($orders->order_status) && $orders->order_status=="New")
										{
											$orders->order_status=0;
										}
										elseif(isset($orders->order_status) && $orders->order_status=="Review")
										{
											$orders->order_status=1;
										}
										elseif(isset($orders->order_status) && $orders->order_status=="Submitted")
										{
											$orders->order_status=2;
										}
										?>
										<input  style="margin: 0 0 0px 0 !important;cursor: pointer;" class="form-control" value="<?php echo isset($orders->order_status)?$orders->order_status:0; ?>"  id="order_status" type="range" min="0" max="2" value="0" id="fader" 
										step="1" >
										<div style="margin:0px 30px 0px 15px !important" class="sliderticks">
											<p>New</p>
											<p>Review</p>
											<p>Submitted</p>
										</div>
									
									</div>
									<div class="form-group col-md-5">
										<label for="existing_patients">Select Existing Patient <span >OR</span> </label><button onclick="window.location.href='<?php echo base_url("add-patient"); ?>'" type="button" class="btn btn-primary"> Add Patient</button>
										<select  <?php echo (true || isset($user_type) && $user_type==2)?"disabled":""; ?> name="existing_patients" class="form-control" id="existing_patients" >
											<?php if(isset($patients) && !empty($patients)){
												foreach($patients as $key=>$val) { ?>
											<option <?php echo ((isset($orders->patient_id) && $orders->patient_id==$val->id) || isset($patient_id) && $patient_id==$val->id)?"selected":""; ?> value="<?php echo  isset($val->id)?$val->id:0; ?>" ><?php echo isset($val->first_name)?$val->first_name:"N/A"; ?></option>
											<?php }}?>
										</select>
										
										

									</div>
									
                                    
									<div style="margin-top: 10px !important;" class="form-group col-md-5">
										<label for="existing_patients">Select Device  </label>
										<select <?php echo (isset($user_type) && $user_type==2)?"disabled":""; ?>  name="existing_devices" class="form-control" id="existing_devices" >
											<?php if(isset($devices) && !empty($devices)){
												foreach($devices as $key=>$val) { ?>
											<option <?php echo (isset($orders->device_id) && $orders->device_id==$val->id)?"selected":""; ?>  value="<?php echo  isset($val->id)?$val->id:0; ?>" ><?php echo isset($val->device_name)?$val->device_name:"N/A"; ?></option>
											<?php }}?>
										</select>
										
										

									</div>
									
									
								</div>
								
								<h3 class="widget-title">Order Detail</h3>
								<div class="form-row">
									
									<div class="form-group col-md-6">
										<label for="problem">Order Detail</label>
										<textarea placeholder="" class="form-control" id="order_detail" rows="6"><?php echo isset($orders->order_detail)?$orders->order_detail:''; ?></textarea>
									</div>
									
									
									<div class="form-group col-md-3">
										<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-checkbox"><input class="custom-control-input"  type="checkbox" <?php echo (isset($orders->rush_indicator) && $orders->rush_indicator==1)?"checked":''; ?>  id="rush_indicator"><label class="custom-control-label" for="rush_indicator">Rush indicator</label></div></div>
									</div>
								</div>
								
								
								<h3 id="patient_info_div_title" style="display:none;" class="widget-title">Patient Information</h3>
								<div id="patient_info_div" style="display:none;" class="form-row">
									
									
								</div>
								<h6 id="patient_address_div_title" style="display:none;" >Patient Address Details</h6><br>
								
								<div id="patient_address_div" style="display:none;" class="form-row">
								</div>
								
								<h6 id="patient_contact_div_title" style="display:none;" >Patient Contact Details</h6><br>
								
								<div id="patient_contact_div" style="display:none;"  class="form-row">
								</div>
								
								
								
								
								<h3 id="guardian_info_div_title" style="display:none;" class="widget-title">Guardian/Legal Information</h3>
								<div id="guardian_info_div" style="display:none;" class="form-row">
									
									
								</div>
								<h6 id="guardian_address_div_title" style="display:none;" >Guardian Address Details</h6><br>
								
								<div id="guardian_address_div" style="display:none;" class="form-row">
								</div>
								
								<h6 id="guardian_contact_div_title" style="display:none;" >Guardian Contact Details</h6><br>
								
								<div id="guardian_contact_div" style="display:none;"  class="form-row">
								</div>
								
								
								
									
									<h3 id="parent_detail_title" style="display:none;" class="widget-title">Parent/Legal Guardian Information</h3>
								<div id="parent_detail" style="display:none;" class="form-row">
									

									
									<div class="form-group col-md-4">
										<label for="Doctor-name">First Name</label>
										<input type="text" class="form-control" value="Smantha"  placeholder="" id="first_name">
									</div>
									<div class="form-group col-md-4">
										<label for="Doctor-name">Middle Name</label>
										<input type="text" class="form-control" value="Smantha" placeholder="" id="middle_name">
									</div>
									<div class="form-group col-md-4">
										<label for="Doctor-name">Last Name</label>
										<input type="text" class="form-control" value="" placeholder="" id="last_name">
									</div>
								</div>
								
								<h3 id="parent_address_title" style="display:none;" class="widget-title">Address Information</h3>
								<div id="parent_address" style="display:none;" class="form-row">
									
										<div class="form-group col-md-3">
										<label for="device_shape">Address Type</label>
										<select  name="device_shape" class="form-control" id="device_shape" >
											<option value="Home" >Home</option>
											<option value="Office" >Office</option>
											<option value="Mailing" >Mailing</option>
											<option value="Others" >Others</option>
											
										</select>
										
										</div>
									<div class="form-group col-md-3">
										<label for="Doctor-name">Address Lin1</label>
										<input type="text" class="form-control" value="Home address line 1 street 23 C 19 A" placeholder="" id="last_name">
									</div>	
									<div class="form-group col-md-3">
										<label for="Doctor-name">Address Lin2</label>
										<input type="text" class="form-control" value="Home address line 1 street 24 C 19 A" placeholder="" id="last_name">
									</div>
									

									<div class="form-group col-md-3">
										<label for="Doctor-name">City</label>
										<input type="text" class="form-control" value="New Jrsy" placeholder="" id="last_name">
									</div>
									<div class="form-group col-md-3">
										<label for="Doctor-name">State</label>
										<input type="text" class="form-control" value="Same" placeholder="" id="last_name">
									</div>	
									<div class="form-group col-md-3">
										<label for="Doctor-name">Zipcode</label>
										<input type="text" class="form-control" value="25000" placeholder="" id="last_name">
									</div>
									<div class="form-group col-md-4">
										<label for="Doctor-name">Phone Number</label>
										<input type="text" class="form-control" value="326-541-2879" placeholder="" id="last_name">
									</div>	
								</div>
								
								
								
								<h3 class="widget-title" id="device_detail_title" style="display:none;"  >Device Details</h3>
								<div id="device_detail" style="display:none;" class="form-row">
								
									<div disabled id="device_attachments" style="display:none;" class="form-group col-md-6">
									
										<div class="card">
												<div class="card-body">
													<h4 class="card-title">Device attachments</h4>
													<div id="attachmentsDiv">
													</div>
													
												</div>
											</div>							
									</div>
										
										<div class="form-group col-md-6">
										<label for="problem">Directions of Use</label>
										<textarea placeholder="" class="form-control" id="directions" rows="6"><?php echo isset($orders->directions)?$orders->directions:''; ?></textarea>
									</div>	
									
									<div style="display:none;" class="form-group col-md-4">
										<label for="device_shape">Device Shape</label>
										<select  disabled name="device_shape" class="form-control" id="device_shape" >
											<option value="" >Select Shape</option>
											<option selected value="Package" >Package</option>
											<option value="Large Envelope" >Large Envelope</option>
											<option value="Letter" >Letter</option>
											<option value="Post Card" >Post Card</option>
											
										</select>
										
										

									</div>
									
									<div  style="display:none;" class="form-group col-md-4">
										<label for="weight_unit">Weight Unit</label>
										<select disabled name="weight_unit" class="form-control" id="weight_unit" >
											<option value="" >Select Unit</option>
											<option selected value="lb" >lb</option>
											<option value="oz" >oz</option>
											<option value="kg" >kg</option>
											
										</select>
										
										

									</div>
									<div style="display:none;" class="form-group col-md-4">
										<label for="Device-barcode">Weight </label>
										<input disabled type="text" class="form-control" placeholder="" value="3.4"  name="device_numeric_weight" id="device_numeric_weight" >
									</div>
									
									<div style="display:none;" class="form-group col-md-4">
										<label for="Device-barcode">Lenght (in)</label>
										<input disabled type="text" class="form-control" placeholder="" value="5"  name="device_length" id="device_length" >
									</div>
									
									<div style="display:none;" class="form-group col-md-4">
										<label for="Device-barcode">Width (in)</label>
										<input disabled type="text" class="form-control" placeholder="" value="6"  name="device_width" id="device_width" >
									</div>
									
									<div style="display:none;" class="form-group col-md-4">
										<label for="Device-barcode">Height (in)</label>
										<input disabled type="text" class="form-control" placeholder="" value="2"  name="device_height" id="device_height" >
									</div>
									
								</div>
								<div id="device_detail_others" style="display:none;" class="form-row">
																
								</div>
								
								
								
								
								
								
								<div class="form-row">
								
									<div class="form-group col-md-4">
										<label for="problem">Order Date</label>
										<input type="date" placeholder="" class="form-control" value="<?php echo isset($orders->order_date)?$orders->order_date:''; ?>" id="order_date">
									</div>
									<div class="form-group col-md-3">
										<label for="problem">Days Prescribed</label>
										<input type="text" placeholder="" value="<?php echo isset($orders->days_prescribed)?$orders->days_prescribed:''; ?>" class="form-control" id="days_prescribed">
									</div>
									<!--<div class="form-group col-md-4">
										<label for="problem">List of Devices prescribed</label>
										<input type="text" placeholder="List of Devices prescribed" value="<?php echo isset($orders->devices_prescribed)?$orders->devices_prescribed:''; ?>" class="form-control" id="devices_prescribed">
									</div>-->
									
									<div class="form-group col-md-8">
										<label for="problem">Shipping Address</label>
										<textarea placeholder="" disabled class="form-control" id="address" rows="6"><?php echo isset($orders->address)?$orders->address:''; ?></textarea>
									</div>
									<div class="form-group col-md-3">
										<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox"  id="update_address"><label class="custom-control-label" for="update_address">Update Address</label></div></div>
									</div>
									<div class="form-group col-md-6">
										<label for="problem">Shipping Instructions</label>
										<textarea placeholder="" class="form-control" id="instructions" rows="3"><?php echo isset($orders->instructions)?$orders->instructions:''; ?></textarea>
									</div>
									
									
									
									<?php /*?><div class="form-group col-md-6">
										<label for="order_status">Carriers</label>
										<select  name="carriers" class="form-control" id="carriers" >
											<?php if(isset($carriers) && !empty($carriers)){
												foreach($carriers as $key=>$val)
												{ ?>
													<option  value="<?php echo $val?>" ><?php echo $val?></option>

											<?php	}
											}?>order_status=="Delieverd")?"selected":""; ?> value="Delieverd" >Delieverd</option>
											
											
										</select>
										
										

									</div><?php */?>
									<?php if(isset($orders->id) && $orders->id>0 ){?>
										<div class="form-group col-md-4">
										<label for="device_shape">Carriers</label>
										<select  name="carriers_id" class="form-control" id="carriers_id" >
											<?php if(isset($carriers) && !empty($carriers)){
												foreach($carriers as $key=>$val)
												{ ?>
											<option value="<?php echo isset($val->carrier_id)?$val->carrier_id:""; ?>" ><?php echo isset($val->friendly_name)?$val->friendly_name:""; ?></option>		
												<?php }
											}?>
											
											
										</select>
										
										</div>
										
										<div id="carriers_services_div" class="form-group col-md-6">
											<label for="order_status">Carriers Services</label>
											<select  name="carriers_services" class="form-control" id="carriers_services" >
												
												
											</select>
											
											

										</div>
										
										<div class="col-sm-4 ml-auto">
											<table class="table table-bordered table-striped">
												<tbody>
													<tr>
														<td>Total Weight</td>
														<td id="total_weight" >N/A</td>
													</tr>
													<tr>
														<td>Shipping Amount</td>
														<td id="shipping_amount" >N/A</td>
													</tr>
			
													<tr>
														<td>Estimated Delivery Date</td>
														<td id="estimated_delivery_date" >N/A</td>
													</tr>
													<tr>
														<td>Service Type</td>
														<td id="service_type" >N/A</td>
													</tr>
													<tr>
														<td>Trackable</td>
														<td id="trackable" >N/A</td>
													</tr>
													<tr id="warning_messages_tr">
														<td>Warning Messages</td>
														<td id="warning_messages" >N/A</td>
													</tr>
													<tr id="is_available_tr">
														<td>Default Rate</td>
														<td id="is_available" >N/A</td>
													</tr>
													<tr style="display:none;" id="error_message_tr">
														<td>Error message</td>
														<td id="error_message" >N/A</td>
													</tr>
													
												</tbody>
											</table>
										</div>
									<?php } ?>
									
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
									
									
									
									
								<div class="form-row">
								<div class="form-group col-md-6" style="text-align: right !important;">
										
										<button type="button" onclick="window.location.href='<?php echo base_url('manage-orders');?>'" class="btn-lg btn-danger ">Cancel</button>
									</div>
									<div class="form-group col-md-6" style="text-align: right !important;">
										<?php if(isset($user_type) && $user_type==2 && isset($order_id) && $order_id>0) { ?>
										<button id="submit_btn" type="button" class="btn-primary  btn-lg "><?php echo (isset($order_id) && $order_id>0)?"  Update  ":"  Create  ";?></button>
										<?php }elseif(isset($user_type) && $user_type==1 && !isset($order_id)){ ?>
												<button id="submit_btn" type="button" class="btn-primary  btn-lg "><?php echo (isset($order_id) && $order_id>0)?"  Update  ":"  Create  ";?></button>
										<?php } ?>
									</div>
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
					var patient_id_url = '<?php echo isset($patient_id)?$patient_id:0?>';

			
			
			 $("#update_address").on('change',function()
			 {
			   if(!$(this).is(':checked'))
			   {      

				  $("#address").attr("disabled","disabled"); 
			   }
			   else
			   {
				   $("#address").removeAttr("disabled",false);
			   }
				  
			 }); 
			$(document).ready(function() {
				$('#existing_patients').select2();
				$('#existing_devices').select2();
				var attachmentValue = $('#existing_devices').val();
				loadDevice(attachmentValue);
				
				var existing_patientsValue = $('#existing_patients').val();
				loadPatient(existing_patientsValue);
				
				var existing_carriers_idValue = $('#carriers_id').val();
				loadCarriersServices(existing_carriers_idValue);
				
				loadCarriersServicesCost();
				
				$('#carriers_id').on('change', function() {
				  	loadCarriersServices(this.value);

				});
				
				$('#carriers_id').on('change', function() {
				  	loadCarriersServicesCost();

				});
				$('#carriers_services').on('change', function() {
				  	loadCarriersServicesCost();

				});
				
				$('#existing_devices').on('change', function() {
				  loadDevice(this.value);
				  
				  $('#device_detail_title').show();
				  $('#device_detail').show();
				});


				$('#existing_patients').on('select2:select', function (e) {
					
					loadPatient(this.value);
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
				if(order_status==0)
				{
					order_status="New";
				}
				else if(order_status==1)
				{
					order_status="Review";
				}
				else if(order_status==1)
				{
					order_status="Submitted";
				}
				var address = $("#address").val();
				var order_date = $("#order_date").val();
				var days_prescribed = $("#days_prescribed").val();
				var devices_prescribed = "";
				var instructions = $("#instructions").val();
				var order_detail = $("#order_detail").val();
				var carriers_id = $("#carriers_id").val();
				var carriers_services = $("#carriers_services").val();
				var rush_indicator = 0;
				if($("#rush_indicator").is(":checked")){
					rush_indicator=1;
				}
				var directions = $("#directions").val();
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
								$('#submit_btn').prop('disabled', true);

				$.post( "<?php echo base_url('order-submit');?>", { 
				existing_patients: existing_patients,
				existing_devices: existing_devices,
				order_date: order_date,
				days_prescribed: days_prescribed,
				devices_prescribed: devices_prescribed,
				rush_indicator: rush_indicator,
				instructions: instructions,
				directions: directions,
				carriers_id: carriers_id,
				carriers_services: carriers_services,
				order_detail: order_detail,
				order_status: order_status,
				address: address,
				order_id: order_id })
				  .done(function( data ) {
									$('#submit_btn').prop('disabled', false);

						var obj = jQuery.parseJSON(data);
						if(!obj.status && obj.message)
						{
							$('#error_div').css('display','block');
							$('#error_div').html('<strong>'+obj.message+'!</strong> Server side validations.<button type="button" class="close" onclick="$(\'#error_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
					
						}
						else if(obj.responseShipment)
						{
							var responseShipment = obj.responseShipment;
							if(responseShipment.status && responseShipment.status=="success")
							{
								$('#success_div').css('display','block');
								$('#success_div').html('<strong>Successfully Shipping is created!</strong> Please wait you will be redirect to summary <button type="button" class="close" onclick="$(\'#success_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
								setTimeout(function() { $("#success_div").hide(); }, 5000);
								
								window.location.replace("<?php echo base_url('order-summary')?>/"+obj.order_id);
							}
							else
							{
								$('#error_div').css('display','block');
								$('#error_div').html('<strong>'+responseShipment.message+'!</strong> Shippengine side validations.<button type="button" class="close" onclick="$(\'#error_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
					
							}
						}
						else if(obj.status && obj.order_id)
						{
							$('#success_div').css('display','block');
							$('#success_div').html('<strong>Successfully Done!</strong> Please wait you will be redirect to dashboard <button type="button" class="close" onclick="$(\'#success_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
							setTimeout(function() { $("#success_div").hide(); }, 5000);
							
							window.location.replace("<?php echo base_url('order-summary')?>/"+obj.order_id);
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
															'<label class="custom-control-label" for="ex-check-'+value.id+'">Scale meter </label>'+
														'</div>'+
													'</div>';
							});
							$("#attachmentsDiv").html(attachmentDivHtml);
						}
				  });
   }
   function loadPatient(patient_id_url)
   {
	
	if(patient_id_url>0)
	   {
		   $.post( "<?php echo base_url('get-order-patient');?>", { 
				patient_id: patient_id_url })
				  .done(function( data ) {
					
						var obj = jQuery.parseJSON(data);
						$("#patient_info_div").html("");
						var patint_info_div_html="";
						
						$("#patient_address_div").html("");
						var patient_address_div_html="";
						
						$("#patient_contact_div").html("");
						var patient_contact_div_html="";
						
						
						$("#guardian_info_div").html("");
						var guardian_info_div_html="";
						
						$("#guardian_address_div").html("");
						var guardian_address_div_html="";
						
						$("#guardian_contact_div").html("");
						var gaurdian_contact_div_html="";
						
						if(!obj.status && obj.message)
						{
							
							console.log(obj);
						}
						else if(obj.status && obj.patient_data)
						{
							var patient_data = obj.patient_data
							if(patient_data.first_name && patient_data.first_name!="")
							{
								patint_info_div_html+='<div class="form-group col-md-3">'+
										'<label for="Doctor-name">First Name</label>'+
										'<input disabled type="text" class="form-control" value="'+patient_data.first_name+'"   id="first_name">'+
									'</div>';
							}
							if(patient_data.middle_name && patient_data.middle_name!="")
							{
								patint_info_div_html+='<div class="form-group col-md-3">'+
										'<label for="Doctor-name">Middle Name</label>'+
										'<input disabled type="text" class="form-control" value="'+patient_data.middle_name+'"   id="middle_name">'+
									'</div>';
							}
							if(patient_data.last_name && patient_data.last_name!="")
							{
								patint_info_div_html+='<div class="form-group col-md-3">'+
										'<label for="Doctor-name">Last Name</label>'+
										'<input disabled type="text" class="form-control" value="'+patient_data.last_name+'"   id="last_name">'+
									'</div>';
							}
							$("#patient_info_div").html(patint_info_div_html);
							$("#patient_info_div").css("display","flex");
							$("#patient_info_div_title").css("display","block");
							if(patient_data.pcheck && patient_data.pcheck==1)
							{
								if(patient_data.gfirst_name && patient_data.gfirst_name!="")
								{
									guardian_info_div_html+='<div class="form-group col-md-3">'+
											'<label for="Doctor-name">First Name</label>'+
											'<input disabled type="text" class="form-control" value="'+patient_data.gfirst_name+'"   id="gfirst_name">'+
										'</div>';
								}
								if(patient_data.gmiddle_name && patient_data.gmiddle_name!="")
								{
									guardian_info_div_html+='<div class="form-group col-md-3">'+
											'<label for="Doctor-name">Middle Name</label>'+
											'<input disabled type="text" class="form-control" value="'+patient_data.gmiddle_name+'"   id="gmiddle_name">'+
										'</div>';
								}
								if(patient_data.glast_name && patient_data.glast_name!="")
								{
									guardian_info_div_html+='<div class="form-group col-md-3">'+
											'<label for="Doctor-name">Last Name</label>'+
											'<input disabled type="text" class="form-control" value="'+patient_data.glast_name+'"   id="glast_name">'+
										'</div>';
								}
								$("#guardian_info_div").html(guardian_info_div_html);
								$("#guardian_info_div").css("display","flex");
								$("#guardian_info_div_title").css("display","block");
								
							}
							else
							{
								$("#guardian_info_div").css("display","none");
								$("#guardian_info_div_title").css("display","none");
								
								$("#guardian_address_div").css("display","none");
								$("#guardian_address_div_title").css("display","none");
								
								$("#guardian_contact_div").css("display","none");
								$("#guardian_contact_div_title").css("display","none");
								
								
							}
							
							
							if(obj.patient_detail_data)
							{
								var patient_detail_data =obj.patient_detail_data;
								$.each(patient_detail_data, function( index, value ) {
									console.log(value);
									if(value.active_shipping_address!=0)
									{
										
										if($("#address").val()=="" || $("#address").val().length==0)
										{
											address_text="";
											
											if(patient_data.pcheck==0)
											{
												if(value.address_linea!="")
												{
													address_text="Address Line 1 :"+value.address_linea;
												}
												if(value.address_lineb!="")
												{
													address_text+="\n"+"Address Line 2 :"+value.address_lineb;
												}
												if(value.zip_code!="")
												{
													address_text+="\n"+"Zipcode :"+value.zip_code;
												}
												if(value.city!="")
												{
													address_text+="\n"+"city :"+value.city;
												}
												if(value.state!="")
												{
													address_text+="\n"+"state :"+value.state;
												}
												
																					
											}
											else
											{
												if(value.gaddress_linea!="")
												{
													address_text="Address Line 1 :"+value.gaddress_linea;
												}
												if(value.gaddress_lineb!="")
												{
													address_text+="\n"+"Address Line 2 :"+value.gaddress_lineb;
												}
												if(value.gzip_code!="")
												{
													address_text+="\n"+"Zipcode :"+value.gzip_code;
												}
												if(value.gcity!="")
												{
													address_text+="\n"+"city :"+value.gcity;
												}
												if(value.gstate!="")
												{
													address_text+="\n"+"state :"+value.gstate;
												}
												
											}
											$("#address").val(address_text);
											$("#address").attr("disabled","disabled");
											
										}
										
										var HomeSelected="";
										if(value.patient_address_type=="Home")
										{
											HomeSelected="selected";
										}
										var OfficeSelected="";
										if(value.patient_address_type=="Office")
										{
											OfficeSelected="selected";
										}
										var MailingSelected="";
										if(value.patient_address_type=="Mailing")
										{
											MailingSelected="selected";
										}
										var OthersSelected="";
										if(value.patient_address_type=="Others")
										{
											OthersSelected="selected";
										}
										patient_address_div_html+='<div style="display:none;" class="form-group col-md-2">'+
										'<label for="patient_address_type">Address Type</label>'+
										'<select  disabled name="patient_address_type" class="form-control" id="patient_address_type" >'+
											'<option '+HomeSelected+' value="Home" >Home</option>'+
											'<option '+OfficeSelected+' value="Office" >Office</option>'+
											'<option '+MailingSelected+' value="Mailing" >Mailing</option>'+
											'<option '+OthersSelected+' value="Others" >Others</option>'+
											
										'</select>'+
										
										'</div>'+
										'<div class="form-group col-md-5">'+
											'<label for="Doctor-name">Address Line 1</label>'+
											'<input disabled type="text" class="form-control"  value="'+value.address_linea+'" placeholder="Address Line 1" id="address_linea" name="address_linea">'+
										'</div>	'+
										'<div class="form-group col-md-5">'+
											'<label for="Doctor-name">Address Line 2</label>'+
											'<input disabled type="text" class="form-control" value="'+value.address_lineb+'" placeholder="Address Line 2" id="address_lineb"  name="address_lineb">'+
										'</div>'+
										
										
										'<div class="form-group col-md-2">'+
											'<label for="Doctor-name">Zipcode</label>'+
											'<input disabled type="text" class="form-control"   value="'+value.zip_code+'" placeholder="Zipcode" id="zip_code" name="zip_code">'+
										'</div>'+
										'<div class="form-group col-md-3">'+
											'<label for="Doctor-name">City</label>'+
											'<input disabled type="text" class="form-control" value="'+value.city+'" placeholder="City" id="city" name="city">'+
										'</div>'+
										'<div class="form-group col-md-2">'+
											'<label for="Doctor-name">State</label>'+
											'<input disabled type="text" class="form-control" value="'+value.state+'" placeholder="State" id="state" name="state">'+
										'</div>';
									}
									
									if(value.active_shipping_contact!=0)
									{
										var PhoneSelected="";
										var EmailSelected="";
										if(patient_data.phone_type_preferred=="Phone")
										{
											PhoneSelected="selected";
										}
										if(patient_data.phone_type_preferred=="Email")
										{
											EmailSelected="selected";
										}
										patient_contact_div_html+='<div style="display:none;" class="form-group col-md-2">'+
											'<label for="phone_type_preferred">Preferred Contact Type</label>'+
											'<select disabled name="phone_type_preferred" class="form-control" id="phone_type_preferred" >'+
												'<option '+PhoneSelected+' value="Phone" >Phone</option>'+
												'<option '+EmailSelected+' value="Email" >Email</option>'+
												
											'</select>'+
											
										'</div>'+
										'<div class="form-group col-md-3">'+
											'<label for="specialization">Email Address</label>'+
											'<input disabled type="email" placeholder="Email Address" value="'+patient_data.email+'" class="form-control" id="email" id="email">'+
										'</div>';
										
										var HomeSelected="";
										var OfficeSelected="";
										var MailingSelected="";
										var OthersSelected="";
										if(value.phone_type_contact=="Home")
										{
											HomeSelected="selected";
										}
										if(value.phone_type_contact=="Office")
										{
											OfficeSelected="selected";
										}
										if(value.phone_type_contact=="Mailing")
										{
											MailingSelected="selected";
										}
										if(value.phone_type_contact=="Others")
										{
											OthersSelected="selected";
										}
										
										patient_contact_div_html+='<div style="display:none;" class="form-group col-md-3">'+
										'<label for="phone_type_contact">Phone Type</label>'+
										'<select  disabled name="phone_type_contact" class="form-control" id="phone_type_contact" >'+
											'<option '+HomeSelected+' value="Home" >Home</option>'+
											'<option '+OfficeSelected+' value="Office" >Office</option>'+
											'<option '+MailingSelected+' value="Mailing" >Mailing</option>'+
											'<option '+OthersSelected+' value="Others" >Others</option>'+
											
										'</select>'+
										
										'</div>'+
										'<div class="form-group col-md-4">'+
											'<label for="Doctor-name">Phone Number</label>'+
											'<input disabled type="text" class="form-control" value="'+value.patinet_contact_phone+'" placeholder="Phone Number (XXX) XXX-XXXX"  id="patinet_contact_phone" name="patinet_contact_phone">'+
										'</div>';
									}
									
									
									console.log(value.gactive_shipping_address);
									if(value.gactive_shipping_address!=0)
									{
										var HomeSelected="";
										if(value.g_address_type=="Home")
										{
											HomeSelected="selected";
										}
										var OfficeSelected="";
										if(value.g_address_type=="Office")
										{
											OfficeSelected="selected";
										}
										var MailingSelected="";
										if(value.g_address_type=="Mailing")
										{
											MailingSelected="selected";
										}
										var OthersSelected="";
										if(value.g_address_type=="Others")
										{
											OthersSelected="selected";
										}
										guardian_address_div_html+='<div style="display:none;" class="form-group col-md-2">'+
										'<label for="g_address_type">Address Type</label>'+
										'<select  disabled name="g_address_type" class="form-control" id="g_address_type" >'+
											'<option '+HomeSelected+' value="Home" >Home</option>'+
											'<option '+OfficeSelected+' value="Office" >Office</option>'+
											'<option '+MailingSelected+' value="Mailing" >Mailing</option>'+
											'<option '+OthersSelected+' value="Others" >Others</option>'+
											
										'</select>'+
										
										'</div>'+
										'<div class="form-group col-md-5">'+
											'<label for="Doctor-name">Address Line 1</label>'+
											'<input disabled type="text" class="form-control"  value="'+value.gaddress_linea+'" placeholder="Address Line 1" id="gaddress_linea" name="gaddress_linea">'+
										'</div>	'+
										'<div class="form-group col-md-5">'+
											'<label for="Doctor-name">Address Line 2</label>'+
											'<input disabled type="text" class="form-control" value="'+value.gaddress_lineb+'" placeholder="Address Line 2" id="gaddress_lineb"  name="gaddress_lineb">'+
										'</div>'+
										
										
										'<div class="form-group col-md-2">'+
											'<label for="Doctor-name">Zipcode</label>'+
											'<input disabled type="text" class="form-control"   value="'+value.gzip_code+'" placeholder="Zipcode" id="gzip_code" name="gzip_code">'+
										'</div>'+
										'<div class="form-group col-md-3">'+
											'<label for="Doctor-name">City</label>'+
											'<input disabled type="text" class="form-control" value="'+value.gcity+'" placeholder="City" id="gcity" name="gcity">'+
										'</div>'+
										'<div class="form-group col-md-2">'+
											'<label for="Doctor-name">State</label>'+
											'<input disabled type="text" class="form-control" value="'+value.gstate+'" placeholder="State" id="gstate" name="gstate">'+
										'</div>';
									}
									
									if(value.gactive_shipping_contact!=0)
									{
										var PhoneSelected="";
										var EmailSelected="";
										if(patient_data.gphone_type_preferred=="Phone")
										{
											PhoneSelected="selected";
										}
										if(patient_data.gphone_type_preferred=="Email")
										{
											EmailSelected="selected";
										}
										gaurdian_contact_div_html+='<div style="display:none;" class="form-group col-md-2">'+
											'<label for="gphone_type_preferred">Preferred Contact Type</label>'+
											'<select disabled name="gphone_type_preferred" class="form-control" id="gphone_type_preferred" >'+
												'<option '+PhoneSelected+' value="Phone" >Phone</option>'+
												'<option '+EmailSelected+' value="Email" >Email</option>'+
												
											'</select>'+
											
										'</div>'+
										'<div class="form-group col-md-3">'+
											'<label for="specialization">Email Address</label>'+
											'<input disabled type="email" placeholder="Email Address" value="'+patient_data.gemail+'" class="form-control" id="gemail" id="gemail">'+
										'</div>';
										
										var HomeSelected="";
										var OfficeSelected="";
										var MailingSelected="";
										var OthersSelected="";
										if(value.gphone_type_contact=="Home")
										{
											HomeSelected="selected";
										}
										if(value.gphone_type_contact=="Office")
										{
											OfficeSelected="selected";
										}
										if(value.gphone_type_contact=="Mailing")
										{
											MailingSelected="selected";
										}
										if(value.gphone_type_contact=="Others")
										{
											OthersSelected="selected";
										}
										
										gaurdian_contact_div_html+='<div style="display:none;" class="form-group col-md-3">'+
										'<label for="gphone_type_contact">Phone Type</label>'+
										'<select  disabled name="gphone_type_contact" class="form-control" id="gphone_type_contact" >'+
											'<option '+HomeSelected+' value="Home" >Home</option>'+
											'<option '+OfficeSelected+' value="Office" >Office</option>'+
											'<option '+MailingSelected+' value="Mailing" >Mailing</option>'+
											'<option '+OthersSelected+' value="Others" >Others</option>'+
											
										'</select>'+
										
										'</div>'+
										'<div class="form-group col-md-4">'+
											'<label for="Doctor-name">Phone Number</label>'+
											'<input disabled type="text" class="form-control" value="'+value.gcontact_phone+'" placeholder="Phone Number (XXX) XXX-XXXX"  id="gcontact_phone" name="gcontact_phone">'+
										'</div>';
									}
									
									
								});
								$("#patient_address_div").html(patient_address_div_html);
								$("#patient_address_div").css("display","flex");
								$("#patient_address_div_title").css("display","block");
								
								$("#patient_contact_div").html(patient_contact_div_html);
								$("#patient_contact_div").css("display","flex");
								$("#patient_contact_div_title").css("display","block");
								
								
								if(patient_data.pcheck && patient_data.pcheck==1)
								{
									$("#patient_address_div").css("display","none");
									$("#patient_address_div_title").css("display","none");
									
									$("#patient_contact_div").css("display","none");
									$("#patient_contact_div_title").css("display","none");
								
									$("#guardian_address_div").html(guardian_address_div_html);
									$("#guardian_address_div").css("display","flex");
									$("#guardian_address_div_title").css("display","block");
									
									$("#guardian_contact_div").html(gaurdian_contact_div_html);
									$("#guardian_contact_div").css("display","flex");
									$("#guardian_contact_div_title").css("display","block");
									
								}
							}
							 
							var attachmentDivHtml="";
							
							//$("#attachmentsDiv").html(attachmentDivHtml);
						}
						else
						{
							$("#patient_info_div").css("display","none");
							$("#patient_info_div_title").css("display","none");
						}
				  });
	   }
	   
   }
	
	
	 function loadDevice(device_id)
   {
	   
	   if(device_id>0)
	   {
		   
		   $.post( "<?php echo base_url('get-order-device');?>", { 
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
						else if(obj.status && obj.device_data)
						{
							$("#device_detail_title").css('display','block');
							
							$("#device_detail").css('display','flex');
							var device_data = obj.device_data
							var device_attachments = obj.device_attachments_data
							$("#device_detail_others").html("");

							var device_detail_others = "";
							if(device_data)
							{
								device_detail_others = '<div class="form-group col-md-2">'+
										'<label for="Device-name">Device Name</label>'+
										'<input disabled type="text" class="form-control" placeholder="Device name" value="'+device_data.device_name+'" id="device_name" name="device_name">'+
									'</div>'+
									'<div class="form-group col-md-5">'+
										'<label for="device_count">Device Description</label>'+
										'<textarea disabled placeholder="Device Description" class="form-control" id="device_description" rows="3">'+device_data.device_description+'</textarea>'+
									'</div>'+
									
									'<div class="form-group col-md-5">'+
										'<label for="device_count">Special Instructions</label>'+
										'<textarea disabled placeholder="Notes/Comments" class="form-control" id="device_comments" rows="3">'+device_data.device_comments+'</textarea>'+
									'</div>';
									$("#device_detail_others").html(device_detail_others);
									$("#device_detail_others").css('display','flex');
							}
							if(device_attachments)
							{
								var device_attachments = device_attachments
								var attachmentDivHtml="";
								$.each(device_attachments, function( index, value ) {
								  attachmentDivHtml+='<br>'+
														'<div class="text-left">'+
															'<div class="custom-control custom-checkbox">'+
																'<input class="custom-control-input" type="checkbox" checked id="ex-check-'+value.id+'">'+
																'<label class="custom-control-label" for="ex-check-'+value.id+'">Scale meter </label>'+
															'</div>'+
														'</div>';
								});
								$("#attachmentsDiv").html(attachmentDivHtml);
								$("#device_attachments").css('display','block');
							}
							
							if(device_data.device_shape)
							{
								$("#device_shape").val(device_data.device_shape);
							}
							if(device_data.device_unit)
							{
								$("#weight_unit").val(device_data.device_unit);
							}
							if(device_data.device_numeric_weight)
							{
								$("#device_numeric_weight").val(device_data.device_numeric_weight);
							}
							if(device_data.device_length)
							{
								$("#device_length").val(device_data.device_length);
							}
							if(device_data.device_width)
							{
								$("#device_width").val(device_data.device_width);
							}
							if(device_data.device_height)
							{
								$("#device_height").val(device_data.device_height);
							}
						
							
							
						}
						else
						{
							$("#device_detail").css("display","none");
							$("#device_detail_title").css("display","none");
						}
				  });
	   }
	   
   }
   
   
   function loadCarriersServices(carriers_id)
   {
	   
	   if(carriers_id!="")
	   {
		   
		   $.post( "<?php echo base_url('get-carriers-services');?>", { 
				carriers_id: carriers_id })
				  .done(function( data ) {
					
						var obj = jQuery.parseJSON(data);
						
						
						if(!obj.status)
						{
							
							console.log(obj);
						}
						else if(obj.status && obj.status=="success" && obj.data)
						{
							
							var services = obj.data;
							
							var servicesHtml="";
							$.each(services, function( index, value ) {
								console.log(value);
							  servicesHtml+='<option value="'+value.service_code+'" >'+value.name+'</option>';
												
							});
							$("#carriers_services").html(servicesHtml);
							
							loadCarriersServicesCost();
							
						}
						else
						{
							$("#carriers_services").css("display","none");
							
						}
				  });
	   }
	   
   }
   
   
   function loadCarriersServicesCost()
   {
	   var order_id = $("#order_id").val();
		var carriers_id = $("#carriers_id").val();
		var carriers_services = $("#carriers_services").val();
	   if(carriers_id!="")
	   {
		   
		   $.post( "<?php echo base_url('get-cost-estimation');?>", { 
				carriers_id: carriers_id,carriers_services: carriers_services,order_id: order_id })
				  .done(function( data ) {
					
						var obj = jQuery.parseJSON(data);
						
						$("#total_weight").html("N/A");
						$("#shipping_amount").html("N/A");
						$("#estimated_delivery_date").html("N/A");
						$("#service_type").html("N/A");
						$("#trackable").html("No");
						$("#warning_messages_tr").css("display","none");
						$("#error_message_tr").css("display","none");
						if(!obj.status)
						{
							
							console.log(obj);
						}
						else if(obj.status && obj.status=="success" && obj.data)
						{
							
							var cost = obj.data;
							if(cost.total_weight_value && cost.total_weight_value!="")
							{
								$("#total_weight").html(cost.total_weight_value+" "+cost.total_weight_unit);
							}
							
							if(cost.shipping_amount_amount && cost.shipping_amount_amount!="")
							{
								$("#shipping_amount").html(cost.shipping_amount_amount+" "+cost.shipping_amount_currency);
							}
							
							if(cost.estimated_delivery_date && cost.estimated_delivery_date!="")
							{
								$("#estimated_delivery_date").html(cost.estimated_delivery_date);
							}
							
							if(cost.service_type && cost.service_type!="")
							{
								$("#service_type").html(cost.service_type);
							}
							if(cost.trackable && cost.trackable!="")
							{
								if(cost.trackable==1)
								{
									$("#trackable").html("Yes");
								}
								else
								{
									$("#trackable").html("No");
								}
								
							}
							else
							{
								$("#trackable").html("No");
							}
							if(cost.warning_messages && cost.warning_messages!="")
							{
								$("#warning_messages_tr").css("display","");
								$("#warning_messages").html(cost.warning_messages);
								
							}
							else
							{
								$("#warning_messages_tr").css("display","none");
							}
							if(cost.is_available && cost.is_available==1)
							{
								$("#is_available_tr").css("display","none");
								
							}
							else
							{
								$("#is_available_tr").css("display","");
								$("#is_available").html("You request service rate is not available default rate is showing");
							}
							$("#error_message_tr").css("display","none");
						}
						else
						{
							$("#error_message_tr").css("display","");
							$("#error_message").html(obj.message);
							
						}
				  });
	   }
	   
   }
	

	</script>
	
	
