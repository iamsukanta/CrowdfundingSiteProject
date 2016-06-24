<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('welcome_model');
        $this->load->model('login_model');
        $this->load->model('uploader_model', 'u_model', true);
    }

    public function index() {
        $data = array();
        $data['title'] = "punji";
        $data['all_project'] = $this->welcome_model->select_all_project();
        $data['home_category'] = $this->welcome_model->select_all_home_category();
        $data['maincontent'] = $this->load->view('home_message', $data, true);

        $this->load->view('home', $data);
    }

    public function sign_up() {
        $data = array();
        $data['title'] = "sign_up";
        /* $data['all_project']=  $this->welcome_model->select_all_project();
          $data['all_category']=  $this->welcome_model->select_all_category(); */
        $data['maincontent'] = $this->load->view('sign_up', '', true);
        $this->load->view('home', $data);
    }

    public function save_user() {

        $data = array();
        $data['first_name'] = $this->input->post('first_name', true);
        $data['last_name'] = $this->input->post('last_name', true);
        $data['email'] = $this->input->post('email', true);
        $data['password'] = $this->input->post('password', true);
        $data['password'] = md5($data['password']);

        /* echo '<pre>';
          print_r($data);
          print_r($_FILES); */




        $result = $this->welcome_model->select_user_by_email($data['email']);
        if ($result) {
            $sdata = array();
            $sdata['message'] = "user already registerd";
            $this->session->set_userdata($sdata);
            redirect("welcome/sign_up");
        } else {
            $this->welcome_model->save_user_info($data);

            $sdata = array();
            $sdata['message'] = "save successfully";
            $this->session->set_userdata($sdata);
            redirect("welcome/sign_up");
            redirect("welcome/save_successfully");
        }
    }

    public function logout() {

        $this->session->unset_userdata('user_id');
        session_destroy();
        // $this->session->unset_userdata('login_status');
        //$this->session->unset_userdata('full_name');
        $data['exception'] = "You are successfully logout";
        $this->session->set_userdata($data);
        redirect("welcome/user_login", "refresh");
    }

    public function user_login() {
        $data = array();
        $data['maincontent'] = $this->load->view('login', '', true);
        $data['title'] = "Login";

        $this->load->view('home', $data);
    }

    public function check_login() {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $result = $this->login_model->check_login_info($email, $password);
        /* echo '<pre>';
          print_r($result);
          exit();
         */
        $sdata = array();
        if ($result) {



            $sdata['full_name'] = $result->first_name . ' ' . $result->last_name;
            $sdata['user_id'] = $result->user_id;
            $sdata['login_status'] = TRUE;
            $this->session->set_userdata($sdata);
            redirect("uploader");
        } else {

            $sdata['exception'] = "Email Address and Password is invalid";
            $this->session->set_userdata($sdata);
            redirect("welcome/user_login");
        }
    }

    public function start_project() {
        $user_id = $this->session->userdata('user_id');
        $sdata = array();
        if (!$user_id) {
            $sdata['exception'] = "Please Log In";
            $this->session->set_userdata($sdata);
            redirect("welcome/user_login");
        } else {
            $data = array();
            //$data['all_category'] = $this->w_model->select_all_category();
            $data['maincontent'] = $this->load->view('start_project', '', true);
            $data['title'] = $this->session->userdata('full_name');

            $this->load->view('home', $data);
        }
    }

    public function explore_category() {
        $data = array();

        $data['all_category'] = $this->welcome_model->select_all_category();
        $data['maincontent'] = $this->load->view('explore_category', $data, true);
        $data['title'] = 'Explore Category';
        $this->load->view('home', $data);
    }

    public function single_project($project_id) {
        $data = array();
        $data['title'] = $this->session->userdata('full_name');
        $data['single_project'] = $this->welcome_model->single_project_info_by_project_id($project_id);
        $data['project_perk'] = $this->welcome_model->project_perk_info_by_project_id($project_id);
        // $data['single_user']=$this->welcome_model->select_user_by_project_id($project_id);
//       echo '<pre>';
//       print_r($data);
//       exit();
//        $data['project_title'] = $single_project->project_title;
//            $data['project_id'] = $single_project->project_id;
//            $data['user_id'] = $single_project->user_id;
//            $data['country'] = $single_project->country;
//            $data['city'] = $single_project->city;
//            $data['demand'] = $single_project->demand;
        $this->session->set_userdata($data);
        $data['maincontent'] = $this->load->view('show_single_project', $data, true);
        $this->load->view('home', $data);
    }

    public function single_category($category_id, $start = 0) {
        $data = array();
        $data['title'] = $this->session->userdata('full_name');
        //$data['single_project']=  $this->welcome_model->single_project_info_by_project_id($project_id);
        $data['all_category'] = $this->welcome_model->select_all_category();
        $data['single_category'] = $this->welcome_model->view_project_by_single_category_id($category_id, 8, $start);
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'welcome/single_category';
        $config['total_rows'] = $this->welcome_model->select_project_count_by_category_id($category_id);
        $config['per_page'] = 8;
        $this->pagination->initialize($config);
        $data['project_category'] = $this->pagination->create_links();
        $data['category_name'] = $this->welcome_model->get_single_categroy_name($category_id);
        //$data['project_perk']=$this->welcome_model->project_perk_info_by_project_id($project_id);
        // $data['single_user']=$this->welcome_model->select_user_by_project_id($project_id);
//      echo '<pre>';
//       print_r($data);
//       exit();
        $data['maincontent'] = $this->load->view('view_single_category', $data, true);
        $this->load->view('home', $data);
    }

    public function all_category($start = 0) {
        $data = array();
        $data['title'] = $this->session->userdata('full_name');
        //$data['single_project']=  $this->welcome_model->single_project_info_by_project_id($project_id);
        $data['all_category'] = $this->welcome_model->select_all_category();

        $data['single_category'] = $this->welcome_model->view_all_project(8, $start);
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'welcome/all_category';
        $config['total_rows'] = $this->welcome_model->select_project_count();
        $config['per_page'] = 8;
        $this->pagination->initialize($config);
        $data['project'] = $this->pagination->create_links();
        //$data['category_name']=  $this->welcome_model->get_single_categroy_name($category_id);
        //$data['project_perk']=$this->welcome_model->project_perk_info_by_project_id($project_id);
        // $data['single_user']=$this->welcome_model->select_user_by_project_id($project_id);
//     echo '<pre>';
//     print_r($data);
//     exit();
        $data['maincontent'] = $this->load->view('view_all_category', $data, true);
        $this->load->view('home', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */