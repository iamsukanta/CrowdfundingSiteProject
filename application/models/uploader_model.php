<?php

class Uploader_Model extends CI_Model {

    //put your code here
    public function select_user_by_user_id($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function check_password($user_id, $current_p) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id', $user_id);
        $this->db->where('password', md5($current_p));
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_profile($data, $user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_user', $data);
    }

    public function update_password($user_id, $password) {
        $this->db->where('user_id', $user_id);
        $this->db->set('password', $password);
        $this->db->update('tbl_user');
    }

    public function select_projects_by_user_id($user_id, $num = 20, $start = 0) {
        $this->db->select('*');
        $this->db->from('tbl_projects');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('project_id', 'desc');
        $this->db->limit($num, $start);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_my_campaigns_count($user_id) {
        $this->db->select('project_id');
        $this->db->from('tbl_projects');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }

    public function delete_project_by_project_id($project_id) {

        $this->db->where('project_id', $project_id);
        $this->db->delete('tbl_projects');
    }

    public function select_project_by_project_id($project_id) {
        $this->db->select('tbl_projects.*,tbl_category.category_name');
        $this->db->from('tbl_projects');
        $this->db->join('tbl_category', 'tbl_category.category_id=tbl_projects.category_id', 'left');
        $this->db->where('project_id', $project_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_card_image_by_project_id($project_id) {
        $this->db->select('tbl_projects.card_image');
        $this->db->from('tbl_projects');
        $this->db->where('project_id', $project_id);
        $query_result = $this->db->get();
        $result = $query_result->row('card_image');
        return $result;
    }

//    public function select_project_by_project_id($project_id){
//        $this->db->select('*');
//        $this->db->from('tbl_projects');
//        $this->db->where('project_id',$project_id);
//        $query_result=$this->db->get();
//        $result=$query_result->row();
//        return $result;
//    }
    public function update_project_title_info($data, $project_id) {
        $this->db->where('project_id', $project_id);
        $this->db->update('tbl_projects', $data);
    }

}
