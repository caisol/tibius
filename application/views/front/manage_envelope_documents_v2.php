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
            <h1 class="m-0">Envelope Documents List</h1>
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
					<th>Envelope User</th>
					<th>Status</th>
					<th>Options</th>
					
                  </tr>
                  </thead>
                  <tbody id="myInput">
				  <?php if(isset($envelopes) && !empty($envelopes)) {
										foreach($envelopes as $key=>$val) { ?>
                 <tr>
                    
					<td><?php echo isset($val->env_id)?$val->env_id:"N/A";?></td>
					<td><?php echo isset($val->env_name)?$val->env_name:"N/A";?></td>
					<td><?php echo isset($val->email)?$val->email:"N/A";?></td>
					<td><?php echo isset($val->env_status)?$val->env_status:"N/A";?></td>
					
					
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="<?php echo base_url("recipient-documents/".$val->env_id)?>" class="dropdown-item">View Recipients Document</a>
						  <div class="dropdown-divider"></div>
						  <a href="<?php echo base_url("delete-envelopes/".$val->env_id)?>" class="dropdown-item">Take Action</a>
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
	
