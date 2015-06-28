<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_categories extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_posts_by_category($cat, $limit, $offset) {
        if ($limit <> "" && $offset <> "") {
            $limitOffset = "LIMIT $offset,$limit";
        } else {
            $limitOffset = "";
        }
        if ($cat <> "") {
            $categori = "WHERE kategori_artikel.slug = '$cat'";
        } else {
            $categori = "";
        }
        $query = $this->db->query("
            SELECT kategori_artikel.slug as slug_kategori, kategori_artikel.kategori,
            users.first_name as penulis,
            artikel.id_artikel, artikel.judul, artikel.slug as slug_artikel, artikel.waktu, artikel.konten
            FROM kategori_artikel 
            LEFT JOIN artikel ON artikel.id_kategori = kategori_artikel.id_kategori
            LEFT JOIN users ON users.id = artikel.id_penulis
            $categori
            $limitOffset
        ");
        return $query;
    }

    function get_categories() {
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