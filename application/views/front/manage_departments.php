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
            <h1 class="m-0">Departments List</h1>
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
			<button type="button" class="btn btn-primary" onclick="clearForm();" data-toggle="modal" data-target="#modal-primary" >+ Add Department</button>
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
              <h4 class="modal-title">Add Department</h4>
			  
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="department_information"  role="form" method="post"   enctype="multipart/form-data" name="form">
				<div class="row">
				<div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
						<input type="hidden" id="department_id" value="<?php echo isset($department->id)?$devices->id:0; ?>" />

                        <label for="Department-name">Department ID</label>
						<input type="text" class="form-control" placeholder=""  id="department_hidden_id" name="department_hidden_id">
                      </div>
                </div>
				
				
				<div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="Department-name">Department Name</label>
						<input type="text" class="form-control" placeholder="" value="<?php echo isset($department->department_name)?$department->department_name:""; ?>" id="department_name" name="department_name">
                      </div>
                </div>
				
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
                    
					
					<th>ID</th>
					<th>Department ID</th>
					<th>Department Name</th>
					<th>Options</th>
					
                  </tr>
                  </thead>
                  <tbody id="myInput">
				  <?php if(isset($departments) && !empty($departments)) { 
										foreach($departments as $key=>$val) { ?>
                 <tr>
                    
					<td><?php echo isset($val->id)?$val->id:"N/A";?></td>
					<td><?php echo isset($val->department_id)?$val->department_id:"N/A";?></td>
					<td><?php echo isset($val->department_name)?$val->department_name:"N/A";?></td>
					
					
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="javascript:void(0);" onclick="showDeviceDetail('<?php echo $val->id;?>');" class="dropdown-item">View</a>
						  <div class="dropdown-divider"></div>
						  <a href="<?php echo base_url("delete-department/".$val->id)?>" class="dropdown-item">Take Action</a>
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
	
	


			getAttachments();
			$("form#department_information").submit(function(e) {
			
			
				e.preventDefault();
				
				$('#success_div').css('display','none');
				$('#error_div').css('display','none');
				
				$("#department_hidden_id").css('background','#efefef');
				$("#department_name").css('border-color','#efefef');
				
				var department_hidden_id = $("#department_hidden_id").val();
				var department_name = $("#department_name").val();
				var department_id = $("#department_id").val();
				if(department_name.length == 0)
				{
					$("#department_name").css('color','#721c24');
					$("#department_name").css('background-color','#f8d7da');
					$("#department_name").css('border-color','#f5c6cb');
					$("#department_name").attr('placeholder','Department name is required');
					$('html, body').animate({
						scrollTop: $("#department_name").offset().top
					}, 1000);

				}
				else
				{
					var formData = new FormData();
					//formData.append("device_image", document.getElementsByName('device_image'));
					formData.append("department_name",department_name);
					formData.append("department_hidden_id",department_hidden_id);
					formData.append("department_id",department_id);
					
					$.ajax({
						url: '<?php echo base_url('department-submit');?>',
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
								
								window.location.replace("<?php echo base_url('manage-departments')?>");
							}
						},
						cache: false,
						contentType: false,
						processData: false
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

	function showDeviceDetail(department_id)
	{
		clearForm();
		$.post( "<?php echo base_url('get-department-detail');?>", {department_id:department_id})
			  .done(function( data ) {
				
					var obj = jQuery.parseJSON(data);
					//console.log(obj);
					
					var department_data = obj.data;
					
					$('#department_hidden_id').val(department_data.department_id);
					$('#department_name').val(department_data.department_name);
					$('#department_id').val(department_data.id);
					$('#submit_btn').html("Update");
					
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
		$('#department_id').val('');
		$('#department_hidden_id').val('');
		$('#department_name').val('');
	}
	
	</script>
	
