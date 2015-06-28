<?php

/**
 * Description of m_halaman
 *
 * @author white
 */
class M_halaman extends CI_Model {

    function get() {
        $q = $this->db->query("
            SELECT 
              id_halaman AS ID,
              judul AS JUDUL,
              CONCAT_WS(' ', last_name, first_name) AS PENULIS,
              slug AS SLUG,
              waktu AS TANGGAL 
            FROM
              halaman 
              INNER JOIN users 
                ON id_penulis = id
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
        $query = $this->db->insert('halaman', $dataInsert);
        return $query;
    }

    function get_by($id) {
        $sql = "
            SELECT 
              id_halaman AS ID,
              judul AS JUDUL,
              konten AS ISI
            FROM
              halaman 
              INNER JOIN users 
                ON id_penulis = id
            WHERE id_halaman = ?
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

    function get_detail_by($id) {
        $sql = "
            SELECT 
                id_halaman AS ID,
                judul AS JUDUL,
                CONCAT_WS(' ', last_name, first_name) AS PENULIS,
                slug AS SLUG,
                waktu AS TANGGAL,
                konten AS ISI
            FROM
              halaman 
              INNER JOIN users 
                ON id_penulis = id
            WHERE id_halaman = ?
        ";
        $result = $this->db->query($sql, $id);
        return $result;
    }

    function update($id, $dataUpdate) {
        $this->db->where('id_halaman', $id);
        $update = $this->db->update('halaman', $dataUpdate);
        return $update;
    }

    function delete($id) {
        $this->db->where('id_halaman', $id);
        $delete = $this->db->delete('halaman');
        return $delete;
    }

}

?>
