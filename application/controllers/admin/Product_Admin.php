<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Product_Admin
 */
class Product_Admin extends Admin_Controller
{
    /**
     * Product constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->model("category_product_model");
    }

    public function post_product()
    {
        $result = 0;
        $result_cat_pro = 0;
        $image_names = '';

        $post_data = $this->input->post();
        $data = $this->security->xss_clean($post_data);

        if(!empty($_FILES['uploadedimages']['name'][0])){
            var_dump($_FILES);
            $image_names = $this->security->xss_clean($this->uploadImages());
        }

        $this->form_validation->set_rules('pro_name', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('pro_price', 'Product Price', 'trim|required|numeric');

        if ($this->form_validation->run() == true) {
            if ($data['submit']) {
                $product_model = new Product_Model();
                $product_model->pro_name = $data['pro_name'];
                $product_model->pro_details = $data['pro_details'];
                $product_model->pro_price = $data['pro_price'];
                $product_model->pro_sku = $data['pro_sku'];
                $product_model->pro_images = serialize($image_names);

                $result = $product_model->save();
                $prod_id = $product_model->id;

                $result_cat_pro = $this->post_cat_pro($data['pro_cate'], $prod_id);
            }
        } else {
            $this->session->set_flashdata("error", true);
        }

        if ($result && $result_cat_pro) {
            redirect('admin/dashboard/product_list');
        } else {
            $this->load->view('admin/header_admin');
            $this->load->view('admin/create_product');
            $this->load->view('admin/footer_admin');
        }
    }

    /**
     * @return array
     */
    public function uploadImages()
    {
        $data = array();
        $data['title'] = 'Multiple file upload';
        $number_of_files = sizeof($_FILES['uploadedimages']['tmp_name']);
        // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
        $files = $_FILES['uploadedimages'];
        $errors = array();

        // first make sure that there is no error in uploading the files
        for ($i = 0; $i < $number_of_files; $i++) {
            if ($_FILES['uploadedimages']['error'][$i] != 0) {
                $errors[$i][] = 'Couldn\'t upload file ' . $_FILES['uploadedimages']['name'][$i];
            }
        }
        if (sizeof($errors) == 0) {
            // now, taking into account that there can be more than one file, for each file we will have to do the upload
            // we first load the upload library
            $this->load->library('upload');
            // next we pass the upload path for the images
            $config['upload_path'] = FCPATH . 'upload/';
            // also, we make sure we allow only certain type of images
            $config['allowed_types'] = 'gif|jpg|png';
            for ($i = 0; $i < $number_of_files; $i++) {
                $_FILES['uploadedimage']['name'] = $files['name'][$i];
                $_FILES['uploadedimage']['type'] = $files['type'][$i];
                $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['uploadedimage']['error'] = $files['error'][$i];
                $_FILES['uploadedimage']['size'] = $files['size'][$i];
                //now we initialize the upload library
                $this->upload->initialize($config);
                // we retrieve the number of files that were uploaded
                if ($this->upload->do_upload('uploadedimage')) {
                    $data['uploads'][$i] = $this->upload->data();
                } else {
                    $data['upload_errors'][$i] = $this->upload->display_errors();
                }
            }
        } else {
            print_r($errors);
        }
        $file_names = array();
        foreach ($data['uploads'] as $item) {
            array_push($file_names, $item['file_name']);
        }
        return $file_names;
    }

    /**
     * @param $cat_ids
     * @param $pro_id
     * @return bool|int
     */
    public function post_cat_pro($cat_ids, $pro_id)
    {
        $result = 0;

        foreach ($cat_ids as $cat_id) {
            $cat_pro_model = new Category_Product_Model();
            $cat_pro_model->pro_id = $pro_id;
            $cat_pro_model->cat_id = $cat_id;

            $result = $cat_pro_model->save();
        }

        return $result;
    }

}