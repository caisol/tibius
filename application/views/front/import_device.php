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
            <h1 class="m-0">Import Devices</h1>
          </div><!-- /.col -->
          
		 
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
    <!-- /.content -->
	
	<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
		
     <!-- /.login-logo -->
  <div class="card card-outline">
    
    <div class="card-body">
      <label for="device_file2"><a href="<?php echo DEVICE_SAMLE_FILE;?>sample.xlsx" download>Samle file</a></label>

      <form id="device_infromation"  role="form" method="post"   enctype="multipart/form-data" >
								<div class="row">
								<div class="col-sm-3">
									  <!-- text input -->
									  <div class="form-group">
										<label for="device_file">Device File xls</label>
										<input type="file" class="form-control"  name="device_file"  id="device_file">
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
									<!--<button type="button" class="btn btn-outline-light"  onclick="window.location.href='<?php echo base_url('manage-devices');?>'">Cancel</button>-->
              <button id="submit_btn" type="submit" class="btn btn-block btn-primary">Import</button>
            
									
								</div>
								
       
       
      </form>

      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card --></div>	
	</section>
  </div>
  <!-- /.content-wrapper -->

		<script>
	submitSignupForm();
	function  submitSignupForm()
	{
		 


		 
		document.addEventListener("DOMContentLoaded", function(event) {


			$("form#device_infromation").submit(function(e) {
			
			
				e.preventDefault();
				
				$('#success_div').css('display','none');
				$('#error_div').css('display','none');
				{
					var formData = new FormData();
var filedata = document.getElementById('device_file');
 var i = 0, len = filedata.files.length, img, reader, file;

			for (; i < len; i++) {
				file = filedata.files[i];

				
				formData.append("device_file", file);
			}
					
					$.ajax({
						url: '<?php echo base_url('device-submit-import');?>',
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
	