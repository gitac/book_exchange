<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_favorites extends CI_Controller {
	public function index()
	{
                           $data['option'] = "my_profile";
                           $data['page'] = "";
                           $this->load->view('includes/header', $data);
		 $this->load->view('contents/my_favorites_view');
                           $this->load->view('includes/footer');
	}
}