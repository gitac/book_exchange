	

    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
     
    class Test extends CI_Controller {
            public function index()
            {
                    $this->load->view('test');
            }
           
            public function facebook()
            {
                echo 'fb';
                   // $this->load->view('facebook');
            }
           
            public function google()
            {
                echo 'google';
                    //$this->load->view('google');
            }
    }
     
    /* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */

