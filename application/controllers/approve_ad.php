<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Approve_ad extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $this->load->model('category_model');
        $this->load->model('post_model');
//        $this->load->model('book_model');
        $this->load->library('user_agent');
       
        
    }
    
    public function index()
    {
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
       
        $data['option'] = "";
        $data['page'] = "";
        
       // $this->load->view('includes/admin_header', $data);
        $p_status = "pending";
        $this->load->view('includes/header_admin', $data); 
      
        $this->load->database();      
        
        $data['post'] = $this->post_model->getPostList();
 
                   
        $this->load->view('contents/admin_home_view',$data);
        
        $this->db->close();
        
    }
    
     public function post($pid)
    {
         
         $this->id = $pid;
         $this->approvePost();

         
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
  
        $data['option'] = "";
        $data['page'] = "home";
        
       $this->load->view('includes/header_admin', $data); 
       $this->load->database();

        
        $data['info'] = $this->post_model->get_all_book_info($pid) ;
        
        $this->load->view('contents/approve_ad_view',$data);

        $this->db->close();
        }
        
        
       public  function approvePost() 
        {
           $id= $this->input->post('m');
           $this->load->helper('form');
           $this->load->helper('html');
           $this->load->model('post_model');
           
           if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
       
        $data['option'] = "";
        $data['page'] = "";
           
           if($this->input->post('sbm')== "approve")
           {
               
            /* @var $postid type */
              $this->post_model->approveAd($id);
              
        
            //$this->load->view('includes/admin_header', $data);
            $p_status = "pending";
            //

            $this->load->database();      
            //$data['names']= $this->post_model->getBookNames($p_status);
            $data['post'] = $this->post_model->getPostList();

            $this->load->view('includes/header_admin', $data); 
            $this->load->view('contents/admin_home_view',$data);

            $this->db->close();
           }
           else if($this->input->post('sbm') == "reject")
               {
                 $this->post_model->rejectAd($id);
                 $this->load->view('includes/header_admin', $data); 
                $p_status = "pending";
                

                $this->load->database();      
              //  $data['names']= $this->post_model->getBookNames($p_status);
                $data['post'] = $this->post_model->getPostList();


                $this->load->view('contents/admin_home_view',$data);

                $this->db->close();
               }
        }
        
        
        
}
?>
