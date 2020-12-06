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

		$sortBy = $this->input->post('sort_by');

		$sortType = $this->input->post('sort_type');

		$data['p_user_id'] = $this->auth->credentials['id'];

		$data['p_sort_by'] = $sortBy;

		$data['p_sort_type'] = $sortType;

		$this->load->model('Note_model', 'notes');

		$output = $this->notes->all($data);

		if($output === FAILED) {

			$result['sort_by'] = $sortBy;

			$result['sort_type'] = $sortType;

			$result['status'] = FAILED;
		}
		else {

			$result['rows'] = $output;

			$result['sort_by'] = $sortBy;

			$result['sort_type'] = $sortType;

			$result['status'] = SUCCESS;
		}

		echo json_encode($result);
	}

	public function remove( $id = false ) {

		$this->load->model('Note_model', 'notes');

		$result['status'] = FAILED;
		// remove all
		if(!$id) {

			$param['p_user_id'] = $this->auth->credentials['id'];

			if ($this->notes->truncate($param)) {

				$result['status'] = SUCCESS;
			}
			else {

				$result['error'] = $this->db->error_message();
			}
		}
		// remove spicific row
		else {

			$param['p_user_id'] = $this->auth->credentials['id'];
			$param['p_id'] = $id;

			if($this->notes->remove($param)) {

				$result['status'] = SUCCESS;
			}
			else {

				$result['error'] = $this->db->error_message();
			}
		}

		echo json_encode($result);
	}
}