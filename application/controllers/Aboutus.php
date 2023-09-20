<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends CI_Controller {

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
		$data['work_wrapper'] = 'templates/front/aboutus/work_wrapper';
		$data['counter_wrapper'] = 'templates/front/counter_wrapper';
		$data['job_agency_wrapper'] = 'templates/front/aboutus/job_agency_wrapper';
		$data['team_wrapper'] = 'templates/front/aboutus/team_wrapper';
		$data['job_review'] = 'templates/front/job_review';
		$data['download_app_wrapper'] = 'templates/front/download_app_wrapper';
		$data['news_letter'] = 'templates/front/news_letter';
		
		
		$data['front_footer'] ='templates/front/front_footer';
		$data['chatbox_wrapper'] ='templates/front/chatbox_wrapper';
		$this->template->load('templates/template_front_home', 'front/aboutus',$data);
	}
}
