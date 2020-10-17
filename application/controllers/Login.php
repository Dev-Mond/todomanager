<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

class login extends CI_Controller {

    public function __contruct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->library("breadcrumbs");
    }

    public function index() {
        $data['pageTitle'] = "Login";
        
        $this->breadcrumbs->setActive('Login');
        $this->breadcrumbs->add('Home', base_url());
        $data['breadcrumbs'] = $this->breadcrumbs;

        $this->load->view('layout/header', $data);
        $this->load->view('account/login', $data);
        $this->load->view('layout/footer', $data);
    }

    public function acceptLogin() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->load->model('login_model', 'login');
        $result = $this->login->verifyCredentials($username, $password);
        
        if ($result === 'SUCCESS') {
            $this->session->set_userdata('user', $username);
        }

        $data['response'] = array('result' => $result);

        echo json_encode($data);
    }

    public function logout() {
        if($this->session->has_userdata('user')){
            $this->session->unset_userdata('user');
        }
        redirect('login');
    }
}