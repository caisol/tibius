<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincandidates extends CI_Controller {

	private $_AID=0;
	function __construct() {
        parent::__construct();
		$this->_AID = $this->session->userdata('admin_id');
		if(!$this->_AID || $this->_AID == 0)
		{
			redirect('admin');
		}
    }
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data=array();
		
		$query = $this->db->get_where(DB.'candidate',array('status'=>1));
		$data['candidates'] = $query->result();
			
		$data['side_bar'] ='templates/admin/side_bar';
		$this->template->load('templates/template_admin_dashboard','admin/candidates',$data);
		
	}
	
	public function view_messages()
	{
		$data=array();
		$id=$this->uri->segment(3);
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'messages',array('sender_id'=>$id,'status'=>1));
		$data['messages'] = $detail= $query->result();
		$data['cid'] = $id;
			
		$data['side_bar'] ='templates/admin/side_bar';
		$this->template->load('templates/template_admin_dashboard','admin/messages',$data);
	}
	
	function get_messages()
	{
		$id=$this->uri->segment(3);
		
		if(isset($id) && $id>0)
		{
			$query = $this->db->query('SELECT c.id AS cid,c.`first_name`,c.`last_name`,c.profile_picture,m.id,m.sender_id,m.recipient_id,m.`body`,m.`created_at` FROM vc_messages m LEFT JOIN vc_candidate c ON c.id=m.`sender_id` WHERE (m.`sender_id`='.$id.' OR m.`recipient_id`='.$id.') AND m.`status`=1 ORDER BY m.id ');
			$data['messages'] = $detail= $query->result();
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
	
	function send_message()
	{
		$text_message   = $this->input->post("text_message");
		$recipient_id   = $this->input->post("recipient_id");
		
		if(isset($text_message) && strlen(trim($text_message))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Message is required";
		}
		else
		{
			
			if(isset($recipient_id) && $recipient_id>0)
			{
				$query = $this->db->order_by('id', 'DESC')->get_where(DB.'candidate',array('id'=>$recipient_id,'status'=>1));
				$candidate_detail =  $query->row();
				if(isset($candidate_detail) && !empty($candidate_detail))
				{
					$post_data = array('body'=> $text_message,'recipient_id'=>$recipient_id,'created_at'=>__date_time);
					$this->db->insert(DB.'messages',$post_data);
					$data['status'] = true;		

				
					$this->load->model('Email', 'email_model');
					$subject = "Admin message";
					$mailSubject = 'Query';
					$contact_no=isset($candidate_detail->phone_number)?$candidate_detail->phone_number:"N/A";
					$email=isset($candidate_detail->email)?$candidate_detail->email:"N/A";
					$message=$text_message;
					$full_name = isset($candidate_detail->first_name)?$candidate_detail->first_name." ".$candidate_detail->last_name:"";
					$sendMessage = "<p>Hello,".$full_name."</p><p> Admin has send you a message</p><p><p><b>Email id:</b> ".$email."</p><p><b>Subject:</b> ".$subject."</p><p><b>Message:</b> ".$message."</p>";
					$fromEmail='contactus@vectortechsol.com';
					$toEmail="hassanphp7@gmail";
					//$toEmail="hassanphp7@gmail.com";
					
					$this->email_model->send_email($mailSubject,$sendMessage,$fromEmail,$toEmail,"");
				}
				else
				{
					
					$data['status'] = false;
					$data['message'] = "Message receiving candidate is not available in our data";
				}
								
			}
			else
			{
				$data['status'] = false;
				$data['message'] = "please login to perform this action";
			}
			 
		}
		

		echo json_encode($data);
	}
	public function addjob()
	{
		$data=array();
		$data['type']=1;
		
		$id=$this->uri->segment(3);
		$data['side_bar'] ='templates/admin/side_bar';
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where(DB.'jobs',array('status'=>1,"id"=>$id))->row();
			$data['job']  =$record;
			
			$query_skills = $this->db->order_by('id')->get_where(DB.'skills',array('jid'=>$id));
			$skillsReturn =  $query_skills->result();
			$skills="";
			if(isset($skillsReturn) && !empty($skillsReturn))
			{
				$total=count($skillsReturn)-1;
				foreach($skillsReturn as $key=>$val)
				{
					if($key<$total)
					{
						$comma=",";
					}
					else
					{
						$comma="";
					}
					
					$skills.=$val->name.$comma;
				}
			}
			$data['skills'] = $skills;

		
		}
		$this->template->load('templates/template_admin_dashboard','admin/jobs',$data);
	}
	
	public function submit_job()
	{
		$this->load->library('form_validation');
		
		$job_icon = isset($_FILES['file']['name'])?$_FILES['file']['name']:'';
		$title   = $this->input->post("title_");
		$desc   = trim($this->input->post("desc_"));
		$location   = $this->input->post("location_");
		$salary   = $this->input->post("salary_");
		$type   = $this->input->post("type_");
		$featured   = $this->input->post("featured_");
		
		$skills   = $this->input->post("skills");
		$zip_code   = $this->input->post("zip_code");
		$state   = $this->input->post("state");
		$city   = $this->input->post("city");
		$company   = $this->input->post("company");
		
		$skillsArray = explode(",",$skills);
		
		
		$id   = $this->input->post("job_id_");
		if(isset($title) && strlen(trim($title))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Title is required";
		}
		/*elseif(isset($title) && strlen(trim($title))>100)
		{
			$data['status'] = false;
			$data['message'] = "Title must not exceed 100 letters";
		}*/
		elseif(isset($location) && strlen(trim($location))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Location is required";
		}
		elseif(isset($salary) && strlen(trim($salary))>250)
		{
			$data['status'] = false;
			$data['message'] = "Salary must not exceed 250 letters";
		}
		elseif(isset($skills) && strlen(trim($skills))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Skills are required";
		}
		elseif(isset($company) && strlen(trim($company))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Company name is required";
		}
		elseif(isset($zip_code) && strlen(trim($zip_code))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Zip code is required";
		}
		else
		{
			
			if(isset($id) && $id>0)
			{
				$this->db->set('title', $title);
				$this->db->set('desc', $desc);
				$this->db->set('location', $location);
				$this->db->set('salary', $salary);
				$this->db->set('type', $type);
				$this->db->set('featured', $featured);
				$this->db->set('company', $company);
				$this->db->set('zip_code', $zip_code);
				$this->db->set('state', $state);
				$this->db->set('city', $city);
				$this->db->set('updated_at', __date_time);
				$this->db->where('id', $id);
				if($this->db->update(DB.'jobs'))
				{
					if(isset($skillsArray) && !empty($skillsArray))
					{
						$this->db->where('jid', $id);
						$this->db->delete(DB.'skills');
						foreach($skillsArray as $key=>$val)
						{	
							$post_data = array('name'=> $val,'jid'=>$id,'created_at'=>__date_time);
							$this->db->insert(DB.'skills',$post_data);
						}
					}
					
					if(isset($job_icon) && $job_icon!="")
					{
						$this->do_upload($id,$job_icon);
					}
					else
					{
						$data['message'] = "Job icon can not be uploaded please contact with administration";
					}
					
					$data['status'] = true;
				}
				else
				{
					$data['status'] = false;
					$data['message'] = "Database is not working please contact with administration";
				}
				
			}
			else
			{
				$post_data = array('title'=> $title,'desc'=>$desc,'location'=>$location,'salary'=>$salary,'type'=>$type,'featured'=>$featured,'company'=>$company,'zip_code'=>$zip_code,'state'=>$state,'city'=>$city,'created_at'=>__date_time);
				if($this->db->insert(DB.'jobs',$post_data))
				{
					$job_id = $this->db->insert_id();
					if(isset($skillsArray) && !empty($skillsArray))
					{
						
						foreach($skillsArray as $key=>$val)
						{	
							$post_data = array('name'=> $val,'jid'=>$job_id,'created_at'=>__date_time);
							$this->db->insert(DB.'skills',$post_data);
						}
					}
					if(isset($job_icon) && $job_icon!="")
					{
						$this->do_upload($job_id,$job_icon);
					}
					else
					{
						$data['message'] = "Job icon can not be uploaded please contact with administration";
					}
					
					$data['status'] = true;
				}
				else
				{
					$data['status'] = false;
					$data['message'] = "Database is not working please contact with administration";
				}
			}
			
			 
		}
		

		echo json_encode($data);
	}
	
	public function delete_job()
	{
		$id=$this->uri->segment(3);
		
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where(DB.'jobs',array('status'=>1,"id"=>$id))->row();
			if(isset($record) && !empty($record))
			{
				$this->db->set('status', 0);
				$this->db->set('updated_at', __date_time);
				$this->db->where('id', $id);
				if($this->db->update(DB.'jobs'))
				{
					redirect('admin/jobs?msg="Success"');
				}
				else
				{
					redirect('admin/jobs?msg="Error"');
				}
			}
		}
	}
	public function do_upload($job_id=0,$logo=""){
		if($job_id>0)
		{
			$new_name = time().$logo;
			$config = array(
			'upload_path' => "./assets/jobs",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE,
			'file_name' => $new_name,
			'max_size' => "4000000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "768",
			'max_width' => "1024"
			);
			
			 
			$this->load->library('upload',$config);
			
			if($this->upload->do_upload("file")){
				//$data = array('upload_data' => $this->upload->data());
				$updateData['logo'] = $new_name;
				$this->db->where("id",$job_id);
				if($this->db->update(DB."jobs",$updateData))
				{
					return true;
				}
				else
				{
					return false;
				}
				
				//$result= $this->upload_model->save_upload($title,$image);
				//return $result;
			}
			else
			{
				return $this->upload->display_errors();
			}
		}
		else
		{
			return false;
		}
		
	}
}
