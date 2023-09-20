<link href="<?php echo FRONT_JS; ?>EasyAutocomplete/easy-autocomplete.min.css" rel="stylesheet"/>
<style>
#loading_text {
    position: absolute;
    top: 50%;
    left: 0;
	z-index: 1000 !important;
    width: 100%;
    margin-top: -10px;
    line-height: 20px;
    text-align: center;
}
</style>
   <div style="display:none;" id="loading_text">
   <p><img src="<?php echo FRONT_IMAGES;?>loader1.gif" /> Please Wait</p>
</div>
   <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="row" id="row_id_categories" >
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="  jb_cover" style="margin-top: 30px;">


								<form id="skills_form" role="form" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="">Add a new skill<span class="text-danger">*<span></span></span></label>
										<div class="has-feedback">
											<div class="easy-autocomplete" style="">
												<input class="form-control md-input s" name="skillsName" value="" id="skillsName" maxlength="40" autocomplete="off">
												<input type="hidden" id="skill_id" >
												<input type="hidden" id="candidate_skill_id" value="0">

											</div>
										</div>
									</div>

									<div class="apply_job_form">
										<label for="fader">Experience with this skill</label>
										<input  style="margin: 0 0 0px 0 !important;cursor: pointer;" id="experience_level" type="range" min="0" max="2" value="0" id="fader" 
										step="1" >
										<div style="margin:-30px 10px 0px 10px !important;" class="sliderticks">
											<p>Beginne</p>
											<p>Intermediate</p>
											<p>Expert</p>
										</div>
									</div>

									<div  class="header_btn search_btn news_btn overview_btn  jb_cover">
										<div id="message_div_skill" style="display:none;" class="form-group icon_form comments_form error">
											<label id="message_lbl_skill" style="color:red;" class="control success">
											</label>
										</div>
										<div class="padder_top jb_cover"></div>
										<a href="javascript:void(0);" id="add_skill">Add</a>

									</div>
								</form>
						
						
						<div class="padder_top jb_cover"></div>
						<div id="candidate_skills" class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <!--<div class="jb_listing_left_fullwidth mt-0 jb_cover">
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                        
                                        <div class="jb_job_post_right_cont">
                                            <h4><a href="#"> Full Stack Developer- Java, Angular (open to varying levels)</a></h4>

                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                        <div class="jb_job_post_right_btn_wrapper">
                                            <ul>
                                               
                                                <li> <a href="javascript:void(0);" id="edit_skill">Edit</a></li>
												
                                            </ul>
											<div id="message_div_edit_skill" style="display:none;" class="form-group icon_form comments_form error">
													<label id="message_lbl_edit_skill" style="color:red;" class="control error">
													</label>
												</div>
                                        </div>
                                    </div>

                                </div>
                            </div>-->
							
							
							
                        </div>
						
						
						
						
							</div>
						</div>
						
									
						
				
						<!--<div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="job_filter_category_sidebar company_wrapper jb_cover">
                                <div class="job_filter_sidebar_heading jb_cover">
                                    <h1>about us</h1>
                                </div>
                                <div class="job_overview_header pdd jb_cover">
									<div class="row">

										<div class="col-lg-3 pricing-controller">
										<label class="form-group">
										<input type="checkbox" value="Mesmer" name="candidate_skills[]"><span><a href="#" onclick="openModal(1,'skillname');" >Mesmer</a></span></label>
										</div>
										
									</div>
									

								</div>

							</div>
						</div>-->
							
							
							
						
                        </div>
						
						<div style="display:none;" class="header_btn search_btn news_btn overview_btn  jb_cover">
								<div id="message_div" style="display:none;" class="form-group icon_form comments_form error">
									<label id="message_lbl" style="color:red;" class="control success">
									</label>
								</div>
                                <a href="javascript:void(0);" id="load_more">Load More</a>

                            </div>
                </div>
     <div class="modal fade delete_popup company_popup" id="myModal2" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-12">

						<div class="delett_cntn jb_cover">
							<h1 id="skill_name_modal" ><i class="fas fa-edit"></i>Skill name</h1>
<style>

.slider:hover {
  opacity: 1;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #FF0000;
  cursor: pointer;
}

.sliderticks {
  display: flex;
  justify-content: space-between;
  padding: 0 15px;
}

.sliderticks p {
  position: relative;
  display: flex;
  justify-content: center;
  text-align: center;
  width: 1px;
  
}
</style>
							<div class="category_wrapper jb_cover">
								<div class="row">
									<form id="jobs_form" role="form" method="post" enctype="multipart/form-data">
										<input  type="hidden" name="skill_id_modal" id="skill_id_modal">
										<div class="apply_job_form">
											<label for="fader">Experience with this skill</label>
											<input  style="margin: 0 0 0px 0 !important;" type="range" min="0" max="2" value="0" id="fader" 
												step="1" >
											<div style="margin:-30px 10px 0px 10px !important;" class="sliderticks">
												<p>Beginne</p>
												<p>Intermediate</p>
												<p>Expert</p>
											  </div>
										</div>
										
										<div class="apply_job_form">

											<input required="" type="text" name="full_name" id="full_name" placeholder="No. years">
										</div>
										<div class="apply_job_form">

											<input required="" type="text" name="text" id="email" placeholder="Others">
										</div>
										<div id="message_div" style="display:none;" class="form-group icon_form comments_form error">
											<label id="message_lbl" style="color:red;" class="control error">
											</label>
										</div>
									</form>
								
								</div>
							</div>

							<div class="padder_top jb_cover"></div>
							<div class="header_btn search_btn applt_pop_btn">

								<a href="javascript:void(0);" id="save_aboutus" >save updates</a>

							</div>
							<div class="cancel_wrapper">
								<a href="#" data-dismiss="modal">cancel</a>
							</div>

						</div>

					</div>
				</div>
			
				
			</div>
		</div>
	</div>
                               

<script>

function openModal(id,skillname)
{
	$('#skill_name_modal').html('<i class="fas fa-edit"></i>'+skillname);
	$('#skill_id_modal').val(id);
	$('#myModal2').modal('show'); 

}
var page_number=0;
function loadSkills()
		{
			$("#loading_text").show();
			page_number++;
			var formData = new FormData();
			formData.append('record_num',page_number);
			$.ajax({
					url: '<?php echo base_url('get-skills');?>',
					type: 'POST',			data: formData,
					success: function (data) {
						var obj = jQuery.parseJSON(data);
						console.log(obj);
						 $("#loading_text").hide();
						if(!jQuery.isEmptyObject(obj))
						{
							var htmlData='';
							$(obj).each(function( index,value ) {
							  console.log( index + ": " + value.parent );
							  
								htmlData+='<div class="col-lg-12 col-md-12 col-sm-12 col-12">'+
									'<div class="job_filter_category_sidebar company_wrapper jb_cover">'+
										'<div class="job_filter_sidebar_heading jb_cover">'+
											'<h1>'+value.parent.name+'</h1>'+
										'</div>'+
										'<div class="job_overview_header pdd jb_cover">'+
											'<div class="row">';
											objChild = value.child;
											if(!jQuery.isEmptyObject(objChild))
											{
												$(objChild).each(function( ind,val ) {
													htmlData+='<div class="col-lg-3 pricing-controller">'+
													'<label class="form-group">'+
													'<input type="checkbox" value="Mesmer" name="candidate_skills[]"><span><a href="javascript:void(0);" onclick="openModal(\''+val.id+'\',\''+val.name+'\');" >'+val.name+'</a></span></label>'+
													'</div>';
												});
											}
												
												
											htmlData+='</div>'+
											

										'</div>'+

									'</div>'+
								'</div>';
							});
							$('#row_id_categories').append(htmlData);
						}
						else
						{
							$('#message_div').css('display','block');
								$('#message_lbl').html("Data completed");
								$("#load_more").hide();
								setTimeout(function() { $("#message_div").hide(); }, 10000);
						}
						
					},
					cache: false,
					contentType: false,
					processData: false
				});
		}
		
		
		
		
		function edit_skill(id,name,experience_level,candidate_skill_id)
		{
			$('#skillsName').val(name);
			$('#skill_id').val(id);
			$('#candidate_skill_id').val(candidate_skill_id);
			$('#experience_level').val(experience_level);
			$('html, body').animate({ scrollTop: $("#skills_form").offset().top }, 500);
			$('#add_skill').html('Update');

		}
		
		function loadSkillsCandidate()
		{
			$("#loading_text").show();
			
			var formData = new FormData();
			$.ajax({
					url: '<?php echo base_url('get-skills-candidate');?>',
					type: 'POST',			data: formData,
					success: function (data) {
						var obj = jQuery.parseJSON(data);
						console.log(obj);
						 $("#loading_text").hide();
						if(!jQuery.isEmptyObject(obj))
						{
							var arrayTmp = ["Beginne", "Intermediate", "Expert"];
							var htmlData='';

							$(obj).each(function( index,value ) {
							  console.log( index + ": " + value.parent );
							  
								htmlData+='<div class="jb_listing_left_fullwidth mt-0 jb_cover">'+
                                '<div class="row">'+
                                    '<div class="col-lg-9 col-md-9 col-sm-12 col-12">'+
                                        
                                        '<div class="jb_job_post_right_cont">'+
                                            '<h4><a href="#"> '+value.name+'- '+value.parent+',  ('+arrayTmp[value.experience_level]+')</a></h4>'+

                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-lg-3 col-md-3 col-sm-12 col-12">'+
                                        '<div class="jb_job_post_right_btn_wrapper">'+
                                            '<ul>'+
                                               
                                                '<li> <a href="javascript:void(0);" onclick="edit_skill(\''+value.skill_id+'\',\''+value.name+'\',\''+value.experience_level+'\',\''+value.candidate_skill_id+'\')" id="edit_skill">Edit</a></li>'+
												
                                            '</ul>'+
											'<div id="message_div_edit_skill" style="display:none;" class="form-group icon_form comments_form error">'+
													'<label id="message_lbl_edit_skill" style="color:red;" class="control error">'+
													'</label>'+
												'</div>'+
                                        '</div>'+
                                    '</div>'+

                                '</div>'+
                            '</div>';
							});
							$('#candidate_skills').html(htmlData);
						}
						else
						{
							$('#message_div').css('display','block');
								$('#message_lbl').html("Data completed");
								$("#load_more").hide();
								setTimeout(function() { $("#message_div").hide(); }, 10000);
						}
						
					},
					cache: false,
					contentType: false,
					processData: false
				});
		}
		
		
submitJobsForm();

	function  submitJobsForm()
	{
		document.addEventListener("DOMContentLoaded", function(event) { 
		
		var options = {

  url: "<?php echo base_url('get-skills-json'); ?>",

  getValue: "name",

  list: {
    match: {
      enabled: true
    },
	onSelectItemEvent: function() {
			var value = $("#skillsName").getSelectedItemData().id;
console.log(value);
			$("#skill_id").val(value).trigger("change");
			
		}
	
  },

  theme: "square"
};

$("#skillsName").easyAutocomplete(options);

		loadSkillsCandidate();
		//loadSkills();
		
$("#load_more").click(function(){
	//loadSkills(1);
});

$("#add_skill").click(function(){
	var skill_id = $('#skill_id').val();
	var experience_level = $('#experience_level').val();
	var candidate_skill_id = $('#candidate_skill_id').val();
	
	$('#message_div_skill').css('display','none');
		$('#message_lbl_skill').text("");
		
		if(skill_id.length == 0)
		{
			$("#skillsName").val("");
			$("#skillsName").css('border-color','red');
			$("#skillsName").attr('placeholder','Only dropdown skills are allowed');
			
		}
		else
		{
			var formData = new FormData();

			formData.append("skill_id",skill_id);
			formData.append("experience_level",experience_level);
			formData.append("candidate_skill_id",candidate_skill_id);
			$.ajax({
				url: '<?php echo base_url("save-skill")?>',
				type: 'POST',
				data: formData,
				success: function (data) {
					var obj = jQuery.parseJSON(data);
					if(!obj.status && obj.message)
					{
						$('#message_div_skill').css('display','block');
						$('#message_lbl_skill').html(obj.message);
						setTimeout(function() { $("#message_div_skill").hide(); }, 5000);

						
					}
					else if(obj.status)
					{
						$('#message_div_skill').css('display','block');
						$('#message_lbl_skill').css("color","green");
						$('#message_lbl_skill').html("Success");
						if(obj.message)
						{
							$('#message_div_skill').css('display','block');
							$('#message_lbl_skill').html(obj.message);
						}
						loadSkillsCandidate();
						$("#skillsName").css('border-color','');
						$("#skillsName").val('');
						$("#experience_level").val(0);
						$("#skill_id").val('');
						$("#candidate_skill_id").val(0);
						$('#add_skill').html('Add');
						setTimeout(function() { $("#message_div_skill").hide(); }, 7000);
						
					
					}
				},
				cache: false,
				contentType: false,
				processData: false
			});
		}
	});


		var user = '<?php echo isset($_SESSION['candidate_email'])?$_SESSION['candidate_email']:'';?>';
		$( "#apply_now" ).click(function() {
			if(user && user!="")
			{
				
				{
					var jobid = $('#job_id').val();
					var formData = new FormData();
					formData.append("job_id",jobid);
					$.ajax({
						url: '<?php echo base_url('apply-job-by-candidate');?>',
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
								if(obj.message)
								{
									$('#message_div').css('display','block');
									$('#message_lbl').html(obj.message);
								}
								
								setTimeout(function() { $("#message_div").hide(); }, 7000);
								
							}
						},
						cache: false,
						contentType: false,
						processData: false
					});
				} 
			}
			else
			{
				window.location.replace("<?php echo base_url('login')?>");
				
			}
			
});



$( "#favourite_id" ).click(function() {
			if(user && user!="")
			{
				
				{
					var formData = new FormData();
					var jobid = $('#job_id').val();
					formData.append("job_id",jobid);
					$.ajax({
						url: '<?php echo base_url('mark-favourite-job');?>',
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
								if(obj.message)
								{
									$('#message_div').css('display','block');
									$('#message_lbl').html(obj.message);
								}
								
								setTimeout(function() { $("#message_div").hide(); }, 7000);
								
							}
							window.location.replace("<?php echo base_url('matching-jobs')?>");
						},
						cache: false,
						contentType: false,
						processData: false
					});
				} 
			}
			else
			{
				window.location.replace("<?php echo base_url('login')?>");
			}
			
});



		});
	}
  
</script>				

