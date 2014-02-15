<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show_category extends CI_Controller {
	public function index()
	{
                           $data['option'] = "my_profile";
                           $data['page'] = "home";
                           $this->load->view('includes/header', $data);
		 $this->load->view('contents/show_category_view');
                           $this->load->view('includes/footer');
	}
}