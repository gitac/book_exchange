<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create_wishlist extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('book_model');
        $this->load->model('wishlist_model');
    }

    public function index() {
        $data['book_error'] = NULL;
        $data['option'] = "";
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['option'] = "my_profile";
        } else {
            $data['option'] = "";
        }
    
        $selected_category = $this->input->post('selected_category');
        $book_name = $this->input->post('book_name');
        $author_name1 = $this->input->post('author_name1');
       
        $image = $this->input->post('img_file');
        
           if ($book_name == NULL || $book_name == ""
                || $author_name1 == NULL || $author_name1 == ""
                || $selected_category == NULL || $selected_category == ""                
                || empty($_FILES['img_file']['name'])
                || $_FILES["img_file"]["error"] > 0) 
            {
                       
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
            
            $this->load->database();
          
            
            $result = $this->wishlist_model->getCategoryId($selected_category);
            $this->wishlist_model->addBook($book_name,$result);
            //$category_id = $this->wishlist_model->getCategoryId($selected_category);
            //$category_id =12;
           
           /* if( $result=$this->wishlist_model->book($category_id,$book_name))
                {
                   $book_id = $this->wishlist_model->book($category_id,$book_name);
                }
            else
                {
                    $this->wishlist_model->addBook($book_name,$category_id);
                    $result = $this->wishlist_model->book($book_name,$category_id);
                    $book_id = $result['book_id'];
                }    

           
       if($insert = $this->wishlist_model->insertBookInfo($book_id,$image,$id)) {}*/
          //$this->load->view('success-view',$result);
        }
        
        
    }
    
}
?>