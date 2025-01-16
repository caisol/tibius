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
            <h1 class="m-0">Envelope List</h1>
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
			<button type="button" class="btn btn-primary" onclick="clearForm();" data-toggle="modal" data-target="#modal-primary" >+ Add Envelope</button>
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
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	<div class="modal fade" id="modal-primary">
        <div class="modal-dialog">
          <div class="modal-content bg-white">
            <div class="modal-header">
              <h4 class="modal-title">Add Envelopes</h4>
			  
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="device_infromation"  role="form" method="post"   enctype="multipart/form-data" name="form">
				<div class="row">
				<div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
						<input type="hidden" id="device_id" value="<?php echo isset($devices->id)?$devices->id:0; ?>" />

                        <label for="Device-name">Envelope ID</label>
						<input type="text" class="form-control" placeholder="" style="color:white;" disabled value="<?php echo isset($devices->id)?$devices->id:""; ?>" id="device_hidden_id" name="device_hidden_id">
                      </div>
                </div>
				<div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="attachments">Envelope Category</label>
						<select  name="device_category" id="device_category" >
							<option <?php echo (isset($devices->device_category) && $devices->device_category=="")?"selected":""; ?> value="" >Select Device Category</option>
							<option <?php echo (isset($devices->device_category) && $devices->device_category=="Basic surgical")?"selected":""; ?>  value="Basic surgical" >Basic surgical operation instuments </option>
							<option <?php echo (isset($devices->device_category) && $devices->device_category=="Neurological")?"selected":""; ?>  value="Neurological" >Neurological surgical instruments</option>
							<option <?php echo (isset($devices->device_category) && $devices->device_category=="Ophthalmic")?"selected":""; ?>  value="Ophthalmic" >Ophthalmic surgical instruments</option>
							<option <?php echo (isset($devices->device_category) && $devices->device_category=="Remote Patient Monitoring")?"selected":""; ?>  value="Remote Patient Monitoring" >Remote Patient Monitoring</option>
							<option <?php echo (isset($devices->device_category) && $devices->device_category=="Others")?"selected":""; ?>  value="Others" >Others</option>
						</select>
                      </div>
                </div>
				
				<div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="Device-name">Envelope Name</label>
						<input type="text" class="form-control" placeholder="" value="<?php echo isset($devices->device_name)?$devices->device_name:""; ?>" id="device_name" name="device_name">
                      </div>
                </div>
				
				<div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="Device-barcode">Envelope  Barcode</label>
						<input type="text" class="form-control" placeholder="" value="<?php echo isset($devices->device_barcode)?$devices->device_barcode:""; ?>"  name="device_barcode" id="device_barcode" >
                      </div>
                </div>
				</div>
				
				<div class="col-sm-12">
					<div class="row">
					<div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="attachments">Envelope Attachments</label>
						<select class="selectpicker" multiple data-live-search="true" name="attachments[]"  id="attachments" >
							<option value="Oximeter" >Oximeter</option>
							<option value="Blood Pressure cuff" >Blood Pressure cuff</option>
							<option value="Scale" >Scale</option>
							<option value="Camera" >Camera</option>
							<option value="Basal Thermometer" >Basal Thermometer</option>
							<option value="Otoscope" >Otoscope</option>
							<option value="Stethoscope (with volume, bell, and diaphragm filters)" >Stethoscope (with volume, bell, and diaphragm filters)</option>
							<option value="Tongue depressor adaptors" >Tongue depressor adaptors</option>
						</select>
                      </div>
					</div>
					
					<div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="Device-barcode">Other  Attachments</label>
						<input type="text" class="form-control" placeholder="" value=""  name="other_attachments" id="other_attachments" >
                      </div>
					</div>
					
					<div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <p class="add-btn" id="other_att_btn"><a href="javascript:void(0);" id="guardian">Add</a></p>
                      </div>
					</div>
					</div>
				</div>
				
				<div class="col-sm-12">
					
					<div class="row">
						<div class="col-sm-3">
						  <!-- text input -->
						  <div class="form-group">
							<label for="device_count">Envelope count</label>
							<input type="text" placeholder="" class="form-control" value="<?php echo isset($devices->device_count)?$devices->device_count:""; ?>" id="device_count" name="device_count">
						  </div>
						</div>
							
						<div class="col-sm-3">
						  <!-- text input -->
						  <div class="form-group">
							<label for="device_count">Envelope Description</label>
							<textarea placeholder="" class="form-control" id="device_description" rows="3"><?php echo isset($devices->device_description)?$devices->device_description:""; ?></textarea>
						  </div>
						</div>
						
						<div class="col-sm-3">
						  <!-- text input -->
						  <div class="form-group">
							<label for="device_count">Special Instructions</label>
							<textarea placeholder="" class="form-control" id="device_comments" rows="3"><?php echo isset($devices->device_comments)?$devices->device_comments:""; ?></textarea>
						  </div>
						</div>
					</div>
					
					<div class="row">	
						<h4 class="modal-title">Shipping Details</h4>
						<div class="col-sm-3">
						  <!-- text input -->
						  <div class="form-group">
							<label for="device_shape">Package Type</label>
							<select  name="device_shape"  id="device_shape" >
								<option <?php echo (isset($devices->device_shape) && $devices->device_shape=="")?"selected":""; ?> value="" >Select Shape</option>
								<option <?php echo (isset($devices->device_shape) && $devices->device_shape=="Package")?"selected":""; ?> selected value="Package" >Package</option>
								<option <?php echo (isset($devices->device_shape) && $devices->device_shape=="Large Envelope")?"selected":""; ?> value="Large Envelope" >Large Envelope</option>
								<option <?php echo (isset($devices->device_shape) && $devices->device_shape=="Letter")?"selected":""; ?> value="Letter" >Letter</option>
								<option <?php echo (isset($devices->device_shape) && $devices->device_shape=="Post Card")?"selected":""; ?> value="Post Card" >Post Card</option>
								
							</select>
						  </div>
						</div>
							
						<div class="col-sm-3">
						  <!-- text input -->
						  <div class="form-group">
							<label for="device_shape">Weight Unit</label>
							<select  name="device_shape"  id="device_unit" >
								<option <?php echo (isset($devices->device_unit) && $devices->device_unit=="Post Card")?"selected":""; ?> value="" >Select Unit</option>
								<option <?php echo (isset($devices->device_unit) && $devices->device_unit=="ounce")?"selected":""; ?> value="ounce" >Ounce</option>
								<option <?php echo (isset($devices->device_unit) && $devices->device_unit=="pound")?"selected":""; ?> value="pound" >Pound</option>
								<option <?php echo (isset($devices->device_unit) && $devices->device_unit=="oz")?"selected":""; ?> value="oz" >oz</option>
								<option <?php echo (isset($devices->device_unit) && $devices->device_unit=="kg")?"selected":""; ?> value="kg" >kg</option>
								
							</select>
						  </div>
						</div>
						
						<div class="col-sm-3">
						  <!-- text input -->
						  <div class="form-group">
							<label for="Device-barcode">Weight</label>
							<input type="text" class="form-control" placeholder="" value="<?php echo isset($devices->device_numeric_weight)?$devices->device_numeric_weight:""; ?>"  name="device_numeric_weight" id="device_numeric_weight" >
						  </div>
						</div>
					</div>
					
					<div class="row">	
						<div class="col-sm-3">
						  <!-- text input -->
						  <div class="form-group">
							<label for="Device-barcode">Lenght (in)</label>
							<input type="text" class="form-control" placeholder="" value="<?php echo isset($devices->device_length)?$devices->device_length:""; ?>"  name="device_length" id="device_length" >
						  </div>
						</div>
							
						<div class="col-sm-2">
						  <!-- text input -->
						  <div class="form-group">
							<label for="Device-barcode">Width (in)</label>
							<input type="text" class="form-control" placeholder="" value="<?php echo isset($devices->device_width)?$devices->device_width:""; ?>"  name="device_width" id="device_width" >
						  </div>
						</div>
						
						<div class="col-sm-2">
						  <!-- text input -->
						  <div class="form-group">
							<label for="Device-barcode">Height (in)</label>
							<input type="text" class="form-control" placeholder="" value="<?php echo isset($devices->device_height)?$devices->device_height:""; ?>"  name="device_height" id="device_height" >
						  </div>
						</div>
						
						<div class="col-sm-4">
					<!-- text input -->
							<div class="form-group radio-btn">
								<label></label>
								<input class="form-check-input" type="checkbox" name="not_sure_shape" id="not_sure_shape">
								<label class="form-check-label">Not Sure About Dimension</label>
							</div>
						</div>
					</div>
					
					
					<div class="row">	
						<div class="col-sm-3">
						  <!-- text input -->
						  <div class="form-group">
							<label>Envelope image</label>
								<div class="custom-file">
								  <input type="file" class="custom-file-input"  name="device_image[]" multiple id="device_image">
								  <label class="custom-file-label" for="customFile">Choose file</label>
								 
								</div>
						  </div>
						</div>
						<div class="col-sm-3">
						  <!-- text input -->
						  	<!-- Preview -->
								<div class="gallery"></div>
									<img style="display:none;" id="blah" height="80" width="80"  >

								<div style="display:none;" id="list_device_images" class="form-group col-md-12">
									
								</div>
								
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
					
				</div>
			  
            </div>
            <div class="modal-footer justify">
              <button type="button" class="btn btn-outline-light" id="cancel" data-dismiss="modal">Cancel</button>
              <button id="submit_btn" type="submit" class="btn btn-block btn-primary btn-flat">Create</button>
            </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <!-- Main content -->
    
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
                    
					
					<th>Envelope ID</th>
					<th>Envelope Name</th>
					<th>Envelope BarCode</th>
					<th>Total</th>
					<th>Options</th>
					
                  </tr>
                  </thead>
                  <tbody id="myInput">
				  <?php if(isset($devices) && !empty($devices)) { 
										foreach($devices as $key=>$val) { ?>
                 <tr>
                    
					<td><?php echo isset($val->id)?$val->id:"N/A";?></td>
					<td><?php echo isset($val->device_name)?$val->device_name:"N/A";?></td>
					<td><?php echo isset($val->device_barcode)?$val->device_barcode:"N/A";?></td>
					<td><?php echo isset($val->device_count)?$val->device_count:"N/A";?></td>
					
					
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="javascript:void(0);" onclick="showDeviceDetail('<?php echo $val->id;?>');" class="dropdown-item">View</a>
						  <div class="dropdown-divider"></div>
						  <a href="<?php echo base_url("delete-device/".$val->id)?>" class="dropdown-item">Take Action</a>
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
	
	
	
	
		
$(function(){

  $('#attachments').selectpicker();

});

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img style="margin:5px;" height="80" width="80">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#device_image').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});

			getAttachments();
			$("form#device_infromation").submit(function(e) {
			
			
				e.preventDefault();
				
				$('#success_div').css('display','none');
				$('#error_div').css('display','none');
				
				$("#device_name").css('background','#efefef');
				$("#device_name").css('border-color','#efefef');
				$("#device_name").css('color','#495057');
				$("#device_name").attr('placeholder','');
				
				$("#device_barcode").css('background','#efefef');
				$("#device_barcode").css('border-color','#efefef');
				$("#device_barcode").css('color','#495057');
				$("#device_barcode").attr('placeholder','');
				
				var device_name = $("#device_name").val();
				var device_barcode = $("#device_barcode").val();
				var attachments = $("#attachments").val();
				var device_count = $("#device_count").val();
				var device_category = $("#device_category").val();
				var device_description = $("#device_description").val();
				var device_comments = $("#device_comments").val();
				var device_shape = $("#device_shape").val();
				var device_unit = $("#device_unit").val();
				var device_numeric_weight = $("#device_numeric_weight").val();
				var device_length = $("#device_length").val();
				var device_width = $("#device_width").val();
				var device_height = $("#device_height").val();
				var not_sure_shape = 0;
				if($("#not_sure_shape").is(":checked"))
				{
					not_sure_shape=1;
				}
				
				var device_id = $("#device_id").val();
				if(device_name.length == 0)
				{
					$("#device_name").css('color','#721c24');
					$("#device_name").css('background-color','#f8d7da');
					$("#device_name").css('border-color','#f5c6cb');
					$("#device_name").attr('placeholder','Device name is required');
					$('html, body').animate({
						scrollTop: $("#device_name").offset().top
					}, 1000);

				}
				else if(device_barcode.length == 0)
				{
					
					$("#device_barcode").css('color','#721c24');
					$("#device_barcode").css('background-color','#f8d7da');
					$("#device_barcode").css('border-color','#f5c6cb');
					$("#device_barcode").attr('placeholder','Barcode number is required');
					$('html, body').animate({
						scrollTop: $("#device_barcode").offset().top
					}, 1000);
				}
				else
				{
					var formData = new FormData();
var filedata = document.getElementById('device_image');
 var i = 0, len = filedata.files.length, img, reader, file;

			for (; i < len; i++) {
				file = filedata.files[i];

				if (window.FileReader) {
					reader = new FileReader();
					reader.onloadend = function(e) {
						showUploadedItem(e.target.result, file.fileName);
					};
					reader.readAsDataURL(file);
				}
				formData.append("device_image[]", file);
			}
					//formData.append("device_image", document.getElementsByName('device_image'));
					formData.append("device_name",device_name);
					formData.append("device_barcode",device_barcode);
					formData.append("attachments",attachments);
					formData.append("device_count",device_count);
					formData.append("device_id",device_id);
					formData.append("not_sure_shape",not_sure_shape);
					formData.append("device_category",device_category);
					formData.append("device_description",device_description);
					formData.append("device_comments",device_comments);
					formData.append("device_shape",device_shape);
					formData.append("device_unit",device_unit);
					formData.append("device_numeric_weight",device_numeric_weight);
					formData.append("device_length",device_length);
					formData.append("device_width",device_width);
					formData.append("device_height",device_height);
					
					$.ajax({
						url: '<?php echo base_url('device-submit');?>',
						type: 'POST',
						data: formData,
						success: function (data) {
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
								
								window.location.replace("<?php echo base_url('manage-devices')?>");
							}
						},
						cache: false,
						contentType: false,
						processData: false
					});
					
				
				}
			}); 
			
			
			
			$('#other_att_btn').click(function(){
			
				var other_attachments = $("#other_attachments").val();
				$("#other_attachments").css('background','#efefef');
				$("#other_attachments").css('border-color','#efefef');
				$("#other_attachments").css('color','#495057');
				$("#other_attachments").attr('placeholder','Other Attachments');
			
		
		
				if(other_attachments.length == 0)
				{
					
					$("#other_attachments").css('color','#721c24');
					$("#other_attachments").css('background-color','#f8d7da');
					$("#other_attachments").css('border-color','#f5c6cb');
					$("#other_attachments").attr('placeholder','Attachment Name is required');
					$('html, body').animate({
						scrollTop: $("#other_attachments").offset().top
					}, 1000);
				}
				else
				{
					
				$.post( "<?php echo base_url('other-attachments-submit');?>", { 
				other_attachments: other_attachments})
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
							getAttachments();
							
						}
				  });
				}
			});
	
	
	
	
	});
	
	
	
	
	
	
	

			
			
			
	}
	
	
		function getAttachments()
	{
		$.post( "<?php echo base_url('get-attachments');?>", {})
			  .done(function( data ) {
				
					var obj = jQuery.parseJSON(data);
					//console.log(obj);
					
					var attachments = obj.attachments;
					var userAtt = [<?php echo isset($attachments)?$attachments:'';?>];
					
					if(!jQuery.isEmptyObject(attachments))
					{
						$("#attachments").empty();
						$("#attachments").append('<option value="0">None</option>');
						$.each(attachments, function( index, value ) {
							//console.log(userAtt);
							if(checkValue(value.id,userAtt))
							{
								$("#attachments").append('<option selected value=' + value.id + '>' + value.name + '</option>');
							}
							else
							{
								$("#attachments").append('<option value=' + value.id + '>' + value.name + '</option>');
							}
						  

						});
						$('#attachments').selectpicker('refresh');
					}
			  });
	}

	function showDeviceDetail(device_id)
	{
		clearForm();
		$.post( "<?php echo base_url('get-device-detail');?>", {device_id:device_id})
			  .done(function( data ) {
				
					var obj = jQuery.parseJSON(data);
					//console.log(obj);
					
					var attachments = obj.device_attachments_data;
					var device_data = obj.device_data;
					var device_images = obj.device_images_data;
					
					$('#device_category').val(device_data.device_category);
					$('#device_hidden_id').val(device_data.id);
					$('#device_id').val(device_data.id);
					$('#device_name').val(device_data.device_name);
					$('#device_barcode').val(device_data.device_barcode);
					$('#device_count').val(device_data.device_count);
					$('#device_description').val(device_data.device_description);
					$('#device_comments').val(device_data.device_comments);
					$('#device_shape').val(device_data.device_shape);
					$('#device_unit').val(device_data.device_unit);
					$('#device_numeric_weight').val(device_data.device_numeric_weight);
					$('#device_length').val(device_data.device_length);
					$('#device_height').val(device_data.device_height);
					$('#device_width').val(device_data.device_width);
					$('#submit_btn').html("Update");
					
					if(device_data.not_sure_shape && device_data.not_sure_shape==1)
					{
						        $("#not_sure_shape").prop("checked", true);

					}
					else
					{
						$("#not_sure_shape").prop("checked", false);
					}
					
					if(!jQuery.isEmptyObject(attachments))
					{
						var selectedAttachments = [];
						$.each(attachments, function( index, value ) {
							//console.log(userAtt);
							console.log(value);
							
							selectedAttachments.push(value.id);
							/*if(checkValue(value.id,userAtt))
							{
								.append('<option selected value=' + value.id + '>' + value.name + '</option>');
							}
							else
							{
								$("#attachments").append('<option value=' + value.id + '>' + value.name + '</option>');
							}*/
						 

						});
						 $('#attachments').selectpicker('val', selectedAttachments); 
						$('#attachments').selectpicker('refresh');
					}
					if(!jQuery.isEmptyObject(device_images))
					{
						$('#list_device_images').html("");
						var html_images="";
						$.each(device_images, function( index, value ) {
							//console.log(userAtt);
							console.log(value);
							html_images+='<img style="margin:5px;" height="80" width="80" src="<?php echo DEVICE_IMAGES;?>'+value.device_image+'" >';
						});
												$('#list_device_images').html(html_images);
												$('#list_device_images').css('display','block');
												

					}
					else
					{
						$('#list_device_images').css('display','none');
					}
			  });
			  		$('#modal-primary').modal('toggle');

	}
   
   
function checkValue(value,arr){
  var status = 'Not exist';
 
  for(var i=0; i<arr.length; i++){
    var name = arr[i];
    if(name == value){
      return true;
    }
  }
return false;
}

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200)
                    .css('display','block');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
	
	function clearForm()
	{
		$('#device_id').val('');
		$('#device_hidden_id').val('');
		$('#device_category').val('');
		$('#device_name').val('');
		$('#device_barcode').val('');
		$('#attachments').val('');
		$('#other_attachments').val('');
		$('#device_count').val('');
		$('#device_description').val('');
		$('#device_comments').val('');
		$('#device_shape').val('Package');
		$('#device_unit').val('ounce');
		$('#device_numeric_weight').val('');
		$('#device_length').val('');
		$('#device_width').val('');
		$('#device_height').val('');
		$('#list_device_images').html('');
		$('#submit_btn').html('Create');
		$('#list_device_images').css('display','none');
		$("#not_sure_shape").prop("checked", false);

								$('#attachments').selectpicker('refresh');

	}
	
	</script>
	
