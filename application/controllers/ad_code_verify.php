<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad_code_verify extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
        $this->load->model('customer_model');
    }

    function index() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('book_name', 'BookName', 'trim|required|xss_clean');
        $this->form_validation->set_rules('author_name1', 'AuthorName', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['option'] = "";if ($this->session->userdata('logged_in')) {
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
        } else {
            echo "posted";
        }
    }


}

?>
