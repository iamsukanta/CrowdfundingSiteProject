<?php

session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Uploader extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('welcome_model', 'w_model', true);
        $this->load->model('uploader_model', 'u_model', true);
        $this->load->model('project_uploader_model', 'p_u_model', true);
        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect("welcome/user_login");
        }
        $this->load->helper('ckeditor');
        $this->data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ck_editor',
            'path' => 'js/ckeditor',
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "500px", //Setting a custom width
                'height' => '300px', //Setting a custom height
            ),
        );
    }

    public function index() {
        $data = array();
        $data['all_project'] = $this->w_model->select_all_project();
        $data['home_category'] = $this->w_model->select_all_home_category();
        $data['maincontent'] = $this->load->view('home_message', $data, true);
        $data['title'] = $this->session->userdata('full_name');

        $this->load->view('home', $data);
    }

    public function my_profile() {
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $data['check_editor'] = $this->data;
        $data['result'] = $this->u_model->select_user_by_user_id($user_id);

        $data['maincontent'] = $this->load->view('my_profile', $data, true);
        $data['title'] = $this->session->userdata('full_name');
        $this->load->view('home', $data);
    }

    public function my_campaigns($start = 0) {
        $user_id = $this->session->userdata('user_id');
        $data = array();

        $data['result'] = $this->u_model->select_projects_by_user_id($user_id, 4, $start);
//       echo "<pre>";
//       print_r($data);
//       exit();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'uploader/my_campaigns';
        $config['total_rows'] = $this->u_model->select_my_campaigns_count($user_id);
        $config['per_page'] = 4;
        $this->pagination->initialize($config);
        $data['my_campaigns'] = $this->pagination->create_links();
        $data['maincontent'] = $this->load->view('my_campaigns', $data, true);
        $data['title'] = $this->session->userdata('full_name');
        $this->load->view('home', $data);
    }

    public function update_profile() {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['first_name'] = $this->input->post('first_name', true);
        $data['last_name'] = $this->input->post('last_name', true);
        $data['country'] = $this->input->post('country', true);
        $data['city'] = $this->input->post('city', true);
        $data['postal_code'] = $this->input->post('postal_code', true);
        $data['short_description'] = $this->input->post('short_description', true);
        $data['message'] = $this->input->post('message', true);
        $data['facebook_link'] = $this->input->post('facebook_link', true);
        $data['profile_image'] = $this->input->post('profile_image', true);
//         echo '<pre>';
//          print_r($data);
//          print_r($_FILES); 
//          exit();  
//          


        $config['upload_path'] = './images/profile_image/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1600';
        $config['max_height'] = '1024';
        $error = '';
        $udata = '';
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('profile_image')) {
            $error = array('error' => $this->upload->display_errors());

            $this->session->set_userdata($error);
            redirect("uploader/my_profile");

            /* echo '<pre>';
              print_r($error); */
        } else {
            $udata = array('upload_data' => $this->upload->data());

            /* echo '<pre>';
              print_r($udata);
              exit();
             */



            $data['profile_image'] = "images/profile_image/" . $udata['upload_data']['file_name'];
        }
        //echo '<pre>';
        //print_r($data); 
        // exit();

        $this->u_model->update_profile($data, $user_id);
        redirect("uploader/my_profile");
    }

    public function my_settings() {
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $data['maincontent'] = $this->load->view('my_settings', $user_id, true);
        $data['title'] = $this->session->userdata('full_name');
        $this->load->view('home', $data);
    }

    public function update_settings() {
        $user_id = $this->session->userdata('user_id');
        $current_p = $this->input->post('current_p', true);
        $result = $this->u_model->check_password($user_id, $current_p);
        //print_r($result);
        // exit();
        if ($result) {

            $password = $this->input->post('new_p', true);
            //print_r($password);
            $confirm_p = $this->input->post('confirm_p', true);
            // print_r($confirm_p);


            if ($password == $confirm_p) {
                $password = md5($password);
                $this->u_model->update_password($user_id, $password);
                redirect("uploader/my_settings");
            } else {
                echo "check ur confirm password";
            }
        } else {
            echo 'plz correct ur current password';
        }
    }

    public function upload_project_title() {
        $data = array();
        //$data['all_category'] = $this->w_model->select_all_category();
        $data['maincontent'] = $this->load->view('upload_project_title', '', true);
        $data['title'] = $this->session->userdata('full_name');

        $this->load->view('home', $data);
    }

    public function save_project_title() {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['user_id'] = $user_id;
        $data['project_title'] = $this->input->post('project_title', true);

        $data['country'] = $this->input->post('country', true);
        $data['city'] = $this->input->post('city', true);
        $data['demand'] = $this->input->post('demand', true);


//        echo '<pre>';
//         print_r($user_id);
//          print_r($data);
//          print_r($_FILES); 
//          exit();
        // $this->p_u_model->save_project_title_info($data);
        $project_id = $this->p_u_model->save_project_title_info($data);
        $single_project = $this->p_u_model->select_single_project($project_id);
        /* echo'<pre>';
          print_r($single_project);
          exit(); */

        if ($single_project) {
            $data['project_title'] = $single_project->project_title;
            $data['project_id'] = $single_project->project_id;
            $data['user_id'] = $single_project->user_id;
            $data['country'] = $single_project->country;
            $data['city'] = $single_project->city;
            $data['demand'] = $single_project->demand;
            /* echo'<pre>';
              print_r($single_project);
              exit(); */

            $this->session->set_userdata($data);
            redirect('project_uploader/upload_project_basics');
        } else {

            //$data['exception']="Email Address and Password is invalid";
            //$this->session->set_userdata($data);

            redirect('uploader/upload_project_title');

            // redirect('project_uploader/upload_project_basics');
        }
    }

    public function project_delete($project_id) {
        $this->u_model->delete_project_by_project_id($project_id);
        redirect("uploader/my_campaigns");
    }

    public function project_title_edit($project_id) {
        $data = array();
        $data['result'] = $this->u_model->select_project_by_project_id($project_id);
        $data['maincontent'] = $this->load->view('edit_project_title', $data, true);
        $data['title'] = $this->session->userdata('full_name');
        $this->load->view('home', $data);
    }

    public function update_project_title() {
        $project_id = $this->input->post('project_id', true);
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['project_id'] = $project_id;
        $data['user_id'] = $user_id;
        $data['project_title'] = $this->input->post('project_title', true);

        $data['country'] = $this->input->post('country', true);
        $data['city'] = $this->input->post('city', true);
        $data['demand'] = $this->input->post('demand', true);
        $this->u_model->update_project_title_info($data, $project_id);
        $this->session->set_userdata($data);
        redirect('project_uploader/edit_project_basics');
    }

}
