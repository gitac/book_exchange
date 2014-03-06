<?php
class Email extends CI_Controller{
    
    
    function index(){
        
      /*  $this->load->library('form_validation');
        
        //field, error message, validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        
        if($this->form_validation->run() == FALSE){
            $this->load->view('newsletter');
        }
        else{
        */    // validation has passeed. now send the email
           // $name = $this->input->post('name');
            //$email = $this->input->post('email');
            $email = "smrity48@gmail.com";
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 456,
                'smtp_user' => 'smrity48@gmail.com',
                'smtp_pass' => '48mum01818733806'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            $this->email->from('smrity48@gmail.com', 'smrity');
            $this->email->to($email);
            $this->email->subject('Test Newsletter Signup Confirmation');
            $this->email->message('You\'ve now signed up, fool!' );

            $path = $this->config->item('server_root');
            //$file = $path.'/CodeIgniter/attachment/newsletter1.txt';

            //$this->email->attach($file);

            if($this->email->send()){
                echo 'Your email was sent, fool.';
                //$this->load->view('signup_confirmation_view');
            }
            else{
                show_error($this->email->print_debugger());
                show_error($this->email->print_debugger());
            }
        }   
   // }
}