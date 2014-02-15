<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_free_ad extends CI_Controller {
	public function index()
	{
                           $data['option'] = "";
                           $data['page'] = "";
                           $this->load->view('includes/header', $data);
		 $this->load->view('contents/post_free_ad_view');
                           $this->load->view('includes/footer');
	}
}