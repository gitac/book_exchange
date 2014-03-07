<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_books extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('book_model');
        $this->load->library('user_agent');
    }

    public function index() {
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $this->load->database();
        $data['division'] = $this->category_model->getFullList("division");
        
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/category_books_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }
    public function category($cid){
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['criteria'] = "category";
        $this->load->database();
        $data['division'] = $this->category_model->getFullList("division");
        
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $data['c_name'] = $this->category_model->getCategoryName($cid);
        $data['category_book'] = $this->book_model->getAllBookList($cid);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/category_books_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }
    public function author($aid){
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['criteria'] = "author";
        
        $this->load->database();
        $data['division'] = $this->category_model->getFullList("division");
        
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $data['c_name'] = $this->category_model->getAuthorName($aid);
        $data['author_book'] = $this->book_model->getAllBookAuthorList($data['c_name']);
       // $data['author_book'] = $this->book_model->getAuthorAllBookList($aid);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/category_books_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }
    public function bookname($id){
        
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['criteria'] = "book_name";
        $this->load->database();
        $data['division'] = $this->category_model->getFullList("division");
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $data['c_name'] = $this->book_model->getBookName($id);
        $data['books_name'] = $this->book_model->getAllBookNameList($data['c_name']);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/category_books_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }

    public function authorname($id){
        
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['criteria'] = "author_name";
        $this->load->database();
        $data['division'] = $this->category_model->getFullList("division");
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $data['c_name'] = $this->category_model->getAuthorName($id);
        $data['books_name'] = $this->book_model->getAllBookAuthorList($data['c_name']);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/category_books_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }
    
    public function district($did){//complete it
       /* if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['criteria'] = "district";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->database();
        $data['category'] = $this->category_model->getFullList("category");
        $data['division'] = $this->category_model->getFullList("division");
        $data['author'] = $this->category_model->getFullList("author");
        $data['c_name'] = $this->category_model->getDistrictName($aid);
        $data['district_book'] = $this->book_model->getDistrictAllBookList($aid);
        $this->load->view('contents/category_books_view', $data);

        $this->db->close();
        $this->load->view('includes/footer'); */
    }  
    }