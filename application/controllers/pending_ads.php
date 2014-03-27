<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pending_ads extends CI_Controller {
        function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
        $this->load->model('customer_model');
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
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $post_status = "pending";
        $data['post'] = $this->book_model->getAllPostList($post_status, $u_id);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/pending_ads_view', $data);
        $this->db->close();
        $this->load->view('includes/footer');
    }
}