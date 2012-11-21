<?php

/**
 * CodeIgniter Menu Helper
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

if (! function_exists('mainMenu')) {

    /**
     * Draw main menu
     *
     * need a loaded html helper
     *
     * @return void
     *
     */
    function mainMenu()
    {
        $ci =& get_instance();
        $controllers = array();

        $handle = opendir(APPPATH . 'controllers');
        if ($handle) {
            while (false !== ($entry = readdir($handle))) {
                $ext = pathinfo($entry);
                if (isset($ext['extension']) && $ext['extension'] == 'php') {

                    if(str_replace(".php", "", $entry) != $ci->router->class) {
                        include_once APPPATH . 'controllers/' .$entry;
                    }

                    $class = new ReflectionClass(
                        ucfirst(str_replace(".php", "", $entry))
                    );

                    if ($class->hasConstant("INMENU")) {
                        array_push($controllers, str_replace(".php", "", $entry));
                    }

                    unset($class);
                }
            }

            closedir($handle);
        }

        foreach ($controllers as $key => $value) {
            $controllers[$key] = anchor('/' . $value, ucfirst($value));
        }

        echo ul($controllers, array('class' => 'nav'));
    }
}
