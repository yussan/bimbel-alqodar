<?php

/**
 * Description of m_artikel
 *
 * @author white
 */
class M_artikel extends CI_Model {

    function get($limit, $offset) {
        if ($limit <> "" && $offset <> "") {
            $limitOffset = "LIMIT $offset,$limit";
        } else {
            $limitOffset = "";
        }
        $q = $this->db->query("
            SELECT 
              id_artikel AS ID,
              judul AS JUDUL,
              CONCAT_WS(' ', last_name, first_name) AS PENULIS,
              waktu AS TANGGAL 
            FROM
              artikel 
              INNER JOIN kategori_artikel USING (id_kategori) 
              INNER JOIN users 
                ON id_penulis = id
            ORDER BY waktu DESC
            $limitOffset
        ");
        return $q;
    }

    function save($dataInsert) {
        $query = $this->db->insert('artikel', $dataInsert);
        return $query;
    }

    function get_by($id) {
        $sql = "
            SELECT 
              id_artikel AS ID,
              judul AS JUDUL,
              CONCAT_WS(' ', last_name, first_name) AS PENULIS,
              waktu AS TANGGAL,
              konten AS ISI,
              gambar AS GAMBAR
            FROM
              artikel 
              INNER JOIN kategori_artikel USING (id_kategori) 
              INNER JOIN users 
                ON id_penulis = id
            WHERE id_artikel = ?
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
              id_artikel AS ID,
              judul AS JUDUL,
              kategori AS KATEGORI,
              CONCAT_WS(' ', last_name, first_name) AS PENULIS,
              artikel.slug AS SLUG,
              waktu AS TANGGAL,
              konten AS ISI,
              gambar As GAMBAR
            FROM
              artikel 
              INNER JOIN kategori_artikel USING (id_kategori) 
              INNER JOIN users 
                ON id_penulis = id
            WHERE id_artikel = ?
        ";
        $result = $this->db->query($sql, $id);
        return $result;
    }

    function update($id, $dataUpdate) {
        $this->db->where('id_artikel', $id);
        $update = $this->db->update('artikel', $dataUpdate);
        return $update;
    }

    function delete($id) {
        $this->db->where('id_artikel', $id);
        $delete = $this->db->delete('artikel');
        return $delete;
    }

    function get_kategori() {
        $q = $this->db->query("
            SELECT 
              id_kategori AS ID,
              kategori AS NAMA 
            FROM
              kategori_artikel 
            ORDER BY kategori ASC
        ");
        return $q;
    }

}

?>
