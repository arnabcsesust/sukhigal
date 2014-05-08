<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Common
 *
 * @author hasib
 */
class Common {

    //put your code here
    public function __construct() {
        //parent::__construct();
    }

    public function GroceryCrudDisplayValue($crud, $table) {
        switch ($table) {
            case 'religion':
                $crud->display_as('EnglishName', 'Title In English')
                        ->display_as('BanglaName', 'Title In Bangla')
                        ->unset_edit_fields('Point')
                        ->required_fields('EnglishName');
                break;
            case 'gender':
                $crud->display_as('EnglishName', 'Title In English')
                        ->display_as('BanglaName', 'Title In Bangla')
                        ->required_fields('EnglishName');
                break;
            case 'category':
                $crud->display_as('EnglishName', 'Title In English')
                        ->display_as('BanglaName', 'Title In Bangla')
                        ->required_fields('EnglishName');
                break;
            case 'marital_status':
                $crud->display_as('EnglishTitle', 'Title In English')
                        ->display_as('BanglaTitle', 'Title In Bangla')
                        ->required_fields('EnglishTitle');
                break;
            case 'financial_status':
                $crud->display_as('EnglishTitle', 'Title In English')
                        ->display_as('BanglaTitle', 'Title In Bangla')
                        ->unset_edit_fields('Point')
                        ->required_fields('EnglishTitle');
                break;
            case 'educational_status':
                $crud->display_as('EnglishTitle', 'Title In English')
                        ->display_as('BanglaTitle', 'Title In Bangla')
                        ->unset_edit_fields('Point')
                        ->required_fields('EnglishTitle');
                break;
            case 'professional_status':
                $crud->display_as('EnglishTitle', 'Title In English')
                        ->display_as('BanglaTitle', 'Title In Bangla')
                        ->unset_edit_fields('Point')
                        ->required_fields('EnglishTitle');
                break;
            case 'area':
                $crud->display_as('EnglishName', 'Title In English')
                        ->display_as('BanglaName', 'Title In Bangla')
                        ->unset_edit_fields('Point')
                        ->required_fields('EnglishName');
                break;
            case 'sub_area':
                $crud->display_as('EnglishName', 'Title In English')
                        ->display_as('BanglaName', 'Title In Bangla')
                        ->display_as('AreaID', 'Area')
                        ->unset_edit_fields('Point')
                        ->required_fields('EnglishName', 'AreaID');
                break;
            case 'second_digit':
                $crud->display_as('GenderID', 'Gender')
                        ->display_as('MaritalStatusID', 'Marital Status')
                        ->display_as('CategoryID', 'Category')
                        ->unset_edit_fields('Point')
                        ->required_fields('GenderID', 'MaritalStatusID', 'CategoryID');
                break;
            case 'present_age':
                $crud->display_as('EnglishAge', 'Age In English')
                        ->display_as('BanglaAge', 'Age In Bangla')
                        ->required_fields('EnglishAge');
                break;
            case 'seventh_digit':
                $crud->display_as('GenderID', 'Gender')
                        ->display_as('PresentAgeID', 'Present Age')
                        ->unset_edit_fields('Point')
                        ->required_fields('GenderID', 'PresentAgeID');
                break;
            case 'body_color':
                $crud->display_as('EnglishTitle', 'Title In English')
                        ->display_as('BanglaTitle', 'Title In Bangla')
                        ->required_fields('EnglishTitle');
                break;
            case 'body_quality':
                $crud->display_as('Quality', 'Quality')
                        ->required_fields('Quality');
                break;
            case 'body_height':
                $crud->display_as('BodyQualityID', 'Quality')
                        ->display_as('GenderID', 'Gender')
                        ->display_as('Height', 'Height')
                        ->required_fields('BodyQualityID');
                break;
            case 'sixth_digit':
                $crud->display_as('BodyQualityID', 'Quality')
                        ->display_as('BodyColorID', 'Color')
                        ->unset_edit_fields('Point')
                        ->required_fields('BodyQualityID', 'BodyColorID');
                break;
            case 'user':
                $crud->display_as('MobileNo', 'Mobile No')
                        ->display_as('BatchNo', 'Batch No')
                        ->display_as('VoucherNo', 'Voucher No')
                        ->display_as('GroupNo', 'Group No')
                        ->unset_edit_fields('Password', 'Username', 'Pin', 'MobileNo', 'UserQuality', 'Status', 'ParentMobileNo')
                        ->required_fields('Status', 'BodyColorID');
                break;
            case 'user_previlige':
                $crud->display_as('UserID', 'Pin')
                        ->display_as('PreviligeAmount', 'Permission Amount');
                break;
        }
    }

    public function encryp_password($password) {
        return md5($password);
    }

}

?>
