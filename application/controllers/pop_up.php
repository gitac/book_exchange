<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pop_up extends CI_Controller {
	public function index()
	{
                 
		 $this->load->view('contents/pop_up_view');
                 //$this->load->view('includes/footer');
	}
}