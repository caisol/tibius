<link rel="stylesheet" href="<?php echo FRONT_PLUGINS_V2; ?>datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo FRONT_PLUGINS_V2; ?>datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo FRONT_PLUGINS_V2; ?>datatables-buttons/css/buttons.bootstrap4.min.css">
  
<link rel="stylesheet" href="<?php echo FRONT_CSS_V2; ?>bootstrap-select.css" />
<style>
    /* Basic styles for the modal */
    .popup-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 100;
    }

    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 50%;
        height: 80%;
        background-color: white;
        border: 2px solid #ddd;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        z-index: 1001;
    }

    .popup iframe {
        width: 100%;
        height: 100%;
    }

    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>
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
                    
					
					<th>Record ID</th>
					<th>Document Recipient Status</th>
					<th>Envelope User</th>
					<th>Document Name</th>
					<th>File Path</th>
					<th>Recipient Email</th>
					<th>Envelope Name</th>
					<th>Status</th>
					<th>Options</th>
					
                  </tr>
                  </thead>
                  <tbody id="myInput">
				  <?php if(isset($envelopes) && !empty($envelopes)) {
										foreach($envelopes as $key=>$val) { ?>
                 <tr>
                    
					<td><?php echo isset($val->dr_id)?$val->dr_id:"N/A";?></td>
					<td><?php echo isset($val->dr_status)?$val->dr_status:"N/A";?></td>
					<td><?php echo isset($val->email)?$val->email:"N/A";?></td>
					<td><?php echo isset($val->document_name)?$val->document_name:"N/A";?></td>
					<td ><a href="javascript:void(0)" onclick="openModal('<?php echo isset($val->file_path)?$val->file_path:"";?>')" ><?php echo isset($val->file_path)?"View":"--";?></a></td>
					<td><?php echo isset($val->recipient_email)?$val->recipient_email:"N/A";?></td>
					<td><?php echo isset($val->env_name)?$val->env_name:"N/A";?></td>
					<td><?php echo isset($val->recipient_status)?$val->recipient_status:"N/A";?></td>

					
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="<?php echo base_url("recipient-documents/".$val->env_id)?>" class="dropdown-item">View Recipients</a>
						  <div class="dropdown-divider"></div>
						  <!--<a href="<?php echo base_url("delete-envelopes/".$val->env_id)?>" class="dropdown-item">Take Action</a>-->
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
<!-- Modal and overlay -->
<div class="popup-overlay" id="popup-overlay"></div>
<div class="popup" id="popup">
    <iframe id="pdf-iframe" src="" frameborder="0"></iframe>
    <button onclick="closeModal()">Close</button>
</div>
	
				<script>
                    function openModal(path) {
                        if(path!="")
                        {
                            const overlay = document.getElementById("popup-overlay");
                            const popup = document.getElementById("popup");
                            const iframe = document.getElementById("pdf-iframe");

                            // Show the overlay and popup
                            overlay.style.display = "block";
                            popup.style.display = "block";

                            // Set the source URL for the PDF
                            iframe.src = path;  // Replace with your PDF URL
                        }
                    }
                    // Close the popup
                    function closeModal() {
                        const overlay = document.getElementById("popup-overlay");
                        const popup = document.getElementById("popup");
                        const iframe = document.getElementById("pdf-iframe");

                        // Hide the overlay and popup
                        overlay.style.display = "none";
                        popup.style.display = "none";

                        // Reset iframe source to stop loading PDF after closing
                        iframe.src = "";
                    }
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
	
