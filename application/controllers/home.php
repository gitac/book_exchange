<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
                           $data['option'] = "";
                           $data['page'] = "home";
                           $this->load->view('includes/header', $data);
                     //      $this->load->view('includes/ad_portion');
		 $this->load->view('contents/home_view');
                           $this->load->view('includes/footer');
	}
}