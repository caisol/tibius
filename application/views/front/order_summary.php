	<!-- Breadcrumb -->
				<!-- Page Title -->
				<div class="container mt-0">
					<div class="row breadcrumb-bar">
						<div class="col-md-6">
							<h3 class="block-title">Summary</h3>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="<?php echo base_url("");?>">
										<span class="ti-home"></span>
									</a>
								</li>
								<li class="breadcrumb-item">Order</li>
								<li class="breadcrumb-item active">Summary</li>
							</ol>
						</div>
					</div>
				</div>
			<!-- /Breadcrumb -->
			<!-- Main Content -->
			<div class="container">
				<div class="row">
						<div class="col-md-12">
							<div class="widget-area-2 proclinic-box-shadow pb-3">
								<!-- Invoice Head -->
								<div class="row ">
									<div class="col-sm-6 mb-5">
										<strong class="proclinic-text-color">Patient Name</strong></br>
										<span id="patient_name" ></span>
										<br>
		
										<div id="gaurdian_info" style="display:none;" >
											<br>
											<strong class="proclinic-text-color">Parent/Legal Guardian Name</strong></br>
											<span id="gaurdian_name" ></span>
											<br>
										</div>
										<br>
										<span id="patient_address" ></span>
										<br>
										<span  id="patient_citystate"></span>
										<br>
										<span  id="patient_contact_number" class="pr-2"></span>
										<!--<span>Fax: 432 1231 3456</span>-->
									</div>
									<div class="col-sm-6 text-md-right mb-5">
										<strong>Tracking</strong>
										
										<br>
										<span>Tracking # <?php if(isset($tracking_number) && $tracking_number!=""){?><a style="color:#007bff !important;" href="<?php echo base_url("shipping-detail/".$order_id);?>"><?php echo isset($tracking_number)?$tracking_number:"N/A"; ?></a><?php }else{ echo "N/A";} ?></span>
										<br>
										<span id="order_status_span" >Order Status: <?php echo isset($order_status)?$order_status:"New"; ?></span>
										<br>
										<span id="carrier_name_span" >Carrier Name: <?php echo (isset($service_code) && $service_code!="")?strtoupper($service_code):"N/A" ?></span>
										<br>
										<span id="order_date">Order Date: <?php echo isset($order_date)?$order_date:"December 16, 2017"?></span>
									</div>
								</div>
								<!-- /Invoice Head -->
								<!-- Invoice Content -->
								<div class="row">
									<div class="col-sm-6 mb-5">
										<strong class="proclinic-text-color">Device Information</strong>
										<br>
										<span id="device_name" ></span>
										<br>
										<span id="device_barcode" ></span>
										<br>
										<span id="device_category" ></span>
										<br>
										<span id="device_shape" ></span>
									</div>
									<div class="col-sm-6 mb-5">
										<strong class="proclinic-text-color">SHIP TO</strong></br>
										<span style="white-space: pre-wrap;" id="order_address" ><?php echo isset($address)?$address:""; ?></span>
										<br>
										<!--<span>[Company Name]</span>
										<br>
										<span>[Street Address]</span>
										<br>
										<span>[City, Zip Code]</span>
										<br>
										<span>[Phone]</span>-->
									</div>
									<div class="col-sm-12 mb-5">
										
									</div>
									
									<div style="display:none;" class="col-sm-12">
										<div id="device_description" class="border p-4">
											
											
											<strong class="f12">Thanks for your business</strong>
										</div>
									</div>
									
									<div class="col-sm-6">
									<strong class="proclinic-text-color">Add On Devices</strong>
										<table class="table table-bordered table-striped table-invioce">
											<thead>
												<tr>
													
													<th scope="col">Name</th>
												</tr>
											</thead>
											<tbody id="attachments_table_rows" >
												<tr>
													<th scope="row">1</th>
												</tr>
									
											</tbody>
										</table>
									</div>
									<div class="col-sm-6">
									<strong class="proclinic-text-color">Dimentions</strong>
										<table class="table table-bordered table-striped table-invioce">
											<thead>
												<tr>
													
													<th scope="col">Weight (in)</th>
													<th scope="col">Length (in)</th>
													<th scope="col">Width  (in)</th>
													<th scope="col">Height (in)</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th id="device_weight" scope="row">1</th>
													<th id="device_length" scope="row">1</th>
													<th id="device_width" scope="row">1</th>
													<th id="device_height" scope="row">1</th>
												</tr>
									
											</tbody>
										</table>
									</div>
									<div style="display:none;" class="col-sm-12">
										<div class="border p-4">
											<strong>Instructions:</strong>
											<?php echo isset($instructions)?$instructions:'N/A';?>
											<br>
											<br>
											<strong class="f12">Rush Indicator: <?php echo (isset($rush_indicator) && $rush_indicator==1)?"Yes":'No';?> </strong>
										</div>
									</div>
		
								</div>
								<!-- /Invoice Content -->
						</div>
					</div>
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
										patient_contact_number_html+="Phone: "+value.patinet_contact_phone;
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
										patient_contact_number_html+="Phone: "+value.gcontact_phone;
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
							var device_data = obj.device_data
							var device_attachments = obj.device_attachments_data
							$("#device_detail_others").html("");

							var device_detail_others = "";
							if(device_data)
							{
								$("#device_name").html("Device Name : "+device_data.device_name);
								$("#device_barcode").html("Device Barcode : "+device_data.device_barcode);
								$("#device_category").html("Device Category : "+device_data.device_category);
								$("#device_shape").html("Device Shape : "+device_data.device_shape);
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
								  attachmentDivHtml+='<tr>'+
													'<th scope="row">'+value.name+'</th>'+
												'</tr>';
								});
								$("#attachments_table_rows").html(attachmentDivHtml);
								
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
	

	

	</script>
	
				