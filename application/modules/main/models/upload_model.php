<?php

class Upload_model extends CI_Model {

    var $original_path;
    var $resized_path;
    var $thumbs_path;
    var $x_small_path;

    //initialize the path where you want to save your images
    function __construct() {
        parent::__construct();
        //return the full path of the directory
        //make sure these directories have read and write permessions
        $this->original_path = realpath(APPPATH . '../uploads/original');
        $this->resized_path = realpath(APPPATH . '../uploads/resized');
        $this->thumbs_path = realpath(APPPATH . '../uploads/thumbs');
        $this->x_small_path = realpath(APPPATH . '../uploads/x-small');
    }

    function do_upload() {
        $return = 0;
        $this->load->library('image_lib');
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
            'max_size' => 2048, //2MB max
            'upload_path' => $this->original_path //upload directory
        );

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $return = array('error' => $this->upload->display_errors());
        } else {
            $image_data = $this->upload->data();
            $profilePicUpdateData = array(
                'ProfilePictureName' => $image_data['file_name'],
            );
            $this->db->trans_start();
            $this->db->where('UserID', $this->session->userdata('userID'));
            $this->db->update('user_profile', $profilePicUpdateData);
            if ($this->db->affected_rows() > 0) {
                $config = array(
                    'source_image' => $image_data['full_path'], //path to the uploaded image
                    'new_image' => $this->resized_path, //path to
                    'maintain_ratio' => false,
                    'width' => 450,
                    'height' => 562
                );
                $this->image_lib->initialize($config);
                $this->image_lib->resize();

                $config = array(
                    'source_image' => $image_data['full_path'],
                    'new_image' => $this->thumbs_path,
                    'maintain_ratio' => false,
                    'width' => 600,
                    'height' => 900
                );
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                
                $config = array(
                    'source_image' => $image_data['full_path'],
                    'new_image' => $this->x_small_path,
                    'maintain_ratio' => false,
                    'width' => 40,
                    'height' => 40
                );
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                
                $return = 1;
            } else {
                $return = "Database Error Occured";
                unlink($image_data['full_path']);
            }
            $this->db->trans_complete();
        }
        return $return;
    }

}