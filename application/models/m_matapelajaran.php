<?php

/**
 * Description of siswa
 *
 * @author white
 */
class M_matapelajaran extends CI_Model {

    function get($limit, $offset) {
        if ($limit <> "" && $offset <> "") {
            $limitOffset = "LIMIT $offset,$limit";
        } else {
            $limitOffset = "";
        }
        $q = $this->db->query("
            SELECT  
				*
			FROM
				matapelajaran
				$limitOffset
        ");
        return $q;
    }

    function save($dataInsert) {
        $query = $this->db->insert('matapelajaran', $dataInsert);
        return $query;
    }

    function get_by($id) {
        $sql = "
            SELECT  
				*
			FROM 
				matapelajaran 
			WHERE id_matapelajaran = ?
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
        $this->db->where('id_matapelajaran', $id);
        $update = $this->db->update('matapelajaran', $dataUpdate);
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
	 
	 function get_kelas() {
        $q = $this->db->query("
            SELECT 
              id_kelas AS ID,
              nama_kelas AS NAMA 
            FROM
              kelas
            ORDER BY id_kelas ASC
        ");
        $result=$q->result_array();
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
        $result=$q->result_array();
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
        $result=$q->result_array();
		return $result;
		}
}

?>
