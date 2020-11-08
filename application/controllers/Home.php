<?php
defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 *  Dashboard controller
 * 
 */
class Home extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->library("breadcrumbs");
    }

    public function index() {

        if($this->session->has_userdata('user')){

            redirect("dashboard");
        }
        
        $data['pageTitle'] = "Home";

        $this->breadcrumbs->setActive('Home');

        $data['breadcrumbs'] = $this->breadcrumbs;
        
        $this->load->view('layout/header', $data);

        $this->load->view('home/index', $data);
        
        $this->load->view('layout/footer', $data);
    }

}