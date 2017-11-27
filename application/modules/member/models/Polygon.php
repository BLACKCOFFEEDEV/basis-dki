<?php
class Polygon extends CI_Model {

    public function get_poly($data){
        $this->db->select('*');
        $this->db->from('member_assets');
            
        if($data['assets_existtype'] !="")
        $this->db->like('member_assets.assets_existtype',$sdata['assets_harga'],'both');
        if($data['kelurahan'] !="")
        $this->db->like('member_assets.kelurahan',$data['assets_harga'],'both');
        if($data['assets_luas'] !="")
        $this->db->like('member_assets.assets_luas', $data['assets_harga'], 'both');
        if($data['assets_harga'] !="")
        $this->db->like('member_assets.assets_harga', $data['assets_harga'], 'both');

        $query=$this->db->get()->result_array(); 
        return $query;
    }
}
