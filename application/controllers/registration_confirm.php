<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registration_confirm extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
        $this->load->model('customer_model');
    }

    function index() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('un', 'Username', 'trim|required|xss_clean|min_length[5]|max_length[20]|callback_check_username_unique');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|callback_check_email_unique');
        $this->form_validation->set_rules('pw', 'Password', 'trim|required|xss_clean|min_length[5]|max_length[20]||matches[cpw]');
        $this->form_validation->set_rules('cpw', 'Password Confirmation', 'trim|required|xss_clean|min_length[5]|max_length[20]');

        if ($this->form_validation->run() == FALSE && !isset($_POST['agree'])) {
            $data['option'] = "";
            $data['page'] = "";
            $this->load->database();
            $data['category'] = $this->category_model->getFullList("category");
            $data['author'] = $this->category_model->getFullList("author");
            $data['district'] = $this->category_model->getFullList("district");
            $data['institute'] = $this->category_model->getFullList("institute");
            $data['book'] = $this->book_model->getAllBooks();
            $this->load->view('includes/header', $data);
            $this->load->view('includes/ad_portion');
            $this->load->view('contents/register_view');
            $this->db->close();
            $this->load->view('includes/footer');
        } else {
            echo 'ok';
        }
    }

    function check_username_unique($username) {
        //query the database
        $this->load->database();
        $result = $this->customer_model->checkUsername($username);

        if ($result == FALSE) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_username_unique', 'This username already used. Try new one.');
            return false;
        }
        $this->db->close();
    }

    function check_email_unique($email) {
        //query the database
        $this->load->database();
        $result = $this->customer_model->checkEmail($email);

        if ($result == FALSE) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_email_unique', 'This email address already used. Try new one.');
            return false;
        }
        $this->db->close();
    }

}

?>
