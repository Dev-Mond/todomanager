<?php
defined("BASEPATH") OR exit('No direct script access allowed!');

class Dashboard extends CI_Controller {

    public function __construct() {

        parent::__construct();
    }

    public function index() {

        $data['pageTitle'] = "Dashboard";

        if (!$this->session->has_userdata('user')) {

            redirect('login');
        }

        $this->breadcrumbs->setActive('Dashboard');

        $data['breadcrumbs'] = $this->breadcrumbs;

        $this->load->view('layout/header', $data);

        $this->load->view('home/dashboard', $data);
        
        $this->load->view('layout/footer', $data);
    }
}