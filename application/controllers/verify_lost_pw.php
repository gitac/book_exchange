<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Verify_lost_pw extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
        $this->load->model('customer_model');
    }

    function index() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|callback_check_email');

        if ($this->form_validation->run() == FALSE) {
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
            $this->load->view('contents/lost_password_view');
            $this->db->close();
            $this->load->view('includes/footer');
        } else {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_port'] = 465;
            $config['smtp_user'] = 'smrity48@gmail.com';
            $config['smtp_pass'] = '48mum01818733806';

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            $rec_email = $this->input->post('email');
            $this->email->from('smrity48@gmail.com', 'BookExchange');
            $this->email->to($rec_email);
            $this->email->subject('Lost password');
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $pw = substr(str_shuffle($chars), 0, 10);
            
            $this->email->message('Your new password is ' . $pw);

            if ($this->email->send()) {
                $pw = md5($pw);
                $this->customer_model->updatePw($rec_email, $pw);
                echo "send";
            } else {
                echo "error";
                // show_error($this->email->print_debugger());
                // show_error($this->email->print_debugger());
                //return false;
            }
        }
    }


    function check_email($email) {
        //query the database
        $this->load->database();
        $result = $this->customer_model->checkEmail($email);

        if ($result != FALSE) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_email', 'This email address is not exists.');
            return false;
        }
        $this->db->close();
    }

}

?>
