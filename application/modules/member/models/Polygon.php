<?php
class Polygon extends CI_Model {

    public function get_poly()
        {
            $this->db->select("marker_polygon.polygon_geometry");
            $this->db->select("marker_polygon.polygon_id");
            $this->db->from("marker_polygon");
            $query = $this->db->get();
            return $query->result();
        }
    
}
