<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * users_model short summary.
 *
 * users_model description.
 *
 * @version 1.0
 * @author hasib
 */
class users_model extends CI_Model {

    function validate($user_name, $password) {
        $this->db->where('user_name', $user_name);
        $this->db->where('pass_word', $password);
        $query = $this->db->get('membership');

        if ($query->num_rows == 1) {
            return true;
        }
    }

    public function approve($where_condition, $userID) {
        $this->db->where('UserID', $userID);
        $this->db->update('user', $where_condition);
    }
    
    public function approvePermission($where_cond, $id){
        $this->db->where('UserPreviligeID',$id);
        $this->db->update('user_previlige', $where_cond);
    }

}
