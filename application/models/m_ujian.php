<?php

/**
 * Description of siswa
 *
 * @author white
 */
class M_ujian extends CI_Model {

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
	
	function input_jawaban($dataInsert) {
        $query = $this->db->insert('jawaban_siswa', $dataInsert);
        return $query;
    }

    function get_soal($params) {
        $sql = "
            SELECT  
				a.*,b.*
			FROM 
				soal a
			LEFT JOIN jawaban b ON a.id_soal=b.id_SOal
			WHERE a.id_kelas = ? AND a.id_matapelajaran=? AND a.id_guru=?
			GROUP BY a.id_soal
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }      
	
	function get_hasil_ujian($params) {
        $sql = "
            SELECT  
				SUM(a.skor) AS SKOR
			FROM 
				jawaban_siswa a
			LEFT JOIN soal b ON a.id_soal=b.id_soal
			LEFT JOIN jawaban c ON a.id_jawaban=c.id_jawaban
			WHERE a.nis = ? AND b.id_matapelajaran = ?
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
	
	function get_jawaban($params) {
        $sql = "
            SELECT  
				*
			FROM 
				jawaban
				 
			WHERE id_soal = ?
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }
	function get_total_nilai($params) {
        $sql = "
            SELECT  
				sum(skor) AS total
			FROM 
				jawaban
				 
			WHERE id_jawaban = ?
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
			return $result['total'];
        } else {
            return 0;
        }
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
