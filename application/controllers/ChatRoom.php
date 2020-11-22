<?php

defined("BASEPATH") OR exit('No direct script access allowed!');

class ChatRoom extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library('breadcrumbs');

		$this->load->library('auth');
	}

	public function index() {

		$data['pageTitle'] = 'Chat Room';

		$this->breadcrumbs->setActive('Chat Room');

		$data['breadcrumbs'] = $this->breadcrumbs;

		$this->load->view('layout/header', $data);

	    $this->load->view('home/chatroom', $data);
	    
	    $this->load->view('layout/footer', $data);
	}
}