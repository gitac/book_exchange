<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Verify_login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('category_model');
        $this->load->model('customer_model');
    }

    function index() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('un', 'Username', 'trim|required|xss_clean|callback_check_username');
        $this->form_validation->set_rules('pw', 'Password', 'trim|required|xss_clean|callback_check_password');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $data['option'] = "";
            $data['page'] = "";
            $this->load->database();
            $data['category'] = $this->category_model->getFullList("category");
            $data['author'] = $this->category_model->getFullList("author");
            $data['district'] = $this->category_model->getFullList("district");
            $data['institute'] = $this->category_model->getFullList("institute");
            $data['book'] = $this->book_model->getAllBooks();
            $this->load->view('includes/header', $data);
            $this->load->view('includes/ad_portion');
            $this->load->view('contents/login_view');
            $this->db->close();
            $this->load->view('includes/footer');
        } else {
            if (isset($_POST['rememberme']))  {
                    $this->session->sess_expire_on_close = FALSE;
                    $this->session->sess_update();
                }
                else{
                    $this->session->sess_expire_on_close = TRUE;
                    $this->session->sess_update();
                }
            $username = $this->input->post('un');
            $password = md5($this->input->post('pw'));
            $this->load->database();
            $result = $this->customer_model->getUserID($username, $password);
            $result['customer_id'];

            $this->db->close();
            $sess_array = array();

            $sess_array = array(
                'id' => $result['customer_id'],
                'username' => $username
            );
            $this->session->set_userdata('logged_in', $sess_array);
            //Go to private area
            redirect('my_profile', 'refresh');
        }
    }

    function check_username($username) {
        //query the database
        $this->load->database();
        $result = $this->customer_model->checkUsername($username);

        if ($result != FALSE) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_username', 'Invalid username');
            return false;
        }
        $this->db->close();
    }

    function check_password($password) {
        $username = $this->input->post('un');
        $password = md5($password);
        //query the database
        $this->load->database();
        $result = $this->customer_model->checkPassword($username, $password);

        if ($result != FALSE) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_password', 'Wrong password');
            return false;
        }
        $this->db->close();
    }

}

?>
