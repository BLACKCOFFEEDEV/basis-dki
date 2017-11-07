<?php
class Data_member_mod extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    function insert_data($data){
        $this->db->insert('member_markers',$data);
    }
    function fetch_data(){
        $query = $this->db->get('member_markers');
        return $query;
    }
    
}
