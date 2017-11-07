<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Group Model
 *
 * @author		Syahril Hermana (syahril.hermana@gmail.com)
 */

class Permission extends CI_Model
{
    var $table = 'aauth_navigation_to_group';
    var $primary_key = '';
    var $column_order = array(null, 'name');
    var $column_search = array('name', 'label');
    var $order = array('aauth_groups.id' => 'asc');
    var $deleted = array('deleted_at' => DateTime::ATOM);

    var $group_id = 'group_id';
    var $navigation_id = 'navigation_id';

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

    private function _get_field_group_query()
    {

        $this->db->distinct("aauth_groups.id");
        $this->db->select("aauth_groups.*");
        $this->db->from("aauth_groups");
        $this->db->join("aauth_navigation_to_group", "group_id = aauth_groups.id", "left");
        $this->db->join("aauth_navigations", "aauth_navigations.id = navigation_id", "left");

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
    public function save($object) {
        $this->db->insert($this->table, $object);
        return true;
    }

    /**
     * Delete permanent data
     *
     * @param string where
     * @param int value
     * @param string identification field
     */
    public function delete($group, $navigation) {
        $this->db->where($this->group_id, $group)->where($this->navigation_id, $navigation)->delete($this->table);
    }

    /**
     * Retrieve a data
     *
     * @param string where
     * @param int value
     * @param string identification field
     */
    public function get($group, $navigation) {
        $object = $this->db->where($this->group_id, $group)->where($this->navigation_id, $navigation)->get($this->table)->row();
        return $object;
    }

    /**
     * Get a list of data with pagination options
     *
     * @param int limit
     * @param int offset
     * @return array object
     */
    public function get_list_groups($limit = FALSE, $offset = FALSE) {
        $this->_get_field_group_query();
        if ($limit) {
            return $this->db->limit($limit, $offset)->get()->result();
        } else {
            return $this->db->get()->result();
        }
    }

    public function get_list_navigation($group) {
        $this->db->from("aauth_navigation_to_group");
        $this->db->where("group_id", $group);
        $mapping = $this->db->get()->result();

        $key = array();
        $key[] = 0;
        foreach ($mapping as $value) {
            $key[] = $value->navigation_id;
        }

        $this->db->from("aauth_navigations");
        $this->db->where_in("id", $key);
        return $this->db->get()->result();
    }

    /**
     * Check if a data exists
     *
     * @param string where
     * @param int value
     * @param string identification field
     */

    public function exists($group, $navigation) {
        return $this->db->where($this->group_id, $group)->where($this->navigation_id, $navigation)->count_all_results($this->table);
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

    function count_groups_filtered()
    {
        $this->_get_field_group_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_groups_all()
    {
        $this->db->from("aauth_groups");
        return $this->db->count_all_results();
    }
}