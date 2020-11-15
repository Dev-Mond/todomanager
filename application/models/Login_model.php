<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

class Login_model extends CI_Model {

    public function __construct(){

        parent::__construct();

        $this->load->database();

        $this->load->library('encryptmanager');
    }

    public function verifyCredentials($username, $password) {
        
        $result = $this->db->query('CALL admGetUserByUsername(?)', $username); 
        
        $arrResult = array("status" => "FAILED");

        foreach ($result->result_array() as $value) {

            if ($this->encryptmanager->decrypt($value['password']) == $password) {

                $arrResult =  array("status" => "SUCCESS","username" => $username, "email" => $value['email']);

                return $arrResult;
            }
        }

        return $arrResult;
    }
}