<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_home extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_slider() {
        $query = $this->db->query("
            SELECT *
            FROM
              slider
            LIMIT 0, 3
        ");
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
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

    function get_side_post() {
        $query = $this->db->query("
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
            ORDER BY id_artikel DESC
            LIMIT 0, 5
        ");
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function get_home_artikel($limit, $offset) {
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
            ORDER BY id_artikel DESC
            $limitOffset
        ");
        return $q;
    }

    function get_home_berita() {
        $query = $this->db->query("
            SELECT 
              id_artikel AS ID,
              judul AS JUDUL,
              waktu AS TANGGAL,
              artikel.slug AS SLUG_ARTIKEL,
              kategori_artikel.slug AS SLUG_KATEGORI,
              artikel.gambar AS GAMBAR
            FROM
              artikel
            LEFT JOIN kategori_artikel USING(id_kategori)
            WHERE kategori_artikel.id_kategori = '2'
            ORDER BY id_artikel DESC
        ");
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function get_home_events() {
        $query = $this->db->query("
            SELECT 
              id_artikel AS ID,
              judul AS JUDUL,
              waktu AS TANGGAL,
              artikel.slug AS SLUG_ARTIKEL,
              kategori_artikel.slug AS SLUG_KATEGORI,
              artikel.gambar AS GAMBAR
            FROM
              artikel
            LEFT JOIN kategori_artikel USING(id_kategori)
            WHERE kategori_artikel.id_kategori = '3'
            ORDER BY id_artikel DESC
        ");
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function get_home_berita_arsip() {
        $query = $this->db->query("
            SELECT 
              id_artikel AS ID,
              kategori_artikel.slug AS slug
            FROM
              artikel
            LEFT JOIN kategori_artikel USING(id_kategori)
            WHERE artikel.id_kategori = '2'
            ORDER BY id_artikel DESC
        ");
        return $query;
    }

    function get_home_events_arsip() {
        $query = $this->db->query("
            SELECT 
              id_artikel AS ID,
              kategori_artikel.slug AS slug
            FROM
              artikel
            LEFT JOIN kategori_artikel USING(id_kategori)
            WHERE artikel.id_kategori = '3'
            ORDER BY id_artikel DESC
        ");
        return $query;
    }

    function about_us() {
        $query = $this->db->query("
            SELECT 
              id_halaman AS ID,
              judul AS JUDUL,
              konten AS ISI 
            FROM
              halaman 
            WHERE id_halaman = '1'
        ");
        return $query;
    }

    function sosmed_profil() {
        $query = $this->db->query("
            SELECT 
              url_link,
              gambar_link
            FROM
              link 
              JOIN setting_umum USING (settingKey) 
            WHERE settingNama = 'social_media' 
              AND settingKey IN ('FB', 'TW')
        ");
        return $query;
    }

    function get_link_footer() {
        $query = $this->db->query("
            SELECT 
                *
            FROM
              link
            WHERE settingKey = 'IK'
        ");
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function get_profil() {
        $query = $this->db->query("
            SELECT 
                *
            FROM
              profil 
        ");
        return $query;
    }

    function get_menu_pub() {
        $sql = 'SELECT * FROM kategori_publikasi ORDER BY pub_kategori ASC';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }
	
	function get_menu_program() {
        $sql = 'SELECT * FROM kategori_program ORDER BY kategori ASC';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function get_menu_artikel() {
        $sql = 'SELECT * FROM kategori_artikel ORDER BY kategori ASC';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function get_halaman() {
        $sql = 'SELECT * FROM halaman where id_halaman <> 1 ORDER BY id_halaman ASC';
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