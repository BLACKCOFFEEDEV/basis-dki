<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Account Model
 *
 * @author		Syahril Hermana (syahril.hermana@gmail.com)
 */

class Account extends CI_Model
{
    var $account = 'aauth_accounts';
    var $employee = 'aauth_employee';
    var $member = 'aauth_member';
    var $primary_key = 'id';


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
            $this->db->where($this->primary_key, $id)->update($this->account, $object);
            return $id;
        }
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
            $where = $this->primary_key;
        }

        $object = $this->db->where($where, $value)->get($this->account)->row();
        return $object;
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
}