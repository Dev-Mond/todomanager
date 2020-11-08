<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

class Register_model extends CI_Model {

    public function __construct() {

        parent::__construct();

        $this->load->database();
    }

    public function add($data) {

        if($this->db->insert('adm_account', $data)) {

            return 'SUCCESS';
        }
        
        return 'FAILED';
    }
}