<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

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
	public function addPatient()
	{
		
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = "patients";
		$data["user_type"] = $this->_userType;
		$id=$this->uri->segment(2);
		$data['patients']=array();
		
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where('recipients',array('status'=>1,"id"=>$id))->row();
			
			/*if(isset($record) && isset($record->id) && $record->id>0)
			{
				$patients_detail = $this->db->get_where(DB.'patients_detail',array("patient_id"=>$id))->result_array();
				
				$data["patients_detail"] = $patients_detail;
			}*/
			
			
			$data['patients']  =$record;
			
			$data['patient_id'] = $id;
		}
		
		
		
		
		
		
		
		$query = $this->db->order_by('id', 'DESC')->get_where('recipients',array('status'=>1));
		$data['total_patients'] =$total_rows  = $query->num_rows();
		
		
		
		$user_id = $this->session->userdata('user_id');
		
		$this->template->load('templates/template_front_home', 'front/add_patient',$data);
	}
	
	
	public function managePatient()
	{
		
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = "patients";
		$data["user_type"] = $this->_userType;

		
		
		
		
		
		
		$query = $this->db->order_by('id', 'DESC')->get_where('recipients',array('status'=>1));
		$patients = $query->result();
		$data['patients'] = isset($patients)?$patients:array();

		
		$user_id = $this->session->userdata('user_id');
		
		$this->template->load('templates/template_front_home', 'front/manage_patients',$data);
	}
	
	public function submitPatient()
	{
		$this->load->library('form_validation');
		$first_name   = $this->input->post("first_name");
		$middle_name   = $this->input->post("middle_name");
		$last_name   = $this->input->post("last_name");
		$gfirst_name   = $this->input->post("gfirst_name");
		$gmiddle_name   = $this->input->post("gmiddle_name");
		$glast_name   = $this->input->post("glast_name");
		
		
		$patient_address_type   = $this->input->post("patient_address_type");
		$address_linea   = $this->input->post("address_linea");
		$address_lineb   = $this->input->post("address_lineb");
		$active_shipping_address   = $this->input->post("active_shipping_address");
		$zip_code   = $this->input->post("zip_code");
		$city   = $this->input->post("city");
		$state   = $this->input->post("state");
		$phone_type_contact   = $this->input->post("phone_type_contact");
		$patinet_contact_phone   = $this->input->post("patinet_contact_phone");
		$active_shipping_contact   = $this->input->post("active_shipping_contact");
		$phone_type_preferred   = $this->input->post("phone_type_preferred");
		
		
		$pcheck   = $this->input->post("pcheck");
		$g_address_type   = $this->input->post("g_address_type");
		$gaddress_linea   = $this->input->post("gaddress_linea");
		$gaddress_lineb   = $this->input->post("gaddress_lineb");
		$gactive_shipping_address   = $this->input->post("gactive_shipping_address");
		$gzip_code   = $this->input->post("gzip_code");
		$gcity   = $this->input->post("gcity");
		$gstate   = $this->input->post("gstate");
		$gphone_type_contact   = $this->input->post("gphone_type_contact");
		$gcontact_phone   = $this->input->post("gcontact_phone");
		$gactive_shipping_contact   = $this->input->post("gactive_shipping_contact");
		$gphone_type_preferred   = $this->input->post("gphone_type_preferred");
		
		
		
		
		$email   = $this->input->post("email");
		$gemail   = $this->input->post("gemail");
		$member_id   = $this->input->post("member_id");
		$patient_id   = $this->input->post("patient_id");
		
		
		$this->form_validation->set_rules("first_name","Patient First name","trim|required|max_length[200]");
		$this->form_validation->set_rules("middle_name","Patient Middle name","trim|max_length[200]");
		$this->form_validation->set_rules("last_name","Patient Last name","trim|max_length[200]");
		
		$this->form_validation->set_rules("email","Email","trim|required|max_length[200]");
		if(isset($pcheck) && $pcheck==1)
		{
			$this->form_validation->set_rules("gemail","Email","trim|required|max_length[200]");
			$this->form_validation->set_rules("glast_name","Parent's Last name","trim|max_length[200]");
			$this->form_validation->set_rules("gmiddle_name","Parent's Middle name","trim|max_length[200]");
			$this->form_validation->set_rules("gfirst_name","Parent's First name","trim|required|max_length[200]");


		}
		/*if(isset($patient_id) && $patient_id>0)
		{
			if($this->alreadyExistPhonenumber($patient_id,$phone_number))
			{
				$data['status'] = false;
				$data['message'] = "Phone number already exist";
				echo json_encode($data);die;
			}
			else
			{
				$this->form_validation->set_rules("phone_number","Phone","trim|required|max_length[30]");
			}
			
			if($this->alreadyExistEmail($patient_id,$gemail))
			{
				$data['status'] = false;
				$data['message'] = "Email address already exist";
				echo json_encode($data);die;
			}
			else
			{
				$this->form_validation->set_rules("gemail","Email","trim|required|max_length[200]");
			}
			
		}
		else
		{
			$this->form_validation->set_rules("phone_number","Phone","trim|required|max_length[30]|is_unique[".DB.'patients'.".phone_number]");
			$this->form_validation->set_rules("gemail","Email","trim|required|max_length[200]|is_unique[".DB.'patients'.".gemail]");
		}*/
		$data['status'] = $this->form_validation->run();
		if ($data['status'] === TRUE)
		{
			if(isset($patient_id) && $patient_id>0)
			{
				
				$this->db->set('first_name', $first_name);
				$this->db->set('gfirst_name', $gfirst_name);
				$this->db->set('middle_name', $middle_name);
				$this->db->set('gmiddle_name', $gmiddle_name);
				$this->db->set('last_name', $last_name);
				$this->db->set('glast_name', $glast_name);
				$this->db->set('gphone_type_preferred', $gphone_type_preferred);
				$this->db->set('gemail', $gemail);
				$this->db->set('phone_type_preferred', $phone_type_preferred);
				$this->db->set('email', $gemail);
				$this->db->set('pcheck', $pcheck);
				$this->db->set('updated_at', __date_time);
				$this->db->where('id', $patient_id);
				if($this->db->update('recipients'))
				{
					$data['patient_id'] = $patient_id;
					$data['status'] = true;	
				}
				else
				{
					$data['status'] = false;
				}
				
			}
			else
			{
				$post_data = array('first_name'=> $first_name,
				'gfirst_name'=> $gfirst_name,
				'middle_name'=> $middle_name,
				'gmiddle_name'=> $gmiddle_name,
				'glast_name'=> $glast_name,
				'last_name'=> $last_name,
				'gphone_type_preferred'=> $gphone_type_preferred,
				'gemail'=> $gemail,
				'phone_type_preferred'=> $phone_type_preferred,
				'email'=> $email,
				'pcheck'=> $pcheck,
				'created_at'=>__date_time);
				
				
				if($this->db->insert('recipients',$post_data))
				{
					$patient_id =  $this->db->insert_id();
					$data['patient_id'] = $patient_id;
					
					$sql_patient_detail="INSERT INTO ".DB."patients_detail(
									  `patient_id`,
									  `patient_address_type`,
									  `address_linea`,
									  `address_lineb`,
									  `active_shipping_address`,
									  `zip_code`,
									  `city`,
									  `state`,
									  `phone_type_contact`,
									  `patinet_contact_phone`,
									  `active_shipping_contact`,
									  `g_address_type`,
									  `gaddress_linea`,
									  `gaddress_lineb`,
									  `gactive_shipping_address`,
									  `gzip_code`,
									  `gcity`,
									  `gstate`,
									  `gphone_type_contact`,
									  `gcontact_phone`,
									  `gactive_shipping_contact`,
									  `created_at`
									)VALUES"; 
					for($i=0;$i<4;$i++)
					{
						$tempI=$i+1;
						$comma="";
						if($i<3)
						{
							$comma=",";
						}
						$patient_address_typeTmp = isset($patient_address_type[$i])?$patient_address_type[$i]:"";
						$address_lineaTmp = isset($address_linea[$i])?$address_linea[$i]:"";
						$address_linebTmp = isset($address_lineb[$i])?$address_lineb[$i]:"";
						$active_shipping_addressTmp=0;
						if($active_shipping_address==($tempI))
						{
							$active_shipping_addressTmp=$active_shipping_address;
						}
						$zip_codeTmp = isset($zip_code[$i])?$zip_code[$i]:"";
						$cityTmp = isset($city[$i])?$city[$i]:"";
						$stateTmp = isset($state[$i])?$state[$i]:"";
						$phone_type_contactTmp = isset($phone_type_contact[$i])?$phone_type_contact[$i]:"";
						$patinet_contact_phoneTmp = isset($patinet_contact_phone[$i])?$patinet_contact_phone[$i]:"";
						$active_shipping_contactTmp=0;
						
						if($active_shipping_contact==$tempI)
						{
							$active_shipping_contactTmp=$active_shipping_contact;
						}
						
						
						$g_address_typeTmp = isset($g_address_type[$i])?$g_address_type[$i]:"";
						$gaddress_lineaTmp = isset($gaddress_linea[$i])?$gaddress_linea[$i]:"";
						$gaddress_linebTmp = isset($gaddress_lineb[$i])?$gaddress_lineb[$i]:"";
						$gactive_shipping_addressTmp=0;
						if($gactive_shipping_address==($tempI))
						{
							$gactive_shipping_addressTmp=$gactive_shipping_address;
						}
						$gzip_codeTmp = isset($gzip_code[$i])?$gzip_code[$i]:"";
						$gcityTmp = isset($gcity[$i])?$gcity[$i]:"";
						$gstateTmp = isset($gstate[$i])?$gstate[$i]:"";
						$gphone_type_contactTmp = isset($gphone_type_contact[$i])?$gphone_type_contact[$i]:"";
						$gcontact_phoneTmp = isset($gcontact_phone[$i])?$gcontact_phone[$i]:"";
						$gactive_shipping_contactTmp=0;
						if($gactive_shipping_contact==($tempI))
						{
							$gactive_shipping_contactTmp=$gactive_shipping_contact;
						}
						$created_at = __date_time;
						
						
						$sql_patient_detail.="(".$patient_id.",
						'".$patient_address_typeTmp."',
						'".$address_lineaTmp."',
						'".$address_linebTmp."',
						".$active_shipping_addressTmp.",
						'".$zip_codeTmp."',
						'".$cityTmp."',
						'".$stateTmp."',
						'".$phone_type_contactTmp."',
						'".$patinet_contact_phoneTmp."',
						".$active_shipping_contactTmp.",
						'".$g_address_typeTmp."',
						'".$gaddress_lineaTmp."',
						'".$gaddress_linebTmp."',
						".$gactive_shipping_addressTmp.",
						'".$gzip_codeTmp."',
						'".$gcityTmp."',
						'".$gstateTmp."',
						'".$gphone_type_contactTmp."',
						'".$gcontact_phoneTmp."',
						".$gactive_shipping_contactTmp.",
						'".$created_at."')".$comma;
						


					}
					
					if($this->db->query($sql_patient_detail))
					{
						$data['status'] = true;
					}
					else
					{
						$data['status'] = false;
					}
					
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
	
	
	
	public function delete_patient()
	{
		$id=$this->uri->segment(2);
		
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where('recipients',array('status'=>1,"id"=>$id))->row();
			if(isset($record) && !empty($record))
			{
				$this->db->set('status', 0);
				$this->db->set('updated_at', __date_time);
				$this->db->where('id', $id);
				if($this->db->update('recipients'))
				{
					redirect('manage-patients?msg=Success');
				}
				else
				{
					redirect('manage-patients?msg=Error');
				}
			}
		}
	}
	
	function alreadyExistPhonenumber($id,$value)
	{
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where('recipients',array('phone_number'=>$value,"id!="=>$id))->row();
			if(isset($record) && !empty($record))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	function alreadyExistEmail($id,$value)
	{
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where('recipients',array('gemail'=>$value,"id!="=>$id))->row();
			
			if(isset($record) && !empty($record))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	function getOrderPatient()
	{
		$patient_id   = $this->input->post("patient_id");
		$return_response["patient_data"] = array();
		$return_response["patient_detail_data"] = array();
		$return_response["status"] = "success";
		if(isset($patient_id) && $patient_id>0)
		{
			$record = $this->db->get_where('recipients',array("id"=>$patient_id))->result_array();
			
			if(isset($record) && !empty($record) && isset($record[0]) && !empty($record[0]))
			{
				$return_response["patient_data"] = $record[0];
				$recordDetail = $this->db->get_where(DB.'patients_detail',array("patient_id"=>$patient_id))->result_array();
				if(isset($recordDetail) && !empty($recordDetail))
				{
					$return_response["patient_detail_data"] = $recordDetail;
				}
				
				$return_response["status"] = "success";
			}
			else
			{
				$return_response["status"] = "error";
			}
		}
		else
		{
			$return_response["status"] = "error";
		}
		echo  json_encode($return_response);
	}

public function getPatientDetail()
	{
		$patint_id   = $this->input->post("patint_id");
		$data['status'] = "success";
		$data['data'] = array();
		if(isset($patint_id) && !empty($patint_id))
		{
			$record = $this->db->get_where('recipients',array('status'=>1,"id"=>$patint_id))->row();
			
			if(isset($record) && isset($record->id) && $record->id>0)
			{
				$patients_detail = $this->db->get_where(DB.'patients_detail',array("patient_id"=>$patint_id))->result_array();
				
				$patients_detail = $patients_detail;
				if(isset($patients_detail) && !empty($patients_detail))
				{
					$data['status'] = "success";
					$data['data'] = $patients_detail;
					
				}
				else
				{
					$data['status'] = "failure";
				}
			}
			else
			{
				$data['status'] = "failure";
			}
		}
		echo json_encode($data);die;
	}

	function validateAddress()
	{
		
		$address_linea   = $this->input->post("address_linea");
		$address_lineb   = $this->input->post("address_lineb");
		
		$zip_code   = $this->input->post("zip_code");
		$city   = $this->input->post("city");
		$state   = $this->input->post("state");
		
		$api_data = array('address_line1'=> $address_linea,'address_line2'=> $address_lineb,'city_locality'=>$city,'state_province'=>$state,'postal_code'=>$zip_code,'country_code'=>"US");
		
   
		$response = callAPI("POST","http://13.48.249.120/api/shipengine/validateAddress",($api_data));
		$return_response = array();
		if(isset($response) && !empty($response))
		{
			$responseArray = json_decode($response);
			if(isset($responseArray) && isset($responseArray[0]) && !empty($responseArray[0]))
			{
				$responseArrayIndex = $responseArray[0];
				if(isset($responseArrayIndex) && isset($responseArrayIndex->status) && $responseArrayIndex->status!="error")
				{
					$return_response["status"] = $responseArrayIndex->status;
				}
				else
				{
					$return_response["status"] = "error";
				}
				
				if(isset($responseArrayIndex) && isset($responseArrayIndex->original_address) && !empty($responseArrayIndex->original_address))
				{
					$original_address = $responseArrayIndex->original_address;
					$address_line1 = isset($original_address->address_line1)?$original_address->address_line1:"";
					$address_line2 = isset($original_address->address_line2)?$original_address->address_line2:"";
					$city_locality = isset($original_address->city_locality)?$original_address->city_locality:"";
					$state_province = isset($original_address->state_province)?$original_address->state_province:"";
					$postal_code = isset($original_address->postal_code)?$original_address->postal_code:"";
					$country_code = isset($original_address->country_code)?$original_address->country_code:"";
					$address_residential_indicator = isset($original_address->address_residential_indicator)?$original_address->address_residential_indicator:"";
					
					$return_response["original_address"]["address_line1"] = $address_line1;
					$return_response["original_address"]["address_line2"] = $address_line2;
					$return_response["original_address"]["city_locality"] = $city_locality;
					$return_response["original_address"]["state_province"] = $state_province;
					$return_response["original_address"]["postal_code"] = $postal_code;
					$return_response["original_address"]["country_code"] = $country_code;
					$return_response["original_address"]["country_code"] = $country_code;
					
				}
				else
				{
					$return_response["original_address"] = "error";
				}
				
				if(isset($responseArrayIndex) && isset($responseArrayIndex->matched_address) && !empty($responseArrayIndex->matched_address))
				{
					$matched_address = $responseArrayIndex->matched_address;
					$address_line1 = isset($matched_address->address_line1)?$matched_address->address_line1:"";
					$address_line2 = isset($matched_address->address_line2)?$matched_address->address_line2:"";
					$city_locality = isset($matched_address->city_locality)?$matched_address->city_locality:"";
					$state_province = isset($matched_address->state_province)?$matched_address->state_province:"";
					$postal_code = isset($matched_address->postal_code)?$matched_address->postal_code:"";
					$country_code = isset($matched_address->country_code)?$matched_address->country_code:"";
					$address_residential_indicator = isset($matched_address->address_residential_indicator)?$matched_address->address_residential_indicator:"";
					
					$return_response["matched_address"]["address_line1"] = $address_line1;
					$return_response["matched_address"]["address_line2"] = $address_line2;
					$return_response["matched_address"]["city_locality"] = $city_locality;
					$return_response["matched_address"]["state_province"] = $state_province;
					$return_response["matched_address"]["postal_code"] = $postal_code;
					$return_response["matched_address"]["country_code"] = $country_code;
					$return_response["matched_address"]["country_code"] = $country_code;
				}
				else
				{
					$return_response["matched_address"] = "error";
				}
				
			}
			else
			{
				$return_response["status"]='error';
			}
		}
		else
		{
			$return_response["status"]='error';
		}
		echo  json_encode($return_response);			
	}

}
