<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('book_model');
        $this->load->library('user_agent');
    }

    public function index() {
        if ($this->agent->is_referral())
        {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $this->load->view('includes/header', $data);
        $this->load->database();
        $data['category'] = $this->category_model->getFullList("category");
        $data['division'] = $this->category_model->getFullList("division");
        $data['author'] = $this->category_model->getFullList("author");
        $data['recently_added_book'] = $this->book_model->getFullRecentlyAddedBookList();
        $data['mostly_viewed_book'] = $this->book_model->getMostlyViewedBookList();
        $this->load->view('contents/home_view', $data);
        
        $this->db->close();
        $this->load->view('includes/footer');
    }

}