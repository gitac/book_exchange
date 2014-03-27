<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_category extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        
    }
    
    public function index()
    {
        
        $data['option'] = "";
        $data['page'] = "";
        
        $this->load->view('includes/header_admin');
                        
        $this->load->view('contents/manage_category_view');
        
        if($this->input->post('sbm') == "add") 
            { 
            $this->addCategory();
            }
        else if($this->input->post('sbm') == "delete")
            {
                $this->deleteCategory();
            }    
        
       
    }
    
    public function addCategory() 
    {
      
      $data=array('category_name'=> $this->input->post('cn'));
      
      $q = $this->category_model->addCategoryName($data);
     if($q)
     {
          //$this->load->view('includes/admin_header');
                        
        //$this->load->view('contents/manage_category_view');
     }
    }
    
        public function deleteCategory() 
    {
      $cname = $this->input->post('cn');
      
      $q = $this->category_model->deleteCategoryName($cname);
     if($q)
     {
         /*$this->load->view('includes/admin_header');
                        
        $this->load->view('contents/manage_category_view');*/
     }
    }
}
?>
