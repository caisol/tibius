
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order Summary</h1>
          </div><!-- /.col -->
          
		  <div class="col-sm-6">
            <h1 class="m-0"><a href="<?php echo base_url('manage-orders')?>">Back to Order List</a></h1>
          </div><!-- /.col -->
		  
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	
    <!-- Main content -->
    
    <!-- /.content -->
	
	<section class="content">
      <div class="container-fluid">
			<div class="orders-summary">
				<div class="col-md-5 order-summary">
					<div class="row">
					<h4 class="modal-title">Summary</h4>
					<p><strong>Order Summary</strong></p>
					
					<div class="row01">
						<div class="col-sm-4">
							<label>Recipients Name</label>
							<p id="patient_name" >N/A</p>
						</div>
						<div id="device_name_div" class="col-sm-4">
							<label>Envelope Name</label>
							<p id="device_name_view" >N/A</p>
						</div>
					</div>
					
					<div class="row01">
						<div  class="col-sm-6">
							<label>Address</label>
							<p id="patient_address" >N/A</p>
						</div>
					</div>
					
					<div class="row01">
						<div class="col-sm-4">
							<label>Phone</label>
							<p id="patient_contact_number"  >N/A</p>
						</div>
						<div class="col-sm-4">
							<label>Email</label>
							<p id="patient_email" >N/A</p>
						</div>
					</div>
					
					<div class="row01">
						<div class="col-sm-10">
							<label>Tracking</label>
							<p>	Tracking <span><?php if(isset($tracking_number) && $tracking_number!=""){?><a style="color:#007bff !important;" href="<?php echo base_url("shipping-detail/".$order_id);?>"><?php echo isset($tracking_number)?'#'.$tracking_number:"N/A"; ?></a><?php }else{ echo "N/A";} ?></span><br/>
								Order Status: <span id="order_status_span" ><?php echo isset($order_status)?$order_status:"New"; ?></span><br/>
								Carrier Name: <span id="carrier_name_span" > <?php echo (isset($service_code) && $service_code!="")?strtoupper($service_code):"N/A" ?></span><br/>
								Order Date: <span id="order_date"> <?php echo isset($order_date)?$order_date:"N/A"?></span><br/>
							</p>
						</div>
						
					</div>
                    <?php if(!empty($record->return_label_id)){?>
                    <div class="row02">
                            <div class="col-sm-10">
                                <label>Return Tracking</label>
                                <p>	Return Tracking <span><?php if(isset($record->return_tracking_number) && $record->return_tracking_number!=""){?><a style="color:#007bff !important;" href="<?php echo base_url("shipping-detail-return/".$order_id);?>"><?php echo isset($record->return_tracking_number)?'#'.$record->return_tracking_number:"N/A"; ?></a><?php }else{ echo "N/A";} ?></span><br/>
                                    Return Order Status: <span id="order_status_span" ><?php echo isset($record->return_label_status)?$record->return_label_status:"New"; ?></span><br/>
                                    Return Carrier Name: <span id="carrier_name_span" > <?php echo (isset($record->return_service_code) && $record->return_service_code!="")?strtoupper($record->return_service_code):"N/A" ?></span><br/>
                                    Return Order Date: <span id="order_date"> <?php echo isset($return_created_at)?$return_created_at:"N/A"?></span><br/>
                                </p>
                            </div>

                    </div>
                    <?php } ?>

                        <div class="row01">
						<div class="col-sm-10">
							<label>Device Information</label>
							<p>	Device Name: <span id="device_name_span"  >N/A </span><br/>
								Device Barcode: <span id="device_barcode" >N/A </span><br/>
								Device Category: <span id="device_category" >N/A </span><br/>
								Device Shape: <span id="device_shape" >N/A </span><br/>
							</p>
						</div>
						
					</div>
					
					<div class="row01">
						<div class="col-sm-10">
							<label>Ship To</label>
							<p id="order_address" ><?php echo isset($address)?$address:""; ?>
							</p>
						</div>
						
					</div>
				 </div>
			</div>
			
		<div class="col-md-7 order-summary">
				<div class="row">
						<h4 class="modal-title">Add on Device</h4>
						<table id="example2" class="table table-bordered table-hover order-list">
						  <thead>
						  <tr>
							<th>Name</th>
							<th>Weight (in)</th>
							<th>Length (in)</th>
							<th>Width (in)</th>
							<th>Height (in)</th>

						  </tr>
						  </thead>
						  <tbody id="attachments_table_rows">
						 <tr>
							<td id="device_name_tbl" >N/A</td>
							<td id="device_weight" >N/A</td>
							<td id="device_length" >N/A</td>
							<td id="device_width" >N/A</td>
							<td id="device_height" >N/A</td>
						  </tr>
						</tbody>
						</table>
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
			// In your Javascript (external .js resource or <script> tag)
					var patient_id_url = '<?php echo isset($patient_id)?$patient_id:0?>';
					loadPatient(patient_id_url);
					
					var device_id = '<?php echo isset($device_id)?$device_id:0?>';
					loadDevice(device_id);

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
						
						$("#gaurdian_name").html("");
						var gaurdian_name_html="";
						
						$("#patient_name").html("");
						var patient_name_html="";
						
						if(!obj.status && obj.message)
						{
							
							console.log(obj);
						}
						else if(obj.status && obj.patient_data)
						{
							var patient_data = obj.patient_data
							if(patient_data.first_name && patient_data.first_name!="")
							{
								patient_name_html+=patient_data.first_name
							}
							if(patient_data.middle_name && patient_data.middle_name!="")
							{
								patient_name_html+=" "+patient_data.middle_name
							}
							if(patient_data.last_name && patient_data.last_name!="")
							{
								patient_name_html+=" "+patient_data.last_name
							}
							if(patient_data.email && patient_data.email!="")
							{
								$('#patient_email').html(patient_data.email);
							}
							$("#patient_name").html(patient_name_html);
							if(patient_data.pcheck && patient_data.pcheck==1)
							{
								if(patient_data.gfirst_name && patient_data.gfirst_name!="")
								{
									gaurdian_name_html+=patient_data.gfirst_name;
								}
								if(patient_data.gmiddle_name && patient_data.gmiddle_name!="")
								{
									gaurdian_name_html+=" "+patient_data.gmiddle_name;
								}
								if(patient_data.glast_name && patient_data.glast_name!="")
								{
									gaurdian_name_html+=" "+patient_data.glast_name;
								}
								if(patient_data.gemail && patient_data.gemail!="")
								{
									$('#patient_email').html(patient_data.gemail);
								}
								$("#gaurdian_name").html(gaurdian_name_html);
								$("#gaurdian_info").css("display","block");
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
								$("#patient_citystate").html("");
								var patient_citystate_html="";
								
								
								$.each(patient_detail_data, function( index, value ) {
									console.log(value);
									if(value.active_shipping_address!=0  && patient_data.pcheck && patient_data.pcheck!=1)
									{
										
										var patient_address_html="";
										var patient_citystate_html="";
																			
										$("#patient_address").html("");
										
										if(value.address_linea!="")
										{
											patient_address_html+=value.address_linea;
											$("#patient_address").css('display','block');
										}
										if(value.address_lineb!="")
										{
											patient_address_html+=" "+value.address_lineb;
											$("#patient_address").css('display','block');
										}
										
										$("#patient_address").html(patient_address_html);
										
										if(value.city!="")
										{
											patient_citystate_html+=value.city;
										}
										if(value.state!="")
										{
											patient_citystate_html+=" "+value.state;
										}
										if(value.zip_code!="")
										{
											patient_citystate_html+=" "+value.zip_code;
										}
										$("#patient_citystate").html(patient_citystate_html);

									}
									
									
									if(value.active_shipping_contact!=0  && patient_data.pcheck && patient_data.pcheck!=1)
									{
										
										var patient_contact_number_html="";
										patient_contact_number_html+=""+value.patinet_contact_phone;
										$("#patient_contact_number").html(patient_contact_number_html);
									}
									

									
									
									console.log(value.gactive_shipping_address);
									if(value.gactive_shipping_address!=0 && patient_data.pcheck && patient_data.pcheck==1)
									{
										
										$("#patient_address").html("");
										var patient_address_html="";
										if(value.gaddress_linea!="")
										{
											patient_address_html+=value.gaddress_linea;
											$("#patient_address").css('display','block');
										}
										if(value.gaddress_lineb!="")
										{
											patient_address_html+=" "+value.gaddress_lineb;
											$("#patient_address").css('display','block');
										}
										
																	
										$("#patient_address").html(patient_address_html);
										
										var patient_citystate_html="";
										
										if(value.city!="")
										{
											patient_citystate_html+=" "+value.city;
										}
										if(value.state!="")
										{
											patient_citystate_html+=" "+value.state;
										}
										if(value.zip_code!="")
										{
											patient_citystate_html+=value.zip_code;
										}
										$("#patient_citystate").html(patient_citystate_html);

									}
									
									if(value.gactive_shipping_contact!=0  && patient_data.pcheck && patient_data.pcheck==1)
									{
										$("#patient_contact_number").html("");
										var patient_contact_number_html="";
										patient_contact_number_html+=""+value.gcontact_phone;
										$("#patient_contact_number").html(patient_contact_number_html);

									}
									
									
								});
								
								
								/*if(patient_data.pcheck && patient_data.pcheck==1)
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
									
								}*/
							}
							 
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
							var device_data = obj.device_data;
							var device_attachments = obj.device_attachments_data
							$("#device_detail_others").html("");

							var device_detail_others = "";
							if(device_data)
							{
								
								$("#device_name").html("<label>Device Name</label><p id='device_name_view'>"+device_data.device_name+"</p> ");
								$("#device_name_view").html(device_data.device_name);
								$("#device_name_span").html(device_data.device_name);
								$("#device_barcode").html(""+device_data.device_barcode);
								$("#device_category").html(""+device_data.device_category);
								$("#device_shape").html(""+device_data.device_shape);
								$("#device_weight").html(device_data.device_numeric_weight+" "+device_data.device_unit);
								$("#device_length").html(device_data.device_length);
								$("#device_width").html(device_data.device_width);
								$("#device_height").html(device_data.device_height);
								
								device_description_html="";
								if(device_data.device_description)
								{
									device_description_html+="<strong>Device Description:</strong>  "+device_data.device_description;
									
								}
								if(device_data.device_comments)
								{
									device_description_html+="<br><br><strong>Comments:</strong>  "+device_data.device_comments;
								}
								$("#device_description").html(device_description_html);
							}
							if(device_attachments)
							{
								var device_attachments = device_attachments
								var attachmentDivHtml="";
								$.each(device_attachments, function( index, value ) {
									if(index==0)
									{
										attachmentDivHtml+='<tr>'+
													'<th scope="row">'+value.name+'</th>'+
													'<th scope="row">'+device_data.device_numeric_weight+" "+device_data.device_unit+'</th>'+
													'<th scope="row">'+device_data.device_length+'</th>'+
													'<th scope="row">'+device_data.device_width+'</th>'+
													'<th scope="row">'+device_data.device_height+'</th>'+
												'</tr>';
									}
									else
									{
										attachmentDivHtml+='<tr>'+
													'<th scope="row">'+value.name+'</th>'+
													'<th scope="row">N/A</th>'+
													'<th scope="row">N/A</th>'+
													'<th scope="row">N/A</th>'+
													'<th scope="row">N/A</th>'+
												'</tr>';
									}
								  
								});
								if(attachmentDivHtml=="")
								{
									$("#attachments_table_rows").html("No attachments are available");
								}
								else
								{
									$("#attachments_table_rows").html(attachmentDivHtml);
								}
								
								
								
							}
							else
							{
								$("#attachments_table_rows").html("No attachments are available");
								if(device_data.device_name)
								{
									$("#device_name_tbl").val(device_data.device_name);
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
														
						
							
							
						}
						else
						{
							$("#device_detail").css("display","none");
							$("#device_detail_title").css("display","none");
						}
				  });
	   }
	   
   }
	

	

	</script>
	
				