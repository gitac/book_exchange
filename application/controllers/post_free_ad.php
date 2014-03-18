<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_free_ad extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('book_model');
    }

    public function index() {
        $data['book_error'] = NULL;
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
        $this->load->view('contents/post_free_ad_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }

    public function ad_verify() {
        $selected_category = $this->input->post('selected_category');
        $book_name = $this->input->post('book_name');
        $author_name1 = $this->input->post('author_name1');
        $author_name2 = $this->input->post('author_name2');
        $author_name3 = $this->input->post('author_name3');
        $author_name4 = $this->input->post('author_name4');
        $author_name5 = $this->input->post('author_name5');
        $edition = $this->input->post('edition');
        $book_des = $this->input->post('book_des');
        $book_price = $this->input->post('price');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $division = $this->input->post('division');
        $selected_district = $this->input->post('selected_district');
        $selected_neighborhood = $this->input->post('selected_neighborhood');
        $address = $this->input->post('address');
        $occupation = $this->input->post('occupation');
        $institute = $this->input->post('institute');
        $school_name = $this->input->post('school_name');
        $college_name = $this->input->post('college_name');
        $varsity_name = $this->input->post('varsity_name');
        $office_name = $this->input->post('office_name');
        $office_address = $this->input->post('office_address');
        
        

        if ($book_name == NULL || $book_name == ""
                || $author_name1 == NULL || $author_name1 == ""
                || $book_des == NULL || $book_des == ""
                || $name == NULL || $name == ""
                || $email == NULL || $email == ""
                || $phone == NULL || $phone == ""
                || empty($_FILES['img_file']['name'])) {

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
            $this->load->view('contents/post_free_ad_view', $data);

            $this->db->close();
            $this->load->view('includes/footer');
        } else {
            //save image
            if ($_FILES["img_file"]["error"] > 0) {
                echo "Error: " . $_FILES["img_file"]["error"] . "<br />";
            } else {
                echo "Upload: " . $_FILES["img_file"]["name"] . "<br />";
                echo "Type: " . $_FILES["img_file"]["type"] . "<br />";
                echo "Size: " . ($_FILES["img_file"]["size"] / 1024) . " Kb<br />";
                echo "Stored in: " . $_FILES["img_file"]["tmp_name"];
            }
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $extension = end(explode(".", $_FILES["img_file"]["name"]));
            $image_name = $_FILES["img_file"]["name"];
           
            $image_path = "assets/book_images/" . $image_name;
            if( $_FILES["img_file"]["name"] != ""){
                if (($_FILES["img_file"]["size"] < 999999999999) && in_array($extension, $allowedExts))
                        {
                            move_uploaded_img_file($_FILES["img_file"]["tmp_name"], $image_path);
                        }
            }
            
            
            //save to db
           
        
        }
    }

//    public function check($error){ //complete it
//       /* if ($this->agent->is_referral()) {
//            $data['agent'] = $this->agent->referrer();
//        } else {
//            $data['agent'] = NULL;
//        }*/
//        $data['book_error'] = $error;
//        $data['option'] = "";
//        $data['page'] = "";
//        $this->load->database();
//        $data['division'] = $this->category_model->getFullList("division");
//        $data['category'] = $this->category_model->getFullList("category");
//        $data['author'] = $this->category_model->getFullList("author");
//        $data['district'] = $this->category_model->getFullList("district");
//        $data['institute'] = $this->category_model->getFullList("institute");
//        $data['book'] = $this->book_model->getAllBooks();
//        $data['school'] = $this->category_model->getFullList('school');
//        $data['college'] = $this->category_model->getFullList('college');
//        $data['varsity'] = $this->category_model->getFullList('varsity');
//        $this->load->view('includes/header', $data);
//        $this->load->view('includes/ad_portion');
//        $this->load->view('contents/post_free_ad_view', $data);
//
//        $this->db->close();
//        $this->load->view('includes/footer');
//    }
}