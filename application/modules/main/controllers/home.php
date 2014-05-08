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
class Home extends MX_Controller {

    public $output;

    public function __construct() {
        parent::__construct();
        if (frontAuthenticate())
            redirect(base_url() . 'main');
        
        if (pinGenerationAuthenticate())
            redirect(base_url() . 'main/pingeneration');
        
        $this->layout->setLayout('frontlogin');
        $this->load->library('common');
        $this->load->model('home_model');
    }

    public function index() {
        if ($this->input->post()) {
            $this->form_validation->set_message('required', 'You must fill in all of the fields.');
            if ($this->form_validation->set_rules('name', 'Name', 'required|min_length[6]|xss_clean')->run()) {
                if ($this->form_validation->set_rules('email', 'Email', 'valid_email|xss_clean|is_unique[user_profile.email]')->run()) {
                    if ($this->form_validation->set_rules('mobNo', 'Mobile No', 'required|exact_length[11]|xss_clean|is_unique[user.MobileNo]')->run()) {
                        if ($this->form_validation->set_rules('password', 'Password', 'required|xss_clean|min_length[6]|matches[rep-password]')->run()) {
                            if ($this->form_validation->set_rules('rep-password', 'Repeat Password', 'required|xss_clean')->run()) {
                                $password = $this->common->encryp_password($this->input->post('password', true));
                                $mobNo = $this->input->post('mobNo', true);
                                $name = $this->input->post('name', true);
                                $email = $this->input->post('email', true);

                                $userData = array(
                                    'Username' => substr($name, -4) . substr($mobNo, -4),
                                    'Password' => $password,
                                    'MobileNo' => $mobNo,
                                    'Status' => 1
                                );

                                $userProfileData = array(
                                    'EnglishName' => $name,
                                    'Email' => $email,
                                    'ReligionID' => 0,
                                    'GenderID' => 0,
                                    'MaritalStatusID' => 0,
                                    'CategoryID' => 0,
                                    'FinancialStatusID' => 0,
                                    'EducationalStatusID' => 0,
                                    'ProfessionalStatusID' => 0,
                                    'BodyHieghtID' => 0, // have to check later
                                    'BodyColorID' => 0,
                                    'PresentAgeID' => 0,
                                    'AreaID' => 0,
                                    'SubAreaID' => 0,
                                    'UserID' => 0, //have to check later
                                    'FathersName' => '',
                                    'MothersName' => '',
                                    'GuardiansName' => '',
                                    'RelationWithGuardian' => '',
                                    'GuardiansMobileNo' => '',
                                    'PresentAddress' => '',
                                    'PermenantAddress' => ''
                                );

                                $this->home_model->signUp($userData, $userProfileData);
                                echo 1;
                                exit;
                            } else {
                                echo validation_errors();
                                exit;
                            }
                        } else {
                            echo validation_errors();
                            exit;
                        }
                    } else {
                        echo validation_errors();
                        exit;
                    }
                } else {
                    echo validation_errors();
                    exit;
                }
            } else {
                echo validation_errors();
                exit;
            }
        }
        $this->layout->view('/home/index', $this->output);
    }

    public function signupSuccess() {
        $this->layout->setLayout('signupSuccess');
        if (isset($_SERVER['HTTP_REFERER'])) {
            $this->output['signupSuccess'] = true;
            $this->layout->view('/home/signup_success', $this->output);
        } else {
            redirect(base_url() . 'main/home');
        }
    }
    
    public function pinGenerationSuccess() {
        $this->layout->setLayout('signupSuccess');
        if (isset($_SERVER['HTTP_REFERER'])) {
            $this->output['signupSuccess'] = true;
            $this->layout->view('/home/pin_success', $this->output);
        } else {
            redirect(base_url() . 'main/home');
        }
    }

    public function login() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('pin', 'Pin', 'required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
            //$this->form_validation->set_error_delimiters('<p class="alert alert-error"><a class="close" data-dismiss="alert">x</a>', '</p>');

            if ($this->form_validation->run()) {
                $pin = $this->input->post('pin', true);
                $password = $this->common->encryp_password($this->input->post('password', true));
//                $where_cond = array(
//                    'pin' => $pin,
//                    'password' => $password,
//                    'status' => 1,
//                );
                $is_valid = $this->home_model->validate($pin, $password);
                if ($is_valid) {
                    if ($is_valid[0]->Pin) {
                        $data = array(
                            'pin' => $is_valid[0]->Pin,
                            'username' => $is_valid[0]->Username,
                            'frontIsLoggedIn' => true,
                            'userID' => $is_valid[0]->UserID
                        );
                        $this->session->set_userdata($data);
                        redirect(base_url() . 'main');
                    } else {
                        $data = array(
                            'username' => $is_valid[0]->Username,
                            'userID' => $is_valid[0]->UserID
                        );
                        $this->session->set_userdata($data);
                        redirect(base_url() . 'main/pingeneration');
                    }
                } else {
                    $this->output['signupSuccess'] = true;
                    $this->output['error_message'] = "Pin or Password doesn't match";
                    $this->layout->view('/home/login', $this->output);
                }
            } else {
                $this->output['signupSuccess'] = true;
                $this->output['error_message'] = validation_errors();
                $this->layout->view('/home/login', $this->output);
            }
        } else {
            $this->output['signupSuccess'] = true;
            $this->layout->view('/home/login', $this->output);
        }
    }

}
