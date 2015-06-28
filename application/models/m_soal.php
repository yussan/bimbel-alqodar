<?php

/**
 * Description of soal
 *
 * @author white
 */
class M_soal extends CI_Model {

    function get($limit, $offset) {
        if ($limit <> "" && $offset <> "") {
            $limitOffset = "LIMIT $offset,$limit";
        } else {
            $limitOffset = "";
        }
        $q = $this->db->query("
            SELECT  
				a.*,b.matapelajaran,c.nama_lengkap
			FROM 
				soal a
			LEFT JOIN 
				matapelajaran b ON a.id_matapelajaran=b.id_matapelajaran
			LEFT JOIN guru c ON a.id_guru=c.id				
				$limitOffset
        ");
        return $q;
    }

    function save($dataInsert) {
        $query = $this->db->insert('soal', $dataInsert);
        return $query;
    }

    function get_by($id) {
        $sql = "
            SELECT  
				a.*,c.*,d.*	
			FROM 
				soal a 
				LEFT JOIN kelas b ON a.id_kelas=b.id_kelas
                                LEFT JOIN matapelajaran c ON a.id_matapelajaran=c.id_matapelajaran
                                LEFT JOIN guru d ON a.id_guru=d.id
			WHERE id_soal = ?
        ";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function update($id, $dataUpdate) {
        $this->db->where('id_soal', $id);
        $update = $this->db->update('soal', $dataUpdate);
        return $update;
    }

    function cek_konstrain($id) {
        $q = $this->db->query("
            SELECT 
              id_kategori 
            FROM
              program 
            WHERE id_program = $id
        ");
        return $q;
    }

    function delete($id) {
        $this->db->where('id_soal', $id);
        $delete = $this->db->delete('soal');
        return $delete;
    }

    function get_kelas() {
        $q = $this->db->query("
            SELECT 
              id_kelas AS ID,
              nama_kelas AS NAMA 
            FROM
              kelas
            ORDER BY id_kelas ASC
        ");
        $result = $q->result_array();
        return $result;
    }

    function get_matapelajaran() {
        $q = $this->db->query("
            SELECT 
              id_matapelajaran AS id_mapel,
              matapelajaran AS nama_mapel 
            FROM
              matapelajaran
            ORDER BY id_matapelajaran ASC
        ");
        $result = $q->result_array();
        return $result;
    }

    function get_guru() {
        $q = $this->db->query("
            SELECT 
              id AS id_guru,
              nama_lengkap AS nama_lengkap 
            FROM
              guru
            ORDER BY nama_lengkap ASC
        ");
        $result = $q->result_array();
        return $result;
    }

    function get_kategori() {
        $q = $this->db->query("
            SELECT 
              id_kategori,
              kategori 
            FROM
              kategori_siswa
            ORDER BY kategori ASC
        ");
        $result = $q->result_array();
        return $result;
    }

}
