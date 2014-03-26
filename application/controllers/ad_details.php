<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad_details extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
        $this->load->library('user_agent');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
           $data['id'] = $session_data['id'];
           $data['username'] = $session_data['username'];
           $data['option'] = "my_profile";
        } else {
            $data['option'] = "";
        }
        $data['page'] = "";
        $this->load->database();
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $this->load->view('includes/header', $data);
        $this->db->close();
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/ad_details_view');
        $this->load->view('includes/footer');
    }
    public function book($bid){
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $this->load->database();
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
           $data['id'] = $session_data['id'];
           $data['username'] = $session_data['username'];
           $data['option'] = "my_profile";
           $data['request'] = $this->book_model->isRequested($bid, $data['id']);
        } else {
            $data['option'] = "";
            $data['request'] = NULL;
        }
        $data['page'] = "";
        
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $data['num_request'] = $this->book_model->getNumberOfRequest($bid);
        
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $data['book_info'] = $this->book_model->getBookInfo($bid);
        $this->load->view('contents/ad_details_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }
    
    public function user_post_details($bid){
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $this->load->database();
        if ($this->session->userdata('logged_in')) {
           $session_data = $this->session->userdata('logged_in');
           $data['id'] = $session_data['id'];
           $data['username'] = $session_data['username'];
           $data['option'] = "my_profile";
           $data['request'] = $this->book_model->isRequested($bid, $data['id']);
        } else {
            $data['option'] = "";
            $data['request'] = NULL;
        }
        $data['page'] = "";
        
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $data['num_request'] = $this->book_model->getNumberOfRequest($bid);
        $data['requested_user'] = $this->book_model->RequestedUser($bid);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $data['book_info'] = $this->book_model->getBookInfo($bid);
        $this->load->view('contents/ad_details_user_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }
    
    function request($pid){
        if ($this->session->userdata('logged_in')) {
           $session_data = $this->session->userdata('logged_in');
           $data['id'] = $session_data['id'];
           $data['username'] = $session_data['username'];
           
           $this->load->database();
           $this->book_model->insertRequest($pid, $data['id']);
           $this->db->close();
           
           
           redirect('ad_details/book/'.$pid, 'refresh');
        } else {
            redirect('login', 'refresh');
        }
        
    }
    
    function remove_request($pid){
        if ($this->session->userdata('logged_in')) {
           $session_data = $this->session->userdata('logged_in');
           $data['id'] = $session_data['id'];
           $data['username'] = $session_data['username'];
           
           $this->load->database();
           $this->book_model->deleteRequest($pid, $data['id']);
           $this->db->close();
           
           
           redirect('ad_details/book/'.$pid, 'refresh');
        } else {
            redirect('login', 'refresh');
        }
    }

}

?>