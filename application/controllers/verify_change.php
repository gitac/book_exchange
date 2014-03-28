<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Verify_change extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
        $this->load->model('customer_model');
    }

    function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|callback_check_email');
        $this->form_validation->set_rules('pw', 'Password', 'trim|required|xss_clean|callback_check_password');
        $this->form_validation->set_rules('npw', 'Password', 'trim|required|xss_clean|min_length[5]|max_length[20]||matches[c_npw]');
        $this->form_validation->set_rules('c_npw', 'Password Confirmation', 'trim|required|xss_clean|min_length[5]|max_length[20]');
        
        

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
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
        } else {
            $password = $this->input->post('npw');
            $email = $this->input->post('email');
            $this->customer_model->updatePw($email, $password);
            redirect('my_profile', 'refresh');
        }
    }
    
    function check_email($email) {
//query the database
        $this->load->database();
        $result = $this->customer_model->checkEmail($email);

        if ($result == FALSE) {
            $this->form_validation->set_message('check_email', 'Wrong Email address.');
            return false;
            
        } else {
            return TRUE;
        }
        $this->db->close();
    }

    

    function check_password($password) {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
           $data['id'] = $session_data['id'];
           $username = $session_data['username'];
           $data['option'] = "my_profile";
           $data['pro_pic'] = $this->customer_model->getProPic($data['id']);
        }
        $password = md5($password);
        //query the database
        $this->load->database();
        $result = $this->customer_model->checkPassword($username, $password);

        if ($result == FALSE) {
            $this->form_validation->set_message('check_password', 'Wrong password');
            return false;
        } else {
            $valid = $this->customer_model->checkValidUser($username, $password);
            if ($valid == FALSE) {
                $this->form_validation->set_message('check_password', 'Invalid username and password.Please check out your mail.');
                return false;
            } else {
                return TRUE;
            }
        }
        $this->db->close();
    }

}

?>
