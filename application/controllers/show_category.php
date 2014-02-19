<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Show_category extends CI_Controller {

 /*   function __construct() {
        parent::__construct();
        $this->load->library('pagination'); // eita controller er constructor e o load korte //paros 
    }
*/
    public function index() {
        $data['option'] = "my_profile";
        $data['page'] = "home";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/show_category_view');
        $this->load->view('includes/footer');
    }

   /* public function sample_page() {
        
        $config['base_url'] = '' . base_url() . 'index.php/show_category/sample_page';
        $config['total_rows'] = $this->db->get('table_name')->num_rows();
        $config['per_page'] = 8;
        $config['num_links'] = 40;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $query = $this->db->get('cr_client', $config['per_page'], $this->uri->segment(3));
        $data['client_list'] = $query->result();
        $this->load->view('show_category_view', $data);
    }*/

}