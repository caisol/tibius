<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Model {

	function __construct() {
		$this->load->library('email');
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
	public function send_email($mailSubject='',$sendMessage='',$fromEmail='',$toEmail='',$resume='')
	{
				
				
				$this->email->from($fromEmail, 'Vectortechsol');
				$this->email->to($toEmail);
				//$this->email->cc('hassanphp7@gmail.com');
				//$this->email->bcc('them@their-example.com');

				$this->email->subject($mailSubject);
				$this->email->message($sendMessage);
				$this->email->set_mailtype("html");
				if($resume!="")
				{
					$this->email->attach($resume);
				}
				

				$this->email->send();
	}
}
