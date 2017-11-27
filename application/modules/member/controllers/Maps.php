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
        
        $this->template->title = 'Search Engine Maps';
        
        $this->load->model('Marked', 'model');
        
        $list_profince = $this->model->provinsi("DKI Jakarta");
        $list_exist = $this->model->get_list_exist_type();
        
        $data = array(
            "list_province" => $list_profince,
            "list_exist" => $list_exist,
        );
        
        $this->template->content->view('maps/index', $data);
        $this->template->publish();
        
    }
    
    function get_maps(){
        
        $this->load->model('Marked', 'model');
        $this->load->model('Polygon', 'polygon');
          
        $this->load->model('Marked', 'model');
        $data_s = array(
            'assets_existtype' => $this->input->post('typeExist'),
            'kelurahan' => $this->input->post('district'),
            'assets_luas' => $this->input->post('assetsLuas'),
            'assets_harga' => $this->input->post('assetsHarga'),
        );
        
        $result = array('data' => $this->polygon->get_poly($data_s),);
        //$data = array();
        echo json_encode($result);
    }
}