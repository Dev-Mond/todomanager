<?php
defined("BASEPATH") or exit("No direct script access allowed!");

class Workspace extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->library("breadcrumbs");
    }

    public function create() {

        $data['pageTitle'] = "Workspace";

        if (!$this->session->has_userdata('user')) {

            redirect('login');
        }

        $this->breadcrumbs->setActive('Workspace');

        $this->breadcrumbs->add('Home', base_url());

        $data['breadcrumbs'] = $this->breadcrumbs;

        $this->load->view('layout/header', $data);

        $this->load->view('workspace/create', $data);
        
        $this->load->view('layout/footer', $data);
    }
}