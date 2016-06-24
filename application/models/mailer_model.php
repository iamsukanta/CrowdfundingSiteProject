<?php

class Mailer_Model extends CI_Model {

    //put your code here
    /*
     */
    public function sendEmail($data, $email_template) {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailscript/' . $email_template, $data, true);
        echo $body;
        exit();
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

}
?>

