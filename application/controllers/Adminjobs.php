<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminjobs extends CI_Controller {

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
		
		$query = $this->db->get_where(DB.'jobs',array('status'=>1));
		$data['jobs'] = $query->result();
			
		$data['side_bar'] ='templates/admin/side_bar';
		$this->template->load('templates/template_admin_dashboard','admin/jobs',$data);
		
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
		$experience   = $this->input->post("experience");
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
				$this->db->set('experience', $experience);
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
				$post_data = array('title'=> $title,'desc'=>$desc,'location'=>$location,'salary'=>$salary,'experience'=>$experience,'type'=>$type,'featured'=>$featured,'company'=>$company,'zip_code'=>$zip_code,'state'=>$state,'city'=>$city,'created_at'=>__date_time);
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
