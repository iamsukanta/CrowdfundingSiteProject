<?php

class Super_Admin_Model extends CI_Model {

    public function save_category_info($data) {
        $this->db->insert('tbl_category', $data);
        //$category_id=  $this->db->insert_id();
        //return $category_id;
    }

    public function check_admin_login_info($admin_email_address, $admin_password) {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email_address', $admin_email_address);
        $this->db->where('admin_password', md5($admin_password));
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_category_by_category_id($category_id) {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $category_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_category_info($data, $category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->update('tbl_category', $data);
    }

    public function delete_category_by_category_id($category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->delete('tbl_category');
    }

    public function select_all_inactive_project() {
        $this->db->select('*');
        $this->db->from('tbl_projects');
        $this->db->where('paypal_status', 1);
        $this->db->where('admin_status', 0);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function active_admin_status($project_id, $data) {
        $this->db->set('admin_status', 1);
        $this->db->where('project_id', $project_id);
        $this->db->update('tbl_projects', $data);
    }

    public function select_all_active_project() {
        $this->db->select('*');
        $this->db->from('tbl_projects');
        $this->db->where('paypal_status', 1);
        $this->db->where('admin_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function block_admin_status($project_id) {
        $this->db->set('admin_status', 0);
        $this->db->where('project_id', $project_id);
        $this->db->update('tbl_projects');
    }

}

?>
