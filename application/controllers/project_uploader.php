
<?php

session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_uploader extends CI_Controller {

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
        $project_id = $this->session->userdata('project_id');
        if ($project_id == NULL) {
            redirect('uploader/upload_project_title');
        }
        $this->load->helper('ckeditor');
        $this->data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ck_editor',
            'path' => 'js/ckeditor',
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "800px", //Setting a custom width
                'height' => '800px', //Setting a custom height
            ),
        );
        $this->data['ckeditor1'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ck_editor1',
            'path' => 'js/ckeditor',
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "800px", //Setting a custom width
                'height' => '800px', //Setting a custom height
            ),
        );
    }

    public function upload_project_basics() {
        $data = array();
        $project_id = $this->session->userdata('project_id');
        $data['result'] = $this->u_model->select_project_by_project_id($project_id);
        $data['all_category'] = $this->w_model->select_all_category();
        $data['maincontent'] = $this->load->view('upload_project_basics', $data, true);
        $data['title'] = $this->session->userdata('full_name');
        $this->load->view('home', $data);
    }

    public function save_project_basics() {
        $data = array();

        $project_id = $this->session->userdata('project_id');
        $data['tagline'] = $this->input->post('tagline', true);
        $data['card_image'] = $this->input->post('card_image', true);

        $data['category_id'] = $this->input->post('category_id', true);
        $data['tags'] = $this->input->post('tags', true);
        $data['deadline'] = $this->input->post('deadline', true);
//        echo '<pre>';
//        print_r($data);
//        print_r($_FILES);
//        exit();
        $config['upload_path'] = './images/card_image';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1600';
        $config['max_height'] = '1024';
        $error = '';
        $udata = '';
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('card_image')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_userdata($error);
            redirect('project_uploader/upload_project_basics');
        } else {
            $udata = array('upload_data' => $this->upload->data());
//        echo '<pre>';
//              print_r($udata);
//              exit();
            $data['card_image'] = 'images/card_image/' . $udata['upload_data']['file_name'];
            $this->p_u_model->save_project_basics_info($data, $project_id);
            redirect('project_uploader/upload_project_story');
        }
    }

    public function upload_project_story() {
        $data = array();
        $data['check_editor'] = $this->data;
        $data['all_category'] = $this->w_model->select_all_category();
        $data['maincontent'] = $this->load->view('upload_project_story', $data, true);
        $data['title'] = $this->session->userdata('full_name');
        $this->load->view('home', $data);
    }

    public function save_project_story() {
        $data = array();
        $project_id = $this->session->userdata('project_id');
        $data['video_url'] = $this->input->post('video_url', true);
        $data['video_overlay_image'] = $this->input->post('video_overlay_image', true);
        $data['campaign_pitch'] = $this->input->post('campaign_pitch', true);
//       echo '<pre>';
//       print_r($data);
//       print_r($_FILES);
//       exit();
        $config['upload_path'] = './images/video_overlay_image';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1600';
        $config['max_height'] = '1024';
        $error = '';
        $udata = '';
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('video_overlay_image')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_userdata($error);
            redirect('project_uploader/upload_project_story');
        } else {
            $udata = array('upload_data' => $this->upload->data());
//        echo '<pre>';
//              print_r($udata);
//              exit();
//             
            $data['video_overlay_image'] = 'images/video_overlay_image/' . $udata['upload_data']['file_name'];
            $this->p_u_model->save_project_basics_info($data, $project_id);
            redirect('project_uploader/upload_project_perk_home');
        }
    }

    public function upload_project_perk() {
        $data = array();
        //$data['all_category'] = $this->w_model->select_all_category();
        $project_id = $this->session->userdata('project_id');
        $data['project_perk'] = $this->w_model->project_perk_info_by_project_id($project_id);
        $data['maincontent'] = $this->load->view('upload_project_perk', $data, true);
        $data['title'] = $this->session->userdata('full_name');
        $this->load->view('home', $data);
    }

    public function upload_project_secret_perk() {
        $data = array();
        //$data['all_category'] = $this->w_model->select_all_category();
        $data['title'] = $this->session->userdata('full_name');
        $data['perk_maincontent'] = $this->load->view('upload_project_secret_perk', '', true);
        $project_id = $this->session->userdata('project_id');
        $data['project_perk'] = $this->w_model->project_perk_info_by_project_id($project_id);
        $data['maincontent'] = $this->load->view('upload_project_perk_home', $data, true);

        $this->load->view('home', $data);
    }

    public function upload_project_perk_home() {
        $data = array();
        $data['title'] = $this->session->userdata('full_name');
        $data['perk_maincontent'] = $this->load->view('upload_perk_link', $data, true);
//         $data['perk_maincontent']='';
        $project_id = $this->session->userdata('project_id');
        $data['project_perk'] = $this->w_model->project_perk_info_by_project_id($project_id);
        $data['maincontent'] = $this->load->view('upload_project_perk_home', $data, true);
        $this->load->view('home', $data);
    }

    public function save_project_perk() {
        $data = array();

        $project_id = $this->session->userdata('project_id');
        $data['project_id'] = $project_id;
        $data['contribution_amount'] = $this->input->post('contribution_amount', true);
        $data['perk_name'] = $this->input->post('perk_name', true);
        $data['perk_type'] = $this->input->post('perk_type', true);
        $data['perk_description'] = $this->input->post('perk_description', true);
        $data['number_available'] = $this->input->post('number_available', true);
        $data['month'] = $this->input->post('month', true);
        $data['year'] = $this->input->post('year', true);
        $data['shipping_address'] = $this->input->post('shipping_address', true);
        $data['shipping_fee'] = $this->input->post('shipping_fee', true);

        //$data['d'] = $this->input->post('deadline', true);
//      echo '<pre>';
//              print_r($data);
//              exit();
//             

        $this->p_u_model->save_project_perk_info($data);
        redirect('project_uploader/upload_project_perk');
    }

    public function save_project_secret_perk() {
        $data = array();

        $project_id = $this->session->userdata('project_id');
        $data['project_id'] = $project_id;
        $data['contribution_amount'] = $this->input->post('contribution_amount', true);
        $data['perk_name'] = $this->input->post('perk_name', true);
        $data['perk_type'] = $this->input->post('perk_type', true);
        $data['perk_description'] = $this->input->post('perk_description', true);
        $data['number_available'] = $this->input->post('number_available', true);
        $data['month'] = $this->input->post('month', true);
        $data['year'] = $this->input->post('year', true);
        $data['shipping_address'] = $this->input->post('shipping_address', true);
        $data['shipping_fee'] = $this->input->post('shipping_fee', true);
        //$data['d'] = $this->input->post('deadline', true);
//      echo '<pre>';
//              print_r($data);
//              exit();
//             

        $this->p_u_model->save_project_perk_info($data);
        redirect('project_uploader/upload_project_perk');
    }

    public function edit_project_basics() {
        $data = array();
        $project_id = $this->session->userdata('project_id');
        $data['result'] = $this->u_model->select_project_by_project_id($project_id);

        $data['all_category'] = $this->w_model->select_all_category();

        $data['maincontent'] = $this->load->view('edit_project_basics', $data, true);
        $data['title'] = $this->session->userdata('full_name');

        $this->load->view('home', $data);
    }

    public function update_project_basics() {
        $data = array();

        $project_id = $this->session->userdata('project_id');
        $data['tagline'] = $this->input->post('tagline', true);
        $data['old_card_image'] = $this->input->post('old_card_image', true);

        $data['card_image'] = $this->input->post('card_image', true);

        $data['category_id'] = $this->input->post('category_id', true);
        $data['tags'] = $this->input->post('tags', true);
        $data['deadline'] = $this->input->post('deadline', true);

//      $this->p_u_model->save_project_basics_info($data, $project_id);
//     redirect('project_uploader/edit_project_story');
//
        //echo '<pre>';
        //print_r($data);
        //print_r($_FILES);
        //exit();
//        
        //Photo upload
        //$data['card_image'] = trim($data['card_image
        //exit();
        //if($data['card_image']->name != '')
        // {
        $config['upload_path'] = './images/card_image';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1600';
        $config['max_height'] = '1024';
        $error = '';
        $udata = '';
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('card_image')) {
            $error = array('error' => $this->upload->display_errors());
            //$error = array('error' => "Image: " . $data['card_image']);      
            $this->session->set_userdata($error);
            redirect('project_uploader/edit_project_basics');
        } else {
            $udata = array('upload_data' => $this->upload->data());
            //        echo '<pre>';
            //              print_r($udata);
            //              exit();
            //             
        }

        $data['card_image'] = 'images/card_image/' . $udata['upload_data']['file_name'];
        //}
        //else
        //{
        //  $data['old_card_image'] =$data['card_image'];  //$this->u_model->select_card_image_by_project_id($project_id);   
        //}

        $this->p_u_model->save_project_basics_info($data, $project_id);
        redirect('project_uploader/edit_project_story');
    }

    public function edit_project_story() {
        $data = array();
        $data['check_editor'] = $this->data;

        $project_id = $this->session->userdata('project_id');
        $data['result'] = $this->u_model->select_project_by_project_id($project_id);

        $data['all_category'] = $this->w_model->select_all_category();
        $data['maincontent'] = $this->load->view('edit_project_story', $data, true);
        $data['title'] = $this->session->userdata('full_name');
        $this->load->view('home', $data);
    }

    public function update_project_story() {
        $data = array();
        $project_id = $this->session->userdata('project_id');
        $data['video_url'] = $this->input->post('video_url', true);
        $data['video_overlay_image'] = $this->input->post('video_overlay_image', true);
        $data['campaign_pitch'] = $this->input->post('campaign_pitch', true);
//       echo '<pre>';
//       print_r($data);
//       print_r($_FILES);
//       exit();
        $config['upload_path'] = './images/video_overlay_image';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1600';
        $config['max_height'] = '1024';
        $error = '';
        $udata = '';
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('video_overlay_image')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_userdata($error);
            redirect('project_uploader/upload_project_story');
        } else {
            $udata = array('upload_data' => $this->upload->data());
//        echo '<pre>';
//              print_r($udata);
//              exit();
//             
            $data['video_overlay_image'] = 'images/video_overlay_image/' . $udata['upload_data']['file_name'];
            $this->p_u_model->save_project_basics_info($data, $project_id);
            redirect('project_uploader/upload_project_perk_home');
        }
    }

    public function project_funding_account() {
        $data = array();
        $project_id = $this->session->userdata('project_id');

        $data['result'] = $this->u_model->select_project_by_project_id($project_id);

        $data['maincontent'] = $this->load->view('upload_project_funding', $data, true);
        $data['title'] = $this->session->userdata('full_name');

        $this->load->view('home', $data);
    }

    public function save_project_funding() {
        $data = array();

        $project_id = $this->session->userdata('project_id');
        // $data['project_id']=$project_id;
        $data['paypal_first_name'] = $this->input->post('paypal_first_name', true);
        $data['paypal_last_name'] = $this->input->post('paypal_last_name', true);
        $data['paypal_email'] = $this->input->post('paypal_email', true);

        //$data['d'] = $this->input->post('deadline', true);
//      echo '<pre>';
//              print_r($data);
//              exit();

        $this->p_u_model->save_project_funding_info($data, $project_id);


        /* ---------start Activation Email----- */
        $mdata = array();
        $mdata['project_id'] = $project_id;
        $mdata['from_address'] = "punji.com";
        $mdata['admin_full_name'] = "punji";
        $mdata['to_address'] = $data['paypal_email'];
        $mdata['subject'] = "Activation Email";
        $mdata['first_name'] = $data['paypal_first_name'];
        //echo '<pre>';
        //print_r($mdata);
        //exit();

        $this->m_model->sendEmail($mdata, 'activation_email');


        /* ---------end Activation Email----- */

        // redirect('project_uploader/upload_project_perk');
    }

    public function active_paypal_account($project_id) {
        $this->p_u_model->active_paypal_account_status($project_id);
        $data['maincontent'] = $this->load->view('activation_status', '', true);

        $data['title'] = "punji";

        $this->load->view('home', $data);
    }

}
