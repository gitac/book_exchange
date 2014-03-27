<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_free_ad extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('book_model');
        $this->load->model('customer_model');
    }

    public function index() {
        $data['book_error'] = NULL;
        $data['option'] = "";
        
        if ($this->session->userdata('logged_in')) {
            $this->load->database();
            $session_data = $this->session->userdata('logged_in');
            $u_id = $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $data['option'] = "my_profile";        
            $data['page'] = "";
            $data['pro_pic'] = $this->customer_model->getProPic($u_id);

        
        $data['division'] = $this->category_model->getFullList("division");
        $data['category'] = $this->category_model->getFullList("category");
        $data['author'] = $this->category_model->getFullList("author");
        $data['district'] = $this->category_model->getFullList("district");
        $data['near_area'] = $this->category_model->getFullList("near_area");
        $data['institute'] = $this->category_model->getFullList("institute");
        $data['book'] = $this->book_model->getAllBooks();
        $data['school'] = $this->category_model->getFullList('school');
        $data['college'] = $this->category_model->getFullList('college');
        $data['varsity'] = $this->category_model->getFullList('varsity');
        $this->load->view('includes/header', $data);
        $this->load->view('includes/ad_portion');
        $this->load->view('contents/post_free_ad_view', $data);

        $this->db->close();
        $this->load->view('includes/footer');
        } else {
            redirect('login', 'refresh');
        }
        
    }

    public function ad_verify() {
        $selected_category = $this->input->post('selected_category');
        $book_name = $this->input->post('book_name');
        $author_name1 = $this->input->post('author_name1');
        $author_name2 = $this->input->post('author_name2');
        $author_name3 = $this->input->post('author_name3');
        $author_name4 = $this->input->post('author_name4');
        $author_name5 = $this->input->post('author_name5');
        $edition = $this->input->post('edition');
        $book_des = $this->input->post('book_des');
        $book_price = $this->input->post('price');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $division = $this->input->post('division');
        $selected_district = $this->input->post('selected_district');
        $selected_neighborhood = $this->input->post('selected_neighborhood');
        $address = $this->input->post('address');
        $occupation = $this->input->post('occupation');
        $institute = $this->input->post('institute');
        $school_name = $this->input->post('school_name');
        $college_name = $this->input->post('college_name');
        $varsity_name = $this->input->post('varsity_name');
        $office_name = $this->input->post('office_name');
        $office_address = $this->input->post('office_address');



        //check phn no
        
        if ($book_name == NULL || $book_name == ""
                || $author_name1 == NULL || $author_name1 == ""
                || $book_des == NULL || $book_des == ""
                || $name == NULL || $name == ""
                || $email == NULL || $email == ""
                || $phone == NULL || $phone == ""
                || empty($_FILES['img_file']['name'])
                || $_FILES["img_file"]["error"] > 0) {

            $data['book_error'] = "Please fill all the required input fileds.";
            $data['option'] = "";
            if ($this->session->userdata('logged_in')) {
                $session_data = $this->session->userdata('logged_in');
                $data['id'] = $session_data['id'];
                $data['username'] = $session_data['username'];
                $data['option'] = "my_profile";
            } else {
                $data['option'] = "";
            }
            $data['page'] = "";

            $this->load->database();
            $data['division'] = $this->category_model->getFullList("division");
            $data['category'] = $this->category_model->getFullList("category");
            $data['author'] = $this->category_model->getFullList("author");
            $data['district'] = $this->category_model->getFullList("district");
            $data['near_area'] = $this->category_model->getFullList("near_area");
            $data['institute'] = $this->category_model->getFullList("institute");
            $data['book'] = $this->book_model->getAllBooks();
            $data['school'] = $this->category_model->getFullList('school');
            $data['college'] = $this->category_model->getFullList('college');
            $data['varsity'] = $this->category_model->getFullList('varsity');
            $this->load->view('includes/header', $data);
            $this->load->view('includes/ad_portion');
            $this->load->view('contents/post_free_ad_view', $data);

            $this->db->close();
            $this->load->view('includes/footer');
        } else {
//            save image
//            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
//            $extension = end(explode(".", $_FILES["img_file"]["name"]));
//            $image_name = time().".".$extension;
//            $image_path = "assets/book_images/" . $image_name;
//            if( $_FILES["img_file"]["name"] != ""){
//                if (($_FILES["img_file"]["size"] < 999999999999) && in_array($extension, $allowedExts))
//                        {
//                            move_uploaded_file($_FILES["img_file"]["tmp_name"], $image_path);
//                        }
//            }
            //send code to mbl
            $code = rand(0, 9999);
            $txt = "Dear " . $name . ", Your code is " . $code . ". Please submit it. Thanks";
            $sendResult = $this->SendSMSFuntion($phone, $txt);
            $sendStatus = substr($sendResult, 0, 2);
            echo $sendStatus;
            echo $txt;
        }
    }

    function SendSMSFuntion($to, $txt) {
        //--------------------------
        $message_get = $txt;
        $mobile = $to;
//$message_get = "Hello Jesy.......$mobile";
        $message_url = urlencode($message_get);
        $message_final = substr($message_url, 0, 159);

//fixed parameter
        $host = "manage.muthofun.com";
//$port = "8080";
        $username = "iftekhar@comfosys.com";
        $password = "ifteeCFS2014";
        $sender = "BookExchange";
        $msgtype = "0";
        $dlr = "1";

//http://manage.muthofun.com//bulksms/bulksend.go?username=iftekhar@comfosys.com&password=ifteeCFS2014&originator=comfosys&phone=8801727208714&msgtext=test+message
//$live_url = "http://$host:$port/bulksms/bulksms?username=$username&password=$password&type=$msgtype&dlr=$dlr&destination=$mobile&source=$sender&message=$message_final";
//$directURl = "http://121.241.242.114:8080/bulksms/bulksms?username=mfn-demo&password=demo321&type=0&dlr=0&destination=8801823146626&source=TSMTS&message=This+is+test";
        $ch = curl_init("http://$host/bulksms/bulksend.go?");
        //echo "CH= ".$ch. "<br/>";
        curl_setopt($ch, CURLOPT_POST, True);
        //curl_setopt($ch, CURLOPT_POSTFIELDS,"username=$username&password=$password&type=0&dlr=1&destination=$mobile&source=$sender&message=$message_final");
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$username&password=$password&originator=$sender&phone=$mobile&msgtext=$message_final");
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $contents = curl_exec($ch);

        //var_dump(curl_getinfo($ch));

        curl_close($ch);
        return $contents;
        //---------------------------
    }

}