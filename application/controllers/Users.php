<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {

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
	public function manageUsers()
	{
		
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = "users";
		$data["user_type"] = $this->_userType;
		$data["user_email"] = $this->session->userdata('user_email');
		
		$query = $this->db->order_by('id', 'DESC')->get_where('users');
		$users = $query->result();
		$data['users'] = isset($users)?$users:array();
		$this->template->load('templates/template_front_home_v2', 'front/manage_users_v2',$data);
	}
    public function getUser()
    {
        $user_id   = $this->input->post("user_id");
        $data['status'] = "success";
        $data['data'] = array();
        if(isset($user_id) && !empty($user_id))
        {
            $record = $this->db->get_where('users',array("id"=>$user_id))->row();

            if(isset($record) && isset($record->id) && $record->id>0)
            {
                $data['status'] = "success";
                $data['data'] = $record;
            }
            else
            {
                $data['status'] = "failure";
            }
        }
        echo json_encode($data);die;
    }
    public function submitUser()
    {
        $this->load->library('form_validation');
        $first_name   = $this->input->post("first_name");
        $last_name   = $this->input->post("last_name");
        $user_email   = $this->input->post("user_email");
        $address_line_1   = $this->input->post("address_line_1");
        $address_line_2   = $this->input->post("address_line_2");
        $state   = $this->input->post("state");
        $card_info   = $this->input->post("card_info");
        $postal_code   = $this->input->post("postal_code");
        $city   = $this->input->post("city");
        $phone_number   = $this->input->post("phone_number");
        $user_hidden_id   = $this->input->post("user_hidden_id");
        $this->form_validation->set_rules("first_name","First Name","trim|required|max_length[200]");
        $this->form_validation->set_rules("last_name","First Name","trim|required|max_length[200]");
        $this->form_validation->set_rules("user_email","Email","trim|required|max_length[200]");
        $this->form_validation->set_rules("user_hidden_id","User ID","trim|max_length[200]");
        $data['status'] = $this->form_validation->run();

        if ($data['status'] === TRUE)
        {
            if(isset($user_hidden_id) && $user_hidden_id>0)
            {

                $this->db->set('first_name', $first_name);
                $this->db->set('last_name', $last_name);
                $this->db->set('email', $user_email);
                $this->db->set('address_line_1', $address_line_1);
                $this->db->set('address_line_2', $address_line_2);
                $this->db->set('state', $state);
                $this->db->set('card_info', $card_info);
                $this->db->set('postal_code', $postal_code);
                $this->db->set('city', $city);
                $this->db->set('phone_number', $phone_number);
                $this->db->set('updated_at', __date_time);
                $this->db->where('id', $user_hidden_id);
                if($this->db->update('users'))
                {
                    $data['user_id'] = $user_hidden_id;
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
                    'user_id'=> $user_hidden_id,
                    'created_at'=>__date_time);


                if($this->db->insert('users',$post_data))
                {
                    $user_id =  $this->db->insert_id();
                    $data['user_id'] = $user_id;

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


}
