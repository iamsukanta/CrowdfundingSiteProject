<?php

class Admin_Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('super_admin_model', 'sa_model', true);
    }

    public function index() {
        $this->load->view('admin/login');
    }

    public function check_admin_login() {
        $admin_email_address = $this->input->post('admin_email_address', true);
        $admin_password = $this->input->post('admin_password', true);
        $result = $this->sa_model->check_admin_login_info($admin_email_address, $admin_password);
        /* echo '<pre>';
          print_r($result);
          exit(); */
        $data = array();
        if ($result) {
            $data['admin_name'] = $result->admin_name;
            $data['admin_id'] = $result->admin_id;
            $data['login_status'] = TRUE;
            $this->session->set_userdata($data);
            redirect("super_admin/index");
        } else {

            $data['exception'] = "Email Address and Password is invalid";
            $this->session->set_userdata($data);
            redirect("admin_login/index");

            //redirect("super_admin");
        }
    }

}

?>
