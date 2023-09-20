<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	private $_AID=0;
	function __construct() {
        parent::__construct();
		
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
		$this->_AID = $this->session->userdata('admin_id');
		if(!$this->_AID || $this->_AID == 0)
		{
			$this->load->view('admin/admin_login',$data); 
		}
		else
		{
			$data['side_bar'] ='templates/admin/side_bar';
			$this->template->load('templates/template_admin_dashboard','admin/dashboard',$data);
		}
		
		
	}
	
	public function verifyUser()
	{
		$this->load->library('form_validation');
		$user_name   = $this->input->post("user_name");
		$password   = $this->input->post("password");
		$this->form_validation->set_rules("user_name","User name","trim|required|max_length[100]");
		$this->form_validation->set_rules("password","Password","trim|required|max_length[50]");
		$data['status'] = $this->form_validation->run();
		if ($data['status'] === TRUE)
		{
			$post_data = array('username'=>$user_name,'password'=>md5($password));
			$record = $this->db->get_where(DB.'admin',$post_data)->row();
			
			if ($record && !empty($record))
			{
				
				$admin_id = $record->id;
				$username = $record->username;
				$email = $record->email;
				$this->session->set_userdata('admin_id', $admin_id);
				$this->session->set_userdata('admin_email', $email);
				$this->session->set_userdata('admin_username', $username);

				$data['status'] = true;
			}
			else
			{
				$data['status'] = false;
				$data['message'] = "Credentials are not valid ";
			}
			 
		}
		else {
			$data['message'] = strip_tags(validation_errors());
		}

		echo json_encode($data);
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
	
}
