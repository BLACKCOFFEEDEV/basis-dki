<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Panel extends MY_Controller {

    function __construct(){
        parent::__construct();
        
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('user_login/login_mod');
    }
    
    public function view($page = 'dashboard'){
        $this->load->helper('url');

            if ( ! file_exists(APPPATH.'modules/dashboard/views/content/'.$page.'.php'))
            {
                    // Whoops, we don't have a page for that!
                    echo "<h1>Nyari Apaan lu TONG!!!</h1>";
                    show_404();
                        
            }
                 $data['content_get'] = Modules::run('panel/page_loader',$page); 
                 $this->themes->user_theme($data);
            
        
    } 
    function page_loader($page = NULL){
        $this->load->view('content/'.$page); 
    } 
    
    
}
