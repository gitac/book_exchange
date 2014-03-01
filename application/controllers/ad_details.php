<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad_details extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->library('user_agent');
    }

    public function index() {
        $data['option'] = "";
        $data['page'] = "home";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/ad_details_view');
        $this->load->view('includes/footer');
    }
    public function book($bid){
        if ($this->agent->is_referral()) {
            $data['agent'] = $this->agent->referrer();
        } else {
            $data['agent'] = NULL;
        }
        $data['option'] = "";
        $data['page'] = "home";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->database();
        $data['book_info'] = $this->book_model->getBookInfo($bid);
        $this->load->view('contents/ad_details_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
    }

}

?>