<?php

/**
 * Description of siswa
 *
 * @author white
 */
class M_guru extends CI_Model {

    function get($limit, $offset) {
        if ($limit <> "" && $offset <> "") {
            $limitOffset = "LIMIT $offset,$limit";
        } else {
            $limitOffset = "";
        }
        $q = $this->db->query("
            SELECT  
				nama_lengkap AS NAMA, 
				nip AS NIP,
				alamat AS ALAMAT, 
				matapelajaran AS MATAPELAJARAN,
				email AS EMAIL, 
				telp AS TELP, 
				kelamin AS KELAMIN 
			FROM 
				guru
				LEFT JOIN matapelajaran USING (id_matapelajaran)
				$limitOffset
        ");
        return $q;
    }
    function get_guru() {
        $q = $this->db->query("
            SELECT  
				nama_lengkap AS NAMA, 
				nip AS NIP,
				alamat AS ALAMAT, 
				email AS EMAIL, 
				telp AS TELP, 
				kelamin AS KELAMIN 
			FROM 
				guru

        ");
        return $q;
    }
    function save($dataInsert) {
        $query = $this->db->insert('guru', $dataInsert);
        return $query;
    }

    function get_by($id) {
        $sql = "
            SELECT  
				nama_lengkap AS NAMA, 
				nip AS NIP, 
				alamat AS ALAMAT, 
				matapelajaran AS MATAPELAJARAN,
				email AS EMAIL, 
				telp AS TELP, 
				kelamin AS KELAMIN,
				id AS ID	
			FROM 
				guru
				LEFT JOIN matapelajaran USING (id_matapelajaran) 
			WHERE nip = ?
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
        $this->db->where('id', $id);
        $update = $this->db->update('guru', $dataUpdate);
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
        $this->db->where('nip', $id);
        $delete = $this->db->delete('guru');
        return $delete;
    }
	 
	 function get_kategori() {
        $q = $this->db->query("
            SELECT 
              id_kategori AS ID,
              kategori AS NAMA 
            FROM
              kategori_siswa
            ORDER BY kategori ASC
        ");
        $result=$q->result_array();
		return $result;
		}
		
	function get_matapelajaran() {
        $q = $this->db->query("
            SELECT 
              id_matapelajaran,
              matapelajaran 
            FROM
              matapelajaran
            ORDER BY matapelajaran ASC
        ");
        $result=$q->result_array();
		return $result;
		}

}

?>
