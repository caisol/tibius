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
		$data["user_email"] = $this->session->userdata('user_email');
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
		$data['carriers']=array();
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where(DB.'orders',array('status'=>1,"id"=>$id))->row();
			$data['orders']  =$record;
			$data['order_id']  =$id;
			
			
			$query = $this->db->order_by('id', 'DESC')->get_where(DB.'carriers');
			$data['carriers'] = $carriers =  $query->result();
			if(isset($carriers) && empty($carriers))
			{
				$responseListCarriersApi = callAPI("GET","http://13.48.249.120/api/shipengine/listCarriers",array(),"listCarriers");
				$responseListCarriers = json_decode($responseListCarriersApi);
				
				if(isset($responseListCarriers) && isset($responseListCarriers->carriers) && !empty($responseListCarriers->carriers))
				{
					$carriers = $responseListCarriers->carriers;
					foreach($carriers as $key=>$val)
					{
						/*$data['carriers'][$key]["name"] = isset($val->friendly_name)?$val->friendly_name:'';
						$data['carriers'][$key]["carrier_id"] = isset($val->carrier_id)?$val->carrier_id:'';
						*/
						
						$post_data = array('carrier_id'=> isset($val->carrier_id)?$val->carrier_id:'',
					'carrier_code'=> isset($val->carrier_code)?$val->carrier_code:'',
					'account_number'=> isset($val->account_number)?$val->account_number:'',
					'requires_funded_amount'=> isset($val->requires_funded_amount)?$val->requires_funded_amount:'',
					'balance'=> isset($val->balance)?$val->balance:'',
					'nickname'=> isset($val->nickname)?$val->nickname:'',
					'friendly_name'=> isset($val->friendly_name)?$val->friendly_name:'',
					'supports_label_messages'=> isset($val->supports_label_messages)?$val->supports_label_messages:'',
					'has_multi_package_supporting_services'=> isset($val->has_multi_package_supporting_services)?$val->has_multi_package_supporting_services:'',
					'created_at'=>__date_time);
					$this->db->insert(DB.'carriers',$post_data);
					
						
						$services = (isset($val->services) && !empty($val->services))?$val->services:array();
						if(!empty($services))
						{
							foreach($services as $k=>$v)
							{
								/*$data['carriers'][$key]["services"][$k]["name"] = $v->name;
								$data['carriers'][$key]["services"][$k]["service_code"] = $v->service_code;
								$data['carriers'][$key]["services"][$k]["carrier_code"] = $v->carrier_code;
								*/
								$post_data = array('carrier_id'=> isset($v->carrier_id)?$v->carrier_id:'',
								'service_code'=> isset($v->service_code)?$v->service_code:'',
								'name'=> isset($v->name)?$v->name:'',
								'domestic'=> isset($v->domestic)?$v->domestic:'',
								'international'=> isset($v->international)?$v->international:'',
								'is_multi_package_supported'=> isset($v->is_multi_package_supported)?$v->is_multi_package_supported:'');
								$this->db->insert(DB.'carriers_services',$post_data);
							}
						}
					}
					$query = $this->db->order_by('id', 'DESC')->get_where(DB.'carriers');
					$data['carriers'] = $carriers =  $query->result();
					
				}
			}
			
			
			
		}
		
		//$data["carriers"]  = $this->listCarriers();
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'patients',array('status'=>1));
		$data['patients'] = $patients =  $query->result();
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'devices',array('status'=>1,'product_status'=>0));
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
		$data["user_email"] = $this->session->userdata('user_email');
		$id=$this->uri->segment(2);
		if(isset($id) && $id>0)
		{
			$data['patient_id_tmp'] = $id;
		}
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
		$data['carriers']=array();
		if(isset($data["user_type"]) && $data["user_type"]==2)
		{
			
			$query = $this->db->order_by('id', 'DESC')->get_where(DB.'carriers');
			$data['carriers'] = $carriers =  $query->result();
			if(isset($carriers) && empty($carriers))
			{
				$responseListCarriersApi = callAPI("GET","http://13.48.249.120/api/shipengine/listCarriers",array(),"listCarriers");
				$responseListCarriers = json_decode($responseListCarriersApi);
				
				if(isset($responseListCarriers) && isset($responseListCarriers->carriers) && !empty($responseListCarriers->carriers))
				{
					$carriers = $responseListCarriers->carriers;
					
					foreach($carriers as $key=>$val)
					{
						/*$data['carriers'][$key]["name"] = isset($val->friendly_name)?$val->friendly_name:'';
						$data['carriers'][$key]["carrier_id"] = isset($val->carrier_id)?$val->carrier_id:'';
						*/
						
						$post_data = array('carrier_id'=> isset($val->carrier_id)?$val->carrier_id:'',
					'carrier_code'=> isset($val->carrier_code)?$val->carrier_code:'',
					'account_number'=> isset($val->account_number)?$val->account_number:'',
					'requires_funded_amount'=> isset($val->requires_funded_amount)?$val->requires_funded_amount:'',
					'balance'=> isset($val->balance)?$val->balance:'',
					'nickname'=> isset($val->nickname)?$val->nickname:'',
					'friendly_name'=> isset($val->friendly_name)?$val->friendly_name:'',
					'supports_label_messages'=> isset($val->supports_label_messages)?$val->supports_label_messages:'',
					'has_multi_package_supporting_services'=> isset($val->has_multi_package_supporting_services)?$val->has_multi_package_supporting_services:'',
					'created_at'=>__date_time);
					$this->db->insert(DB.'carriers',$post_data);
					
						
						$services = (isset($val->services) && !empty($val->services))?$val->services:array();
						if(!empty($services))
						{
							foreach($services as $k=>$v)
							{
								/*$data['carriers'][$key]["services"][$k]["name"] = $v->name;
								$data['carriers'][$key]["services"][$k]["service_code"] = $v->service_code;
								$data['carriers'][$key]["services"][$k]["carrier_code"] = $v->carrier_code;
								*/
								$post_data = array('carrier_id'=> isset($v->carrier_id)?$v->carrier_id:'',
								'service_code'=> isset($v->service_code)?$v->service_code:'',
								'name'=> isset($v->name)?$v->name:'',
								'domestic'=> isset($v->domestic)?$v->domestic:'',
								'international'=> isset($v->international)?$v->international:'',
								'is_multi_package_supported'=> isset($v->is_multi_package_supported)?$v->is_multi_package_supported:'');
								$this->db->insert(DB.'carriers_services',$post_data);
							}
						}
					}
					$query = $this->db->order_by('id', 'DESC')->get_where(DB.'carriers');
					$data['carriers'] = $carriers =  $query->result();
					
				}
			}
			
			
			
		}
		
		//$data["carriers"]  = $this->listCarriers();
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'patients',array('status'=>1));
		$data['patients'] = $patients =  $query->result();
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'devices',array('status'=>1,'product_status'=>0));
		$data['devices'] = $devices =  $query->result();
		
		
		
		
		$user_id = $this->session->userdata('user_id');
		
		
		
		$query = $this->db->query('SELECT o.id ,p.`first_name`,p.`email`,d.`device_name`,d.`device_barcode`,o.order_status FROM mz_orders o LEFT JOIN mz_patients p ON p.id=o.patient_id LEFT JOIN mz_devices d ON d.id=o.device_id WHERE o.status=1 ORDER BY o.id DESC');
		$orders = $query->result();
		
		$data['orders'] = isset($orders)?$orders:array();
		
		
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'orders',array('status'=>1));
		$data['total_orders'] =$total_rows  = $query->num_rows();
		
		
		
		$user_id = $this->session->userdata('user_id');
		
		$this->template->load('templates/template_front_home_v2', 'front/manage_orders_v2',$data);
	}
	
	public function submitOrder()
	{
		$this->load->library('form_validation');
		
		$existing_patients   = $this->input->post("existing_patients");
		$existing_devices   = $this->input->post("existing_devices");
		$order_status   = $this->input->post("order_status");
		$user_type   = $this->input->post("user_type");
		if(strlen($order_status)==0)
		{
			$order_status="New";
		}
		elseif($order_status==1)
		{
			$order_status="Review";
		}
		elseif($order_status==2)
		{
			$order_status="Submitted";
		}
		
		$address   = $this->input->post("address");
		$order_date   = $this->input->post("order_date");
		$days_prescribed   = $this->input->post("days_prescribed");
		$devices_prescribed   = $this->input->post("devices_prescribed");
		$rush_indicator   = $this->input->post("rush_indicator");
		$instructions   = $this->input->post("instructions");
		$directions   = $this->input->post("directions");
		$order_detail   = $this->input->post("order_detail");
		$carriers_services   = $this->input->post("carriers_services");
		$carriers_id   = $this->input->post("carriers_id");
		$order_id   = $this->input->post("order_id");
		
		
		$this->form_validation->set_rules("existing_patients","Patient","trim|required|numeric");
		$this->form_validation->set_rules("existing_devices","Device","trim|required|numeric");
		if(isset($user_type) && $user_type!=2)
		{
			$this->form_validation->set_rules("address","Address","trim|required");
		}
		
		$data['status'] = $this->form_validation->run();
		
		if ($data['status'] === TRUE)
		{
			
			if(isset($order_id) && $order_id>0)
			{
				$recordOrder = $this->db->get_where(DB.'orders',array("id"=>$order_id))->row();
				
			
				$this->db->set('patient_id', $existing_patients);
				$this->db->set('device_id', $existing_devices);
				$this->db->set('address', $address);
				
				
				$this->db->set('order_detail', $order_detail);
				$this->db->set('order_date', $order_date);
				$this->db->set('days_prescribed', $days_prescribed);
				$this->db->set('devices_prescribed', $devices_prescribed);
				$this->db->set('order_status', $order_status);
				$this->db->set('rush_indicator', $rush_indicator);
				$this->db->set('instructions', $instructions);
				$this->db->set('directions', $directions);
				$this->db->set('service_code', $carriers_services);
				$this->db->set('carrier_id', $carriers_id);
				$this->db->set('updated_at', __date_time);
				$this->db->where('id', $order_id);
				if($this->db->update(DB.'orders'))
				{
					$recordOrder = $this->db->get_where(DB.'orders',array("id"=>$order_id))->row();
					$data["order_id"] = $order_id;
					$data['status'] = true;
				
					if($this->_userType==2 && $order_status!="Submitted")
					{
						$data['status'] = false;
						$data['message'] = "Shipment is not created please mark status to Submitted";
					}
					elseif($this->_userType==2)
					{
						
						if(isset($recordOrder->order_status) && $recordOrder->order_status=="Submitted")
						{
					
							if(isset($recordOrder->tracking_number) && $recordOrder->tracking_number!="")
							{
								$data['status'] = false;
								$data['message'] = "Shipment is already created please view  <a style='color:#007bff !important;'  href='".base_url("order-summary/").$order_id."' >order summary</a> ";

							}
							else
							{
								$responseShipment = $this->createShipment($order_id);
								$data['responseShipment'] = $responseShipment;
							}
					
						}
						else
						{
							$data['status'] = false;
							$data['message'] = "Shipment is not created please mark status to Submitted";
						}
					}
					
					
						
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
					//$responseShipment = $this->createShipment($order_id);
					$data['status'] = true;
					//$data['responseShipment'] = $responseShipment;
					
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
		$data['last_segment'] = "orders";
		$data["user_type"] = $this->_userType;
		$data["user_email"] = $this->session->userdata('user_email');
		$id=$this->uri->segment(2);
		
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
				$data["shipment_id"] = isset($record->shipment_id)?$record->shipment_id:"";
				$data["carrier_id"] = isset($record->carrier_id)?$record->carrier_id:"";
				$data["shipment_status"] = isset($record->shipment_status)?$record->shipment_status:"";
				$data["label_id"] = isset($record->label_id)?$record->label_id:"";
				$data["tracking_number"] = isset($record->tracking_number)?$record->tracking_number:"";
				$data["label_download"] = isset($record->label_download)?$record->label_download:"";
				$data["shipping_currency"] = isset($record->shipping_currency)?$record->shipping_currency:"";
				$data["shipping_amount"] = isset($record->shipping_amount)?$record->shipping_amount:"";
				$data["tracking_status"] = isset($record->tracking_status)?$record->tracking_status:"";
				$data["service_code"] = isset($record->service_code)?$record->service_code:"";
				
				if(isset($record->order_date) && empty($record->order_date))
				{
					$date=date_create($record->created_at);


					$data["order_date"] = date_format($date,"Y/m/d");
				}
				elseif(isset($record->ship_date) && !empty($record->ship_date))
				{
					$date=date_create($record->ship_date);

					$data["order_date"] = date_format($date,"Y/m/d");
				}
				
				
				$data["days_prescribed"] = isset($record->days_prescribed)?$record->days_prescribed:"";
				$data["rush_indicator"] = isset($record->rush_indicator)?$record->rush_indicator:0;
				$data["instructions"] = isset($record->instructions)?$record->instructions:"";
				$data["directions"] = isset($record->directions)?$record->directions:"";
				$data["created_at"] = isset($record->created_at)?$record->created_at:"";
			}
		}
		$this->template->load('templates/template_front_home_v2', 'front/order_summary_v2',$data);
	}
	public function orderTracking()
	{
		$data=array();
		$data['last_segment'] = "orders";
		$data["user_type"] = $this->_userType;
		$data["user_email"] = $this->session->userdata('user_email');
		$id=$this->uri->segment(2);
		
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
				$data["shipment_id"] = isset($record->shipment_id)?$record->shipment_id:"";
				$data["carrier_id"] = isset($record->carrier_id)?$record->carrier_id:"";
				$data["shipment_status"] = isset($record->shipment_status)?$record->shipment_status:"";
				$data["label_id"] = isset($record->label_id)?$record->label_id:"";
				$data["tracking_number"] = $tracking_number = isset($record->tracking_number)?$record->tracking_number:"";
				$data["label_download"] = isset($record->label_download)?$record->label_download:"";
				$data["label_status"] = isset($record->label_status)?$record->label_status:"";
				$data["shipping_currency"] = isset($record->shipping_currency)?$record->shipping_currency:"";
				$data["shipping_amount"] = isset($record->shipping_amount)?$record->shipping_amount:"";
				$data["tracking_status"] = isset($record->tracking_status)?$record->tracking_status:"";
				$data["service_code"] = isset($record->service_code)?$record->service_code:"";
				$data["tracking_status_description"] = isset($record->tracking_status_description)?$record->tracking_status_description:"";
				$data["carrier_status_description"] = isset($record->carrier_status_description)?$record->carrier_status_description:"";
				$data["tracking_status_code"] = isset($record->tracking_status_code)?$record->tracking_status_code:"";
				$data["estimated_delivery_date"] = isset($record->estimated_delivery_date)?$record->estimated_delivery_date:"";
				$data["actual_delivery_date"] = isset($record->actual_delivery_date)?$record->actual_delivery_date:"";

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
				if(false && isset($tracking_number) && !empty($tracking_number))
				{
					$responseTrackShippingApi = callAPI("GET","http://13.48.249.120/api/shipengine/trackShipping/".$tracking_number."",array(),"trackShipping");
				}
				if(isset($responseTrackShippingApi) && !empty($responseTrackShippingApi))
				{
					$responseTrackShippingApiDecoded = json_decode($responseTrackShippingApi);
					if(isset($responseTrackShippingApiDecoded->tracking_number) && !empty($responseTrackShippingApiDecoded->tracking_number))
					{
						$this->db->set('tracking_status_code', $responseTrackShippingApiDecoded->status_code);
						$this->db->set('tracking_status_description', $responseTrackShippingApiDecoded->status_description);
						$this->db->set('carrier_status_description', $responseTrackShippingApiDecoded->carrier_status_description);
						$this->db->set('estimated_delivery_date', $responseTrackShippingApiDecoded->estimated_delivery_date);
						$this->db->set('actual_delivery_date', $responseTrackShippingApiDecoded->actual_delivery_date);
						
						$this->db->set('updated_at', __date_time);
						$this->db->where('id', $id);
						if($this->db->update(DB.'orders'))
						{
							$data["tracking_status_code"] = isset($responseTrackShippingApiDecoded->status_code)?$responseTrackShippingApiDecoded->status_code:"N/A";
							$data["tracking_status_description"] = isset($responseTrackShippingApiDecoded->status_description)?$responseTrackShippingApiDecoded->status_description:"N/A";
							$data["carrier_status_description"] = isset($responseTrackShippingApiDecoded->carrier_status_description)?$responseTrackShippingApiDecoded->carrier_status_description:"N/A";
							$data["estimated_delivery_date"] = isset($responseTrackShippingApiDecoded->estimated_delivery_date)?$responseTrackShippingApiDecoded->estimated_delivery_date:"N/A";
							$data["actual_delivery_date"] = isset($responseTrackShippingApiDecoded->actual_delivery_date)?$responseTrackShippingApiDecoded->actual_delivery_date:"N/A";
				
							$data["available_status"]=true;
						}
						$data["available_status"]=true;
					}
					else
					{
						if(isset($data["tracking_status_code"]) && $data["tracking_status_code"]!="")
						{
							$data["available_status"]=true;
						}
						else
						{
							$data["available_status"]=false;
						}
						
					}
				}
				else
				{
					
					if(isset($data["tracking_status_code"]) && $data["tracking_status_code"]!="")
					{
						$data["available_status"]=true;
					}
					else
					{
						$data["available_status"]=false;
					}
				}
				

			}
		}
		$this->template->load('templates/template_front_home_v2', 'front/order_tracking_v2',$data);
	}
	
	
	
	function createShipment($order_id=0)
	{
		$responseReturn=array();
		$responseReturn["status"]="success";
		$responseReturn["message"]="success";
		$query = $this->db->query('SELECT o.id,o.address ,o.carrier_id ,o.service_code ,
		p.`first_name`,p.`middle_name`,p.`last_name`,
		p.`gfirst_name`,p.`gmiddle_name`,p.`glast_name`,p.pcheck,p.id as patient_id,
		d.device_unit,d.device_numeric_weight,d.device_length,d.device_width,d.device_height
		,p.`email`,d.`device_name`,d.`device_barcode`,o.order_status FROM mz_orders o LEFT JOIN mz_patients p ON p.id=o.patient_id LEFT JOIN mz_devices d ON d.id=o.device_id WHERE o.status=1 AND o.id='.$order_id.' LIMIT 1');
		$ordersDetail = $query->result();
		$service_code="";
		if(isset($ordersDetail[0]) && !empty($ordersDetail[0]))
		{
			$ordersDetail = $ordersDetail[0];
			$service_code = isset($ordersDetail->service_code)?$ordersDetail->service_code:"";
			if(isset($ordersDetail->patient_id) && $ordersDetail->patient_id>0)
			{
				$query = $this->db->query('SELECT * FROM mz_patients_detail WHERE patient_id='.$ordersDetail->patient_id);
				$patientDetail = $query->result();
				
			}
			else
			{
				$responseReturn["status"]="failure";
				$responseReturn["message"]="Patient information is missing";
			}
			
		}
		else
		{
			$responseReturn["status"]="failure";
			$responseReturn["message"]="Patient information is missing";
		}
		$orderAddress = array();
		
		if(!empty($ordersDetail->address))
		{
			$orderAddress = $this->getAddressOrder($ordersDetail->address);
			
		}
		else
		{
			$responseReturn["status"]="failure";
			$responseReturn["message"]="Order address information is missing";
		}
		$name="";
		$phone="";
		if(isset($ordersDetail->pcheck) && $ordersDetail->pcheck>0)
		{
			$name = $ordersDetail->gfirst_name." ".$ordersDetail->gmiddle_name." ".$ordersDetail->glast_name;
			if(isset($patientDetail) && !empty($patientDetail))
			{
				foreach($patientDetail as $key=>$val)
				{
					if($val->gcontact_phone!="")
					{
						$phone = $val->gcontact_phone;
						break;
					}
				}
			}
			
			//$phone = $ordersDetail->
		}
		else
		{
			$name = $ordersDetail->first_name." ".$ordersDetail->middle_name." ".$ordersDetail->last_name;
			if(isset($patientDetail) && !empty($patientDetail))
			{
				foreach($patientDetail as $key=>$val)
				{
					if($val->patinet_contact_phone!="")
					{
						$phone = $val->patinet_contact_phone;
						break;
					}
				}
			}
		}
		$ship_to=array();
		$ship_from=array();
		
		if(!empty($orderAddress))
		{
			
			$ship_to=array("name"=>$name,"phone"=>$phone,
			"address_line1"=>isset($orderAddress["addressLine1"])?$orderAddress["addressLine1"]:"",
			"city_locality"=>isset($orderAddress["city"])?$orderAddress["city"]:"",
			"state_province"=>isset($orderAddress["state"])?trim($orderAddress["state"]):"",
			"postal_code"=>isset($orderAddress["zipcode"])?$orderAddress["zipcode"]:"",
			"country_code"=>"US"
			);
			$ship_from=array(
			"company_name"=>"Vectortechsol Medzah",
			"name"=>"Vectortechsol",
			"phone"=>"111-111-1111",
			"address_line1"=>"4009 Marathon Blvd",
			"address_line2"=>"Suite 300",
			"city_locality"=>"Austin",
			"state_province"=>"TX",
			"postal_code"=>"78756",
			"country_code"=>"US"
			);
		}
		else
		{
			$responseReturn["status"]="failure";
			$responseReturn["message"]="Order address information is missing";
		}
		$packages=array();
		if(isset($ordersDetail->device_unit) && isset($ordersDetail->device_numeric_weight))
		{
			$ordersDetail->device_unit='pound';
			$packages=array(
				"weight"=>array(
					"value"=>$ordersDetail->device_numeric_weight,
					"unit"=>$ordersDetail->device_unit
				)
			);
		}
		$dimensions["dimensions"]=array(
				"unit"=>"inch",
				"length"=>$ordersDetail->device_length,
				"width"=>$ordersDetail->device_width,
				"height"=>$ordersDetail->device_height
			);
		
		$order_data=array('validate_address'=>'no_validation',
						'service_code'=>$service_code,
						'ship_to'=>$ship_to,
						'ship_from'=>$ship_from,
						'confirmation'=>'none',
						'advanced_options'=>array(),
						'insurance_provider'=>'none',
						'tags'=>array(),
						'packages'=>array($packages),
						$dimensions
						);
		
		$shipments_data = (array('shipments'=>array($order_data) ));
		
		$responseShipmentApi = callAPI("POST","http://13.48.249.120/api/shipengine/createShipping",$shipments_data,"createShipping");
	
		if(isset($responseShipmentApi) && !empty($responseShipmentApi))
		{
			$responseShipmentApiResponse = json_decode($responseShipmentApi);
			if(isset($responseShipmentApiResponse->errors) && !empty($responseShipmentApiResponse->errors))
			{
				$errors = $responseShipmentApiResponse->errors;
				$responseReturn["status"]="failure";
				$responseReturn["message"]=isset($errors[0]->message)?$errors[0]->message:"Shipment id is not available  please contact with admin";
				
			}
			elseif(isset($responseShipmentApiResponse->shipments) && $responseShipmentApiResponse->shipments!="")
			{
				$shipments = $responseShipmentApiResponse->shipments;
				if(isset($shipments) && isset($shipments[0]) && !empty($shipments[0]))
				{
					$shipments = $shipments[0];
					if($shipments->shipment_id!="")
					{
						$this->db->set('shipment_id', $shipments->shipment_id);
						$this->db->set('carrier_id', $shipments->carrier_id);
						$this->db->set('service_code', $shipments->service_code);
						$this->db->set('ship_date', $shipments->ship_date);
						$this->db->set('shipment_status', $shipments->shipment_status);
						$this->db->set('order_status', "Submitted");
						$this->db->set('shipment_response', $responseShipmentApi);
						$this->db->set('updated_at', __date_time);
						$this->db->where('id', $order_id);
						if($this->db->update(DB.'orders'))
						{
							$responseReturn["status"]="success";
							$responseReturn["message"]="Order shipment is created";
						}
					}
					$responseLabelApi = callAPI("GET","http://13.48.249.120/api/shipengine/createShippingLabel/".$shipments->shipment_id."",array(),"createShippingLabel");
					if(isset($responseLabelApi) && !empty($responseLabelApi))
					{
						
						$responseLabelDecoded = json_decode($responseLabelApi);
						if(isset($responseLabelDecoded->errors) && !empty($responseLabelDecoded->errors))
						{
							$errors = $responseLabelDecoded->errors;
							$message = isset($errors[0]->message)?$errors[0]->message:"Shipment can not be created please verify your carrier and package information";
							$responseReturn["status"]="failure";
							$responseReturn["message"]=$message;
						}
						else
						{
							$shipment_cost = $responseLabelDecoded->shipment_cost;
							$label_download = $responseLabelDecoded->label_download;
							$tracking_number = $responseLabelDecoded->tracking_number;
							$currency = isset($shipment_cost->currency)?$shipment_cost->currency:'';
							$amount = isset($shipment_cost->amount)?$shipment_cost->amount:"";
							
							$label_pdf = isset($label_download->pdf)?$label_download->pdf:'';
							$this->db->set('label_id', $responseLabelDecoded->label_id);
							$this->db->set('label_status', $responseLabelDecoded->status);
							$this->db->set('shipping_currency', $currency);
							$this->db->set('shipping_amount', $amount);
							$this->db->set('tracking_number', $responseLabelDecoded->tracking_number);
							$this->db->set('tracking_status', $responseLabelDecoded->tracking_status);
							$this->db->set('label_download', $label_pdf);
							$this->db->set('updated_at', __date_time);
							$this->db->where('id', $order_id);
							if($this->db->update(DB.'orders'))
							{
								$responseReturn["status"]="success";
								$responseReturn["message"]="Label shipment is created";
							}
							else
							{
								$responseReturn["status"]="failure";
								$responseReturn["message"]="Label is not created";
							}
						}
						

					}
					
					
				}
				else
				{
					$responseReturn["status"]="failure";
					$responseReturn["message"]="Shipment id is not available  please contact with admin";
				}
			}
			else
			{
				$responseReturn["status"]="failure";
				$responseReturn["message"]="Shipment have syntex error  please contact with admin";
			}
		}
		else
		{
			$responseReturn["status"]="failure";
			$responseReturn["message"]="Shipment is not created please contact with admin";
		}
		return $responseReturn;
					
	}
	function getAddressOrder($orderAddress=array())
	{
		$return=array();
		$orderAddressTmp = preg_split('/\r\n|\r|\n/', $orderAddress);
		if(isset($orderAddressTmp[0]) && !empty($orderAddressTmp[0]))
		{
			$addressLine1Temp = explode(":",$orderAddressTmp[0]);
			$return["addressLine1"] = isset($addressLine1Temp[1])?$addressLine1Temp[1]:"";
		}
		if(isset($orderAddressTmp[1]) && !empty($orderAddressTmp[1]))
		{
			$addressLine1Temp = explode(":",$orderAddressTmp[1]);
			$return["addressLine2"] = isset($addressLine1Temp[1])?$addressLine1Temp[1]:"";
		}
		if(isset($orderAddressTmp[2]) && !empty($orderAddressTmp[2]))
		{
			$addressLine1Temp = explode(":",$orderAddressTmp[2]);
			$return["zipcode"] = isset($addressLine1Temp[1])?$addressLine1Temp[1]:"";
		}
		if(isset($orderAddressTmp[3]) && !empty($orderAddressTmp[3]))
		{
			$addressLine1Temp = explode(":",$orderAddressTmp[3]);
			$return["city"] = isset($addressLine1Temp[1])?$addressLine1Temp[1]:"";
		}
		if(isset($orderAddressTmp[4]) && !empty($orderAddressTmp[4]))
		{
			$addressLine1Temp = explode(":",$orderAddressTmp[4]);
			$return["state"] = isset($addressLine1Temp[1])?$addressLine1Temp[1]:"";
		}
		return $return;
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
	
	function get_carriers_services()
	{
		$return["status"]="success";
		$carriers_services=array();
		$carriers_id   = $this->input->post("carriers_id");
		if(isset($carriers_id) && !empty($carriers_id))
		{
			
			$query = $this->db->query('SELECT * FROM '.DB.'carriers_services WHERE carrier_id="'.$carriers_id.'" ORDER BY id DESC');
			$carriers_services = $query->result();
		
		}
		else
		{
			$return["status"]="failure";
		}
		$return["data"]=$carriers_services;
		echo json_encode($return);
	}
	
	function get_cost_estimation()
	{
		$return["status"]="success";
		$carriers_services=array();
		$carriers_id   = $this->input->post("carriers_id");
		$carriers_services   = $this->input->post("carriers_services");
		$order_id   = $this->input->post("order_id");
		//$order_id   = 6;
		
		
		$recordOrder = $this->db->get_where(DB.'orders',array("id"=>$order_id))->row();
		if(isset($recordOrder) && !empty($recordOrder) && isset($recordOrder->patient_id) && !empty($recordOrder->patient_id))
		{
			//$recordOrder->patient_id;
			$recordPatient = $this->db->get_where(DB.'patients',array("id"=>$recordOrder->patient_id))->row();
			if(isset($recordPatient) && !empty($recordPatient))
			{
				$query = $this->db->order_by('id', 'DESC')->get_where(DB.'patients_detail',array('patient_id'=>$recordOrder->patient_id));
				$patients_detail =  $query->result();

			}
			
			$patient_name="";
			$address_linea="";
			$address_lineb="";
			$zip_code="";
			$city="";
			$state="";
			$phone_number="";
			$email=isset($recordPatient->email)?$recordPatient->email:"";
			if(isset($recordPatient->pcheck) && $recordPatient->pcheck==0)
			{
				$patient_name = $recordPatient->first_name." ".$recordPatient->middle_name." ".$recordPatient->last_name;
				if(isset($patients_detail) && !empty($patients_detail))
				{
					foreach($patients_detail as $key=>$val)
					{
						if(isset($val->active_shipping_address) && $val->active_shipping_address==1)
						{
							$address_linea = $val->address_linea;
							$address_lineb = $val->address_lineb;
							$zip_code = $val->zip_code;
							$city = $val->city;
							$state = $val->state;
						}
						if(isset($val->active_shipping_contact) && $val->active_shipping_contact==1)
						{
							$phone_number = $val->patinet_contact_phone;
						}
					}
				}
			}
			else
			{
				$patient_name = $recordPatient->gfirst_name." ".$recordPatient->gmiddle_name." ".$recordPatient->glast_name;
				if(isset($patients_detail) && !empty($patients_detail))
				{
					foreach($patients_detail as $key=>$val)
					{
						if(isset($val->gactive_shipping_address) && $val->gactive_shipping_address==1)
						{
							$address_linea = $val->gaddress_linea;
							$address_lineb = $val->gaddress_lineb;
							$zip_code = $val->gzip_code;
							$city = $val->gcity;
							$state = $val->gstate;
						}
						if(isset($val->gactive_shipping_contact) && $val->gactive_shipping_contact==1)
						{
							$phone_number = $val->gcontact_phone;
						}
					}
				}
			}
		}
		
		
		if(isset($recordOrder) && !empty($recordOrder) && isset($recordOrder->device_id) && !empty($recordOrder->device_id))
		{
			//$recordOrder->patient_id;
			$recordDevice = $this->db->get_where(DB.'devices',array("id"=>$recordOrder->device_id))->row();
			if(isset($recordDevice) && !empty($recordDevice) && isset($recordDevice->id) && !empty($recordDevice->id))
			{
				$devices_detail = $this->db->get_where(DB.'devices',array('id'=>$recordOrder->device_id))->row();

			}
			
		}

		//$carriers_id = "se-554566";
		$carrier_idsArray=array("carrier_ids"=>array($carriers_id));
		$rate_options=$carrier_idsArray;
		
		$shipment=array();
		
		
		$estimation_data=array();
		$ship_to=array(
		"name"=>isset($patient_name)?$patient_name:"",
		"address_line1"=>isset($address_linea)?$address_linea:"",
		"city_locality"=>isset($city)?$city:"",
		"state_province"=>isset($state)?$state:"",
		"postal_code"=>isset($zip_code)?$zip_code:"",
		"country_code"=>"US"
		);
		$ship_from=array(
		"company_name"=>"Example Corp.",  
			"name"=>"John Doe",  
			"phone"=>"111-111-1111",  
			"address_line1"=>"4009 Marathon Blvd",  
			"address_line2"=>"Suite 300",  
			"city_locality"=>"Austin",  
			"state_province"=>"TX",  
			"postal_code"=>"78756",  
			"country_code"=>"US"
		);
		$packages=array();
		
		if(isset($devices_detail) && $devices_detail->device_unit=="lb")
		{
			$devices_detail->device_unit="pound";
		}
		else
		{
			$devices_detail->device_unit="pound";
		}
		$weight=array(
		"value"=>isset($devices_detail->device_numeric_weight)?$devices_detail->device_numeric_weight:"",
		"unit"=>isset($devices_detail->device_unit)?$devices_detail->device_unit:""
		
		);
		$dimensions=array("unit"=>"inch","length"=>(isset($devices_detail->device_length)?$devices_detail->device_length:1),
		"width"=>(isset($devices_detail->device_width)?$devices_detail->device_width:1),
		"height"=>(isset($devices_detail->device_height)?$devices_detail->device_height:1));
				$packages=array("weight"=>$weight,"dimensions"=>$dimensions);

		$shipment_data["validate_address"]="no_validation";
		$shipment_data["ship_to"]=$ship_to;
		$shipment_data["ship_from"]=$ship_from;
		$shipment_data["packages"]=array($packages);
		
		$estimation_data["rate_options"] = array("carrier_ids"=>array($carriers_id));
		$estimation_data["shipment"] = $shipment_data;
		
		$rates=array();
		$errorsRate=array();
		$packages=array();
		$total_weight_value="";
		$total_weight_unit="";
		$responseCostEstimationApi = callAPI("POST","http://13.48.249.120/api/shipengine/costEstimation",$estimation_data,"costEstimation");
		//d($responseCostEstimationApi,1);
		if(isset($responseCostEstimationApi) && !empty($responseCostEstimationApi))
		{
			$responseCostEstimation = json_decode($responseCostEstimationApi);
			if(isset($responseCostEstimation->rate_response) && !empty($responseCostEstimation->rate_response))
			{
				$rate_response = $responseCostEstimation->rate_response;
				if(isset($rate_response->errors) && !empty($rate_response->errors))
				{
					$errorsRate = $rate_response->errors;
					
				}
				if(isset($rate_response->rates) && !empty($rate_response->rates))
				{
					$rates = $rate_response->rates;
					
				}
				
			}
			if(isset($responseCostEstimation->total_weight) && !empty($responseCostEstimation->total_weight))
			{
				$total_weight = $responseCostEstimation->total_weight;
				$total_weight_value = isset($total_weight->value)?$total_weight->value:"";
				$total_weight_unit = isset($total_weight->unit)?$total_weight->unit:"";
				
			}
			
		}
		$shipping_amount_currency="";
		$shipping_amount_amount="";
		$delivery_days="";
		$estimated_delivery_date="";
		$ship_date="";
		$service_type="";
		$service_code="";
		$trackable="";
		$warning_messages="";
		$is_available=0;
		$error_message="";
		$ratesArray=array();
		if(isset($rates) && !empty($rates))
		{
			$ratesArray = $rates;
			/*foreach($rates as $key=>$val)
			{
				
				if($val->service_code==$carriers_services)
				{
					
					$shipping_amount = $val->shipping_amount;
					$shipping_amount_currency = isset($shipping_amount->currency)?$shipping_amount->currency:"";
					$shipping_amount_amount = isset($shipping_amount->amount)?$shipping_amount->amount:"";
					$delivery_days = isset($val->delivery_days)?$val->delivery_days:"";
					$estimated_delivery_date = isset($val->estimated_delivery_date)?$val->estimated_delivery_date:"";
					$ship_date = isset($val->ship_date)?$val->ship_date:"";
					$service_type = isset($val->service_type)?$val->service_type:"";
					$service_code = isset($val->service_code)?$val->service_code:"";
					$trackable = isset($val->trackable)?$val->trackable:"";
					$warning_messages = isset($val->warning_messages[0])?$val->warning_messages[0]:"";
					$is_available=1;
					break;
				}
				else
				{
					$shipping_amount = $val->shipping_amount;
					$shipping_amount_currency = isset($shipping_amount->currency)?$shipping_amount->currency:"";
					$shipping_amount_amount = isset($shipping_amount->amount)?$shipping_amount->amount:"";
					$delivery_days = isset($val->delivery_days)?$val->delivery_days:"";
					$estimated_delivery_date = isset($val->estimated_delivery_date)?$val->estimated_delivery_date:"";
					$ship_date = isset($val->ship_date)?$val->ship_date:"";
					$service_type = isset($val->service_type)?$val->service_type:"";
					$service_code = isset($val->service_code)?$val->service_code:"";
					$trackable = isset($val->trackable)?$val->trackable:"";
					$warning_messages = isset($val->warning_messages[0])?$val->warning_messages[0]:"";
					break;
				}
			}*/
			$return["status"]="success";
		}
		elseif(!empty($errorsRate))
		{
			$return["status"]="failure";
			$error_message = isset($errorsRate[0]->message)?$errorsRate[0]->message:"There are no valid services available";
		}
		$return["message"] = $error_message;
		
		/*$returnArray=array(
		"shipping_amount_currency"=>$shipping_amount_currency,
		"shipping_amount_amount"=>$shipping_amount_amount,
		"delivery_days"=>$delivery_days,
		"estimated_delivery_date"=>$estimated_delivery_date,
		"ship_date"=>$ship_date,
		"service_type"=>$service_type,
		"service_code"=>$service_code,
		"trackable"=>$trackable,
		"total_weight_value"=>$total_weight_value,
		"total_weight_unit"=>$total_weight_unit,
		"is_available"=>$is_available,
		"warning_messages"=>$warning_messages
		);*/
		//d($returnArray,1);
		//$return["data"]=array("total_weight"=>"12.3","unit"=>"lb","shipping_amount"=>"$43.2","estimated_delivery_date"=>__date_time);
		$return["data"]=$ratesArray;
		
		echo json_encode($return);
	}

	function get_order_detail()
	{
		$order_id   = $this->input->post("order_id");
		$return['status'] = false;
		$return['data'] = array();
		if(isset($order_id) && $order_id>0)
		{
			$record = $this->db->get_where(DB.'orders',array('status'=>1,"id"=>$order_id))->row();
			$return["data"]=$record;
			$return['status'] = true;
		}
		else
		{
			
		}
		
		
		echo json_encode($return);
		
			
	}
	
	function get_orders_home()
	{
		$status   = $this->input->post("status");
		$return['status'] = false;
		$return['data'] = array();
		$order_status='';
		if($status && $status==2)
		{
			$order_status="New";
		}
		else if($status && $status==3)
		{
			$order_status="Review";
		}
		else if($status && $status==4)
		{
			$order_status="Submitted";
		}
		if($order_status!="")
		{
			
			$queryOrders = $this->db->query('SELECT o.id as order_id,CONCAT(p.first_name, " ", p.last_name) AS patient_name,
			d.device_name,o.order_date,o.order_status,o.created_at,p.email
			FROM '.DB.'orders o LEFT JOIN '.DB.'patients p ON p.id=o.patient_id LEFT JOIN '.DB.'devices d on d.id=o.device_id WHERE o.status=1 AND order_status="'.$order_status.'" ORDER BY o.id DESC LIMIT 6');
		
		}
		else
		{
			
			$queryOrders = $this->db->query('SELECT o.id as order_id,CONCAT(p.first_name, " ", p.last_name) AS patient_name,
			d.device_name,o.order_date,o.order_status,o.created_at,p.email
			FROM '.DB.'orders o LEFT JOIN '.DB.'patients p ON p.id=o.patient_id LEFT JOIN '.DB.'devices d on d.id=o.device_id WHERE o.status=1 ORDER BY o.id DESC LIMIT 6');

		}
		
		$return["data"]= $queryOrders->result();
		$return['status'] = true;
		
		
		echo json_encode($return);
		
			
	}



}
