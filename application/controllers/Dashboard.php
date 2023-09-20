<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	public function index()
	{
		
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = $record_num;
		$data['candi_page'] = 'dashboard';
		$this->load->model('Jobs', 'jobs_model');
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'candidate',array('id'=>$this->_CID,'status'=>1));
		$data['profile'] = $detail= $query->row();
		
		$total_jobs = $this->jobs_model->matching_jobs();
		
		$jobApplied  = $this->jobs_model->applied_jobs();
		
		//$query_fav_jobs = $this->db->order_by('id', 'DESC')->left->get_where(DB.'favourite_jobs',array('cid'=>$this->_CID,'status'=>1));
		
		$query_fav_jobs = $this->db->select('fj.*')
		->from(DB.'favourite_jobs fj')
		->join(DB.'jobs j','j.id = fj.jid','left')
		->where(array('fj.cid'=>$this->_CID,'j.status'=>1))
		->get();

				
		$jobFav= $query_fav_jobs->result();
	
		$data['matching_jobs'] = count($total_jobs);
		$data['applied_jobs'] = count($jobApplied);
		$data['recent_applied_jobs'] = $this->jobs_model->applied_jobs(4);
		$data['favourite_jobs'] = count($jobFav);
		$data['front_header'] = 'templates/front/candidate/front_header';
		$data['employee_dashboard_wrapper'] = 'templates/front/candidate/employee_dashboard_wrapper';
		$data['candidate_content'] = 'templates/front/candidate/candidate_dashboard';
		$data['news_letter'] = 'templates/front/news_letter';
		$data['front_footer'] ='templates/front/front_footer';
		$data['chatbox_wrapper'] ='templates/front/chatbox_wrapper';
		$this->template->load('templates/template_front_candidate', 'front/candidate/dashboard',$data);
	}
	
	function get_address()
	{
		$return = array();
		$zipcode = isset($_POST['zip_code'])?$_POST['zip_code']:'';
		$param_array=array();
		$url="http://api.zippopotam.us/us/".$zipcode;
        try {
            $res = file_get_contents($url);
            $decode = json_decode($res, true);
			$places = isset($decode['places'])?$decode['places']:array();
			$return['place_name'] = $places[0]['place name'];
			$return['state_name'] = $places[0]['state'];
			echo json_encode($return);die;
        }catch (Exception $e){
            d("No",1);
        }
	}
}
