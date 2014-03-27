<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Change_email_pw extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
        $this->load->model('customer_model');
    }

    public function index() {
        $this->load->database();
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['pro_pic'] = $this->customer_model->getProPic($id);
        }
        $data['option'] = "my_profile";
        $data['page'] = "";
        
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $post_status = "active";
        $data['post'] = $this->book_model->getAllPostList($post_status, $id);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/change_email_pw_view', $data);
        $this->db->close();
        $this->load->view('includes/footer');
    }

}