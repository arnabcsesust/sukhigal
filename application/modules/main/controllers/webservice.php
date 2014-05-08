<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of webservice
 *
 * @author hasib
 */
class webservice extends MX_Controller {

    //put your code here
    public $output;

    public function __construct() {
        parent::__construct();
        if (!frontAuthenticate()) {
            redirect(base_url() . 'main/home');
        }

        $this->load->model('home_model');

        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
    }

    public function getAdvancedSearchForm() {
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
        $genderID = $this->input->post('genderID');
        $result = $this->home_model->getList('body_height', array('GenderID' => $genderID));

        $output = "<option value=''>-- Select One --</option>";
        foreach ($result as $row) {
            $output .= "<option value='" . $row->BodyHeightID . "'>" . $row->Height . "</option>";
        }

        echo $output;
    }

    public function getAgeByGender() {
        $genderID = $this->input->post('genderID');
        $result = $this->home_model->getAgeListByGender($genderID);

        $output = "<option value=''>-- Select One --</option>";
        foreach ($result as $row) {
            $output .= "<option value='" . $row->PresentAgeID . "'>" . $row->EnglishAge . "</option>";
        }

        echo $output;
    }

    public function getSubAreaByArea() {
        $areaID = $this->input->post('areaID');

        $result = $this->home_model->getList('sub_area', array('AreaID' => $areaID));

        $output = "<option value=''>-- Select One --</option>";
        foreach ($result as $row) {
            $output .= "<option value='" . $row->SubAreaID . "'>" . $row->EnglishName . "</option>";
        }

        echo $output;
    }

    public function getAdvanceSearchResult() {
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
        if ($searchResult) {
            $this->output['searchResult'] = $searchResult;
        } else {
            $this->output['searchResult'] = "There is no User in This Criteria";
        }

        echo json_encode($this->output);
    }

    public function getQuickSearchResult() {
        if ($this->form_validation->set_rules('pin', 'Pin', 'required|xss_clean')->run()) {
            $searchResult = $this->home_model->getQuickSearchResult($this->input->post('pin', true));
            if ($searchResult) {
                $this->output['result'] = $searchResult;
            } else {
                $this->output['result'] = "Invalid PIN";
            }
        } else {
            $this->output['result'] = "Please Enter The Pin No";
        }
        echo json_encode($this->output);
    }

    public function addPermission() {
        //if ($this->form_validation->set_rules('amount', 'Amount', 'required|numeric|xss_clean')->run()) {
        //$permissionAmount = $this->input->post('amount');
        $isEligibleForPermission = $this->home_model->isEligibleForPermission();
        if ($isEligibleForPermission == 1) {
            if ($this->home_model->addPermission(10)) {
                $this->output['result'] = 1;
            } else {
                $this->output['result'] = "There is an server error. Please Try Again Later.";
            }
        } else {
            $this->output['result'] = $isEligibleForPermission;
        }

        /* } else {
          $this->output['result'] = validation_errors();
          } */

        echo json_encode($this->output);
    }

    public function checkPermission() {
        $id = $this->input->get('id');
        $result = $this->home_model->checkPermission($id);
        if ($result) {
            $this->output['result'] = $result;
        } else {
            $this->output['result'] = "You don't have permission to view this user.";
        }
        echo json_encode($this->output);
    }

    public function getProfilePic() {
        $userID = $this->input->get('userID');
        if ($userID == 'defaultUser') {
            $userID = $this->session->userdata('userID');
        }
        $result = $this->home_model->getProfilePic($userID);
        $this->output['result'] = $result;
//        if($result){
//            $this->output['result'] = $result;
//        }
//        else {
//            $this->output['result'] = "";
//        }
        echo json_encode($this->output);
    }

    public function profilePicUpload() {
        $this->load->model('upload_model');
        $result = $this->upload_model->do_upload();
        echo json_encode($result);
    }

    public function sendMessage() {
        $this->form_validation->set_rules('messageBody', 'messageBody', 'required|xss_clean');
        $this->form_validation->set_rules('messageSubject', 'messageSubject', 'required|xss_clean');

        if ($this->form_validation->run()) {
            $data = array(
                'FromUserID' => $this->session->userdata('userID'),
                'ToUserID' => $this->input->post('receiverId'),
                'Subject' => $this->input->post('messageSubject'),
                'Text' => $this->input->post('messageBody'),
                'Date' => time(),
                'IsViewed' => 0,
                'IsDeletedBySender' => 0,
                'IsDeletedByReceiver' => 0
            );

            if ($this->home_model->sendMessage($data)) {
                $this->output['result'] = 1;
            } else {
                $this->output['result'] = "There is an server error. Please Try Again Later.";
            }
        } else {
            $this->output['result'] = "You can not send any message without subject and text";
        }

        echo json_encode($this->output);
    }

    public function sendProposal() {
        $FromUserID = $this->session->userdata('userID');
        $ToUserID = $this->input->post('ProposedUserID', TRUE);
        $ProposalTypeID = $this->input->post('ProposalType', TRUE);
        $Text = $this->input->post('ProposalBody', TRUE);

        if ($ProposalTypeID == 1 || $ProposalTypeID == 2 || $ProposalTypeID == 3) {
            if ($this->home_model->isProposalExists($FromUserID, $ToUserID, $ProposalTypeID)) {
                $this->output['result'] = "Proposal To This User Already Sent";
            } else {
                if ($this->home_model->sendProposal($FromUserID, $ToUserID, $ProposalTypeID, $Text)) {
                    $this->output['result'] = 1;
                } else {
                    $this->output['result'] = "There is an server error. Please Try Again Later.";
                }
            }
        } else {
            $this->output['result'] = "Invalid Proposal Type!";
        }

        echo json_encode($this->output);
    }

    public function inboxUser() {
        $inboxUserList = $this->home_model->getInboxUserList();
        if ($inboxUserList) {
            $this->output['result'] = $inboxUserList;
        } else {
            $this->output['result'] = "There is no Message in Your INBOX!";
        }
        echo json_encode($this->output);
    }

    public function sentMessageUser() {
        $sentUserList = $this->home_model->getSentMessageUserList();
        if ($sentUserList) {
            $this->output['result'] = $sentUserList;
        } else {
            $this->output['result'] = "There is no Message in Your Sent Items!";
        }
        echo json_encode($this->output);
    }

    public function inboxMessage() {
        $senderUserID = $this->input->post('userID');
        $receiverUserID = $this->session->userdata('userID');
        $inboxMessages = $this->home_model->getMessages($senderUserID, $receiverUserID, 'i');
        if ($inboxMessages) {
            $this->output['result'] = $inboxMessages;
        } else {
            $this->output['result'] = "There is no Message!";
        }
        echo json_encode($this->output);
    }

    public function sentMessage() {
        $receiverUserID = $this->input->post('userID');
        $senderUserID = $this->session->userdata('userID');
        $sentMessages = $this->home_model->getMessages($senderUserID, $receiverUserID, 's');
        if ($sentMessages) {
            $this->output['result'] = $sentMessages;
        } else {
            $this->output['result'] = "There is no Message";
        }
        echo json_encode($this->output);
    }

    public function sentProposal() {
        $sentProposal = $this->home_model->getSentProposal();
        if ($sentProposal) {
            $this->output['result'] = $sentProposal;
        } else {
            $this->output['result'] = "You didnt Sent Any Proposal Yet";
        }
        echo json_encode($this->output);
    }

    public function receiveProposal() {
        $receiveProposal = $this->home_model->getReceiveProposal();
        if ($receiveProposal) {
            $this->output['result'] = $receiveProposal;
        } else {
            $this->output['result'] = "No One Send You Any Proposal";
        }
        echo json_encode($this->output);
    }

    public function acceptedProposal() {
        $acceptedProposal = $this->home_model->getAcceptedProposal();
        if ($acceptedProposal) {
            $this->output['result'] = $acceptedProposal;
        } else {
            $this->output['result'] = "No One Accept Your Proposal";
        }
        echo json_encode($this->output);
    }

    public function deniedProposal() {
        $deniedProposal = $this->home_model->getDeniedProposal();
        if ($deniedProposal) {
            $this->output['result'] = $deniedProposal;
        } else {
            $this->output['result'] = "No One Deny Your Proposal";
        }
        echo json_encode($this->output);
    }

    public function pendingProposal() {
        $pendingProposal = $this->home_model->getPendingProposal();
        if ($pendingProposal) {
            $this->output['result'] = $pendingProposal;
        } else {
            $this->output['result'] = "There IS NO Pending Proposal";
        }
        echo json_encode($this->output);
    }

    public function proposalAccept() {
        $proposalID = $this->input->post('proposalID', TRUE);
        $proposalAccept = $this->home_model->updateProposalAccept($proposalID);
        if ($proposalAccept) {
            $this->output['result'] = $proposalAccept;
            $this->output['status'] = 1;
        } else {
            $this->output['result'] = "Some Error Occured";
            $this->output['status'] = 0;
        }
        echo json_encode($this->output);
    }

    public function proposalDeny() {
        $proposalID = $this->input->post('proposalID', TRUE);
        $proposalAccept = $this->home_model->updateProposalDeny($proposalID);
        if ($proposalAccept) {
            $this->output['result'] = "You Have Denied The Proposal";
            $this->output['status'] = 1;
        } else {
            $this->output['result'] = "Some Error Occured";
            $this->output['status'] = 0;
        }
        echo json_encode($this->output);
    }

    public function businessFriend() {
        $businessFriend = $this->home_model->getFriend(3);
        if ($businessFriend) {
            $this->output['result'] = $businessFriend;
        } else {
            $this->output['result'] = "";
        }
        echo json_encode($this->output);
    }

    public function jobFriend() {
        $jobFriend = $this->home_model->getFriend(2);
        if ($jobFriend) {
            $this->output['result'] = $jobFriend;
        } else {
            $this->output['result'] = "";
        }
        echo json_encode($this->output);
    }

    public function marryFriend() {
        $marryFriend = $this->home_model->getFriend(1);
        if ($marryFriend) {
            $this->output['result'] = $marryFriend;
        } else {
            $this->output['result'] = "";
        }
        echo json_encode($this->output);
    }

    public function fullProfile() {
        $this->output['religionList'] = $this->home_model->getList('religion');
        $this->output['genderList'] = $this->home_model->getList('gender');
        $this->output['categoryList'] = $this->home_model->getList('category');
        $this->output['maritalStatusList'] = $this->home_model->getList('marital_status');
        $this->output['financialStatusList'] = $this->home_model->getList('financial_status');
        $this->output['educationalStatusList'] = $this->home_model->getList('educational_status');
        $this->output['professionalStatusList'] = $this->home_model->getList('professional_status');
        $this->output['bodyColorList'] = $this->home_model->getList('body_color');
        $this->output['areaList'] = $this->home_model->getList('area');

        $this->output['homeRoyalityList'] = $this->home_model->getList('home_royality');
        $this->output['educationModeList'] = $this->home_model->getList('education_mode');
        $this->output['organizationTypeList'] = $this->home_model->getList('organization_type');
        $this->output['childrenDescriptionList'] = $this->home_model->getList('children_description');

        $fullProfile = $this->home_model->getUserAllInformation($this->session->userdata('userID'));
        if ($fullProfile) {
            $this->output['result'] = $fullProfile;
        } else {
            $this->output['result'] = "";
        }
        echo json_encode($this->output);
    }

    public function personalDetailEdit() {
        $this->form_validation->set_rules('englishName', 'Name', 'required|min_length[6]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|xss_clean');
        $this->form_validation->set_rules('BOD', 'Date of Birth', 'xss_clean');
        $this->form_validation->set_rules('mobileNo', 'mobileNo', 'required|exact_length[11]|xss_clean');
        $this->form_validation->set_rules('presentAddress', 'presentAddress', 'xss_clean');
        $this->form_validation->set_rules('ownRemarks', 'ownRemarks', 'xss_clean');

        if ($this->form_validation->run()) {
            $name = $this->input->post('englishName');
            $email = $this->input->post('email');
            $BOD = $this->input->post('BOD');
            $mobileNo = $this->input->post('mobileNo');
            $ownRemarks = $this->input->post('ownRemarks');
            $permenantAddress = $this->input->post('permenantAddress');
            $presentAddress = $this->input->post('presentAddress');

            if (!$this->home_model->isEmailExists($email)) {
                if (!$this->home_model->isMobileNoExists($mobileNo)) {
                    $userData = array(
                        'MobileNo' => $mobileNo
                    );
                    $userProfileData = array(
                        'EnglishName' => $name,
                        'Email' => $email,
                        'BOD' => $BOD,
                        'PresentAddress' => $presentAddress,
                        'PermenantAddress' => $permenantAddress,
                        'OwnRemarks' => $ownRemarks
                    );
                    if ($this->home_model->updateUserProfile($userData, $userProfileData)) {
                        $this->output['success'] = 1;
                    } else {
                        $this->output['validationMessage'] = "<p>There is an error in server. Please try again later.</p>";
                    }
                } else {
                    $this->output['validationMessage'] = "<p>This mobile no is already used by another user</p>";
                }
            } else {
                $this->output['validationMessage'] = "<p>This email is already used by another user</p>";
            }
        } else {
            $this->output['validationMessage'] = validation_errors();
        }
        echo json_encode($this->output);
    }

    public function guardianDetailEdit() {
        $this->form_validation->set_rules('fathersName', 'Father\'s Name', 'xss_clean|min_length[6]');
        $this->form_validation->set_rules('fathersEducation', 'Father\'s Education', 'xss_clean');
        $this->form_validation->set_rules('fathersProfession', 'Father\'s Profession', 'xss_clean');

        $this->form_validation->set_rules('mothersName', 'Mother\'s Name', 'xss_clean|min_length[6]');
        $this->form_validation->set_rules('mothersEducation', 'Mother\'s Education', 'xss_clean');
        $this->form_validation->set_rules('mothersProfession', 'Mother\'s Profession', 'xss_clean');

        $this->form_validation->set_rules('parentMobileNo', 'Parent\'s Mobile No', 'exact_length[11]|xss_clean');

        $this->form_validation->set_rules('guardiansName', 'Guardian\'s Name', 'xss_clean|min_length[6]');
        $this->form_validation->set_rules('relationWithGuardian', 'Relation With Guardian', 'xss_clean');
        $this->form_validation->set_rules('guardiansMobileNo', 'Guardian\'s Mobile No', 'exact_length[11]|xss_clean');

        if ($this->form_validation->run()) {
            $userData = array(
                'ParentMobileNo' => $this->input->post('parentMobileNo')
            );
            $userProfileData = array(
                'FathersName' => $this->input->post('fathersName'),
                'FathersEducation' => $this->input->post('fathersEducation'),
                'FathersProfession' => $this->input->post('fathersProfession'),
                'MothersName' => $this->input->post('mothersName'),
                'MothersEducation' => $this->input->post('mothersEducation'),
                'MothersProfession' => $this->input->post('mothersProfession'),
                'GuardiansName' => $this->input->post('guardiansName'),
                'RelationWithGuardian' => $this->input->post('relationWithGuardian'),
                'GuardiansMobileNo' => $this->input->post('guardiansMobileNo'),
            );
            if ($this->home_model->updateUserProfile($userData, $userProfileData)) {
                $this->output['success'] = 1;
            } else {
                $this->output['validationMessage'] = "<p>There is an error in server. Please try again later.</p>";
            }
        } else {
            $this->output['validationMessage'] = validation_errors();
        }
        echo json_encode($this->output);
    }

    public function organizationDetailEdit() {
        $this->form_validation->set_rules('nameOfOrganization', 'Organization Name', 'xss_clean|min_length[6]');
        $this->form_validation->set_rules('organizationType', 'Organization Type', 'xss_clean');
        if ($this->form_validation->run()) {
            $nameOfOrganization = $this->input->post('nameOfOrganization');
            $organizationType = $this->input->post('organizationType');
            if ($this->home_model->isOrganizationTypeExists($organizationType)) {
                $userProfileData = array(
                    'OrganizationTypeID' => $organizationType,
                    'NameOfOrganization' => $nameOfOrganization
                );
                if ($this->home_model->updateUserProfile(null, $userProfileData)) {
                    $this->output['success'] = 1;
                } else {
                    $this->output['validationMessage'] = "<p>There is an error in server. Please try again later.</p>";
                }
            } else {
                $this->output['validationMessage'] = "<p>Organization type is invalid</p>";
            }
        } else {
            $this->output['validationMessage'] = validation_errors();
        }
        echo json_encode($this->output);
    }

    public function othersInformationEdit() {
        $this->form_validation->set_rules('childrenDescription', 'Children Description', 'xss_clean');
        $this->form_validation->set_rules('educationMode', 'Education Mode', 'xss_clean');
        $this->form_validation->set_rules('homeRoyality', 'Home Royality', 'xss_clean');
        if ($this->form_validation->run()) {
            $childrenDescription = $this->input->post('childrenDescription');
            $educationMode = $this->input->post('educationMode');
            $homeRoyality = $this->input->post('homeRoyality');
            if ($this->home_model->isHomeRoyalityExists($homeRoyality)) {
                if ($this->home_model->isEducationModeExists($educationMode)) {
                    if ($this->home_model->isChildrenDescriptionExists($childrenDescription)) {
                        $userProfileData = array(
                            'HomeRoyalityID' => $homeRoyality,
                            'EducationModeID' => $educationMode,
                            'ChildrenDescriptionID' => $childrenDescription
                        );
                        if ($this->home_model->updateUserProfile(null, $userProfileData)) {
                            $this->output['success'] = 1;
                        } else {
                            $this->output['validationMessage'] = "<p>There is an error in server. Please try again later.</p>";
                        }
                    } else {
                        $this->output['validationMessage'] = "<p>Children description is invalid</p>";
                    }
                } else {
                    $this->output['validationMessage'] = "<p>Education mode is invalid</p>";
                }
            } else {
                $this->output['validationMessage'] = "<p>Home royality is invalid</p>";
            }
        } else {
            $this->output['validationMessage'] = validation_errors();
        }
        echo json_encode($this->output);
    }

}

?>
