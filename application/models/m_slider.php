<?php

/**
 * Description of m_foto
 *
 * @author white
 */
class M_slider extends CI_Model {

    function get($limit, $offset) {
        if ($limit <> "" && $offset <> "") {
            $limitOffset = "LIMIT $offset,$limit";
        } else {
            $limitOffset = "";
        }
        $q = $this->db->query("
            SELECT 
              id_slider AS id,
              judul,              
              ket,
              link,
              img
            FROM
              slider
            $limitOffset
        ");
        return $q;
    }

    function save($dataInsert) {
        $query = $this->db->insert('slider', $dataInsert);
        return $query;
    }

    function get_by($id) {
        $sql = "
            SELECT 
              *
            FROM
              slider 
            WHERE id_slider = ?
        ";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function update($id, $dataUpdate) {
        $this->db->where('id_slider', $id);
        $update = $this->db->update('slider', $dataUpdate);
        return $update;
    }

    function delete($id) {
        $this->db->where('id_slider', $id);
        $delete = $this->db->delete('slider');
        return $delete;
    }

}

?>
