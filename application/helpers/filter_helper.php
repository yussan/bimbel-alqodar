<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of filter_helper
 *
 * @author teguholica
 */
function checkFilter($post, $ses) {
    $ci = & get_instance();
    if ($ci->session->userdata("filterPagination") != $ci->session->userdata("filterCurrentPagination")) {
        $ci->session->unset_userdata($ses);
    }else{
        if ($ci->input->post($post) <> "") {
            $data = $ci->input->post($post);
            if($data == "all" || $data == "none" || $data == "Kosong"){
                $data = "";
            }
            $ci->session->set_userdata($ses, $data);
        }
    }
}

function setFilter($ses, $val) {
    $ci = & get_instance();
    $ci->session->set_userdata($ses, $val);
}

function getFilter($ses) {
    $ci = & get_instance();
    return $ci->session->userdata($ses);
}

function setFilterClass($class) {
    $ci = & get_instance();
    $ci->session->set_userdata("filterPagination", strtolower($class));
}

function setFilterCurrentClass($class) {
    $ci = & get_instance();
    $ci->session->set_userdata("filterCurrentPagination", strtolower($class));
}

function isFilterNotNull($ses) {
    $ci = & get_instance();
    if ($ci->session->userdata($ses) <> "") {
        return true;
    } else {
        return false;
    }
}

?>
