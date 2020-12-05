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

	public function all($sortBy) {

		$result = $this->db->query('CALL admSelectAllNotes(?)', $sortBy); 

		return $result->result_array(); 
	}
}