<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapsreg extends Widget {

    public function display($data) {
        $CI =& get_instance();
        $data = array();
        $this->view('widgets/maps_reg', $data);
    }

}