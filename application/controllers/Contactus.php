<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {

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
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = $record_num;
		
		$data['front_header'] = 'templates/front/front_header';
		$data['contactus'] = 'templates/front/contactus/contactus';
		$data['map_wrapper'] = 'templates/front/contactus/map_wrapper';
		$data['news_letter'] = 'templates/front/news_letter';
		
		
		$data['front_footer'] ='templates/front/front_footer';
		$data['chatbox_wrapper'] ='templates/front/chatbox_wrapper';
		$this->template->load('templates/template_front_home', 'front/contactus',$data);
	}
	public function contact_us()
	{
		$this->load->library('form_validation');
		$this->load->model('Email', 'email_model');


		$full_name   = $this->input->post("full_name");
		$email   = $this->input->post("email");
		$message   = $this->input->post("message");
		$this->form_validation->set_rules("full_name","Full Name","trim|required|max_length[100]");
		$this->form_validation->set_rules("email","Email","trim|required|max_length[100]");
		$this->form_validation->set_rules("message","Message","trim|required|max_length[100]");
		$data['status'] = $this->form_validation->run();
		if ($data['status'] === TRUE)
		{
			$post_data = array('name'=> $full_name,'email'=>$email,'message'=>($message),'created_at'=>__date_time);
			if($this->db->insert(DB.'contactus',$post_data))
			{
				
				$subject = "Contact Us";
				$mailSubject = 'Contact Details';
				$contact_no="N/A";
				$sendMessage = "<p>Hello,</p><p>".$full_name." has sent a message having </p><p><b>Phone No:</b> ".$contact_no."</p><p><b>Email id:</b> ".$email."</p><p><b>Subject:</b> ".$subject."</p><p><b>Query is:</b> ".$message."</p>";
				$fromEmail='contactus@vectortechsol.com';
				$toEmail="waqarab85@gmail.com";
				$this->email_model->send_email($mailSubject,$sendMessage,$fromEmail,$toEmail);

				$data['status'] = true;
			}
			else
			{
				$data['status'] = false;
				$data['message'] = "Database is not working please contact with administration";
			}
			 
		}
		else {
			$data['message'] = strip_tags(validation_errors());
		}

		echo json_encode($data);
	}
}
