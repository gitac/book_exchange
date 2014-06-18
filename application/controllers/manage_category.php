<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage_category extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
    }

    public function index() {
        $data['option'] = "";
        $data['page'] = "";
        $data['manage'] = NULL;
        $data['category'] = $this->category_model->getFullList("category");

        $this->load->view('includes/header_admin', $data);

        $this->load->view('contents/manage_category_view', $data);
    }

    function add_del() {
        if ($this->input->post('sbm') == "add") {
            $c_name = $this->input->post('Category_name');
            $data = array('category_name' => $this->input->post('Category_name'));
            $c_id = $this->category_model->getcategoryId($this->input->post('Category_name'));
            if ($c_id == NULL) {
                $res = $this->category_model->addCategoryName($data);
                if ($res != NULL) {
                    
                    $data['manage'] = "New category " . $c_name . " is added.";
                }
            } else {
                $data['manage'] = $c_name . " category has already been added.";
            }
        } else if ($this->input->post('sbm') == "delete") {
           $select_name = $this->input->post('selected_category');
           $c_id = $this->category_model->getcategoryIdWithBook($this->input->post('selected_category'));
           $c_name = $this->category_model->getCategoryName($select_name); 
           if ($c_id != NULL) {
                
                    $data['manage'] = "Sorry,the category cannot be deleted" ." ". $c_name . ".";
                
            } else {//delete
                $selected_category = $this->input->post('selected_category');

                $this->category_model->deleteCategoryName($selected_category);
                $data['manage'] = $c_name . " category is deleted.";
            }
        }

        $data['category'] = $this->category_model->getFullList("category");

        $this->load->view('includes/header_admin', $data);

        $this->load->view('contents/manage_category_view', $data);
    }

    public function deleteCategory() {

        $selected_category = $this->input->post('selected_category');

        $q = $this->category_model->deleteCategoryName($selected_category);
    }

}

?>
