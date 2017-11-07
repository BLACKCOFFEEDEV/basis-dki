<?php

class MY_Controller extends MX_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->module('Themes');
        $this->load->module('Map_housing');
        //$this->load->module('Data_member');
        
    }
    
}
