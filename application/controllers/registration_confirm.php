<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registration_confirm extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
    }

    public function index() { //complete it
    /*  $user_error = NULL;
        $user_name = $_POST['un'];
        $email = $_POST['email'];
        $password = $_POST['pw'];
        $c_password = $_POST['cpw'];
        if (!isset($user_name) || trim($user_name) == '') {
            $user_error = "Required";
        }
        if (!isset($email) || trim($email) == '') {
            $user_error = "Required";
        }
        if (!isset($password) || trim($password) == '') {
            $user_error = "Required";
        }
        if (!isset($cpassword) || trim($cpassword) == '') {
            $user_error = "Required";
        }*/
        echo $password = md5($_POST['pw']);
    }

}