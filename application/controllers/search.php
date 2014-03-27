<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Search extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('book_model');
        $this->load->library('user_agent');
        $this->load->model('customer_model');
    }

    public function index() {
        $book_name = $this->input->post('book_name');
        $category = $this->input->post('category');
        $author = $this->input->post('author');
        $campus = $this->input->post('campus');
        $district = $this->input->post('district');
        


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
            $data['pro_pic'] = $this->customer_model->getProPic($data['id']);
        } else {
            $data['option'] = "";
        }
        $data['page'] = "";
        $data['criteria'] = "search";
        $data['division'] = $this->category_model->getFullList("division");

        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $data['c_name'] = "Searched";
        $data['search'] = $this->book_model->search($book_name, $category, $author, $campus, $district);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/category_books_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }

}