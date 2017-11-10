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
    var $primary_key = 'aauth_accounts.id';


    /**
     * Retrieve a data
     *
     * @param string where
     * @param int value
     * @param string identification field
     */
    public function get_account($where, $value = FALSE) {
        $this->db->from($this->account);
        $this->db->join('aauth_users', 'aauth_users.id=aauth_accounts.user_id',"left");
        
        if (!$value) {
            $value = $where;
            $where = $this->primary_key;
        }

        $object = $this->db->where($where, $value)->get()->row();
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
}