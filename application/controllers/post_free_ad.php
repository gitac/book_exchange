<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_free_ad extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('book_model');
       // $this->load->library('user_agent');
    }

    public function index() {
       /* if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }*/
//        $data['book_error'] = NULL;
        $data['option'] = "";if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
           $data['id'] = $session_data['id'];
           $data['username'] = $session_data['username'];
           $data['option'] = "my_profile";
        } else {
            $data['option'] = "";
        }
        $data['page'] = "";
        
        $this->load->database();
        $data['division'] = $this->category_model->getFullList("division");
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $data['school'] = $this->category_model->getFullList('school');
        $data['college'] = $this->category_model->getFullList('college');
        $data['varsity'] = $this->category_model->getFullList('varsity');
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/post_free_ad_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }
//    public function check($error){ //complete it
//       /* if ($this->agent->is_referral()) {
//            $data['agent'] = $this->agent->referrer();
//        } else {
//            $data['agent'] = NULL;
//        }*/
//        $data['book_error'] = $error;
//        $data['option'] = "";
//        $data['page'] = "";
//        $this->load->database();
//        $data['division'] = $this->category_model->getFullList("division");
//        $data['category'] = $this->category_model->getFullList("category");
//        $data['author'] = $this->category_model->getFullList("author");
//        $data['district'] = $this->category_model->getFullList("district");
//        $data['institute'] = $this->category_model->getFullList("institute");
//        $data['book'] = $this->book_model->getAllBooks();
//        $data['school'] = $this->category_model->getFullList('school');
//        $data['college'] = $this->category_model->getFullList('college');
//        $data['varsity'] = $this->category_model->getFullList('varsity');
//        $this->load->view('includes/header', $data);
//        $this->load->view('includes/ad_portion');
//        $this->load->view('contents/post_free_ad_view', $data);
//
//        $this->db->close();
//        $this->load->view('includes/footer');
//    }

}