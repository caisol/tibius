<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller {

	private $_CID=0;
	function __construct() {
        parent::__construct();
		$this->_CID = $this->session->userdata('candidate_id');
		if(!$this->_CID || $this->_CID == 0)
		{
			redirect('login'); 
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
	public function candidate_edit_profile()
	{
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = $record_num;
		$data['candi_page'] = 'edit_profile';
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'candidate',array('id'=>$this->_CID,'status'=>1));
		$query_skills = $this->db->order_by('id')->get_where(DB.'skills',array('cid'=>$this->_CID));
		$detail =  $query->row();
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
		
		$data['profile'] = $detail;
		$data['skills'] = $skills;

		$data['front_header'] = 'templates/front/candidate/front_header';
		$data['employee_dashboard_wrapper'] = 'templates/front/candidate/employee_dashboard_wrapper';
		$data['candidate_content'] = 'templates/front/candidate/candidate_edit_profile';
		//$data['news_letter'] = 'templates/front/news_letter';
		$data['front_footer'] ='templates/front/front_footer';
		$data['chatbox_wrapper'] ='templates/front/chatbox_wrapper';
		$this->template->load('templates/template_front_candidate', 'front/candidate/dashboard',$data);
	}
	
	public function candidate_resume()
	{
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = $record_num;
		$data['candi_page'] = 'edit_resume';
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'candidate',array('id'=>$this->_CID,'status'=>1));
		
		$detail =  $query->row();
		
		$query_education = $this->db->order_by('id', 'AESC')->get_where(DB.'education',array('cid'=>$this->_CID));
		
		$detailEducation =  $query_education->result();
		
		$query_experience = $this->db->order_by('id', 'AESC')->get_where(DB.'experience',array('cid'=>$this->_CID));
		
		$detailExperience =  $query_experience->result();
		
		$query_qualification = $this->db->order_by('id', 'AESC')->get_where(DB.'qualification',array('cid'=>$this->_CID));
		
		$detailQualification =  $query_qualification->result();
		
		$data['profile'] = $detail;
		$data['detailEducation'] = $detailEducation;
		$data['detailExperience'] = $detailExperience;
		$data['detailQualification'] = $detailQualification;
		$data['front_header'] = 'templates/front/candidate/front_header';
		$data['employee_dashboard_wrapper'] = 'templates/front/candidate/employee_dashboard_wrapper';
		$data['candidate_content'] = 'templates/front/candidate/candidate_edit_resume';
		//$data['news_letter'] = 'templates/front/news_letter';
		$data['front_footer'] ='templates/front/front_footer';
		$data['chatbox_wrapper'] ='templates/front/chatbox_wrapper';
		$this->template->load('templates/template_front_candidate', 'front/candidate/dashboard',$data);
	}
	
	function user_already($email="")
	{
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'candidate',array('id!='=>$this->_CID,"email"=>$email,'status'=>1));
		$profile= $query->row();
		if(isset($profile) && !empty($profile))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	function update_profile()
	{
		$this->load->library('form_validation');
		
		$profile_picture = isset($_FILES['profile_picture']['name'])?$_FILES:'';
		
		$phone_number   = $this->input->post("phone_number_");
		$email   = trim($this->input->post("email_"));
		$website   = $this->input->post("website_");
		$address   = $this->input->post("address_");
		$first_name   = $this->input->post("first_name");
		$middle_name   = $this->input->post("middle_name");
		$last_name   = $this->input->post("last_name");
		$dob   = $this->input->post("dob");
		$relocate   = $this->input->post("relocate");
		$current_job_title   = $this->input->post("current_job_title");
		$experience   = $this->input->post("experience");
		$skills   = $this->input->post("skills");
		$zip_code   = $this->input->post("zip_code");
		$state   = $this->input->post("state");
		$city   = $this->input->post("city");
		$id   = $this->_CID;
		$skillsArray = explode(",",$skills);
		
		if(isset($first_name) && strlen(trim($first_name))<=0)
		{
			$data['status'] = false;
			$data['message'] = "First Name is required";
		}
		elseif(isset($first_name) && strlen(trim($first_name))>100)
		{
			$data['status'] = false;
			$data['message'] = "First Name must not exceed 100 letters";
		}
		elseif(isset($email) && strlen(trim($email))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Email is required";
		}
		elseif(isset($email) && strlen(trim($email))>100)
		{
			$data['status'] = false;
			$data['message'] = "Email must not exceed 100 letters";
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$data['status'] = false;
			$data['message'] = "Email is not valid";
		}
		elseif(!$this->user_already($email))
		{
			$data['status'] = false;
			$data['message'] = "Email already";
		}
		elseif(isset($skills) && strlen(trim($skills))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Skills are required";
		}
		elseif(isset($phone_number) && strlen(trim($phone_number))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Phone Number is required";
		}
		elseif(isset($phone_number) && strlen(trim($phone_number))>20)
		{
			$data['status'] = false;
			$data['message'] = "Phone number must not exceed 20 letters";
		}
		elseif(isset($address) && strlen(trim($address))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Address is required";
		}
		else
		{
			
			if(isset($id) && $id>0)
			{
				$this->db->set('email', $email);
				$this->db->set('phone_number', $phone_number);
				$this->db->set('website', $website);
				$this->db->set('address', $address);
				$this->db->set('first_name', $first_name);
				$this->db->set('middle_name', $middle_name);
				$this->db->set('last_name', $last_name);
				$this->db->set('dob', $dob);
				$this->db->set('relocate', $relocate);
				$this->db->set('current_job_title', $current_job_title);
				$this->db->set('experience', $experience);
				$this->db->set('zip_code', $zip_code);
				$this->db->set('state', $state);
				$this->db->set('city', $city);
				$this->db->set('updated_at', __date_time);
				$this->db->where('id', $id);
				if($this->db->update(DB.'candidate'))
				{
					$this->session->set_userdata('candidate_email', $email);
					$this->session->set_userdata('candidate_name', $first_name." ".$last_name);
					if(isset($skillsArray) && !empty($skillsArray))
					{
						$this->db->where('cid', $id);
						$this->db->delete(DB.'skills');
						foreach($skillsArray as $key=>$val)
						{	
							$post_data = array('name'=> $val,'cid'=>$id,'created_at'=>__date_time);
							$this->db->insert(DB.'skills',$post_data);
						}
						
					}
					
					if(isset($profile_picture) && !empty($profile_picture))
					{
						$response = $this->do_upload_profile($id,$profile_picture);
						if($response=="")
						{
							$data['status'] = true;
						}
						else
						{
							$data['status'] = false;
							$data['message'] =  $response;
						}
					}
					else
					{
						$data['status'] = true;
					}
					
					$candidate_data = $this->getCandidateByID($id);
					if(isset($candidate_data) && isset($candidate_data[0]) && isset($candidate_data[0]->id) && $candidate_data[0]->id>0)
					{
						$candidate_data = $candidate_data[0];
						$full_name = $candidate_data->first_name." ".$candidate_data->last_name;
						$email = $candidate_data->email;
						$last_name = $candidate_data->last_name;
						$middle_name = $candidate_data->middle_name;
						$applied_job = 0;
						$resume_path = RESUME_VIEW.$candidate_data->resume;
						$api_data = array(
						'middle_name'=> $middle_name,
						'last_name'=> $last_name,
						'gender'=> "",
						'relocation'=> $candidate_data->relocate,
						'phone'=> $candidate_data->phone_number,
						'located_city'=> $candidate_data->city,
						'located_state'=> $candidate_data->state,
						'address'=> $candidate_data->address,
						'zipcode'=> $candidate_data->zip_code,
						'year_experience'=> $candidate_data->experience,
						'year_experience'=> $candidate_data->experience,
						'current_job_title'=> $candidate_data->current_job_title,
						'location_preference'=> "",
						'ssn'=> "",
						'primary_skills'=> isset($skillsArray)?json_encode($skillsArray):"",
						
						'first_name'=> $full_name,'email'=>$email,'resume_path'=>$resume_path,'job_id'=>$applied_job,'located_country'=>"US",'availability'=>"true",'source_type'=>"",'visa_validity_period'=>"",'immigration_status'=>"",'status'=>"active lead");
						$this->callAPI("POST","https://testvectorjob-api.herokuapp.com/api/candidate/getCandidate",$api_data);
						$this->virtusCandidateByID($id);
					}
								
					
				}
				else
				{
					$data['status'] = false;
					$data['message'] = "Database is not working please contact with administration";
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
	
	function candidate_edit_resume_profile()
	{
	
		$phone_number   = $this->input->post("phone_number");
		
		$email   = trim($this->input->post("email"));
		$website   = $this->input->post("website");
		$address   = $this->input->post("address");
		$current_job_title   = $this->input->post("current_job_title");
		$id   = $this->_CID;
		if(isset($email) && strlen(trim($email))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Email is required";
		}
		elseif(isset($email) && strlen(trim($email))>100)
		{
			$data['status'] = false;
			$data['message'] = "Email must not exceed 100 letters";
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$data['status'] = false;
			$data['message'] = "Email is not valid";
		}
		elseif(!$this->user_already($email))
		{
			$data['status'] = false;
			$data['message'] = "Email already";
		}
		elseif(isset($phone_number) && strlen(trim($phone_number))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Phone Number is required";
		}
		elseif(isset($phone_number) && strlen(trim($phone_number))>20)
		{
			$data['status'] = false;
			$data['message'] = "Phone number must not exceed 20 letters";
		}
		elseif(isset($address) && strlen(trim($address))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Address is required";
		}
		else
		{
			
			if(isset($id) && $id>0)
			{
				$this->db->set('email', $email);
				$this->db->set('phone_number', $phone_number);
				$this->db->set('website', $website);
				$this->db->set('address', $address);
				$this->db->set('current_job_title', $current_job_title);
				$this->db->set('updated_at', __date_time);
				$this->db->where('id', $id);
				if($this->db->update(DB.'candidate'))
				{
					
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
				$data['status'] = false;
				$data['message'] = "please login to perform this action";
			}
			 
		}
		

		echo json_encode($data);
	}
	
	function candidate_edit_resume_aboutus()
	{
	
		$about_us   = $this->input->post("about_us");
		
		$id   = $this->_CID;
		if(isset($about_us) && strlen(trim($about_us))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Please describe about your self";
		}
		else
		{
			if(isset($id) && $id>0)
			{
				$this->db->set('about_us', $about_us);
				$this->db->set('updated_at', __date_time);
				$this->db->where('id', $id);
				if($this->db->update(DB.'candidate'))
				{
					
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
				$data['status'] = false;
				$data['message'] = "please login to perform this action";
			}
			 
		}
		

		echo json_encode($data);
	}
	
	function candidate_edit_resume_education()
	{
	
		$education_desc   = $this->input->post("education_desc");
		$period   = $this->input->post("period");
		$institute   = $this->input->post("institute");
		$title   = $this->input->post("title");
		$education_descArray = explode(",",$education_desc);
		$periodArray = explode(",",$period);
		$instituteArray = explode(",",$institute);
		$titleArray = explode(",",$title);
		
		if(isset($title) && strlen(trim($title))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Title is required";
		}
		elseif(isset($institute) && strlen(trim($institute))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Institute is required";
		}
		elseif(isset($period) && strlen(trim($period))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Period is required";
		}
		elseif(isset($education_desc) && strlen(trim($education_desc))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Education  description is required";
		}
		else
		{
			$id   = $this->_CID;
		
			if(isset($id) && $id>0)
			{
				$this->db->where('cid', $id);
				if($this->db->delete(DB.'education'))
				{
					for($i=0;$i<2;$i++)
					{	
						$educationTmp = isset($education_descArray[$i])?$education_descArray[$i]:'';
						$periodTmp = isset($periodArray[$i])?$periodArray[$i]:'';
						$instituteTmp = isset($instituteArray[$i])?$instituteArray[$i]:'';
						$titleTmp = isset($titleArray[$i])?$titleArray[$i]:'';
						$post_data = array('education_desc'=> $educationTmp,'period'=> $periodTmp,'institute'=> $instituteTmp,'title'=> $titleTmp,'cid'=>$id,'created_at'=>__date_time);
						$this->db->insert(DB.'education',$post_data);
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
				$data['status'] = false;
				$data['message'] = "please login to perform this action";
			}
			 
		}
		

		echo json_encode($data);
	}
	
	
	function candidate_edit_resume_experience()
	{
	
		$description_exp   = $this->input->post("description_exp");
		$period_exp1   = $this->input->post("period_exp1");
		$period_exp2   = $this->input->post("period_exp2");
		$company   = $this->input->post("company");
		$title_exp   = $this->input->post("title_exp");
		$description_expArray = explode(",",$description_exp);
		$period_expArray1 = explode(",",$period_exp1);
		$period_expArray2 = explode(",",$period_exp2);
		$companyArray = explode(",",$company);
		$title_expArray = explode(",",$title_exp);
		$loopLenght = count($title_expArray);
		if(isset($title_exp) && strlen(trim($title_exp))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Title is required";
		}
		elseif(isset($company) && strlen(trim($company))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Company is required";
		}
		elseif(isset($period_exp1) && strlen(trim($period_exp1))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Start date is required";
		}
		elseif(isset($description_exp) && strlen(trim($description_exp))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Experience  description is required";
		}
		else
		{
			$id   = $this->_CID;
		
			if(isset($id) && $id>0)
			{
				
				$this->db->where('cid', $id);
				if($this->db->delete(DB.'experience'))
				{
					for($i=0;$i<$loopLenght;$i++)
					{	
						$educationTmp = isset($description_expArray[$i])?$description_expArray[$i]:'';
						$periodTmp1 = isset($period_expArray1[$i])?$period_expArray1[$i]:'';
						$periodTmp2 = isset($period_expArray2[$i])?$period_expArray2[$i]:'';
						$companyTmp = isset($companyArray[$i])?$companyArray[$i]:'';
						$titleTmp = isset($title_expArray[$i])?$title_expArray[$i]:'';
						$post_data = array('description'=> $educationTmp,'period_start'=> $periodTmp1,'period_end'=> $periodTmp2,'company'=> $companyTmp,'title'=> $titleTmp,'cid'=>$id,'created_at'=>__date_time);
						$this->db->insert(DB.'experience',$post_data);
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
				$data['status'] = false;
				$data['message'] = "please login to perform this action";
			}
			 
		}
		

		echo json_encode($data);
	}
	
	function candidate_edit_resume_qualification()
	{
	
		$qualification   = $this->input->post("qualification");
		
		$qualificationArray = explode(",",$qualification);
		
		if(isset($qualification) && strlen(trim($qualification))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Qualification is required";
		}
		else
		{
			$id   = $this->_CID;
		
			if(isset($id) && $id>0)
			{
				
				$this->db->where('cid', $id);
				if($this->db->delete(DB.'qualification'))
				{
					for($i=0;$i<count($qualificationArray);$i++)
					{	
						$qualificationTmp = isset($qualificationArray[$i])?$qualificationArray[$i]:'';
						
						$post_data = array('title'=> $qualificationTmp,'cid'=>$id,'created_at'=>__date_time);
						$this->db->insert(DB.'qualification',$post_data);
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
				$data['status'] = false;
				$data['message'] = "please login to perform this action";
			}
			 
		}
		

		echo json_encode($data);
	}
	
	function candidate_edit_resume_file()
	{
	
		$resume = isset($_FILES['resume']['name'])?$_FILES['resume']['name']:'';

		if(isset($resume) && strlen(trim($resume))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Resume is required";
		}
		else
		{
			$id   = $this->_CID;
		
			if(isset($id) && $id>0)
			{
				
				if(true)
				{
					$resume_name="";
					if(isset($resume) && $resume!="")
					{
						$response = $this->do_upload_resume($resume);
						
						if(isset($response['success']) && $response['success']==1)
						{
							
							$resume_name=isset($response['resume'])?$response['resume']:'';
							$this->db->set('resume', $resume_name);
							$this->db->set('updated_at', __date_time);
							$this->db->where('id', $id);
							if($this->db->update(DB.'candidate'))
							{
								$candidate_data = $this->getCandidateByID($id);
								if(isset($candidate_data) && isset($candidate_data[0]) && isset($candidate_data[0]->id) && $candidate_data[0]->id>0)
								{
									$candidate_data = $candidate_data[0];
									$full_name = $candidate_data->first_name." ".$candidate_data->last_name;
									$email = $candidate_data->email;
									$applied_job = 0;
									$resume_path = RESUME_VIEW.$resume_name;
									$api_data = array('first_name'=> $full_name,'email'=>$email,'resume_path'=>$resume_path,'job_id'=>$applied_job,'located_country'=>"US",'availability'=>"true",'source_type'=>"",'visa_validity_period'=>"",'immigration_status'=>"",'status'=>"active lead");
									$this->callAPI("POST","https://testvectorjob-api.herokuapp.com/api/candidate/getCandidate",$api_data);
									$this->virtusCandidateByID($id);
								}
								
								
								$data['status'] = true;
							}
							else
							{
								$data['status'] = false;
								
								$data['message'] = "Resume can not be uploaded please contact with administration";
							}
						}
						else
						{
							$data['status'] = false;
							$data['message'] = $response;
						}
					}
					else
					{
						$data['message'] = "Resume can not be uploaded please contact with administration";
					}
				}
				else
				{
					$data['status'] = false;
					$data['message'] = "Database is not working please contact with administration";
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
	
	public function do_upload_profile($id=0,$profile_picture){
		if($id>0 && isset($profile_picture["profile_picture"]["name"]))
		{
			
			$profile_picture_name = $profile_picture["profile_picture"]["name"];
			$ext = pathinfo($profile_picture_name, PATHINFO_EXTENSION);

			$profile_picture_name = preg_replace("/[^A-Za-z0-9 ]/", '', $profile_picture_name);
			$new_name = time().".".$ext;
			$config = array(
			'upload_path' => "./assets/profilepictures",
			'allowed_types' => "jpg|png|jpeg",
			'overwrite' => TRUE,
			'file_name' => $new_name,
			'max_size' => "4000000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "768",
			'max_width' => "1024"
			);
			
			 
			$this->load->library('upload',$config);
			
			if($this->upload->do_upload("profile_picture")){
				//$data = array('upload_data' => $this->upload->data());
				$updateData['profile_picture'] = $new_name;
				$this->db->where("id",$id);
				if($this->db->update(DB."candidate",$updateData))
				{
					return "";
				}
				else
				{
					return "Candidate profile can not be updated please contact with admin";
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
			return "Candidate profile can not be updated please contact with admin";
		}
		
	}
	
	
	public function do_upload_resume($resume=""){
		if($resume!="")
		{
			$resume = preg_replace('/\s+/', '', $resume);
			$new_name = time().$resume;
			$config = array(
			'upload_path' => "./assets/resume",
			'allowed_types' => "doc|docx|pdf",
			'overwrite' => TRUE,
			'file_name' => $new_name,
			'max_size' => "5000000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
			
			);
			
			 
			$this->load->library('upload',$config);
			
			if($this->upload->do_upload("resume")){
				//$data = array('upload_data' => $this->upload->data());
				$updateData['resume'] = $new_name;
				
				return array('success'=>true,"resume"=>$new_name);
				
				
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
			return array();
		}
		
	}
	

	
	public function applied_jobs()
	{
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = $record_num;
		$data['candi_page'] = 'applied_jobs';
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'candidate',array('id'=>$this->_CID,'status'=>1));
		$data['profile'] = $detail= $query->row();
		
		 $this->load->model('Jobs', 'jobs_model');
		$data['applied_jobs'] = $this->jobs_model->applied_jobs();
		$data['front_header'] = 'templates/front/candidate/front_header';
		$data['employee_dashboard_wrapper'] = 'templates/front/candidate/employee_dashboard_wrapper';
		$data['candidate_content'] = 'templates/front/candidate/applied_jobs';
		//$data['news_letter'] = 'templates/front/news_letter';
		$data['front_footer'] ='templates/front/front_footer';
		$data['chatbox_wrapper'] ='templates/front/chatbox_wrapper';
		$this->template->load('templates/template_front_candidate', 'front/candidate/dashboard',$data);
	}
	public function favourite_jobs()
	{
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = $record_num;
		$data['candi_page'] = 'favourite_jobs';
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'candidate',array('id'=>$this->_CID,'status'=>1));
		$data['profile'] = $detail= $query->row();
		
		 $this->load->model('Jobs', 'jobs_model');
		$data['favourite_jobs'] = $this->jobs_model->favourite_jobs();
		$data['front_header'] = 'templates/front/candidate/front_header';
		$data['employee_dashboard_wrapper'] = 'templates/front/candidate/employee_dashboard_wrapper';
		$data['candidate_content'] = 'templates/front/candidate/favourite_jobs';
		//$data['news_letter'] = 'templates/front/news_letter';
		$data['front_footer'] ='templates/front/front_footer';
		$data['chatbox_wrapper'] ='templates/front/chatbox_wrapper';
		$this->template->load('templates/template_front_candidate', 'front/candidate/dashboard',$data);
	}
	
	public function matching_jobs()
	{
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = $record_num;
		$data['candi_page'] = 'matching_jobs';
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'candidate',array('id'=>$this->_CID,'status'=>1));
		$data['profile'] = $detail= $query->row();
		
		 $this->load->model('Jobs', 'jobs_model');
		$data['matching_jobs'] = $this->jobs_model->matching_jobs(true);
		$data['front_header'] = 'templates/front/candidate/front_header';
		$data['employee_dashboard_wrapper'] = 'templates/front/candidate/employee_dashboard_wrapper';
		$data['candidate_content'] = 'templates/front/candidate/matching_jobs';
		//$data['news_letter'] = 'templates/front/news_letter';
		$data['front_footer'] ='templates/front/front_footer';
		$data['chatbox_wrapper'] ='templates/front/chatbox_wrapper';
		$this->template->load('templates/template_front_candidate', 'front/candidate/dashboard',$data);
	}
	
	
	public function skills()
	{
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = $record_num;
		$data['candi_page'] = 'skills';
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'candidate',array('id'=>$this->_CID,'status'=>1));
		$data['profile'] = $detail= $query->row();
		
		 $this->load->model('Jobs', 'jobs_model');
		$data['matching_jobs'] = $this->jobs_model->matching_jobs(true);
		$data['front_header'] = 'templates/front/candidate/front_header';
		$data['employee_dashboard_wrapper'] = 'templates/front/candidate/employee_dashboard_wrapper';
		$data['candidate_content'] = 'templates/front/candidate/skills';
		//$data['news_letter'] = 'templates/front/news_letter';
		$data['front_footer'] ='templates/front/front_footer';
		$data['chatbox_wrapper'] ='templates/front/chatbox_wrapper';
		$this->template->load('templates/template_front_candidate', 'front/candidate/dashboard',$data);
	}
	
	
	function get_skills()
	{
		$record_num = $this->input->post("record_num");
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'categories',array('status'=>1,'pid'=>0));
		$total_rows  = $query->num_rows();
		
		$pageno = 1;
		if(isset($record_num) && $record_num>1)
		{
			$pageno = intval($record_num);
		}
		
		$no_of_records_per_page = 1;
		$offset = ($pageno-1)*$no_of_records_per_page; 
		
		$total_pages = ceil($total_rows / $no_of_records_per_page);
		
		//echo "SELECT * FROM ".DB."categories WHERE pid=0 && status=1  LIMIT ".$offset.",".$no_of_records_per_page;
		$query_parents = $this->db->query("SELECT * FROM ".DB."categories WHERE pid=0 && status=1  LIMIT ".$offset.",".$no_of_records_per_page);
		$data_parents = $query_parents->result();
		
		$return_data=array();
		if(isset($data_parents) && !empty($data_parents))
		{
			foreach($data_parents as $key=>$val)
			{
				$return_data[$key]['parent']['name'] = $val->name;
				$return_data[$key]['parent']['id'] = $val->id;
				$return_data[$key]['parent']['pid'] = $val->pid;
				$query_child = $this->db->query("SELECT * FROM ".DB."categories WHERE pid=".$val->id." && status=1 ");
				$data_child = $query_child->result();
				
				if(isset($data_child) && !empty($data_child))
				{
					foreach($data_child as $k=>$v)
					{
						$return_data[$key]['child'][$k]['name'] = $v->name;
						$return_data[$key]['child'][$k]['id'] = $v->id;
						$return_data[$key]['child'][$k]['pid'] = $v->pid;
					}
				}
				
			}
		}
		
		echo json_encode($return_data); 
	}
	
	
	
	
	
	
	
	function get_skills_json()
	{
		$query_parents = $this->db->query("SELECT * FROM ".DB."categories WHERE pid!=0 && status=1 ");
		$data_parents = $query_parents->result();
		echo json_encode($data_parents);die;
	}

function getSkillByid($id=0)
{
	$query_skill = $this->db->query("SELECT * FROM ".DB."categories WHERE id=".$id." && status=1 ");
	$data_skill = $query_skill->result();
	if(isset($data_skill[0]) && !empty($data_skill[0]))
	{
		return $data_skill[0];
	}
	else
	{
		return false;
	}
}	
	function store_skills_user()
	{
		$skill_id   = $this->input->post("skill_id");
		$experience_level   = $this->input->post("experience_level");
		$candidate_skill_id   = $this->input->post("candidate_skill_id");
		
			$this->getSkillByid($skill_id);
		if(isset($skill_id) && strlen(trim($skill_id))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Skill is required";
		}
		elseif(!$this->getSkillByid($skill_id))
		{
			$data['status'] = false;
			$data['message'] = "Skill is not available ";
		}
		else
		{
			$id   = $this->_CID;
		
			if(isset($id) && $id>0)
			{
				if(isset($candidate_skill_id) && $candidate_skill_id>0)
				{
					$this->db->set('skill_id', $skill_id);
					$this->db->set('experience_level', $experience_level);
					$this->db->where('id', $candidate_skill_id);
					if($this->db->update(DB.'candidate_skills'))
					{
						$data['status'] = true;
					}
					else
					{
						$data['status'] = false;
						$data['message'] = "Data is not update please contact with admin!";
					}
				}
				else
				{
					$post_data = array('skill_id'=> $skill_id,'experience_level'=> $experience_level,'cid'=>$id,'created_at'=>__date_time);
					$this->db->insert(DB.'candidate_skills',$post_data);
					$data['status'] = true;
					
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
	
	
	function get_skills_candidate()
	{
		$id   = $this->_CID;
		$query_skills = $this->db->query("SELECT cs.skill_id,c.name,cs.experience_level, cs.id AS candidate_skill_id,cc.name AS parent FROM ".DB."candidate_skills cs   LEFT JOIN ".DB."categories c ON cs.skill_id=c.id 
		LEFT JOIN vc_categories cc ON cc.id=c.pid 
		WHERE cs.cid=".$id);
		$data_skills = $query_skills->result();
		
		echo json_encode($data_skills); die;
	}
	
	function getCandidateByID($id=0)
	{
		$query_candidate = $this->db->query("SELECT * FROM ".DB."candidate WHERE id=".$id);
		return $query_candidate = $query_candidate->result();
	}
	function virtusCandidateByID($id=0)
	{
		return $this->db->query("UPDATE ".DB."candidate SET virtus=1 WHERE id=".$id);
	}
	
	function callAPI($method, $url, $data){
		$data = json_encode($data);
	   $curl = curl_init();
	   			 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	   switch ($method){
		  case "POST":
			 curl_setopt($curl, CURLOPT_POST, 1);
			 if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			 break;
		  case "PUT":
			 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
			 if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
			 break;
		  default:
			 if ($data)
				$url = sprintf("%s?%s", $url, http_build_query($data));
	   }
	   // OPTIONS:
	   curl_setopt($curl, CURLOPT_URL, $url);
	   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		  'token-key: d801298d6b7ca5361381ba7a5f85471f',
		  'Content-Type: application/json',
	   ));
	   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	   // EXECUTE:
	   $result = curl_exec($curl);
	   if(!$result){die("Connection Failure");}
	   curl_close($curl);
	   //d($result,1);
	   return $result;
	}
	
}
