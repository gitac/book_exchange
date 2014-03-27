<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login extends CI_Controller {
    function __construct() {
        parent::__construct();
      
        $this->load->model('post_model');
        $this->load->helper("form");
        //$this->load->library('session');
    }

    public function index() {
        $data['option'] = "";
        $data['page'] = "";
        
        $this->load->view('includes/admin_header',$data);       
        $this->load->view('contents/admin_login_view');        
        
    }
    
    
    function validate_credentials()
    {
        
        $uname= $this->input->post('un');
        $pass= $this->input->post('pw');
         
        
        $result = $this->check_admin($uname,$pass);
        
        if($result)
         { 
            $this->load->db();
            $data['option'] = "";
            $data['page'] = "";
            
           $this->load->view('includes/admin_header', $data);  
            
            $data['post'] = $this->post_model->getPostList();
            $this->load->view('contents/admin_home_view',$data);
            
            $this->close->db();
           
        }
        else{ // incorrect username or password
            $this->index();
        }
    }
    
    
    function check_admin($uname,$pass) 
    {
        $admin_uname = 'esha';
        $admin_pass = '56tf389sfhlwnjc1';
        
        if($uname == $admin_uname && $pass == $admin_pass)
            {
             return true;
            }
        else 
            return false;
    }
            
    
}