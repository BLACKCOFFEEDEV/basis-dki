<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Guest extends MY_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    function view($page='index'){
        

            if ( ! file_exists(APPPATH.'modules/public/views/guest/'.$page.'.php'))
            {
                    // Nyari Apaan lu TONG!!!
                    show_404();

            }
        
            
                //$this->load->module('themes');
                $data['content_get'] = Modules::run('guest/loader',$page);
                $this->themes->public_theme($data);
            
    } 
    function loader($page = NULL){
        $this->load->view('guest/'.$page);
    } 
}
