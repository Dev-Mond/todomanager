<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

class Register extends CI_Controller {

    public function __contruct() {

        parent::__contruct();

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

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[5]');

        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]');

        $this->form_validation->set_rules('confirmation', 'Password Confirmation', 'trim|required|matches[password]');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[adm_account.email]');

        if($this->form_validation->run() == FALSE) {

            $data['status'] = 'FAILED';

            $data['error'] = validation_errors();
        }
        else {

            $this->load->library('encryptmanager');

            $user['p_username'] = $this->input->post('username');

            $user['p_password'] = $this->encryptmanager->encrypt($this->input->post('password'));

            $user['p_email'] = $this->input->post('email');

            $this->load->model('register_model', 'register');

            if($this->register->add($user) === 'SUCCESS') {

                $data['user_data'] = $user;

                $data['status'] = 'SUCCESS';
            }
            else {
                $data['status'] = 'FAILED';
                
                $data['error'] = 'Encountered a problem in saving the data!';
            }
        }
        
        echo json_encode($data);
    }
}