<?php

/**
 * CodeIgniter CLI Class
 *
 * PHP Version 5.3
 *
 * @category Controllers
 * @package  Codeigniter
 * @author   Alex Lushpai <alex@lushpai.org>
 * @license  LGPL v.3 http://www.gnu.org/licenses/lgpl.html
 * @link     http://codeigniter.com/user_guide/general/controllers.html
 *
 */

if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * CLI Class
 *
 * CLI tool
 *
 * @category   Controllers
 * @package    CodeIgniter
 * @subpackage Controllers
 * @author     Alex Lushpai <alex@lushpai.org>
 * @license    LGPL v.3 http://www.gnu.org/licenses/lgpl.html
 * @link       http://codeigniter.com/user_guide/general/controllers.html
 */

class Cli extends CI_Controller
{
    /**
     * Constructor
     *
     * @return void
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Index method
     *
     * @param string $params script parameters
     * 
     * @return void
     *
     */
    public function index($params)
    {
        //echo "Hello {$too}!".PHP_EOL;
        var_dump($params);
    }

    /**
     * Domain method
     *
     * @param string $task executable task
     * @param string $args parameters
     * 
     * @return void
     *
     */
    public function domain($task = null, $args = null)
    {
        echo "Task {$task} executed with parameter: {$args}".PHP_EOL;
    }

    /**
     * Mail method
     *
     * @param string $task executable task
     * @param string $args parameters
     * 
     * @return void
     *
     */
    public function mailbox($task = null, $args = null)
    {
        echo "Task {$task} executed with parameter: {$args}".PHP_EOL;
    }

    /**
     * Unix method
     *
     * @param string $task executable task
     * @param string $args parameters
     * 
     * @return void
     *
     */
    public function unix($task = null, $args = null)
    {
        echo "Task {$task} executed with parameter: {$args}".PHP_EOL;
    }

}