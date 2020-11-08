<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

class Migrate extends CI_Controller {
	
	public function __construct () {

		parent::__construct();

		if (!$this->input->is_cli_request()) {

			redirect('dashboard');
		}

		$this->load->library('migration');
	}

	public function version ($version) {

		$migration = $this->migration->version($version);

		if (!$migration) {

			echo $this->migration->error_string();
		}
		else {

			echo 'Migration done' . PHP_EOL;
		}
	}

	public function current () {

		$migration = $this->migration->current();

		if (!$migration) {

			echo $this->migration->error_string();

			return;
		} 

		echo 'Migrated: ' . $migration . PHP_EOL;
	}

	public function generate ($name = false) {

		if(!$name) {

			echo 'Please define migration name' . PHP_EOL;

			return;
		}

		if (!preg_match('/^[a-z_]+$/', $name)) {

			if (strlen($name) < 4) {

				echo 'Migration name must have atleast 4 characters long' . PHP_EOL;
				
				return;
			}

			echo 'Invalid migration name. allowed characters: a-z and _\nExample: my_blog' . PHP_EOL;

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

			echo 'Migration created successfully. \nLocation: ' . $filepath .PHP_EOL;

		} 
		catch (Exception $e) {

			echo 'Error:' . $e->getMessage() . PHP_EOL;
		}
	}
}