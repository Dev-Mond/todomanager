<?php

defined('BASEPATH') OR exit('No direct script access allowed!');

class Notes extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library('breadcrumbs');

		$this->load->library('auth');
	}

	public function index() {

		$data['pageTitle'] = 'Notes';

		$this->breadcrumbs->setActive('Notes');

	    $data['breadcrumbs'] = $this->breadcrumbs;

	    $this->load->view('layout/header', $data);

	    $this->load->view('home/notes', $data);
	    
	    $this->load->view('layout/footer', $data);
	}

	public function saveNote() {

		$title = $this->input->post('title');
		
		$content = $this->input->post('content');
		
		$data['result'] = FAILED;

		if(!empty($title)) {

			$this->load->model('Note_model', 'notes');

			$dbData['p_user_id'] = $this->auth->credentials['id'];

			$dbData['p_title'] = $title;

			$dbData['p_content'] = $content;

			if($this->notes->save($dbData) === SUCCESS) {

				$data['result'] = SUCCESS;

				$data['data'] = $dbData;
			}
		}

		echo json_encode($data);
	}

	public function getNotes() {

		$result['status'] = FAILED;

		$sortby = $this->input->post('sortby');

		$data['sortby'] = $sortby;

		if($sortby) {

			$this->load->model('Note_model', 'notes');

			$result['rows'] = $this->notes->all($data);

			$result['sortby'] = $sortby;

			$result['status'] = SUCCESS;
		}

		echo json_encode($result);
	}
}