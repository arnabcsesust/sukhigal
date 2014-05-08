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
class Main extends MX_Controller {

    public $output;

    public function __construct() {
        parent::__construct();
        if (!frontAuthenticate())
            redirect(base_url() . 'main/home');
        
        $this->layout->setLayout('front');
        $this->load->model('home_model');
    }

    public function index() {
        $this->output['profilePic'] = $this->home_model->getProfilePic($this->session->userdata('userID'));
        $this->layout->view('/main/index',$this->output);
    }

    public function logout() {
        $this->session->sess_destroy();
        //$this->session->unset_userdata('frontIsLoggedIn');
        redirect(base_url() . 'main/home');
    }

    /*public function getAdvancedSearchForm() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $this->output['religionList'] = $this->home_model->getList('religion');
        $this->output['genderList'] = $this->home_model->getList('gender');
        $this->output['categoryList'] = $this->home_model->getList('category');
        $this->output['maritalStatusList'] = $this->home_model->getList('marital_status');
        $this->output['financialStatusList'] = $this->home_model->getList('financial_status');
        $this->output['educationalStatusList'] = $this->home_model->getList('educational_status');
        $this->output['professionalStatusList'] = $this->home_model->getList('professional_status');
        $this->output['bodyColorList'] = $this->home_model->getList('body_color');
        $this->output['areaList'] = $this->home_model->getList('area');

        echo json_encode($this->output);
    }

    public function getBodyHeightByGender() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $genderID = $this->input->post('genderID');
        $result = $this->home_model->getList('body_height', array('GenderID' => $genderID));

        $output = "<option value=''>-- Select One --</option>";
        foreach ($result as $row) {
            $output .= "<option value='" . $row->BodyHeightID . "'>" . $row->Height . "</option>";
        }

        echo $output;
    }

    public function getAgeByGender() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $genderID = $this->input->post('genderID');
        $result = $this->home_model->getAgeListByGender($genderID);

        $output = "<option value=''>-- Select One --</option>";
        foreach ($result as $row) {
            $output .= "<option value='" . $row->PresentAgeID . "'>" . $row->EnglishAge . "</option>";
        }

        echo $output;
    }

    public function getSubAreaByArea() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $areaID = $this->input->post('areaID');

        $result = $this->home_model->getList('sub_area', array('AreaID' => $areaID));

        $output = "<option value=''>-- Select One --</option>";
        foreach ($result as $row) {
            $output .= "<option value='" . $row->SubAreaID . "'>" . $row->EnglishName . "</option>";
        }

        echo $output;
    }

    public function getAdvanceSearchResult() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $searchParameter = array(
            'PresentAgeID' => $this->input->post('PresentAgeID', true),
            'areaID' => $this->input->post('areaID', true),
            'bodyColorID' => $this->input->post('bodyColorID', true),
            'bodyHeightID' => $this->input->post('bodyHeightID', true),
            'categoryID' => $this->input->post('categoryID', true),
            'educationalStatusID' => $this->input->post('educationalStatusID', true),
            'financialStatusID' => $this->input->post('financialStatusID', true),
            'genderID' => $this->input->post('genderID', true),
            'maritalStatusID' => $this->input->post('maritalStatusID', true),
            'professionalStatusID' => $this->input->post('professionalStatusID', true),
            'religionID' => $this->input->post('religionID', true),
            'subAreaID' => $this->input->post('subAreaID', true),
        );
        $searchResult = $this->home_model->getAdvanceSearchResult($searchParameter);
        $this->output['searchResult'] = $searchResult;
        echo json_encode($this->output);
    }
    
    public function addPermission(){
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        if($this->form_validation->set_rules('amount', 'Amount', 'required|numeric|xss_clean')->run()){
            $permissionAmount = $this->input->post('amount');
            if($this->home_model->addPermission($permissionAmount)){
                $this->output['result'] = 1;
            }else{
                $this->output['result'] = "There is an server error. Please Try Again Later.";
            }
        }else{
            $this->output['result'] = validation_errors();
        }
        
        echo json_encode($this->output);
    }
    
    public function checkPermission(){
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        
        $id = $this->input->get('id');
        $result = $this->home_model->checkPermission($id);
        if($result){
            $this->output['result'] = $result;
        }else{
            $this->output['result'] = "You don't have permission to view this user.";
        }
        echo json_encode($this->output);
    }
    
    public function getProfilePic(){
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        
        $userID = $this->input->get('userID');
        $result = $this->home_model->getProfilePic($userID);
        $this->output['result'] = $result;
        
        return json_encode($this->output);
    }*/

}