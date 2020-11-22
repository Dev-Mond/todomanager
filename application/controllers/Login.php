<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

class login extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->library('form_validation');

        $this->load->library('encryption');

        $this->load->library("breadcrumbs");

        $this->load->library('auth', array('isSigningIn' => TRUE));

        if($this->session->has_userdata('user')) {

            redirect('dashboard');
        }

    }

    public function index() {

        $data['pageTitle'] = "Login";
        
        $this->breadcrumbs->setActive('Login');

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
        
        if ($result['status'] === 'SUCCESS') {

            $this->auth->signIn($result);
        }

        $data['response'] = array('result' => $result['status']);

        echo json_encode($data);
    }

    public function logout() {

        $this->auth->signOut();
    }
}