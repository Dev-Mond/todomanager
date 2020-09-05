<?php
defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 *  Dashboard controller
 * 
 */
class Home extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        
    }

    public function index() {
        $data['pageTitle'] = "Home | Todo Manager";
        if (!$this->session->has_userdata('user')) {
            redirect('login/index');
        }
        $this->load->view('layout/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('layout/footer', $data);
    }
}