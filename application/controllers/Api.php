<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	 public function job_put(){
		 $response=array();
           // Takes raw data from the request
		$json = file_get_contents('php://input');

		// Converts it into a PHP object
		$data = json_decode($json);
		$header = $this->input->request_headers();
		$token = isset($header['token-key'])?$header['token-key']:'';
		if($token=='')
		{
			$token=isset($header['Token-Key'])?$header['Token-Key']:'';
		}
		if(strlen(trim($token))>0 && $this->verifyToken($token))
		{
			if(isset($data->contact_information) && $data->contact_information!='')
			{
				$contact_information = $data->contact_information;

			}
			if(isset($data->company_information) && $data->company_information!='')
			{
				$company_information = $data->company_information;
				$company = isset($company_information->company_name)?$company_information->company_name:'';
				$city = isset($company_information->loc_city)?$company_information->loc_city:'';
				$state = isset($company_information->loc_state)?$company_information->loc_state:'';
				
				if(isset($data->type) && $data->type=="part_time")
				{
					$type="Part Time";
				}
				elseif(isset($data->type) && $data->type=="full_time")
				{
					$type="Full Time";
				}
				elseif(isset($data->type) && $data->type=="contract")
				{
					$type="Contract";
				}
				else
				{
					$type="Full Time";
				}
				
				$desc = isset($data->desc)?($data->desc):'';
				str_replace("Job Title:","",$desc);
				str_replace("Job Description:","",$desc);
				$skills_imploded = isset($data->skills_imploded)?($data->skills_imploded):'';
				$source = isset($data->source)?($data->source):'';
				$status = isset($data->status)?($data->status):'';
				$title = isset($data->title)?($data->title):'';

				if(isset($status) && $status=='open')
				{
					$status=1;
				}
				else
				{
					$status=0;
				}

				$skillsArray = explode(",",$skills_imploded);

				$post_data = array('title'=> $title,'desc'=>$desc,'type'=>$type,'source'=>$source,'status'=>$status,'company'=>$company,'state'=>$state,'city'=>$city,'created_at'=>__date_time);
				if($this->db->insert(DB.'jobs',$post_data))
				{
					$job_id = $this->db->insert_id();
					if(isset($skillsArray) && !empty($skillsArray))
					{

					foreach($skillsArray as $key=>$val)
					{	
					$post_data = array('name'=> $val,'jid'=>$job_id,'created_at'=>__date_time);
					$this->db->insert(DB.'skills',$post_data);
					}
					}

					$response['status'] = true;
					$response['message'] = "success";
				}
				else
				{
					$response['status'] = false;
					$response['message'] = "Database is not working please contact with administration";
				}


			}
			else
			{
				$response['status'] = false;
				$response['message'] = "Information is missing";
			}
		}
		else
		{
			$response['status'] = false;
			$response['message'] = "Token information is not valid/missing";
		}
		
		
		echo json_encode($response);	

					
       }
	   
	   function verifyToken($token='')
	   {
		   //echo $token.'----------'.md5("vectortechinc_api_token_786");
		   if(($token)==md5("vectortechinc_api_token_786"))
		   {
			   return true;
		   }
		   else
		   {
			   return false;
		   }
	   }

}
