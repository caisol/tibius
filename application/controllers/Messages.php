<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	private $_CID=0;
	function __construct() {
        parent::__construct();
		$this->_CID = $this->session->userdata('candidate_id');
		if(!$this->_CID || $this->_CID == 0)
		{
			redirect('login'); 
		}
    }
	
	public function index()
	{
		
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = $record_num;
		$data['candi_page'] = 'messages';
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'candidate',array('id'=>$this->_CID,'status'=>1));
		$data['profile'] = $detail= $query->row();
		
		$data['front_header'] = 'templates/front/candidate/front_header';
		$data['employee_dashboard_wrapper'] = 'templates/front/candidate/employee_dashboard_wrapper';
		$data['candidate_content'] = 'templates/front/candidate/messages';
		//$data['news_letter'] = 'templates/front/news_letter';
		$data['front_footer'] ='templates/front/front_footer';
		$data['chatbox_wrapper'] ='templates/front/chatbox_wrapper';
		$this->template->load('templates/template_front_candidate', 'front/candidate/dashboard',$data);
	}
	
	function send_message()
	{
		$text_message   = $this->input->post("text_message");
		
		if(isset($text_message) && strlen(trim($text_message))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Message is required";
		}
		else
		{
			$id   = $this->_CID;
		
			if(isset($id) && $id>0)
			{
				$post_data = array('body'=> $text_message,'sender_id'=>$id,'created_at'=>__date_time);
				$this->db->insert(DB.'messages',$post_data);
				$data['status'] = true;		

				$query = $this->db->order_by('id', 'DESC')->get_where(DB.'candidate',array('id'=>$id,'status'=>1));
				$candidate_detail =  $query->row();
				$this->load->model('Email', 'email_model');
				$subject = "Candidate message";
				$mailSubject = 'Query';
				$contact_no=isset($candidate_detail->phone_number)?$candidate_detail->phone_number:"N/A";
				$email=isset($candidate_detail->email)?$candidate_detail->email:"N/A";
				$message=$text_message;
				$full_name = isset($candidate_detail->first_name)?$candidate_detail->first_name." ".$candidate_detail->last_name:"";
				$sendMessage = "<p>Hello,</p><p>".$full_name." has send you a message</p><p><p><b>Email id:</b> ".$email."</p><p><b>Subject:</b> ".$subject."</p><p><b>Message:</b> ".$message."</p>";
				$fromEmail='contactus@vectortechsol.com';
				$toEmail="contactus@vectortechsol.com";
				//$toEmail="hassanphp7@gmail.com";
				
				$this->email_model->send_email($mailSubject,$sendMessage,$fromEmail,$toEmail,"");				
			}
			else
			{
				$data['status'] = false;
				$data['message'] = "please login to perform this action";
			}
			 
		}
		

		echo json_encode($data);
	}
	
	function get_messages()
	{
		$id   = $this->_CID;
		$limit = $this->input->post("limit");
		if(isset($limit) && $limit==1)
		{
			$limit_str="";
		}
		elseif(isset($limit) && $limit==2)
		{
			$limit_str=" LIMIT 20 ";
		}
		if(isset($id) && $id>0)
		{
			$query = $this->db->query('SELECT c.id AS cid,c.`first_name`,c.`last_name`,c.`profile_picture`,m.id,m.sender_id,m.recipient_id,m.`body`,m.`created_at` FROM vc_messages m LEFT JOIN vc_candidate c ON c.id=m.`sender_id` WHERE (m.`sender_id`='.$id.' OR m.`recipient_id`='.$id.') AND m.`status`=1 ORDER BY m.id DESC '.$limit_str);
			$detail= $query->result();
			$messages=array();
			if(isset($detail) && !empty($detail))
			{
				$count=0;
				for($i=count($detail)-1;$i>=0;$i--)
				{
					$messages[$count]['image'] = "<img src=\"".FRONT_IMAGES."s6.png\" class=\"img-fluid\" alt=\"\">";
					
					if($id==$detail[$i]->cid)
					{
						$messages[$count]['classname'] = "out";
						if(isset($detail[$i]->profile_picture) && $detail[$i]->profile_picture!="")
						{
							$messages[$count]['image'] = "<img src=\"".PROFILE_IMAGES.$detail[$i]->profile_picture."\" class=\"img-fluid\" alt=\"\">";
						}
						else
						{
							$messages[$count]['image'] = "<img src=\"".FRONT_IMAGES."pt5.png\" class=\"img-fluid\" alt=\"\">";
						}
					}
					else
					{
						$messages[$count]['classname'] = "in";
					}
					$messages[$count]['id'] = $detail[$i]->id;
					$messages[$count]['cid'] = $detail[$i]->cid;
					$messages[$count]['first_name'] = $detail[$i]->first_name;
					$messages[$count]['last_name'] = $detail[$i]->last_name;
					$messages[$count]['profile_picture'] = $detail[$i]->profile_picture;
					$messages[$count]['sender_id'] = $detail[$i]->sender_id;
					$messages[$count]['recipient_id'] = $detail[$i]->recipient_id;
					$messages[$count]['body'] = $detail[$i]->body;
					$messages[$count]['created_at'] = $detail[$i]->created_at;
					$count++;
				}
			}
			$data['messages'] = $messages;
			$data['userid'] = $id;
			$data['status'] = true;
						
		}
		else
		{
			$data['status'] = false;
			$data['message'] = "please login to perform this action";
		}

		echo json_encode($data);
	}
	
}
