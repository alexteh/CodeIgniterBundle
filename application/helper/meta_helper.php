<?php

/**
 * CodeIgniter Meta Helper
 *
 * PHP Version 5.3
 *
 * @category Helpers
 * @package  Codeigniter
 * @author   Alex Lushpai <alex@lushpai.org>
 * @license  LGPL v.3 http://www.gnu.org/licenses/lgpl.html
 * @link     http://codeigniter.com/user_guide/general/helpers.html
 *
 */

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (! function_exists('pageTitle')) {

    /**
     * Draw title meta tag
     *
     * @return void
     *
     */
    function pageTitle()
    {
        $obj =& get_instance();
        $url = end($obj->uri->segment_array());

        $title = $obj->db
            ->select('title')
            ->from('resource')
            ->where(array('url' => $url, 'is_pub' => 1))
            ->get()
            ->result_array()[0]['title'];

        echo $title;
    }
}

if (! function_exists('pageKeywords')) {

    /**
     * Draw title meta tag
     *
     * @return void
     *
     */
    function pageKeywords()
    {
        $obj =& get_instance();
        $url = end($obj->uri->segment_array());

        $title = $obj->db
            ->select('keywords')
            ->from('resource')
            ->where(array('url' => $url, 'is_pub' => 1))
            ->get()
            ->result_array()[0]['keywords'];

        echo $title;
    }
}

if (! function_exists('pageDescription')) {

    /**
     * Draw title meta tag
     *
     * @return void
     *
     */
    function pageDescription()
    {
        $obj =& get_instance();
        $url = end($obj->uri->segment_array());

        $title = $obj->db
            ->select('meta')
            ->from('resource')
            ->where(array('url' => $url, 'is_pub' => 1))
            ->get()
            ->result_array()[0]['meta'];

        echo $title;
    }
}

if (! function_exists('isAdmin')) {
    /**
     * Render blocks for admin users
     *
     */
    function isAdmin()
    {
        $obj =& get_instance();
        $sess = $obj->session->userdata('user_data');
        if (isset($sess['user_role']) && $sess['user_role'] == 1) {
            return true;
        } else {
            return false;
        }
    }
}
