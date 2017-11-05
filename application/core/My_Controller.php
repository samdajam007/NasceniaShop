<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class MY_Controller
 */
class MY_Controller extends CI_Controller
{

    protected $access = "*";

    /**
     * Class constructor
     *
     * @return	void
     */
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->login_check();
    }

    public function login_check()
    {
        if ($this->access != "*") {
            // here we check the role of the user
            if (!$this->permission_check()) {
                die("<h4>Access denied</h4>");
            }

            // if user try to access logged in page
            // check does he/she has logged in
            // if not, redirect to login page
            if (!$this->session->userdata("isUserLoggedIn")) {
                redirect("login");
            }
        }
    }

    /**
     * @return bool
     */
    public function permission_check()
    {
        if ($this->access == "@") {
            return true;
        } else {
            $access = is_array($this->access) ?
                $this->access :
                explode(",", $this->access);
            if (in_array($this->session->userdata("role"), array_map("trim", $access))) {
                return true;
            }

            return false;
        }
    }

}

/**
 * Class Admin_Controller
 */
class Admin_Controller extends MY_Controller
{
    protected $access = "admin";

    /**
     * Admin_Controller constructor.
     */
    function __construct()
    {
        parent::__construct();
    }
}

/**
 * Class Public_Controller
 */
class Public_Controller extends MY_Controller
{
    protected $access = '*';

    /**
     * Public_Controller constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->library('botdetect/BotDetectCaptcha', array(
            'captchaConfig' => 'CakeCaptcha'
        ));
    }

}

/**
 * Class Login_Controller
 */
class Login_Controller extends MY_Controller
{
    protected $access = "*";

    /**
     * Login_Controller constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('user');


    }
}