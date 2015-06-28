<?php

/**
 * Description of m_link
 *
 * @author white
 */
class M_link extends CI_Model {

    function get($limit, $offset) {
        if ($limit <> "" && $offset <> "") {
            $limitOffset = "LIMIT $offset,$limit";
        } else {
            $limitOffset = "";
        }
        $q = $this->db->query("
            SELECT 
              id_link AS ID,
              nama_link AS NAMA,
              url_link AS URL,
              gambar_link AS GAMBAR 
            FROM
              link
            WHERE settingKey = 'IK'
            $limitOffset
        ");
        return $q;
    }

    function save($dataInsert) {
        $query = $this->db->insert('link', $dataInsert);
        return $query;
    }

    function get_by($id) {
        $sql = "
            SELECT 
              id_link AS ID,
              nama_link AS NAMA,
              url_link AS URL,
              gambar_link AS GAMBAR 
            FROM
              link
            WHERE id_link = ?
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
        $this->db->where('id_link', $id);
        $update = $this->db->update('link', $dataUpdate);
        return $update;
    }

    function delete($id) {
        $this->db->where('id_link', $id);
        $delete = $this->db->delete('link');
        return $delete;
    }

}

?>
