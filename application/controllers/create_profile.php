<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create_profile extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->load->view('includes/header_create_profile');
        $this->load->view('contents/create_profile_view');
        $this->db->close();
    }
}