<?php

defined("BASEPATH") OR exit('No direct script access allowed!');

class Note_model extends CI_Model{

	public function __construct() {

		$this->load->database();
	}

	public function save($data) {	
		$result = $this->db->query('CALL noteSaveData(?,?,?)', $data);
	}
}