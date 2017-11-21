<?php
class Legal extends CI_Model {
    
    var $table = 'assets_legal';
    
    public function showAllDoc($object) {
        $this->db->select("assets_legal.*");
        $this->db->select("assets_legality.name");
        $this->db->from('aauth_accounts');
        $this->db->join('assets_legal', 'aauth_accounts.id = assets_legal.account_id',"left");
        $this->db->join('assets_legality', 'assets_legality.id = assets_legal.legality_id',"left");
        $this->db->where('aauth_accounts.user_id=',$object);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();        
        }else{
            return false;
        }
    }
    public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}
    public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
    
    public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
    
}
