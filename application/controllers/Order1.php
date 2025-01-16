<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

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
	public function addOrder()
	{
		
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = "orders";
		$data["user_type"] = $this->_userType;
		$id=0;
		$data["patient_id"]=0;
		if($this->uri->segment(1)=="add-order")
		{
			$data["patient_id"]=$this->uri->segment(2);
		}
		else
		{
			$id=$this->uri->segment(2);
		}
		
		$data['devices']=array();
		$data['attachments']=array();
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where(DB.'orders',array('status'=>1,"id"=>$id))->row();
			$data['orders']  =$record;
			$data['order_id']  =$id;
			
		}
		
		//$data["carriers"]  = $this->listCarriers();
		
		$query = $this->db->order_by('id', 'DESC')->get_where('recipients',array('status'=>1));
		$data['patients'] = $patients =  $query->result();
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'devices',array('status'=>1));
		$data['devices'] = $devices =  $query->result();
		
		
		
		
		$user_id = $this->session->userdata('user_id');
		
		$this->template->load('templates/template_front_home', 'front/add_order',$data);
	}
	public function manageOrder()
	{
		
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = "orders";
		$data["user_type"] = $this->_userType;

		
		
		$query = $this->db->query('SELECT o.id ,p.`first_name`,p.`email`,d.`device_name`,d.`device_barcode`,o.order_status FROM mz_orders o LEFT JOIN mz_patients p ON p.id=o.patient_id LEFT JOIN mz_devices d ON d.id=o.device_id WHERE o.status=1 ORDER BY o.id DESC');
		$orders = $query->result();
		
		$data['orders'] = isset($orders)?$orders:array();
		
		
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'orders',array('status'=>1));
		$data['total_orders'] =$total_rows  = $query->num_rows();
		
		
		
		$user_id = $this->session->userdata('user_id');
		
		$this->template->load('templates/template_front_home', 'front/manage_orders',$data);
	}
	
	public function submitOrder()
	{
		$this->load->library('form_validation');
		
		$existing_patients   = $this->input->post("existing_patients");
		$existing_devices   = $this->input->post("existing_devices");
		$order_status   = $this->input->post("order_status");
		if($order_status=="")
		{
			$order_status="New";
		}
		$address   = $this->input->post("address");
		$order_date   = $this->input->post("order_date");
		$days_prescribed   = $this->input->post("days_prescribed");
		$devices_prescribed   = $this->input->post("devices_prescribed");
		$rush_indicator   = $this->input->post("rush_indicator");
		$instructions   = $this->input->post("instructions");
		$directions   = $this->input->post("directions");
		$order_detail   = $this->input->post("order_detail");
		$order_id   = $this->input->post("order_id");
		
		
		$this->form_validation->set_rules("existing_patients","Patient","trim|required|numeric");
		$this->form_validation->set_rules("existing_devices","Device","trim|required|numeric");
		$this->form_validation->set_rules("address","Address","trim|required");
		$data['status'] = $this->form_validation->run();
		if ($data['status'] === TRUE)
		{
			if(isset($order_id) && $order_id>0)
			{
				
				$this->db->set('patient_id', $existing_patients);
				$this->db->set('device_id', $existing_devices);
				$this->db->set('order_status', $order_status);
				$this->db->set('address', $address);
				$this->db->set('order_detail', $order_detail);
				$this->db->set('order_date', $order_date);
				$this->db->set('days_prescribed', $days_prescribed);
				$this->db->set('devices_prescribed', $devices_prescribed);
				$this->db->set('rush_indicator', $rush_indicator);
				$this->db->set('instructions', $instructions);
				$this->db->set('directions', $directions);
				$this->db->set('updated_at', __date_time);
				$this->db->where('id', $order_id);
				if($this->db->update(DB.'orders'))
				{
					$data["order_id"] = $order_id;
					$data['status'] = true;
						
				}
				else
				{
					$data['status'] = false;
				}
				
			}
			else
			{
				$post_data = array('patient_id'=> $existing_patients,
				'device_id'=> $existing_devices,
				'address'=> $address,
				'order_date'=> $order_date,
				'days_prescribed'=> $days_prescribed,
				'devices_prescribed'=> $devices_prescribed,
				'rush_indicator'=> $rush_indicator,
				'instructions'=> $instructions,
				'order_detail'=> $order_detail,
				'directions'=> $directions,
				'order_status'=> $order_status,'created_at'=>__date_time);
				
				if($this->db->insert(DB.'orders',$post_data))
				{
					
					$order_id = $this->db->insert_id();
					$data["order_id"] = $order_id;
					//$this->createShipment($order_id);
					$data['status'] = true;
					
				}
				else
				{
					$data['status'] = false;
					$data['message'] = "Database is not working please contact with administration";
				}
			}
			
			 
		}
		else {
			$data['message'] = strip_tags(validation_errors());
		}

		echo json_encode($data);
	}
	
	public function delete_order()
	{
		$id=$this->uri->segment(2);
		
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where(DB.'orders',array('status'=>1,"id"=>$id))->row();
			if(isset($record) && !empty($record))
			{
				$this->db->set('status', 0);
				$this->db->set('updated_at', __date_time);
				$this->db->where('id', $id);
				if($this->db->update(DB.'orders'))
				{
					redirect('manage-orders?msg=Success');
				}
				else
				{
					redirect('manage-orders?msg=Error');
				}
			}
		}
	}
	
	public function orderSummary()
	{
		$id=$this->uri->segment(2);
		$data=array();
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where(DB.'orders',array('status'=>1,"id"=>$id))->row();
			
			if(isset($record) && !empty($record))
			{
				$data["order_id"] = isset($record->id)?$record->id:0;
				$data["patient_id"] = isset($record->patient_id)?$record->patient_id:0;
				$data["device_id"] = isset($record->device_id)?$record->device_id:0;
				$data["address"] = isset($record->address)?$record->address:"";
				$data["order_status"] = isset($record->order_status)?$record->order_status:"";
				$data["order_detail"] = isset($record->order_detail)?$record->order_detail:"";
				if(isset($record->order_date) && empty($record->order_date))
				{
					$date=date_create($record->created_at);


					$data["order_date"] = date_format($date,"Y/m/d");
				}
				else
				{
					$data["order_date"] = isset($record->order_date)?$record->order_date:"";
				}
				
				
				$data["days_prescribed"] = isset($record->days_prescribed)?$record->days_prescribed:"";
				$data["rush_indicator"] = isset($record->rush_indicator)?$record->rush_indicator:0;
				$data["instructions"] = isset($record->instructions)?$record->instructions:"";
				$data["directions"] = isset($record->directions)?$record->directions:"";
				$data["created_at"] = isset($record->created_at)?$record->created_at:"";
			}
		}
		$this->template->load('templates/template_front_home', 'front/order_summary',$data);
	}
	public function orderTracking()
	{
		$id=$this->uri->segment(2);
		$data=array();
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where(DB.'orders',array('status'=>1,"id"=>$id))->row();
			
			if(isset($record) && !empty($record))
			{
				$data["order_id"] = isset($record->id)?$record->id:0;
				$data["patient_id"] = isset($record->patient_id)?$record->patient_id:0;
				$data["device_id"] = isset($record->device_id)?$record->device_id:0;
				$data["address"] = isset($record->address)?$record->address:"";
				$data["order_status"] = isset($record->order_status)?$record->order_status:"";
				$data["order_detail"] = isset($record->order_detail)?$record->order_detail:"";
				$data["order_status_able"] = isset($record->order_status)?$record->order_status:"";
				if(isset($record->order_date) && empty($record->order_date))
				{
					$date=date_create($record->created_at);


					$data["order_date"] = date_format($date,"Y/m/d");
				}
				else
				{
					$data["order_date"] = isset($record->order_date)?$record->order_date:"";
				}
				
				
				$data["days_prescribed"] = isset($record->days_prescribed)?$record->days_prescribed:"";
				$data["rush_indicator"] = isset($record->rush_indicator)?$record->rush_indicator:0;
				$data["instructions"] = isset($record->instructions)?$record->instructions:"";
				$data["directions"] = isset($record->directions)?$record->directions:"";
				$data["created_at"] = isset($record->created_at)?$record->created_at:"";
			}
		}
		$this->template->load('templates/template_front_home', 'front/order_tracking',$data);
	}
	
	
	
	function createShipment($order_id=0)
	{
		$api_data = array('validate_address'=> $full_name,'email'=>$email,'resume_path'=>$resume_path,'job_id'=>$applied_job,'located_country'=>"US",'availability'=>"true",'source_type'=>"",'visa_validity_period'=>"",'immigration_status'=>"",'status'=>"active lead");
		$this->callAPI("POST","http://13.48.249.120/api/shipengine/createShipping",$api_data);
					
	}
	
	function listCarriers()
	{	
		$carriersReturn = array();
		$carriers = callAPI("POST","http://13.48.249.120/api/shipengine/listCarriers",array());
		if(isset($carriers) && !empty($carriers))
		{
			$carriersArray = json_decode($carriers);
			
			if(isset($carriersArray->carriers) && !empty($carriersArray->carriers))
			{
				$carriersData = $carriersArray->carriers;
				foreach($carriersData as $key=>$val)
				{
					$carriersReturn[] = $val->friendly_name;
				}
			}
			
		}
		return $carriersReturn;
	}
}
