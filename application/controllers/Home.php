<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	private $_CID=0;
	function __construct() {
        parent::__construct();
		$this->_CID = $this->session->userdata('user_id');
		$this->_userType = $this->session->userdata('user_type');
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
		$data['last_segment'] = 'dashboard';
		
		$data["user_type"] = $this->_userType;
		$data["user_email"] = $this->session->userdata('user_email');
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'user',array('status'=>1,"id"=>$this->_CID));
		$userData = $query->result();
		
		$queryOrders = $this->db->order_by('id', 'DESC')->get_where(DB.'orders',array('status'=>1));
		$totalOrders = $queryOrders->num_rows();
		$data["totalOrders"] = $totalOrders;
		
		$queryDevices = $this->db->order_by('id', 'DESC')->get_where(DB.'devices',array('status'=>1,'product_status'=>0));
		$totalDevices = $queryDevices->num_rows();
		$data["totalDevices"] = $totalDevices;
		if(isset($userData) && isset($userData[0]))
		{
			$userData = $userData[0];
		}
		
		if(isset($userData->first_name))
		{
			$data["user_name"] = $userData->first_name;
			
		}
		$queryOrders = $this->db->query('SELECT o.id as order_id,CONCAT(p.first_name, " ", p.last_name) AS patient_name,
		d.device_name,o.order_date,o.order_status,o.created_at,p.email
		FROM '.DB.'orders o LEFT JOIN '.DB.'patients p ON p.id=o.patient_id LEFT JOIN '.DB.'devices d on d.id=o.device_id WHERE o.status=1 ORDER BY o.id DESC LIMIT 6');
		$dataOrders = $queryOrders->result();
		$data["dataOrders"] = $dataOrders;
		
		$total_devices=2000;
		$data["total_devices_text"] = "Total Devices 2000";
		$chartData=array();
		$Tytohome=200;
		$chartData[0]['y'] = ($Tytohome/$total_devices)*100;
		$chartData[0]['legendText'] = "Tytohome ".$Tytohome;
		$chartData[0]['indexLabel'] = "Tytohome ".$Tytohome;
		
		$Tytocare=340;
		$chartData[1]['y'] = ($Tytocare/$total_devices)*100;
		$chartData[1]['legendText'] = "Tytocare ".$Tytohome;
		$chartData[1]['indexLabel'] = "Tytocare ".$Tytocare;
		
		$Nuvohome=380;
		$chartData[2]['y'] = ($Nuvohome/$total_devices)*100;
		$chartData[2]['legendText'] = "Nuvohome ".$Nuvohome;
		$chartData[2]['indexLabel'] = "Nuvohome ".$Nuvohome;
		
		$Zyphrics=180;
		$chartData[3]['y'] = ($Zyphrics/$total_devices)*100;
		$chartData[3]['legendText'] = "Zyphrics ".$Zyphrics;
		$chartData[3]['indexLabel'] = "Zyphrics ".$Zyphrics;
		
		$Spirohome=540;
		$chartData[4]['y'] = ($Spirohome/$total_devices)*100;
		$chartData[4]['legendText'] = "Spirohome ".$Spirohome;
		$chartData[4]['indexLabel'] = "Spirohome ".$Spirohome;
		
		$Nuvoair=360;
		$chartData[5]['y'] = ($Nuvoair/$total_devices)*100;
		$chartData[5]['legendText'] = "Nuvoair ".$Nuvoair;
		$chartData[5]['indexLabel'] = "Nuvoair ".$Nuvoair;
		$data['chartData'] = json_encode($chartData);
	
		
		
		
		/*
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'jobs',array('status'=>1));
		$data['total_jobs']  = $query->num_rows();
		
		
		
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'jobs',array('status'=>1,"featured"=>1),6);
		$data['featured'] = $query->result();
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'jobs',array('status'=>1,"featured"=>1));
		$data['total_featured']  = $query->num_rows();
		
		
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'jobs',array('status'=>1,"type"=>"Full Time"),6);
		$data['full_time'] = $query->result();
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'jobs',array('status'=>1,"type"=>"Full Time"));
		$data['total_fulltime']  = $query->num_rows();
		
		
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'jobs',array('status'=>1,"type"=>"Part Time"),6);
		$data['part_time'] = $query->result();
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'jobs',array('status'=>1,"type"=>"Part Time"));
		$data['total_parttime']  = $query->num_rows();
		
		
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'jobs',array('status'=>1,"type"=>"Contract"),6);
		$data['contract'] = $query->result();
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'jobs',array('status'=>1,"type"=>"Contract"));
		$data['total_contract']  = $query->num_rows();
		*/
		
			
		
		/*$data['front_header'] = 'templates/front/front_header';
		$data['job_wrapper'] = 'templates/front/job_wrapper';
		$data['job_list_wrapper'] = 'templates/front/job_list_wrapper';
		$data['job_category'] = 'templates/front/job_category';
		$data['grow_next_wrapper'] = 'templates/front/grow_next_wrapper';
		$data['latest_jobs_wrapper'] = 'templates/front/latest_jobs_wrapper';
		$data['counter_wrapper'] = 'templates/front/counter_wrapper';
		$data['company_wrapper'] = 'templates/front/company_wrapper';
		$data['pricing_wrapper'] = 'templates/front/pricing_wrapper';
		$data['job_review'] = 'templates/front/job_review';
		$data['download_app_wrapper'] = 'templates/front/download_app_wrapper';
		$data['blog_wrapper'] = 'templates/front/blog_wrapper';
		
		$data['front_footer'] ='templates/front/front_footer';
		$data['chatbox_wrapper'] ='templates/front/chatbox_wrapper';*/
		$this->template->load('templates/template_front_home_v2', 'front/home_v2',$data);
	}
}
