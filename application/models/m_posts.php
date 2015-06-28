<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_posts extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_post_by($params){
        $sql = '
            SELECT 
              artikel.id_artikel,
              artikel.judul,
              artikel.waktu,
              artikel.gambar,
              artikel.konten AS konten,
              users.first_name,
              users.last_name,
              kategori_artikel.slug AS slug_kategori,
              kategori_artikel.kategori,
              artikel.slug AS slug_artikel 
            FROM
              artikel 
              LEFT JOIN users 
                ON users.id = artikel.id_penulis 
              LEFT JOIN kategori_artikel 
                ON kategori_artikel.id_kategori = artikel.id_kategori 
            WHERE kategori_artikel.slug = ? 
              AND artikel.slug = ?            
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

    function get_categories(){
        $sql = 'SELECT * FROM kategori_artikel ORDER BY kategori';
        
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }
}