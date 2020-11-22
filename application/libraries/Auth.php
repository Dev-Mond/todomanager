<?php

defined("BASEPATH") OR exit('No direct script access allowed!');

class Auth {

	private $ci;

	public $credentials;

	public function __construct($isSigningIn = FALSE) {

		$this->ci =& get_instance();

		if(!$isSigningIn) {

			$this->isSignedIn();
		}
	}

	public function isSignedIn() {

		if(!$this->ci->session->has_userdata('user')) {

			redirect('login');
		}

		else {

			$this->credentials = $this->ci->session->userdata('user');

			return TRUE;
		}
	}

	public function signIn($credentials) {

		$this->ci->session->set_userdata('user', $credentials);

		$this->credentials = $credentials;
	}

	public function signOut() {
		
		if($this->ci->session->has_userdata('user')) {

			$this->ci->session->unset_userdata('user');

			redirect('login');
		}
	}
}