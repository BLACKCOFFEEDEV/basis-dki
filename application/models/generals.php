<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Group Model
 *
 * @author		Syahril Hermana (syahril.hermana@gmail.com)
 */

class Generals extends CI_Model
{
    var $table = 'aauth_navigations';
    var $primary_key = 'id';
    var $column_order = array(null, 'orders', 'label');
    var $column_search = array('label');
    var $order = array('orders' => 'asc');
    var $deleted = array('deleted_at' => DateTime::ATOM);

    /**
     * Generator field for search table
     */
    private function _get_field_query()
    {

        $this->db->from($this->table);
        $this->db->join("aauth_navigation_to_group", "navigation_id = id", "left");

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

    private function _get_permission_query($session)
    {
        $this->db->select("aauth_user_to_group.group_id");
        $this->db->from("aauth_user_to_group");
        $object = $this->db->where("user_id", $session->id)->get()->result();
        $array = array();
        foreach ($object as $row) {
            $array[] = $row->group_id;
        }

        return $array;
    }

    private function _get_groups_query()
    {
        $session = $this->aauth->get_user();
        $permission = $this->_get_permission_query($session);

        $this->db->from($this->table);
        if(count($permission) > 0)
            $this->db->where_in("id", $permission);
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
     * Soft Delete a data (just flag it)
     *
     * @param string where
     * @param int value
     * @param string identification field
     */
    public function soft_delete($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = 'id';
        }

        $this->db->where($where, $value)->update($this->table, $this->deleted);
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

    /**
     * Get a list of data with pagination options
     *
     * @param int limit
     * @param int offset
     * @return array object
     */
    public function get_list_no_paging($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = $this->primary_key;
        }

        $object = $this->db->where($where, $value)->get($this->table)->result();
        return $object;
    }

    /**
     * Get a list of data with pagination options
     *
     * @param int limit
     * @param int offset
     * @return array object
     */
    public function get_list_parent($limit = FALSE, $offset = FALSE) {
        $this->_get_field_query();
//        $this->_get_groups_query();

        if ($limit) {
            return $this->db->where("parent is null")->limit($limit, $offset)->get()->result();
        } else {
            return $this->db->where("parent is null")->get()->result();
        }
    }

    /**
     * Get a list of data without pagination options
     *
     * @param int limit
     * @param int offset
     * @return array object
     */
    public function get_list_childs($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = $this->primary_key;
        }

        $object = $this->db->where($where, $value)->get($this->table)->result();
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

    public function count_all_parent()
    {
        $this->db->from($this->table);
        $this->db->where("parent is null");
        return $this->db->count_all_results();
    }

    public function is_parent($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = $this->primary_key;
        }

        return $this->db->where($where, $value)->count_all_results($this->table);
    }

    public function is_member($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = "account_id";
        }

        return $this->db->where($where, $value)->count_all_results("aauth_member");
    }

    public function is_employee($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = "account_id";
        }

        return $this->db->where($where, $value)->count_all_results("aauth_employee");
    }

    /**
     * Retrieve a data
     *
     * @param string where
     * @param int value
     * @param string identification field
     */
    public function get_account($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = "id";
        }

        $object = $this->db->where($where, $value)->get("aauth_accounts")->row();
        return $object;
    }

    public function get_member($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = "account_id";
        }

        $object = $this->db->where($where, $value)->get("aauth_member")->row();
        return $object;
    }

    public function get_employee($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = "account_id";
        }

        $object = $this->db->where($where, $value)->get("aauth_employee")->row();
        return $object;
    }

    public function get_custom_name($table, $field, $where, $value) {
        $this->db->select($field);
        $this->db->from($table);
        $object = $this->db->where($where, $value)->get()->row();
        return $object;
    }
}