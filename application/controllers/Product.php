<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Product
 */
class Product extends Public_Controller
{
    /**
     * Product constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'product_id' => $this->input->get('pro'),
            'captchaHtml' => $this->botdetectcaptcha->Html()
        );
        $this->load->view('header');
        $this->load->view('product_view', $data );
        $this->load->view('footer');
    }

    public function post_review()
    {
        $post_data = $this->input->post();
        $data = $this->security->xss_clean($post_data);

        $isHuman = $this->botdetectcaptcha->Validate($data['CaptchaCode']);

        $this->form_validation->set_rules('sender_name', 'Reviewer', 'trim|required');
        if ($this->form_validation->run() == true) { //Validation
            if ($data['submit']) { // If submit
                if (empty($data['honey_pot'])) { // Honey Pot Bot Spam Protection
                    if (!$isHuman) { //Captcha
                        $data = array(
                            'product_id_data'=>$data['pro_id'],
                            'captchaHtml' => $this->botdetectcaptcha->Html()
                        );
                        $this->session->set_flashdata("error", true);
                        $this->session->set_flashdata("wrong_captcha", 'Captcha is Wrong!');
                        $this->load->view('header');
                        $this->load->view('product_view', $data);
                        $this->load->view('footer');
                    } else {
                        $review_model = new Review_Model();
                        $review_model->review_from = $data['sender_name'];
                        $review_model->pro_id = $data['pro_id'];
                        $review_model->comments = $data['comments'];
                        $review_model->ratings = $data['rating'];
                        $review_model->save();

                        redirect('product/?pro=' . $data['pro_id']);
                    }
                }
            }
        } else {

            $data = array(
                'product_id_data'=>$data['pro_id'],
                'captchaHtml' => $this->botdetectcaptcha->Html()
            );
            $this->session->set_flashdata("error", true);
            $this->load->view('header');
            $this->load->view('product_view', $data);
            $this->load->view('footer');
        }
    }

}