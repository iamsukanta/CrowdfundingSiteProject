<?php

session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_contribute extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('welcome_model', 'w_model', true);
        $this->load->model('uploader_model', 'u_model', true);
        $this->load->model('mailer_model', 'm_model', true);
        $this->load->model('project_uploader_model', 'p_u_model', true);
        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect("welcome/user_login");
        }
        // $first_name=  $this->session->userdata('first_name');
//        $project_id = $this->session->userdata('project_id');
//        if ($project_id == NULL) {
//            redirect('uploader/upload_project_title');
//        }
    }

    public function single_project_contribute($project_id, $perk_id) {
        $data = array();
        //$project_id = $this->session->userdata('project_id');
        $data['single_project'] = $this->w_model->single_project_info_by_project_id($project_id);
        //$data['all_category'] = $this->w_model->select_all_category();
        $data['chosen_perk'] = $this->w_model->single_perk_info_by_perk_id($perk_id);
        $data['maincontent'] = $this->load->view('project_contribute_now', $data, true);
        $data['title'] = 'punji';
        $this->load->view('home', $data);
    }

    public function save_project_contribute() {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['card_name'] = $this->input->post('card_name', true);
        $data['card_number'] = $this->input->post('card_number', true);
        $data['e_date'] = $this->input->post('e_date', true);
        $data['security_code'] = $this->input->post('security_code', true);
        $data['billing_postal_code'] = $this->input->post('billing_postal_code', true);
        $data['user_id'] = $user_id;
        $data['project_id'] = $this->input->post('project_id', true);
        $count = $this->input->post('count', true);
        $value = $this->input->post('value', true);
        $data['total_amount'] = $count * $value;
        echo '<pre>';
        print_r($data);
        print_r($count);
        print_r($value);
        exit();
    }

}
