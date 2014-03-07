<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Show_category extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('book_model');
        $this->load->library('user_agent');
    }

    public function categories() {
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "categories";
        
        $this->load->database();
        
        $data['division'] = $this->category_model->getFullList("division");
        
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/show_category_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }

    public function location($did) {
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "districts";
        $this->load->database();
        $data['division'] = $this->category_model->getFullList("division");
        
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $data['districts'] = $this->category_model->getAllDistrictList($did);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/show_category_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }

    public function authors() {
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "authors";
        $this->load->database();
        
        $data['division'] = $this->category_model->getFullList("division");
        
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/show_category_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }

    public function schools() {
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "schools";

        $this->load->database();
        
        $data['list'] = $this->category_model->getFullList("school");
        
        $data['division'] = $this->category_model->getFullList("division");
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/show_category_view', $data);

        $this->db->close();

        $this->load->view('includes/footer');
    }

    public function colleges() {
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "colleges";

        $this->load->database();
        $data['list'] = $this->category_model->getFullList("college");
        $data['division'] = $this->category_model->getFullList("division");
        
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/show_category_view', $data);

        $this->db->close();

        $this->load->view('includes/footer');
    }

    public function varsities() {
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "varsities";

        $this->load->database();
        $data['list'] = $this->category_model->getFullList("varsity");
        $data['division'] = $this->category_model->getFullList("division");
        
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/show_category_view', $data);

        $this->db->close();

        $this->load->view('includes/footer');
    }

}