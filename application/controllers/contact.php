<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function index()
	{
                           $data['option'] = "";
                           $data['page'] = "contact";
                           $this->load->view('includes/header', $data);
                           $this->load->view('includes/ad_portion');
		           $this->load->view('contents/contact_view');
                           $this->load->view('includes/footer');
	}
}