<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Category
 */
class Category extends Public_Controller
{
    /**
     * Category constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'category_id' => $this->input->get('cat')
        );
        $this->load->view('header');
        $this->load->view('category_view', $data );
        $this->load->view('footer');
    }

}