
	<!-- Breadcrumb -->
				<!-- Page Title -->
				<div class="container mt-0">
					<div class="row breadcrumb-bar">
						<div class="col-md-6">
							<h3 class="block-title"><?php echo (isset($devices->id) && $devices->id>0)?"View Device":"Add Device"; ; ?></h3>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="<?php echo base_url("");?>">
										<span class="ti-home"></span>
									</a>
								</li>
								<li class="breadcrumb-item">Devices</li>
								<li class="breadcrumb-item active"><?php echo (isset($devices->id) && $devices->id>0)?"View Device":"Add Device"; ; ?></li>
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
							<h3 class="widget-title">Add Device</h3>
							<form id="device_infromation"  role="form" method="post"   enctype="multipart/form-data"  >
								<div class="form-row">
									<div class="form-group col-md-2">
										<input type="hidden" id="device_id" value="<?php echo isset($devices->id)?$devices->id:0; ?>" />

										<label for="Device-name">Device ID</label>
										<input type="text" class="form-control" placeholder="" disabled value="<?php echo isset($devices->id)?$devices->id:""; ?>" id="device_id" name="device_id">
									</div>
									<div class="form-group col-md-3">
										<label for="attachments">Device Category</label>
										<select  name="device_category" class="form-control" id="device_category" >
											<option <?php echo (isset($devices->device_category) && $devices->device_category=="")?"selected":""; ?> value="" >Select Device Category</option>
											<option <?php echo (isset($devices->device_category) && $devices->device_category=="Basic surgical")?"selected":""; ?>  value="Basic surgical" >Basic surgical operation instuments </option>
											<option <?php echo (isset($devices->device_category) && $devices->device_category=="Neurological")?"selected":""; ?>  value="Neurological" >Neurological surgical instruments</option>
											<option <?php echo (isset($devices->device_category) && $devices->device_category=="Ophthalmic")?"selected":""; ?>  value="Ophthalmic" >Ophthalmic surgical instruments</option>
											<option <?php echo (isset($devices->device_category) && $devices->device_category=="Remote Patient Monitoring")?"selected":""; ?>  value="Remote Patient Monitoring" >Remote Patient Monitoring</option>
											<option <?php echo (isset($devices->device_category) && $devices->device_category=="Others")?"selected":""; ?>  value="Others" >Others</option>
										</select>
										
										

									</div>
									<div class="form-group col-md-4">
										<label for="Device-name">Device Name</label>
										<input type="text" class="form-control" placeholder="" value="<?php echo isset($devices->device_name)?$devices->device_name:""; ?>" id="device_name" name="device_name">
									</div>
									<div class="form-group col-md-3">
										<label for="Device-barcode">Device  Barcode</label>
										<input type="text" class="form-control" placeholder="" value="<?php echo isset($devices->device_barcode)?$devices->device_barcode:""; ?>"  name="device_barcode" id="device_barcode" >
									</div>
									
                                    
									<div class="form-group col-md-6">
										<label for="attachments">Device Attachments</label>
										<select multiple="" name="attachments[]" class="form-control" id="attachments" >
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
									<div class="form-group col-md-3">
										<label for="Device-barcode">Other  Attachments</label>
										<input type="text" class="form-control" placeholder="" value=""  name="other_attachments" id="other_attachments" >
										
									</div>
									<div style="margin-top: 32px !important;" class="form-group col-md-3">
									
										<button  id="other_att_btn" type="button" class="btn form-control btn-primary btn-lg">Add</button>
									</div>
									
									<div class="form-group col-md-2">
										<label for="device_count">Device count</label>
										<input type="text" placeholder="" class="form-control" value="<?php echo isset($devices->device_count)?$devices->device_count:""; ?>" id="device_count" name="device_count">
									</div>
									
									<div class="form-group col-md-5">
										<label for="device_count">Device Description</label>
										<textarea placeholder="" class="form-control" id="device_description" rows="3"><?php echo isset($devices->device_description)?$devices->device_description:""; ?></textarea>
									</div>
									
									<div class="form-group col-md-5">
										<label for="device_count">Special Instructions</label>
										<textarea placeholder="" class="form-control" id="device_comments" rows="3"><?php echo isset($devices->device_comments)?$devices->device_comments:""; ?></textarea>
									</div>
								</div>
									
								<h4 class="">Shipping Details</h4>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label for="device_shape">Package Type</label>
										<select  name="device_shape" class="form-control" id="device_shape" >
											<option <?php echo (isset($devices->device_shape) && $devices->device_shape=="")?"selected":""; ?> value="" >Select Shape</option>
											<option <?php echo (isset($devices->device_shape) && $devices->device_shape=="Package")?"selected":""; ?> selected value="Package" >Package</option>
											<option <?php echo (isset($devices->device_shape) && $devices->device_shape=="Large Envelope")?"selected":""; ?> value="Large Envelope" >Large Envelope</option>
											<option <?php echo (isset($devices->device_shape) && $devices->device_shape=="Letter")?"selected":""; ?> value="Letter" >Letter</option>
											<option <?php echo (isset($devices->device_shape) && $devices->device_shape=="Post Card")?"selected":""; ?> value="Post Card" >Post Card</option>
											
										</select>
										
										

									</div>
									
									<div class="form-group col-md-4">
										<label for="device_shape">Weight Unit</label>
										<select  name="device_shape" class="form-control" id="device_unit" >
											<option <?php echo (isset($devices->device_unit) && $devices->device_unit=="Post Card")?"selected":""; ?> value="" >Select Unit</option>
											<option <?php echo (isset($devices->device_unit) && $devices->device_unit=="ounce")?"selected":""; ?> value="ounce" >Ounce</option>
											<option <?php echo (isset($devices->device_unit) && $devices->device_unit=="pound")?"selected":""; ?> value="pound" >Pound</option>
											<option <?php echo (isset($devices->device_unit) && $devices->device_unit=="oz")?"selected":""; ?> value="oz" >oz</option>
											<option <?php echo (isset($devices->device_unit) && $devices->device_unit=="kg")?"selected":""; ?> value="kg" >kg</option>
											
										</select>
										
										

									</div>
									<div class="form-group col-md-4">
										<label for="Device-barcode">Weight</label>
										<input type="text" class="form-control" placeholder="" value="<?php echo isset($devices->device_numeric_weight)?$devices->device_numeric_weight:""; ?>"  name="device_numeric_weight" id="device_numeric_weight" >
									</div>
									
									<div class="form-group col-md-4">
										<label for="Device-barcode">Lenght (in)</label>
										<input type="text" class="form-control" placeholder="" value="<?php echo isset($devices->device_length)?$devices->device_length:""; ?>"  name="device_length" id="device_length" >
									</div>
									
									<div class="form-group col-md-4">
										<label for="Device-barcode">Width (in)</label>
										<input type="text" class="form-control" placeholder="" value="<?php echo isset($devices->device_width)?$devices->device_width:""; ?>"  name="device_width" id="device_width" >
									</div>
									
									<div class="form-group col-md-4">
										<label for="Device-barcode">Height (in)</label>
										<input type="text" class="form-control" placeholder="" value="<?php echo isset($devices->device_height)?$devices->device_height:""; ?>"  name="device_height" id="device_height" >
									</div>
									
									<div  class="text-left"><div class="custom-control custom-checkbox"><input class="custom-control-input" <?php echo (isset($devices->not_sure_shape) && $devices->not_sure_shape==1)?"checked":""; ?> type="checkbox" id="not_sure_shape"><label class="custom-control-label" for="not_sure_shape">Not Sure About Dimentions</label></div></div>
									
									
									
								</div>
									
									
									<div class="form-group col-md-6">
										<label for="device_image">Device Image</label>
										<input type="file" class="form-control"  name="device_image[]" multiple id="device_image">
									</div>
									<div class="form-group col-md-6">
									<!-- Preview -->
									<div class="gallery"></div>
										<img style="display:none;" id="blah" height="80" width="80"  >

									</div>
									<?php if(isset($imagesReturn) && !empty($imagesReturn)){
									?>
									<div class="form-group col-md-6">
										<?php 
										foreach($imagesReturn as $key=>$val)
										{ 
										?>
										<img height="80" width="80" src="<?php echo isset($val->device_image)?DEVICE_IMAGES.$val->device_image:""; ?>" >
										<?php } ?>
									</div>
									<?php } ?>
									
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
										
										<button type="button" onclick="window.location.href='<?php echo base_url('manage-devices');?>'" class="btn-lg btn-danger ">Cancel</button>
									</div>
									<div class="form-group col-md-6" style="text-align: right !important;">
										
										<button id="submit_btn" type="submit" class="btn-primary  btn-lg "><?php echo (isset($device_id) && $device_id>0)?"  Update  ":"  Create  ";?></button>
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
$(function(){

  $('#attachments').select2();

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
					}
			  });
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

	</script>
	