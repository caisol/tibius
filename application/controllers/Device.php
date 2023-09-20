<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('max_execution_time', '300'); //300 seconds = 5 minutes
ignore_user_abort(true);
set_time_limit(0);
error_reporting(E_ERROR | E_PARSE);

class Device extends CI_Controller {

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
	public function addDevice()
	{
		
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = "devices";
		$data["user_type"] = $this->_userType;
		$id=$this->uri->segment(2);
		$data['devices']=array();
		$data['attachments']="";
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where(DB.'devices',array('status'=>1,'product_status'=>0,"id"=>$id))->row();
			$data['devices']  =$record;
			$data['device_id']  = $id;
			$query_attachments = $this->db->order_by('id')->get_where(DB.'device_attachments',array('device_id'=>$id));
			$attachmentsReturn =  $query_attachments->result();
			
			
			$query_images = $this->db->order_by('id')->get_where(DB.'device_images',array('device_id'=>$id));
			$data["imagesReturn"] =  $query_images->result();
			
			
			$attTemp = array();
			if(isset($attachmentsReturn) && !empty($attachmentsReturn))
			{
				foreach($attachmentsReturn as $key=>$val)
				{
					$attTemp[] = '"'.$val->attachment_id.'"';
				}
			}
			
			$data['attachments'] = implode(',',$attTemp);
			//$data['attachments'] = $attTemp;
			
		}
		
		
		
		$user_id = $this->session->userdata('user_id');
		
		$this->template->load('templates/template_front_home', 'front/add_device',$data);
	}
	public function manageDevice()
	{
		
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = "devices";
		$data["user_type"] = $this->_userType;
		$data["user_email"] = $this->session->userdata('user_email');


		
		
		
		
		
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'devices',array('status'=>1,'product_status'=>0));
		$devices = $query->result();
		$data['devices'] = isset($devices)?$devices:array();

		
		
		$user_id = $this->session->userdata('user_id');
		
		$this->template->load('templates/template_front_home_v2', 'front/manage_devices_v2',$data);
	}
	public function manageDeviceOrders()
	{
		
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = "devices";
		$data["user_type"] = $this->_userType;
		$data["user_email"] = $this->session->userdata('user_email');
		
		
		$query = $this->db->order_by('id', 'DESC')->get_where(DB.'devices',array('status'=>1,'product_status'=>0));
		$devices = $query->result();
		$data['devices'] = isset($devices)?$devices:array();

		
		
		$user_id = $this->session->userdata('user_id');
		
		$this->template->load('templates/template_front_home_v2', 'front/manage_device_orders_v2',$data);
	}
	
	
	public function submitDevice()
	{
		$this->load->library('form_validation');
		
		$device_image = isset($_FILES['device_image']['name'])?$_FILES:'';
		
		$device_name   = $this->input->post("device_name");
		$device_barcode   = $this->input->post("device_barcode");
		$attachments   = $this->input->post("attachments");
		$device_count   = $this->input->post("device_count");
		$device_id   = $this->input->post("device_id");
		
		$device_height   = $this->input->post("device_height");
		$device_width   = $this->input->post("device_width");
		$device_length   = $this->input->post("device_length");
		$device_numeric_weight   = $this->input->post("device_numeric_weight");
		$device_unit   = $this->input->post("device_unit");
		$device_shape   = $this->input->post("device_shape");
		$device_comments   = $this->input->post("device_comments");
		$device_description   = $this->input->post("device_description");
		$device_category   = $this->input->post("device_category");
		$not_sure_shape   = $this->input->post("not_sure_shape");
		
		$attachmentsArray = explode(",",$attachments);
		
		$this->form_validation->set_rules("device_name","Device name","trim|required|max_length[200]");
		$this->form_validation->set_rules("device_barcode","Barcode","trim|required|max_length[200]");
		$this->form_validation->set_rules("device_count","Count","trim|numeric");
		$data['status'] = $this->form_validation->run();
		if ($data['status'] === TRUE)
		{
			if(isset($device_id) && $device_id>0)
			{
				
				$this->db->set('device_count', $device_count);
				$this->db->set('device_barcode', $device_barcode);
				$this->db->set('device_name', $device_name);
				$this->db->set('device_height', $device_height);
				$this->db->set('device_width', $device_width);
				$this->db->set('device_length', $device_length);
				$this->db->set('device_numeric_weight', $device_numeric_weight);
				$this->db->set('device_unit', $device_unit);
				$this->db->set('device_shape', $device_shape);
				$this->db->set('device_comments', $device_comments);
				$this->db->set('device_description', $device_description);
				$this->db->set('device_category', $device_category);
				$this->db->set('not_sure_shape', $not_sure_shape);
				$this->db->set('updated_at', __date_time);
				$this->db->where('id', $device_id);
				if($this->db->update(DB.'devices'))
				{
					$this->db->where('device_id', $device_id);
					$this->db->delete(DB.'device_attachments');
					
					if(isset($attachmentsArray) && !empty($attachmentsArray))
					{
						foreach($attachmentsArray as $key=>$val)
						{	
							$post_data = array('device_id'=> $device_id,'attachment_id'=>$val,'created_at'=>__date_time);
							$this->db->insert(DB.'device_attachments',$post_data);
						}
					}
					
					$data['status'] = true;	
				}
				if(isset($device_image) && !empty($device_image))
				{
					
					$response = $this->do_upload_deviceImage($device_id,$device_image);
					if($response=="")
					{
						$data['status'] = true;
					}
					else
					{
						$data['status'] = false;
						$data['message'] =  $response;
					}
				}
				
			}
			else
			{
				
				$post_data = array('device_name'=> $device_name,
				'device_barcode'=> $device_barcode,
				'device_height'=> $device_height,
				'device_width'=> $device_width,
				'device_length'=> $device_length,
				'device_numeric_weight'=> $device_numeric_weight,
				'device_unit'=> $device_unit,
				'device_shape'=> $device_shape,
				'device_comments'=> $device_comments,
				'device_description'=> $device_description,
				'device_category'=> $device_category,
				'not_sure_shape'=> $not_sure_shape,
				'device_count'=> $device_count,'created_at'=>__date_time);
				
				
				if($this->db->insert(DB.'devices',$post_data))
				{
					$device_id = $this->db->insert_id();
					
					if(isset($attachmentsArray) && !empty($attachmentsArray))
					{
						
						foreach($attachmentsArray as $key=>$val)
						{	
							$post_data = array('device_id'=> $device_id,'attachment_id'=>$val,'created_at'=>__date_time);
							$this->db->insert(DB.'device_attachments',$post_data);
						}
						
					}
					if(isset($device_image) && !empty($device_image))
					{
						$response = $this->do_upload_deviceImage($device_id,$device_image);
						if($response=="")
						{
							$data['status'] = true;
						}
						else
						{
							$data['status'] = false;
							$data['message'] =  $response;
						}
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
		else {
			$data['message'] = strip_tags(validation_errors());
		}

		echo json_encode($data);
	}
	
	public function do_upload_deviceImage($id=0,$device_picture){
		
		{
			
			if($id>0 && isset($device_picture["device_image"]["name"]))
			{
				$query = $this->db->order_by('id', 'DESC')->get_where(DB.'device_images',array('device_id'=>$id));
				$device_images = $query->result();
				$device_images = isset($device_images)?$device_images:array();
				if(!empty($device_images))
				{
					foreach($device_images as $key=>$val)
					{
						if($val->device_image!="")
						{
							$deviceimage_path = DEVICE_IMAGES_REALPATH.$val->device_image;
							if (file_exists($deviceimage_path)) {
								unlink($deviceimage_path);
								
							  } else {
								continue;
							  }
						}
						else
						{
							continue;
						}
						
					}
					$this->db->where('device_id', $id);
					$this->db->delete(DB.'device_images');
				}
				
				
				$new_nameArray=array();
				
				foreach($device_picture["device_image"]["name"] as $key=>$val)
				{
								
					$device_picture_name = $val;
					$ext = pathinfo($device_picture_name, PATHINFO_EXTENSION);
					$filename = pathinfo($device_picture_name, PATHINFO_FILENAME );


					$device_picture_name = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
					$device_picture_name = str_replace(' ', '', $device_picture_name); // Replaces all spaces with hyphens.

					$new_name = $device_picture_name.time().".".$ext;
					
					$config = array(
					'upload_path' => "./assets/deviceimages",
					'allowed_types' => "jpg|png|jpeg",
					'overwrite' => TRUE,
					'file_name' => $new_name,
					'max_size' => "4000000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
					'max_height' => "768",
					'max_width' => "1024"
					);
					
					$_FILES['device_image']['name']= $device_picture['device_image']['name'][$key];
					$_FILES['device_image']['type']= $device_picture["device_image"]['type'][$key];
					$_FILES['device_image']['tmp_name']= $device_picture["device_image"]['tmp_name'][$key];
					$_FILES['device_image']['error']= $device_picture["device_image"]['error'][$key];
					$_FILES['device_image']['size']= $device_picture["device_image"]['size'][$key];
					
					$this->load->library('upload',$config);
					$this->upload->initialize($config);

					if($this->upload->do_upload("device_image")){
						$this->upload->data();
						//$data = array('upload_data' => $this->upload->data());
						$new_nameArray[] = $new_name;
						continue;
						
						//$result= $this->upload_model->save_upload($title,$image);
						//return $result;
					}
					else
					{
						
						return $this->upload->display_errors();
					}
					
				}
				foreach($new_nameArray as $key=>$val)
				{
					$post_data = array('device_image'=> $val,
								'device_id'=> $id);
			
			 
			
					if($this->db->insert(DB.'device_images',$post_data))
					{
						continue;
					}
					else
					{
						return "Device profile can not be updated please contact with admin";
					}
				}
				
				return "";
				
			}
			else
			{
				return "Candidate profile can not be updated please contact with admin";
			}
		}
		
		
	}
	
	public function submitAttachments()
	{
		$this->load->library('form_validation');
		$other_attachments   = $this->input->post("other_attachments");
		
		
		$this->form_validation->set_rules("other_attachments","Attachment Name","trim|required|max_length[250]");
		
		$data['status'] = $this->form_validation->run();
		if ($data['status'] === TRUE)
		{
			{
				$post_data = array('name'=> $other_attachments,'created_at'=>__date_time);
				
				
				if($this->db->insert(DB.'attachments',$post_data))
				{
					
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
	
	public function delete_device()
	{
		$id=$this->uri->segment(2);
		
		if(isset($id) && $id>0)
		{
			$record = $this->db->get_where(DB.'devices',array('status'=>1,"id"=>$id))->row();
			if(isset($record) && !empty($record))
			{
				$this->db->set('status', 0);
				$this->db->set('updated_at', __date_time);
				$this->db->where('id', $id);
				if($this->db->update(DB.'devices'))
				{
					redirect('manage-devices?msg=Success');
				}
				else
				{
					redirect('manage-devices?msg=Error');
				}
			}
		}
	}
	
	
	public function getDeviceAttachments()
	{
		$this->load->library('form_validation');
		
		$deviceid   = $this->input->post("deviceid");
		
		$this->form_validation->set_rules("deviceid","Device","trim|required|numeric");
		$data['status'] = $this->form_validation->run();
		if ($data['status'] === TRUE)
		{
			if(isset($deviceid) && $deviceid>0)
			{
				
				$query = $this->db->order_by('id', 'DESC')->get_where(DB.'device_attachments',array('device_id'=>$deviceid));
				$device_attachments = $query->result();
				$data['device_attachments'] = isset($device_attachments)?$device_attachments:array();
				$data['status'] =true;
			}
			else
			{
				$data['status'] =false;
			}
		
		}
		else {
			$data['message'] = strip_tags(validation_errors());
		}

		echo json_encode($data);
	}
	
	
	
	function getOrderDevice()
	{
		$device_id   = $this->input->post("device_id");
		$return_response["device_data"] = array();
		$return_response["device_attachments_data"] = array();
		$return_response["status"] = "success";
		if(isset($device_id) && $device_id>0)
		{
			$record = $this->db->get_where(DB.'devices',array("id"=>$device_id))->result_array();
			
			if(isset($record) && !empty($record) && isset($record[0]) && !empty($record[0]))
			{
				$return_response["device_data"] = $record[0];
				$recordDetail = $this->db->query("SELECT a.name,a.id FROM mz_device_attachments da LEFT JOIN mz_attachments a ON  da.`attachment_id`=a.id WHERE da.`device_id`=".$device_id)->result_array();
				if(isset($recordDetail) && !empty($recordDetail))
				{
					$return_response["device_attachments_data"] = $recordDetail;
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
	
function getDeviceOrders()
	{
		$device_id   = $this->input->post("device_id");
		$return_response["device_data"] = array();
		$return_response["order_data"] = array();
		$return_response["status"] = "success";
		if(isset($device_id) && $device_id>0)
		{
			
			$query = $this->db->query('SELECT o.id ,p.`first_name`,p.`email`,d.`device_name`,d.`device_barcode`,o.order_status FROM mz_orders o LEFT JOIN mz_patients p ON p.id=o.patient_id LEFT JOIN mz_devices d ON d.id=o.device_id WHERE o.status=1 AND o.device_id='.$device_id.' ORDER BY o.id DESC');
			$orders = $query->result();
			
			$return_response['order_data'] = isset($orders)?$orders:array();
			
			$record = $this->db->get_where(DB.'devices',array('status'=>1,"id"=>$device_id))->row();
			$return_response['devices']  =$record;
			
			$recordImages = $this->db->get_where(DB.'device_images',array("device_id"=>$device_id,'device_image!='=>null))->row();
			$return_response['devices_image']  =$recordImages;
			
		}
		else
		{
			$return_response["status"] = "error";
		}
		echo  json_encode($return_response);
	}



	
	public function getAttachments()
	{
		
		$query = $this->db->query('SELECT * FROM '.DB.'attachments'.' ORDER BY id DESC');
		$attachments = $query->result();
		$data['attachments'] = isset($attachments)?$attachments:array();
		$data['status'] =true;

		echo json_encode($data);
	}
	
	function getDeviceDetail()
	{
		$device_id   = $this->input->post("device_id");
		$return_response["device_data"] = array();
		$return_response["device_attachments_data"] = array();
		$return_response["status"] = "success";
		if(isset($device_id) && $device_id>0)
		{
			$record = $this->db->get_where(DB.'devices',array("id"=>$device_id))->result_array();
			
			if(isset($record) && !empty($record) && isset($record[0]) && !empty($record[0]))
			{
				$return_response["device_data"] = $record[0];
				$recordDetail = $this->db->query("SELECT a.name,a.id FROM mz_device_attachments da LEFT JOIN mz_attachments a ON  da.`attachment_id`=a.id WHERE da.`device_id`=".$device_id)->result_array();
				if(isset($recordDetail) && !empty($recordDetail))
				{
					$return_response["device_attachments_data"] = $recordDetail;
				}
				$recordImages = $this->db->query("SELECT di.device_image,di.fullsize FROM mz_device_images di LEFT JOIN mz_devices d ON  di.`device_id`=d.id WHERE di.`device_id`=".$device_id)->result_array();
				if(isset($recordImages) && !empty($recordImages))
				{
					$return_response["device_images_data"] = $recordImages;
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

	
	public function import_devices()
	{
		
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = "devices";
		$data["user_type"] = $this->_userType;
		$id=$this->uri->segment(2);
		
		$user_id = $this->session->userdata('user_id');
		
		$this->template->load('templates/template_front_home_v2', 'front/import_device',$data);
	}
	public function import_devices_submit()
	{
		
		$device_file = isset($_FILES['device_file']['name'])?$_FILES:'';
		$data=array();
		if(isset($device_file) && !empty($device_file))
		{
			
			$response = $this->do_upload_deviceFile($device_file);
			if($response=="")
			{
				$data['status'] = true;
			}
			else
			{
				$data['status'] = false;
				$data['message'] =  $response;
			}
		}
		else
		{
			$data['status'] = false;
			$data['message'] =  "Device file is required!";
		}
		
		echo json_encode($data);
	}
	
	public function do_upload_deviceFile($device_picture)
		{
			$this->load->library('excel');
PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);


			if(isset($device_picture["device_file"]["name"]))
			{
			
				{
								
					if(true){
						//$this->upload->data();
						//$data = array('upload_data' => $this->upload->data());
						
						//$deviceimage_path = DEVICE_FILES_XLS_REALPATH.$new_name;
						if(isset($device_picture["device_file"]["name"]))
						{
							$path   = $device_picture["device_file"]['tmp_name'];
							$object = PHPExcel_IOFactory::load($path);


							foreach($object->getWorksheetIterator() as $worksheet)
							{
								$highestRow    = $worksheet->getHighestRow();
								$highestColumn = $worksheet->getHighestColumn();

								for($row = 2; $row <= $highestRow; $row++)
								{
									$device_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
									$device_barcode     = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
									$device_count = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
									$device_category  = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
									$device_description   = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
									$device_comments    = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
									$device_height    = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
									$device_width    = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
									$device_length    = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
									$device_numeric_weight    = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
									$device_unit    = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
									$device_shape    = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
									$device_comments    = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
									$not_sure_shape    = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
									$created_at    = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
									
									$result_device = $this->db->get_where(DB.'devices', ['device_name' => $device_name])->result();
									if(isset($result_device[0]->id) && $result_device[0]->id>0)
									{
										$device_id = $result_device[0]->id;
										$this->db->set('device_count', $device_count);
										$this->db->set('device_barcode', $device_barcode);
										$this->db->set('device_name', $device_name);
										$this->db->set('device_height', $device_height);
										$this->db->set('device_width', $device_width);
										$this->db->set('device_length', $device_length);
										$this->db->set('device_numeric_weight', $device_numeric_weight);
										$this->db->set('device_unit', $device_unit);
										$this->db->set('device_shape', $device_shape);
										$this->db->set('device_comments', $device_comments);
										$this->db->set('device_description', $device_description);
										$this->db->set('device_category', $device_category);
										$this->db->set('not_sure_shape', $not_sure_shape);
										$this->db->set('updated_at', $created_at);
										$this->db->where('id', $device_id);
										if($this->db->update(DB.'devices'))
										{
											continue;
										}
									}
									else
									{
										$post_data = array('device_name'=> $device_name,
										'device_barcode'=> $device_barcode,
										'device_height'=> $device_height,
										'device_width'=> $device_width,
										'device_length'=> $device_length,
										'device_numeric_weight'=> $device_numeric_weight,
										'device_unit'=> $device_unit,
										'device_shape'=> $device_shape,
										'device_comments'=> $device_comments,
										'device_description'=> $device_description,
										'device_category'=> $device_category,
										'not_sure_shape'=> $not_sure_shape,
										'device_count'=> $device_count,'created_at'=>__date_time);
										
										
										if($this->db->insert(DB.'devices',$post_data))
										{
											continue;
										}
									}
								}
							}
						}
					}
					else
					{
						
						return $this->upload->display_errors();
					}
					
				}
				
				return "";
				
			}
			else
			{
				return "Device file can not be updated please contact with admin";
			}
		}
		
	
		function downloadDeviceImage($name="",$type="",$url="")
		{
			
			//$url = 'https://contribute.geeksforgeeks.org/wp-content/uploads/gfg-40.png';
  
			// Use basename() function to return the base name of file 
			try{
				
				// Use file_get_contents() function to get the file
				// from url and use file_put_contents() function to
				// save the file by using base name
				// Initialize the cURL session
				 				
				// Use basename() function to return
				// the base name of file 
				$file_name = basename($url);
				$device_picture_name = preg_replace("/[^A-Za-z0-9 ]/", '', $name);
				$device_picture_name = str_replace(' ', '', $device_picture_name); // Replaces all spaces with hyphens.
				$ext  = (new SplFileInfo($url))->getExtension();
				
				$ext =  preg_replace('/\?.*/', '', $ext);
				$new_name_tmp = $device_picture_name."-".$type.".".$ext;
				// return $new_name_tmp;  
				// Save file into file location
				$save_file_loc = DEVICE_IMAGES_REALPATH.$new_name_tmp;
				  
				$ch = curl_init($url);
				$fp = fopen($save_file_loc, 'wb');

				curl_setopt($ch, CURLOPT_FILE, $fp);
				// Exclude header data
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_TIMEOUT_MS , 9000);
				curl_setopt($ch, CURLOPT_NOSIGNAL  , 1);
				curl_setopt($ch, CURLOPT_MAXREDIRS  , 10);
				curl_setopt($ch, CURLOPT_FRESH_CONNECT   , true);
				
				// Follow redirected location
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				// Auto detect decoding of the response | identity, deflate, & gzip
				curl_setopt($ch, CURLOPT_ENCODING, '');
				curl_setopt($ch, CURLOPT_HTTPHEADER     , array (
        "cache-control: no-cache"
    ));

				curl_exec($ch);
				$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				if(curl_errno($ch))
    echo 'Curl error: '.curl_error($ch);

				curl_close($ch); 
				
				return $new_name_tmp;
				  
			}
			catch(Exception $e)
			{
				//echo $e->getMessage();
				return "";
			}
		}
	
}
