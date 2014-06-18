<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('book_model');
        $this->load->model('customer_model');
        $this->load->library('user_agent');
    }

    public function index() {
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['pro_pic'] = $this->customer_model->getProPic($id);
            $data['option'] = "my_profile";
        } else {
            $data['option'] = "";
        }

        $data['page'] = "home";

        $this->load->database();
        $data['recently_added_book'] = $this->book_model->getFullRecentlyAddedBookList();
        $data['mostly_viewed_book'] = $this->book_model->getMostlyViewedBookList();
        $data['division'] = $this->category_model->getFullList("division");

        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $this->load->view('includes/header', $data);
        $this->load->view('contents/home_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }
    
    function about_us(){
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['pro_pic'] = $this->customer_model->getProPic($id);
            $data['option'] = "my_profile";
        } else {
            $data['option'] = "";
        }

        $data['page'] = "about";

        $this->load->database();
        $data['division'] = $this->category_model->getFullList("division");

        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $this->load->view('includes/header', $data);
        $this->load->view('contents/about_us_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }

    function mailcheck($username) {
        $query = $this->customer_model->updateMailCheck($username);
        $sess_array = array();

        $sess_array = array(
            'id' => $query,
            'username' => $username
        );
        $this->session->set_userdata('logged_in', $sess_array);

        $this->session->sess_expire_on_close = TRUE;
        $this->session->sess_update();
        redirect('create_profile', 'refresh');
    }

}