<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Show_category extends CI_Controller {
    public function categories() {
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "categories";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/show_category_view');
        $this->load->view('includes/footer');
    }
    public function schools() {
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "schools";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/show_category_view', $data);
        $this->load->view('includes/footer');
    }
    public function colleges() {
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "colleges";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/show_category_view', $data);
        $this->load->view('includes/footer');
    }   
    public function varsities() {
        $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "varsities";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/show_category_view', $data);
        $this->load->view('includes/footer');
    }
}