<?php

/**
 * Description of m_media
 *
 * @author white
 */
class M_media extends CI_Model {

    function get_media() {
        $query = $this->db->query("
            SELECT 
              * 
            FROM
              media 
            ORDER BY id_media DESC 
        ");
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

}

?>
