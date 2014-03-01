<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad_code_verify extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
    }

    public function index() { //complete it
        $book_error = NULL;
        $book_name = $_POST['book_name'];
        $book_des = $_POST['book_des'];
        $author_name = $_POST['author_name'];
      //  echo $img_file = $_POST['img_file'];
        echo $selected_category = $_POST['selected_category'];
        if (!isset($book_name) || trim($book_name) == '') {
            $book_error = "Required";
        }
        if (!isset($book_des) || trim($book_des) == '') {
            $book_error = "Required";
        }
        if (!isset($author_name) || trim($author_name) == '') {
            $book_error = "Required";
        }
        if (!isset($selected_category) || $selected_category == 0) {
            $book_error = "Required";
        }
       /* if (!isset($img_file) || trim($img_file) == 0) {
            $book_error = "Required";
        }*/
        $data['option'] = "";
        $data['page'] = "";

        if ($book_error == NULL) {
            redirect('check');
        } else {
            redirect('post_free_ad/check/' . $book_error);
        }
    }

}