<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_wishlist extends CI_Controller {
        function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
        $this->load->model('wishlist_model');
        $this->load->model('customer_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
           $session_data = $this->session->userdata('logged_in');
           $id = $data['id'] = $session_data['id'];
           $data['username'] = $session_data['username'];
           $data['pro_pic'] = $this->customer_model->getProPic($id);
        }
        $data['option'] = "my_profile";
        $data['page'] = "";
        $this->load->database();
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $data['wishlist_book']= $this->wishlist_model->getWishlistBook($id);
        $data['available_book'] = $this->book_model->getWishlistPostBook($id);
        
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/my_wishlist_view',$data);
        $this->db->close();
        $this->load->view('includes/footer');
    }
}