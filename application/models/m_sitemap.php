<?php

/**
 * Description of m_sitemap
 *
 * @author white
 */
class M_sitemap extends CI_Model {

    function get_kategori() {
        $q = $this->db->query("
            SELECT 
              id_kategori,
              slug,
              kategori 
            FROM
              kategori_artikel
            ORDER BY kategori ASC
        ");
        return $q;
    }
    
    function get_halaman() {
        $q = $this->db->query("
            SELECT
              id_halaman,
              judul,
              slug
            FROM halaman
            ORDER BY judul ASC
        ");
        return $q;
    }
    
    function get_kategori_artikel() {
        $q = $this->db->query("
            SELECT
              id_kategori,
              kategori
            FROM kategori_artikel            
        ");
        return $q;
    }
    
    function get_artikel($id) {
        $q = $this->db->query("
            SELECT 
              id_artikel,
              kategori_artikel.slug AS slug_kategori,
              id_penulis,
              judul,
              artikel.slug AS slug_artikel,
              waktu,
              konten,
              gambar 
            FROM
              artikel 
              JOIN kategori_artikel USING (id_kategori) 
              JOIN users 
                ON artikel.id_penulis = users.id
            WHERE kategori_artikel.id_kategori = '$id'
        ");
        return $q;
    }

}

?>
