<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Show_category extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('book_model');
        $this->load->library('user_agent');
        $this->load->model('customer_model');
    }

    public function categories() {
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $this->load->database();
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $u_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['pro_pic'] = $this->customer_model->getProPic($u_id);
            $data['option'] = "my_profile";
        } else {
            $data['option'] = "";
        }
        $data['page'] = "";
        $data['type'] = "categories";
        
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
        $this->load->database();
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $u_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['pro_pic'] = $this->customer_model->getProPic($u_id);
            $data['option'] = "my_profile";
        } else {
            $data['option'] = "";
        }
        $data['page'] = "";
        $data['type'] = "districts";
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

        public function district($did) {
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $this->load->database();
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $u_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['pro_pic'] = $this->customer_model->getProPic($u_id);
            $data['option'] = "my_profile";
        } else {
            $data['option'] = "";
        }
        $data['page'] = "";
        $data['type'] = "areas";
        $data['division'] = $this->category_model->getFullList("division");
        
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $data['near_areas'] = $this->category_model->getAllNearAreaList($did);
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
        $this->load->database();
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $u_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['pro_pic'] = $this->customer_model->getProPic($u_id);
            $data['option'] = "my_profile";
        } else {
            $data['option'] = "";
        }
        $data['page'] = "";
        $data['type'] = "authors";
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
        $this->load->database();
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $u_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['pro_pic'] = $this->customer_model->getProPic($u_id);
            $data['option'] = "my_profile";
        } else {
            $data['option'] = "";
        }
        $data['page'] = "";
        $data['type'] = "schools";
        
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
        $this->load->database();
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $u_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['pro_pic'] = $this->customer_model->getProPic($u_id);
            $data['option'] = "my_profile";
        } else {
            $data['option'] = "";
        }
        $data['page'] = "";
        $data['type'] = "colleges";
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
        $this->load->database();
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $u_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['pro_pic'] = $this->customer_model->getProPic($u_id);
            $data['option'] = "my_profile";
        } else {
            $data['option'] = "";
        }
        $data['page'] = "";
        $data['type'] = "varsities";
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