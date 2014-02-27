<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Show_category extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
    }
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
        $this->load->database();
        $d['list'] = $this->category_model->getFullList("school");
        $c = 0;
foreach ($d['list'] as $l){
    $ids[] = $l['INSTITUTE_NAME'];
}
for($i = 0; $i < $c; $i++){
    $id = $ids[$i];
    echo $id;
}
        $this->db->close();
       /* foreach($d as $l){
            echo $l->INSTITUTE_NAME;
        }*/
   //  $this->load->view('test', $d);
       /* $data['option'] = "";
        $data['page'] = "home";
        $data['type'] = "schools";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/show_category_view', $data);
        $this->load->view('includes/footer');*/
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