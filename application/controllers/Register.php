<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

class Register extends CI_Controller {

    public function __contruct() {
        parent::__contruct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
    }

    public function index() {
        $data['pageTitle'] = "Register | Todo Manager";
        $this->load->view('layout/header', $data);
        $this->load->view('account/register', $data);
        $this->load->view('layout/footer', $data);
    }

    public function acceptRegister() {
        $data = array();
        $this->form_validation->set_rule();
        $this->form_validation->set_rule();
        if($this->form_validation->run() == FALSE) {

        }
        else {

        }
        
        return 'output';
    }
}