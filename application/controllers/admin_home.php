<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_home extends CI_Controller {
    function __construct() {
        parent::__construct();
      
        $this->load->model('post_model');
        
    }

    public function index() {
        $data['option'] = "";
        $data['page'] = "";
        
        $this->load->database();
        $this->load->view('includes/admin_header', $data);   
        $data['post'] = $this->post_model->getPostList();
 
        $this->load->view('contents/admin_home_view',$data);     
        $this->db->close();

        
    }
    
}