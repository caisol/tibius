<style>
.conversation, .send-time
{
	width:inherit !important;
}
</style> 
 <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="dashboard-message-wrapper">
                       <!-- <div class="message-lists">
                            <form action="#" class="message-search">
                                <input type="text" placeholder="Search Friend......">
                                <button><i class="fas fa-search"></i></button>
                            </form>
                            <a href="#" class="message-single">
                                <div class="thumb">
                                    <img src="images/rc1.png" class="img-fluid" alt="">
                                </div>
                                <div class="body">
                                    <h6 class="username">Laural K.</h6>
                                    <span class="send-time">12 min</span>
                                </div>
                            </a>
                            <a href="#" class="message-single">
                                <div class="thumb">
                                    <img src="images/rc2.png" class="img-fluid" alt="">
                                </div>
                                <div class="body">
                                    <h6 class="username">Paul Cox</h6>
                                    <span class="send-time">22 min</span>
                                </div>
                            </a>
                            <a href="#" class="message-single active">
                                <div class="thumb">
                                    <img src="images/rc3.png" class="img-fluid" alt="">
                                </div>
                                <div class="body">
                                    <h6 class="username">Carlos</h6>
                                    <span class="text-number">16 min</span>
                                </div>
                            </a>
                            <a href="#" class="message-single">
                                <div class="thumb">
                                    <img src="images/rc4.png" class="img-fluid" alt="">
                                </div>
                                <div class="body">
                                    <h6 class="username">Dahlia</h6>
                                    <span class="send-time">45 min</span>
                                </div>
                            </a>
                            <a href="#" class="message-single">
                                <div class="thumb">
                                    <img src="images/rs5.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="body">
                                    <h6 class="username">Nathan</h6>
                                    <span class="send-time">45 min</span>
                                </div>
                            </a>
                            <a href="#" class="message-single">
                                <div class="thumb">
                                    <img src="images/rs4.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="body">
                                    <h6 class="username">nicloss</h6>
                                    <span class="send-time">26 min</span>
                                </div>
                            </a>
                        </div>
                       --> <div class="message-box">
                            <div class="message-box-header">

                                <h5>Administrator</h5>
                                <div class="navbar navbar-expand-sm drop">

                                    <!-- Links -->
                                    <ul class="navbar-nav">

                                        <!-- Dropdown -->
                                        <li class="nav-item dropdown">
                                            <a id="href_exp1" class="nav-link dropdown-toggle" href="javascript:void(0)" onclick="get_messages(1,1);" >
                                                <i class="fa fa-plus" id="li_viewall" >View All messages</i>
                                            </a>
											<a id="href_exp2" style="display:none;" class="nav-link dropdown-toggle" href="javascript:void(0)" onclick="get_messages(0,2);" >
                                                <i class="fa fa-minus" id="li_viewall" >View Latest messages</i>
                                            </a>
                                            <!--<div class="dropdown-menu">id="navbardrop1" data-toggle="dropdown" aria-expanded="false"
                                                <a class="dropdown-item" href="#"><i class="fa fa-link"></i>&nbsp;&nbsp;Copy this link</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-tag"></i>&nbsp;&nbsp;Report</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-flag"></i>&nbsp;&nbsp;Hide</a>

                                            </div>-->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="dashboard-conversation" id="dashboard_conversation">
                                <li class="conversation in">
                                    <div class="avater">
                                        <img src="images/rc3.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="message"><span>This is Photoshop's version  of Lom Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis </span></div>
                                    <span class="send-time">2.32 am</span>
                                </li>
                                <li class="conversation out">
                                    <div class="avater">
                                        <img src="images/rc1.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="message"><span>This is Photoshop's version  of Lom Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis </span></div>
                                    <span class="send-time">2.32 am</span>
                                </li>
                                <li class="conversation in">
                                    <div class="avater">
                                        <img src="images/rc3.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="message"><span>This is Photoshop's version  of Lom Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis </span></div>
                                    <span class="send-time">2.34 am</span>
                                </li>
                                <li class="conversation out">
                                    <div class="avater">
                                        <img src="images/rc1.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="message"><span>This is Photoshop's version  of Lom Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis </span></div>
                                    <span class="send-time">2.34 am</span>
                                </li>
                                <li class="conversation in">
                                    <div class="avater">
                                        <img src="images/rc3.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="message"><span>This is Photoshop's version  of Lom Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis </span></div>
                                    <span class="send-time">2.34 am</span>
                                </li>

                            </ul>
                            <div class="conversation-write-wrap">
                                <form action="#" id="message" >
                                    <textarea placeholder="Type a message" id="text_message" ></textarea>
                                    <!--<label class="send-file">
                                        <input type="file"><i class="fas fa-image"></i>
                                    </label>
                                    <label class="send-image">
                                        <input type="file"><i class="fas fa-file-image"></i>
                                    </label>-->

                                    <button class="send-message" id="send_message" ><i class="fas fa-location-arrow"></i></button>
                                </form>
                            </div>
							<div id="message_div" style="display:none;" class="form-group icon_form comments_form error">
								<label id="message_lbl" style="color:red;" class="control error">
								</label>
							</div>
                        </div>
                    </div>
                </div>
<script>
				submitJobsForm();
	function  submitJobsForm()
	{
		document.addEventListener("DOMContentLoaded", function(event) { 
		var expTmp=2;
		var limitTmp=2;
		$( function() {
			get_messages(2,2);
		});
		
		
		$("form#message").submit(function(e) {
			
				e.preventDefault();
				$('#message_div').css('display','none');
				$('#message_lbl').text("");
				
				var text_message = $('#text_message').val();
			
				if(text_message.length<=0)
				{
					return true;
				}
				else
				{
					var formData = new FormData();
					var profile_image='<?php echo (isset($profile->profile_picture) && $profile->profile_picture!="" )?$profile->profile_picture:"";?>';
					var tmpImage = "<img src=\"images/rc3.png\" class=\"img-fluid\" alt=\"\">";
					if(profile_image!="")
					{
						tmpImage = "<img src=\"<?php echo PROFILE_IMAGES; ?>"+profile_image+"\" class=\"img-fluid\" alt=\"\">";
					}
					
					var li_html="<li class=\"conversation out\"><div class=\"avater\">"+tmpImage+"</div><div class=\"message\"><span>"+text_message+" </span></div><span class=\"send-time\">just now</span></li>";
$('#dashboard_conversation').append(
									li_html	
									);
					formData.append("text_message",text_message);
					$.ajax({
						url: '<?php echo base_url('send-message');?>',
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
								$('#text_message').val('');
								$('#message_div').css('display','block');
								$('#message_lbl').css("color","green");
								$('#message_lbl').html("Message sent successfully");
								if(obj.message)
								{
									$('#message_div').css('display','block');
									$('#message_lbl').html(obj.message);
								}
								get_messages(2,expTmp);
								setTimeout(function() { $("#message_div").hide(); }, 5000);
								
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
	
	function get_messages(limit,exp)
	{ //dashboard_conversation
	//return true;
	console.log(limit+'----'+exp);
	expTmp=exp;
	limitTmp=limit;
		if(exp==1)
		{
			$('#href_exp1').css('display','none');
			$('#href_exp2').css('display','block');
		}
		else if(exp==2)
		{
			$('#href_exp1').css('display','block');
			$('#href_exp2').css('display','none');
			
		}
	
	var formData = new FormData();
	formData.append("limit",limit);
		$.ajax({
						url: '<?php echo base_url('get-messages');?>',
						type: 'POST',
						data: formData,
						success: function (data) {
							var obj = jQuery.parseJSON(data);
							if(!obj.status && obj.message)
							{
								return true
							}
							else if(obj.status)
							{
								var messages = obj.messages;
								var li_html="";
								
								if(messages && !jQuery.isEmptyObject(messages))
								{
									$('#dashboard_conversation').html('');
									
									  $.each(messages, function( index, value ) {
										  
										  
											li_html+="<li class=\"conversation "+value.classname+"\">"+
                                    "<div class=\"avater\">"+
                                        value.image+
                                    "</div>"+
                                    "<div class=\"message\"><span>"+value.body+" </span></div>"+
                                    "<span class=\"send-time\">"+value.created_at+"</span>"+
                                "</li>";
									});
								}
								else
								{
								li_html = "<li class=\"conversation out\">"+
                                    "<div class=\"avater\">"+
                                        "<img src=\"images/rc1.png\" class=\"img-fluid\" alt=\"\">"+
                                    "</div>"+
                                    "<div class=\"message\"><span>If you have any queury you can start conversation with admin! </span></div>"+
                                    "<span class=\"send-time\">            </span>"+
                                "</li>";	
								}
								
								$('#dashboard_conversation').html(
									li_html	
									);
									setTimeout(function(){get_messages(limitTmp,expTmp);}, 10000);
								        
										
										
/*$("#direct_chat_messages").animate({
  scrollTop: $('#direct_chat_messages')[0].scrollHeight - $('#direct_chat_messages')[0].clientHeight
}, 1000);*/

							}
						},
						cache: false,
						contentType: false,
						processData: false
					});
	}
    
</script>

                      