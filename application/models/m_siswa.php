<?php

/**
 * Description of siswa
 *
 * @author white
 */
class M_siswa extends CI_Model {

    function get($limit, $offset) {
        if ($limit <> "" && $offset <> "") {
            $limitOffset = "LIMIT $offset,$limit";
        } else {
            $limitOffset = "";
        }
        $q = $this->db->query("
            SELECT  
				nama_lengkap AS NAMA, 
				nis AS NIS,
				kelas AS KELAS, 
				alamat AS ALAMAT, 
				email AS EMAIL, 
				telp AS TELP, 
				kelamin AS KELAMIN 
			FROM 
				siswa
				INNER JOIN kategori_siswa USING (id_kategori)
				$limitOffset
        ");
        return $q;
    }

    function save($dataInsert) {
        $query = $this->db->insert('siswa', $dataInsert);
        return $query;
    }

    function get_by($id) {
        $sql = "
            SELECT  
				nama_lengkap AS NAMA, 
				nis AS NIS,
				kelas AS KELAS, 
				alamat AS ALAMAT, 
				email AS EMAIL, 
				telp AS TELP, 
				kelamin AS KELAMIN,
				id AS ID	
			FROM 
				siswa
				LEFT JOIN kategori_siswa USING (id_kategori) 
			WHERE nis = ?
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
	
	function get_by_name($params) {
        $sql = "
            SELECT  
				nama_lengkap AS NAMA, 
				nis AS NIS,
				kelas AS KELAS, 
				alamat AS ALAMAT, 
				email AS EMAIL, 
				telp AS TELP, 
				kelamin AS KELAMIN,
				id AS ID	
			FROM 
				siswa
			WHERE nis = ? AND password=?
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }    
	
	function cek_login($params) {
        $sql = "
            SELECT  
				nis,password
			FROM 
				siswa
				
			WHERE nis = ? AND password=?
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function update($id, $dataUpdate) {
        $this->db->where('id', $id);
        $update = $this->db->update('siswa', $dataUpdate);
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
        $this->db->where('nis', $id);
        $delete = $this->db->delete('siswa');
        return $delete;
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
        $result=$q->result_array();
		return $result;
		}

}

?>
