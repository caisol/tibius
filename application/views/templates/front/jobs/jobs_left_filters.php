<div class="col-lg-3 col-md-12 col-sm-12 col-12 d-none d-sm-none d-md-none d-lg-block d-xl-block">
                   <!-- <div class="job_filter_category_sidebar jb_cover">
                        <div class="job_filter_sidebar_heading jb_cover">
                            <h1>jobs by  category</h1>
                        </div>

                        <div class="category_jobbox jb_cover">
                            <p class="job_field">
                                <input type="checkbox" id="c1" name="cb">
                                <label for="c1">graphic designer<span> (155)</span></label>
                            </p>
                            <p class="job_field">
                                <input type="checkbox" id="c2" name="cb">
                                <label for="c2">
                                    Engineering Jobs <span> (514)</span>
                                </label>
                            </p>
                            <p class="job_field">
                                <input type="checkbox" id="c3" name="cb">
                                <label for="c3">Mainframe Jobs <span> (554)</span>
                                </label>
                            </p>
                            <p class="job_field">
                                <input type="checkbox" id="c4" name="cb">
                                <label for="c4">Legal Jobs <span> (457)</span>
                                </label>
                            </p>
                            <p class="job_field">
                                <input type="checkbox" id="c5" name="cb">
                                <label for="c5">IT Jobs <span> (254)</span> </label>
                            </p>
                            <p class="job_field">
                                <input type="checkbox" id="c6" name="cb">
                                <label for="c6">PSU Jobs <span> (1054)</span> </label>
                            </p>
                            <p class="job_field">
                                <input type="checkbox" id="c7" name="cb">
                                <label for="c7">government Jobs <span> (1284)</span> </label>
                            </p>
                            <div class="seeMore"><a href="#">view all categories</a></div>
                        </div>

                    </div>
                   --> 
				  <!-- <div class="job_filter_category_sidebar jb_cover">
                        <div class="job_filter_sidebar_heading jb_cover">
                            <h1>jobs by  location</h1>
                        </div>

                        <div class="category_jobbox jb_cover">
                            <p class="job_field">
                                <input type="checkbox" id="c01" name="cb">
                                <label for="c01">Jobs in delhi
                                    <span> (24)</span></label>
                            </p>
                            <p class="job_field">
                                <input type="checkbox" id="c02" name="cb">
                                <label for="c02">
                                    Jobs in mumbai
                                    <span> (1242)</span>
                                </label>
                            </p>
                            <p class="job_field">
                                <input type="checkbox" id="c03" name="cb">
                                <label for="c03">Jobs in chennai
                                    <span>(458)</span>
                                </label>
                            </p>
                            <p class="job_field">
                                <input type="checkbox" id="c04" name="cb">
                                <label for="c04">Jobs in indore
                                    <span> (1047)</span>
                                </label>
                            </p>
                            <p class="job_field">
                                <input type="checkbox" id="c05" name="cb">
                                <label for="c05">Job in bhopal <span> (124)</span> </label>
                            </p>
                            <p class="job_field">
                                <input type="checkbox" id="c06" name="cb">
                                <label for="c06">Job in pune <span> (124)</span> </label>
                            </p>
                            <p class="job_field">
                                <input type="checkbox" id="c07" name="cb">
                                <label for="c07">Job in banglore <span> (124)</span> </label>
                            </p>
                            <div class="seeMore"><a href="#">view all categories</a></div>
                        </div>
                    </div>
                  -->  
				  <?php if(isset($skills) && !empty($skills)) { ?>
				  <div class="job_filter_category_sidebar jb_cover">
                        <div class="job_filter_sidebar_heading jb_cover">
                            <h1>top skill's</h1>
                        </div>

                        <div class="category_jobbox jb_cover">
						<?php foreach($skills as $key=>$val) { 
						if(trim($val->name)!="")
							{
								
							?>
								<p class="job_field">
									<input <?php echo (in_array($val->id,$filter_by_skills))?"checked":""; ?> type="checkbox" onclick="filter_by();" id="c<?php echo $key;?>" value="<?php echo ($val->id); ?>" name="cb">
									<label for="c<?php echo $key;?>"><?php echo trim($val->name); ?>
										<span> (<?php echo $val->total;?>)</span></label>
								</p>
							<?php
							}
						} ?>
						
                            <!--<div class="seeMore"><a href="#">view all categories</a></div>-->
                        </div>
                    </div>
				  <?php } ?>
                    <!--<div class="job_filter_category_sidebar jb_cover">
                        <div class="job_filter_sidebar_heading jb_cover">
                            <h1>salary</h1>
                        </div>

                        <div class="category_jobbox jb_cover">
                            <div class="widget price-range">
                                <ul>
                                    <li class="range">
                                        <div onclick="filter_by_salary()" id="range-price" class="range-box"></div>

                                        <input type="text" value="<?php echo (isset($salary_min_filter) && isset($salary_max_filter))?$salary_min_filter."-".$salary_max_filter:""; ?>" id="price" class="price-box" readonly/>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                   --> <!--<div class="jp_add_resume_wrapper jb_cover">
                        <div class="jp_add_resume_img_overlay"></div>
                        <div class="jp_add_resume_cont">
                            <img style="width: 60%;" src="<?php echo FRONT_IMAGES?>vectorlogotransparent2.png" alt="logo" />
                            <h4>Get Best Matched Jobs On your Email. Add Resume NOW!</h4>
                            <div class="width_50">
                                <input type="file" id="input-file-now-custom-233" class="dropify" data-height="90" /><span class="post_photo">add resume</span>
                            </div>
                        </div>
                    </div>-->
                </div>
<script>
function filter_by()
{
	var favorite = [];
            $.each($("input[name='cb']:checked"), function(){
                favorite.push($(this).val());
            });
           
	var formData = new FormData();
		var favorite = favorite
		formData.append("filters",favorite);
		
		$.ajax({
			url: '<?php echo base_url('sorting-jobs');?>',
			type: 'POST',
			data: formData,
			success: function (data) {
				
				{
					setTimeout(function() { location.reload(true); }, 1000);
					
				}
				
			},
			cache: false,
			contentType: false,
			processData: false
		});
}
function filter_by_salary()
{
	var price = $('#price').val();
	var formData = new FormData();
		var price = price
		formData.append("salary",price);
		
		$.ajax({
			url: '<?php echo base_url('sorting-jobs');?>',
			type: 'POST',
			data: formData,
			success: function (data) {
				
				{
					setTimeout(function() { location.reload(true); }, 1000);
					
				}
				
			},
			cache: false,
			contentType: false,
			processData: false
		});
}
</script>                