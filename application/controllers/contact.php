<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
        $this->load->model('customer_model');
    }

    public function index() {
        $this->redirect_contact(NULL);
    }

    function contact_us() {
        $fn = $this->input->post('fn');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $msg = $this->input->post('msg');
        if ($fn == NULL || $fn == "" ||
                $email == NULL || $email == ""
                || $subject == NULL || $subject == ""
                || $msg == NULL || $msg == "") {
            $error = "Please fill all the fields.";
            $this->redirect_contact($error);
        } else {
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'ssl://smtp.googlemail.com';
                $config['smtp_port'] = 465;
                $config['smtp_user'] = 'bookexchange4857@gmail.com';
                $config['smtp_pass'] = 'bookexchange';

                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $from = $email;
                $rec_email = $this->input->post('email');
                $this->email->from($from, 'BookExchange');
                $to = "mushratesha@gmail.com";
                $this->email->to($to);

                $this->email->subject($subject);
                $this->email->message($msg . " from " . $fn);

                if ($this->email->send()) {
                    redirect('contact/contact_success', 'refresh');
                } else {
                   redirect('register/email_error', 'refresh');
                    // show_error($this->email->print_debugger());
                    // show_error($this->email->print_debugger());
                    //return false;
                }
        }
    }
    function contact_success(){
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
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/contact_success_view');
        $this->db->close();
        $this->load->view('includes/footer');
    }
    function redirect_contact($error){
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['option'] = "my_profile";
            $data['pro_pic'] = $this->customer_model->getProPic($data['id']);
        } else {
            $data['option'] = "";
        }
        $data['contact_error'] = $error;
        $data['page'] = "contact";
        $this->load->database();
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/contact_view');
        $this->db->close();
        $this->load->view('includes/footer');
    }

}