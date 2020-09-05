<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

class Login_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function verifyCredentials($username, $password) {
        if($username == 'rheymondangue3@gmail.com') {
            if($password == 'Protection') return 'success';
            else return 'failed';
        }
        else return 'failed';
    }
}