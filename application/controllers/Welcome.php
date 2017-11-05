<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Welcome
 */
class Welcome extends Public_Controller
{

    public function index()
    {
        $this->load->view('header');
        $this->load->view('welcome');
        $this->load->view('footer');

    }
}
