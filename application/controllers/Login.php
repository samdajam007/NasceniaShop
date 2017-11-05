<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Login
 */
class Login extends Login_Controller
{
    public function index()
    {
        if (checkLoginStatus() == true) {
            redirect('/');
        }
        $this->load->view('login');

        /* First time user creation only - ignore for review */
        $user = new User();
        if(empty(count($user::where("username", "admin")->get()))) {
            $user->username = "admin";
            $user->firstname = "Admin";
            $user->lastname = "Masum";
            $user->role = "admin";
            $user->password = hash('sha512', "admin123");
            $user->save();
        }
        $user = new User();
        if(empty(count($user::where("username", "member")->get()))) {
            $user->username = "member";
            $user->firstname = "Member";
            $user->lastname = "Masum";
            $user->role = "member";
            $user->password = hash('sha512', "member123");
            $user->save();
        }
        /* First time user creation only */
    }

    /*
    * User login
    */
    public function login_process()
    {
        $post_data = $this->input->post();
        $data = $this->security->xss_clean($post_data); // XSS Protection

        if (empty($data['honey_pot'])) { //Honey Pot Spam check
            if ($data['loginSubmit']) {
                $this->form_validation->set_rules('username', 'Username', 'trim|required');
                $this->form_validation->set_rules('password', 'password', 'trim|required');
                if ($this->form_validation->run() == true) {
                    $status = $this->user->validate($data);

                    if ($status == ERR_INVALID_USERNAME) {
                        $this->session->set_flashdata("error", "Username is invalid");
                    } elseif ($status == ERR_INVALID_PASSWORD) {
                        $this->session->set_flashdata("error", "Password is invalid");
                    } else {
                        // success
                        // store the user data to session
                        $this->session->set_userdata($this->user->get_data());
                        $this->session->set_userdata("isUserLoggedIn", true);

                        $user_data = get_user_data();
                        if ($user_data['role'] == 'admin') {
                            redirect('admin/dashboard');
                        } elseif ($user_data['role'] == 'member') {
                            redirect('/');
                        }
                    }

                }
            }
        }
        $this->load->view('login');
    }

    /*
    * User logout
    */
    public function logout()
    {
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->sess_destroy();
        redirect('login');
    }
}