<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navigation extends Widget {

    public function display($data) {
        $CI =& get_instance();
        $CI->load->model("Generals", "widget");

        if (!isset($data['items'])) {
            $data['items'] = $CI->widget->get_list_parent();
        }

        $this->view('widgets/navigation', $data);
    }
    
}