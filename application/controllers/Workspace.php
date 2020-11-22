<?php
defined("BASEPATH") or exit("No direct script access allowed!");

class Workspace extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->library("breadcrumbs");

        $this->load->library('auth');
    }

    public function create() {

        $data['pageTitle'] = "Workspace";

        $this->breadcrumbs->setActive('Workspace');

        $data['breadcrumbs'] = $this->breadcrumbs;

        $this->load->view('layout/header', $data);

        $this->load->view('workspace/create', $data);
        
        $this->load->view('layout/footer', $data);
    }
}