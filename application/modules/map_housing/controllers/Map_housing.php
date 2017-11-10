<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Map_housing extends MX_Controller {

    function __construct(){
        parent::__construct();
    }
    function mapshtmloader_pb()
        {
           return $this->load->view('loader/maps_load_pub');
            //$this->load->view('loader/iframe_load');
        }
    function mapshtmloader_dsh()
        {
           return $this->load->view('loader/maps_load_dash');
            //$this->load->view('loader/iframe_load');
        }
    function mapshtmloader_reg()
        {
           return $this->load->view('loader/maps_load_reg');
            //$this->load->view('loader/iframe_load');
        }

}
