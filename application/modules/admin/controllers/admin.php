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
class Admin extends MX_Controller {

    public function __construct() {
        parent::__construct();
        if (!isAuthenticate())
            redirect(base_url() . 'admin/login');

        $this->load->library(array('grocery_CRUD'));
        $this->layout->setLayout('admin');
        //$this->form_validation->CI =& $this;
    }

    public function _output($output = null) {
        $this->layout->view('/admin/index', $output);
    }

    public function index() {
        $this->_output((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }
    
    public function about(){
        try {
            $output = $this->_crudOutput('about', 'about');
            $output->header = 'About Sukhigal';
            $output->title = 'About';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function religion() {
        try {
            $output = $this->_crudOutput('Religion', 'religion');
            $output->header = 'Religion Information';
            $output->title = 'Religion';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function gender() {
        try {
            $output = $this->_crudOutput('Gender', 'gender');
            $output->header = 'Gender Information';
            $output->title = 'Gender';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function category() {
        try {
            $output = $this->_crudOutput('Category', 'category');
            $output->header = 'Category Information';
            $output->title = 'Category';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function maritalinfo() {
        try {
            $output = $this->_crudOutput('MaritalInfo', 'marital_status');
            $output->header = 'Marital Information';
            $output->title = 'Marital Information';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function financialstatus() {
        try {
            $output = $this->_crudOutput('FinancialStatus', 'financial_status');
            $output->header = 'Financial Status Information';
            $output->title = 'Financial Status Information';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function educationalstatus() {
        try {
            $output = $this->_crudOutput('FinancialStatus', 'educational_status');
            $output->header = 'Educational Status Information';
            $output->title = 'Educational Status Information';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function professionalstatus() {
        try {
            $output = $this->_crudOutput('ProfessionalStatus', 'professional_status');
            $output->header = 'Professional Status Information';
            $output->title = 'Professional Status Information';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function areainfo() {
        try {
            $output = $this->_crudOutput('AreaInformation', 'area');
            $output->header = 'Area Information';
            $output->title = 'Area Information';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function subareainfo() {
        try {
            $output = $this->_crudOutput('SubAreaInformation', 'sub_area');
            $output->header = 'Sub Area Information';
            $output->title = 'Sub Area Information';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function seconddigit() {
        try {
            $output = $this->_crudOutput('Second Digit', 'second_digit');
            $output->header = 'Second Digit Information';
            $output->title = 'Second Digit Information';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function bodycolor() {
        try {
            $output = $this->_crudOutput('Body Color', 'body_color');
            $output->header = 'Body Color Information';
            $output->title = 'Body Color Information';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function bodyquality() {
        try {
            $output = $this->_crudOutput('Body Quality', 'body_quality');
            $output->header = 'Body Quality Information';
            $output->title = 'Body Quality Information';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function bodyheight() {
        try {
            $output = $this->_crudOutput('Body Height', 'body_height');
            $output->header = 'Body Height Information';
            $output->title = 'Body Height Information';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function sixthdigit() {
        try {
            $output = $this->_crudOutput('Sixth Digit', 'sixth_digit');
            $output->header = 'Sixth Digit Information';
            $output->title = 'Sixth Digit Information';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function presentage() {
        try {
            $output = $this->_crudOutput('Present Age', 'present_age');
            $output->header = 'Present Age Information';
            $output->title = 'Present Age Information';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function seventhdigit() {
        try {
            $output = $this->_crudOutput('Seventh Digit', 'seventh_digit');
            $output->header = 'Seventh Digit Information';
            $output->title = 'Seventh Digit Information';
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function user($userStatus = 0) {
        try {
            $output = $this->_crudOutput('User', 'user', $userStatus);
            if ($userStatus == 0) {
                $output->header = 'New User Information';
                $output->title = 'New User Information';
            }else if ($userStatus == 1) {
                $output->header = 'Active User Information';
                $output->title = 'Active User Information';
            }else{
                $output->header = 'Inactive User Information';
                $output->title = 'Inactive User Information';
            }
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
    public function userprofile(){
        try{
            $output = $this->_crudOutput('User Profile', 'user_profile');
            $output->header = 'User Profile';
            $output->title = 'User Profile';
            $this->_output($output);
        }catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    public function userprevilige($status = 0) {
        try {
            $output = $this->_crudOutput('User Previlige', 'user_previlige', $status);
            if ($status == 0) {
                $output->header = 'New User Permission Application';
                $output->title = 'New User Permission Application';
            }else if ($status == 1) {
                $output->header = 'Approved Permission';
                $output->title = 'Approved Permission';
            }else{
                $output->header = 'Not Approved Permission';
                $output->title = 'Not Approved Permission';
            }
            $this->_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function logout() {
        //$this->session->sess_destroy();
        $this->session->unset_userdata('is_logged_in');
        redirect(base_url() . 'admin/login');
    }

    private function _crudOutput($subject, $table, $userStatus = 0) {
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables')
                ->set_subject($subject)
                ->set_table($table)
                ->unset_add()->unset_delete()->unset_print();
        if ($table == 'sub_area') {
            $crud->set_relation('AreaID', 'area', 'EnglishName', null, 'Point ASC');
        }
        if ($table == 'second_digit') {
            $crud->set_relation('GenderID', 'gender', 'EnglishName', null, 'GenderID ASC')
                    ->set_relation('MaritalStatusID', 'marital_status', 'EnglishTitle', null, 'MaritalStatusID ASC')
                    ->set_relation('CategoryID', 'category', 'EnglishName', null, 'CategoryID ASC');
        }
        if ($table == 'seventh_digit') {
            //$crud->set_relation_n_n('PresentAgeID','gender','present_age','GenderID','PresentAgeID','EnglishAge');
            $crud->set_relation('GenderID', 'gender', 'EnglishName', null, 'GenderID ASC')
                    ->set_relation('PresentAgeID', 'present_age', 'EnglishAge', null, 'PresentAgeID ASC');
        }
        if ($table == 'body_height') {
            $crud->set_relation('BodyQualityID', 'body_quality', 'Quality', null, 'BodyQualityID ASC')
                    ->set_relation('GenderID', 'gender', 'EnglishName', null, 'GenderID ASC');
        }
        if ($table == 'sixth_digit') {
            $crud->set_relation('BodyQualityID', 'body_quality', 'Quality', null, 'BodyQualityID ASC')
                    ->set_relation('BodyColorID', 'body_color', 'EnglishTitle', null, 'BodyColorID ASC');
        }
        if ($table == 'user') {
            if ($userStatus == 0) {
                $crud->add_action('Approve', '', 'admin/admin/approve', 'ui-icon-plus');
                $crud->where('Status', 0);
            } else if ($userStatus == 1) {
                $crud->add_action('Banned', '', 'admin/admin/banned', 'ui-icon-plus');
                $crud->where('Status', 1);
            } else {
                $crud->add_action('Active', '', 'admin/admin/approve', 'ui-icon-plus');
                $crud->unset_edit();
                $crud->where('Status', 2);
            }
            $crud->unset_columns('Password', 'ParentMobileNo');
            $crud->set_relation('Status', 'user_status', 'Description', null, 'UserStatusID ASC');
        }
        if ($table == 'user_previlige') {
            $crud->set_relation('UserID', 'user', 'Pin', null, 'UserID ASC');
            $crud->unset_columns('Status');
            if ($userStatus == 0) {
                $crud->add_action('Approve', '', 'admin/admin/approvePermission', 'ui-icon-plus');
                $crud->add_action('Reject', '', 'admin/admin/notApprovePermission', 'ui-icon-minus');
                $crud->where('user_previlige.Status', 0);
            } else if ($userStatus == 1) {
                $crud->where('user_previlige.Status', 1);
            } else {
                $crud->where('user_previlige.Status', 2);
            }
            $crud->unset_edit()->unset_read();
            
        }
        
        if($table == 'user_profile'){
            $crud->set_relation('HomeRoyalityID', 'home_royality', 'Title', null, 'HomeRoyalityID ASC');
            
            
            $crud->unset_columns(
                    'BanglaName', 
                    'BOD',
                    'FathersName',
                    'FathersEducation',
                    'FathersProfession',
                    'MothersName',
                    'MothersEducation',
                    'MothersProfession',
                    'GuardiansName',
                    'RelationWithGuardian',
                    'PresentAddress'
                    );
        }
        $this->common->GroceryCrudDisplayValue($crud, $table);
        $output = $crud->render();
        return $output;
    }

    public function approve($primary_key) {
        $this->load->model('users_model');
        $where_cond = array(
            'Status' => 1,
        );
        $this->users_model->approve($where_cond, $primary_key);
        return redirect(base_url() . 'admin/user/0');
    }
    
    public function banned($primary_key) {
        $this->load->model('users_model');
        $where_cond = array(
            'Status' => 2,
        );
        $this->users_model->approve($where_cond, $primary_key);
        return redirect(base_url() . 'admin/user/1');
    }
    
    public function approvePermission($id){
        $this->load->model('users_model');
        $where_cond = array(
            'Status' => 1,
        );
        $this->users_model->approvePermission($where_cond, $id);
        return redirect(base_url() . 'admin/userprevilige/0');
    }
    
    public function notApprovePermission($id){
        $this->load->model('users_model');
        $where_cond = array(
            'Status' => 2,
        );
        $this->users_model->approvePermission($where_cond, $id);
        return redirect(base_url() . 'admin/userprevilige/0');
    }

}
