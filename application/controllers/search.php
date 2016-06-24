<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('welcome_model');
        $this->load->model('login_model');
        $this->load->model('uploader_model', 'u_model', true);
    }

    public function search_project($start = 0) {
        $data = array();
        $data['title'] = 'punji';
        $search = $this->input->get('search');
        //$data['single_project']=  $this->welcome_model->single_project_info_by_project_id($project_id);
        $data['all_category'] = $this->welcome_model->select_all_category();
        $data['single_category'] = $this->welcome_model->view_all_search_project($search, 6, $start);
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'welcome/search_project';
        $config['total_rows'] = $this->welcome_model->select_search_project_count($search);
        $config['per_page'] = 6;
        $this->pagination->initialize($config);
        $data['project'] = $this->pagination->create_links();
        //$data['category_name']=  $this->welcome_model->get_single_categroy_name($category_id);
        //$data['project_perk']=$this->welcome_model->project_perk_info_by_project_id($project_id);
        // $data['single_user']=$this->welcome_model->select_user_by_project_id($project_id);
        // echo '<pre>';
        // print_r($data);
        //exit();
        $data['maincontent'] = $this->load->view('view_all_category', $data, true);
        $this->load->view('home', $data);
    }

}
