<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pages extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_page_by($params){
        $sql = 'SELECT halaman.*, 
        users.first_name, users.last_name
        FROM halaman 
        LEFT JOIN users ON users.id = halaman.id_penulis
        WHERE halaman.slug = ?';
        
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