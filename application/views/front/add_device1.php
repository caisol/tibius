
	<!-- Breadcrumb -->
				<!-- Page Title -->
				<div class="container mt-0">
					<div class="row breadcrumb-bar">
						<div class="col-md-6">
							<h3 class="block-title">Add Device</h3>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.html">
										<span class="ti-home"></span>
									</a>
								</li>
								<li class="breadcrumb-item">Devices</li>
								<li class="breadcrumb-item active">Add Device</li>
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
							<form id="device_infromation" role="form" method="post"   enctype="multipart/form-data"  >
								<div class="form-row">
									<input type="hidden" id="device_id" value="<?php echo isset($devices->id)?$devices->id:0; ?>" />
									<div class="form-group col-md-6">
										<label for="Device-name">Device Name</label>
										<input type="text" class="form-control" placeholder="Device name" value="<?php echo isset($devices->device_name)?$devices->device_name:""; ?>" id="device_name" name="device_name">
									</div>
									<div class="form-group col-md-6">
										<label for="Device-barcode">Device  Barcode</label>
										<input type="text" class="form-control" placeholder="Device  Barcode" value="<?php echo isset($devices->device_barcode)?$devices->device_barcode:""; ?>"  name="device_barcode" id="device_barcode" >
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
										<input type="text" class="form-control" placeholder="Other  Attachments" value=""  name="other_attachments" id="other_attachments" >
										
									</div>
									<div style="margin-top: 32px !important;" class="form-group col-md-3">
									
										<button  id="other_att_btn" type="button" class="btn form-control btn-primary btn-lg">Add</button>
									</div>
									
									<div class="form-group col-md-6">
										<label for="device_count">Device count</label>
										<input type="text" placeholder="Count" class="form-control" value="<?php echo isset($devices->device_count)?$devices->device_count:""; ?>" id="device_count" name="device_count">
									</div>
									
									<div class="form-group col-md-6">
										<label for="device_shape">Device Shape</label>
										<select  name="device_shape" class="form-control" id="device_shape" >
											<option value="" >Select Shape</option>
											<option value="Package" >Package</option>
											<option value="Large Envelope" >Large Envelope</option>
											<option value="Letter" >Letter</option>
											<option value="Post Card" >Post Card</option>
											
										</select>
										
										

									</div>
									
									
									<div class="form-group col-md-6">
										<label for="device_image">Device Image</label>
										<input type="file" class="form-control" id="device_image">
									</div>
									<?php if(isset($devices->device_image) && $devices->device_image!="") { ?>
									<div class="form-group col-md-6">
										<img height="80" width="80" src="<?php echo isset($devices->device_image)?DEVICE_IMAGES.$devices->device_image:""; ?>" >

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
									
									
									<div class="form-group col-md-12 mb-3">
										<button id="submit_btn" type="submit" class="btn btn-primary btn-lg">Submit</button>
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

			getAttachments();
			$("form#device_infromation").submit(function(e) {
			
				e.preventDefault();
				
				$('#success_div').css('display','none');
				$('#error_div').css('display','none');
				
				$("#device_name").css('background','#efefef');
				$("#device_name").css('border-color','#efefef');
				$("#device_name").css('color','#495057');
				$("#device_name").attr('placeholder','First name');
				
				$("#device_barcode").css('background','#efefef');
				$("#device_barcode").css('border-color','#efefef');
				$("#device_barcode").css('color','#495057');
				$("#device_barcode").attr('placeholder','Phone number');
				
				var device_name = $("#device_name").val();
				var device_barcode = $("#device_barcode").val();
				var attachments = $("#attachments").val();
				var device_count = $("#device_count").val();
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

					formData.append("device_image", document.getElementById('device_image').files[0]);
					formData.append("device_name",device_name);
					formData.append("device_barcode",device_barcode);
					formData.append("attachments",attachments);
					formData.append("device_count",device_count);
					formData.append("device_id",device_id);
					
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

	</script>