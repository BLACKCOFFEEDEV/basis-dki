<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapstrans extends Widget {

    public function display($data) {
        $CI =& get_instance();
        $data = array();
        $this->view('widgets/maps_trans', $data);
    }

}