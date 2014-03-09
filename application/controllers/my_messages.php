<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_messages extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
           $session_data = $this->session->userdata('logged_in');
           $id = $data['id'] = $session_data['id'];
           $data['username'] = $session_data['username'];
        }
        $data['option'] = "my_profile";
        $data['page'] = "";
        $this->load->database();
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/my_messages_view');
        $this->db->close();
        $this->load->view('includes/footer');
    }

}