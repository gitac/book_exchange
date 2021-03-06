<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Wishlist_details extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
        $this->load->model('customer_model');
        $this->load->model('wishlist_model');
        $this->load->library('user_agent');
    }

    public function index() {
        $this->load->database();
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
           $data['id'] = $session_data['id'];
           $data['username'] = $session_data['username'];
            $data['pro_pic'] = $this->customer_model->getProPic($data['id']);
           $data['option'] = "my_profile";
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
        $this->db->close();
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/wishlist_details_view');
        $this->load->view('includes/footer');
        
    }
    
public function wishlist_book($wid){
       
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $this->load->database();
        if ($this->session->userdata('logged_in')) {
           $session_data = $this->session->userdata('logged_in');
           $data['id'] = $session_data['id'];
           $data['username'] = $session_data['username'];
           $data['option'] = "my_profile";
           $data['pro_pic'] = $this->customer_model->getProPic($data['id']);
        } else {
            $data['option'] = "";
            $data['request'] = NULL;
        }
        $data['page'] = "";
        
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();

       
        $this->load->view('includes/header', $data);
   
        $this->load->view('includes/ad_portion');
        $data['wish_list_info'] = $this->wishlist_model->getWishlistBookInfo($wid);
        $data['wishlist_book']= $this->wishlist_model->getWishlistBookDetail($wid);
        //$data['available_book'] = $this->book_model->getAvailableBooks($wid);
        //$data['available_user'] = $this->book_model->AvailableUsers($wid);
        
        $this->load->view('contents/wishlist_details_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }
    
}
?>
