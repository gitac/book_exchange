<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create_profile extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
    }
    public function index() {
        $this->load->database();
        $data['division'] = $this->category_model->getFullList("division");
        $data['district'] = $this->category_model->getFullList("district");
        $data['near_area'] = $this->category_model->getFullList("near_area");
        $data['school'] = $this->category_model->getFullList('school');
        $data['college'] = $this->category_model->getFullList('college');
        $data['varsity'] = $this->category_model->getFullList('varsity');
        $data['create_pro_error'] = NULL;
        $this->load->view('includes/header_create_profile');
        $this->load->view('contents/create_profile_view', $data);
        $this->db->close();
    }
}