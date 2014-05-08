<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * admin short summary.
 *
 * admin description.
 *
 * @version 1.0
 * @author hasib
 */
class Login extends MX_Controller {

    public function __construct() {
        parent::__construct();
        if (isAuthenticate())
            redirect(base_url() . 'admin');

        $this->layout->setLayout('adminlogin');
        //$this->form_validation->CI =& $this;
    }

    public function index() {
        $this->layout->view('login/index');
    }

    public function validate_credentials() {
        $this->load->model('Users_model');

        $this->form_validation->set_rules('user_name', 'Username', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
        $this->form_validation->set_error_delimiters('<p class="alert alert-error"><a class="close" data-dismiss="alert">x</a>', '</p>');

        if ($this->form_validation->run()) {
            $user_name = $this->input->post('user_name');
            $password = $this->common->encryp_password($this->input->post('password'));

            $is_valid = $this->Users_model->validate($user_name, $password);

            if ($is_valid) {
                $data = array(
                    'user_name' => $user_name,
                    'is_logged_in' => true
                );
                $this->session->set_userdata($data);
                redirect(base_url() . 'admin');
            } else { // incorrect username or password
                $data['message_error'] = TRUE;
                $this->layout->view('login/index', $data);
            }
        } else {
            $this->layout->view('login/index');
        }
    }

}
