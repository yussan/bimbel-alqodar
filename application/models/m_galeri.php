<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_galeri
 *
 * @author white
 */
class M_galeri extends CI_Model {

    function get_galeri_by_album($AlbumSlug) {
        $sql = "
            SELECT 
              galeri.judul AS judul_galeri,
              galeri.slug AS slug_galeri,
              galeri.waktu AS tanggal,
              galeri.foto AS foto,
              album.slug AS slug_album,
              album.id_album As id_album,
              album.judul AS judul_album,
              users.first_name AS penulis 
            FROM
              galeri 
              LEFT JOIN album USING (id_album) 
              LEFT JOIN users 
                ON users.id = galeri.id_penulis 
            WHERE album.slug = '$AlbumSlug'
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }
    
    function get_nama_album($slug) {
        $sql = $this->db->query("
            SELECT 
              judul 
            FROM
              album 
            WHERE slug = '$slug'           
        ");
        return $sql;
    }

}

?>
