<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Approve_ad extends CI_Controller {
    
   


    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('post_model');
        $this->load->model('book_model');
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
        //
      
        $this->load->database();      
        $data['names']= $this->post_model->getBookNames($p_status);
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
        
       $this->load->view('includes/admin_header',$data); 
       $this->load->database();
       
        
      
        
        $book_id = $this->post_model->getBookId($pid);
        $book_category_id=$this->post_model->getCategoryId($book_id);
        $author_id = $this->post_model->getAuthorId($book_id);
        $post_giver_id = $this->post_model->adGiverId($pid);        
        $is_student= $this->post_model->isStudent($post_giver_id);
        
        if($is_student == "student")
            {
              $data['occupation'] = "Student";
              $data['institute_name'] = $this->post_model->getInstituteName($post_giver_id);
            }
         else 
         {
             $data['occupation'] = "Service holder";
             $data['institute_name'] = $this->post_model->getInstituteName($post_giver_id);
         }
        
        $data['location_name']= $this->post_model->getLocationName($post_giver_id);
        $data['post_giver_detail']= $this->post_model->postGiverDetail($post_giver_id);                   
        $data['book_name']= $this->post_model->getBookName($book_id);        
        $data['category_name']= $this->post_model->getCategoryName($book_category_id);
        $data['author_name'] = $this->post_model->getAuthorName($author_id);
        $data['book_edition'] = $this->post_model->getBookEdition($pid);
        
      
        
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
            $data['names']= $this->post_model->getBookNames($p_status);
            $data['post'] = $this->post_model->getPostList();


            $this->load->view('contents/admin_home_view',$data);

            $this->db->close();
           }
           else if($this->input->post('sbm') == "reject")
               {
                 $this->post_model->rejectAd($id);
                 $this->load->view('includes/admin_header', $data);
                $p_status = "pending";
                //

                $this->load->database();      
                $data['names']= $this->post_model->getBookNames($p_status);
                $data['post'] = $this->post_model->getPostList();


                $this->load->view('contents/admin_home_view',$data);

                $this->db->close();
               }
        }
        
        
        
}
?>
