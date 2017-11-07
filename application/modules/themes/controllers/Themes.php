<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Themes extends MY_Controller {

    function __construct(){
        parent::__construct();
    }

        function public_theme($data)
        {
            return $this->load->view('pages/public_look',$data);
        }


}
