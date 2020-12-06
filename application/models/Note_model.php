<?php

defined("BASEPATH") OR exit('No direct script access allowed!');

class Note_model extends CI_Model{

	public function __construct() {

		$this->load->database();
	}

	public function save($data) {	
		// user_id, title, content
		$success = $this->db->query('CALL admSaveNote(?,?,?)', $data);

		if($success) {

			return SUCCESS;
		}

		return FAILED;
	}

	public function all($sortOrder) {

		$result = $this->db->query('CALL admSelectAllNotes(?, ?, ?)', $sortOrder); 

		if($result) {

			return $result->result_array(); 
		}

		return FAILED;
	}

	public function truncate($userId) {

		$result = $this->db->query('CALL admTruncateNotes(?)', $userId);

		if($result) {

			return SUCCESS;
		}

		return FAILED;
	}

	public function remove($id) {

		$result = $this->db->query('CALL admRemoveNote(?)', $id);

		if($result) {

			return SUCCESS;
		}

		return FAILED;
	}
}