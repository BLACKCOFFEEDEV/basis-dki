<?php
class Legal extends CI_Model {
    
    var $table = 'assets_legal';
    var $and_add = 'assets_legal.assets_id = 0';
    var $add_key = 'assets_legal.account_id';
    var $foreign_key = 'member_assets.assets_id';
    
    public function showAllDoc($where, $value = FALSE) {
        $this->db->from('assets_legality');
        $this->db->join('assets_legal', 'assets_legality.id = assets_legal.legality_id',"left");
        $this->db->join('aauth_accounts', 'assets_legal.account_id = aauth_accounts.id',"left");
        if (!$value) {
            $this->db->where($this->and_add);
            $value = $where;
            $where = $this->add_key;
        }
        $this->db->where($where, $value);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function showUpdateDoc($where, $value = FALSE) {
        $this->db->from('member_assets');
        $this->db->join('assets_legal', 'member_assets.assets_id = assets_legal.assets_id',"left");
        $this->db->join('assets_legality', 'assets_legal.legality_id = assets_legality.id',"left");
        if (!$value) {
            $value = $where;
            $where = $this->foreign_key;
        }
        $this->db->where($where, $value);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_by_id($id)
	{
		$this->db->from($this->table);
        $this->db->where('legal_id',$id);
		$query = $this->db->get();

		return $query->row();
	}
    public function save($table, $data)
	{
        $this->db->insert($table, $data);
		return $this->db->insert_id();
	}
    
    public function delete_by_id($id)
	{
        $this->db->from($this->table);
        $this->db->where('legal_id', $id);
        $this->db->delete($this->table);
	}
    
    public function document_update($table, $id) {
    $this->db->where('assets_id = ', 0);
    $this->db->update($table, $id);
    }
    
}
