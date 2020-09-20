<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

class Register extends CI_Controller {

    public function __contruct() {
        parent::__contruct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->library("breadcrumbs");
    }

    public function index() {
        $data['pageTitle'] = "Register";
        $this->breadcrumbs->setActive('Register');
        $this->breadcrumbs->add('Home', base_url());
        $data['breadcrumbs'] = $this->breadcrumbs;

        $this->load->view('layout/header', $data);
        $this->load->view('account/register', $data);
        $this->load->view('layout/footer', $data);
    }

    public function acceptRegister() {
        $data = array();
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('confirmation', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[adm_account.email]');
        if($this->form_validation->run() == FALSE) {
            $data['STATUS'] = 'FAILED';
            $data['ERROR'] = validation_error();
        }
        else {
            $data['STATUS'] = 'SUCCESS';
        }
        
        echo json_encode($data);
    }
}