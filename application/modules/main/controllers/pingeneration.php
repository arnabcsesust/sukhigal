<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pingeneration
 *
 * @author Fujitsu
 */
class pingeneration extends MX_Controller {

    //put your code here
    public $output;

    public function __construct() {
        parent::__construct();
        
        if (!pinGenerationAuthenticate()) {
            redirect(base_url() . 'main/home');
        }

        $this->layout->setLayout('pinGeneration');
        $this->load->library('common');
        $this->load->model('home_model');
    }
    
    public function logout() {
        $this->session->sess_destroy();
        //$this->session->unset_userdata('frontIsLoggedIn');
        redirect(base_url() . 'main/home');
    }

    public function index() {
        $this->output['religionList'] = $this->home_model->getList('religion');
        $this->output['genderList'] = $this->home_model->getList('gender');
        $this->output['categoryList'] = $this->home_model->getList('category');
        $this->output['maritalStatusList'] = $this->home_model->getList('marital_status');
        $this->output['financialStatusList'] = $this->home_model->getList('financial_status');
        $this->output['educationalStatusList'] = $this->home_model->getList('educational_status');
        $this->output['professionalStatusList'] = $this->home_model->getList('professional_status');
        $this->output['bodyColorList'] = $this->home_model->getList('body_color');
        $this->output['areaList'] = $this->home_model->getList('area');

        if ($this->input->post()) {
            $this->form_validation->set_message('required', 'You must fill in all of the fields.');
            if ($this->form_validation->set_rules('religionID', 'Religion', 'required|xss_clean')->run()) {
                if ($this->form_validation->set_rules('genderID', 'Gender', 'required|xss_clean')->run()) {
                    if ($this->form_validation->set_rules('categoryID', 'Category', 'required|xss_clean')->run()) {
                        if ($this->form_validation->set_rules('maritalStatusID', 'Marial Status', 'required|xss_clean')->run()) {
                            if ($this->form_validation->set_rules('financialStatusID', 'Financial Status', 'required|xss_clean')->run()) {
                                if ($this->form_validation->set_rules('educationalStatusID', 'Educational Status', 'required|xss_clean')->run()) {
                                    if ($this->form_validation->set_rules('professionalStatusID', 'Professional Status', 'required|xss_clean')->run()) {
                                        if ($this->form_validation->set_rules('bodyColorID', 'Body Color', 'required|xss_clean')->run()) {
                                            if ($this->form_validation->set_rules('bodyHeightID', 'Body Height', 'required|xss_clean')->run()) {
                                                if ($this->form_validation->set_rules('seventhDigitID', 'Age', 'required|xss_clean')->run()) {
                                                    if ($this->form_validation->set_rules('areaID', 'Area', 'required|xss_clean')->run()) {
                                                        if ($this->form_validation->set_rules('subAreaID', 'Sub Area', 'required|xss_clean')->run()) {
                                                            $religionID = $this->input->post('religionID', true);
                                                            $genderID = $this->input->post('genderID', true);
                                                            $categoryID = $this->input->post('categoryID', true);
                                                            $maritalStatusID = $this->input->post('maritalStatusID', true);
                                                            $financialStatusID = $this->input->post('financialStatusID', true);
                                                            $educationalStatusID = $this->input->post('educationalStatusID', true);
                                                            $professionalStatusID = $this->input->post('professionalStatusID', true);
                                                            $bodyColorID = $this->input->post('bodyColorID', true);
                                                            $bodyQualityID = $this->input->post('bodyHeightID', true);
                                                            $seventhDigitID = $this->input->post('seventhDigitID', true);
                                                            $areaID = $this->input->post('areaID', true);
                                                            $subAreaID = $this->input->post('subAreaID', true);
                                                            $bodyHeightText = $this->input->post('bodyHieghtText', true);

                                                            $firstDigit = $this->home_model->getDigit('religion', array('ReligionID' => $religionID));
                                                            $secondDigit = $this->home_model->getSecondDigit($genderID, $maritalStatusID, $categoryID);
                                                            $thirdDigit = $this->home_model->getDigit('financial_status', array('FinancialStatusID' => $financialStatusID));
                                                            $fourthDigit = $this->home_model->getDigit('educational_status', array('EducationalStatusID' => $educationalStatusID));
                                                            $fifthDigit = $this->home_model->getDigit('professional_status', array('ProfessionalStatusID' => $professionalStatusID));
                                                            $sixthDigit = $this->home_model->getSixthDigit($bodyColorID, $bodyQualityID);
                                                            $seventhDigit = $this->home_model->getDigit('seventh_digit', array('SeventhDigitID' => $seventhDigitID));
                                                            $eightDigit = $this->home_model->getDigit('area', array('AreaID' => $areaID));
                                                            $ninthDigit = $this->home_model->getDigit('sub_area', array('SubAreaID' => $subAreaID));

                                                            $pin = $firstDigit . $secondDigit . $thirdDigit . $fourthDigit . $fifthDigit . $sixthDigit . $seventhDigit . $eightDigit . $ninthDigit;
                                                            if ($this->home_model->isPinExists($pin)) {
                                                                $existingPIN = $this->home_model->isPinExists($pin);
                                                                if (strlen($existingPIN) == 9) {
                                                                    $pin = $pin . '1';
                                                                } else {
                                                                    $digitAfterNine = substr($existingPIN, 9);
                                                                    $pin = $pin . ($digitAfterNine + 1);
                                                                }
                                                            }
                                                            $userQuality = $firstDigit + $secondDigit + $thirdDigit + $fourthDigit + $fifthDigit + $sixthDigit + $seventhDigit;

                                                            $ageID = $this->home_model->getAgeID($seventhDigitID);
                                                            $bodyHeightID = $this->home_model->getBodyHieghtID($bodyQualityID, $genderID, $bodyHeightText);

                                                            $userData = array(
                                                                'Pin' => $pin,
                                                                'UserQuality' => $userQuality,
                                                                'Status' => 0
                                                            );

                                                            $userProfileData = array(
                                                                'ReligionID' => $religionID,
                                                                'GenderID' => $genderID,
                                                                'MaritalStatusID' => $maritalStatusID,
                                                                'CategoryID' => $categoryID,
                                                                'FinancialStatusID' => $financialStatusID,
                                                                'EducationalStatusID' => $educationalStatusID,
                                                                'ProfessionalStatusID' => $professionalStatusID,
                                                                'BodyHieghtID' => $bodyHeightID, // have to check later
                                                                'BodyColorID' => $bodyColorID,
                                                                'PresentAgeID' => $ageID,
                                                                'AreaID' => $areaID,
                                                                'SubAreaID' => $subAreaID,
                                                            );

                                                            $this->home_model->generatePin($userData, $userProfileData);
                                                            $this->session->sess_destroy();
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
                } else {
                    echo validation_errors();
                    exit;
                }
            } else {
                echo validation_errors();
                exit;
            }
        }

        $this->layout->view('/home/pingeneration', $this->output);
    }

    public function getBodyHeightByGender() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $genderID = $this->input->post('genderID');
        $result = $this->home_model->getList('body_height', array('GenderID' => $genderID));

        $output = "<option value=''>-- Select Body Height --</option>";
        foreach ($result as $row) {
            $output .= "<option value='" . $row->BodyQualityID . "'>" . $row->Height . "</option>";
        }

        echo $output;
    }

    public function getAgeByGender() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $genderID = $this->input->post('genderID');
        $result = $this->home_model->getAgeListByGender($genderID);

        $output = "<option value=''>-- Select Age --</option>";
        foreach ($result as $row) {
            $output .= "<option value='" . $row->SeventhDigitID . "'>" . $row->EnglishAge . "</option>";
        }

        echo $output;
    }

    public function getSubAreaByArea() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $areaID = $this->input->post('areaID');

        $result = $this->home_model->getList('sub_area', array('AreaID' => $areaID));

        $output = "<option value=''>-- Select Sub Area --</option>";
        foreach ($result as $row) {
            $output .= "<option value='" . $row->SubAreaID . "'>" . $row->EnglishName . "</option>";
        }

        echo $output;
    }

}

?>
