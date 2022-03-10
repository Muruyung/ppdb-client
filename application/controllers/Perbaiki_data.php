<?php
/******************************************
* Filename    : C_pemberitahuan.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-02
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Controller untuk halaman cara pendaftaran
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class Perbaiki_data extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		$this->API = api_url();
		
	}

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
		$admin['username']	= encrypt_url('muruyung');
		$admin['password']	= encrypt_url('$dollarr');
		$siswa 		 		= json_decode($this->curl->simple_get($this->API.'get_all_siswa', $admin, array(CURLOPT_BUFFERSIZE => 10)), true);
		$admin['jenis']		= "scan_akte";
		$file 		 		= json_decode($this->curl->simple_get($this->API.'get_all_file', $admin, array(CURLOPT_BUFFERSIZE => 10)), true);
		foreach($siswa as $_siswa){
			$jenis = "";
			foreach($file as $_file){
				if ($_file['id_user'] == $_siswa['id']){
					$jenis = explode(".", decrypt_url($_file['path']));
					break;
				}
			}
			$fotoid = './assets/usr/'.$_siswa['nisn'].encrypt_url('11'.$_siswa['nisn']).'/'.$_siswa['nisn'].'_scan_akte.'.$jenis[2];
			
			$filedata['where'] = array(
				'id_user' 	=> $_siswa['id'],
				'jenis'		=> "scan_akte"
			);
			$filedata['data'] = array(
				'path'		=> encrypt_url($fotoid)
			);
			$update =  $this->curl->simple_put($this->API.'set_file', $filedata, array(CURLOPT_BUFFERSIZE => 0));
		}
		// print_r($file);
		echo "rengse";
	}
}
