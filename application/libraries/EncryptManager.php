<?php
defined('BASEPATH') OR exit('No direct script allowed!');

class EncryptManager {

    private $ci;

    public function __construct() {
        $this->ci =& get_instance();
        $this->ci->load->library('encryption');
    }

    public function encrypt($password) {
        $hash_password = $this->ci->encryption->encrypt($password);
        return $hash_password;
    }

    public function decrypt($hash_password) {
        $password = $this->ci->encryption->decrypt($hash_password);
        return $password;
    }

    public function is_matched($password, $hash_password) {
        if(decrypt($hash_password) === $password) {
            return "TRUE";
        }
        return  "FALSE";
    }
}