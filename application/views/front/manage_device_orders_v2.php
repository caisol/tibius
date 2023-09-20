<link rel="stylesheet" href="<?php echo FRONT_PLUGINS_V2; ?>datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo FRONT_PLUGINS_V2; ?>datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo FRONT_PLUGINS_V2; ?>datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo FRONT_CSS_V2; ?>bootstrap-select.css" />


  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-2">
				<h1 class="m-0">Device Orders</h1>
			  </div><!-- /.col -->
			  <div class="filter-device">
				
			  
			   
			   <p>Select device</p>
				<select class="selectpicker" data-live-search="true" name="existing_devices"  id="existing_devices" >
					<?php if(isset($devices) && !empty($devices)){
						foreach($devices as $key=>$val) { ?>
					<option <?php echo (isset($orders->device_id) && $orders->device_id==$val->id)?"selected":""; ?>  value="<?php echo  isset($val->id)?$val->id:0; ?>" ><?php echo isset($val->device_name)?$val->device_name:"N/A"; ?></option>
					<?php }}?>
				</select>
				
			  </div>
			</div><!-- /.row -->
		  </div><!-- /.container-fluid -->
		</div>
		
	<section class="content" id="device-orders">
      <div class="container-fluid">
        <!-- Info boxes -->
        
		<div class="col-12">
			<div class="card-body">
				<div class="row">
					<div class="col-md-5 device-order-left">
					<div class="device-pic">
						<img class="card-img-top" src="<?php echo FRONT_IMG_V2; ?>air.jpg" />
					</div>
					<div class="device-text">
						<h2 class="card-title" >NuvoAir</h2>
						<p class="card-text" >Your text goes here Your text goes here Your text goes here Your text goes here Your text goes here Your text goes here Your text goes here Your text goes here Your text goes here Your text goes here Your text </p>
					</div>
					</div>
			
			<div class="col-md-7 device-order-table">
				<table id="example2" class="table table-bordered table-hover order-list">
					<tbody id="myInput">
						<tr>
							<td>Device Id</td>
							<td id="Device-ID" >002</td>
						</tr>
						
						<tr>
							<td>Device Category</td>
							<td id="Device-Category" >Remote Patient Monitoring</td>
						</tr>
						
						<tr>
							<td>Device Barcode</td>
							<td id="Device-Barcode" >343g</td>
						</tr>
						
						<tr>
							<td>Special Instructions</td>
							<td id="Special-Instructions" >test image</td>
						</tr>
						
						<tr>
							<td>Weight</td>
							<td id="Weight" >2lbs</td>
						</tr>
						
						<tr>
							<td>Lenght</td>
							<td id="Lenght" >2in</td>
						</tr>
						
						<tr>
							<td>Width</td>
							<td id="Width" >2m</td>
						</tr>
						
						<tr>
							<td>Height</td>
							<td id="Height" >2in</td>
						</tr>
				
				</table>
			
			</div>
		</div>
		</div>
		</div>
		</div>
		</section>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-2">
            <h1 class="m-0">Order List</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	
	
	<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
		<div class="col-12">
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
		<div class="orders-tables">
          <div class="col-12 col-sm-12 col-md-12">
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
                  <tbody id="tableIdData">
                 <tr>
                    <td>0038</td>
                    <td>Muhammad Sharif</td>
                    <td>muhammadsharif@gmail.com</td>
                    <td>Nuovir</td>
                    <td>sdsd33f</td>
					<td>Submitted</td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="#" class="dropdown-item">Delete</a>
						 </div> 
					</td>
                  </tr>
                  <tr>
                    <td>0038</td>
                    <td>Muhammad Sharif</td>
                    <td>muhammadsharif@gmail.com</td>
                    <td>Nuovir</td>
                    <td>sdsd33f</td>
					<td>Submitted</td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="#" class="dropdown-item">Delete</a>
						 </div> 
					</td>
                  </tr>
                 <tr>
                    <td>0038</td>
                    <td>Muhammad Sharif</td>
                    <td>muhammadsharif@gmail.com</td>
                    <td>Nuovir</td>
                    <td>sdsd33f</td>
					<td>Submitted</td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="#" class="dropdown-item">Delete</a>
						 </div> 
					</td>
                  </tr>
                 <tr>
                    <td>0038</td>
                    <td>Muhammad Sharif</td>
                    <td>muhammadsharif@gmail.com</td>
                    <td>Nuovir</td>
                    <td>sdsd33f</td>
					<td>Submitted</td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="#" class="dropdown-item">Delete</a>
						 </div> 
					</td>
                  </tr>
                 <tr>
                    <td>0038</td>
                    <td>Muhammad Sharif</td>
                    <td>muhammadsharif@gmail.com</td>
                    <td>Nuovir</td>
                    <td>sdsd33f</td>
					<td>Submitted</td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="#" class="dropdown-item">Delete</a>
						 </div> 
					</td>
                  </tr>
                <tr>
                    <td>0038</td>
                    <td>Muhammad Sharif</td>
                    <td>muhammadsharif@gmail.com</td>
                    <td>Nuovir</td>
                    <td>sdsd33f</td>
					<td>Submitted</td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="#" class="dropdown-item">Delete</a>
						 </div> 
					</td>
                  </tr>
                <tr>
                    <td>0038</td>
                    <td>Muhammad Sharif</td>
                    <td>muhammadsharif@gmail.com</td>
                    <td>Nuovir</td>
                    <td>sdsd33f</td>
					<td>Submitted</td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="#" class="dropdown-item">Delete</a>
						 </div> 
					</td>
                  </tr>
                 <tr>
                    <td>0038</td>
                    <td>Muhammad Sharif</td>
                    <td>muhammadsharif@gmail.com</td>
                    <td>Nuovir</td>
                    <td>sdsd33f</td>
					<td>Submitted</td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="#" class="dropdown-item">Delete</a>
						 </div> 
					</td>
                  </tr>
                 <tr>
                    <td>0038</td>
                    <td>Muhammad Sharif</td>
                    <td>muhammadsharif@gmail.com</td>
                    <td>Nuovir</td>
                    <td>sdsd33f</td>
					<td>Submitted</td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="#" class="dropdown-item">Delete</a>
						 </div> 
					</td>
                  </tr>
                <tr>
                    <td>0038</td>
                    <td>Muhammad Sharif</td>
                    <td>muhammadsharif@gmail.com</td>
                    <td>Nuovir</td>
                    <td>sdsd33f</td>
					<td>Submitted</td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="#" class="dropdown-item">Delete</a>
						 </div> 
					</td>
                  </tr>
                 <tr>
                    <td>0038</td>
                    <td>Muhammad Sharif</td>
                    <td>muhammadsharif@gmail.com</td>
                    <td>Nuovir</td>
                    <td>sdsd33f</td>
					<td>Submitted</td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="#" class="dropdown-item">Delete</a>
						 </div> 
					</td>
                  </tr>
                 <tr>
                    <td>0038</td>
                    <td>Muhammad Sharif</td>
                    <td>muhammadsharif@gmail.com</td>
                    <td>Nuovir</td>
                    <td>sdsd33f</td>
					<td>Submitted</td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="#" class="dropdown-item">Delete</a>
						 </div> 
					</td>
                  </tr>
                 <tr>
                    <td>0038</td>
                    <td>Muhammad Sharif</td>
                    <td>muhammadsharif@gmail.com</td>
                    <td>Nuovir</td>
                    <td>sdsd33f</td>
					<td>Submitted</td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="#" class="dropdown-item">Delete</a>
						 </div> 
					</td>
                  </tr>
                 <tr>
                    <td>0038</td>
                    <td>Muhammad Sharif</td>
                    <td>muhammadsharif@gmail.com</td>
                    <td>Nuovir</td>
                    <td>sdsd33f</td>
					<td>Submitted</td>
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="#" class="dropdown-item">Edit</a>
						  <div class="dropdown-divider"></div>
						  <a href="#" class="dropdown-item">Delete</a>
						 </div> 
					</td>
                  </tr>
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
			
		 
			$(document).ready(function() {
				$('#existing_devices').selectpicker();
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
							
							$('.card-title').html(devices.device_name);
							if(devices.device_description!=null)
							{
								$('.card-text').html(devices.device_description);
							}
							else
							{
								$('.card-text').html('N/A');
							}
							
							$('#Device-ID').html(devices.id);
							if(devices.device_category!=null)
							{
								$('#Device-Category').html(devices.device_category);
							}
							else
							{
								$('#Device-Category').html('N/A');
							}
							
							if(devices.device_barcode!=null)
							{
								$('#Device-Barcode').html(devices.device_barcode);
							}
							else
							{
								$('#Device-Barcode').html('N/A');
							}
							
							if(devices.device_comments!=null)
							{
								$('#Special-Instructions').html(devices.device_comments);
							}
							else
							{
								$('#Special-Instructions').html('N/A');
							}
							
							if(devices.device_numeric_weight!=null)
							{
								$('#Weight').html(devices.device_numeric_weight+' '+devices.device_unit);
							}
							else
							{
								$('#Weight').html('N/A');
							}
							
							if(devices.device_length!=null)
							{
								$('#Lenght').html(devices.device_length+' in');
							}
							else
							{
								$('#Lenght').html('N/A');
							}
							if(devices.device_width!=null)
							{
								$('#Width').html(devices.device_width+' in');
							}
							else
							{
								$('#Width').html('N/A');
							}
							if(devices.device_height!=null)
							{
								$('#Height').html(devices.device_height+' in');
							}
							else
							{
								$('#Height').html('N/A');
							}
							
							$("#tableIdData").html('');
							var order_data = obj.order_data
							var devices_image = obj.devices_image
							if(devices_image && devices_image.device_image!=null)
							{
								
								$('.card-img-top').attr('src','<?php echo DEVICE_IMAGES;?>'+devices_image.device_image)
							}
							else
							{
								$('.card-img-top').attr('src','<?php echo FRONT_IMAGES;?>No-Image-Placeholder.png')
							}
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
											
											'<td>'+value.id+'</td>'+
											'<td>'+value.first_name+'</td>'+
											'<td>'+value.email+'</td>'+
											'<td>'+value.device_name+'</td>'+
											'<td>'+value.device_barcode+'</td>'+
											'<td>'+orderStatus+'</td>'+
											
											
											'<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">'+
												 ' <i class="fa fa-ellipsis-v" aria-hidden="true"></i>'+
												'</a>'+
												'<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">'+
												  
												 ' <a href="<?php echo base_url("order-summary")?>/'+value.id+'" class="dropdown-item">View</a>'+
												  '<div class="dropdown-divider"></div>'+
												  
												 '</div> '+
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
	
