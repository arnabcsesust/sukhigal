<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function isAuthenticate() {
    $entitas = & get_instance();
    if ($entitas->session->userdata('is_logged_in')) {
        return true;
    } else {
        return false;
    }
}

function frontAuthenticate() {
    $entitas = & get_instance();
    if ($entitas->session->userdata('frontIsLoggedIn')) {
        return true;
    } else {
        return false;
    }
}

function pinGenerationAuthenticate() {
    $entitas = & get_instance();
    if ($entitas->session->userdata('userID')) {
        return true;
    } else {
        return false;
    }
}