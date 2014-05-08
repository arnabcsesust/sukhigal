<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home_model
 *
 * @author hasib
 */
class Home_Model extends CI_Model {

    //put your code here
    public function isPinExists($pin) {
        $return = false;
        $sql = "SELECT MAX(PIN) PIN from user where PIN LIKE '%$pin%'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result();
            $return = $result[0]->PIN;
        } else {
            $return = false;
        }
        return $return;
    }

    public function getList($table_name, $where_clause = array()) {
        if (count($where_clause) > 0) {
            $query = $this->db->get_where($table_name, $where_clause);
        } else {
            $query = $this->db->get($table_name);
        }
        return $query->result();
    }

    public function getAgeListByGender($genderID) {
        $query = "SELECT A.SeventhDigitID, B.PresentAgeID, B.EnglishAge
                    FROM seventh_digit A 
                    INNER JOIN present_age B
                    ON A.PresentAgeID = B.PresentAgeID
                    WHERE A.GenderID = " . $genderID;

        return $this->db->query($query)->result();
    }

    public function getDigit($table_name, $where_clause) {
        $query = $this->db->get_where($table_name, $where_clause);
        $result = $query->result();
        return $result[0]->Point;
    }

    public function getSecondDigit($genderID, $maritalStatusID, $categoryID) {
        $query = $this->db->get_where('second_digit', array(
            'GenderID' => $genderID,
            'MaritalStatusID' => $maritalStatusID,
            'CategoryID' => $categoryID,
                )
        );
        $result = $query->result();
        return $result[0]->Point;
    }

    public function getSixthDigit($bodyColorID, $bodyHeightID) {
        $query = $this->db->get_where('sixth_digit', array(
            'BodyColorID' => $bodyColorID,
            'BodyQualityID' => $bodyHeightID,
                )
        );
        $result = $query->result();
        return $result[0]->Point;
    }

    public function getAgeID($seventhDigitID) {
        $query = $this->db->get_where('seventh_digit', array('SeventhDigitID' => $seventhDigitID));
        $result = $query->result();
        return $result[0]->PresentAgeID;
    }

    public function getBodyHieghtID($bodyQualityID, $genderID, $bodyHeightText) {
        $query = $this->db->get_where('body_height', array(
            'BodyQualityID' => $bodyQualityID,
            'GenderID' => $genderID,
            'Height' => $bodyHeightText
        ));
        $result = $query->result();
        return $result[0]->BodyHeightID;
    }

    public function signUp($userData, $userProfileData) {
        $this->db->trans_start();
        $this->db->insert('user', $userData);
        $userID = $this->db->insert_id();
        $userProfileData['UserID'] = $userID;
        $this->db->insert('user_profile', $userProfileData);
        $this->db->trans_complete();
    }

    public function generatePin($userData, $userProfileData) {
        $this->db->trans_start();
        $this->db->where('UserID', $this->session->userdata('userID'));
        $this->db->update('user', $userData);

        $this->db->where('UserID', $this->session->userdata('userID'));
        $this->db->update('user_profile', $userProfileData);
        $this->db->trans_complete();
    }

    public function validate($pin, $password) {
        $sql = "SELECT * FROM user where (Pin=? or MobileNo=?) and Password=? and Status=?";
        $query = $this->db->query($sql, array($pin, $pin, $password, 1));
        if ($query->num_rows == 1) {
            return $query->result();
        }
        return false;
    }

    public function getAdvanceSearchResult($searchParameter) {
        $query = "SELECT A.UserID,B.EnglishName,B.Email,B.ProfilePictureName,A.MobileNo,A.UserQuality
                    FROM user A
                    INNER JOIN user_profile B
                    ON A.UserID = B.UserID
                    WHERE A.Status = 1
                    AND A.UserID != " . $this->session->userdata('userID');
        //var_dump($searchParameter);
        $searchParameter = (object) $searchParameter;
        if (isset($searchParameter->PresentAgeID) && is_numeric($searchParameter->PresentAgeID))
            $query .= " And B.PresentAgeID = " . $searchParameter->PresentAgeID;

        if (isset($searchParameter->areaID) && is_numeric($searchParameter->areaID))
            $query .= " And B.AreaID = " . $searchParameter->areaID;

        if (isset($searchParameter->bodyColorID) && is_numeric($searchParameter->bodyColorID))
            $query .= " And B.BodyColorID = " . $searchParameter->bodyColorID;

        if (isset($searchParameter->bodyHeightID) && is_numeric($searchParameter->bodyHeightID))
            $query .= " And B.BodyHieghtID = " . $searchParameter->bodyHeightID;

        if (isset($searchParameter->categoryID) && is_numeric($searchParameter->categoryID))
            $query .= " And B.CategoryID = " . $searchParameter->categoryID;

        if (isset($searchParameter->educationalStatusID) && is_numeric($searchParameter->educationalStatusID))
            $query .= " And B.EducationalStatusID = " . $searchParameter->educationalStatusID;

        if (isset($searchParameter->financialStatusID) && is_numeric($searchParameter->financialStatusID))
            $query .= " And B.FinancialStatusID = " . $searchParameter->financialStatusID;

        if (isset($searchParameter->genderID) && is_numeric($searchParameter->genderID))
            $query .= " And B.GenderID = " . $searchParameter->genderID;

        if (isset($searchParameter->maritalStatusID) && is_numeric($searchParameter->maritalStatusID))
            $query .= " And B.MaritalStatusID = " . $searchParameter->maritalStatusID;

        if (isset($searchParameter->professionalStatusID) && is_numeric($searchParameter->professionalStatusID))
            $query .= " And B.ProfessionalStatusID = " . $searchParameter->professionalStatusID;

        if (isset($searchParameter->religionID) && is_numeric($searchParameter->religionID))
            $query .= " And B.ReligionID = " . $searchParameter->religionID;

        if (isset($searchParameter->subAreaID) && is_numeric($searchParameter->subAreaID))
            $query .= " And B.SubAreaID = " . $searchParameter->subAreaID;

        if ($this->db->query($query)->num_rows > 0) {
            return $this->db->query($query)->result();
        } else {
            return FALSE;
        }
    }

    public function getQuickSearchResult($pin) {
        $sql = "SELECT A.UserID,B.EnglishName,B.Email,B.ProfilePictureName,A.MobileNo,A.UserQuality
                    FROM user A
                    INNER JOIN user_profile B
                    ON A.UserID = B.UserID
                    WHERE A.Status = ?
                    AND A.PIN = ?
                    AND A.UserID != ?";
        $query = $this->db->query($sql, array(1, $pin, $this->session->userdata('userID')));
        if ($query->num_rows == 1) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function addPermission($permissionAmount) {
        $return = false;
        $data = array(
            'UserID' => $this->session->userdata('userID'),
            'PreviligeAmount' => $permissionAmount,
            'Status' => 0
        );
        $this->db->trans_start();
        $this->db->insert('user_previlige', $data);
        if ($this->db->affected_rows() > 0) {
            $return = true;
        }
        $this->db->trans_complete();

        return $return;
    }

    public function isEligibleForPermission() {
        $return = 1;
        $sqlIsPendingPermissionHave = "SELECT * FROM user_previlige WHERE UserID = ? AND Status = ?";
        $queryIsPendingPermissionHave = $this->db->query($sqlIsPendingPermissionHave, array($this->session->userdata('userID'), 0));
        if ($queryIsPendingPermissionHave->num_rows == 1) {
            return "You have already pending permissions.";
        } else {
            $sqlIsActivePermissionHave = "SELECT IFNULL(SUM(PreviligeAmount),0) approvedPermission 
                    FROM user_previlige WHERE UserID=? AND Status = ?";
            $queryIsActivePermissionHave = $this->db->query($sqlIsActivePermissionHave, array($this->session->userdata('userID'), 1));
            if ($queryIsActivePermissionHave->num_rows == 1) {
                $resultIsActivePermissionHave = $queryIsActivePermissionHave->result();
                $approvedPermission = $resultIsActivePermissionHave[0]->approvedPermission;
                $sqlUsedPermission = "SELECT IFNULL(COUNT(*),0) usedPermission 
                                    FROM user_interaction WHERE UserID = ?";
                $queryUsedPermission = $this->db->query($sqlUsedPermission, array($this->session->userdata('userID')));
                if ($queryUsedPermission->num_rows == 1) {
                    $resultUsedPermission = $queryUsedPermission->result();
                    $usedPermission = $resultUsedPermission[0]->usedPermission;
                    if ($approvedPermission > $usedPermission) {
                        return "You have already " . ($approvedPermission - $usedPermission) . " active permissions.";
                    }
                } else {
                    
                }
            } else {
                
            }
        }
        return $return;
    }

    public function getUserAllInformation($userID) {
        $sqlUserView = "SELECT A.username,A.Pin,A.MobileNo,A.BatchNo,A.GroupNo,
                        A.VoucherNo,A.UserQuality,A.ParentMobileNo,
                        B.EnglishName,B.Email,B.BOD,B.FathersName,B.FathersEducation,
                        B.FathersProfession,B.MothersName,B.MothersEducation,B.MothersProfession,B.GuardiansName,
                        B.RelationWithGuardian,B.GuardiansMobileNo,B.PresentAddress,B.PermenantAddress,
                        B.NameOfOrganization,B.OwnRemarks,B.ProfilePictureName,
                        R.EnglishName Religion, G.EnglishName Gender, M.EnglishTitle MaritalStatus,
                        C.EnglishName Category, F.EnglishTitle FinancialStatus,
                        E.EnglishTitle EducationalStatus, P.EnglishTitle ProfessionalStatus,
                        BH.Height Height, BC.EnglishTitle Color,
                        PA.EnglishAge Age, AR.EnglishName Area, SAR.EnglishName SubArea,
                        HR.HomeRoyalityID HomeRoyalityID, HR.Title HomeRoyality, 
                        ED.EducationModeID EducationModeID, ED.Title EducationMode, 
                        OT.OrganizationTypeID OrganizationTypeID, OT.Title OrganizationType,
                        CD.ChildrenDescriptionID ChildrenDescriptionID, CD.Title ChildrenDescription
                        from user A INNER JOIN user_profile B
                        ON A.UserID = B.UserID
                        INNER JOIN religion R ON B.ReligionID = R.ReligionID
                        INNER JOIN gender G ON B.GenderID = G.GenderID
                        INNER JOIN marital_status M ON B.MaritalStatusID = M.MaritalStatusID
                        INNER JOIN category C ON B.CategoryID = C.CategoryID
                        INNER JOIN financial_status F ON B.FinancialStatusID = F.FinancialStatusID
                        INNER JOIN educational_status E ON B.EducationalStatusID = E.EducationalStatusID
                        INNER JOIN professional_status P ON B.ProfessionalStatusID = P.ProfessionalStatusID
                        INNER JOIN body_height BH ON B.BodyHieghtID = BH.BodyHeightID
                        INNER JOIN body_color BC ON B.BodyColorID = BC.BodyColorID
                        INNER JOIN present_age PA ON B.PresentAgeID = PA.PresentAgeID
                        INNER JOIN area AR ON B.AreaID = AR.AreaID
                        INNER JOIN sub_area SAR ON B.SubAreaID = SAR.SubAreaID
                        LEFT JOIN home_royality HR ON B.HomeRoyalityID = HR.HomeRoyalityID
                        LEFT JOIN education_mode ED ON B.EducationModeID = ED.EducationModeID
                        LEFT JOIN organization_type OT ON B.OrganizationTypeID = OT.OrganizationTypeID
                        LEFT JOIN children_description CD ON B.ChildrenDescriptionID = CD.ChildrenDescriptionID
                        WHERE A.UserID = ?";
        $queryUserView = $this->db->query($sqlUserView, array($userID));
        $resultUserView = $queryUserView->result();
        return $resultUserView;
    }

    public function checkPermission($id) {
        $return = FALSE;
        $sql = "SELECT IFNULL(SUM(PreviligeAmount),0) approvedPermission 
                    FROM user_previlige WHERE UserID=? AND Status = ?";
        $query = $this->db->query($sql, array($this->session->userdata('userID'), 1));
        if ($query->num_rows == 1) {
            $result = $query->result();
            $approvedPermission = $result[0]->approvedPermission;
            $sqlUsedPermission = "SELECT IFNULL(COUNT(*),0) usedPermission 
                                    FROM user_interaction WHERE UserID = ?";
            $queryUsedPermission = $this->db->query($sqlUsedPermission, array($this->session->userdata('userID')));
            if ($queryUsedPermission->num_rows == 1) {
                $resultUsedPermission = $queryUsedPermission->result();
                $usedPermission = $resultUsedPermission[0]->usedPermission;
                if ($approvedPermission > $usedPermission) {
                    if ($this->isInteractionExists($id)) {
                        $return = $this->getUserAllInformation($id);
                    } else {
                        if ($this->addInteraction($id)) {
                            $return = $this->getUserAllInformation($id);
                        } else {
                            $return = FALSE;
                        }
                    }
                } else {
                    if ($this->isInteractionExists($id)) {
                        $return = $this->getUserAllInformation($id);
                    } else {
                        $return = FALSE;
                    }
                }
            } else {
                $return = FALSE;
            }
        } else {
            $return = FALSE;
        }

        return $return;
    }

    public function isInteractionExists($id) {
        $return = FALSE;
        $sqlExists = "SELECT * FROM user_interaction WHERE UserID = ? AND ViewedProfileID = ?";
        $queryExists = $this->db->query($sqlExists, array($this->session->userdata('userID'), $id));
        if ($queryExists->num_rows > 0) {
            $return = TRUE;
        } else {
            $return = FALSE;
        }

        return $return;
    }

    public function addInteraction($id) {
        $return = FALSE;
        try {
            $data = array(
                'UserID' => $this->session->userdata('userID'),
                'ViewedProfileID' => $id,
            );
            $this->db->trans_start();
            $this->db->insert('user_interaction', $data);
            if ($this->db->affected_rows() > 0) {
                $return = TRUE;
            } else {
                $return = FALSE;
            }
            $this->db->trans_complete();
        } catch (Exception $ex) {
            $return = FALSE;
        }

        return $return;
    }

    public function getProfilePic($userID) {
        $sql = "SELECT ProfilePictureName FROM user_profile WHERE UserID = ?";
        $query = $this->db->query($sql, array($userID));
        $result = $query->result();
        return $result;
//        if($result[0]->ProfilePictureName){
//            return $result;
//        }else{
//            return FALSE;
//        }
    }

    public function sendMessage($data) {
        $return = false;
        $this->db->trans_start();
        $this->db->insert('user_message', $data);
        if ($this->db->affected_rows() > 0) {
            $return = true;
        }
        $this->db->trans_complete();

        return $return;
    }

    public function isProposalExists($FromUserID, $ToUserID, $ProposalTypeID) {
        $return = FALSE;
        $query = $this->db->get_where('user_proposal', array(
            'FromUserID' => $FromUserID,
            'ToUserID' => $ToUserID,
            'ProposalTypeID' => $ProposalTypeID,
            'IsDenied' => 0,
        ));
        if ($query->num_rows() > 0) {
            $return = TRUE;
        }

        return $return;
    }

    public function sendProposal($FromUserID, $ToUserID, $ProposalTypeID, $Text) {
        $return = false;
        $this->db->trans_start();
        $this->db->insert('user_proposal', array(
            'FromUserID' => $FromUserID,
            'ToUserID' => $ToUserID,
            'ProposalTypeID' => $ProposalTypeID,
            'Text' => $Text,
            'IsAccepted' => 0,
            'IsDenied' => 0,
            'Date' => time(),
        ));
        if ($this->db->affected_rows() > 0) {
            $return = true;
        }
        $this->db->trans_complete();

        return $return;
    }

    public function getInboxUserList() {
        $sql = "SELECT DISTINCT A.UserID,A.EnglishName,A.ProfilePictureName 
            FROM user_profile A INNER JOIN user_message B
            ON A.userID = B.FromUserID WHERE B.ToUserID = ?";
        $query = $this->db->query($sql, array($this->session->userdata('userID')));
        //echo $this->session->userdata('userID');exit;
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function getSentMessageUserList() {
        $sql = "SELECT DISTINCT A.UserID,A.EnglishName,A.ProfilePictureName 
            FROM user_profile A INNER JOIN user_message B
            ON A.userID = B.ToUserID WHERE B.FromUserID = ?";
        $query = $this->db->query($sql, array($this->session->userdata('userID')));
        //echo $this->session->userdata('userID');exit;
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function getMessages($senderUserID, $receiverUserID, $identifier) {
        $sql = "SELECT * from user_message where FromUserID = ? and ToUserID = ?
                ORDER BY DATE DESC";
        $query = $this->db->query($sql, array($senderUserID, $receiverUserID));
        if ($query->num_rows > 0) {
            if ($identifier === 'i') {
                $this->db->trans_start();
                $this->db->where(array('FromUserID' => $senderUserID, 'ToUserID' => $receiverUserID, 'IsViewed' => 0));
                $this->db->update('user_message', array('IsViewed' => 1));
                $this->db->trans_complete();
                return $query->result();
            } else {
                return $query->result();
            }
        } else {
            return FALSE;
        }
    }

    public function getSentProposal() {
        $sql = "SELECT A.*,B.EnglishName,B.ProfilePictureName,B.UserID,C.Proposal 
                FROM user_proposal A INNER JOIN user_profile B
                ON A.ToUserID = B.UserID INNER JOIN proposal_type C
                ON A.ProposalTypeID = C.ProposalTypeID
                WHERE A.FromUserID = ?
                ORDER BY Date Desc";
        $query = $this->db->query($sql, array($this->session->userdata('userID')));
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function getReceiveProposal() {
        $sql = "SELECT A.*,B.EnglishName,B.ProfilePictureName,B.UserID,C.Proposal 
                FROM user_proposal A INNER JOIN user_profile B
                ON A.FromUserID = B.UserID INNER JOIN proposal_type C
                ON A.ProposalTypeID = C.ProposalTypeID
                WHERE A.ToUserID = ?
                AND A.IsAccepted = ?
                AND IsDenied = ?
                ORDER BY Date Desc";
        $query = $this->db->query($sql, array($this->session->userdata('userID'), 0, 0));
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function getAcceptedProposal() {
        $sql = "SELECT A.*,B.EnglishName,B.ProfilePictureName,B.UserID,C.Proposal 
                FROM user_proposal A INNER JOIN user_profile B
                ON A.ToUserID = B.UserID INNER JOIN proposal_type C
                ON A.ProposalTypeID = C.ProposalTypeID
                WHERE A.FromUserID = ?
                AND A.IsAccepted = ?
                ORDER BY Date Desc";
        $query = $this->db->query($sql, array($this->session->userdata('userID'), 1));
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function getDeniedProposal() {
        $sql = "SELECT A.*,B.EnglishName,B.ProfilePictureName,B.UserID,C.Proposal 
                FROM user_proposal A INNER JOIN user_profile B
                ON A.ToUserID = B.UserID INNER JOIN proposal_type C
                ON A.ProposalTypeID = C.ProposalTypeID
                WHERE A.FromUserID = ?
                AND IsDenied = ?
                ORDER BY Date Desc";
        $query = $this->db->query($sql, array($this->session->userdata('userID'), 1));
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function getPendingProposal() {
        $sql = "SELECT A.*,B.EnglishName,B.ProfilePictureName,B.UserID,C.Proposal 
                FROM user_proposal A INNER JOIN user_profile B
                ON A.ToUserID = B.UserID INNER JOIN proposal_type C
                ON A.ProposalTypeID = C.ProposalTypeID
                WHERE A.FromUserID = ?
                AND A.IsAccepted = ?
                AND IsDenied = ?
                ORDER BY Date Desc";
        $query = $this->db->query($sql, array($this->session->userdata('userID'), 0, 0));
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function updateProposalAccept($proposalID) {
        $this->db->trans_start();
        $this->db->where(array('UserProposalID' => $proposalID));
        $this->db->update('user_proposal', array('IsAccepted' => 1));
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            $sql = "SELECT A.*,B.EnglishName,B.ProfilePictureName,B.UserID,C.Proposal 
                FROM user_proposal A INNER JOIN user_profile B
                ON A.FromUserID = B.UserID INNER JOIN proposal_type C
                ON A.ProposalTypeID = C.ProposalTypeID
                WHERE A.UserProposalID = ?
                ";
            $query = $this->db->query($sql, array($proposalID));
            if ($query->num_rows > 0) {
                return $query->result();
            } else {
                return FALSE;
            }
        }
    }

    public function updateProposalDeny($proposalID) {
        $this->db->trans_start();
        $this->db->where(array('UserProposalID' => $proposalID));
        $this->db->update('user_proposal', array('IsDenied' => 1));
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function getFriend($proposalType) {
        $userID = $this->session->userdata('userID');
        $sql = "SELECT DISTINCT A.UserID, A.ProfilePictureName 
                FROM user_profile A INNER JOIN user_proposal B
                ON A.USERID = B.ToUserID OR A.USERID = B.FromUserID 
                WHERE (B.FromUserID = ? OR B.ToUserID = ?) 
                AND A.UserID <> ?
                AND B.IsAccepted = ? 
                AND B.ProposalTypeID = ?";
        $query = $this->db->query($sql, array($userID, $userID, $userID, 1, $proposalType));
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function isEmailExists($email) {
        $userID = $this->session->userdata('userID');
        $sql = "SELECT * FROM user_profile WHERE Email = ? and UserID != ?";
        $query = $this->db->query($sql, array($email, $userID));
        if ($query->num_rows > 0)
            return TRUE;

        return FALSE;
    }

    public function isMobileNoExists($mobileNo) {
        $userID = $this->session->userdata('userID');
        $sql = "SELECT * FROM user WHERE MobileNo = ? and UserID != ?";
        $query = $this->db->query($sql, array($mobileNo, $userID));
        if ($query->num_rows > 0)
            return TRUE;

        return FALSE;
    }

    public function isOrganizationTypeExists($organizationType) {
        $sql = "SELECT * FROM organization_type WHERE OrganizationTypeID= ?";
        $query = $this->db->query($sql, array($organizationType));
        if ($query->num_rows > 0)
            return TRUE;

        return FALSE;
    }
    
    public function isHomeRoyalityExists($homeRoyality) {
        $sql = "SELECT * FROM home_royality WHERE HomeRoyalityID = ?";
        $query = $this->db->query($sql, array($homeRoyality));
        if ($query->num_rows > 0)
            return TRUE;

        return FALSE;
    }
    
    public function isEducationModeExists($educationMode) {
        $sql = "SELECT * FROM education_mode WHERE EducationModeID = ?";
        $query = $this->db->query($sql, array($educationMode));
        if ($query->num_rows > 0)
            return TRUE;

        return FALSE;
    }
    
    public function isChildrenDescriptionExists($childrenDescription) {
        $sql = "SELECT * FROM children_description WHERE ChildrenDescriptionID = ?";
        $query = $this->db->query($sql, array($childrenDescription));
        if ($query->num_rows > 0)
            return TRUE;

        return FALSE;
    }

    public function updateUserProfile($userData = null, $userProfileData = null) {
        $userID = $this->session->userdata('userID');

        $this->db->trans_start();
        if ($userData && $userProfileData) {
            $this->db->where(array('UserID' => $userID));
            $this->db->update('user', $userData);

            $this->db->where(array('UserID' => $userID));
            $this->db->update('user_profile', $userProfileData);
        }else if($userData){
            $this->db->where(array('UserID' => $userID));
            $this->db->update('user', $userData);
        }else{
            $this->db->where(array('UserID' => $userID));
            $this->db->update('user_profile', $userProfileData);
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

?>
