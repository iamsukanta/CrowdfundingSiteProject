<?php

class Welcome_Model extends CI_Model {

    public function save_user_info($data) {
        $this->db->insert('tbl_user', $data);
    }

    public function select_user_by_email($email) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email', $email);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_all_category() {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_all_home_category() {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->order_by('category_id', 'desc');
        $this->db->limit(6, 0);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_category($search_text) {
        $sql = "SELECT * FROM tbl_category WHERE category_name LIKE '%$search_text%'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_all_project() {
        $this->db->select('*');
        $this->db->from('tbl_projects');
        $this->db->where('admin_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function single_project_info_by_project_id($project_id) {
        $this->db->select('tbl_projects.*,tbl_category.*,tbl_user.*');
        $this->db->from('tbl_projects');
        $this->db->join('tbl_category', 'tbl_category.category_id=tbl_projects.category_id', 'left');
        $this->db->join('tbl_user', 'tbl_user.user_id=tbl_projects.user_id', 'left');
        $this->db->where('project_id', $project_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function single_perk_info_by_perk_id($perk_id) {
        $this->db->select('*');
        $this->db->from('tbl_perks');
        $this->db->where('perk_id', $perk_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function project_perk_info_by_project_id($project_id) {
        $this->db->select('*');
        $this->db->from('tbl_perks');
        $this->db->where('project_id', $project_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function view_project_by_single_category_id($category_id, $num = 20, $start = 0) {
        $this->db->select('tbl_projects.*,tbl_user.*');
        $this->db->from('tbl_projects');
//         $this->db->join('tbl_category','tbl_category.category_id=tbl_projects.category_id','left');
        $this->db->join('tbl_user', 'tbl_user.user_id=tbl_projects.user_id', 'left');
        $this->db->where('category_id', $category_id);
        $this->db->where('admin_status', 1);
        $this->db->order_by('project_id', 'desc');
        $this->db->limit($num, $start);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_project_count_by_category_id($category_id) {
        $this->db->select('project_id');
        $this->db->from('tbl_projects');
        $this->db->where('admin_status', 1);
        $this->db->where('category_id', $category_id);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }

    public function get_single_categroy_name($category_id) {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $category_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function view_all_project($num = 20, $start = 0) {
        $this->db->select('tbl_projects.*,tbl_category.category_name,tbl_user.*');
        $this->db->from('tbl_projects');
        $this->db->join('tbl_category', 'tbl_category.category_id=tbl_projects.category_id', 'left');
        $this->db->join('tbl_user', 'tbl_user.user_id=tbl_projects.user_id', 'left');
        //$this->db->where('project_id',$project_id);
        $this->db->where('admin_status', 1);
        $this->db->order_by('project_id', 'desc');
        $this->db->limit($num, $start);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_project_count() {
        $this->db->select('project_id');
        $this->db->from('tbl_projects');
        $this->db->where('admin_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }

    public function view_all_search_project($search, $num = 20, $start = 0) {
        $this->db->select('tbl_projects.*,tbl_category.category_name,tbl_user.*');
        $this->db->from('tbl_projects');
        $this->db->join('tbl_category', 'tbl_category.category_id=tbl_projects.category_id', 'left');
        $this->db->join('tbl_user', 'tbl_user.user_id=tbl_projects.user_id', 'left');
        //$this->db->where('project_id',$project_id);
        //$this->db->REGEXR('project_title',$search);
        $this->db->like('project_title', $search);
        $this->db->where('admin_status', 1);
        $this->db->order_by('project_id', 'desc');
        $this->db->limit($num, $start);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_search_project_count($search) {
        $this->db->select('project_id');
        $this->db->from('tbl_projects');
        $this->db->like('project_title', $search);
        $this->db->where('admin_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }

}

?>
