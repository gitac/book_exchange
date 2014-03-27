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
    
    function save_wishlist(){
            
         if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            
         }
            $cid = $this->input->post('selected_category');
            $book_name = $this->input->post('book_name');
            $author_name1 = $this->input->post('author_name1');
            $author_name2 = $this->input->post('author_name2');
            $author_name3 = $this->input->post('author_name3');
            $author_name4 = $this->input->post('author_name4');
            $author_name5 = $this->input->post('author_name5');
    
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
    
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $extension = end(explode(".", $_FILES["img_file"]["name"]));
            $image_name = time() . "." . $extension;
            $image_path = "assets/book_images/" . $image_name;
            if ($_FILES["img_file"]["name"] != "") {
                if (($_FILES["img_file"]["size"] < 999999999999) && in_array($extension, $allowedExts)) {
                    move_uploaded_file($_FILES["img_file"]["tmp_name"], $image_path);
                }
            }
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            
     
     $this->load->database();
            //$this->load->model('wishlist_model');
       $bookid = $this->book_model->getBookId($book_name, $cid);
      // $authorid = $this->book_model->getAuthorId($author_name1);
       if($bookid == NULL){
           $bookid = $this->book_model->getBookIdAfterInsert($book_name, $cid);
           $authorid1 = $this->book_model->getAuthorIdAfterInsert($author_name1);
           $this->book_model->insertAuthorBook($bookid, $authorid1);
            if ($author_name2 != NULL && $author_name2 != "") {
                $a_id_2 = $this->book_model->getAuthorId($author_name2);
                $this->book_model->insertAuthorBook($bookid, $a_id_2);
            }
                if ($author_name3 != NULL && $author_name3 != "") {
                    $a_id_3 = $this->book_model->getAuthorId($author_name3);
                    $this->book_model->insertAuthorBook($bookid, $a_id_3);
                }
                    if ($author_name4 != NULL && $author_name4 != "") {
                        $a_id_4 = $this->book_model->getAuthorId($author_name4);
                        $this->book_model->insertAuthorBook($bookid, $a_id_4);
                    }
                    if ($author_name5 != NULL && $author_name5 != "") {
                        $a_id_5 = $this->book_model->getAuthorId($author_name5);
                        $this->book_model->insertAuthorBook($bookid, $a_id_5);
                    }
                }
            }
                     
          $this->book_model->insertBookInfo($bookid,$image_path,$data['id']); 
          $this->db->close(); 
    
          redirect('my_wishlist','refresh');
          
       }        
 
}

?>