<?php

/**
 * Description of m_kategori_artikel
 *
 * @author white
 */
class M_jenis_publikasi extends CI_Model {

    function get() {
        $q = $this->db->query("
            SELECT
              id_kat_publikasi AS ID,
              pub_kategori AS JENIS,
              pub_slug AS SLUG
            FROM kategori_publikasi
        ");
        if ($q->num_rows() > 0) {
            $result = $q->result_array();
            $q->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function save($dataInsert) {
        $query = $this->db->insert('kategori_publikasi', $dataInsert);
        return $query;
    }

    function get_by($id) {
        $sql = "
            SELECT
              id_kat_publikasi AS ID,
              pub_kategori AS JENIS,
              pub_slug AS SLUG
            FROM kategori_publikasi
            WHERE id_kat_publikasi = ?
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
        $this->db->where('id_kat_publikasi', $id);
        $update = $this->db->update('kategori_publikasi', $dataUpdate);
        return $update;
    }

    function cek_konstrain($id) {
        $q = $this->db->query("
            SELECT 
              *
            FROM
              publikasi
            WHERE id_kat_publikasi = $id
        ");
        return $q;
    }

    function delete($id) {
        $this->db->where('id_kat_publikasi', $id);
        $delete = $this->db->delete('kategori_publikasi');
        return $delete;
    }

}

?>
