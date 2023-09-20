<link rel="stylesheet" href="<?php echo FRONT_PLUGINS_V2; ?>datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo FRONT_PLUGINS_V2; ?>datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo FRONT_PLUGINS_V2; ?>datatables-buttons/css/buttons.bootstrap4.min.css">
 <link rel="stylesheet" href="<?php echo FRONT_CSS_V2; ?>bootstrap-select.css" />
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-2">
            <h1 class="m-0">Order List</h1>
          </div><!-- /.col -->
          <div class="col-md-6 search-bar">
            <form class="form-inline">
            <div class="input-group input-group-sm">
                <input class="form-control" id="searchTable" type="text" placeholder="Search..">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="button">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
          </div><!-- /.col -->
		 
		  <div class="col-md-2 search-quantity">
			<select class="custom-select" name="quantity_type" id="dropdown_qty_type">
			<option value="10">Show 10</option>
			<option value="11">Show 11</option>
			<option value="12">Show 12</option>
			</select>
		  </div>
		  
		  <div class="col-md-2 order-add">
			<?php if(!isset($user_type) || $user_type!=2) { ?><button type="button" class="btn btn-primary" onclick="clearForm();" data-toggle="modal" data-target="#modal-primary">+ Add Order</button><?php } ?>
		  </div>
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
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	 
	<div class="modal fade order-detail" id="modal-shipping">
		<div class="modal-dialog">
          <div class="modal-content bg-white">
            <div class="modal-body">
				<div class="row">
			<div class="col-md-7 order-form">
				<h4 class="modal-title">Create Label</h4>
					<div class="row">
					  <form name="form">
					  <div class="tab">
							<div class="row">
							<div style="margin:0px 0px 20px 0px;" class="col-sm-10">
							<div class="form-pointed">
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
													<input  id="order_status_tmp" type="hidden" value="0" >

									<span id="statusShiper0" onclick="doActiveStatus(0);" style="cursor: pointer;" class="step <?php echo (isset($orders->order_status) && $orders->order_status==0)?"active":""; ?>">New</span>
									<span id="statusShiper1" onclick="doActiveStatus(1);" style="cursor: pointer;" class="step <?php echo (isset($orders->order_status) && $orders->order_status==1)?"active":""; ?> ">Review</span>
									<span id="statusShiper2" onclick="doActiveStatus(2);" style="cursor: pointer;" class="step <?php echo (isset($orders->order_status) && $orders->order_status==2)?"active":""; ?> ">Submitted</span>
								  </div>
								</div>
								<br>  
							<div class="col-sm-10">
								  <!-- text input -->
								  <div class="form-group">
									<label>Carriers</label>
									<select data-live-search="true" class="selectpicker" name="carriers_id" class="form-control" id="carriers_id" >
											<?php if(isset($carriers) && !empty($carriers)){
												foreach($carriers as $key=>$val)
												{ ?>
											<option value="<?php echo isset($val->carrier_id)?$val->carrier_id:""; ?>" ><?php echo isset($val->friendly_name)?$val->friendly_name:""; ?></option>		
												<?php }
											}?>
											
											
										</select>
								  </div>
							</div>
							
							<div class="" id="carrier-services">
								<div class="row">
									<div class="col-sm-12">
										<h4>Carrier Services</h4>
									</div>
									<div class="col-sm-12">
									<table id="example1" class="table table-bordered table-hover order-list">
										  <thead>
										  <tr>
											<th>Services Name</th>
											<th>Price</th>									
											<th></th>
										  </tr>
										  </thead>
											<tbody id="services_cost">
												



											</tbody>
									</table>
									</div>
								</div>
							</div>
					
							<!--<div class="col-sm-10">
								 
								  <div class="form-group">
									<label>Carriers Services</label>
									
									<select data-live-search="true" class="selectpicker" name="carriers_services" class="form-control" id="carriers_services" >
										
										
									</select>
								  </div>
							</div>-->
							</div>
							
							<div class="row">
							
							<!--<div class="col-sm-5">
								  
								  <div class="form-group">
									<label>Carriers Cost</label>
									<label id="service_cost" >N/A</label>
								  </div>
							</div>
							<div class="col-sm-5">
								  
								  <div class="form-group">
									<label>Carriers Service</label>
									<label id="service_name" >N/A</label>
								  </div>
							</div>-->
							
							<div class="col-sm-5">
								  
								  <div class="form-group">
									<label>No. of Packages</label>
									<input type="text"  class="form-control" id="no_pkg_view" placeholder="01" name="ptfr_name">
									<textarea style="display:none;" name="or_details" disabled  id="address_usertype_2" placeholder="Your details goes here Your details goes here Your details goes here"><?php echo isset($orders->order_detail)?$orders->order_detail:''; ?></textarea>

								  </div>
							</div>
							<div class="col-sm-5">
								  <!-- text input -->
								  <div class="form-group">
									<label>Content</label>
									<input type="text" class="form-control"  id="content_pkg_view"  placeholder="Medical Devices" name="dvclst_name">
								  </div>
							</div>
							</div>
						
							<div class="row">
								<div class="col-sm-10">
								  <!-- text input -->
								  <div class="form-group">
									<label>Weight(lb)</label>
									<input type="text" class="form-control"  id="weight_pkg_view" placeholder="03lb" name="dvclst_name">
								  </div>
								</div>
							</div>
						
							<div class="row">
							<div class="col-sm-3">
								  <!-- text input -->
								  <div class="form-group">
									<label>Height(in)</label>
									<input type="text" class="form-control"  id="height_pkg_view" name="ptfr_name">
								  </div>
							</div>
							
							<div class="col-sm-3">
								  <!-- text input -->
								  <div class="form-group">
									<label>Width(in)</label>
									<input type="text" class="form-control"  id="width_pkg_view" name="dvclst_name">
								  </div>
							</div>
							
							<div class="col-sm-3">
								  <!-- text input -->
								  <div class="form-group">
									<label>Length(in)</label>
									<input type="text" class="form-control"  id="length_pkg_view" name="dvclst_name">
								  </div>
							</div>
							</div>
							
							<div class="row">
							<div class="col-sm-8 form-group radio-btn">
								<label></label>
								<input class="form-check-input" type="radio" name="radio1" checked="">
								<label class="form-check-label">Return Address</label>
							 </div>
							</div>
						</div>
						
						<div class="tab">
						<div class="row">
							<div class="col-sm-10 form-group radio-btn">
								<label></label>
								<input class="form-check-input" type="radio" name="radio1" checked="checked">
								<label class="form-check-label">Return Address</label>
							 </div>
							</div>
							
							<div class="row">
							<h4 class="modal-title">Return Address</h4>
							<div class="col-sm-5">
								  <!-- text input -->
								  <div class="form-group">
									<label>First Name</label>
									<input type="text" class="form-control" name="dvclst_name">
								  </div>
							</div>
							<div class="col-sm-5">
								  <!-- text input -->
								  <div class="form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" name="dvclst_name">
								  </div>
							</div>
							</div>
						
							<div class="row">
								<div class="col-sm-10">
								  <!-- text input -->
								  <div class="form-group">
									<label>Address Line 1</label>
									<input type="text" class="form-control" name="dvclst_name">
								  </div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-10">
								  <!-- text input -->
								  <div class="form-group">
									<label>Address Line 2</label>
									<input type="text" class="form-control" name="dvclst_name">
								  </div>
								</div>
							</div>
						
						<div class="row">
							<div class="col-sm-3">
								  <!-- text input -->
								  <div class="form-group">
									<label>Zip Code</label>
									<input type="text" class="form-control" name="dvclst_name">
								  </div>
							</div>
							<div class="col-sm-3">
								  <div class="form-group">
									<label>City</label>
									<input type="text" class="form-control" name="dvclst_name">
								  </div>
							</div>
							
							<div class="col-sm-3">
								  <div class="form-group">
									<label>State</label>
									<input type="text" class="form-control" name="dvclst_name">
								  </div>
							</div>
						</div>
						</div>
						
						 <!-- Alerts-->
									<div style="display:none;" id="success_div_ship" class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Successfully Done!</strong> Please add payment now
										<button type="button" class="close" onclick="$('#success_div').css('display','none');" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									
									<div  style="display:none;" id="error_div_ship" class="alert alert-warning alert-dismissible fade show" role="alert">
										<strong>Holy guacamole!</strong> You should check in on some of those fields below.
										<button type="button" class="close" onclick="$('#error_div').css('display','none');" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<!-- /Alerts-->
					<div class="modal-footer justify">
					  <button type="button" class="btn btn-outline-light" id="cancel" data-dismiss="modal">Cancel</button>
					   <?php if(isset($user_type) && $user_type==2) { ?>
						<button id="submit_btn_ship_update" type="button" class="btn btn-block btn-primary btn-flat "> Update</button>
						<?php }elseif(isset($user_type) && $user_type==1 && !isset($order_id)){ ?>
								<button id="submit_btn_ship" type="button" class="btn btn-block btn-primary btn-flat "><?php echo (isset($order_id) && $order_id>0)?"  Update  ":"  Create  ";?></button>
						<?php } ?>
					</div>
					 </form>
				 </div>
			</div>

				 <div class="col-md-5 tracking-info">
					<div class="top-bar-company">
						<div class="company-info">
							<p>Example Corp. </br>
							   4009 Marathon Blvd </br>
							   Suite 300, Austin</br>
							   TX 78756 US</br>
							</p>
						</div>
						<div class="page-numbering">
							<span>1 Of 1 </span>
						</div>
					</div>
					
					<div class="middle-bar-company">
						<div class="company-info">
							<h3>Ship To:</h3>
							<p id="shipto_view">Joe John </br>
							   123 Main St </br>
							   Main St, Bethal</br>
							   CT 0608660</br>
							</p>
						</div>
						<div class="tracking-slip">
							<img src="<?php echo FRONT_IMG_V2; ?>shipment.jpg"/>
						</div>
					</div>
				 </div>
				 
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	<div class="modal fade order-detail" id="modal-primary">
        <div class="modal-dialog">
          <div class="modal-content bg-white">
            
            <div class="modal-body">
				<div class="col-md-6 order-form">
				<h4 class="modal-title">Add Order</h4>
					<div class="row">
					  <form name="form">
					  <div class="form-pointed">
					  									<input type="hidden" id="order_id" value="<?php echo isset($orders->id)?$orders->id:0; ?>" />
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
						                <input  id="order_status" type="hidden" value="0" >

						<span id="status0" onclick="doActiveStatus(0);" style="cursor: pointer;" class="step <?php echo (isset($orders->order_status) && $orders->order_status==0)?"active":""; ?>">New</span>
						<span id="status1" onclick="doActiveStatus(1);" style="cursor: pointer;" class="step <?php echo (isset($orders->order_status) && $orders->order_status==1)?"active":""; ?> ">Review</span>
						<span id="status2" onclick="doActiveStatus(2);" style="cursor: pointer;" class="step <?php echo (isset($orders->order_status) && $orders->order_status==2)?"active":""; ?> ">Submitted</span>
					  </div>
					  <div class="existing-patient">
						<div  class="exist">
						<label for="existing_patients">Select Existing Patient </label>
										</div>
						<div class="exist-2">OR</div>
						<div class="exist-3"><a id="patients-btn" href="<?php echo base_url('manage-patients'); ?>">Add</a></div>
					  </div>
					  
					  
					   <div class="existing-patient">
						 <div class="exist">
						<label>Patient Name</label>
										<select class="selectpicker"  data-live-search="true"  <?php echo (isset($user_type) && $user_type==2)?"disabled":""; ?> name="existing_patients" class="form-control" id="existing_patients" >
											<?php if(isset($patients) && !empty($patients)){
												foreach($patients as $key=>$val) { ?>
											<option <?php echo ((isset($orders->patient_id) && $orders->patient_id==$val->id) || isset($patient_id) && $patient_id==$val->id)?"selected":""; ?> value="<?php echo  isset($val->id)?$val->id:0; ?>" ><?php echo isset($val->first_name)?$val->first_name:"N/A"; ?></option>
											<?php }}?>
										</select>
						
					  </div>
					  <div class="exist">
					  <label>Device Name</label>
						<select data-live-search="true" class="selectpicker" <?php echo (isset($user_type) && $user_type==2)?"disabled":""; ?>  name="existing_devices"  id="existing_devices" >
										
										<?php if(isset($devices) && !empty($devices)){
											foreach($devices as $key=>$val) { ?>
										<option <?php echo (isset($orders->device_id) && $orders->device_id==$val->id)?"selected":""; ?>  value="<?php echo  isset($val->id)?$val->id:0; ?>" ><?php echo isset($val->device_name)?$val->device_name:"N/A"; ?></option>
										<?php }}?>
									</select>
						</div>
					  </div>
						<div  class="col-sm-12">
								  <!-- text input -->
								  <div class="form-group">
									<label>Details</label>
									<textarea name="order_detail" id="order_detail" placeholder="Your details goes here Your details goes here Your details goes here"><?php echo isset($orders->order_detail)?$orders->order_detail:''; ?></textarea>

								  </div>
								</div>
					  
					  <div class="col-sm-12 form-group radio-btn">
									<label></label>
									<input id="rush_indicator" class="form-check-input" <?php echo (isset($orders->rush_indicator) && $orders->rush_indicator==1)?"checked":''; ?> type="checkbox" name="radio1" >
									<label class="form-check-label">Rush Indicator</label>
								 </div>
					<div class="existing-patient">
						<div class="exist">
							<label>Patient Name</label>
							<input disabled type="text" placeholder="john" class="form-control" id="pt_name" name="pt_name">



						</div>
						
						<div class="exist">
							<label>Device Name</label>
									<input disabled type="text" placeholder="NuvaAir" class="form-control" id="dvc_name" name="dvc_name">

						</div>
					</div>
							
					 
					  <div class="tab">
							<div style="display:none;"  class="row">
							<div class="col-sm-5">
								  <!-- text input -->
								  <div class="form-group">
									<label>Patient Name</label>
									<input type="text" placeholder="john" class="form-control" name="pt_name">
								  </div>
							</div>
							<div class="col-sm-5">
								  <!-- text input -->
								  <div class="form-group">
									<label>Device Name</label>
									<input type="text" placeholder="NuvaAir" class="form-control" name="dvc_name">
								  </div>
							</div>
							
							</div>
						
							<div class="row">
							<h4 class="modal-title">Order Details</h4>
								<div class="col-sm-12">
								  <!-- text input -->
								  <div class="form-group">
									<label>Details</label>
									<textarea name="or_details" id="order_detail" placeholder="Your details goes here Your details goes here Your details goes here"><?php echo isset($orders->order_detail)?$orders->order_detail:''; ?></textarea>
								  </div>
								</div>
								<div style="display:none;" class="col-sm-12">
								  <!-- text input -->
								  <div class="form-group">
									<label>Details</label>
									<textarea name="or_details" disabled  id="address" placeholder="Your details goes here Your details goes here Your details goes here"><?php echo isset($orders->order_detail)?$orders->order_detail:''; ?></textarea>
								  </div>
								</div>
								<div class="col-sm-12 form-group radio-btn">
									<label></label>
									<input id="rush_indicator" class="form-check-input" <?php echo (isset($orders->rush_indicator) && $orders->rush_indicator==1)?"checked":''; ?> type="checkbox" name="radio1" >
									<label class="form-check-label">Rush Indicator</label>
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
						 
								 
								 
							</div>
						
							<div style="display:none;" class="row">
							
							<h3 id="patient_info_div_title" style="display:none;" class="modal-title">Patient Information</h3>
							<div id="patient_info_div" style="display:none;" >
								
								
							</div>
							
							<h6 id="patient_address_div_title" style="display:none;" >Patient Address Details</h6><br>
							
							<div id="patient_address_div" style="display:none;">
							</div>
							
							<h6 id="patient_contact_div_title" style="display:none;" >Patient Contact Details</h6><br>
							
							<div id="patient_contact_div" style="display:none;"  >
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
								
							
							</div>
						</div>
						
						<div class="tab">
							<div class="row">
							<div class="col-sm-3">
								  <!-- text input -->
								  <div class="form-group">
									<label>Patient Name</label>
									<h3>John Duo</h3>
								  </div>
							</div>
							<div class="col-sm-3">
								  <!-- text input -->
								  <div class="form-group">
									<label>Device Name</label>
									<h3>Nouva</h3>
								  </div>
							</div>
							</div>
						
							<div class="row">
							<h4 class="modal-title">Order Details</h4>
								<div class="col-sm-12">
								  <!-- text input -->
								  <div class="form-group">
									<label>Details</label>
									<p>Your details goes here Your details goes here Your details goes here Your details goes here Your details goes here Your details goes here Your details goes here Your details goes here </p>
								  </div>
								</div>
								<div class="col-sm-12 form-group radio-btn">
									<label></label>
									<input class="form-check-input" type="radio" name="radio1" checked="checked">
									<label class="form-check-label">Rush Indicator</label>
								 </div>
								 
								
						 
								 
								 
								 
								 
							</div>
						
							<div class="row">
							<h4 class="modal-title">Patient Information</h4>
							<div class="col-sm-3">
								  <!-- text input -->
								  <div class="form-group">
									<label>First Name</label>
									<h3>John Duo</h3>
								  </div>
							</div>
							<div class="col-sm-3">
								  <!-- text input -->
								  <div class="form-group">
									<label>Last Name</label>
									<h3>John Duo</h3>
								  </div>
							</div>
							</div>
						</div>
						
						<div class="tab">
							<div class="row">
								<p>Your information has been submitted</p>					
							</div>
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
									
					 
					<div class="modal-footer justify">
					  <button type="button" class="btn btn-outline-light" id="cancel" data-dismiss="modal">Cancel</button>
					  
					  <?php if(isset($user_type) && $user_type==2) { ?>
						<button id="submit_btn" type="button" class="btn btn-block btn-primary btn-flat "> Update</button>
						<?php }elseif(isset($user_type) && $user_type==1 && !isset($order_id)){ ?>
								<button id="submit_btn" type="button" class="btn btn-block btn-primary btn-flat "><?php echo (isset($order_id) && $order_id>0)?"  Update  ":"  Create  ";?></button>
						<?php } ?>
						
					  
					</div>
					 </form>
				 </div>
				</div>
			 
			 <div class="col-md-6 order-summary">
				<h4 class="modal-title">Summary</h4>
				<strong>Order Summary</strong>
				<div class="row">
					<div class="col-sm-4">
						<label>Patient Name</label>
						<p id="patient_name_view" >N/A</p>
					</div>
					<div class="col-sm-4">
						<label>Device Name</label>
						<p id="device_name_view" >N/A</p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<label>Address</label>
						<p id="address_view" >John Duo</p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-4">
						<label>Phone</label>
						<p>908 (802)-3213</p>
					</div>
					<div class="col-sm-4">
						<label>Email</label>
						<p id="email_view" >N/A</p>
					</div>
				</div>
				
				<div style="display:none;" class="row">
					<div class="col-sm-4">
						<label>ZipCode</label>
						<p>1235</p>
					</div>
					
					<div class="col-sm-4">
						<label>City</label>
						<p>Glasti</p>
					</div>
					
					<div class="col-sm-4">
						<label>State</label>
						<p>ST</p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<label>Attachment</label>
						<p id="attachmentsDiv" >N/A</p>
					</div>
				</div>
				
				<div class="row">
					<!--<div class="col-sm-6">
						<label>Shipping Address</label>
						<p>	Address Line 1<br/>
							Address Line 2<br/>
							Zipcoder: 06033</p>
					</div>-->
					<div id="order_date_view" style="display:none;"  class="col-sm-5">
						<label>Order Date</label>
						<p>Apr 10, 2021</p>
					</div>
				</div>
				
				
			 </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <!-- Main content -->
    
    <!-- /.content -->
	
	<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
		<div class="col-12">
		<div class="orders-tables">
          <div class="col-12 col-sm-12 col-md-12">
		  <!-- Alerts-->
									<div style="display:none;" id="success_div_tbl" class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Successfully Done!</strong> Please add payment now
										<button type="button" class="close" onclick="$('#success_div').css('display','none');" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									
									<div  style="display:none;" id="error_div_tbl" class="alert alert-warning alert-dismissible fade show" role="alert">
										<strong>Order !</strong> is not available.
										<button type="button" class="close" onclick="$('#error_div').css('display','none');" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<!-- /Alerts-->
			<div class="card-body">
                <table id="example2" class="table table-bordered table-hover order-list">
                  <thead>
                  <tr>
                    
					<th>Order ID</th>
					<th>Patient Name</th>
					<th>Contact</th>
					<th>Device Name</th>
					<th>Device BarCode</th>
					<th>Status</th>
					<th>Options</th>
					
                  </tr>
                  </thead>
                  <tbody id="myInput">
				  <?php if(isset($orders) && !empty($orders)) { 
										foreach($orders as $key=>$val) { ?>
                 <tr>
                    
					<td><?php echo isset($val->id)?sprintf('%07d', $val->id):"N/A";?></td>
					<td><?php echo isset($val->first_name)?$val->first_name:"N/A";?></td>
					<td><?php echo isset($val->email)?$val->email:"N/A";?></td>
					<td><?php echo isset($val->device_name)?$val->device_name:"N/A";?></td>
					<td><?php echo isset($val->device_barcode)?$val->device_barcode:"N/A";?></td>
					<td><?php 
					if(isset($val->order_status) && $val->order_status=="New")
					{
						?>
						<span class="badge badge-success">New</span>
					<?php }
					elseif(isset($val->order_status) && $val->order_status=="Pending")
					{ ?>
						<span class="badge badge-warning">Pending</span>
				<?php 	}
				elseif(isset($val->order_status) && $val->order_status=="Cancelled")
					{ ?>
						<span class="badge badge-danger">Cancelled</span>
				<?php 	}else{ ?>
					<span class="badge badge-warning"><?php echo isset($val->order_status)?$val->order_status:"N/A"?></span>
				<?php }?>
				</td>
					
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Return Request</a>
						  <?php  if(isset($user_type) && $user_type==2){ ?>
						  <a href="javascript:void(0);" onclick="loadModal(<?php echo $val->id; ?>);" class="dropdown-item">Create Shipping</a>
						  <a href="<?php echo base_url("order-summary/".$val->id)?>" class="dropdown-item">View</a>
						  <?php }else{ ?>
						  <a href="<?php echo base_url("order-summary/".$val->id)?>" class="dropdown-item">View</a>
						  <?php } ?>
						  <div class="dropdown-divider"></div>
						  <a href="<?php echo base_url("delete-order/".$val->id)?>" class="dropdown-item">TakeAction</a>
						 </div> 
					</td>
				
					
                  </tr>
				  <?php } } ?>
                  </tfoot>
				 
                </table>
              
			  
			  </div>
			</div>
		</div>
		</div>
		</div>
	</div>	
	</section>
  </div>
  <!-- /.content-wrapper -->

	
				<script>
	submitSignupForm();
	function  submitSignupForm()
	{
		 


		 
		document.addEventListener("DOMContentLoaded", function(event) {
			
			var global_patient_id = '<?php echo isset($patient_id_tmp)?$patient_id_tmp:0; ?>';
			if(global_patient_id && global_patient_id!=0)
			{
				$('#modal-primary').modal('show');
			}
			
			$('#existing_patients').selectpicker();
			$('#existing_devices').selectpicker();
			$('#carriers_id').selectpicker();
			//$('#carriers_services').selectpicker();
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
     var tableOrders =  $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    "buttons": ["copy", "csv", "excel", "print"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    // Event listener to the two range filtering inputs to redraw on input
   
	  //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said


var table = $('#example2').dataTable().api();

$('#searchTable').on('keyup change', function () {
	table.search(this.value).draw();
    
});

	$('#example2_filter').css('display','none');
	
	
	
	var currentTab = 0; // Current tab is set to be the first tab (0)
	showTab(currentTab); // Display the current tab

	

	



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
				$('#carriers_id').on('change', function() {
				  	loadCarriersServicesCost('');

				});
				
				/*$('#carriers_id').on('change', function() {
				  	loadCarriersServicesCost();

				});*/
				/*$('#carriers_services').on('change', function() {
				  	loadCarriersServicesCost();

				});*/
				
				var existing_devices_tmp = $('#existing_devices').val();
				loadDevice(existing_devices_tmp);
				
				$('#existing_devices').on('change', function() {
				  loadDevice(this.value);
				  
				  $('#device_detail_title').show();
				  $('#device_detail').show();
				});
				var existing_patients_tmp = $('#existing_patients').val();
				loadPatient(existing_patients_tmp);
				$('#existing_patients').on('change', function (e) {
					
					loadPatient(this.value);
				});

			});
			
			$("#submit_btn").click(function(){
				
				addOrder(1);
			}); 
			$("#submit_btn_ship").click(function(){
				
				addOrder(1);
			});
			$("#submit_btn_ship_update").click(function(){
				$('#submit_btn_ship_update').prop('disabled', true);
				addOrder(2);
			}); 









	});
	}
	
	
	function addOrder(user_type)
	{
		$('#success_div').css('display','none');
				$('#error_div').css('display','none');
				
				
				$("#existing_patients").css('border-color','#efefef');
				$("#existing_devices").css('border-color','#efefef');
				
				$("#address").css('border-color','#efefef');
				
				
				var existing_patients = $("#existing_patients").val();
				var existing_devices = $("#existing_devices").val();
				var order_status = $("#order_status").val();
				
				/*if(order_status==0)
				{
					order_status="New";
				}
				else if(order_status==1)
				{
					order_status="Review";
				}
				else if(order_status==2)
				{
					order_status="Submitted";
				}*/
				
				var address = $("#address").val();
				var address_usertype_2 = $("#address_usertype_2").val();
				if(user_type==2)
				{
					address = address_usertype_2;
				}
				
				var order_date = $("#order_date").val();
				var days_prescribed = $("#days_prescribed").val();
				var devices_prescribed = "";
				var instructions = $("#instructions").val();
				var order_detail = $("#order_detail").val();
				var carriers_id = $("#carriers_id").val();
				//var carriers_services = $("#carriers_services").val();
				
				var carriers_services = $("input[name='services_rates']:checked").val();
				if(typeof carriers_services === "undefined")
				{
					carriers_services = "";
				}
				

				var rush_indicator = 0;
				if($("#rush_indicator").is(":checked")){
					rush_indicator=1;
				}
				var directions = $("#directions").val();
				var order_id = $("#order_id").val();
				if(user_type!=2 && existing_patients.length == 0)
				{
					
					$("#existing_patients").css('border-color','#f5c6cb');
					$('html, body').animate({
						scrollTop: $("#existing_patients").offset().top
					}, 1000);

				}
				else if(user_type!=2 && existing_devices.length == 0)
				{
					
					$("#existing_devices").css('border-color','#f5c6cb');
					$('html, body').animate({
						scrollTop: $("#existing_devices").offset().top
					}, 1000);
				}
				else if(user_type!=2 && address.length == 0)
				{
					
					$("#address").css('border-color','#f5c6cb');
					$('html, body').animate({
						scrollTop: $("#address").offset().top
					}, 1000);
				}
				else
				{
					
								$('#submit_btn').prop('disabled', false);
								$('#submit_btn_ship_update').prop('disabled', false);

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
				user_type: user_type,
				order_id: order_id })
				  .done(function( data ) {
									$('#submit_btn').prop('disabled', false);

						var obj = jQuery.parseJSON(data);
						if(!obj.status && obj.message)
						{
							if(order_id>0)
							{
								$('#error_div_ship').css('display','block');
								$('#error_div_ship').html('<strong>'+obj.message+'!</strong> Server side validations.<button type="button" class="close" onclick="$(\'#error_div_ship\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
					
							}
							else
							{
								$('#error_div').css('display','block');
								$('#error_div').html('<strong>'+obj.message+'!</strong> Server side validations.<button type="button" class="close" onclick="$(\'#error_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
					
							}
							
						}
						else if(obj.responseShipment)
						{
							var responseShipment = obj.responseShipment;
							if(responseShipment.status && responseShipment.status=="success")
							{
								if(order_id>0)
								{
									$('#success_div_ship').css('display','block');
									$('#success_div_ship').html('<strong>Successfully Shipping is created!</strong> Please wait you will be redirect to summary <button type="button" class="close" onclick="$(\'#success_div_ship\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
									setTimeout(function() { $("#success_div").hide(); }, 5000);
									
								}
								else
								{
									$('#success_div').css('display','block');
									$('#success_div').html('<strong>Successfully Shipping is created!</strong> Please wait you will be redirect to summary <button type="button" class="close" onclick="$(\'#success_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
									setTimeout(function() { $("#success_div").hide(); }, 5000);
									
								}
								
								window.location.replace("<?php echo base_url('order-summary')?>/"+obj.order_id);
							}
							else
							{
								if(order_id>0)
								{
									$('#error_div_ship').css('display','block');
									$('#error_div_ship').html('<strong>'+responseShipment.message+'!</strong> Shippengine side validations.<button type="button" class="close" onclick="$(\'#error_div_ship\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
					
								}
								else
								{
									$('#error_div').css('display','block');
									$('#error_div').html('<strong>'+responseShipment.message+'!</strong> Shippengine side validations.<button type="button" class="close" onclick="$(\'#error_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
					
								}
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
															'<label class="custom-control-label" for="ex-check-'+value.id+'">'+value.name+' </label>'+
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
								patint_info_div_html+='<div class="form-group">'+
										'<label for="Doctor-name">First Name</label>'+
										'<input disabled type="text" class="form-control" value="'+patient_data.first_name+'"   id="first_name">'+
									'</div>';
								$('#patient_name_view').html(patient_data.first_name);
								$('#pt_name').val(patient_data.first_name);
							}
							if(patient_data.middle_name && patient_data.middle_name!="")
							{
								patint_info_div_html+='<div class="form-group">'+
										'<label for="Doctor-name">Middle Name</label>'+
										'<input disabled type="text" class="form-control" value="'+patient_data.middle_name+'"   id="middle_name">'+
									'</div>';
							}
							if(patient_data.last_name && patient_data.last_name!="")
							{
								patint_info_div_html+='<div class="form-group">'+
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
									guardian_info_div_html+='<div class="form-group">'+
											'<label for="Doctor-name">First Name</label>'+
											'<input disabled type="text" class="form-control" value="'+patient_data.gfirst_name+'"   id="gfirst_name">'+
										'</div>';
								}
								if(patient_data.gmiddle_name && patient_data.gmiddle_name!="")
								{
									guardian_info_div_html+='<div class="form-group">'+
											'<label for="Doctor-name">Middle Name</label>'+
											'<input disabled type="text" class="form-control" value="'+patient_data.gmiddle_name+'"   id="gmiddle_name">'+
										'</div>';
								}
								if(patient_data.glast_name && patient_data.glast_name!="")
								{
									guardian_info_div_html+='<div class="form-group">'+
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
									if(value.active_shipping_address!=0 && patient_data.pcheck==0)
									{ 
										if(true || $("#address").val()=="" || $("#address").val().length==0)
										{
											address_text="";
											addresslinea_html="";
											addresslineb_html="";
											zipcode_html="";
											city_html="";
											state_html="";
											
											if(patient_data.pcheck==0)
											{
												if(value.address_linea!="")
												{
													address_text="Address Line 1 :"+value.address_linea;
													addresslinea_html+='<tr>'+
													'<td>Address line 1</td>'+
													'<td>'+value.address_linea+'</td>'+
												  '</tr>';
												}
												if(value.address_lineb!="")
												{
													address_text+="\n"+"Address Line 2 :"+value.address_lineb;
													addresslineb_html+='<tr>'+
													'<td>Address line 2</td>'+
													'<td>'+value.address_lineb+'</td>'+
												  '</tr>';
												}
												if(value.zip_code!="")
												{
													address_text+="\n"+"Zipcode :"+value.zip_code;
													zipcode_html+='<tr>'+
													'<td>ZipCode</td>'+
													'<td>'+value.zip_code+'</td>'+
												  '</tr>';
												}
												if(value.city!="")
												{
													address_text+="\n"+"city :"+value.city;
													city_html+='<tr>'+
													'<td>City</td>'+
													'<td>'+value.city+'</td>'+
												  '</tr>';
												}
												if(value.state!="")
												{
													address_text+="\n"+"state :"+value.state;
													state_html+='<tr>'+
													'<td>State</td>'+
													'<td>'+value.state+'</td>'+
												  '</tr>';
												}
												
																					
											}
											else
											{
												if(value.gaddress_linea!="")
												{
													address_text+="Address Line 1 :"+value.gaddress_linea;
													addresslinea_html+='<tr>'+
													'<td>Address line 1</td>'+
													'<td>'+value.gaddress_linea+'</td>'+
												  '</tr>';
												}
												if(value.gaddress_lineb!="")
												{
													address_text+="\n"+"Address Line 2 :"+value.gaddress_lineb;
													addresslineb_html+='<tr>'+
													'<td>Address line 2</td>'+
													'<td>'+value.gaddress_lineb+'</td>'+
												  '</tr>';
												}
												if(value.gzip_code!="")
												{
													address_text+="\n"+"Zipcode :"+value.gzip_code;
													zipcode_html+='<tr>'+
													'<td>ZipCode</td>'+
													'<td>'+value.gzip_code+'</td>'+
												  '</tr>';
												}
												if(value.gcity!="")
												{
													address_text+="\n"+"city :"+value.gcity;
													city_html+='<tr>'+
													'<td>City</td>'+
													'<td>'+value.gcity+'</td>'+
												  '</tr>';
												}
												if(value.gstate!="")
												{
													address_text+="\n"+"state :"+value.gstate;
													state_html+='<tr>'+
													'<td>State</td>'+
													'<td>'+value.gstate+'</td>'+
												  '</tr>';
												}
												
											}
											
											$("#address").val(address_text);
											$("#address_usertype_2").val(address_text);
										
											$("#shipto_view").html(address_text);
											
											$("#address").attr("disabled","disabled");
											$("#address").attr("display","none");
											var display_html_address='<table id="example2" class="table table-bordered table-hover order-list"><tbody id="myInput">'+
							 
							addresslinea_html+addresslineb_html+zipcode_html+city_html+state_html+'</tbody>'+
						'</table>';
						
						$("#address_view").html(display_html_address);
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
										'<div class="form-group">'+
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
										'<div class="form-group">'+
											'<label for="specialization">Email Address</label>'+
											'<input disabled type="email" placeholder="Email Address" value="'+patient_data.email+'" class="form-control" id="email" id="email">'+
										'</div>';
										
										$('#email_view').html(patient_data.email);
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
										
										patient_contact_div_html+='<div style="display:none;" class="form-group">'+
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
									if(value.gactive_shipping_address!=0 && patient_data.pcheck==1)
									{
										
										address_text="";
											addresslinea_html="";
											addresslineb_html="";
											zipcode_html="";
											city_html="";
											state_html="";
											
										if(value.gaddress_linea!="")
												{
													address_text+="Address Line 1 :"+value.gaddress_linea;
													addresslinea_html+='<tr>'+
													'<td>Address line 1</td>'+
													'<td>'+value.gaddress_linea+'</td>'+
												  '</tr>';
												}
												if(value.gaddress_lineb!="")
												{
													address_text+="\n"+"Address Line 2 :"+value.gaddress_lineb;
													addresslineb_html+='<tr>'+
													'<td>Address line 2</td>'+
													'<td>'+value.gaddress_lineb+'</td>'+
												  '</tr>';
												}
												if(value.gzip_code!="")
												{
													address_text+="\n"+"Zipcode :"+value.gzip_code;
													zipcode_html+='<tr>'+
													'<td>ZipCode</td>'+
													'<td>'+value.gzip_code+'</td>'+
												  '</tr>';
												}
												if(value.gcity!="")
												{
													address_text+="\n"+"city :"+value.gcity;
													city_html+='<tr>'+
													'<td>City</td>'+
													'<td>'+value.gcity+'</td>'+
												  '</tr>';
												}
												if(value.gstate!="")
												{
													address_text+="\n"+"state :"+value.gstate;
													state_html+='<tr>'+
													'<td>State</td>'+
													'<td>'+value.gstate+'</td>'+
												  '</tr>';
												}
												
											$("#address").val(address_text);
											$("#address_usertype_2").val(address_text);
										
											$("#shipto_view").html(address_text);		
											
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
										'<div class="form-group">'+
											'<label for="Doctor-name">City</label>'+
											'<input disabled type="text" class="form-control" value="'+value.gcity+'" placeholder="City" id="gcity" name="gcity">'+
										'</div>'+
										'<div class="form-group col-md-2">'+
											'<label for="Doctor-name">State</label>'+
											'<input disabled type="text" class="form-control" value="'+value.gstate+'" placeholder="State" id="gstate" name="gstate">'+
										'</div>';
									}
									
									if(value.gactive_shipping_contact!=0 && patient_data.pcheck==1)
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
										'<div class="form-group">'+
											'<label for="specialization">Email Address</label>'+
											'<input disabled type="email" placeholder="Email Address" value="'+patient_data.gemail+'" class="form-control" id="gemail" id="gemail">'+
										'</div>';
										$('#email_view').html(patient_data.gemail);
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
										
										gaurdian_contact_div_html+='<div style="display:none;" class="form-group">'+
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
									
									$('#device_name_view').html(device_data.device_name);
									$('#dvc_name').val(device_data.device_name);
									$('#content_pkg_view').val(device_data.device_name);
									$('#no_pkg_view').val('01');
							}
							if(device_attachments)
							{
								var device_attachments = device_attachments
								var attachmentDivHtml="";
								var countAttachments=0;
								$.each(device_attachments, function( index, value ) {
								  attachmentDivHtml+='<br>'+
														'<div class="text-left">'+
															'<div class="custom-control custom-checkbox">'+
																'<input class="custom-control-input" type="checkbox" checked id="ex-check-'+value.id+'">'+
																'<label class="custom-control-label" for="ex-check-'+value.id+'">'+value.name+' </label>'+
															'</div>'+
														'</div>';
														countAttachments++;
								});
								$("#attachmentsDiv").html(attachmentDivHtml);
								$("#device_attachments").css('display','block');
								
								if(countAttachments>0)
								{
									$('#no_pkg_view').val('01 device with '+countAttachments+' Attachments');
								}
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
								$("#weight_pkg_view").val(device_data.device_numeric_weight+' '+device_data.device_unit);
							}
							if(device_data.device_length)
							{
								$("#device_length").val(device_data.device_length);
								$("#length_pkg_view").val(device_data.device_length);
							}
							if(device_data.device_width)
							{
								$("#device_width").val(device_data.device_width);
								$("#width_pkg_view").val(device_data.device_width);
							}
							if(device_data.device_height)
							{
								$("#device_height").val(device_data.device_height);
								$("#height_pkg_view").val(device_data.device_height);
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
   
   
   /*function loadCarriersServices(carriers_id)
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
							  //servicesHtml+='<option value="'+value.service_code+'" >'+value.name+'</option>';
							  servicesHtml+='<tr>'+
												'<td>'+value.name+'</td>'+
												'<td>20</td>'+
												'<td><input class="form-check-input" type="radio" name="radio1" checked=""></td>'+
												'</tr>';
												
							});
							$("#services_cost").html(servicesHtml);
							//$("#carriers_services").html(servicesHtml);
							//$('#carriers_services').selectpicker('refresh');
							
							loadCarriersServicesCost();
							
						}
						else
						{
							$("#carriers_services").css("display","none");
							
						}
				  });
	   }
	   
   }
   */
   
   function loadCarriersServicesCost(service_code)
   {
	   var order_id = $("#order_id").val();
	   
	   if(order_id>0)
	   {
		  var carriers_id = $("#carriers_id").val();
	   var carriers_services = $("#carriers_services").val();
		$("#services_cost").html("");
	   if( typeof carriers_id !== 'undefined' && carriers_id!="")
	   {
		   
		   $.post( "<?php echo base_url('get-cost-estimation');?>", { 
				carriers_id: carriers_id,carriers_services: carriers_services,order_id: order_id })
				  .done(function( data ) {
						if(data=="Connection Failure")
						{
							$("#example1").html("Connection Failure Rates are not available please try again later");
							return false;
						}
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
							var rates = obj.data;
							
							var servicesHtml="";
							$.each(rates, function( index, value ) {
								console.log(value);
								var checked="";
								if(value.service_code == service_code)
								{
									checked="checked";
								}
								var shipping_amount = value.shipping_amount;
								var other_amount = value.other_amount;
								var amount="N/A";
								var currency="";
								if(shipping_amount.amount)
								{
									amount = shipping_amount.amount;
									if(other_amount.amount && other_amount.amount>0)
									{
										amount = amount+other_amount.amount;
									}
									currency = shipping_amount.currency;
									amount = amount.toFixed(2);
									amount = amount+" "+currency;
								}
							  //servicesHtml+='<option value="'+value.service_code+'" >'+value.name+'</option>';
							  servicesHtml+='<tr>'+
												'<td>'+value.service_type+'</td>'+
												'<td>'+amount+'</td>'+
												'<td><input class="form-check-input" type="radio" id="services_rates'+index+'" '+checked+' name="services_rates" value="'+value.service_code+'"></td>'+
												'</tr>';
												
							});
							$("#services_cost").html(servicesHtml);
						}
						else
						{
							$("#error_message_tr").css("display","");
							$("#error_message").html(obj.message);
							
						}
				  });
	   }
	    
	   }
	   
   }
	 /*function loadCarriersServicesCost()
   {
	   var order_id = $("#order_id").val();
	   
	   if(order_id>0)
	   {
		  var carriers_id = $("#carriers_id").val();
	   var carriers_services = $("#carriers_services").val();
		
	   if( typeof carriers_id !== 'undefined' && carriers_id!="")
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
								$("#service_cost").html(cost.shipping_amount_amount+" "+cost.shipping_amount_currency);
							}
							
							if(cost.estimated_delivery_date && cost.estimated_delivery_date!="")
							{
								$("#estimated_delivery_date").html(cost.estimated_delivery_date);
							}
							
							if(cost.service_type && cost.service_type!="")
							{
								$("#service_type").html(cost.service_type);
								$("#service_name").html(cost.service_type);
								
								$('#carriers_services').val(cost.service_code);
															//$('#carriers_services').selectpicker('refresh');

								
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
	   
   }
	*/
	
	
	
	
	
	
	

function showTab(n) {
	  // This function will display the specified tab of the form...
	  var x = document.getElementsByClassName("tab");
	  x[n].style.display = "block";
	  //... and fix the Previous/Next buttons:
	  if (n == 0) {
		//document.getElementById("prevBtn").style.display = "none";
	  } else {
		//document.getElementById("prevBtn").style.display = "inline";
	  }
	  if (n == (x.length - 1)) {
		//document.getElementById("nextBtn").innerHTML = "Submit";
	  } else {
		//document.getElementById("nextBtn").innerHTML = "Add";
	  }
	  //... and run a function that will display the correct step indicator:
	  fixStepIndicator(n)
	}

	function nextPrev(n) {
	  // This function will figure out which tab to display
	  var x = document.getElementsByClassName("tab");
	  
	  // Exit the function if any field in the current tab is invalid:
	  if (n == 1 && !validateForm()) return false;
	  // Hide the current tab:
	  x[currentTab].style.display = "none";
	  // Increase or decrease the current tab by 1:
	  currentTab = currentTab + n;
	  // if you have reached the end of the form...
	  if (currentTab >= x.length) {
		// ... the form gets submitted:
		document.getElementById("regForm").submit();
		return false;
	  }
	  // Otherwise, display the correct tab:
	  showTab(currentTab);
	}

	function validateForm() {
		
	  // This function deals with validation of the form fields
	  var x, y, i, valid = true;
	  x = document.getElementsByClassName("tab");
	  y = x[currentTab].getElementsByTagName("input");
	  // A loop that checks every input field in the current tab:
	  for (i = 0; i < y.length; i++) {
		// If a field is empty...
		if (y[i].value == "") {
		  // add an "invalid" class to the field:
		  y[i].className += " invalid";
		  // and set the current valid status to false
		  valid = false;
		}
	  }
	  // If the valid status is true, mark the step as finished and valid:
	  if (valid) {
		document.getElementsByClassName("step")[currentTab].className += " finish";
	  }
	  return valid; // return the valid status
	}

function fixStepIndicator(n) {
	  // This function removes the "active" class of all steps...
	  var i, x = document.getElementsByClassName("step");
	  for (i = 0; i < x.length; i++) {
		x[i].className = x[i].className.replace(" active", "");
	  }
	  //... and adds the "active" class on the current step:
	  x[n].className += " active";
}



function loadModal(id)
{
	if(id>0)
	{
		$.post( "<?php echo base_url('get-order-detail');?>", { 
				order_id: id })
				  .done(function( data ) {
					
						var obj = jQuery.parseJSON(data);
						$('#modal-shipping').modal('show');
						
						if(!obj.status)
						{
							
							$('#error_div_tbl').css('display','block');
							$('#error_div_tbl').html('<strong>Something went wrong!</strong> Order is not available.<button type="button" class="close" onclick="$(\'#error_div_tbl\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
							setTimeout(function() { $("#error_div_tbl").hide(); }, 5000);
						}
						else if(obj.status  && obj.data)
						{
							var data = obj.data;
							var device_id = data.device_id;
							var carrier_id = data.carrier_id;
							$('#carriers_id').val(carrier_id);
							$('#carriers_id').selectpicker('refresh');
							if(device_id && device_id>0)
							{
								$('#existing_devices').val(device_id);
								$('#existing_devices').selectpicker('refresh');	
							}
							var order_id = data.id;
							var order_status_tmp = data.order_status;
							$('#order_id').val(order_id);
							$('#statusShiper2').val(order_id);
							
							loadCarriersServicesCost(data.service_code);
							var patient_id = data.patient_id;
							if(patient_id && patient_id>0)
							{
								$('#existing_patients').val(patient_id);
								$('#existing_patients').selectpicker('refresh');	
							}
							var order_status = data.order_status;
							if(order_status=='New')
							{
								doActiveStatus(0);
							}
							else if(order_status=='Review')
							{
								doActiveStatus(1);
							}
							else if(order_status=='Submitted')
							{
								doActiveStatus(2);
							}
							else
							{
								doActiveStatus(0);
							}
							var order_detail = data.order_detail;
							$('#order_detail').val(order_detail);
							var rush_indicator = data.rush_indicator
							if(rush_indicator && rush_indicator==1)
							{
								$("#rush_indicator").prop("checked", true);

							}
							else
							{
								$("#rush_indicator").prop("checked", false);
							}
							
							var attachmentValue = $('#existing_devices').val();
							loadDevice(attachmentValue);
							
							var existing_patientsValue = $('#existing_patients').val();
							loadPatient(existing_patientsValue);
							
							var existing_carriers_idValue = $('#carriers_id').val();
							//loadCarriersServices(existing_carriers_idValue);
							
							//loadCarriersServicesCost(data.service_code);
						}
						else
						{
							$('#error_div_tbl').css('display','block');
							$('#error_div_tbl').html('<strong>Something went wrong!</strong> Order is not available.<button type="button" class="close" onclick="$(\'#error_div_tbl\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
							setTimeout(function() { $("#error_div_tbl").hide(); }, 5000);
							
						}
				  });
	}
	
}

function doActiveStatus(status)
	{
		
		if(status==0)
		{
			$('#order_status').val(0);
			$('#status0').addClass('active');
			$('#status1').removeClass('active');
			$('#status2').removeClass('active');
			
			$('#statusShiper0').addClass('active');
			$('#statusShiper1').removeClass('active');
			$('#statusShiper2').removeClass('active');
		}
		else if(status==1)
		{
			$('#order_status').val(1);
			$('#status1').addClass('active');
			$('#status0').removeClass('active');
			$('#status2').removeClass('active');
			
			$('#statusShiper1').addClass('active');
			$('#statusShiper0').removeClass('active');
			$('#statusShiper2').removeClass('active');
		}
		else if(status==2)
		{
			$('#order_status').val(2);
			$('#status2').addClass('active');
			$('#status0').removeClass('active');
			$('#status1').removeClass('active');
			
			$('#statusShiper2').addClass('active');
			$('#statusShiper0').removeClass('active');
			$('#statusShiper1').removeClass('active');
		}
		
	}
	
	
	function clearForm() {
	
		
		$( "#status0" ).trigger( "click" );
	  $("#submit_btn").html('Create');
	  $("#order_detail").val('');
	  $("#pt_name").val('');
	  $("#dvc_name").val('');
	  $("#order_id").val(0);
	  $("#rush_indicator").prop("checked", false);
	  
	}
	
	</script>
	
