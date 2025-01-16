<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {

	public function signup()
	{
		$data=array();
		
		$this->template->load('templates/template_front_user_v2', 'front/signup_v2',$data);
	}
	
	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



function encodeURIComponentbycharacter($char) {
   if ($char == "+") { return "%20"; }
   if ($char == "%21") { return "!"; }
   if ($char == "%27") { return '"'; }
   if ($char == "%28") { return "("; }
   if ($char == "%29") { return ")"; }
   if ($char == "%2A") { return "*"; }
   if ($char == "%7E") { return "~"; }
   if ($char == "%80") { return "%E2%82%AC"; }
   if ($char == "%81") { return "%C2%81"; }
   if ($char == "%82") { return "%E2%80%9A"; }
   if ($char == "%83") { return "%C6%92"; }
   if ($char == "%84") { return "%E2%80%9E"; }
   if ($char == "%85") { return "%E2%80%A6"; }
   if ($char == "%86") { return "%E2%80%A0"; }
   if ($char == "%87") { return "%E2%80%A1"; }
   if ($char == "%88") { return "%CB%86"; }
   if ($char == "%89") { return "%E2%80%B0"; }
   if ($char == "%8A") { return "%C5%A0"; }
   if ($char == "%8B") { return "%E2%80%B9"; }
   if ($char == "%8C") { return "%C5%92"; }
   if ($char == "%8D") { return "%C2%8D"; }
   if ($char == "%8E") { return "%C5%BD"; }
   if ($char == "%8F") { return "%C2%8F"; }
   if ($char == "%90") { return "%C2%90"; }
   if ($char == "%91") { return "%E2%80%98"; }
   if ($char == "%92") { return "%E2%80%99"; }
   if ($char == "%93") { return "%E2%80%9C"; }
   if ($char == "%94") { return "%E2%80%9D"; }
   if ($char == "%95") { return "%E2%80%A2"; }
   if ($char == "%96") { return "%E2%80%93"; }
   if ($char == "%97") { return "%E2%80%94"; }
   if ($char == "%98") { return "%CB%9C"; }
   if ($char == "%99") { return "%E2%84%A2"; }
   if ($char == "%9A") { return "%C5%A1"; }
   if ($char == "%9B") { return "%E2%80%BA"; }
   if ($char == "%9C") { return "%C5%93"; }
   if ($char == "%9D") { return "%C2%9D"; }
   if ($char == "%9E") { return "%C5%BE"; }
   if ($char == "%9F") { return "%C5%B8"; }
   if ($char == "%A0") { return "%C2%A0"; }
   if ($char == "%A1") { return "%C2%A1"; }
   if ($char == "%A2") { return "%C2%A2"; }
   if ($char == "%A3") { return "%C2%A3"; }
   if ($char == "%A4") { return "%C2%A4"; }
   if ($char == "%A5") { return "%C2%A5"; }
   if ($char == "%A6") { return "%C2%A6"; }
   if ($char == "%A7") { return "%C2%A7"; }
   if ($char == "%A8") { return "%C2%A8"; }
   if ($char == "%A9") { return "%C2%A9"; }
   if ($char == "%AA") { return "%C2%AA"; }
   if ($char == "%AB") { return "%C2%AB"; }
   if ($char == "%AC") { return "%C2%AC"; }
   if ($char == "%AD") { return "%C2%AD"; }
   if ($char == "%AE") { return "%C2%AE"; }
   if ($char == "%AF") { return "%C2%AF"; }
   if ($char == "%B0") { return "%C2%B0"; }
   if ($char == "%B1") { return "%C2%B1"; }
   if ($char == "%B2") { return "%C2%B2"; }
   if ($char == "%B3") { return "%C2%B3"; }
   if ($char == "%B4") { return "%C2%B4"; }
   if ($char == "%B5") { return "%C2%B5"; }
   if ($char == "%B6") { return "%C2%B6"; }
   if ($char == "%B7") { return "%C2%B7"; }
   if ($char == "%B8") { return "%C2%B8"; }
   if ($char == "%B9") { return "%C2%B9"; }
   if ($char == "%BA") { return "%C2%BA"; }
   if ($char == "%BB") { return "%C2%BB"; }
   if ($char == "%BC") { return "%C2%BC"; }
   if ($char == "%BD") { return "%C2%BD"; }
   if ($char == "%BE") { return "%C2%BE"; }
   if ($char == "%BF") { return "%C2%BF"; }
   if ($char == "%C0") { return "%C3%80"; }
   if ($char == "%C1") { return "%C3%81"; }
   if ($char == "%C2") { return "%C3%82"; }
   if ($char == "%C3") { return "%C3%83"; }
   if ($char == "%C4") { return "%C3%84"; }
   if ($char == "%C5") { return "%C3%85"; }
   if ($char == "%C6") { return "%C3%86"; }
   if ($char == "%C7") { return "%C3%87"; }
   if ($char == "%C8") { return "%C3%88"; }
   if ($char == "%C9") { return "%C3%89"; }
   if ($char == "%CA") { return "%C3%8A"; }
   if ($char == "%CB") { return "%C3%8B"; }
   if ($char == "%CC") { return "%C3%8C"; }
   if ($char == "%CD") { return "%C3%8D"; }
   if ($char == "%CE") { return "%C3%8E"; }
   if ($char == "%CF") { return "%C3%8F"; }
   if ($char == "%D0") { return "%C3%90"; }
   if ($char == "%D1") { return "%C3%91"; }
   if ($char == "%D2") { return "%C3%92"; }
   if ($char == "%D3") { return "%C3%93"; }
   if ($char == "%D4") { return "%C3%94"; }
   if ($char == "%D5") { return "%C3%95"; }
   if ($char == "%D6") { return "%C3%96"; }
   if ($char == "%D7") { return "%C3%97"; }
   if ($char == "%D8") { return "%C3%98"; }
   if ($char == "%D9") { return "%C3%99"; }
   if ($char == "%DA") { return "%C3%9A"; }
   if ($char == "%DB") { return "%C3%9B"; }
   if ($char == "%DC") { return "%C3%9C"; }
   if ($char == "%DD") { return "%C3%9D"; }
   if ($char == "%DE") { return "%C3%9E"; }
   if ($char == "%DF") { return "%C3%9F"; }
   if ($char == "%E0") { return "%C3%A0"; }
   if ($char == "%E1") { return "%C3%A1"; }
   if ($char == "%E2") { return "%C3%A2"; }
   if ($char == "%E3") { return "%C3%A3"; }
   if ($char == "%E4") { return "%C3%A4"; }
   if ($char == "%E5") { return "%C3%A5"; }
   if ($char == "%E6") { return "%C3%A6"; }
   if ($char == "%E7") { return "%C3%A7"; }
   if ($char == "%E8") { return "%C3%A8"; }
   if ($char == "%E9") { return "%C3%A9"; }
   if ($char == "%EA") { return "%C3%AA"; }
   if ($char == "%EB") { return "%C3%AB"; }
   if ($char == "%EC") { return "%C3%AC"; }
   if ($char == "%ED") { return "%C3%AD"; }
   if ($char == "%EE") { return "%C3%AE"; }
   if ($char == "%EF") { return "%C3%AF"; }
   if ($char == "%F0") { return "%C3%B0"; }
   if ($char == "%F1") { return "%C3%B1"; }
   if ($char == "%F2") { return "%C3%B2"; }
   if ($char == "%F3") { return "%C3%B3"; }
   if ($char == "%F4") { return "%C3%B4"; }
   if ($char == "%F5") { return "%C3%B5"; }
   if ($char == "%F6") { return "%C3%B6"; }
   if ($char == "%F7") { return "%C3%B7"; }
   if ($char == "%F8") { return "%C3%B8"; }
   if ($char == "%F9") { return "%C3%B9"; }
   if ($char == "%FA") { return "%C3%BA"; }
   if ($char == "%FB") { return "%C3%BB"; }
   if ($char == "%FC") { return "%C3%BC"; }
   if ($char == "%FD") { return "%C3%BD"; }
   if ($char == "%FE") { return "%C3%BE"; }
   if ($char == "%FF") { return "%C3%BF"; }
   return $char;
}
function encodeURIComponent($string) {
   $result = "";
   for ($i = 0; $i < strlen($string); $i++) {
      $result .= $this->encodeURIComponentbycharacter(urlencode($string[$i]));
   }
   return $result;
}
	function in_authback()
	{
		 //$this->load->library('Guzzle');
		 $error = '';
		 if(isset($_GET['error']) && $_GET['error']=='user_cancelled_authorize')
		 {
			 redirect(base_url('login?error='.base64_encode($_GET['error_description'])));
		 }
		 if(isset($_GET['error']) && $_GET['error']!='' && isset($_GET['error_description']) && $_GET['error_description']!='') 
		 {
			 redirect(base_url('login?error='.base64_encode($_GET['error_description'])));
		 }
		
		 try {
				$url        = 'https://www.linkedin.com';		
				$url = "https://www.linkedin.com/oauth/v2/accessToken";



				$fields = array(
					'client_id' => "86svcigtdo8a2s",
					'client_secret' => "eGYMhClS69WPKuDg",
					'grant_type' => "authorization_code",
					'code' => $_GET['code'],
					'redirect_uri' => base_url('in_authback')
				);
				$fields_string='';
				//url-ify the data for the POST
				foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
				rtrim($fields_string, '&');

				//open connection
				$ch = curl_init();

				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POST, count($fields)+20);
				curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-type: application/x-www-form-urlencoded'));

				//execute post
				$result = curl_exec($ch);

				//close connection
				curl_close($ch);

				if ($result) {
				  $result = json_decode($result);
				  if(isset($result->access_token) && $result->access_token!='')
				  {
					  $access_token = $result->access_token;
					  
					 try{
						  $urlAuth="https://api.linkedin.com/v2/me?oauth2_access_token=".$access_token;
						 
						  $ch = curl_init();

						//set the url, number of POST vars, POST data
						curl_setopt($ch,CURLOPT_URL, $urlAuth);
						curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json'));
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

						//execute post
						$result = curl_exec($ch);
						curl_close($ch);
						if($result)
						{
							$result = json_decode($result);
							$last_name = $result->localizedLastName;
							$first_name = $result->localizedFirstName;
							$id = $result->id;
							$email = "";
							
							 try{
						  $urlAuth="https://api.linkedin.com/v2/me?oauth2_access_token=".$access_token;
						  $urlAuthEmail="https://api.linkedin.com/v2/emailAddress?q=members&projection=(elements*(handle~))&oauth2_access_token=".$access_token;
						 
						  $ch = curl_init();

							//set the url, number of POST vars, POST data
							curl_setopt($ch,CURLOPT_URL, $urlAuthEmail);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json'));
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

							//execute post
							$result = curl_exec($ch);
							curl_close($ch);
							if($result)
							{
								$result = json_decode($result);d($result);
								if(isset($result->elements[0]))
								{
									$elements = $result->elements[0];
									foreach($elements as $key=>$val)
									{
										if(isset($val->emailAddress))
										{
											$email = $val->emailAddress;
										}
									}
								}
							}
						 }
						 catch (Exception $e)
						 {
							 echo $e->getMessage();
						 }
						 
						if(isset($id) && $id!='' && isset($email) && $email!="")
						{
							$post_data = array('oauth_uid'=>$id);
							$record = $this->db->get_where(DB.'candidate',$post_data)->row();
							
							if(!isset($record) || empty($record))
							{
								//new user - we need to insert a record
								$post_data = array('oauth_uid'=>$id,'oauth_provider'=>'linkedin','first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'created_at'=>__date_time);
								if($this->db->insert(DB.'candidate',$post_data))
								{
									$this->session->set_userdata('candidate_id', $this->db->insert_id());
									$this->session->set_userdata('candidate_email', $email);
									$this->session->set_userdata('candidate_name', $first_name.' '.$last_name);

									redirect('dashboard');
									/*$this->load->model('Email', 'email_model');
									$sendMessage = "<p>Hello,</p><p>".$email." You successfully created an account via Facebook. </p>";
									$sendAdminMessage = "<p>Hello,</p><p>".$email." has  created an account. </p>";
									$mailSubject="Welcome to Vectortechinc ";
									$mailadminSubject="New Account Created on Vectortechinc ";
									$fromEmail='contactus@vectortechsol.com';
									//$toEmail="waqarab85@gmail.com";
									$toEmail=$email;
									$toAdminEmail="waqarab85@gmail.com,rida.hasan@vectortechsol.com,contact@vectortechsol.com,wajahat.hassan@vectortechsol.com";
									
									$this->email_model->send_email($mailSubject,$sendMessage,$fromEmail,$toEmail,"");
									$this->email_model->send_email($mailadminSubject,$sendAdminMessage,$fromEmail,$toAdminEmail,"");
									*/
								}
								else
								{
									redirect('login?error='.base64_encode('Database is not working please contact with administration'));
								}
							}
							elseif(isset($record) && !empty($record)) 
							{
								$candidate_id = isset($record->id)?$record->id:0;
								$oauth_uid = isset($record->oauth_uid)?$record->oauth_uid:0;
								$this->db->set('email', $email);
								$this->db->set('first_name', $first_name);
								$this->db->set('last_name', $last_name);
								$this->db->where('oauth_uid', $oauth_uid);
								if($this->db->update(DB.'candidate'))
								{
									$this->session->set_userdata('candidate_id', $candidate_id);
									$this->session->set_userdata('candidate_email', $email);
									$this->session->set_userdata('candidate_name', $first_name.' '.$last_name);
									redirect('dashboard');
								}
								else
								{
									redirect('login?error='.base64_encode('Database is not working please contact with administration'));
								}
							}
							else {
											
												redirect('login?error='.base64_encode('Authorization failure'));

							}
						}
							
						}
					 }
					 catch (Exception $e)
					 {
						 echo $e->getMessage();
					 }
					//close connection
					

					  
				  }
				  else
				  {
					  redirect('login?error='.base64_encode('Application authentication failure please contact with administration'));
				  }
				} else {
				  throw new exception(__METHOD__ . '() ' . $err . ', on line : ' . __LINE__);
				}
					
			
		} catch(Exception $e) {
			 redirect('login?error='.base64_encode('Application authentication failure please contact with administration'));
		}
	}
	
	public function login()
	{
		if($this->session->has_userdata('candidate_id'))
		{
			redirect('dashboard'); 
		}	
		
		
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = $record_num;
		
		$this->template->load('templates/template_front_user_v2', 'front/login_v2',$data);
	}
	
	public function termsServices()
	{
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = $record_num;
		
		$this->template->load('templates/template_front_terms', 'front/termss_services',$data);
	}
	function email_exists($key) {
	  $this->db->where('email',$key);
		$query = $this->db->get(DB.'candidate');
		if ($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
	public function addUser()
	{
		$this->load->library('form_validation');
		
		$user_type   = $this->input->post("user_type");
		$sf_name   = $this->input->post("sf_name");
		$sf_address   = $this->input->post("sf_address");
		$sf_city   = $this->input->post("sf_city");
		$sf_zipcode   = $this->input->post("sf_zipcode");
		$first_name   = $this->input->post("first_name");
		$last_name   = $this->input->post("last_name");
		$middle_name   = $this->input->post("middle_name");
		$phone_number   = $this->input->post("phone_number");
		$email   = $this->input->post("email");
		$password   = $this->input->post("password");
		
		
		//$this->form_validation->set_rules("full_name","Full Name","trim|required|max_length[100]");
		$this->form_validation->set_rules("sf_name","Shipping Name","trim|max_length[100]");
		$this->form_validation->set_rules("sf_city","Shipping City","trim|max_length[100]");
		$this->form_validation->set_rules("sf_zipcode","Shipping ZipCode","trim|max_length[20]");
		$this->form_validation->set_rules("first_name","First name","trim|required|max_length[100]");
		$this->form_validation->set_rules("phone_number","Phone","trim|required|max_length[30]|is_unique[".DB.'user'.".phone_number]");
		$this->form_validation->set_rules("email","Email","trim|required|max_length[100]|is_unique[".DB.'user'.".email]");
		$this->form_validation->set_rules("password","Password","trim|required|max_length[100]");
		$data['status'] = $this->form_validation->run();
		if ($data['status'] === TRUE)
		{
			$post_data = array('first_name'=> $first_name,
			'last_name'=> $last_name,
			'user_type'=> $user_type,
			'shipping_facility_ame'=> $sf_name,
			'shipping_facility_address'=> $sf_address,
			'shipping_facility_city'=> $sf_city,
			'shipping_facility_zipcode'=> $sf_zipcode,
			'middle_name'=> $middle_name,
			'phone_number'=> $phone_number,
			'email'=>$email,'password'=>md5($password),'created_at'=>__date_time);
			if($this->db->insert(DB.'user',$post_data))
			{
				$this->session->set_userdata('user_id', $this->db->insert_id());
				$this->session->set_userdata('user_email', $email);
				$this->session->set_userdata('user_type', $user_type);

				$data['status'] = true;
				$this->load->model('Email', 'email_model');
				$sendMessage = "<p>Hello,</p><p>".$email." You successfully created an account. </p>";
				$sendAdminMessage = "<p>Hello,</p><p>".$email." has  created an account. </p>";
				$mailSubject="Welcome to Vectortechinc ";
				$mailadminSubject="New Account Created on SecureSign ";
				$fromEmail='contactus@vectortechsol.com';
				//$toEmail="waqarab85@gmail.com";
				$toEmail=$email;
				$toAdminEmail="waqarab85@gmail.com,rida.hasan@vectortechsol.com,contact@vectortechsol.com,wajahat.hassan@vectortechsol.com";
				
				$this->email_model->send_email($mailSubject,$sendMessage,$fromEmail,$toEmail,"");
				$this->email_model->send_email($mailadminSubject,$sendAdminMessage,$fromEmail,$toAdminEmail,"");
				
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
	
	public function verifyUser()
	{
		$this->load->library('form_validation');
		$email   = $this->input->post("email");
		$password   = $this->input->post("password");
		$this->form_validation->set_rules("email","Email","trim|required|max_length[100]");
		$this->form_validation->set_rules("password","Password","trim|required|max_length[100]");
		$data['status'] = $this->form_validation->run();
		if ($data['status'] === TRUE)
		{
			$post_data = array('email'=>$email,'password'=>md5($password));
			$record = $this->db->get_where(DB.'user',$post_data)->row();
			
			if ($record && !empty($record))
			{
				
				$user_id = $record->id;
				$email = $record->email;
				$full_name = $record->first_name." ".$record->last_name;
				$this->session->set_userdata('user_id', $user_id);
				$this->session->set_userdata('user_email', $email);
				$this->session->set_userdata('user_type', $record->user_type);
				$this->session->set_userdata('full_name', $full_name);

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
	
	
	
	function forget_password()
	{
		if($this->session->has_userdata('candidate_id'))
		{
			redirect('dashboard'); 
		}	
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = $record_num;
		
		$data['front_header'] = 'templates/front/front_header';
		
		$data['front_footer'] ='templates/front/front_footer';
		$this->template->load('templates/template_front_home', 'front/forget_password',$data);
	}
	
	public function forget_password_submit()
	{
		$this->load->library('form_validation');
		$email   = $this->input->post("email");
		$this->form_validation->set_rules("email","Email","trim|required|max_length[100]");
		$data['status'] = $this->form_validation->run();
		if ($data['status'] === TRUE)
		{
			$post_data = array('email'=>$email);
			$record = $this->db->get_where(DB.'candidate',$post_data)->row();
			
			if ($record && !empty($record))
			{
				$candidate_id = $record->id;
				$email = $record->email;
				
				$act_code = md5(rand(0,1000).'vc_uniquefrasehere');
				$activate['uid']  = $candidate_id;
				$activate['token_number'] = $act_code;
				
				$activate['created_at'] = __date_time;
				if($this->db->insert(DB.'forget_password_token',$activate))
				{
					$this->load->model('Email', 'email_model');
					$subject = "Password Recovery - Vectortechinc.com";
					$mailSubject = 'Password Recovery - Vectortechinc.com';
					$contact_no=isset($record->phone_number)?$record->phone_number:"N/A";
					$full_name=isset($record->first_name)?$record->first_name.' '.$record->last_name:"";
					if(strlen($full_name)==0)
					{
						$full_name = $email;
					}
					$email=isset($record->email)?$record->email:"";
					$message="";
					$sendMessage='<p>Dear user,</p>';
					$sendMessage.='<p>Please click on the following link to reset your password.</p>';
					$sendMessage.='<p>-------------------------------------------------------------</p>';
					$sendMessage.='<p><a href="https://vectortechinc.com/reset-password?key='.$act_code.'&email='.$email.'&action=reset" target="_blank">
						https://vectortechinc.com/reset-password
						?key='.$act_code.'&email='.$email.'&action=reset</a></p>'; 

					$sendMessage.='<p>-------------------------------------------------------------</p>';
					
					$sendMessage.='<p>Thanks,</p>';
					$sendMessage.='<p>Vectortechinc Team</p>';
					$fromEmail='contactus@vectortechsol.com';
					$toEmail=$email;
					//$toEmail="hassanphp7@gmail.com";
					
					$this->email_model->send_email($mailSubject,$sendMessage,$fromEmail,$toEmail,"");

					
					$data['status'] = true;
				}
				else
				{
					$data['status'] = false;
					$data['message'] = "Email is not available ";
				}
				
			}
			else
			{
				$data['status'] = false;
				$data['message'] = "No user is registered with this email address!";
			}
			 
		}
		else {
			$data['message'] = strip_tags(validation_errors());
		}

		echo json_encode($data);
	}
	
	function reset_password()
	{
		if (isset($_REQUEST["key"]) && isset($_REQUEST["email"]) && isset($_REQUEST["action"]) 
		&& ($_REQUEST["action"]=="reset")){
		  $key = $_REQUEST["key"];
		  $email = $_REQUEST["email"];
		  $curDate = __date_time;
		$post_data = array('token_number'=>$key);
		$record = $this->db->get_where(DB.'forget_password_token',$post_data)->row();
		$data=array();
		$message="";
		if ($record && !empty($record))
		{
			$message="";
		}
		else
		{

			$message= '<h2>Invalid Link</h2>
			<p>The link is invalid/expired. Either you did not copy the correct link
			from the email, or you have already used the key in which case it is 
			deactivated.</p>
			<p><a href="'.base_url('forget-password').'">
			Click here</a> to reset password.</p>';
		}
		
			if($this->session->has_userdata('candidate_id'))
			{
				redirect('dashboard'); 
			}	
			
			$last = $this->uri->total_segments();
			$record_num = $this->uri->segment($last);
			$data['last_segment'] = $record_num;
			$data['email'] = $email;
			$data['message'] = $message;
			
			$data['front_header'] = 'templates/front/front_header';
			
			$data['front_footer'] ='templates/front/front_footer';
			$this->template->load('templates/template_front_home', 'front/reset_password',$data);
		
		}
	}
	
	function reset_password_submit()
	{
		$this->load->library('form_validation');
		$email   = $this->input->post("email");
		$new_password   = $this->input->post("new_password");
		$re_new_password   = $this->input->post("re_new_password");
		$this->form_validation->set_rules("email","Email","trim|required|max_length[100]");
		$this->form_validation->set_rules("new_password","Password","trim|required|max_length[100]");
		
		$data['status'] = $this->form_validation->run();
		if($new_password!=$re_new_password)
		{
			$data['message'] = "Both passwords must be same";
			echo json_encode($data);die;

		}
		if ($data['status'] === TRUE)
		{
			$post_data = array('email'=>$email);
			$record = $this->db->get_where(DB.'candidate',$post_data)->row();
			
			if ($record && !empty($record))
			{
				
				$candidate_id = $record->id;
				$this->db->set('password', md5($new_password));
				$this->db->where('id', $candidate_id);
				if($this->db->update(DB.'candidate'))
				{
					$this->db->where('uid', $candidate_id);
					$this->db->delete(DB.'forget_password_token');
						
					$data['status'] = true;
				}
				else
				{
					$data['status'] = false;
					$data['message'] = "Password is not updated please contact with our team!";
				}

				
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
		redirect('login');
	}
	
	
	
	
	function verify_facebook_user()
	{
		
				$email   = $this->input->post("email");
				$first_name   = $this->input->post("first_name");
				$last_name   = $this->input->post("last_name");
				$id   = $this->input->post("id");

			$post_data = array('oauth_uid'=>$id);
			$record = $this->db->get_where(DB.'candidate',$post_data)->row();
			
			if(!isset($record) || empty($record))
			{
				//new user - we need to insert a record
				$post_data = array('oauth_uid'=>$id,'oauth_provider'=>'facebook','first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'created_at'=>__date_time);
				if($this->db->insert(DB.'candidate',$post_data))
				{
					$this->session->set_userdata('candidate_id', $this->db->insert_id());
					$this->session->set_userdata('candidate_email', $email);
					$this->session->set_userdata('candidate_name', $first_name.' '.$last_name);

					$data['status'] = true;
					/*$this->load->model('Email', 'email_model');
					$sendMessage = "<p>Hello,</p><p>".$email." You successfully created an account via Facebook. </p>";
					$sendAdminMessage = "<p>Hello,</p><p>".$email." has  created an account. </p>";
					$mailSubject="Welcome to Vectortechinc ";
					$mailadminSubject="New Account Created on Vectortechinc ";
					$fromEmail='contactus@vectortechsol.com';
					//$toEmail="waqarab85@gmail.com";
					$toEmail=$email;
					$toAdminEmail="waqarab85@gmail.com,rida.hasan@vectortechsol.com,contact@vectortechsol.com,wajahat.hassan@vectortechsol.com";
					
					$this->email_model->send_email($mailSubject,$sendMessage,$fromEmail,$toEmail,"");
					$this->email_model->send_email($mailadminSubject,$sendAdminMessage,$fromEmail,$toAdminEmail,"");
					*/
				}
				else
				{
					$data['status'] = false;
					$data['message'] = "Database is not working please contact with administration";
				}
			}
			elseif(isset($record) && !empty($record)) 
			{
				$candidate_id = isset($record->id)?$record->id:0;
				$oauth_uid = isset($record->oauth_uid)?$record->oauth_uid:0;
				$this->db->set('email', $email);
				$this->db->set('first_name', $first_name);
				$this->db->set('last_name', $last_name);
				$this->db->where('oauth_uid', $oauth_uid);
				if($this->db->update(DB.'candidate'))
				{
					$this->session->set_userdata('candidate_id', $candidate_id);
					$this->session->set_userdata('candidate_email', $email);
					$this->session->set_userdata('candidate_name', $first_name.' '.$last_name);
					$data['status'] = true;
				}
				else
				{
					$data['status'] = false;
				}
			}
			else {
								$data['status'] = false;
								$data['message'] = "Authorization failure";

			}
					echo json_encode($data);
	}
}
