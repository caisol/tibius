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
              <h3 class="box-title">Candidate Managment</h3>
            </div>
			<div class="col-md-12">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Direct Chat</h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages">3</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                   
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" id="direct_chat_messages">
                    <!-- Message. Default to the left -->
                    <?php /*?><div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?php echo FRONT_IMAGES; ?>pt5.png" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        Is this template really for free? That's unbelievable!
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?php echo FRONT_IMAGES; ?>s6.png" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        You better believe it!
                      </div>
                      
                    </div>
                    <!-- /.direct-chat-msg --><?php */?>

                   
                  </div>
                  <!--/.direct-chat-messages-->

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <form id="messageForm" action="#">
                    <div class="input-group">
                      <input type="text"  id="text_message" name="text_message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                            <button type="submit" id="send_message" class="btn btn-warning btn-flat">Send</button>
                          </span>
                    </div>
                  </form>
				  <div id="message_div" style="display:none;" class="form-group icon_form comments_form error">
					<label id="message_lbl" style="color:red;" class="control error">
					</label>
				</div>
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>
            <!-- /.col -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  <!-- page script -->
<script>

document.addEventListener("DOMContentLoaded", function(event) { 
   get_messages();
   
   
   $("form#messageForm").submit(function(e) {
			
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
					var li_html="<div class=\"direct-chat-msg\">"+
                      "<div class=\"direct-chat-info clearfix\">"+
                        "<span class=\"direct-chat-name pull-left\">Admin</span>"+
                        "<span class=\"direct-chat-timestamp pull-right\">Just now</span>"+
                      "</div>"+
                      "<img class=\"direct-chat-img\" src=\"<?php echo FRONT_IMAGES; ?>s6.png\" alt=\"message user image\">"+
                      
                      "<div class=\"direct-chat-text\">"+
                        text_message+
                      "</div>"+

                    "</div>";
$('#direct_chat_messages').append(
									li_html	
									);
					formData.append("text_message",text_message);
					formData.append("recipient_id",'<?php echo isset($cid)?$cid:0;?>');
					$.ajax({
						url: '<?php echo base_url('admin/send-message');?>',
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
								get_messages();
								setTimeout(function() { $("#message_div").hide(); }, 5000);
								
							}
						},
						cache: false,
						contentType: false,
						processData: false
					});
				}	
				
		});
		
		
    function get_messages()
	{ //dashboard_conversation
	//return true;
		$.ajax({
						url: '<?php echo base_url('admin/get-messages/'.$cid);?>',
						type: 'GET',
						data: "",
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
								console.log(messages);
								if(messages && !jQuery.isEmptyObject(messages))
								{
									$('#direct_chat_messages').html('');
									  $.each(messages, function( index, value ) {
										  console.log(value);
										  var classname = "";
										  var classname_time = "right";
										  var full_name="<span class=\"direct-chat-name pull-left\">Admin</span>";
										  var image = "<img class=\"direct-chat-img\" src=\"<?php echo FRONT_IMAGES; ?>s6.png\" alt=\"message user image\">";
										  //console.log('<?php echo isset($cid)?$cid:0;?>'+value.cid)
										  if(<?php echo isset($cid)?$cid:0;?>==value.sender_id)
										  {
											  classname="right";
											  classname_time="left";
											  full_name  = "<span class=\"direct-chat-name pull-right\">"+value.first_name+"</span>";
											  image = "<img class=\"direct-chat-img\" src=\"<?php echo FRONT_IMAGES; ?>pt5.png\" alt=\"message user image\">";
											  if(value.profile_picture && value.profile_picture!="")
											  {
												  image = "<img class=\"direct-chat-img\" src=\"<?php echo PROFILE_IMAGES; ?>"+value.profile_picture+"\" alt=\"message user image\">";
											  }
											  
										  }
										  
											li_html+="<div class=\"direct-chat-msg "+classname+" \">"+
                      "<div class=\"direct-chat-info clearfix\">"+
                        full_name+
                        "<span class=\"direct-chat-timestamp pull-"+classname_time+"\">"+value.created_at+"</span>"+
                      "</div>"+
       image
                      +
                      
                      "<div class=\"direct-chat-text\">"+
                        value.body+
                      "</div>"+
                      
                    "</div>";
									});
								}
								else
								{
								li_html = "No conversations yet!";	
								}
								
								$('#direct_chat_messages').html(
									li_html	
									);
								 setTimeout(function(){get_messages();}, 10000);
								 $("#direct_chat_messages").animate({
  scrollTop: $('#direct_chat_messages')[0].scrollHeight - $('#direct_chat_messages')[0].clientHeight
}, 1000);

							}
						},
						cache: false,
						contentType: false,
						processData: false
					});
	}
 
  });
</script>
