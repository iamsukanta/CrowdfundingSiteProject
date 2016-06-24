<?php

session_start();

class Super_Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('welcome_model', 'w_model', true);
        $this->load->model('super_admin_model', 'sa_model', true);
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == null) {
            redirect("admin_login/index");
        }
    }

    public function index() {
        $data = array();

        $data['admin_maincontent'] = $this->load->view('admin/welcome', '', true);
        $this->load->view('admin/admin_home', $data);
    }

    public function add_project_category() {
        $data = array();
        $data['admin_maincontent'] = $this->load->view('admin/add_project_category', '', true);
        $this->load->view('admin/admin_home', $data);
    }

    public function save_project_category() {
        $data = array();
        $data['category_name'] = $this->input->post('category_name', true);
        $data['category_description'] = $this->input->post('category_description', true);
        $data['category_image'] = $this->input->post('category_image', true);
        //$data['category_icon']=$this->input->post('category_icon',true);
        /* echo '<pre>';
          print_r($data);
          print_r($_FILES);
          exit(); */

        /* ....start image upload..... */
        $config['upload_path'] = './images/category_image/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $error = '';
        $udata = '';
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('category_image')) {
            $error = array('error' => $this->upload->display_errors());

            $this->session->set_userdata($error);
            redirect("super_admin/add_project_category");

            /* echo '<pre>';
              print_r($error); */
        } else {
            $udata = array('upload_data' => $this->upload->data());

            /* echo '<pre>';
              print_r($udata); */
            $data['category_image'] = "images/category_image/" . $udata['upload_data']['file_name'];
        }
        /* echo '<pre>';
          print_r($data);
          exit(); */

        $this->sa_model->save_category_info($data);
        redirect("super_admin/add_project_category");
    }

    public function category_ajax_search($search_text = NULL) {
        $data = array();
        $data['all_category'] = $this->w_model->select_category($search_text);
        $result = $this->load->view('admin/category_ajax_search', $data, true);
        echo $result;
    }

    public function view_category() {
        $data = array();
        // $data['all_category'] = $this->w_model->select_all_category();

        $data['admin_maincontent'] = $this->load->view('admin/view_category', $data, true);
        $this->load->view('admin/admin_home', $data);
    }

    public function edit_category($category_id) {
        $data = array();
        $data['result'] = $this->sa_model->select_category_by_category_id($category_id);
        $data['admin_maincontent'] = $this->load->view('admin/edit_category', $data, true);
        $this->load->view('admin/admin_home', $data);
    }

    public function update_category() {
        $data = array();
        $category_id = $this->input->post('category_id', true);

        $data['category_name'] = $this->input->post('category_name', true);
        $data['category_description'] = $this->input->post('category_description', true);
        $data['category_image'] = $this->input->post('category_image', true);

//echo '<pre>';
        //print_r($data);
        // exit();
        //print_r($category_id);
        //exit();
        /* ....start image upload..... */
        $config['upload_path'] = './images/category_image/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $error = '';
        $udata = '';
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('category_image')) {
            $error = array('error' => $this->upload->display_errors());

            $this->session->set_userdata($error);
            echo '<pre>';
            print_r($error);
            exit();
            redirect("super_admin/add_project_category");
        } else {
            $udata = array('upload_data' => $this->upload->data());

            /* echo '<pre>';
              print_r($udata); */
            $data['category_image'] = "images/category_image/" . $udata['upload_data']['file_name'];
        }
        $this->sa_model->update_category_info($data, $category_id);
        redirect("super_admin/view_category");
    }

    public function delete_category($category_id) {
        $this->sa_model->delete_category_by_category_id($category_id);
        redirect("super_admin/view_category");
    }

    public function add_project() {
        $data = array();
        $data['project'] = $this->sa_model->select_all_inactive_project();
        $data['admin_maincontent'] = $this->load->view('admin/add_project', $data, true);
        $this->load->view('admin/admin_home', $data);
    }

    public function add_new_project($project_id) {
        $data = array();
        $data['created_date_time'] = date('Y-m-d H:m:s');
        $this->sa_model->active_admin_status($project_id, $data);
        redirect('super_admin/add_project');
    }

    public function view_project() {
        $data = array();
        $data['project'] = $this->sa_model->select_all_active_project();
        $data['admin_maincontent'] = $this->load->view('admin/view_project', $data, true);
        $this->load->view('admin/admin_home', $data);
    }

    public function block_project($project_id) {
        $this->sa_model->block_admin_status($project_id);
        redirect('super_admin/view_project');
    }

    public function show_single_project($project_id) {
        $data = array();
        $data['single_project'] = $this->w_model->single_project_info_by_project_id($project_id);
        $data['project_perk'] = $this->w_model->project_perk_info_by_project_id($project_id);
//       echo '<pre>';
//       print_r($data);
//       exit();
        $data['admin_maincontent'] = $this->load->view('admin/show_single_project', $data, true);
        $this->load->view('admin/admin_home', $data);
    }

    public function logout() {
        $this->session->unset_userdata('admin_id');
        session_destroy();
        $data['exception'] = "you are successfully destroyed";
        $this->session->set_userdata($data);
        redirect("admin_login/index", "refresh");
    }

}

//put your code here
?>