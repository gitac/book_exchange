<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Show_category extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->library('user_agent');
    }
    public function categories() {
        if ($this->agent->is_referral())
        {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "categories";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->database();
        $data['category'] = $this->category_model->getFullList("category");
        $data['division'] = $this->category_model->getFullList("division");
        $data['author'] = $this->category_model->getFullList("author");
        $this->load->view('contents/show_category_view', $data);
        
        $this->db->close();
        $this->load->view('includes/footer');
    }
    public function authors() {
        if ($this->agent->is_referral())
        {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "authors";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->database();
        $data['category'] = $this->category_model->getFullList("category");
        $data['division'] = $this->category_model->getFullList("division");
        $data['author'] = $this->category_model->getFullList("author");
        $this->load->view('contents/show_category_view', $data);
        
        $this->db->close();
        $this->load->view('includes/footer');
    }
    public function schools() {
        if ($this->agent->is_referral())
        {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "schools";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        
        $this->load->database();
        $data['category'] = $this->category_model->getFullList("category");
        $data['list'] = $this->category_model->getFullList("school");
        $data['author'] = $this->category_model->getFullList("author");
        $data['division'] = $this->category_model->getFullList("division");
        $this->load->view('contents/show_category_view', $data);
        
        $this->db->close();
        
        $this->load->view('includes/footer');
        
    }
    public function colleges() {
        if ($this->agent->is_referral())
        {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "colleges";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        
        $this->load->database();
        $data['category'] = $this->category_model->getFullList("category");
        $data['list'] = $this->category_model->getFullList("college");
        $data['author'] = $this->category_model->getFullList("author");
        $data['division'] = $this->category_model->getFullList("division");
        
        $this->load->view('contents/show_category_view', $data);
        
        $this->db->close();
        
        $this->load->view('includes/footer');
    }   
    public function varsities() {
        if ($this->agent->is_referral())
        {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "varsities";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        
        $this->load->database();
        $data['category'] = $this->category_model->getFullList("category");
        $data['list'] = $this->category_model->getFullList("varsity");
        $data['author'] = $this->category_model->getFullList("author");
        $data['division'] = $this->category_model->getFullList("division");
        
        $this->load->view('contents/show_category_view', $data);
        
        $this->db->close();
        
        $this->load->view('includes/footer');
    }
}