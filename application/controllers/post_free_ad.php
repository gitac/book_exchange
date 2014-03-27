<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_free_ad extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('book_model');
        $this->load->model('customer_model');
    }

    public function index() {
        $book_error = NULL;
        if ($this->session->userdata('logged_in')) {
            $this->redirect_post_free_ad($book_error);
        } else {
            redirect('login', 'refresh');
        }
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

        if ($book_name == NULL || $book_name == ""
                || $author_name1 == NULL || $author_name1 == ""
                || $book_des == NULL || $book_des == ""
                || empty($_FILES['img_file']['name'])
                || $_FILES["img_file"]["error"] > 0) {

            $book_error = "Please fill all the required input fileds.";
            $this->redirect_post_free_ad($book_error);
        } else {
            //save image
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
            
            $this->book_model->insertPost($book_name, $selected_category, $author_name1, $author_name2, 
                    $author_name3, $author_name4, $author_name5, $edition, 
                        $book_des, $book_price, $image_path, $id);
                redirect('pending_ads', 'refresh');
        }
    }

    function redirect_post_free_ad($error) {
        $this->load->database();
        $session_data = $this->session->userdata('logged_in');
        $u_id = $data['id'] = $session_data['id'];
        $data['username'] = $session_data['username'];
        $data['option'] = "my_profile";
        $data['page'] = "";
        $data['pro_pic'] = $this->customer_model->getProPic($u_id);

        $data['book_error'] = $error;
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

}