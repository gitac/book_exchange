<?php
class Site extends CI_Controller{
   /*
     function index(){
        $data = array();
        
        if($query = $this->site_model->get_records()){
            $data['records'] = $query;
        }
        
        $this->load->view('option_view', $data);
    }
   
    function create(){
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content')
        );
        
        $this->site_model->add_record($data);
        $this->index();
    }
    
    function update(){
        $data = array(
            'title' => 'My freshly updated title',
            'content' => 'Content shoul go here; it is updated.'
        );
        
        $this->site_model->update_record($data);
    }
    
    function  delete(){
        $this->site_model->delete_row();
        $this->index();
    }


    function about(){
        $this->load->view('about');           
    }
    
/*  //Day 6
    function __construct() {
        parent::__construct();
        $this->is_logged_in();
    }
    
    function members_area(){
        $this->load->view('members_area');
    }
    
    function another_page() // just for sample
    {
            echo 'good. you\'re logged in.';
    }
        
    function is_logged_in(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true){
            echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';
            die();
            //$this->load->view('login_form');
        }
    }*/
    
   //Day 7:
       function index(){
        $this->load->library('pagination');
        $this->load->library('table');
        
        $this->table->set_heading('Id','The Title','The Content');
        $this->load->database();
        $config['base_url'] = 'http://localhost/book_exchange/index.php/site';
        $config['total_rows'] = $this->db->get('institute')->num_rows();
        $config['per_page'] = 10;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
        
        $this->pagination->initialize($config);
        
        $data['records'] = $this->db->get('institute', $config['per_page'], $this->uri->segment(3));
        
        $this->load->view('site_view', $data);
    } 
    
   
    
        public function show_ins()
    {
$this->load->library('pagination');
 $this->load->helper('url');
        $data=array();


            $config['base_url']=''.base_url().'index.php/site/show_ins';

  
$this->load->database();
$this->load->library('table');
        
        $this->table->set_heading('Id','The Title','The Content');
            $config['total_rows']=  $this->db->get('institute')->num_rows();
            $config['per_page']=8;
            $config['suffix'] = '/'.http_build_query($_POST, '', "");
            $config['num_links']=20;
            $config['full_tag_open']='<div id="pagination">';
            $config['full_tag_close']='</div>';

            $this->pagination->initialize($config);

         

            $query= $this->db->get('institute',$config['per_page'],$this->uri->segment(3));
 
            $data['records']=$query;
        $this->load->view('site_view_new', $data);
    }

    
    
        public function show_clients() {


        $data = array();


        $config['base_url'] = '' . base_url() . 'index.php/client_list_admin/show_clients';


        $config['total_rows'] = $this->db->get('cr_client')->num_rows();
        $config['per_page'] = 1;
        $config['num_links'] = 40;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';

        $this->pagination->initialize($config);


        $query = $this->db->get('cr_client', $config['per_page'], $this->uri->segment(3));
        $data['client_list'] = $query->result();
        $data['num'] = $config['total_rows'];
        $data['type']=  $this->session->userdata('type');


        $this->load->view('client_list_view_admin', $data);
    }

    
}
