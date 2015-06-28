<?php

/**
 * Description of m_foto
 *
 * @author white
 */
class M_foto extends CI_Model {

    function get($limit, $offset) {
        if ($limit <> "" && $offset <> "") {
            $limitOffset = "LIMIT $offset,$limit";
        } else {
            $limitOffset = "";
        }
        $q = $this->db->query("
            SELECT 
              id_galeri AS ID,
              foto AS FOTO,              
              galeri.judul AS NAMA_FOTO,
              album.judul AS ALBUM,
              CONCAT_WS(' ', last_name, first_name) AS PENULIS,
              waktu AS TANGGAL,
              galeri.slug AS SLUG
            FROM
              galeri 
              LEFT JOIN album USING (id_album) 
              LEFT JOIN users 
                ON id_penulis = id
            $limitOffset
        ");
        return $q;
    }

    function save($dataInsert) {
        $query = $this->db->insert('galeri', $dataInsert);
        return $query;
    }

    function get_by($id) {
        $sql = "
            SELECT 
              id_galeri AS ID,
              foto AS FOTO,              
              galeri.judul AS NAMA_FOTO,
              album.judul AS ALBUM,
              CONCAT_WS(' ', last_name, first_name) AS PENULIS,
              waktu AS TANGGAL,
              galeri.slug AS SLUG
            FROM
              galeri 
              LEFT JOIN album USING (id_album) 
              LEFT JOIN users
                ON id_penulis = id
            WHERE id_galeri = ?
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
        $this->db->where('id_galeri', $id);
        $update = $this->db->update('galeri', $dataUpdate);
        return $update;
    }

    function delete($id) {
        $this->db->where('id_galeri', $id);
        $delete = $this->db->delete('galeri');
        return $delete;
    }

    function get_album() {
        $q = $this->db->query("
            SELECT 
              id_album AS ID,
              judul AS NAMA 
            FROM
              album
            ORDER BY judul ASC
        ");
        return $q;
    }

}

?>
