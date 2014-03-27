<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create_wishlist extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('book_model');
        $this->load->model('wishlist_model');
        $this->load->library('user_agent');
        $this->load->helper('array');
    }

    public function index() {
        $data['book_error'] = NULL;
        $data['option'] = "";
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['option'] = "my_profile";        
            $data['page'] = "";

        $this->load->database();
        $data['division'] = $this->category_model->getFullList("division");
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['near_area'] = $this->category_model->getFullList("near_area");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $data['school'] = $this->category_model->getFullList('school');
        $data['college'] = $this->category_model->getFullList('college');
        $data['varsity'] = $this->category_model->getFullList('varsity');
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/create_wishlist_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
        }
               
    }
    
    function saveWishlist(){
            
         if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            
            $id = array_shift($data);
            $cid = $this->input->post('selected_category');
            $book_name = $this->input->post('book_name');
        $author_name1 = $this->input->post('author_name1');
        echo $book_name;
        echo $cid;
    
          if ($book_name == NULL || $book_name == ""
                || $author_name1 == NULL || $author_name1 == ""
                
                
                || empty($_FILES['img_file']['name'])
                || $_FILES["img_file"]["error"] > 0) {

            $data['book_error'] = "Please fill all the required input fileds.";
            $data['option'] = "";
            if ($this->session->userdata('logged_in')) {
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
        $data['near_area'] = $this->category_model->getFullList("near_area");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $data['school'] = $this->category_model->getFullList('school');
        $data['college'] = $this->category_model->getFullList('college');
        $data['varsity'] = $this->category_model->getFullList('varsity');
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/create_wishlist_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
        }
 else {
         $b['id'] = $this->wishlist_model->Book($cid,$book_name);
        $bookid= array_shift($b);
           $result =  $this->wishlist_model->insertBookInfo($book_name,$id,$cid);
           if($result){
               $this->load->view('success-view');
           }
           
 }
       
        
  }
 }
 
    
}

?>