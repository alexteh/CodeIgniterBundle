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
    protected $cii;
    protected $handler;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->cii =& get_instance();
    }

    /**
     * Request execute
     *
     * @param string $url     request url
     * @param array  $options curl parameters
     *
     * @return mixed
     */
    public function request($url, $options = null)
    {
        $this->handler = curl_init($url);
        $this->opts = $options;

        if (empty($this->opts)) {
            $this->opts = array(
                CURLOPT_BUFFERSIZE     => 10,
                CURLOPT_CONNECTTIMEOUT => 30,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
            );
        };

        curl_setopt_array($this->handler, $this->opts);

        $response = curl_exec($this->handler);

        curl_close($this->handler);

        return $response;
    }
}

