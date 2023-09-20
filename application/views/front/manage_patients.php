<style>
input.form-control{
	padding: .5rem 8rem !important;
}
</style>
<!-- Breadcrumb -->
				<!-- Page Title -->
				<div class="container mt-0">
					<div class="row breadcrumb-bar">
						<div class="col-md-6">
							<h3 class="block-title">Patients</h3>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="<?php echo base_url("");?>">
										<span class="ti-home"></span>
									</a>
								</li>
								<li class="breadcrumb-item">Patients</li>
								<li class="breadcrumb-item active">All Patients</li>
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
							<h3 class="widget-title">Patients List</h3>							
							<div class="table-responsive mb-3">
								<table id="tableId" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th class="no-sort">
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="select-all">
													<label class="custom-control-label" for="select-all"></label>
												</div>
											</th>
											<th>Patient ID</th>
											<th>Patient Name</th>
											<th>Parent's Name</th>
											<th>Phone Number</th>
											<th>Email Address</th>
											<th>Options</th>
											
										</tr>
									</thead>
									<tbody>
										<?php if(isset($patients) && !empty($patients)) { 
										foreach($patients as $key=>$val) { ?>
										<tr>
											<td>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="<?php echo isset($val->id)?$val->id:1;?>">
													<label class="custom-control-label" for="1"></label>
												</div>
											</td>
											<td><?php echo isset($val->id)?$val->id:"N/A";?></td>
											<td><?php echo isset($val->first_name)?$val->first_name." ".$val->middle_name." ".$val->last_name:"N/A";?></td>
											<td><?php echo isset($val->gfirst_name)?$val->gfirst_name." ".$val->gmiddle_name." ".$val->glast_name:"N/A";?></td>
											<td><?php echo isset($val->phone_number)?$val->phone_number:"N/A";?></td>
											<td><?php echo isset($val->gemail)?$val->gemail:"N/A";?></td>
											<td>
												<ul class="pagination justify-content-center export-pagination">
												<li class="page-item">
													<a class="page-link" href="<?php echo base_url("edit-patient/".$val->id)?>"><span class="ti-pencil-alt"></span> View</a>
												</li>
												<li class="page-item">
													<a class="page-link" href="<?php echo base_url("delete-patient/".$val->id)?>">  Take Action</a>
												</li>
												
											</ul>
											</td>
										</tr>
										<?php } } ?>
									</tbody>
								</table>
								<!--Export links-->
								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center export-pagination">
										<li class="page-item">
											<a class="page-link" href="#"><span class="ti-download"></span> csv</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#"><span class="ti-printer"></span>  print</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#"><span class="ti-file"></span> PDF</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#"><span class="ti-align-justify"></span> Excel</a>
										</li>
									</ul>
								</nav>
								<!-- /Export links-->
								<!--<button type="button" class="btn btn-danger mt-3 mb-0"><span class="ti-trash"></span> DELETE</button>
								<button type="button" class="btn btn-primary mt-3 mb-0"><span class="ti-pencil-alt"></span> EDIT</button>-->
							</div>
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
	</script>
	
