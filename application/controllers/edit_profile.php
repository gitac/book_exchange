<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_profile extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
        $this->load->model('customer_model');
        $this->load->model('book_model');
    }

    public function index() {
        $this->load->database();
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $u_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['pro_pic'] = $this->customer_model->getProPic($u_id);
        }
        $data['option'] = "my_profile";
        $data['page'] = "";
        $this->load->database();
        $data['edit_pro_error'] = NULL;
        $data['category'] = $this->category_model->getFullList("category");
        $data['division'] = $this->category_model->getFullList("division");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['school'] = $this->category_model->getFullList('school');
        $data['college'] = $this->category_model->getFullList('college');
        $data['varsity'] = $this->category_model->getFullList('varsity');
        $data['near_area'] = $this->category_model->getFullList("near_area");
        $data['book'] = $this->book_model->getAllBooks();
        $data['customer'] = $this->customer_model->getCustomerInfo($u_id);
        $this->load->view('includes/header_create_profile');
        $this->load->view('contents/edit_profile_view', $data);
        $this->db->close();
    }
    
    function send_pw_success(){
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
        $this->load->view('contents/send_pw_success_view');
        $this->db->close();
        $this->load->view('includes/footer');
    }
}