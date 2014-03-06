<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Controller {

    public function index() {
        /*   $this->load->library('user_agent');

          if ($this->agent->is_browser()) {
          $agent = $this->agent->browser() . ' ' . $this->agent->version();
          } elseif ($this->agent->is_robot()) {
          $agent = $this->agent->robot();
          } elseif ($this->agent->is_mobile()) {
          $agent = $this->agent->mobile();
          } else {
          $agent = 'Unidentified User Agent';
          }

          echo $agent;

          echo $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)
          if ($this->agent->is_referral())
          {
          echo $this->agent->referrer();
          }
         * */

        $this->load->view('test');
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
