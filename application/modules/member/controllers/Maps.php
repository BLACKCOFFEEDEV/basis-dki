<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Groups Controller
 * Created by Syahril Hermana
 */

class Maps extends MY_Controller
{
    function __construct(){
        parent::__construct();

        if (!$this->aauth->is_loggedin())
            redirect('auth/sign-in');
    }
    
    public function index()
    {
        $this->load->model('polygon');
        
        $this->template->title = 'Search Engine Maps';

        
        
        //$data = array();
        $data['geometry'] = $this->polygon->get_poly();
        
        $this->template->content->view('maps/index', $data);
        //print_r($data);
        //die();
        $this->template->publish();
        
    }
}