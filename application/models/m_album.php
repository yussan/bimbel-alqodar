<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_album extends CI_Model {

    function get_album() {
        $sql = "SELECT * FROM album ORDER BY judul";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

}