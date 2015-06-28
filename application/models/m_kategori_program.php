<?php

/**
 * Description of m_kategori_program
 *
 * @author white
 */
class M_kategori_program extends CI_Model {

    function get($limit, $offset) {
        if ($limit <> "" && $offset <> "") {
            $limitOffset = "LIMIT $offset,$limit";
        } else {
            $limitOffset = "";
        }
        $q = $this->db->query("
            SELECT
              id_kategori AS ID,
              kategori AS KATEGORI,
              slug AS SLUG
            FROM kategori_program
            $limitOffset
        ");
        return $q;
    }

    function save($dataInsert) {
        $query = $this->db->insert('kategori_program', $dataInsert);
        return $query;
    }

    function get_by($id) {
        $sql = "
            SELECT
              id_kategori AS ID,
              kategori AS KATEGORI,
              slug AS SLUG
            FROM kategori_program
            WHERE id_kategori = ?
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
        $this->db->where('id_kategori', $id);
        $update = $this->db->update('kategori_program', $dataUpdate);
        return $update;
    }

    function cek_konstrain($id) {
        $q = $this->db->query("
            SELECT 
              id_kategori 
            FROM
              program 
            WHERE id_program = $id
        ");
        return $q;
    }

    function delete($id) {
        $this->db->where('id_kategori', $id);
        $delete = $this->db->delete('kategori_program');
        return $delete;
    }

}

?>
