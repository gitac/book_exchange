<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ad_details extends CI_Controller {
	public function index()
	{
                           $data['option'] = "";
                           $data['page'] = "home";
                           $this->load->view('includes/header', $data);
                           $this->load->view('includes/ad_portion');
		 $this->load->view('contents/ad_details_view');
                           $this->load->view('includes/footer');
	}
}
?>