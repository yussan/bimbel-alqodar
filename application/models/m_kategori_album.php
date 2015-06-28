<?php

/**
 * Description of m_kategori_artikel
 *
 * @author white
 */
class M_kategori_album extends CI_Model {

    function get($limit, $offset) {
        if ($limit <> "" && $offset <> "") {
            $limitOffset = "LIMIT $offset,$limit";
        } else {
            $limitOffset = "";
        }
        $q = $this->db->query("
            SELECT
              id_album AS ID,
              judul AS JUDUL,
              slug AS SLUG,
              cover AS COVER
            FROM album
            $limitOffset
        ");
        return $q;
    }

    function save($dataInsert) {
        $query = $this->db->insert('album', $dataInsert);
        return $query;
    }

    function get_by($id) {
        $sql = "
            SELECT
              id_album AS ID,
              judul AS JUDUL,
              slug AS SLUG,
              cover AS COVER
            FROM album
            WHERE id_album = ?
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
        $this->db->where('id_album', $id);
        $update = $this->db->update('album', $dataUpdate);
        return $update;
    }

    function update_cover($id, $dataUpdateCover) {
        $this->db->where('id_album', $id);
        $update = $this->db->update('album', $dataUpdateCover);
        return $update;
    }

    function cek_konstrain($id) {
        $q = $this->db->query("
            SELECT 
              id_album
            FROM
              galeri
            WHERE id_galeri = $id
        ");
        return $q;
    }

    function delete($id) {
        $this->db->where('id_album', $id);
        $delete = $this->db->delete('album');
        return $delete;
    }

}

?>
