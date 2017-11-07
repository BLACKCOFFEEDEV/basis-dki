<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Group Model
 *
 * @author		Syahril Hermana (syahril.hermana@gmail.com)
 */

class Members extends CI_Model
{
    var $table = 'aauth_accounts';
    var $primary_key = 'id';
    var $column_order = array(null, 'first_name');
    var $column_search = array('first_name', 'last_name', 'phone');
    var $order = array('id' => 'asc');
    var $deleted = array('deleted_at' => DateTime::ATOM);

    /**
     * Generator field for search table
     */
    private function _get_field_query()
    {

        $this->db->from($this->table);

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

    private function _get_field_member_query()
    {
        $this->db->from($this->table);
        $this->db->join("aauth_member", "aauth_member.account_id = aauth_accounts.id", "right");

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

    private function _get_field_employee_query()
    {
        $this->db->from($this->table);
        $this->db->join("aauth_employee", "aauth_employee.account_id = aauth_accounts.id", "right");

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

    /**
     * Save or Update data
     *
     * @param array object
     * @return int id
     */
    public function save($object, $id = FALSE) {
        if(!$id)
        {
            $this->db->insert($this->table, $object);
            return $this->db->insert_id();
        } else {
            $this->db->where($this->primary_key, $id)->update($this->table, $object);
            return $id;
        }
    }

    /**
     * Delete permanent data
     *
     * @param string where
     * @param int value
     * @param string identification field
     */
    public function delete($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = $this->primary_key;
        }

        $this->db->where($where, $value)->delete($this->table);
    }

    /**
     * Retrieve a data
     *
     * @param string where
     * @param int value
     * @param string identification field
     */
    public function get($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = $this->primary_key;
        }

        $object = $this->db->where($where, $value)->get($this->table)->row();
        return $object;
    }

    public function get_member($where, $value = FALSE) {
        $this->db->from($this->table);
        $this->db->join("aauth_member", "aauth_member.account_id = aauth_accounts.id", "right");

        if (!$value) {
            $value = $where;
            $where = $this->primary_key;
        }

        $object = $this->db->where($where, $value)->get()->row();
        return $object;
    }

    /**
     * Get a list of data with pagination options
     *
     * @param int limit
     * @param int offset
     * @return array object
     */
    public function get_list($limit = FALSE, $offset = FALSE) {
        $this->_get_field_query();

        if ($limit) {
            return $this->db->limit($limit, $offset)->get()->result();
        } else {
            return $this->db->get()->result();
        }
    }

    public function get_list_member($limit = FALSE, $offset = FALSE) {
        $this->_get_field_member_query();

        if ($limit) {
            return $this->db->limit($limit, $offset)->get()->result();
        } else {
            return $this->db->get()->result();
        }
    }

    public function get_list_employee($limit = FALSE, $offset = FALSE) {
        $this->_get_field_employee_query();

        if ($limit) {
            return $this->db->limit($limit, $offset)->get()->result();
        } else {
            return $this->db->get()->result();
        }
    }

    /**
     * Check if a data exists
     *
     * @param string where
     * @param int value
     * @param string identification field
     */

    public function exists($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = $this->primary_key;
        }

        return $this->db->where($where, $value)->count_all_results($this->table);
    }

    /**
     * Check if a data used in another table
     *
     * @param string where
     * @param int value
     * @param string identification field
     */

    public function used($where, $value = FALSE, $reference = FALSE) {
        if (!$value) {
            $value = $where;
            $where = $this->primary_key;
        }

        if (!$reference) {
            $this->table = $reference;
        }

        return $this->db->where($where, $value)->count_all_results($this->table);
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

    function count_member_filtered()
    {
        $this->_get_field_member_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_member_all()
    {
        $this->db->from($this->table);
        $this->db->join("aauth_member", "aauth_member.account_id = aauth_accounts.id", "right");
        return $this->db->count_all_results();
    }

    function count_employee_filtered()
    {
        $this->_get_field_employee_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_employee_all()
    {
        $this->db->from($this->table);
        $this->db->join("aauth_employee", "aauth_employee.account_id = aauth_accounts.id", "right");
        return $this->db->count_all_results();
    }

    public function get_list_country($limit = FALSE, $offset = FALSE) {
        if ($limit) {
            return $this->db->limit($limit, $offset)->get("master_negara")->result();
        } else {
            return $this->db->get("master_negara")->result();
        }
    }

    public function get_list_province($key) {
        $this->db->where("negara_id", $key);
        return $this->db->get("master_provinsi")->result();
    }

    public function get_list_city($key) {
        $this->db->where("provinsi_id", $key);
        return $this->db->get("master_kota")->result();
    }

    public function get_list_state($key) {
        $this->db->where("kota_id", $key);
        return $this->db->get("master_kecamatan")->result();
    }

    public function get_list_district($key) {
        $this->db->where("kecamatan_id", $key);
        return $this->db->get("master_kelurahan")->result();
    }

    public function save_account($object) {
        $this->db->insert("aauth_accounts", $object);
        return $this->db->insert_id();
    }

    public function save_member($object) {
        $this->db->insert("aauth_member", $object);
        return $this->db->insert_id();
    }
}