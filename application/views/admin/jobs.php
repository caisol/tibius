<?php
$this->load->view($side_bar);
?>
<link rel="stylesheet" href="<?php echo FRONT_D_CSS?>V3bootstrap.min.css">
<link rel="stylesheet" href="<?php echo FRONT_D_JS?>bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css"> 
	<link rel="stylesheet" href="<?php echo FRONT_D_JS?>tagsinput/app.css"> 
	
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Jobs Managment</h3>
            </div>
			<?php if(isset($type) && $type == 1){?>
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Job information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="jobs_form" role="form" method="post" enctype="multipart/form-data" >
              <div class="box-body">
				<input type="hidden" id="job_id" name="job_id" value="<?php echo isset($job->id)?$job->id:0?>" >
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" value="<?php echo isset($job->title)?$job->title:""?>" id="title" name="title" placeholder="Title">
                </div>
				
				
				<div class="form-group">
                  <label for="description">Description</label>
                  <textarea id="desc" name="desc" class="textarea" placeholder="Job Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo isset($job->desc)?$job->desc:""?></textarea>
                </div>
                
				<div class="form-group">
                  <label>Skills</label>
					<input type="text" data-role="tagsinput" value="<?php echo isset($skills)?$skills:""; ?>" name="skills" id="skills" >
					
                </div>
                
			
				<div class="form-group">
                  <label for="title">Location</label>
                  <input type="text" class="form-control" value="<?php echo isset($job->location)?$job->location:""?>"  id="location" id="location" placeholder="Location">
                </div>
				<div class="form-group">
                  <label for="title">Salary</label>
                  <input type="text" class="form-control" id="salary" value="<?php echo isset($job->salary)?$job->salary:""?>"  id="salary" placeholder="Salary Range">
                </div>
				
				<div class="form-group">
                  <label for="title">Experience</label>
                  <input type="text" class="form-control" id="experience" value="<?php echo isset($job->experience)?$job->experience:""?>"  id="salary" placeholder="Experience">
                </div>
				
				
				<div class="form-group">
                  <label for="title">Type</label>
                  <select id="type" name="type" class="form-control">
                    <option <?php echo (isset($job->type) && $job->type=="Full Time")?"selected":""; ?> value="Full Time" >Full Time</option>
                    <option <?php echo (isset($job->type) && $job->type=="Part Time")?"selected":""; ?> value="Part Time" >Part Time</option>
                    <option <?php echo (isset($job->type) && $job->type=="Contract")?"selected":""; ?> value="Contract" >Contract</option>
                  </select>
                </div>
				<div class="form-group">
					<div class="checkbox">
						<label>
						  <input id="featured" name="featured" <?php echo (isset($job->featured) && $job->featured==1)?"checked":""; ?> type="checkbox">
						  Featured
						</label>
					  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Job icon</label>
                  <input type="file" id="job_icon" name="job_icon">
					<?php if(isset($job->logo) && $job->logo!="") { ?>
                  <img src="<?php echo JOBS_IMAGES.$job->logo; ?>" alt="Icon" height="42" width="42">
					<?php } ?>
                </div>
                
				
			<div class="box-header with-border">
              <h3 class="box-title">Company information</h3>
            </div>
            	
				
				<div class="form-group">
                  <label>Company name</label>
                  <input class="form-control" type="text" name="company" id="company" value="<?php echo isset($job->company)?$job->company:""; ?>" placeholder="Company name">
                                        
                </div>
				
				<div class="form-group">
                  <label>Zip code</label>
                  <input class="form-control" type="text" name="zip_code" id="zip_code" value="<?php echo isset($job->zip_code)?$job->zip_code:""; ?>" placeholder="Zip Code">
                                        
                </div>
				
				<div class="form-group">
                  <label>State</label>
                  <input class="form-control" type="text" name="state" id="state" value="<?php echo isset($job->state)?$job->state:""; ?>" placeholder="State">
                                        
                </div>
				
				<div class="form-group">
                  <label>City</label>
                  <input class="form-control" type="text" name="city" id="city" value="<?php echo isset($job->city)?$job->city:""; ?>" placeholder="City">
                                        
                </div>
				
				
              </div>
              <!-- /.box-body -->
			<div id="message_div" style="display:none;" class="form-group icon_form comments_form error">
				<label id="message_lbl" style="color:red;" class="control error">
				</label>
			</div>
              <div class="box-footer">
			   <div class="pull-left">
			   <button  type="submit" class="btn btn-primary">Submit</button>
			   
			   </div>
			   <div class="pull-right">
			   <button type="button" onclick="window.location.href='<?php echo base_url('admin/jobs')?>'" class="btn btn-block btn-warning">Cancel</button>
			   </div>
			  
                
              </div>
            </form>
          </div>
<script>
submitJobsForm();
	function  submitJobsForm()
	{
		document.addEventListener("DOMContentLoaded", function(event) { 
		
		
		
		
		$( function() {
			
		 
			$('#zip_code').keyup(function () {
				$('#state').val('');
							$('#city').val('');
    $.ajax({
      type: "POST",
      url: '<?php echo base_url('address-by-zipcode');?>',
      data: {zip_code:$('#zip_code').val()},
	  success: function (data) {
							var obj = jQuery.parseJSON(data);
							
							if(obj.place_name)
							{
								$('#state').val(obj.place_name);
							}
							if(obj.state_name)
							{
								$('#city').val(obj.state_name);
							}
							
						}
    });
});
		} );
		
		
		
		
		
		
		
		$("form#jobs_form").submit(function(e) {
			e.preventDefault();
				$('#message_div').css('display','none');
				$('#message_lbl').text("");
				
				$("#title").css('border-color','');
				$(".bootstrap-tagsinput").css('border-color','');
				$("#location").attr('placeholder','');
				//$(".bootstrap-tagsinput").attr('placeholder','');
				$("#zip_code").attr('placeholder','');
				$("#company").attr('placeholder','');
				var title = $("#title").val();
				var desc = $("#desc").val();
				var location = $("#location").val();
				var salary = $("#salary").val();
				var experience = $("#experience").val();
				var type = $("#type").val();
				var job_id = $("#job_id").val();
				
				var skills = $("#skills").val();
				var zip_code = $("#zip_code").val();
				var state = $("#state").val();
				var city = $("#city").val();
				var company = $("#company").val();
				
				
				var featured=0;
				if($('#featured').is(":checked"))
				{
					featured=1;
				}
				if(title.length == 0)
				{
					$("#title").css('border-color','red');
					$("#title").attr('placeholder','Title is required');
				}
				else if(location.length == 0)
				{
					$("#location").css('border-color','red');
					$("#location").attr('placeholder','Location is required');
				}
				else if(skills.length == 0)
				{
					$(".bootstrap-tagsinput").css('border-color','red');
					$("#skills").attr('placeholder','Skills are required');
				}
				else if(company.length == 0)
				{
					$("#company").css('border-color','red');
					$("#company").attr('placeholder','Company name is  required');
				}
				else if(zip_code.length == 0)
				{
					$("#zip_code").css('border-color','red');
					$("#zip_code").attr('placeholder','Zip code is  required');
				}
				else
				{
					var formData = new FormData();

					formData.append("file", document.getElementById('job_icon').files[0]);
					formData.append("location ",location);
					formData.append("title ",title);
					formData.append("title ",title);
					formData.append("featured ",featured);
					formData.append("desc ",desc);
					formData.append("salary ",salary);
					formData.append("experience",experience);
					formData.append("type ",type);
					formData.append("job_id ",job_id);
					formData.append("skills",skills);
					formData.append("company",company);
					formData.append("zip_code",zip_code);
					formData.append("state",state);
					formData.append("city",city);
					$.ajax({
						url: '<?php echo base_url('admin/job-submit');?>',
						type: 'POST',
						data: formData,
						success: function (data) {
							var obj = jQuery.parseJSON(data);
							if(!obj.status && obj.message)
							{
								$('#message_div').css('display','block');
								$('#message_lbl').html(obj.message);
								setTimeout(function() { $("#message_div").hide(); }, 5000);

								
							}
							else if(obj.status)
							{
								$('#message_div').css('display','block');
								$('#message_lbl').css("color","green");
								$('#message_lbl').html("Success");
								setTimeout(function() { $("#message_div").hide(); }, 5000);
								
								window.location.replace("<?php echo base_url('admin/jobs')?>");
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
   
</script>
			<?php }else{ ?>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box">
            <div class="box-header">
			 <div class="pull-left">
                  <h3 class="box-title">Jobs</h3>
                </div>
				 <div class="pull-right">
                  <button type="button" onclick="window.location.href='<?php echo base_url('admin/add-job');?>'" class="btn btn-block btn-primary">Add</button>
                </div>
              
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="job_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>location</th>
                  <th>Type</th>
                  <th>Salary</th>
                  <th>Featured</th>
                  <th>Created At</th>
                  <th>Options</th>
                </tr>
                </thead>
				<?php if(isset($jobs) && !empty($jobs)){?>
                <tbody>
				<?php foreach($jobs as $key=>$val){?>
                <tr>
                  <td><?php echo $val->id;?></td>
                  <td><?php echo $val->title;?></td>
                  <td><?php echo $val->location;?></td>
                  <td><?php echo $val->type;?></td>
                  <td><?php echo $val->salary;?></td>
                  <td><?php echo (isset($val->featured) && $val->featured==1)?"Yes":"No";?></td>
                  <td><?php echo $val->created_at;?></td>
                  <td>
					<a href="<?php echo base_url('admin/edit-job/'.$val->id)?>" ><i class="fa fa-fw fa-edit"></i></a>
					<a href="<?php echo base_url('admin/delete-job/'.$val->id)?>" ><i class="fa fa-fw  fa-trash"></i></a>
				  </td>
                 
                  
                </tr>
                <?php } ?>
                </tbody>
                <?php } ?><tfoot>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>location</th>
                  <th>Type</th>
                  <th>Salary</th>
                  <th>Featured</th>
                  <th>Created At</th>
                  <th>Options</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
			<?php } ?><!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  <!-- page script -->
<script>

document.addEventListener("DOMContentLoaded", function(event) { 
   
    $('#job_data').DataTable({
		"language": {
			"emptyTable":     "No record found"
	   },
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
	  
    });
  });
</script>
