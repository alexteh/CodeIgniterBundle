<?php

/**
 * CodeIgniter Curl Class
 *
 * PHP Version 5.3
 *
 * @category Libraries
 * @package  Codeigniter
 * @author   Alex Lushpai <alex@lushpai.org>
 * @license  LGPL v.3 http://www.gnu.org/licenses/lgpl.html
 * @link     http://lushpai.org/codeigniter/codeigniter-curl
 *
 */

if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Curl Class
 *
 * Object oriented curl functionality for Codeigniter app.
 *
 * @category   Libraries
 * @package    CodeIgniter
 * @subpackage Libraries
 * @author     Alex Lushpai <alex@lushpai.org>
 * @license    LGPL v.3 http://www.gnu.org/licenses/lgpl.html
 * @link       http://lushpai.org/codeigniter/codeigniter-logger
 */

class Curl
{
    protected $ci_;
    protected $handler;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->ci_ =& get_instance();
    }

    /**
     * Request prepare
     * 
     * @param string $url     request url 
     * @param array  $options curl parameters
     *
     * @return void
     */
    private function _prepareRequest($url, $options = null)
    {
        $this->handler = curl_init($url);

        if (empty($options)) {
            $options = array(
                CURLOPT_BUFFERSIZE     => 10,
                CURLOPT_CONNECTTIMEOUT => 30,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
            );
        };

        curl_setopt_array($this->handler, $options);
    }

    /**
     * Request execute
     *
     * @param string $url     request url 
     * @param array  $options curl parameters
     *
     * @return void
     */
    public function request($url, $options = null)
    {

        $this->_prepareRequest($url, $options);

        $response = curl_exec($this->handler);
        curl_close($this->handler);

        return $response;
    }
}