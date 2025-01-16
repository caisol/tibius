<link rel="stylesheet" href="<?php echo FRONT_PLUGINS_V2; ?>datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo FRONT_PLUGINS_V2; ?>datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo FRONT_PLUGINS_V2; ?>datatables-buttons/css/buttons.bootstrap4.min.css">
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-2">
            <h1 class="m-0">Recipients List</h1>
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
          </div>
		  <div class="col-md-2 search-quantity">
			<select class="custom-select" name="quantity_type" id="dropdown_qty_type">
			<option value="10">Show 10</option>
			<option value="11">Show 11</option>
			<option value="12">Show 12</option>
			</select>
		  </div>
		  
		 <div class="col-md-2 order-add">
			<button type="button" class="btn btn-primary" onclick="clearForm();"data-toggle="modal" data-target="#modal-primary">+ Add Recipient</button>
			<!--<button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo base_url("add-patient");?>'" >+ Add Patient</button>-->
		  </div>
		  <div style="display:none;" id="success_div_top" class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Successfully Done!</strong> Please add payment now
				<button type="button" class="close" onclick="$('#success_div').css('display','none');" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			
			<div  style="display:none;" id="error_div_top" class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Holy guacamole!</strong> You should check in on some of those fields below.
				<button type="button" class="close" onclick="$('#error_div').css('display','none');" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
	
	
	
	
	
	
	
	
    <!-- /.content-header -->
	<div style="overflow-y:auto" class="modal fade" id="modal-primary">
        <div class="modal-dialog">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h4 class="modal-title">Add Recipients</h4>
			  
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
								
								
								<div class="row">
								<div class="col-sm-3">
									<input type="hidden"  value="<?php echo isset($patients->id)?$patients->id:0; ?>" id="patient_id_hidden">

									  <!-- text input -->
									  <div class="form-group">
										<label for="patient_id">Recipient ID</label>
										<input style="color: white;" disabled type="text" placeholder="" value="<?php echo isset($patients->id)?sprintf('%09d', $patients->id):""; ?>" class="form-control" id="patient_id">
									  </div>
								</div>
								<div class="col-sm-3">
									  <!-- text input -->
									  <div class="form-group">
										<label for="member_id">External Member ID</label>
										<input style="color: white;" disabled type="text" placeholder="" value="<?php echo isset($patients->member_id)?$patients->member_id:""; ?>" class="form-control" id="member_id">
									  </div>
								</div>
								<div class="col-sm-3">
									  <!-- text input -->
									  <div class="form-group">
										<label for="attachments">Department</label>
										<select  name="department" id="department" >
										
													<option   >Select Department</option>
											<?php if(isset($departments) && !empty($departments)){
												foreach($departments as $key=>$val)
												{ ?>
													<option  value="<?php echo $val->id; ?>" ><?php echo $val->department_name; ?></option>
											
											<?php	}
											}?>
											
										</select>
									  </div>
								</div>
								</div>
								
								<div class="form-row">
									<div class="form-group col-md-3">
										
									</div>
									<div class="form-group col-md-3">
										
									</div>
									<div class="form-group col-md-3">
										
									</div>
									<div class="form-group col-md-3">
									</div>
									
									
								</div>
								
								<div class="col-sm-12">
									<div class="row">
									<div class="col-sm-3">
									  <!-- text input -->
									  <div class="form-group">
										<label for="Doctor-name">First Name</label>
										<input type="text" class="form-control" value="<?php echo isset($patients->first_name)?$patients->first_name:""; ?>"  placeholder="" id="first_name">
									  </div>
									</div>
									<div class="col-sm-3">
									  <!-- text input -->
									  <div class="form-group">
										<label for="Doctor-name">Middle Name</label>
										<input type="text" class="form-control" value="<?php echo isset($patients->middle_name)?$patients->middle_name:""; ?>" placeholder="" id="middle_name">
									  </div>
									</div>
									
									<div class="col-sm-3">
									  <!-- text input -->
									  <div class="form-group">
										<label for="Doctor-name">Last Name</label>
										<input type="text" class="form-control" value="<?php echo isset($patients->last_name)?$patients->last_name:""; ?>" placeholder="" id="last_name">
									  </div>
									</div>
									<div class="col-sm-3">
										<div style="margin-top: 30px !important;" class="text-left"><div class="custom-control custom-checkbox"><input <?php echo (isset($patients->pcheck) && $patients->pcheck==1)?"checked":""; ?> class="custom-control-input" type="checkbox"  id="pcheck"><label class="custom-control-label" for="pcheck">Guardian/Legal Information</label></div></div>

									</div>
									
									
								</div>
							</div>
							
							
							<div class="col-sm-12">		
							
								<div class="accordion-header" id="paddressDetailsTitle">
								
								<div class="row">
									<!--<p><a href="#" id="patientInformationTitle">Patient Information</a><i class="fas fa-angle-right right"></i></p>-->
									<p><a href="#" id="addressTitle">Recipient Address Details</a><i class="fas fa-angle-right right"></i></p>
								</div>

							</div>

							
							<div id="paddressDetails" class="collapse " aria-labelledby="paddressDetailsTitle" data-parent="#accordion">
								<div class="row">
								<h4 class="modal-title">Recipient Address Details</h4>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="patient_address_type">Address Type</label>
											<select  name="patient_address_type" class="form-control" id="patient_address_type" >
												<option value="Home" >Home</option>
												<option value="Office" >Office</option>
												<option value="Mailing" >Mailing</option>
												<option value="Others" >Others</option>
												
											</select>
											
											

										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="Doctor-name">Address Line 1</label>
											<input type="text" class="form-control" onblur="validateAddress('');" value="<?php echo isset($patients->last_name)?$patients->last_name:""; ?>" placeholder="" id="address_linea" name="address_linea">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="Doctor-name">Address Line 2</label>
											<input type="text" class="form-control"  onblur="validateAddress('');" value="<?php echo isset($patients->last_name)?$patients->last_name:""; ?>" placeholder="" id="address_lineb"  name="address_lineb">
										</div>
									</div>
										
									<div class="col-sm-3">	
										<div class="form-group">
											<label for="Doctor-name">Zipcode</label>
											<input type="text" class="form-control"  onblur="validateAddress('');" value="<?php echo isset($patients->last_name)?$patients->last_name:""; ?>" placeholder="" id="zip_code" name="zip_code">
										</div>
									</div>
									<div class="col-sm-3">	
										<div class="form-group">
											<label for="Doctor-name">City</label>
											<input type="text" class="form-control" value="<?php echo isset($patients->last_name)?$patients->last_name:""; ?>" placeholder="" id="city" name="city">
										</div>
									</div>
									<div class="col-sm-3">									
										<div class="form-group">
											<label for="Doctor-name">State</label>
											<input type="text" class="form-control" value="<?php echo isset($patients->last_name)?$patients->last_name:""; ?>" placeholder="" id="state" name="state">
										</div>	
									</div>	
									<div class="col-sm-3">
										<div class="form-group">
											<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-radio"><input class="custom-control-input" type="radio" checked name="active_shipping_address" value="1" id="active_shipping_address"><label class="custom-control-label" id="active_shipping_address_lable" for="active_shipping_address">Active/Current Shipping Address </label></div></div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
										<div style="margin-top: 30px !important;" class="form-group col-md-2">

										<button type="button" class="btn  add_patientaddress_button"><span class="fas fa-plus"></span></button>
										</div>
									
										</div>
									</div>
								</div>
							
								<div class="input_patientaddress_wrap form-row" id="more_address" >
								</div>
								

								<h4 class="modal-title">Contact Details</h4>
								
								<div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label for="phone_type_preferred">Preferred Contact Type</label>
											<select  name="phone_type_preferred" class="form-control" id="phone_type_preferred" >
												<option <?php echo (isset($patients->phone_type_preferred) && $patients->phone_type_preferred=="Email")?"selected":""; ?> value="Phone" >Phone</option>
												<option <?php echo (isset($patients->phone_type_preferred) && $patients->phone_type_preferred=="Email")?"selected":""; ?> value="Email" >Email</option>
												
											</select>
											
											

										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="specialization">Email Address</label>
											<input type="email" placeholder="" value="<?php echo isset($patients->email)?$patients->email:""; ?>" class="form-control" id="email" id="email[]">
										</div>
									</div>
								
									<div class="col-sm-2">
										<div class="form-group">
											<label for="phone_type_contact">Phone Type</label>
											<select  name="phone_type_contact" class="form-control" id="phone_type_contact" >
												<option value="Home" >Home</option>
												<option value="Office" >Office</option>
												<option value="Mailing" >Mailing</option>
												<option value="Others" >Others</option>
												
											</select>
											
											

										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="Doctor-name">Phone Number</label>
											<input type="text" class="form-control" value="" placeholder=" (XXX) XXX-XXXX" onkeyup="validatePhoneFormate('patinet_contact_phone');" id="patinet_contact_phone" name="patinet_contact_phone">
										</div>
									</div>
									<div class="col-sm-0">
										<div style="display:none;" class="form-group">
											<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-radio"><input class="custom-control-input" checked type="radio"  name="active_shipping_contact" value="1" id="active_shipping_contact"><label class="custom-control-label" id="active_shipping_contact_lable" for="active_shipping_contact">Active/Current Shipping Contact Number </label></div></div>
										</div>									
									</div>
									<div class="col-sm-1">									
										<div class="form-group">
											<div style="margin-top: 30px !important;" class="form-group col-md-2">

											<button type="button" class="btn  add_morecontact_button"><span class="fas fa-plus"></span></button>
											</div>
										</div>
									</div>

								</div>
								
								<div class="input_patientcontact_wrap form-row" id="more_contact" >
								</div>
							</div>	
								
								
								
								
								
								<h4 id="parent_title" style="display:none;" class="modal-title">Parent/Legal Guardian Information</h4>
								<div id="parent_detail" style="display:none;" class="row">

									<div class="col-sm-3">
										<div class="form-group">
											<label for="Doctor-name">First Name</label>
											<input type="text" class="form-control" value="<?php echo isset($patients->first_name)?$patients->first_name:""; ?>"  placeholder="" id="gfirst_name" name="gfirst_name">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="Doctor-name">Middle Name</label>
											<input type="text" class="form-control" value="<?php echo isset($patients->middle_name)?$patients->middle_name:""; ?>" placeholder="" id="gmiddle_name" name="gmiddle_name">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="Doctor-name">Last Name</label>
											<input type="text" class="form-control" value="<?php echo isset($patients->last_name)?$patients->last_name:""; ?>" placeholder="" id="glast_name" name="glast_name">
										</div>
									</div>
								</div>
									
									<h4 id="parent_title_address" style="display:none;" class="modal-title">Address Details</h4><br>
								
								<div id="parent_address" style="display:none;" class="row">
									
									<div class="col-sm-3">
										<div class="form-group">
											<label for="g_address_type">Address Type</label>
											<select  name="g_address_type" class="form-control" id="g_address_type" >
												<option value="Home" >Home</option>
												<option value="Office" >Office</option>
												<option value="Mailing" >Mailing</option>
												<option value="Others" >Others</option>
												
											</select>

										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="Doctor-name">Address Line 1</label>
											<input type="text" class="form-control" onblur="validateAddress('g');" value="<?php echo isset($patients->last_name)?$patients->last_name:""; ?>" placeholder="" id="gaddress_linea" name="gaddress_linea">
										</div>	
									</div>	
									<div class="col-sm-3">
										<div class="form-group">
											<label for="Doctor-name">Address Line 2</label>
											<input type="text" class="form-control" onblur="validateAddress('g');" value="<?php echo isset($patients->last_name)?$patients->last_name:""; ?>" placeholder="" id="gaddress_lineb" name="gaddress_lineb">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="Doctor-name">Zipcode</label>
											<input type="text" class="form-control" value="<?php echo isset($patients->last_name)?$patients->last_name:""; ?>" placeholder="" onblur="validateAddress('g');" id="gzip_code" name="gzip_code">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="Doctor-name">City</label>
											<input type="text" class="form-control" value="<?php echo isset($patients->last_name)?$patients->last_name:""; ?>" placeholder="" id="gcity" name="gcity">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="Doctor-name">State</label>
											<input type="text" class="form-control" value="<?php echo isset($patients->last_name)?$patients->last_name:""; ?>" placeholder="" id="gstate" name="gstate">
										</div>	
									</div>
									<div class="col-sm-3">									
										<div class="form-group">
											<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-radio"><input class="custom-control-input" checked type="radio"  name="gactive_shipping_address" value="1" id="gactive_shipping_address"><label class="custom-control-label" id="gactive_shipping_address_label" for="gactive_shipping_address">Active/Current Shipping Address </label></div></div>
										</div>
									</div>
									<div class="col-sm-1">
										<div class="form-group">
											<div style="margin-top: 30px !important;" class="form-group col-md-2">

											<button type="button" class="btn  add_moregaddress_button"><span class="fas fa-plus"></span></button>
											</div>
										</div>
									</div>
									
								</div>
								<div class="input_gaddress_wrap form-row" id="more_gaddress" >
								</div>

								<h4 id="parent_title_contact" style="display:none;" class="modal-title">Contact Details</h4><br>
								<div id="parent_contact" style="display:none;" class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label for="gphone_type_preferred">Preferred Contact Type</label>
											<select  name="gphone_type_preferred" class="form-control" id="gphone_type_preferred" >
												<option <?php echo (isset($patients->gphone_type_preferred) && $patients->gphone_type_preferred=="Phone")?"selected":""; ?> value="Phone" >Phone</option>
												<option <?php echo (isset($patients->gphone_type_preferred) && $patients->gphone_type_preferred=="Email")?"selected":""; ?> value="Email" >Email</option>
												
											</select>

										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="specialization">Email Address</label>
											<input type="email" placeholder="" value="<?php echo isset($patients->gemail)?$patients->gemail:""; ?>" class="form-control" id="gemail" id="gemail[]">
										</div>
									</div>
								
									<div class="col-sm-2">
										<div class="form-group">
											<label for="gphone_type_contact">Phone Type</label>
											<select  name="gphone_type_contact" class="form-control" id="gphone_type_contact" >
												<option value="Home" >Home</option>
												<option value="Office" >Office</option>
												<option value="Mailing" >Mailing</option>
												<option value="Others" >Others</option>
												
											</select>
											
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="Doctor-name">Phone Number</label>
											<input type="text" class="form-control" value="" placeholder="(XXX) XXX-XXXX" onkeyup="validatePhoneFormate('gcontact_phone');" id="gcontact_phone" name="gcontact_phone">
										</div>
									</div>
									<div class="col-sm-0">
										<div style="display:none;" class="form-group">
											<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-radio"><input class="custom-control-input" checked type="radio"  name="gactive_shipping_contact" value="1" id="gactive_shipping_contact"><label class="custom-control-label" id="gactive_shipping_contact_label" for="gactive_shipping_contact">Active/Current Shipping Contact Number </label></div></div>
										</div>									
									</div>
									<div class="col-sm-1">									
										<div class="form-group">
											<div style="margin-top: 30px !important;" class="form-group col-md-2">

											<button type="button" class="btn  add_gmorecontact_button"><span class="fas fa-plus"></span></button>
											</div>
										</div>
									</div>
								</div>
								
								<div class="input_gcontact_wrap form-row" id="more_gcontact" >
								</div>
							</div>	
								
								
								
								
								
						
								
								
                                    
								<div class="row">
									
									
									<!-- Alerts-->
									<div style="display:none;" id="success_div" class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Successfully Done!</strong> Please add order now
										<button type="button" class="close" onclick="$('#success_div').css('display','none');" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									
									<div  style="display:none;" id="error_div" class="alert alert-warning alert-dismissible fade show" role="alert">
										<strong>Sorry!</strong> You should check in on some of those fields below.
										<button type="button" class="close" onclick="$('#error_div').css('display','none');" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<!-- /Alerts-->
									
									
								</div>
								
							</form>
            </div>
            <div class="modal-footer justify">
              <button type="button" class="btn btn-outline-light" id="cancel" data-dismiss="modal">Cancel</button>
              <button id="submit_btn" type="button" class="btn btn-block btn-primary btn-flat"><?php echo (isset($patient_id) && $patient_id>0)?"  Update  ":"  Create  ";?></button>
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
			<div class="card-body">
                <table id="example2" class="table table-bordered table-hover order-list">
                  <thead>
                  <tr>
                    
					<th>Recipient ID</th>
					<th>Recipient's Department</th>
					<th>Recipient's Name</th>
					<th>Recipient's Name</th>
					<th>Phone Number</th>
					<th>Email Address</th>
					<th>Options</th>
					
                  </tr>
                  </thead>
                  <tbody id="myInput">
				  <?php if(isset($patients) && !empty($patients)) { 
										foreach($patients as $key=>$val) { ?>
                 <tr>
                    <td><?php echo isset($val->id)?$val->id:"N/A";?></td>
					<td><?php echo isset($val->department_name)?$val->department_name:"N/A";?></td>
					<td><?php echo isset($val->first_name)?$val->first_name." ".$val->middle_name." ".$val->last_name:"N/A";?></td>
					<td><?php echo isset($val->gfirst_name)?$val->gfirst_name." ".$val->gmiddle_name." ".$val->glast_name:"N/A";?></td>
					<td><?php echo isset($val->phone_number)?$val->phone_number:"N/A";?></td>
					<td><?php echo isset($val->email)?$val->email:"N/A";?></td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="javascript:void(0);<?php //echo base_url("edit-patient/".$val->id)?>" onclick="openEidtModal('<?php echo $val->id; ?>')" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="<?php echo base_url("delete-patient/".$val->id)?>" class="dropdown-item">Delete</a>
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
<!-- Modal Popup-->
	<div class="modal fade" id="addressPatientModal" tabindex="-1" role="dialog" aria-labelledby="addressPatientModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Address Verified</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group col-md-12 block block-link-pop block-bordered">
						<label id="pmodal_address_line1" >Address Line 1 : Address Line 1 </label>
						<br>
						<label id="pmodal_address_line2" >Address Line 1 : Address Line 1 </label>
						<br>
						<label id="pmodal_zip_code" >Address Line 1 : Address Line 1 </label>
						<br>
						<label id="pmodal_city" >Address Line 1 : Address Line 1 </label>
						<br>
						<label id="pmodal_state" >Address Line 1 : Address Line 1 </label>
						
					</div>
					<label id="modal_message" >Pick matched address or you want to go with orignal?  </label>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button onclick="populateMatchedAddress();" type="button" class="btn btn-primary">Yes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /Modal Popup-->
	
	
	<!-- Modal Popup-->
	<div class="modal fade" id="addPatientModal" tabindex="-1" role="dialog" aria-labelledby="addPatientModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Patient Add/Update Successfully</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Do you want to submit an order for the Patient?
				</div>
				<div class="modal-footer">
					<button type="button" onclick="$('#modal-primary').modal('hide');window.location.href='<?php echo base_url('manage-patients');?>'" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button onclick="addOrder();" type="button" class="btn btn-primary">Yes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /Modal Popup-->

	
				<script>
	submitSignupForm();
	function  submitSignupForm()
	{
		 
		document.addEventListener("DOMContentLoaded", function(event) {
			
			var global_patient_id = '<?php echo isset($patient_id)?$patient_id:0; ?>';
			if(global_patient_id && global_patient_id!=0)
			{
				openEidtModal(global_patient_id);
			}
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

$("#addressTitle").click(function() {
		$("#paddressDetails").toggle();
		
		});
		
		$("#patientInformationTitle").click(function() {
		$("#form2").toggle();
		});
		
// Payents datatable
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    "buttons": ["copy", "csv", "excel", "print"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');		
	
			
var table = $('#example2').dataTable().api();

$('#searchTable').on('keyup change', function () {
	table.search(this.value).draw();
    
});

	$('#example2_filter').css('display','none');
	
	});
	

	
		
		
		
			document.addEventListener("DOMContentLoaded", function(event) {



			{
				if($('#pcheck').is(':checked'))
				 {
					 $("#parent_title").show();
					 $("#parent_detail").show();
					 
					 $("#parent_title_contact").show();
					 $("#parent_contact").show();
					 
					 $("#parent_title_address").show();
					 $("#parent_address").show();
					 $("#parent_email_div").show();
					 $("#more_gaddress").show();
					 $("#more_gcontact").show();
				 }	 
				 else
				 {
					 
					 $("#parent_title").hide();
					 $("#parent_detail").hide();
					 
					  $("#parent_title_contact").hide();
					 $("#parent_contact").hide();
					 $("#parent_email_div").hide();
					 
					 $("#parent_title_address").hide();
					 $("#parent_address").hide();
					 $("#more_gaddress").hide();
					 $("#more_gcontact").hide();
				 }
			}
			
			
			multiple_patientaddress_fields();
			multiple_patientcontact_fields();
			
			multiple_gcontact_fields();
			multiple_gaddress_fields();
			
			var patint_id_tmp = '<?php echo isset($patient_id)?$patient_id:0; ?>';
			//getPatientDetail(patint_id_tmp);
	
			$("#submit_btn").click(function(){
				
				$('#success_div').css('display','none');
				$('#error_div').css('display','none');
				
				$("#first_name").css('background','#efefef');
				$("#first_name").css('border-color','#efefef');
				$("#first_name").css('color','#495057');
				$("#first_name").attr('placeholder','');
				
				/*$("#gfirst_name").css('background','#efefef');
				$("#gfirst_name").css('border-color','#efefef');
				$("#gfirst_name").css('color','#495057');
				$("#gfirst_name").attr('placeholder','');
				*/
				$("#phone_number").css('background','#efefef');
				$("#phone_number").css('border-color','#efefef');
				$("#phone_number").css('color','#495057');
				$("#phone_number").attr('placeholder','');
				
				$("#email").css('background','#efefef');
				$("#email").css('border-color','#efefef');
				$("#email").css('color','#495057');
				$("#gemail").attr('placeholder','');
				
				$("#address_linea").css('background','#efefef');
				$("#address_linea").css('border-color','#efefef');
				$("#address_linea").css('color','#495057');
				$("#address_linea").attr('placeholder','');
				
				$("#zip_code").css('background','#efefef');
				$("#zip_code").css('border-color','#efefef');
				$("#zip_code").css('color','#495057');
				$("#zip_code").attr('placeholder','');
				
				$("#patinet_contact_phone").css('background','#efefef');
				$("#patinet_contact_phone").css('border-color','#efefef');
				$("#patinet_contact_phone").css('color','#495057');
				$("#patinet_contact_phone").attr('placeholder','');
				
				
				$("#active_shipping_address_lable").css('color','#3e5569');
				$("#active_shipping_contact_lable").css('color','#3e5569');
				
				/*console.log(address_lineaTmp);
				if (address_lineaTmp.length === 0) {
					$('#error_message').html("Error");
				}*/
				

				var member_id = $("#member_id").val();
				var first_name = $("#first_name").val();
				var middle_name = $("#middle_name").val();
				var last_name = $("#last_name").val();
				var gfirst_name = $("#gfirst_name").val();
				var gmiddle_name = $("#gmiddle_name").val();
				var glast_name = $("#glast_name").val();
				var department = $("#department").val();
				
				
				
				/*var patient_address_typeTmp = new Array();

				$("input:text[name=patient_address_type]").each(function(){
					patient_address_typeTmp.push($(this).val());
				});*/
				
				var address_lineaTmp = new Array();

				$("input:text[name=address_linea]").each(function(){
					address_lineaTmp.push($(this).val());
				});
				
				
				var address_linebTmp = new Array();

				$("input:text[name=address_linea]").each(function(){
					address_linebTmp.push($(this).val());
				});
				
				var zip_codeTmp = new Array();

				$("input:text[name=zip_code]").each(function(){
					zip_codeTmp.push($(this).val());
				});
				
				var cityTmp = new Array();

				$("input:text[name=city]").each(function(){
					cityTmp.push($(this).val());
				});
				
				var stateTmp = new Array();

				$("input:text[name=state]").each(function(){
					stateTmp.push($(this).val());
				});
				
				var patient_address_typeTmp = new Array();

				$("select[name=patient_address_type]").each(function(){
					patient_address_typeTmp.push($(this).find(":selected").val());
				});
				
				var phone_type_contactTmp = new Array();

				$("select[name=phone_type_contact]").each(function(){
					phone_type_contactTmp.push($(this).find(":selected").val());
				});
				var patinet_contact_phoneTmp = new Array();

				$("input:text[name=patinet_contact_phone]").each(function(){
					patinet_contact_phoneTmp.push($(this).val());
				});
				
				
				
				{
					
					var g_address_typeTmp = new Array();

					$("select[name=g_address_type]").each(function(){
						
						g_address_typeTmp.push($(this).find(":selected").val());
					});
					
					var gaddress_lineaTmp = new Array();

					$("input:text[name=gaddress_linea]").each(function(){
						gaddress_lineaTmp.push($(this).val());
					});
					
					
					var gaddress_linebTmp = new Array();

					$("input:text[name=gaddress_lineb]").each(function(){
						gaddress_linebTmp.push($(this).val());
					});
					
					var gzip_codeTmp = new Array();

					$("input:text[name=gzip_code]").each(function(){
						gzip_codeTmp.push($(this).val());
					});
					
					var gcityTmp = new Array();

					$("input:text[name=gcity]").each(function(){
						gcityTmp.push($(this).val());
					});
					
					var gstateTmp = new Array();

					$("input:text[name=gstate]").each(function(){
						gstateTmp.push($(this).val());
					});
					
					var gphone_type_contactTmp = new Array();

					$("select[name=gphone_type_contact]").each(function(){
						gphone_type_contactTmp.push($(this).find(":selected").val());
					});
					
					
					
					var gcontact_phoneTmp = new Array();

					$("input:text[name=gcontact_phone]").each(function(){
						gcontact_phoneTmp.push($(this).val());
					});
				}
				
				
				 var active_shipping_addressTmp = $("input[name='active_shipping_address']:checked").val();
				 var active_shipping_contactTmp = $("input[name='active_shipping_contact']:checked").val();
				 
				 var gactive_shipping_addressTmp = $("input[name='gactive_shipping_address']:checked").val();
				 var gactive_shipping_contactTmp = $("input[name='gactive_shipping_contact']:checked").val();
				
				
				
				
				var phone_type_preferred = $("#phone_type_preferred").val();
				
				var email = $("#email").val();
				
				var gphone_type_preferred = $("#gphone_type_preferred").val();
				
				var gemail = $("#gemail").val();
				var pcheck = 0;
				if($("#pcheck").is(":checked"))
				{
					pcheck=1;
					$("#gfirst_name").css('background','#efefef');
					$("#gfirst_name").css('border-color','#efefef');
					$("#gfirst_name").css('color','#495057');
					$("#gfirst_name").attr('placeholder','First Name');
					
					
					$("#gcontact_phone").css('background','#efefef');
					$("#gcontact_phone").css('border-color','#efefef');
					$("#gcontact_phone").css('color','#495057');
					$("#gcontact_phone").attr('placeholder','Phone Number');
					
					$("#gemail").css('background','#efefef');
					$("#gemail").css('border-color','#efefef');
					$("#gemail").css('color','#495057');
					$("#gemail").attr('placeholder','Email');
					
					$("#gaddress_linea").css('background','#efefef');
					$("#gaddress_linea").css('border-color','#efefef');
					$("#gaddress_linea").css('color','#495057');
					$("#gaddress_linea").attr('placeholder','Address Line 1');
					
					$("#gzip_code").css('background','#efefef');
					$("#gzip_code").css('border-color','#efefef');
					$("#gzip_code").css('color','#495057');
					$("#gzip_code").attr('placeholder','Zip Code');
					
					$("#patinet_contact_phone").css('background','#efefef');
					$("#patinet_contact_phone").css('border-color','#efefef');
					$("#patinet_contact_phone").css('color','#495057');
					$("#patinet_contact_phone").attr('placeholder','');
					
					
					$("#gactive_shipping_address_label").css('color','#3e5569');
					$("#gactive_shipping_contact_label").css('color','#3e5569');
					
				
					
				}
				var member_id = $("#member_id").val();
				var patient_id = $("#patient_id").val();
				console.log(g_address_typeTmp);
				if(first_name.length == 0)
				{
					$("#first_name").css('color','#721c24');
					$("#first_name").css('background-color','#f8d7da');
					$("#first_name").css('border-color','#f5c6cb');
					$("#first_name").attr('placeholder','First Name is required');
					$('html, body').animate({
						scrollTop: $("#first_name").offset().top
					}, 1000);

				}
				else if (address_lineaTmp[0]=="" && pcheck!=1) {
					
					$("#address_linea").css('color','#721c24');
					$("#address_linea").css('background-color','#f8d7da');
					$("#address_linea").css('border-color','#f5c6cb');
					$("#address_linea").attr('placeholder','Address line 1 is required');
					$('html, body').animate({
						scrollTop: $("#address_linea").offset().top
					}, 1000);
				}
				else if (zip_codeTmp[0]==""  && pcheck!=1) {
					$("#zip_code").css('color','#721c24');
					$("#zip_code").css('background-color','#f8d7da');
					$("#zip_code").css('border-color','#f5c6cb');
					$("#zip_code").attr('placeholder','Zip Code is required');
					$('html, body').animate({
						scrollTop: $("#zip_code").offset().top
					}, 1000);
				}
				else if(!active_shipping_addressTmp && pcheck!=1){
					$("#active_shipping_address_lable").css('color','#721c24');
					$('html, body').animate({
						scrollTop: $("#active_shipping_address_lable").offset().top
					}, 1000);
				}
				else if(email.length == 0 && pcheck!=1)
				{
					
					$("#email").css('color','#721c24');
					$("#email").css('background-color','#f8d7da');
					$("#email").css('border-color','#f5c6cb');
					$("#email").attr('placeholder','Email Address is required');
					$('html, body').animate({
						scrollTop: $("#email").offset().top
					}, 1000);
				}
				else if(email.length != 0 && !isEmail(email))
				{
					$("#email").css('color','#721c24');
					$("#email").css('background-color','#f8d7da');
					$("#email").css('border-color','#f5c6cb');
					$("#email").val('');
					$("#email").attr('placeholder','Email is not valid');
					$('html, body').animate({
						scrollTop: $("#email").offset().top
					}, 1000);
				}
				else if(patinet_contact_phoneTmp[0]=="" && pcheck!=1)
				{
					$("#patinet_contact_phone").css('color','#721c24');
					$("#patinet_contact_phone").css('background-color','#f8d7da');
					$("#patinet_contact_phone").css('border-color','#f5c6cb');
					$("#patinet_contact_phone").attr('placeholder','Phone Number is required');
					$('html, body').animate({
						scrollTop: $("#patinet_contact_phone").offset().top
					}, 1000);

				}
				else if(!active_shipping_contactTmp && pcheck!=1){
					$("#active_shipping_contact_lable").css('color','#721c24');
					$('html, body').animate({
						scrollTop: $("#active_shipping_contact_lable").offset().top
					}, 1000);
				}
				else if(pcheck==1 && gfirst_name.length==0)
				{
					$("#gfirst_name").css('color','#721c24');
					$("#gfirst_name").css('background-color','#f8d7da');
					$("#gfirst_name").css('border-color','#f5c6cb');
					$("#gfirst_name").attr('placeholder','First Name is required');
					$('html, body').animate({
						scrollTop: $("#gfirst_name").offset().top
					}, 1000);

				}
				else if (pcheck==1 && gaddress_lineaTmp[0]=="") {
					
					$("#gaddress_linea").css('color','#721c24');
					$("#gaddress_linea").css('background-color','#f8d7da');
					$("#gaddress_linea").css('border-color','#f5c6cb');
					$("#gaddress_linea").attr('placeholder','Address line 1 is required');
					$('html, body').animate({
						scrollTop: $("#gaddress_linea").offset().top
					}, 1000);
				}
				else if (pcheck==1 && gzip_codeTmp[0]=="") {
					$("#gzip_code").css('color','#721c24');
					$("#gzip_code").css('background-color','#f8d7da');
					$("#gzip_code").css('border-color','#f5c6cb');
					$("#gzip_code").attr('placeholder','Zip Code is required');
					$('html, body').animate({
						scrollTop: $("#gzip_code").offset().top
					}, 1000);
				}
				else if(pcheck==1 && !gactive_shipping_addressTmp){
					$("#gactive_shipping_address_label").css('color','#721c24');
					$('html, body').animate({
						scrollTop: $("#gactive_shipping_address_label").offset().top
					}, 1000);
				}
				else if(pcheck==1 && gemail.length == 0)
				{
					
					$("#gemail").css('color','#721c24');
					$("#gemail").css('background-color','#f8d7da');
					$("#gemail").css('border-color','#f5c6cb');
					$("#gemail").attr('placeholder','Email Address is required');
					$('html, body').animate({
						scrollTop: $("#gemail").offset().top
					}, 1000);
				}
				else if(pcheck==1 && !isEmail(gemail))
				{
					$("#gemail").css('color','#721c24');
					$("#gemail").css('background-color','#f8d7da');
					$("#gemail").css('border-color','#f5c6cb');
					$("#gemail").val('');
					$("#gemail").attr('placeholder','Email is not valid');
					$('html, body').animate({
						scrollTop: $("#gemail").offset().top
					}, 1000);
				}
				else if(pcheck==1 && gcontact_phoneTmp[0]=="")
				{
					$("#gcontact_phone").css('color','#721c24');
					$("#gcontact_phone").css('background-color','#f8d7da');
					$("#gcontact_phone").css('border-color','#f5c6cb');
					$("#gcontact_phone").attr('placeholder','Phone Number is required');
					$('html, body').animate({
						scrollTop: $("#gcontact_phone").offset().top
					}, 1000);

				}
				else if(pcheck==1 && !gactive_shipping_contactTmp){
					$("#gactive_shipping_contact_label").css('color','#721c24');
					$('html, body').animate({
						scrollTop: $("#gactive_shipping_contact_label").offset().top
					}, 1000);
				}
				else
				{
				
				$.post( "<?php echo base_url('patient-submit');?>", { 
				first_name: first_name,
				department: department,
				middle_name: middle_name,
				last_name: last_name,
				gfirst_name: gfirst_name,
				gmiddle_name: gmiddle_name,
				glast_name: glast_name,
				patient_address_type: patient_address_typeTmp,
				address_linea: address_lineaTmp,
				address_lineb: address_linebTmp,
				zip_code: zip_codeTmp,
				city: cityTmp,
				state: stateTmp,
				patient_address_type: patient_address_typeTmp,
				phone_type_contact: phone_type_contactTmp,
				patinet_contact_phone: patinet_contact_phoneTmp,
				
				pcheck: pcheck,
				g_address_type: g_address_typeTmp,
				gaddress_linea: gaddress_lineaTmp,
				gaddress_lineb: gaddress_linebTmp,
				gzip_code: gzip_codeTmp,
				gcity: gcityTmp,
				gstate: gstateTmp,
				gphone_type_contact: gphone_type_contactTmp,
				gcontact_phone: gcontact_phoneTmp,
				
				
				active_shipping_address: active_shipping_addressTmp,
				active_shipping_contact: active_shipping_contactTmp,
				gactive_shipping_address: gactive_shipping_addressTmp,
				gactive_shipping_contact: gactive_shipping_contactTmp,
				
				
				phone_type_preferred: phone_type_preferred,
				email: email,
				gphone_type_preferred: gphone_type_preferred,
				gemail: gemail,
				member_id: member_id,
				patient_id: patient_id })
				  .done(function( data ) {
				
						var obj = jQuery.parseJSON(data);
						if(!obj.status && obj.message)
						{
							$('#error_div').css('display','block');
							$('#error_div').html('<strong>'+obj.message+'!</strong> Server side validations.<button type="button" class="close" onclick="$(\'#error_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
					
						}
						else if(obj.status && obj.patient_id)
						{
							orderUrl='<?php echo base_url("manage-orders")?>/'+obj.patient_id;
							$('#success_div').css('display','block');
							$('#success_div').html('<strong>Successfully Done!</strong> Please wait you will be redirect to dashboard <button type="button" class="close" onclick="$(\'#success_div\').css(\'display\',\'none\');" aria-label="Close"><span aria-hidden="true">×</span></button>');
							setTimeout(function() { $("#success_div").hide(); }, 5000);
							$("#addPatientModal").modal('show');

							//window.location.replace("<?php echo base_url('manage-patients')?>");
						}
				  });
				}
			});



			 $('#pcheck').on('change', function(e) {
				 
				 if($('#pcheck').is(':checked'))
				 {
					 $("#parent_title").show();
					 $("#parent_detail").show();
					 
					 $("#parent_title_contact").show();
					 $("#parent_contact").show();
					 
					 $("#parent_title_address").show();
					 $("#parent_address").show();
					 $("#parent_email_div").show();
					 
					  $("#more_gaddress").show();
					 $("#more_gcontact").show();
				 }	 
				 else
				 {
					 
					 $("#parent_title").hide();
					 $("#parent_detail").hide();
					 
					  $("#parent_title_contact").hide();
					 $("#parent_contact").hide();
					 $("#parent_email_div").hide();
					 
					 $("#parent_title_address").hide();
					 $("#parent_address").hide();
					 
					  $("#more_gaddress").hide();
					 $("#more_gcontact").hide();
				 }
			 });
			$("#phone_number").keydown(function(e) {
				var curchr = this.value.length;
				var curval = $(this).val();
				if (curchr == 3) {
					if( e.keyCode!=8 ){
						$(this).val("(" + curval + ")" + " ");
					}
				} else if (curchr == 9) {
					if( e.keyCode!=8 ){
						$(this).val(curval + "-");
					}
				}
				if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105) && e.keyCode !=8 ) {
					e.preventDefault();
				}
			});
			
			
					
		});
	
		
	}
	
	
	
	
	function validatePhoneFormate(id)
	{
		$("#"+id).keydown(function(e) {
				var curchr = this.value.length;
				var curval = $(this).val();
				if (curchr == 3) {
					if( e.keyCode!=8 ){
						$(this).val("(" + curval + ")" + " ");
					}
				} else if (curchr == 9) {
					if( e.keyCode!=8 ){
						$(this).val(curval + "-");
					}
				}
				if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105) && e.keyCode !=8 ) {
					e.preventDefault();
				}
			});
	}
	
			
		
			var Patient_x = 1; //initlal text box count
			function multiple_patientaddress_fields()
			{
				var max_fields      = 4; //maximum input boxes allowed
				var wrapper   		= $(".input_patientaddress_wrap"); //Fields wrapper
				var add_button      = $(".add_patientaddress_button"); //Add button ID
				
				Patient_x;
				$(add_button).click(function(e){ //on add input button click
					e.preventDefault();
					
					var first_device_shape2 = $("#patient_address_type2").val();
					var first_device_shape3 = $("#patient_address_type3").val();
					var first_device_shape4 = $("#patient_address_type4").val();
					//alert(max_fields+"--"+Patient_x);
					if(Patient_x < max_fields || first_device_shape2 == "undefined" || first_device_shape3 == "undefined" || first_device_shape4 == "undefined"){ //max input box allowed
						Patient_x++; //text box increment
						var first_device_shape = $("#patient_address_type").val();
						var xtemp = Patient_x;
						xtemp = --xtemp;
						
						var htmlTypeOptions=''; 
						if(first_device_shape=="Home" || first_device_shape2=="Home" || first_device_shape3=="Home" || first_device_shape4=="Home")
						{
							htmlTypeOptions+= '<option disabled value="Home" >Home</option>';
						}
						else
						{
							htmlTypeOptions+= '<option value="Home" >Home</option>';
						}
						if(first_device_shape=="Office"  || first_device_shape2=="Office"|| first_device_shape3=="Office"|| first_device_shape4=="Office" )
						{
							htmlTypeOptions+= '<option disabled value="Office" >Office</option>';
						}
						else
						{
							htmlTypeOptions+= '<option  value="Office" >Office</option>';
						}
						
						if(first_device_shape=="Mailing"  || first_device_shape2=="Mailing"  || first_device_shape3=="Mailing"  || first_device_shape4=="Mailing" )
						{
							htmlTypeOptions+= '<option disabled value="Mailing" >Mailing</option>';
						}
						else
						{
							htmlTypeOptions+= '<option  value="Mailing" >Mailing</option>';
						}
						
						if(first_device_shape=="Others"  || first_device_shape2=="Others"  || first_device_shape3=="Others"  || first_device_shape4=="Others")
						{
							htmlTypeOptions+= '<option disabled value="Others" >Others</option>';
						}
						else
						{
							htmlTypeOptions+= '<option  value="Others" >Others</option>';
						}
						
											
						
						$(wrapper).append('<div class="row"><div class="col-sm-3"><div id="addresstype'+Patient_x+'" class="form-group">'+
										'<label for="patient_address_type'+Patient_x+'">Address Type</label>'+
										'<select  name="patient_address_type" class=" device_shape form-control" id="patient_address_type'+Patient_x+'" >'+
										htmlTypeOptions+
										'</select>'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="addressline1'+Patient_x+'" class="form-group">'+
										'<label for="Doctor-name">Address Line 1</label>'+
										'<input type="text" class="form-control" value="" placeholder="" id="address_linea" name="address_linea">'+
									'</div></div>	'+
									'<div class="col-sm-3"><div id="addressline2'+Patient_x+'" class="form-group">'+
										'<label for="Doctor-name">Address Line 2</label>'+
										'<input type="text" class="form-control" value="" placeholder="" id="address_lineb" name="address_lineb">'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="zipcode'+Patient_x+'" class="form-group">'+
										'<label for="Doctor-name">Zipcode</label>'+
										'<input type="text" class="form-control" value="" placeholder="" id="zip_code" name="zip_code">'+
									'</div></div>'+
									
									
									'<div class="col-sm-3"><div id="city'+Patient_x+'" class="form-group">'+
										'<label for="Doctor-name">City</label>'+
										'<input type="text" class="form-control" value="" placeholder="" id="city" name="city">'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="state'+Patient_x+'" class="form-group">'+
										'<label for="Doctor-name">State</label>'+
										'<input type="text" class="form-control" value="" placeholder="" id="state" name="state">'+
									'</div></div>'+	
									'<div class="col-sm-3"><div id="currunt_active_address'+Patient_x+'" class="form-group">'+
										'<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-radio"><input class="custom-control-input" type="radio" value="'+Patient_x+'" name="active_shipping_address" id="active_shipping_address'+Patient_x+'"><label class="custom-control-label" for="active_shipping_address'+Patient_x+'">Active/Current Shipping Address </label></div></div>'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="remove'+Patient_x+'" class="form-group">'+
									'	<div style="margin-top: 30px !important;" class="form-group">'+

									'	<button onclick="removeRow('+Patient_x+');" type="button" class="btn  remove_link"><span class="fas fa-minus"></span></button>'+
									'	</div>'+
									'</div></div></div>'); //add input box
						//$(wrapper).append('<div class="form-group col-md-3" ><label style="cursor: pointer;"  href="#" class="remove_home">Remove</label><input type="text" placeholder="Home Number (XXX) XXX-XXXX" class="form-control" name="home_number[]"/></div>'); //add input box
					}
				});
				
				//$(".remove_patientaddress").on("click", function(e){ //user click on remove text
					//e.preventDefault();  x--;
				//})
			}
			
			function removeRow(x)
			{
				$('#addresstype'+x).remove();
				$('#addressline1'+x).remove();
				$('#addressline2'+x).remove();
				$('#city'+x).remove();
				$('#state'+x).remove();
				$('#zipcode'+x).remove();
				$('#currunt_active_address'+x).remove();
				$('#remove'+x).remove();
				Patient_x--;
				
			}
			
			
			var PatientContact_x=1;
			function multiple_patientcontact_fields()
			{
				var max_fields      = 4; //maximum input boxes allowed
				var wrapper   		= $(".input_patientcontact_wrap"); //Fields wrapper
				var add_button      = $(".add_morecontact_button"); //Add button ID
				
				PatientContact_x;
				$(add_button).click(function(e){ //on add input button click
					e.preventDefault();
					
					var phone_type_contact2 = $("#phone_type_contact2").val();
					var phone_type_contact3 = $("#phone_type_contact3").val();
					var phone_type_contact4 = $("#phone_type_contact4").val();
					//alert(max_fields+"--"+Patient_x);
					if(PatientContact_x < max_fields || phone_type_contact2 == "undefined" || phone_type_contact3 == "undefined" || phone_type_contact4 == "undefined"){ //max input box allowed
						PatientContact_x++; //text box increment
						var phone_type_contact = $("#phone_type_contact").val();
						var xtemp = PatientContact_x;
						xtemp = --xtemp;
						var first_phone_type_contact = $("#phone_type_contact").val();
						//alert(first_phone_type_contact+"--"+phone_type_contact2+"---"+phone_type_contact3+"--"+phone_type_contact3);
						var htmlTypeOptions=''; 
						if(first_phone_type_contact=="Home" || phone_type_contact2=="Home"  || phone_type_contact3=="Home" || phone_type_contact4=="Home")
						{
							htmlTypeOptions+= '<option disabled value="Home" >Home</option>';
						}
						else
						{
							htmlTypeOptions+= '<option value="Home" >Home</option>';
						}
						if(first_phone_type_contact=="Office"  || phone_type_contact2=="Office"|| phone_type_contact3=="Office"|| phone_type_contact4=="Office" )
						{
							htmlTypeOptions+= '<option disabled value="Office" >Office</option>';
						}
						else
						{
							htmlTypeOptions+= '<option  value="Office" >Office</option>';
						}
						
						if(first_phone_type_contact=="Mailing"  || phone_type_contact2=="Mailing"  || phone_type_contact3=="Mailing"  || phone_type_contact4=="Mailing" )
						{
							htmlTypeOptions+= '<option disabled value="Mailing" >Mailing</option>';
						}
						else
						{
							htmlTypeOptions+= '<option  value="Mailing" >Mailing</option>';
						}
						
						if(first_phone_type_contact=="Others"  || phone_type_contact2=="Others"  || phone_type_contact3=="Others"  || phone_type_contact4=="Others")
						{
							htmlTypeOptions+= '<option disabled value="Others" >Others</option>';
						}
						else
						{
							htmlTypeOptions+= '<option  value="Others" >Others</option>';
						}
						
											
						
						$(wrapper).append('<div class="row" style="width: 100% !important;"><div class="col-sm-3"><div id="phone_type_contactDiv'+PatientContact_x+'" class="form-group">'+
										'<label for="phone_type_contact">Address Type</label>'+
										'<select  name="phone_type_contact" class=" device_shape form-control" id="phone_type_contact'+PatientContact_x+'" >'+
										htmlTypeOptions+
										'</select>'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="patient_contact_number'+PatientContact_x+'" class="form-group">'+
										'<label for="Doctor-name">Phone Number</label>'+
										'<input type="text" class="form-control" value="" name="patinet_contact_phone" placeholder=" (XXX) XXX-XXXX" onkeyup="validatePhoneFormate(\'patinet_contact_phone'+PatientContact_x+'\');" id="patinet_contact_phone'+PatientContact_x+'">'+
									'</div></div>'+	
									'<div class="col-sm-0"><div style="display:none;" id="currunt_active_contact'+PatientContact_x+'" class="form-group">'+
										'<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-radio"><input class="custom-control-input" type="radio" value="'+PatientContact_x+'" name="active_shipping_contact" id="active_shipping_contact'+PatientContact_x+'"><label class="custom-control-label" for="active_shipping_contact'+PatientContact_x+'">Active/Current Shipping Contact Number </label></div></div>'+
									'</div></div>'+
									'<div class="col-sm-1"><div id="removePatient'+PatientContact_x+'" class="form-group">'+
									'	<div style="margin-top: 30px !important;" class="form-group col-md-1">'+

									'	<button onclick="removeRowContact('+PatientContact_x+');" type="button" class="btn remove_link"><span class="fas fa-minus"></span></button>'+
									'	</div>'+
									'</div></div></div>'); //add input box
						//$(wrapper).append('<div class="form-group col-md-3" ><label style="cursor: pointer;"  href="#" class="remove_home">Remove</label><input type="text" placeholder="Home Number (XXX) XXX-XXXX" class="form-control" name="home_number[]"/></div>'); //add input box
					}
				});
				
				//$(".remove_patientaddress").on("click", function(e){ //user click on remove text
					//e.preventDefault();  x--;
				//})
			}
			
			
			function removeRowContact(x)
			{
				$('#phone_type_contactDiv'+x).remove();
				$('#patient_contact_number'+x).remove();
				$('#currunt_active_contact'+x).remove();
				$('#removePatient'+x).remove();
				
				PatientContact_x--;
				
			}
			
			
			
			
			var g_x = 1; //initlal text box count
			function multiple_gaddress_fields()
			{
				var max_fields      = 4; //maximum input boxes allowed
				var wrapper   		= $(".input_gaddress_wrap"); //Fields wrapper
				var add_button      = $(".add_moregaddress_button"); //Add button ID
				
				g_x;
				$(add_button).click(function(e){ //on add input button click
					e.preventDefault();
					
					var gadress_type2 = $("#g_address_type2").val();
					var gadress_type3 = $("#g_address_type3").val();
					var gadress_type4 = $("#g_address_type4").val();
					//alert(max_fields+"--"+Patient_x);
					if(g_x < max_fields || gadress_type2 == "undefined" || gadress_type3 == "undefined" || gadress_type4 == "undefined"){ //max input box allowed
						g_x++; //text box increment
						var gadress_type = $("#g_address_type").val();
						var xtemp = g_x;
						xtemp = --xtemp;
						
						var htmlTypeOptions=''; 
						if(gadress_type=="Home" || gadress_type2=="Home" || gadress_type3=="Home" || gadress_type4=="Home")
						{
							htmlTypeOptions+= '<option disabled value="Home" >Home</option>';
						}
						else
						{
							htmlTypeOptions+= '<option value="Home" >Home</option>';
						}
						if(gadress_type=="Office"  || gadress_type2=="Office"|| gadress_type3=="Office"|| gadress_type4=="Office" )
						{
							htmlTypeOptions+= '<option disabled value="Office" >Office</option>';
						}
						else
						{
							htmlTypeOptions+= '<option  value="Office" >Office</option>';
						}
						
						if(gadress_type=="Mailing"  || gadress_type2=="Mailing"  || gadress_type3=="Mailing"  || gadress_type4=="Mailing" )
						{
							htmlTypeOptions+= '<option disabled value="Mailing" >Mailing</option>';
						}
						else
						{
							htmlTypeOptions+= '<option  value="Mailing" >Mailing</option>';
						}
						
						if(gadress_type=="Others"  || gadress_type2=="Others"  || gadress_type3=="Others"  || gadress_type4=="Others")
						{
							htmlTypeOptions+= '<option disabled value="Others" >Others</option>';
						}
						else
						{
							htmlTypeOptions+= '<option  value="Others" >Others</option>';
						}
						
											
						
						$(wrapper).append('<div class="row"><div class="col-sm-3"><div id="gaddresstype'+g_x+'" class="form-group">'+
										'<label for="g_address_type'+g_x+'">Address Type</label>'+
										'<select  name="g_address_type" class=" device_shape form-control" id="g_address_type'+g_x+'" >'+
										htmlTypeOptions+
										'</select>'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="gaddressline1'+g_x+'" class="form-group">'+
										'<label for="Doctor-name">Address Line 1</label>'+
										'<input type="text" class="form-control" value="" placeholder="" id="gaddress_linea'+g_x+'" name="gaddress_linea">'+
									'</div></div>	'+
									'<div class="col-sm-3"><div id="gaddressline2'+g_x+'" class="form-group">'+
										'<label for="Doctor-name">Address Line 2</label>'+
										'<input type="text" class="form-control" value="" placeholder="" id="gaddress_lineb'+g_x+'" name="gaddress_lineb">'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="gzipcode'+g_x+'" class="form-group">'+
										'<label for="Doctor-name">Zipcode</label>'+
										'<input type="text" class="form-control" value="" placeholder="" id="gzip_code'+g_x+'" name="gzip_code">'+
									'</div></div>'+
									
									
									'<div class="col-sm-3"><div id="gcity'+g_x+'" class="form-group">'+
										'<label for="Doctor-name">City</label>'+
										'<input type="text" class="form-control" value="" placeholder="" id="gcity'+g_x+'" name="gcity">'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="gstate'+g_x+'" class="form-group">'+
										'<label for="Doctor-name">State</label>'+
										'<input type="text" class="form-control" value="" placeholder="" id="gstate'+g_x+'" name="gstate">'+
									'</div></div>'+	
									'<div class="col-sm-3"><div id="gcurrunt_active_address'+g_x+'" class="form-group">'+
										'<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-radio"><input class="custom-control-input" type="radio" value="'+g_x+'" name="gactive_shipping_address" id="gactive_shipping_address'+g_x+'"><label class="custom-control-label" for="gactive_shipping_address'+g_x+'">Active/Current Shipping Address </label></div></div>'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="gremove'+g_x+'" class="form-group">'+
									'	<div style="margin-top: 30px !important;" class="form-group col-md-2">'+

									'	<button onclick="gremoveRow('+g_x+');" type="button" class="btn  remove_link"><span class="fas fa-minus"></span></button>'+
									'	</div>'+
									'</div></div></div>'); //add input box
						//$(wrapper).append('<div class="form-group col-md-3" ><label style="cursor: pointer;"  href="#" class="remove_home">Remove</label><input type="text" placeholder="Home Number (XXX) XXX-XXXX" class="form-control" name="home_number[]"/></div>'); //add input box
					}
				});
				
				//$(".remove_patientaddress").on("click", function(e){ //user click on remove text
					//e.preventDefault();  x--;
				//})
			}
			
			function gremoveRow(x)
			{
				$('#gaddresstype'+x).remove();
				$('#gaddressline1'+x).remove();
				$('#gaddressline2'+x).remove();
				$('#gcity'+x).remove();
				$('#gstate'+x).remove();
				$('#gzipcode'+x).remove();
				$('#gcurrunt_active_address'+x).remove();
				$('#gremove'+x).remove();
				g_x--;
				
			}
			
			
			
			
			
			
		

			var gContact_x=1;
			function multiple_gcontact_fields()
			{
				var max_fields      = 4; //maximum input boxes allowed
				var wrapper   		= $(".input_gcontact_wrap"); //Fields wrapper
				var add_button      = $(".add_gmorecontact_button"); //Add button ID
				
				gContact_x;
				$(add_button).click(function(e){ //on add input button click
					e.preventDefault();
					
					var phone_type_contact2 = $("#gphone_type_contact2").val();
					var phone_type_contact3 = $("#gphone_type_contact3").val();
					var phone_type_contact4 = $("#gphone_type_contact4").val();
					//alert(max_fields+"--"+Patient_x);
					if(gContact_x < max_fields || phone_type_contact2 == "undefined" || phone_type_contact3 == "undefined" || phone_type_contact4 == "undefined"){ //max input box allowed
						gContact_x++; //text box increment
						var phone_type_contact = $("#phone_type_contact").val();
						var xtemp = gContact_x;
						xtemp = --xtemp;
						var first_phone_type_contact = $("#gphone_type_contact").val();
						//alert(first_phone_type_contact+"--"+phone_type_contact2+"---"+phone_type_contact3+"--"+phone_type_contact3);
						var htmlTypeOptions=''; 
						if(first_phone_type_contact=="Home" || phone_type_contact2=="Home"  || phone_type_contact3=="Home" || phone_type_contact4=="Home")
						{
							htmlTypeOptions+= '<option disabled value="Home" >Home</option>';
						}
						else
						{
							htmlTypeOptions+= '<option value="Home" >Home</option>';
						}
						if(first_phone_type_contact=="Office"  || phone_type_contact2=="Office"|| phone_type_contact3=="Office"|| phone_type_contact4=="Office" )
						{
							htmlTypeOptions+= '<option disabled value="Office" >Office</option>';
						}
						else
						{
							htmlTypeOptions+= '<option  value="Office" >Office</option>';
						}
						
						if(first_phone_type_contact=="Mailing"  || phone_type_contact2=="Mailing"  || phone_type_contact3=="Mailing"  || phone_type_contact4=="Mailing" )
						{
							htmlTypeOptions+= '<option disabled value="Mailing" >Mailing</option>';
						}
						else
						{
							htmlTypeOptions+= '<option  value="Mailing" >Mailing</option>';
						}
						
						if(first_phone_type_contact=="Others"  || phone_type_contact2=="Others"  || phone_type_contact3=="Others"  || phone_type_contact4=="Others")
						{
							htmlTypeOptions+= '<option disabled value="Others" >Others</option>';
						}
						else
						{
							htmlTypeOptions+= '<option  value="Others" >Others</option>';
						}
						
											
						
						$(wrapper).append('<div class="row" style="width: 100% !important;"><div class="col-sm-3"><div id="gphone_type_contactDiv'+gContact_x+'" class="form-group">'+
										'<label for="gphone_type_contact'+gContact_x+'">Address Type</label>'+
										'<select  name="gphone_type_contact" class=" device_shape form-control" id="gphone_type_contact'+gContact_x+'" >'+
										htmlTypeOptions+
										'</select>'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="gcontact_number'+gContact_x+'" class="form-group">'+
										'<label for="Doctor-name">Phone Number</label>'+
										'<input type="text" class="form-control" value="" placeholder="(XXX) XXX-XXXX" onkeyup="validatePhoneFormate(\'gcontact_phone'+gContact_x+'\');" name="gcontact_phone" id="gcontact_phone'+gContact_x+'">'+
									'</div></div>'+	
									'<div class="col-sm-3"><div style="display:none;" id="gcurrunt_active_contactDiv'+gContact_x+'" class="form-group">'+
										'<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-radio"><input class="custom-control-input" type="radio"  value="'+gContact_x+'" name="gactive_shipping_contact" id="gactive_shipping_contact'+gContact_x+'"><label class="custom-control-label" for="gactive_shipping_contact'+gContact_x+'">Active/Current Shipping Contact Number </label></div></div>'+
									'</div></div>'+
									'<div class="col-sm-1"><div id="removegContact'+gContact_x+'" class="form-group">'+
									'	<div style="margin-top: 30px !important;" class="form-group col-md-2">'+

									'	<button onclick="removeRowgContact('+gContact_x+');" type="button" class="btn remove_link"><span class="fas fa-minus"></span></button>'+
									'	</div>'+
									'</div></div></div>'); //add input box
						//$(wrapper).append('<div class="form-group col-md-3" ><label style="cursor: pointer;"  href="#" class="remove_home">Remove</label><input type="text" placeholder="Home Number (XXX) XXX-XXXX" class="form-control" name="home_number[]"/></div>'); //add input box
					}
				});
				
				//$(".remove_patientaddress").on("click", function(e){ //user click on remove text
					//e.preventDefault();  x--;
				//})
			}
			
			
			function removeRowgContact(x)
			{
				$('#gphone_type_contactDiv'+x).remove();
				$('#gcontact_number'+x).remove();
				$('#gcurrunt_active_contactDiv'+x).remove();
				$('#removegContact'+x).remove();
				
				gContact_x--;
				
			}
			
			
			
			
			var matched_address_line1="";
			var matched_address_line2="";
			var matched_postal_code="";
			var matched_city_locality="";
			var matched_state_province="";
			var tagPopulatefield="";
			function  validateAddress(tag)
			{
				tagPopulatefield=tag;
				var address_linea = $('#'+tag+'address_linea').val();
				var address_lineb = $('#'+tag+'address_lineb').val();
				var zip_code = $('#'+tag+'zip_code').val();
				var city = $('#'+tag+'city').val();
				var state = $('#'+tag+'state').val();
				
				
				$.post( "<?php echo base_url('validate-address');?>", { 
				address_linea: address_linea,
				address_lineb: address_lineb,
				zip_code: zip_code,
				city: city,
				state: state })
				  .done(function( data ) {
				
						var obj = jQuery.parseJSON(data);
						console.log(obj);
						if(obj.status && obj.status=="error" && obj.matched_address=="error")
						{
							console.log("not"+obj.status);
							//$("#modal_message")
							//$("#addressPatientModal").modal('show');
						}
						else if(obj.status && obj.matched_address!="error")
						{
							console.log("yessss"+obj.status);
							if(obj.matched_address)
							{
								var matched_address = obj.matched_address;
								 console.log(matched_address.address_line1);
								 matched_address_line1 = matched_address.address_line1;
								 
								 matched_address_line2 = matched_address.address_line2;
								 
								 matched_postal_code = matched_address.postal_code;
								 matched_city_locality = matched_address.city_locality;
								 matched_state_province = matched_address.state_province;
								 $("#pmodal_address_line1").html("Address line 1 : "+matched_address_line1)
								 if(matched_address.address_line2!="")
								 {
									 $("#pmodal_address_line2").html("Address line 2 : "+matched_address_line2)
								 }
								 else
								 {
									 $("#pmodal_address_line2").html("Address line 2 : N/A")
								 }
								 
								 $("#pmodal_zip_code").html("Zip Code / Postal Code : "+matched_postal_code)
								 $("#pmodal_city").html("City : "+matched_city_locality)
								 $("#pmodal_state").html("State : "+matched_state_province)
								
								$("#addressPatientModal").modal('show');
							}
							else
							{
								console.log("yessss"+obj.status);
							}
							
							
							
							
						}
				  });
			}
	function populateMatchedAddress()
	{
		$("#"+tagPopulatefield+"address_linea").val(matched_address_line1);
		$("#"+tagPopulatefield+"address_lineb").val(matched_address_line2);
		$("#"+tagPopulatefield+"zip_code").val(matched_postal_code);
		$("#"+tagPopulatefield+"city").val(matched_city_locality);
		$("#"+tagPopulatefield+"state").val(matched_state_province);
		$("#addressPatientModal").modal('hide');
	}	
			
   function addOrder() {
	 window.location.href=orderUrl;
	}
	
	
	function getPatientDetail(patint_id,pcheck)
	{
		if(patint_id!="")
		{
			$.post( "<?php echo base_url('get-patient-detail');?>", {patint_id:patint_id})
			  .done(function( data ) {
				
					var obj = jQuery.parseJSON(data);
					//console.log(obj);
					
					
					if(!jQuery.isEmptyObject(obj) && !jQuery.isEmptyObject(obj.data))
					{
						var data = obj.data;
						 $(".input_patientcontact_wrap").html(""); //Fields wrapper
						$(".input_gaddress_wrap").html(""); //Fields wrapper
						$(".input_gcontact_wrap").html(""); 
						$.each(data, function( index, value ) {
							if(index==0)
							{
								$('#submit_btn').html('Update');
								$("#patient_address_type").val(value.patient_address_type);
								$("#address_linea").val(value.address_linea);
								$("#address_lineb").val(value.address_lineb);
								$("#zip_code").val(value.zip_code);
								$("#city").val(value.city);
								$("#state").val(value.state);
								if(value.active_shipping_address>0)
								{
									//alert(value.active_shipping_address)
									$("#active_shipping_address").prop("checked", true);

								}
								else
								{
									$("#active_shipping_address").prop("checked", false);

								}
								
								$("#phone_type_contact").val(value.phone_type_contact);
								$("#patinet_contact_phone").val(value.patinet_contact_phone);
								
								
								$("#g_address_type").val(value.g_address_type);
								$("#gaddress_linea").val(value.gaddress_linea);
								$("#gaddress_lineb").val(value.gaddress_lineb);
								$("#gzip_code").val(value.gzip_code);
								$("#gcity").val(value.gcity);
								$("#gstate").val(value.gstate);
								if(value.gactive_shipping_address>0)
								{
									//alert(value.active_shipping_address)
									$("#gactive_shipping_address").prop("checked", true);

								}
								else
								{
									$("#gactive_shipping_address").prop("checked", false);

								}
								
								$("#gphone_type_contact").val(value.gphone_type_contact);
								$("#gcontact_phone").val(value.gcontact_phone);

							}
							else{
								
								
								var input_patientcontact_wrap   		=  $(".input_patientcontact_wrap"); //Fields wrapper
								var input_gaddress_wrap   		=  $(".input_gaddress_wrap"); //Fields wrapper
								var input_gcontact_wrap   		=  $(".input_gcontact_wrap"); //Fields wrapper

								if(value.address_linea!="" && value.address_lineb!="" && value.city!="" && value.state!="")
								{
									Patient_x = index+1;
									var input_patientaddress_wrap   		= $(".input_patientaddress_wrap"); //Fields wrapper
									var active_shipping_address = "";
									
									
									$(input_patientaddress_wrap).append('<div class="row"><div class="col-sm-3"><div id="addresstype'+Patient_x+'" class="form-group">'+
											'<label for="patient_address_type'+Patient_x+'">Address Type</label>'+
											'<select   name="patient_address_type" class=" device_shape form-control" id="patient_address_type'+Patient_x+'" >'+
											'<option value="Home" >Home</option>'+
													'<option value="Office" >Office</option>'+
													'<option value="Mailing" >Mailing</option>'+
													'<option value="Others" >Others</option>'+
											'</select>'+
										'</div></div>'+
										'<div class="col-sm-3"><div id="addressline1'+Patient_x+'" class="form-group">'+
											'<label for="Doctor-name">Address Line 1</label>'+
											'<input type="text" class="form-control" value="'+value.address_linea+'" placeholder="" id="address_linea'+Patient_x+'" name="address_linea">'+
										'</div></div>	'+
										'<div class="col-sm-3"><div id="addressline2'+Patient_x+'" class="form-group">'+
											'<label for="Doctor-name">Address Line 2</label>'+
											'<input type="text" class="form-control" value="'+value.address_lineb+'" placeholder="" id="address_lineb'+Patient_x+'" name="address_lineb">'+
										'</div></div>'+
										'<div class="col-sm-3"><div id="zipcode'+Patient_x+'" class="form-group">'+
											'<label for="Doctor-name">Zipcode</label>'+
											'<input type="text" class="form-control" value="'+value.zip_code+'" placeholder="" id="zip_code'+Patient_x+'" name="zip_code">'+
										'</div></div>'+
										
										
										'<div class="col-sm-3"><div id="city'+Patient_x+'" class="form-group">'+
											'<label for="Doctor-name">City</label>'+
											'<input type="text" class="form-control" value="'+value.city+'" placeholder="" id="city'+Patient_x+'" name="city">'+
										'</div></div>'+
										'<div class="col-sm-3"><div id="state'+Patient_x+'" class="form-group">'+
											'<label for="Doctor-name">State</label>'+
											'<input type="text" class="form-control" value="'+value.state+'" placeholder="" id="state'+Patient_x+'" name="state">'+
										'</div></div>'+	
										'<div class="col-sm-3"><div id="currunt_active_address'+Patient_x+'" class="form-group">'+
											'<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-radio"><input class="custom-control-input" type="radio" value="'+Patient_x+'" name="active_shipping_address" id="active_shipping_address'+Patient_x+'"><label class="custom-control-label" for="active_shipping_address'+Patient_x+'">Active/Current Shipping Address </label></div></div>'+
										'</div></div>'+
										'<div class="col-sm-1"><div id="remove'+Patient_x+'" class="form-group col-md-1">'+
										'	<div style="margin-top: 30px !important;" class="form-group col-md-2">'+

										'	<button onclick="removeRow('+Patient_x+');" type="button" class="btn  remove_link"><span class="fas fa-minus"></span></button>'+
										'	</div>'+
										'</div></div></div>');
										
										if(value.active_shipping_address>0)
										{
											$("#active_shipping_address"+Patient_x).prop("checked", true);
											
										}
										$("#patient_address_type"+Patient_x).val(value.patient_address_type);
								}
								if(value.patinet_contact_phone!="")
								{
									 PatientContact_x = index+1;
									$(input_patientcontact_wrap).append('<div class="row" style="width: 100% !important;"><div class="col-sm-3"><div id="phone_type_contactDiv'+PatientContact_x+'" class="form-group">'+
										'<label for="phone_type_contact">Address Type</label>'+
										'<select  name="phone_type_contact" class=" device_shape form-control" id="phone_type_contact'+PatientContact_x+'" >'+
										'<option value="Home" >Home</option>'+
											'<option value="Office" >Office</option>'+
											'<option value="Mailing" >Mailing</option>'+
											'<option value="Others" >Others</option>'+
										'</select>'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="patient_contact_number'+PatientContact_x+'" class="form-group">'+
										'<label for="Doctor-name">Phone Number </label>'+
										'<input type="text" class="form-control"  name="patinet_contact_phone" value="'+value.patinet_contact_phone+'" placeholder="(XXX) XXX-XXXX" onkeyup="validatePhoneFormate(\'patinet_contact_phone'+PatientContact_x+'\');" id="patinet_contact_phone'+PatientContact_x+'">'+
									'</div></div>'+	
									'<div class="col-sm-0"><div style="display:none;" id="currunt_active_contact'+PatientContact_x+'" class="form-group">'+
										'<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-radio"><input class="custom-control-input" type="radio" value="'+PatientContact_x+'" name="active_shipping_contact" id="active_shipping_contact'+PatientContact_x+'"><label class="custom-control-label" for="active_shipping_contact'+PatientContact_x+'">Active/Current Shipping Contact Number </label></div></div>'+
									'</div></div>'+
									'<div class="col-sm-1"><div id="removePatient'+PatientContact_x+'" class="form-group">'+
									'	<div style="margin-top: 30px !important;" class="form-group col-md-1">'+

									'	<button onclick="removeRowContact('+PatientContact_x+');" type="button" class="btn  remove_link"><span class="fas fa-minus"></span></button>'+
									'	</div>'+
									'</div></div></div>'); 
									
									if(value.active_shipping_contact>0)
									{
										$("#active_shipping_contact"+PatientContact_x).prop("checked", true);
										
									}
									$("#phone_type_contact"+PatientContact_x).val(value.phone_type_contact);
								}
							
								
								
								if(value.gaddress_linea!="" && value.gaddress_lineb!="" && value.gcity!="" && value.gstate!="")
								{
									g_x = index+1
									$(input_gaddress_wrap).append('<div class="row"><div class="col-sm-3"><div id="gaddresstype'+g_x+'" class="form-group">'+
										'<label for="g_address_type'+g_x+'">Address Type</label>'+
										'<select  name="g_address_type" class=" device_shape form-control" id="g_address_type'+g_x+'" >'+
											'<option value="Home" >Home</option>'+
											'<option value="Office" >Office</option>'+
											'<option value="Mailing" >Mailing</option>'+
											'<option value="Others" >Others</option>'+
										'</select>'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="gaddressline1'+g_x+'" class="form-group">'+
										'<label for="Doctor-name">Address Line 1</label>'+
										'<input type="text" class="form-control" value="'+value.gaddress_linea+'" placeholder="" id="gaddress_linea'+g_x+'" name="gaddress_linea">'+
									'</div></div>	'+
									'<div class="col-sm-3"><div id="gaddressline2'+g_x+'" class="form-group">'+
										'<label for="Doctor-name">Address Line 2</label>'+
										'<input type="text" class="form-control" value="'+value.gaddress_lineb+'" placeholder="" id="gaddress_lineb'+g_x+'" name="gaddress_lineb">'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="gzipcode'+g_x+'" class="form-group">'+
										'<label for="Doctor-name">Zipcode</label>'+
										'<input type="text" class="form-control" value="'+value.gzip_code+'" placeholder="" id="gzip_code'+g_x+'" name="gzip_code">'+
									'</div></div>'+
									
									
									'<div class="col-sm-3"><div id="gcity'+g_x+'" class="form-group">'+
										'<label for="Doctor-name">City</label>'+
										'<input type="text" class="form-control" value="'+value.gcity+'" placeholder="" id="gcity'+g_x+'" name="gcity">'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="gstate'+g_x+'" class="form-group">'+
										'<label for="Doctor-name">State</label>'+
										'<input type="text" class="form-control" value="'+value.gstate+'" placeholder="" id="gstate'+g_x+'" name="gstate">'+
									'</div></div>'+	
									'<div class="col-sm-3"><div id="gcurrunt_active_address'+g_x+'" class="form-group">'+
										'<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-radio"><input class="custom-control-input" type="radio" value="'+g_x+'" name="gactive_shipping_address" id="gactive_shipping_address'+g_x+'"><label class="custom-control-label" for="gactive_shipping_address'+g_x+'">Active/Current Shipping Address </label></div></div>'+
									'</div></div>'+
									'<div class="col-sm-1"><div id="gremove'+g_x+'" class="form-group">'+
									'	<div style="margin-top: 30px !important;" class="form-group col-md-2">'+

									'	<button onclick="gremoveRow('+g_x+');" type="button" class="btn  remove_link"><span class="fas fa-minus"></span></button>'+
									'	</div>'+
									'</div></div></div>');
									
									if(value.g_address_type>0)
									{
										$("#g_address_type"+g_x).prop("checked", true);
										
									}
									$("#g_address_type"+g_x).val(value.g_address_type);
									
								}
							if(value.gcontact_phone!="")
								{
									gContact_x = index+1
									$(input_gcontact_wrap).append('<div class="row" style="width: 100% !important;"><div class="col-sm-3"><div id="gphone_type_contactDiv'+gContact_x+'" class="form-group">'+
										'<label for="gphone_type_contact'+gContact_x+'">Address Type</label>'+
										'<select  name="gphone_type_contact" class=" device_shape form-control" id="gphone_type_contact'+gContact_x+'" >'+
											'<option value="Home" >Home</option>'+
											'<option value="Office" >Office</option>'+
											'<option value="Mailing" >Mailing</option>'+
											'<option value="Others" >Others</option>'+
										'</select>'+
									'</div></div>'+
									'<div class="col-sm-3"><div id="gcontact_number'+gContact_x+'" class="form-group">'+
										'<label for="Doctor-name">Phone Number </label>'+
										'<input type="text" class="form-control" value="'+value.gcontact_phone+'" placeholder="(XXX) XXX-XXXX" onkeyup="validatePhoneFormate(\'gcontact_phone'+gContact_x+'\');" name="gcontact_phone" id="gcontact_phone'+gContact_x+'">'+
									'</div></div>'+	
									'<div class="col-sm-0"><div style="display:none;" id="gcurrunt_active_contactDiv'+gContact_x+'" class="form-group">'+
										'<div style="margin-top: 40px !important;" class="text-left"><div class="custom-control custom-radio"><input class="custom-control-input" type="radio"  value="'+gContact_x+'" name="gactive_shipping_contact" id="gactive_shipping_contact'+gContact_x+'"><label class="custom-control-label" for="gactive_shipping_contact'+gContact_x+'">Active/Current Shipping Contact Number </label></div></div>'+
									'</div></div>'+
									'<div class="col-sm-1"><div id="removegContact'+gContact_x+'" class="form-group">'+
									'	<div style="margin-top: 30px !important;" class="form-group col-md-2">'+

									'	<button onclick="removeRowgContact('+gContact_x+');" type="button" class="btn  remove_link"><span class="fas fa-minus"></span></button>'+
									'	</div>'+
									'</div></div></div>');
									$("#gphone_type_contact"+gContact_x).val(value.gphone_type_contact);

								}
							}
						  

						});
					}
			  });
		}
		else
		{
			return false;
		}
		
	}
	
	function openEidtModal(id)
	{
		$('#modal-primary').modal('toggle');
		clearForm();
		$.post( "<?php echo base_url('get-patient');?>", { 
				pid: id })
				  .done(function( data ) {
				
						var obj = jQuery.parseJSON(data);
						console.log(obj);
						if(obj.status && obj.status=="error" && obj.matched_address=="error")
						{
							console.log("not"+obj.status);
							//$("#modal_message")
							//$("#addressPatientModal").modal('show');
						}
						else if(obj.status && !jQuery.isEmptyObject(obj.data))
						{
							var pdata = obj.data;
							console.log("yessss"+pdata.id);
							
							$("#patient_id").val(pdata.id);
							$("#department").val(pdata.department);
							$("#patient_id_hidden").val(pdata.id);
							$("#member_id").val(pdata.member_id);
							$("#first_name").val(pdata.first_name);
							$("#middle_name").val(pdata.middle_name);
							$("#last_name").val(pdata.last_name);
							
							if(pdata.pcheck && pdata.pcheck==1)
							{
								$('#pcheck').prop('checked', true);
								$("#parent_title").show();
								$("#parent_detail").show();
									
								$("#gfirst_name").val(pdata.gfirst_name);
								$("#gmiddle_name").val(pdata.gmiddle_name);
								$("#glast_name").val(pdata.glast_name);
								
								
								 $("#parent_title_contact").show();
								 $("#parent_contact").show();
								 
								 $("#parent_title_address").show();
								 $("#parent_address").show();
								 $("#parent_email_div").show();
								 $("#more_gaddress").show();
								 $("#more_gcontact").show();
								 
							}
							else
							{
								$('#pcheck').prop('checked', false);
								$("#parent_title").hide();
								$("#parent_detail").hide();
							}
							if(pdata.phone_type_preferred && pdata.phone_type_preferred!="")
							{
								$('#phone_type_preferred option[value='+pdata.phone_type_preferred+']').attr('selected','selected');

							}
							if(pdata.gphone_type_preferred && pdata.gphone_type_preferred!="")
							{
								
								$('#gphone_type_preferred option[value='+pdata.gphone_type_preferred+']').attr('selected','selected');

							}
							$("#email").val(pdata.email);
							$("#gemail").val(pdata.gemail);
							
							getPatientDetail(pdata.id,pdata.pcheck);
							return false;
							if(obj.matched_address)
							{
								var matched_address = obj.matched_address;
								 console.log(matched_address.address_line1);
								 matched_address_line1 = matched_address.address_line1;
								 
								 matched_address_line2 = matched_address.address_line2;
								 
								 matched_postal_code = matched_address.postal_code;
								 matched_city_locality = matched_address.city_locality;
								 matched_state_province = matched_address.state_province;
								 $("#pmodal_address_line1").html("Address line 1 : "+matched_address_line1)
								 if(matched_address.address_line2!="")
								 {
									 $("#pmodal_address_line2").html("Address line 2 : "+matched_address_line2)
								 }
								 else
								 {
									 $("#pmodal_address_line2").html("Address line 2 : N/A")
								 }
								 
								 $("#pmodal_zip_code").html("Zip Code / Postal Code : "+matched_postal_code)
								 $("#pmodal_city").html("City : "+matched_city_locality)
								 $("#pmodal_state").html("State : "+matched_state_province)
								
								$("#addressPatientModal").modal('show');
							}
							else
							{
								console.log("yessss"+obj.status);
							}
							
							
							
							
						}
				  });
	}
	
	
	
	
	function clearForm() {
		
	  $("#submit_btn").html('Create');
	  $("#patient_id").val('');
	  $("#member_id").val('');
	  $("#patient_id_hidden").val(0);
	  $("#department").val('');
	  $("#first_name").val('');
	  $("#middle_name").val('');
	  $("#last_name").val('');
	  $("#gfirst_name").val('');
	 $("#gmiddle_name").val('');
	 $("#glast_name").val('');
	 $("#address_linea").val('');
	 $("#gaddress_linea").val('');
	 $("#address_lineb").val('');
	 $("#gaddress_lineb").val('');
	 $("#zip_code").val('');
	 $("#gzip_code").val('');
	 $("#city").val('');
	 $("#gcity").val('');
	 $("#state").val('');
	 $("#gstate").val('');
	 $("#patient_address_type").val('Home');
	 $("#g_address_type").val('Home');
	 $("#phone_type_contact").val('Home');
	 $("#phone_type_preferred").val('Phone');
	 $("#phone_type_preferred").val('Phone');
	 $("#email").val('');
	 $("#gemail").val('');
	 $("#more_address").html('');
	 $("#more_gaddress").html('');
	 $("#more_contact").html('');
	 $("#more_gcontact").html('');
	 $("#patinet_contact_phone").val('');
	 $("#gcontact_phone").val('');
	  $('#pcheck').prop('checked', false);
		g_x=1;
		gContact_x=1;
		Patient_x=1;
		add_morecontact_button=1;
		
		 $("#parent_title").hide();
		 $("#paddressDetails").hide();
					 $("#parent_detail").hide();
					 
					  $("#parent_title_contact").hide();
					 $("#parent_contact").hide();
					 $("#parent_email_div").hide();
					 
					 $("#parent_title_address").hide();
					 $("#parent_address").hide();
					 $("#more_gaddress").hide();
					 $("#more_gcontact").hide();
	}
	function isEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
	
	
	</script>

