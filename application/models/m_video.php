<?php

/**
 * Description of m_kategori_artikel
 *
 * @author white
 */
class M_video extends CI_Model {

    function get($limit, $offset) {
        if ($limit <> "" && $offset <> "") {
            $limitOffset = "LIMIT $offset,$limit";
        } else {
            $limitOffset = "";
        }
        $q = $this->db->query("
            SELECT 
                id_media AS ID,
                judul_media AS JUDUL,
                url_media As URL
            FROM media
            $limitOffset
        ");
        return $q;
    }

    function save($dataInsert) {
        $query = $this->db->insert('media', $dataInsert);
        return $query;
    }

    function get_by($id) {
        $sql = "
            SELECT
               id_media AS ID,
               judul_media AS JUDUL,
               url_media As URL
            FROM media
            WHERE id_media = ?
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
        $this->db->where('id_media', $id);
        $update = $this->db->update('media', $dataUpdate);
        return $update;
    }

    function delete($id) {
        $this->db->where('id_media', $id);
        $delete = $this->db->delete('media');
        return $delete;
    }

}

?>
