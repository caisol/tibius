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
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Shipping Details</h1>
          </div><!-- /.col -->
          
		  <div class="col-sm-6">
            <h1 class="m-0"><a href="<?php echo base_url("order-summary/".$order_id)?>">Back to Order summary</a></h1>
          </div><!-- /.col -->
		  
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	
    <!-- Main content -->
    
    <!-- /.content -->
	<?php 
	if(isset($order_status) && $order_status=="New")
	{
		$order_status=0;
	}
	elseif(isset($order_status) && $order_status=="Review")
	{
		$order_status=1;
	}
	elseif(isset($order_status) && $order_status=="Submitted")
	{
		$order_status=2;
	}
	?>
	<section class="content">
      <div class="container-fluid">
			<div class="shipping-summary">
				<div class="col-md-12">
					<div class="row">
						<h4>Tracking</h4>
						<p><strong>Tracking Return# <?php if(isset($tracking_number) && $tracking_number!=""){?><a style="color:#007bff !important;" href="<?php echo base_url("shipping-detail-return/".$order_id);?>"><?php echo isset($tracking_number)?$tracking_number:"N/A"; ?></a><?php }else{ echo "N/A";} ?></strong></p>
						<p><strong>Tracking# <?php if(isset($tracking_number) && $tracking_number!=""){?><a style="color:#007bff !important;" href="<?php echo base_url("shipping-detail/".$order_id);?>"><?php echo isset($tracking_number)?$tracking_number:"N/A"; ?></a><?php }else{ echo "N/A";} ?></strong></p>
						<table id="example2" class="table table-bordered table-hover order-list">
							<tbody id="myInput">
							 <tr>
								<td>Carrier Name</td>
								<td><?php echo isset($service_code)?strtoupper($service_code):"N/A" ?></td>
							  </tr>
							  <tr>
								<td>Shipping Amount</td>
								<td><?php echo isset($shipping_amount)?($shipping_currency." ".$shipping_amount):"N/A" ?></td>
							  </tr>
							  <tr>
								<td>Order Date</td>
								<td><?php echo isset($order_date)?$order_date:"N/A"?></td>
							  </tr>
							  <tr>
								<td>Tracking Status</td>
								<td><?php echo isset($tracking_status)?strtoupper($tracking_status):"N/A"?></td>
							  </tr>
							  <tr>
								<td>Tracking Status Description</td>
								<td><?php echo isset($tracking_status_description)?($tracking_status_description):"N/A"?></td>
							  </tr>
							  <tr>
								<td>Shipment Status</td>
								<td><?php echo isset($shipment_status)?$shipment_status:"N/A"?></td>
							  </tr>
							  
							  <tr>
								<td>Label</td>
								<td><?php echo isset($label_id)?$label_id:"N/A"?></td>
							  </tr>
							  
							  <tr>
								<td>Label Status</td>
								<td><?php echo isset($label_status)?$label_status:"N/A"?></strong></td>
							  </tr>
							  
							  <tr>
								<td>Label Download</td>
								<td><?php if(isset($label_download) && $label_download!=""){?><a  target="_blank" style="color:#007bff !important;" href="<?php echo $label_download;?>"><?php echo isset($label_download)?"View":"N/A"; ?></a><?php }else{ echo "N/A";} ?></td>
							  </tr>
							  
							  <tr>
								<td>Carrier Status Description</td>
								<td><?php echo isset($carrier_status_description)?$carrier_status_description:"N/A"?></td>
							  </tr>
							  
							  <tr>
								<td>Actual Delivery Date</td>
								<td><?php echo isset($actual_delivery_date)?$actual_delivery_date:"N/A"?></td>
							  </tr>
							  
							  <tr>
								<td>Estimated Delivery Date</td>
								<td><?php echo isset($estimated_delivery_date)?$estimated_delivery_date:"N/A"?></td>
							  </tr>
							</tbody>
						</table>
					</div>
				 </div>
				 
				 <div class="col-md-12">
					<div class="row">
						<h4>Ship To</h4>
						<table id="example2" class="table table-bordered table-hover order-list">
							<tbody id="myInput">
							 <tr>
                                 <?php $ship_to = !empty($return_shipment_response->ship_to)?$return_shipment_response->ship_to:array();
                                 $address_name = !empty($ship_to->name)?$ship_to->name:"";
                                 $address_address_line1 = !empty($ship_to->address_line1)?$ship_to->address_line1:"";
                                 $address_address_line2 = !empty($ship_to->address_line2)?$ship_to->address_line2:"";
                                 $address_city_locality = !empty($ship_to->city_locality)?$ship_to->city_locality:"";
                                 $address_state_province = !empty($ship_to->state_province)?$ship_to->state_province:"";
                                 $address_postal_code = !empty($ship_to->postal_code)?$ship_to->postal_code:"";
                                 $address_country_code = !empty($ship_to->country_code)?$ship_to->country_code:"";
                                 ?>
								<td  id="order_address" ><?php echo $address_name." ".$address_address_line1." ".$address_address_line2." ".$address_city_locality." ".$address_state_province." ".$address_postal_code." ".$address_country_code; ?></td>
								
							  </tr>
							  
							</tbody>
						</table>
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
	
				