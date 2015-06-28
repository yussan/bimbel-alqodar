<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
  
    function get_groups() {
        $sql = 'SELECT groups.*, count(roles.id) AS jml_role
                FROM groups
                LEFT JOIN permissions ON permissions.group_id = groups.id
                LEFT JOIN roles ON roles.id = permissions.role_id
                GROUP BY groups.id';
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function get_roles() {
        $sql = 'SELECT roles.id, roles.name, roles.url, roles.desc, roles_category.category FROM roles JOIN roles_category ON roles_category.id = roles.category_id ORDER BY category_id ASC';
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }    

    function create_role($dataInsert)
    {
        $query = $this->db->insert('roles', $dataInsert);
        return $query;
    }

    function get_role_by_id($id) {
        $sql = "SELECT * FROM roles WHERE id = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function update_role($id,$dataUpdate)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('roles', $dataUpdate);
        return $update;
    }

    function get_roles_category() {
        $sql = 'SELECT * FROM roles_category ORDER BY category';
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function create_role_cat($dataInsert)
    {
        $query = $this->db->insert('roles_category', $dataInsert);
        return $query;
    }

    function get_role_cat_by($id) {
        $sql = "SELECT * FROM roles_category WHERE id = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function update_role_cat($id,$dataUpdate)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('roles_category', $dataUpdate);
        return $update;
    }

    function get_permissions_by_group_id($id) {
        $sql = 'SELECT * FROM permissions WHERE group_id = ?';
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function update_group($id,$dataUpdate)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('groups', $dataUpdate);
        return $update;
    }

    function delete_groups_role($id)
    {
        $this->db->where('group_id', $id);
        $delete = $this->db->delete('permissions');
        return $delete;
    }

    function insert_groups_role($dataInsert)
    {
        $query = $this->db->insert('permissions', $dataInsert);
        return $query;
    }

    function get_rule($id) {
        $sql = 
            'SELECT DISTINCT(role_id), roles.name as role_name, roles.url as role_url, max(rule) as user_rule
            FROM permissions
            LEFT JOIN roles on roles.id = permissions.role_id
            WHERE group_id IN (
                SELECT group_id FROM users_groups WHERE user_id = ?
            )
            GROUP BY role_id';

        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function get_rule_url($params) {
        $sql = 
            'SELECT DISTINCT(role_id),roles.name as role_name,roles.url as role_url,GROUP_CONCAT(rule SEPARATOR ",") as user_rule
            FROM permissions
            LEFT JOIN roles on roles.id = permissions.role_id
            WHERE group_id IN (
                SELECT group_id FROM users_groups WHERE user_id = ?
            )
            AND roles.url = ?
            GROUP BY role_id';

        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function get_pegawai() {
        $sql = 
            'SELECT * FROM mr_pegawai 
            WHERE nip NOT IN (
                SELECT username FROM users
            )
            ORDER BY nm_pegawai';

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function get_pegawai_by($id) {
        $sql = 
            'SELECT * FROM mr_pegawai 
            WHERE id_mr_pegawai = ?';

        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

    function update_user($dataUpdate)
    {
        $sql = 'UPDATE mr_pegawai SET email = ? WHERE nip = ?';
        return $this->db->query($sql, $dataUpdate);
    }
}