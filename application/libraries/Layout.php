<?php

/**
 * CodeIgniter Layout Class
 *
 * PHP Version 5.3
 *
 * @category Libraries
 * @package  Codeigniter
 * @author   Alex Lushpai <alex@lushpai.org>
 * @license  LGPL v.3 http://www.gnu.org/licenses/lgpl.html
 * @link     http://lushpai.org/codeigniter/codeigniter-layout
 *
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Layout Class
 *
 * Add Layout functionality to Codeigniter app.
 *
 * @category   Libraries
 * @package    CodeIgniter
 * @subpackage Libraries
 * @author     Alex Lushpai <alex@lushpai.org>
 * @license    LGPL v.3 http://www.gnu.org/licenses/lgpl.html
 * @link       http://lushpai.org/codeigniter/codeigniter-layout
 */
class Layout
{

    public $ci;
    public $layout;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->ci =& get_instance();
    }

    /**
     * Set current layout by given name
     *
     * @param string $layout name of the layout file
     *
     * @return void
     */
    private function _setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * Load view with parameters into selected layout
     *
     * @param string  $layout name of the layout file
     * @param string  $view   name of the view file
     * @param array   $data   parameters for view
     * @param boolean $return flag to display reuslt
     *
     * @return void
     */
    public function view($layout, $view, $data=null, $return=false)
    {
        $loadedData['yeld'] = $this->ci->load->view($view, $data, true);

        if ($return) {
            $this->_setLayout($layout);
            $output = $this->ci->load->view($this->layout, $loadedData, true);

            return $output;
        } else {
            $this->_setLayout($layout);
            $this->ci->load->view($this->layout, $loadedData, false);
        }
    }
}

/* End of file Layout.php */
/* Location: ./app/libraries/Layout.php */
