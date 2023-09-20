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
              <h3 class="box-title">Skills Managment</h3>
            </div>
			<?php if(isset($type) && $type == 1){?>
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Skill information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="category_form" role="form" method="post" enctype="multipart/form-data" >
              <div class="box-body">
				<input type="hidden" id="skill_id" name="skill_id" value="<?php echo isset($category->id)?$category->id:0?>" >
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" value="<?php echo isset($category->name)?$category->name:""?>" id="name" name="name" placeholder="Title">
                </div>
				
				
				<div class="form-group">
                  <label for="title">Parent</label>
                  <select id="pid" name="type" class="form-control">
                    <option value="0">None</option>
                    <?php if(isset($parents) && !empty($parents)){
						foreach($parents as $key=>$val)
						{?>
							                    <option  <?php echo (isset($category->id) && $category->id==$val->id)?"disabled":""; ?> <?php echo (isset($category->pid) && $category->pid==$val->id)?"selected":""; ?> value="<?php echo $val->id;?>"><?php echo $val->name;?></option>
						<?php }
					}?>
                  </select>
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
			   <button type="button" onclick="window.location.href='<?php echo base_url('admin/skills')?>'" class="btn btn-block btn-warning">Cancel</button>
			   </div>
			  
                
              </div>
            </form>
          </div>
<script>
submitJobsForm();
	function  submitJobsForm()
	{
		document.addEventListener("DOMContentLoaded", function(event) { 
		
		
		
		
		
		
		
		
		$("form#category_form").submit(function(e) {
			e.preventDefault();
				$('#message_div').css('display','none');
				$('#message_lbl').text("");
				
				$("#name").css('border-color','');
				$(".bootstrap-tagsinput").css('border-color','');
				var name = $("#name").val();
				var pid = $("#pid").val();
				var skill_id = $("#skill_id").val();
				if(name.length == 0)
				{
					$("#name").css('border-color','red');
					$("#name").attr('placeholder','Title is required');
				}
				else
				{
					var formData = new FormData();

					formData.append("name ",name);
					formData.append("pid ",pid);
					formData.append("skill_id ",skill_id);
					$.ajax({
						url: '<?php echo base_url('admin/skill-submit');?>',
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
								
								window.location.replace("<?php echo base_url('admin/skills')?>");
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
                  <h3 class="box-title">Skills</h3>
                </div>
				 <div class="pull-right">
                  <button type="button" onclick="window.location.href='<?php echo base_url('admin/add-skill');?>'" class="btn btn-block btn-primary">Add</button>
                </div>
              
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="category_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Parent</th>
                  <th>Created At</th>
                  <th>Options</th>
                </tr>
                </thead>
				<?php if(isset($categories) && !empty($categories)){?>
                <tbody>
				<?php foreach($categories as $key=>$val){?>
                <tr>
                  <td><?php echo $val->id;?></td>
                  <td><?php echo $val->name;?></td>
                  <td><?php echo $val->parentname;?></td>
                  <td><?php echo $val->created_at;?></td>
                  <td>
					<a href="<?php echo base_url('admin/edit-skill/'.$val->id)?>" ><i class="fa fa-fw fa-edit"></i></a>
					<a href="<?php echo base_url('admin/delete-skill/'.$val->id)?>" ><i class="fa fa-fw  fa-trash"></i></a>
				  </td>
                 
                  
                </tr>
                <?php } ?>
                </tbody>
                <?php } ?><tfoot>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Parent</th>
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
   
    $('#category_data').DataTable({
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
