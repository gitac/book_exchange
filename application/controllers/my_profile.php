<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class My_profile extends CI_Controller {

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
            $u_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['pro_pic'] = $this->customer_model->getProPic($u_id);
        }
        $data['option'] = "my_profile";
        $data['page'] = "";

        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $post_status = "active";
        $data['post'] = $this->book_model->getAllPostList($post_status, $u_id);
        $data['post_request'] = $this->book_model->getRequestCount($u_id);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/my_profile_view', $data);
        $this->db->close();
        $this->load->view('includes/footer');
    }

    function remove_ad($post_id) {
        $this->load->database();
        $this->book_model->remove_ad($post_id);
        $this->db->close();
        redirect('my_profile', 'refresh');
    }

    function delete_ad($page, $post_id) {
        $this->load->database();
        $this->book_model->delete_ad($post_id);
        $this->db->close();
        redirect($page, 'refresh');
    }

    function create_profile($page) {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
        }
        $f_name = $this->input->post('f_name');
        $l_name = $this->input->post('l_name');
        $gender = $this->input->post('gender');
        $phone = $this->input->post('phone');
        $selected_neighborhood = $this->input->post('selected_neighborhood');
        $address = $this->input->post('address');
        $institute = $this->input->post('institute');
        $ins_name = $this->input->post('ins_name');
        $about_me = $this->input->post('about_me');
        $interests = $this->input->post('interests');
        if (empty($_FILES['img_file']['name']) && $page == "create") {
            if ($gender == "male") {
                $image_path = "assets/customer_images/default_profile_male.jpg";
            } else {
                $image_path = "assets/customer_images/default_profile_female.jpg";
            }
        } else if(empty($_FILES['img_file']['name']) && $page == "edit"){
            $image_path = $this->customer_model->getProPic($data['id']);
        }else{
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $extension = end(explode(".", $_FILES["img_file"]["name"]));
            $image_name = time() . "." . $extension;
            $image_path = "assets/customer_images/" . $image_name;
            if ($_FILES["img_file"]["name"] != "") {
                if (($_FILES["img_file"]["size"] < 999999999999) && in_array($extension, $allowedExts)) {
                    move_uploaded_file($_FILES["img_file"]["tmp_name"], $image_path);
                }
            }
        }
        if ($phone == NULL || $phone == "" || preg_match("/^01(6|5|7|9|1|8)\d{8}$/", $phone)) {
            if ($f_name == NULL || $f_name == ""
                    || $l_name == NULL || $l_name == ""
                    || $address == NULL || $address == ""
                    || $ins_name == NULL || $ins_name == "") {
                $data['create_pro_error'] = "Please fill all the required input fileds.";
                $this->redirect_create_profile($data['create_pro_error']);
            } else {
                $this->customer_model->insertProInfo($f_name, $l_name, $gender, $phone, $selected_neighborhood, $address, $institute, $ins_name, $about_me, $interests, $image_path, $data['id']);
                redirect('my_profile', 'refresh');
            }
        } else {
            $data['create_pro_error'] = "Please give a valid mobile number.";
            $this->redirect_create_profile($data['create_pro_error']);
        }
    }

    function redirect_create_profile($error) {
        $this->load->database();
        $data['division'] = $this->category_model->getFullList("division");
        $data['district'] = $this->category_model->getFullList("district");
        $data['near_area'] = $this->category_model->getFullList("near_area");
        $data['school'] = $this->category_model->getFullList('school');
        $data['college'] = $this->category_model->getFullList('college');
        $data['varsity'] = $this->category_model->getFullList('varsity');
        $data['create_pro_error'] = $error;
        $this->load->view('includes/header_create_profile');
        $this->load->view('contents/create_profile_view', $data);
        $this->db->close();
    }

}