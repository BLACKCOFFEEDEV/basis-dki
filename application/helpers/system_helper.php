<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * System Helper
 *
 * @package		system_helper
 * @author		Syahril Hermana
 * @copyright	Copyright (c) 2017
 * @version		v1.0.0
*/


/**
 * Get selected menu
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('selected'))
{
    /**
     * @param $attribute
     * @return string
     */
    function selected($attribute)
    {
        $CI =& get_instance();
        $selected = "";
        $segment = explode("/", substr($attribute, 0));

        if($segment[0] == "play") {
            if($segment[1] == $CI->uri->segment(2))
                $selected = "active >>".$attribute;
        } else {
            if ($segment[0] == $CI->uri->segment(1))
                $selected = "active";
        }

        return $selected;
    }
}

/**
 * Check is navigation parent
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('is_parent'))
{
    function is_parent($id)
    {
        $CI =& get_instance();
        $CI->load->model("Generals", "helper");
        $return = $CI->helper->is_parent("parent", $id);

        return $return;
    }
}

/**
 * Check is navigation parent
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('get_child'))
{
    function get_child($parent)
    {
        $CI =& get_instance();
        $CI->load->model("Generals", "helper");
        $return = $CI->helper->get_list_no_paging("parent", $parent);

        return $return;
    }
}

/**
 * Check is member
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('is_member'))
{
    function is_member()
    {
        $CI =& get_instance();
        $CI->load->model("Generals", "helper");

        $user = $CI->aauth->get_user();
        $account = $CI->helper->get_account($user->id);
        $return = $CI->helper->is_member($account->id);

        return $return;
    }
}

if ( ! function_exists('get_member'))
{
    function get_member()
    {
        $CI =& get_instance();
        $CI->load->model("Generals", "helper");

        $user = $CI->aauth->get_user();
        $account = $CI->helper->get_account($user->id);
        $return = $CI->helper->get_member($account->id);

        return $return;
    }
}

if ( ! function_exists('get_employee'))
{
    function get_employee()
    {
        $CI =& get_instance();
        $CI->load->model("Generals", "helper");

        $user = $CI->aauth->get_user();
        $account = $CI->helper->get_account($user->id);
        $return = $CI->helper->get_employee($account->id);

        return $return;
    }
}

/**
 * Check is member
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('is_employee'))
{
    function is_employee()
    {
        $CI =& get_instance();
        $CI->load->model("Generals", "helper");

        $user = $CI->aauth->get_user();
        $account = $CI->helper->get_account($user->id);
        $return = $CI->helper->is_employee($account->id);

        return $return;
    }
}

if ( ! function_exists('get_custom_field'))
{
    function get_custom_field($table, $field, $where, $value)
    {
        $CI =& get_instance();
        $CI->load->model("Generals", "helper");
        $result = "";

        $return = $CI->helper->get_custom_name($table, $field, $where, $value);
        if($return)
            $result = $return->$field;

        return $result;
    }
}

/* End of file module_helper.php */