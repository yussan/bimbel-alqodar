<?php

/**
 * Description of m_all_post
 *
 * @author white
 */
class M_all_post extends CI_Model {

    function get_all($limit, $offset) {
        if ($limit <> "" && $offset <> "") {
            $limitOffset = "LIMIT $offset,$limit";
        } else {
            $limitOffset = "";
        }
        $q = $this->db->query("
            SELECT 
              id_artikel AS ID,
              judul AS JUDUL,
              kategori AS KATEGORI,
              CONCAT_WS(' ', last_name, first_name) AS PENULIS,
              artikel.slug AS SLUG_ARTIKEL,
              kategori_artikel.slug AS SLUG_KATEGORI,
              waktu AS TANGGAL,
              konten AS ISI,
              gambar AS GAMBAR
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
	
	

}

?>
