<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Category_Admin
 */
class Category_Admin extends Admin_Controller
{
    /**
     * Category constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model("category_model");
    }

    public function post_category()
    {
        $result = 0;

        $post_data = $this->input->post();
        $data = $this->security->xss_clean($post_data);

        $this->form_validation->set_rules('cate_name', 'Category Name', 'trim|required');

        if ($this->form_validation->run() == true) {
            if ($data['submit']) {
                foreach ($data['cate_parent'] as $cate_parent_id) {
                    $category_model = new Category_Model();
                    $category_model->cate_name = $data['cate_name'];
                    $category_model->cate_parent = $cate_parent_id;
                    $category_model->cate_active = $data['active_cate'];

                    $result = $category_model->save();
                }
            }
        } else {
            $this->session->set_flashdata("error", true);
        }

        if ($result) {
            redirect('admin/dashboard/category_list');
        } else {
            $this->load->view('admin/header_admin');
            $this->load->view('admin/create_category');
            $this->load->view('admin/footer_admin');
        }
    }

}