<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addon_model extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }

	function get_addons($addon_id = ""){
		if($addon_id > 0){
			$this->db->where('id', $addon_id);
		}
		return $this->db->get_where('addons');
	}

	public function install_addon() {

		// CHECK IF THE ADDON FORLDER INSIDE CONTROLLERS EXISTS
		if (!is_dir('application/controllers/addons')){
			mkdir("application/controllers/addons", 0777, true);
		}

		// CHECK IF THE ADDON FORLDER INSIDE MODELS EXISTS
		if (!is_dir('application/models/addons')){
			mkdir("application/models/addons", 0777, true);
		}

		$zipped_file_name = $_FILES['addon_zip']['name'];

		if (!empty($zipped_file_name)) {
			// Create update directory.
			$dir = 'uploads/addons';
			if (!is_dir($dir))
				mkdir($dir, 0777, true);

			$path = "uploads/addons/".$zipped_file_name;
			move_uploaded_file($_FILES['addon_zip']['tmp_name'], $path);
			//Unzip uploaded update file and remove zip file.
			$zip = new ZipArchive;
			$res = $zip->open($path);
			if ($res === TRUE) {
				$zip->extractTo('uploads/addons');
				$zip->close();
				unlink($path);
			}

			$unzipped_file_name = substr($zipped_file_name, 0, -4);
			$config_str = file_get_contents('uploads/addons/' . $unzipped_file_name . '/config.json');
			$config = json_decode($config_str, true);

			// CREATE DIRECTORIES
			if (!empty($config['directories'])) {
				foreach ($config['directories'] as $directory) {
					if (!is_dir($directory['name'])){
						mkdir($directory['name'], 0777, true);
					}
				}
			}

			// CREATE OR REPLACE NEW FILES
			if (!empty($config['files'])) {
				foreach ($config['files'] as $file){
					copy($file['root_directory'], $file['update_directory']);
				}
			}

			// EXECUTE THE SQL FILE
			if (!empty($config['sql_file'])) {
				require './uploads/addons/'.$unzipped_file_name.'/sql/'.$config['sql_file'];
			}

			// INSERT OR UPDATE AN ENTRY ON DATABASE

			$data['name'] = $config['name'];
			$data['unique_identifier'] = $config['unique_identifier'];
			$data['version'] = $config['version'];
			$data['status'] = 1;

			//CHECK IF THE ADDON IS ALREADY INSTALLED OR NOT
			$addon_details = $this->db->get_where('addons', array('unique_identifier' => $data['unique_identifier']));

			if ($addon_details->num_rows() > 0) {
				$data['updated_at'] = strtotime(date('d-m-y'));
				$this->db->where('unique_identifier', $data['unique_identifier']);
				$this->db->update('addons', $data);

			}else{
				$data['created_at'] = strtotime(date('d-m-y'));
				$this->db->insert('addons', $data);
			}


			$response = get_phrase('addon_installed_successfully');
		}else{
			$response = get_phrase('no_addon_found');
		}
		$this->remove_from_uploads($unzipped_file_name);
		return $response;
	}

	public function remove_from_uploads($folder_name) {
		$dir = 'uploads/addons/'.$folder_name;
		$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
		$files = new RecursiveIteratorIterator($it,
		RecursiveIteratorIterator::CHILD_FIRST);
		foreach($files as $file) {
			if ($file->isDir()){
				rmdir($file->getRealPath());
			} else {
				unlink($file->getRealPath());
			}
		}
		rmdir($dir);
	}

	function addon_activate($param1 = ""){
		$this->db->where('id', $param1);
		$this->db->update('addons', array('status' => 1));
	}
	function addon_deactivate($param1 = ""){
		$this->db->where('id', $param1);
		$this->db->update('addons', array('status' => 0));
	}
	function addon_delete($param1 = ""){
		$this->db->where('id', $param1);
		$this->db->delete('addons');
	}


}