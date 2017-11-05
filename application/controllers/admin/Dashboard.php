<?php defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Class Dashboard
 */
class Dashboard extends Admin_Controller
{

    /**
     * Dashboard constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('admin/header_admin');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer_admin');
    }

    public function create_category()
    {
        $this->load->view('admin/header_admin');
        $this->load->view('admin/create_category');
        $this->load->view('admin/footer_admin');
    }

    public function category_list()
    {
        $this->load->view('admin/header_admin');
        $this->load->view('admin/category_list');
        $this->load->view('admin/footer_admin');
    }

    public function create_product()
    {
        $this->load->view('admin/header_admin');
        $this->load->view('admin/create_product');
        $this->load->view('admin/footer_admin');
    }

    public function product_list()
    {
        $this->load->view('admin/header_admin');
        $this->load->view('admin/product_list');
        $this->load->view('admin/footer_admin');
    }

    public function reviews()
    {
        $this->load->view('admin/header_admin');
        $this->load->view('admin/reviews');
        $this->load->view('admin/footer_admin');
    }

}