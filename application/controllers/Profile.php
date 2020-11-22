<?php

defined("BASEPATH") OR exit('No direct script access allowed!');

class Profile extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library('breadcrumbs');

		$this->load->library('auth');
	}

	public function index() {

		$data['pageTitle'] = 'Profile';

		$this->breadcrumbs->setActive('Profile');

		$data['breadcrumbs'] = $this->breadcrumbs;

		$this->load->view('layout/header', $data);

	    $this->load->view('home/profile', $data);
	    
	    $this->load->view('layout/footer', $data);
	}
}