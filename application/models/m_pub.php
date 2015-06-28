<?php

/**
 * Description of m_pub
 *
 * @author white
 */
class M_pub extends CI_Model {

    function get_publikasi_by_slug($params) {
        $sql = '
            SELECT 
              pub_slug AS SLUG_KATEGORI,
              pub_kategori AS KATEGORI,
              users.first_name AS PENULIS,
              judul AS JUDUL,
              slug AS SLUG_PUBLIKASI,
              tanggal_upload AS TANGGAL,
              abstraksi AS ABSTRAK,
              cover AS COVER
            FROM
              kategori_publikasi 
              INNER JOIN publikasi USING(id_kat_publikasi)
              INNER JOIN users 
                ON users.id = publikasi.id_penulis 
            WHERE pub_slug = ?            
        ';
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function get_detail_publikasi($params) {
        $sql = '
            SELECT 
              pub_slug AS SLUG_KATEGORI,
              pub_kategori AS KATEGORI,
              users.first_name AS PENULIS,
              judul AS JUDUL,
              slug AS SLUG_PUBLIKASI,
              tanggal_upload AS TANGGAL,
              abstraksi AS ABSTRAK,
              cover AS COVER,
              file AS FILE
            FROM
              kategori_publikasi 
              LEFT JOIN publikasi USING(id_kat_publikasi)
              LEFT JOIN users 
                ON users.id = publikasi.id_penulis 
            WHERE pub_slug = ? AND slug = ?            
        ';
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

}

?>
