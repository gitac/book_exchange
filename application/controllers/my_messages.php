<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_messages extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
        $this->load->model('customer_model');
        $this->load->library('user_agent');
        $this->load->helper('text');
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
        $data['outbox'] = $this->customer_model->getAllSendmsg($id);
        $data['inbox'] = $this->customer_model->getAllReceivemsg($id);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/my_messages_view', $data);
        $this->db->close();
        $this->load->view('includes/footer');
    }

    function msg($receiver_id) {

        $msg = $this->input->post('msg');
        $bid = $this->input->post('book');
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $sender_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['option'] = "my_profile";
            $data['pro_pic'] = $this->customer_model->getProPic($data['id']);
            $data['request'] = $this->book_model->isRequested($bid, $data['id']);
        } else {
            $data['id'] = NULL;
            $data['option'] = "";
            $data['request'] = NULL;
        }

        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }

        $data['msg'] = "Message is sent.";
        $this->load->database();
        $this->customer_model->msg($msg, $sender_id, $receiver_id);


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

    function outbox_msg($receiver_id) {

        $msg = $this->input->post('msg');
        if ($msg == NULL || $msg == "")
            redirect('my_messages/inbox_msg_ddetails/' . $receiver_id, refresh);
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $sender_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['option'] = "my_profile";
            $data['pro_pic'] = $this->customer_model->getProPic($data['id']);
        } else {
            $data['id'] = NULL;
            $data['option'] = "";
            $data['request'] = NULL;
        }

        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }

        if ($this->customer_model->msg($msg, $sender_id, $receiver_id)) {


            redirect('my_messages', 'refresh');
        }
    }

    function outbox_msg_ddetails($receiver_id) {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $sender_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['option'] = "my_profile";
            $data['pro_pic'] = $this->customer_model->getProPic($data['id']);
        } else {
            $data['id'] = NULL;
            $data['option'] = "";
            $data['request'] = NULL;
        }

        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }

        $this->load->database();

        $data['page'] = "";
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();

        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');

        $data['outbox_msg_details'] = $this->customer_model->detailOutboxMsg($sender_id, $receiver_id);
        $this->load->view('contents/outbox_msg_details_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }

    function inbox_msg_ddetails($sender_id) {


//        $bid = $this->input->post('book');
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $receiver_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['option'] = "my_profile";
            $data['pro_pic'] = $this->customer_model->getProPic($data['id']);
//          $data['request'] = $this->book_model->isRequested($bid, $data['id']);
        } else {
            $data['id'] = NULL;
            $data['option'] = "";
            $data['request'] = NULL;
        }

        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }

        $this->load->database();

        $data['page'] = "";
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
//        $data['num_request'] = $this->book_model->getNumberOfRequest($bid);

        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
//        $data['book_info'] = $this->book_model->getBookInfo($bid);


        $data['inbox_msg_details'] = $this->customer_model->detailInboxMsg($sender_id, $receiver_id);
        $this->load->view('contents/inbox_msg_details_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }

    function inbox_msg($sender_id) {

        $msg = $this->input->post('msg');
        $sender = $this->input->post('sender');
        if ($msg == null)
            redirect('my_messages/inbox_msg_ddetails/' . $sender, 'refresh');

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $receiver_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['option'] = "my_profile";
            $data['pro_pic'] = $this->customer_model->getProPic($data['id']);
        } else {
            $data['id'] = NULL;
            $data['option'] = "";
            $data['request'] = NULL;
        }
        $this->customer_model->msg($msg, $sender_id, $receiver_id);
        redirect('my_messages/inbox_msg_ddetails/' . $sender, 'refresh');
    }

}