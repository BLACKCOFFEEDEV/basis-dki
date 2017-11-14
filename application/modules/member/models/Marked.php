<?php
class Marked extends CI_Model {

    var $table = 'member_assets';
    var $primary_key = 'id';
    var $column_order = array(null, 'name');
    var $column_search = array('aauth_member.pin');
    var $order = array('id' => 'asc');
    var $deleted = array('deleted_at' => DateTime::ATOM);

    // Generator field for search table
    private function _get_field_query()
    {

        $this->db->from($this->table);
        $this->db->join('aauth_accounts', 'aauth_accounts.id=member_assets.user_id',"left");
        $this->db->join('aauth_member', 'aauth_member.account_id=member_assets.user_id and aauth_accounts.id=aauth_member.account_id',"left");
        

        $i = 0;

        foreach ($this->column_search as $item)
        {
            if(!empty($_POST['search']['value']))
            {

                if($i===0)
                {
                    $this->db->group_start();
                    $this->db->like('LOWER(' . $item . ')',strtolower($_POST['search']['value']) );
                }
                else
                {
                    $this->db->or_like('LOWER(' . $item . ')',strtolower($_POST['search']['value']) );
                }

                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
    public function get_list_assets($limit = FALSE, $offset = FALSE){
        $this->_get_field_query();
        if($limit){
            return $this->db->limit($limit, $offset)->get()->result();
        }else{
            return $this->db->get()->result();
        }
    }
    function count_filtered()
    {
        $this->_get_field_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    public function provinsi($where){
        $this->db->select("master_provinsi.*");
        $this->db->from("master_provinsi");
        $this->db->join('master_negara', 'master_negara.id=master_provinsi.negara_id',"left");
        
        
        if(strpos($where, 'DKI Jakarta') !== false) {
            $this->db->like("master_provinsi.name", $where);
            $this->db->like("master_negara.name", "Indonesia");
        }
        
        return $this->db->get()->result();
    }
    public function get_list_legal($limit = FALSE, $offset = FALSE){
        $this->db->from('assets_legality');
        if ($limit) {
            return $this->db->limit($limit, $offset)->get()->result();
        } else {
            return $this->db->get()->result();
        }
    }
    
}
