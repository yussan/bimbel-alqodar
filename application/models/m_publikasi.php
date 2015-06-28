<?php

/**
 * Description of m_publikasi
 *
 * @author white
 */
class M_publikasi extends CI_Model {

    function get($limit, $offset) {
        if ($limit <> "" && $offset <> "") {
            $limitOffset = "LIMIT $offset,$limit";
        } else {
            $limitOffset = "";
        }
        $q = $this->db->query("
            SELECT 
              id_publikasi AS ID,
              judul AS JUDUL,
              abstraksi AS ABSTRAK,
              kata_kunci AS KUNCI 
            FROM
              publikasi
            ORDER BY tanggal_upload DESC
            $limitOffset
        ");
        return $q;
    }

    function save($dataInsert) {
        $query = $this->db->insert('publikasi', $dataInsert);
        return $query;
    }

    function get_detail_by($id) {
        $sql = "
            SELECT 
              id_publikasi AS ID,
              judul AS JUDUL,
              abstraksi AS ABSTRAK,
              kata_kunci AS KUNCI,
              tanggal_upload AS TANGGAL,
              FILE AS FILE,
              CONCAT_WS(' ', last_name, first_name) AS PENULIS,
              slug AS SLUG,
              cover AS COVER,
              pub_kategori AS JENIS
            FROM
              publikasi
              LEFT JOIN kategori_publikasi USING(id_kat_publikasi)
              LEFT JOIN users 
                ON id_penulis = id
            WHERE id_publikasi = ?
        ";
        $result = $this->db->query($sql, $id);
        return $result;
    }

    function get_by($id) {
        $sql = "
            SELECT 
              id_publikasi AS ID,
              judul AS JUDUL,
              abstraksi AS ABSTRAK,
              kata_kunci AS KUNCI,
              tanggal_upload AS TANGGAL,
              FILE AS FILE,
              CONCAT_WS(' ', last_name, first_name) AS PENULIS,
              cover as COVER
            FROM
              publikasi 
              LEFT JOIN users 
                ON id_penulis = id
            WHERE id_publikasi = ?
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
        $this->db->where('id_publikasi', $id);
        $update = $this->db->update('publikasi', $dataUpdate);
        return $update;
    }

    function update_cover($id, $dataUpdateCover) {
        $this->db->where('id_publikasi', $id);
        $update = $this->db->update('publikasi', $dataUpdateCover);
        return $update;
    }

    function delete($id) {
        $this->db->where('id_publikasi', $id);
        $delete = $this->db->delete('publikasi');
        return $delete;
    }

    function get_kat() {
        $result = $this->db->query("
            SELECT 
              id_kat_publikasi AS ID,
              pub_kategori AS NAMA 
            FROM
              kategori_publikasi 
            ORDER BY pub_kategori ASC
        ");
        return $result;
    }

}

?>
