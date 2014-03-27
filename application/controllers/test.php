<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Controller {

    public function index() {
        $this->load->database();
//        $u_id = 7;
//        $status = "pending";
//        $this->getAllPostList($status, $u_id);
        $this->insertAuthorBook(18, 24);
    }

    function insertAuthorBook($bid, $aid) {
        $a_b_insert_data = array(
            'b_id' => $bid,
            'a_id' => $aid
        );

        $this->db->insert('author_book', $a_b_insert_data);
    }

    
function getAllPostList($status, $u_id) {

        $query = $this->db->query("SELECT * 
        FROM post, book_info, author_book, author, customer
        WHERE post_book_id = book_id
        AND post_ad_giver_id = customer_id
        AND book_id = b_id
        AND author_id = a_id
        AND customer_id = " . $u_id . "
        AND post_status =  '" . $status . "'
        ORDER BY date_time, post_id");
        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                echo $data[] = $row;
            }
           // return $data;
        }
        else
            ;
           // return null;
    }
    
    public function page(){
        
        $this->load->library('pagination');
        $this->load->library('table');
        
        $this->table->set_heading('Id','The Title','The Content');
        
        $config['base_url'] = 'http://localhost/book_exchange/index.php/test';
        $config['total_rows'] = 50;//$this->db->get('data')->num_rows();
        $config['per_page'] = 10;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
        
        $this->pagination->initialize($config);
        
        //$data['records'] = $this->db->get('data', $config['per_page'], $this->uri->segment(3));
        
        $this->load->view('site_view', $data);
    
    }

    public function test3() {
     /*   if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        } else {
            echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            echo "Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "Stored in: " . $_FILES["file"]["tmp_name"];
        }
        $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
        $extension = end(explode(".", $_FILES["file"]["name"]));
        $image_name = $_FILES["file"]["name"];
       
        $image_path = "assets/book_image/" . $image_name;
        if( $_FILES["file"]["name"] != ""){
            if (($_FILES["file"]["size"] < 999999999999) && in_array($extension, $allowedExts)) 
                    {
                        move_uploaded_file($_FILES["file"]["tmp_name"], $image_path);
                    } 
        }
       */
        $target_Path = "assets/book_image/";
        $target_Path = $target_Path.basename( $_FILES['file']['name'] );
        move_uploaded_file( $_FILES['file']['tmp_name'], $target_Path );
    }

}

?>
