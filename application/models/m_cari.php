<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_cari
 *
 * @author white
 */
class M_cari extends CI_Model {

    function get_data($cari) {
        $q = $this->db->query("
            SELECT 
              a.id_artikel AS id_artikel,
              a.judul AS judul,
              a.slug AS slug_artikel,
              a.waktu AS waktu,
              a.konten AS konten,
              a.gambar AS gambar,
              b.slug AS slug_kategori,
              b.kategori AS kategori,
              c.first_name AS penulis 
            FROM
              artikel a 
              LEFT JOIN kategori_artikel b USING (id_kategori) 
              LEFT JOIN users c 
                ON c.id = a.id_penulis 
            WHERE a.judul LIKE '%$cari%' 
              OR b.kategori LIKE '%$cari%' 
              OR c.first_name LIKE '%$cari%' 
            ORDER BY a.id_artikel           
        ");
        return $q;
    }

}

?>
