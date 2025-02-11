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
            <h1 class="m-0">Users List</h1>
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
      <div class="modal fade" id="modal-primary">
          <div class="modal-dialog">
              <div class="modal-content bg-white">
                  <div class="modal-header">
                      <h4 class="modal-title">Update User Information</h4>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form id="user_information"  role="form" method="post"   enctype="multipart/form-data" name="form">
                          <div class="row">
                              <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                      <input type="hidden" id="user_id" value="" />

                                      <label for="Department-name">User ID</label>
                                      <input type="text" class="form-control" placeholder=""  id="user_hidden_id" name="user_hidden_id">
                                  </div>
                              </div>


                              <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                      <label for="first_name">First Name</label>
                                      <input type="text" class="form-control" placeholder=""  id="first_name" name="first_name">
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                      <label for="Last_name">Last Name</label>
                                      <input type="text" class="form-control" placeholder=""  id="last_name" name="last_name">
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                      <label for="user_email">Email</label>
                                      <input type="email" class="form-control" placeholder=""  id="user_email" name="user_email">
                                  </div>
                              </div>

                          </div>
                          <div class="row">

                              <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                      <label for="address_line_1">Address line 1</label>
                                      <textarea type="text" class="form-control" placeholder=""  id="address_line_1" name="address_line_1"></textarea>
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                      <label for="address_line_2">Address line 2</label>
                                      <textarea type="text" class="form-control" placeholder=""  id="address_line_2" name="address_line_2"></textarea>
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                      <label for="state">State</label>
                                      <input type="text" class="form-control" placeholder=""  id="state" name="state">
                                  </div>
                              </div>

                          </div>
                          <div class="row">

                              <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                      <label for="card_info">Card Info</label>
                                      <input type="text" class="form-control" placeholder=""  id="card_info" name="card_info">
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                      <label for="postal_code">Postal Code</label>
                                      <input type="text" class="form-control" placeholder=""  id="postal_code" name="postal_code">
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                      <label for="city">City</label>
                                      <input type="text" class="form-control" placeholder=""  id="city" name="city">
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                      <label for="phone_number">Phone Number</label>
                                      <input type="text" class="form-control" placeholder=""  id="phone_number" name="phone_number">
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
					<th>Name</th>
					<th>Email</th>

					<th>Address Line 1</th>
					<th>Address Line 2</th>
					<th>State</th>
					<th>Card Info</th>
					<th>Postal Code</th>
					<th>City</th>
					<th>Phone Number</th>
					<th>Trial Ends At</th>
					<th>Created At</th>
					<th>Options</th>
					
                  </tr>
                  </thead>
                  <tbody id="myInput">
				  <?php if(isset($users) && !empty($users)) {
										foreach($users as $key=>$val) { ?>
                 <tr>
                    
					<td><?php echo isset($val->id)?$val->id:"N/A";?></td>
					<td><?php echo isset($val->first_name)?$val->first_name:($val->name?$val->name:"N/A");?></td>
					<td><?php echo isset($val->email)?$val->email:"N/A";?></td>
                     <td><?php echo (isset($val->address_line_1))?$val->address_line_1:"N/A";?></td>
                     <td><?php echo (isset($val->address_line_2))?$val->address_line_2:"N/A";?></td>
                     <td><?php echo (isset($val->state))?$val->state:"N/A";?></td>
                     <td><?php echo (isset($val->card_info))?$val->card_info:"N/A";?></td>
                     <td><?php echo (isset($val->postal_code))?$val->postal_code:"N/A";?></td>
                     <td><?php echo (isset($val->city))?$val->city:"N/A";?></td>
                     <td><?php echo (isset($val->phone_number))?$val->phone_number:"N/A";?></td>
                     <td><?php echo (isset($val->trial_ends_at))?$val->trial_ends_at:"N/A";?></td>

                     <td><?php echo isset($val->created_at)?$val->created_at:"N/A";?></td>

					
					<td class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#">
						  <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						  
						  <a href="javascript:void(0);" onclick="showDeviceDetail('<?php echo $val->id;?>');" class="dropdown-item">View</a>
						  <div class="dropdown-divider"></div>
						  <a href="<?php echo base_url("delete-users/".$val->id)?>" class="dropdown-item">Take Action</a>
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

            $("form#user_information").submit(function(e) {


                e.preventDefault();

                $('#success_div').css('display','none');
                $('#error_div').css('display','none');

                $("#user_hidden_id").css('background','#efefef');
                $("#first_name").css('border-color','#efefef');
                $("#last_name").css('border-color','#efefef');
                $("#user_email").css('border-color','#efefef');
                $("#address_line_1").css('border-color','#efefef');
                $("#address_line_2").css('border-color','#efefef');
                $("#state").css('border-color','#efefef');
                $("#card_info").css('border-color','#efefef');
                $("#postal_code").css('border-color','#efefef');
                $("#city").css('border-color','#efefef');
                $("#phone_number").css('border-color','#efefef');

                var user_hidden_id = $("#user_hidden_id").val();
                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var user_email = $("#user_email").val();
                var address_line_1 = $("#address_line_1").val();
                var address_line_2 = $("#address_line_2").val();
                var state = $("#state").val();
                var card_info = $("#card_info").val();
                var postal_code = $("#postal_code").val();
                var city = $("#city").val();
                var phone_number = $("#phone_number").val();
                if(first_name.length == 0)
                {
                    $("#first_name").css('color','#721c24');
                    $("#first_name").css('background-color','#f8d7da');
                    $("#first_name").css('border-color','#f5c6cb');
                    $("#first_name").attr('placeholder','First name is required');
                    $('html, body').animate({
                        scrollTop: $("#first_name").offset().top
                    }, 1000);

                }
                else if(last_name.length == 0)
                {
                    $("#last_name").css('color','#721c24');
                    $("#last_name").css('background-color','#f8d7da');
                    $("#last_name").css('border-color','#f5c6cb');
                    $("#last_name").attr('placeholder','Last name is required');
                    $('html, body').animate({
                        scrollTop: $("#first_name").offset().top
                    }, 1000);

                }
                else if(user_email.length == 0)
                {
                    $("#user_email").css('color','#721c24');
                    $("#user_email").css('background-color','#f8d7da');
                    $("#user_email").css('border-color','#f5c6cb');
                    $("#user_email").attr('placeholder','Email is required');
                    $('html, body').animate({
                        scrollTop: $("#first_name").offset().top
                    }, 1000);

                }
                else
                {
                    var formData = new FormData();
                    //formData.append("device_image", document.getElementsByName('device_image'));
                    formData.append("first_name",first_name);
                    formData.append("last_name",last_name);
                    formData.append("user_email",user_email);
                    formData.append("address_line_1",address_line_1);
                    formData.append("address_line_2",address_line_2);
                    formData.append("state",state);
                    formData.append("card_info",card_info);
                    formData.append("postal_code",postal_code);
                    formData.append("city",city);
                    formData.append("phone_number",phone_number);
                    formData.append("user_hidden_id",user_hidden_id);

                    $.ajax({
                        url: '<?php echo base_url('user-submit');?>',
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

                                window.location.replace("<?php echo base_url('manage-users')?>");
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
    function showDeviceDetail(user_id)
    {
        clearForm();
        $.post( "<?php echo base_url('get-user-detail');?>", {user_id:user_id})
            .done(function( data ) {

                var obj = jQuery.parseJSON(data);
                //console.log(obj);

                var user_data = obj.data;
                $('#user_hidden_id').val(user_data.id);
                $('#first_name').val(user_data.first_name);
                $('#last_name').val(user_data.last_name);
                $('#user_email').val(user_data.email);
                $('#address_line_1').val(user_data.address_line_1);
                $('#address_line_2').val(user_data.address_line_2);
                $('#state').val(user_data.state);
                $('#card_info').val(user_data.card_info);
                $('#postal_code').val(user_data.postal_code);
                $('#city').val(user_data.city);
                $('#phone_number').val(user_data.phone_number);
                $('#submit_btn').html("Update");

            });
        $('#modal-primary').modal('toggle');

    }
    function clearForm()
    {
        $('#user_id').val('');
        $('#user_hidden_id').val('');
        $('#first_name').val('');
        $('#last_name').val('');
        $('#user_email').val('');
    }


                </script>
	
