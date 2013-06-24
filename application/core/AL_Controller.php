<?php

/**
 *  AL controller
 *
 *  PHP Version 5.3
 *
 *  @category CoreControllers
 *  @package  Catalogic
 *  @author   Alex Lushpai <alex@lushpai.org>
 *  @license  LGPL v.3 http://www.gnu.org/licenses/lgpl.html
 *  @link     http://codeigniter.com/user_guide/general/controllers.html
 *
 */

if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 *  AL_Controller class
 *
 *  @category CoreControllers
 *  @package  Catalogic
 *  @author   Alex Lushpai <alex@lushpai.org>
 *  @license  LGPL v.3 http://www.gnu.org/licenses/lgpl.html
 *  @version  Release: 0.1
 *  @link     http://codeigniter.com/user_guide/general/controllers.html
 *
 */

class AL_Controller extends CI_Controller
{

    private static $instance;
    public $sess;
    public $settings;

    /**
     *  Constructor
     *
     *  @return instance
     */
    public function __construct()
    {
        parent::__construct();

        $this->sess = $this->session->userdata('user_data');

        if(!$this->sess || $this->sess['user_id'] == '')
        {
            redirect('/login');
        }

    }

    /**
     *  get instance
     *
     *  @return instance
     */
    public static function &get_instance()
    {
        return self::$instance;
    }
}
// END Controller class

/* End of file AL_Controller.php */
/* Location: ./app/core/AL_Controller.php */
