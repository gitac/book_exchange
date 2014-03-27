<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class My_profile extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
           $session_data = $this->session->userdata('logged_in');
           $u_id = $data['id'] = $session_data['id'];
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
        $post_status = "active";
        $data['post'] = $this->book_model->getAllPostList($post_status, $u_id);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/my_profile_view', $data);
        $this->db->close();
        $this->load->view('includes/footer');
    }
    
    function create_profile(){
        $f_name = $this->input->post('f_name');
        $l_name = $this->input->post('l_name');
        $gender = $this->input->post('gender');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $division = $this->input->post('division');
        $selected_district = $this->input->post('selected_district');
        $selected_neighborhood = $this->input->post('selected_neighborhood');
        $address = $this->input->post('address');
        
        $institute = $this->input->post('institute');
        $school_name = $this->input->post('school_name');
        $college_name = $this->input->post('college_name');
        $varsity_name = $this->input->post('varsity_name');
        $office_name = $this->input->post('office_name');
        $office_address = $this->input->post('office_address');



        if ($book_name == NULL || $book_name == ""
                || $author_name1 == NULL || $author_name1 == ""
                || $book_des == NULL || $book_des == ""
                || $name == NULL || $name == ""
                || $email == NULL || $email == ""
                || $phone == NULL || $phone == ""
                || empty($_FILES['img_file']['name'])
                || $_FILES["img_file"]["error"] > 0) {

            $data['book_error'] = "Please fill all the required input fileds.";
            $data['option'] = "";
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
            $data['division'] = $this->category_model->getFullList("division");
            $data['category'] = $this->category_model->getFullList("category");
            $data['author'] = $this->category_model->getFullList("author");
            $data['district'] = $this->category_model->getFullList("district");
            $data['near_area'] = $this->category_model->getFullList("near_area");
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
    }

}