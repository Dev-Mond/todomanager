<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

class Migrate extends CI_Controller {
	
	private $cred_username = '5695d8a5e07bf9dbfc73f3bb77109959';

	private $cred_password = '3cef55b0a2a0c8e2648634851935eb51';

	public function __construct () {

		parent::__construct();

		if (!$this->input->is_cli_request()) {

			redirect('dashboard');
		}
		
		$this->load->library('migration');
		
	}

	public function version ($version) {

		if(!$this->loginPath(true)) {

			echo 'Please Login first! ' . PHP_EOL . 'Type: migrate cliLogin [your username] [your password]' . PHP_EOL;

			return;
		}

		$migration = $this->migration->version($version);

		if (!$migration) {

			echo $this->migration->error_string();
		}
		else {

			echo 'Migration done' . PHP_EOL;
		}
	}

	public function cliLogin ($username, $password) {

		if (!$this->loginPath(true)) {

			if(!preg_match('/[a-zA-Z0-9]/', $username) || !preg_match('/[a-zA-Z0-9]/', $password)) {

				echo 'Wrong username or password.';

				return FALSE;
			}

			if ($username === $this->cred_username && $password === $this->cred_password) {

				if ($this->loginPath()) {
					
					echo 'Welcome to Migration.';

					return TRUE;
				}

				
			} 
			
			echo 'Wrong username or password.';

			return FALSE;
		}
		
		return TRUE;
	}

	public function quit() {

		if ($this->loginPath(true)) {

			rmdir(APPPATH . 'cliCreds');
		}
	}

	public function current () {

		if(!$this->loginPath(true)) {

			echo 'Please Login first! ' . PHP_EOL . 'Type: migrate cliLogin [your username] [your password]' . PHP_EOL;

			return;
		}

		$migration = $this->migration->current();

		if (!$migration) {

			echo $this->migration->error_string();

			return;
		} 

		echo 'Migrated: ' . $migration . PHP_EOL;
	}

	public function generate ($name = false) {

		if(!$this->loginPath(true)) {

			echo 'Please Login first!' . PHP_EOL . 'Type: migrate cliLogin [your username] [your password]' . PHP_EOL;

			return;
		}

		if(!$name) {

			echo 'Please define migration name' . PHP_EOL;

			return;
		}

		if (!preg_match('/^[a-z_]+$/', $name)) {

			if (strlen($name) < 4) {

				echo 'Migration name must have atleast 4 characters long' . PHP_EOL;
				
				return;
			}

			echo 'Invalid migration name. allowed characters: a-z and _' . PHP_EOL . 'Example: my_blog' . PHP_EOL;

			return;
		}

		$filename = date('YmdHis') . '_' . $name . '.php';

		try {
			
			$folderpath = APPPATH . 'migrations';

			if (!is_dir($folderpath)) {
				
				try {
					
					mkdir($folderpath);
				} 
				catch (Exception $e) {

					echo 'Error:' . $e->getMessage() . PHP_EOL;
				}
			}

			$filepath = APPPATH . 'migrations/' . $filename;

			if (file_exists($filepath)) {

				echo 'File already exists '. $filename . PHP_EOL;

				return;
			}

			$data['className'] = ucfirst($name);

			$data['tableName'] = $name;

			$template = $this->load->view('cli/migration/migration_class_template', $data, TRUE);

			try {
				
				$file = fopen($filepath, 'w');
				
				$content = '<?php' . $template;	

				fwrite($file, $content);

				fclose($file);
			} 
			catch (Exception $e) {
				
				echo 'Error:' . $e->getMessage() . PHP_EOL;
			}

			echo 'Migration created successfully. ' . PHP_EOL . 'Location: ' . $filepath .PHP_EOL;

		} 
		catch (Exception $e) {

			echo 'Error:' . $e->getMessage() . PHP_EOL;
		}
	}

	public function loginPath($find = false) {

		try {

			$folderpath = APPPATH . 'cliCreds';

			if($find) {

				if(file_exists($folderpath)) {
				
					return TRUE;
				}

				return FALSE;
			}
			else {

				if(file_exists($folderpath)) {
				
					return TRUE;
				}

				mkdir($folderpath);

				return TRUE;	
			}
			
		} 
		catch (Exception $e) {
			
			echo 'Error: ' . $e->getMessage() . PHP_EOL;

			return FALSE;
		}
	}
}