<?php

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
                                                            if ($this->form_validation->set_rules('password', 'Password', 'required|xss_clean|min_length[6]|matches[rep-password]')->run()) {
                                                                if ($this->form_validation->set_rules('rep-password', 'Repeat Password', 'required|xss_clean')->run()) {
                                                                    if ($this->form_validation->set_rules('mobNo', 'Mobile No', 'required|exact_length[11]|xss_clean')->run()) {
                                                                        if ($this->form_validation->set_rules('name', 'Name', 'required|min_length[6]|xss_clean')->run()) {
                                                                            if ($this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean')->run()) {
                                                                                if ($this->form_validation->set_rules('fathersName', 'fathersName', 'required|xss_clean')->run()) {
                                                                                    if ($this->form_validation->set_rules('mothersName', 'mothersName', 'required|xss_clean')->run()) {
                                                                                        if ($this->form_validation->set_rules('guardiansName', 'guardiansName', 'required|xss_clean')->run()) {
                                                                                            if ($this->form_validation->set_rules('guardianRel', 'guardianRel', 'required|xss_clean')->run()) {
                                                                                                if ($this->form_validation->set_rules('guardiansMobileNo', 'Guardian Mobile No', 'required|exact_length[11]|xss_clean')->run()) {
                                                                                                    if ($this->form_validation->set_rules('presentAddress', 'presentAddress', 'required|xss_clean')->run()) {
                                                                                                        if ($this->form_validation->set_rules('permenantAddress', 'permenantAddress', 'required|xss_clean')->run()) {
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
                                                                                                            $password = $this->common->encryp_password($this->input->post('password', true));
                                                                                                            $mobNo = $this->input->post('mobNo', true);
                                                                                                            $name = $this->input->post('name', true);
                                                                                                            $email = $this->input->post('email', true);
                                                                                                            $bodyHeightText = $this->input->post('bodyHieghtText', true);
                                                                                                            
                                                                                                            $fathersName = $this->input->post('fathersName', true);
                                                                                                            $mothersName = $this->input->post('mothersName', true);
                                                                                                            $guardiansName = $this->input->post('guardiansName', true);
                                                                                                            $guardianRel = $this->input->post('guardianRel', true);
                                                                                                            $guardiansMobileNo = $this->input->post('guardiansMobileNo', true);
                                                                                                            $presentAddress = $this->input->post('presentAddress', true);
                                                                                                            $permenantAddress = $this->input->post('permenantAddress', true);

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
                                                                                                                'Username' => substr($name, -4) . substr($mobNo, -4),
                                                                                                                'Pin' => $pin,
                                                                                                                'Password' => $password,
                                                                                                                'MobileNo' => $mobNo,
                                                                                                                'UserQuality' => $userQuality,
                                                                                                                'Status' => 0
                                                                                                            );

                                                                                                            $userProfileData = array(
                                                                                                                'EnglishName' => $name,
                                                                                                                'Email' => $email,
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
                                                                                                                'UserID' => 1, //have to check later
                                                                                                                'FathersName' => $fathersName,
                                                                                                                'MothersName' => $mothersName,
                                                                                                                'GuardiansName' => $guardiansName,
                                                                                                                'RelationWithGuardian' => $guardianRel,
                                                                                                                'GuardiansMobileNo' => $guardiansMobileNo,
                                                                                                                'PresentAddress' => $presentAddress,
                                                                                                                'PermenantAddress' => $permenantAddress
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
?>
