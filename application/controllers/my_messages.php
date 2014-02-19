<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_messages extends CI_Controller {
	public function index()
	{
                           $data['option'] = "my_profile";
                           $data['page'] = "";
                           $this->load->view('includes/header', $data);
                           $this->load->view('includes/ad_portion');
		 $this->load->view('contents/my_messages_view');
                           $this->load->view('includes/footer');
	}
}