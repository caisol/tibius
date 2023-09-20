<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminskills extends CI_Controller {

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
		
		$query_categories = $this->db->query("SELECT c.id,c.name,c.created_at,p.id AS parentid,p.name AS parentname FROM ".DB."categories c LEFT JOIN ".DB."categories p ON c.pid=p.id WHERE c.status=1 GROUP BY c.id ");
		$data['categories'] = $query_categories->result();
			
		$data['side_bar'] ='templates/admin/side_bar';
		$this->template->load('templates/template_admin_dashboard','admin/categories',$data);
		
	}
	
	public function addcategory()
	{
		$data=array();
		$data['type']=1;
		
		$id=$this->uri->segment(3);
		$data['side_bar'] ='templates/admin/side_bar';
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where(DB.'categories',array('status'=>1,"id"=>$id))->row();
			$data['category']  =$record;
			
		
		}
		
		$query = $this->db->get_where(DB.'categories',array('status'=>1,'pid'=>0));
		$data['parents'] = $query->result();
		
		$this->template->load('templates/template_admin_dashboard','admin/categories',$data);
	}
	
	public function submit_category()
	{
		$this->load->library('form_validation');
		
		
		$title   = $this->input->post("name_");
		$pid   = trim($this->input->post("pid_"));
		
		$id   = $this->input->post("skill_id_");
		if(isset($title) && strlen(trim($title))<=0)
		{
			$data['status'] = false;
			$data['message'] = "Title is required";
		}
		else
		{
			
			if(isset($id) && $id>0)
			{
				$this->db->set('name', $title);
				$this->db->set('pid', $pid);
				$this->db->set('updated_at', __date_time);
				$this->db->where('id', $id);
				if($this->db->update(DB.'categories'))
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
				$post_data = array('name'=> $title,'pid'=>$pid,'created_at'=>__date_time);
				if($this->db->insert(DB.'categories',$post_data))
				{
					$cat_id = $this->db->insert_id();
					
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
	
	public function delete_category()
	{
		$id=$this->uri->segment(3);
		
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where(DB.'categories',array('status'=>1,"id"=>$id))->row();
			if(isset($record) && !empty($record))
			{
				$this->db->set('status', 0);
				$this->db->set('updated_at', __date_time);
				$this->db->where('id', $id);
				if($this->db->update(DB.'categories'))
				{
					redirect('admin/skills?msg="Success"');
				}
				else
				{
					redirect('admin/skills?msg="Error"');
				}
			}
		}
	}
}
