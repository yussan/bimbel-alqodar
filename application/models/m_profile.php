<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_profile
 *
 * @author windows
 */
class M_profile extends CI_Model {

    function get() {
        $q = $this->db->query("
            SELECT
              id_profil AS ID,
              nama_perusahaan AS NAMA,
              alamat_perusahaan AS ALAMAT,
              kdpos_perusahaan AS KODEPOS,
              telp_perusahaan AS TELP,
              fax_perusahaan AS FAX,
              email_perusahaan AS EMAIL,
              web_perusahaan AS WEB
            FROM profil
        ");
        if ($q->num_rows() > 0) {
            $result = $q->result_array();
            $q->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function save($dataInsert) {
        $query = $this->db->insert('profil', $dataInsert);
        return $query;
    }

    function get_detail_by($id) {
        $sql = "
            SELECT 
              id_profil AS ID,
              nama_perusahaan AS NAMA,
              alamat_perusahaan AS ALAMAT,
              kdpos_perusahaan AS KODEPOS,
              telp_perusahaan AS TELP,
              fax_perusahaan AS FAX,
              email_perusahaan AS EMAIL,
              web_perusahaan AS WEB
            FROM profil
            WHERE id_profil = ?
        ";
        $result = $this->db->query($sql, $id);
        return $result;
    }

    function get_by($id) {
        $sql = "
            SELECT
              id_profil AS ID,
              nama_perusahaan AS NAMA,
              alamat_perusahaan AS ALAMAT,
              kdpos_perusahaan AS KODEPOS,
              telp_perusahaan AS TELP,
              fax_perusahaan AS FAX,
              email_perusahaan AS EMAIL,
              web_perusahaan AS WEB
            FROM profil
            WHERE id_profil = ?
        ";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function update($id, $dataUpdate) {
        $this->db->where('id_profil', $id);
        $update = $this->db->update('profil', $dataUpdate);
//         echo '<pre>';var_dump($update);die;
        return $update;
    }

    function delete($id) {
        $this->db->where('id_profil', $id);
        $delete = $this->db->delete('profil');
        return $delete;
    }

}

?>
