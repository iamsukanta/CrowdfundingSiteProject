<?php

class Project_uploader_model extends CI_Model {

    public function save_project_title_info($data) {
        $this->db->insert('tbl_projects', $data);
        $project_id = $this->db->insert_id();
        return $project_id;
    }

    public function select_single_project($project_id) {
        $this->db->select('*');
        $this->db->from('tbl_projects');
        $this->db->where('project_id', $project_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function save_project_basics_info($data, $project_id) {
        $this->db->where('project_id', $project_id);
        $this->db->update('tbl_projects', $data);
    }

    public function save_project_tags_info($data) {
        $this->db->insert('tbl_tags', $data);
    }

    public function save_project_perk_info($data) {
        $this->db->insert('tbl_perks', $data);
    }

    public function save_project_funding_info($data, $project_id) {
        $this->db->where('project_id', $project_id);
        $this->db->update('tbl_projects', $data);
    }

    public function active_paypal_account_status($project_id) {
        $this->db->set('paypal_status', 1);
        $this->db->where('project_id', $project_id);
        $this->db->update('tbl_projects');
    }

}
