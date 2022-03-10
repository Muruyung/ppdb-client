<?php
/******************************************
* Filename    : C_edit_daftar.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-10
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Controller untuk cetak data pendaftaran
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cetak_kelulusan extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		// $this->API = 'https://'.encrypt_url("svc-mc1").'.man1cianjur.com/';
		$this->API = api_url();
		// $this->API=decrypt_url($this->session->userdata('api'));

		// $this->API="http://localhost:55620/api";
	}

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
		if (!is_null($this->session->userdata('data_login'))){
			$login['where'] = array(
				'username' =>$this->session->userdata('data_login')['username'],
				'password' => decrypt_url($this->session->userdata('data_login')['password'])
			);
			$result = json_decode($this->curl->simple_get($this->API.'get_user', $login, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
			// $result = json_decode($this->curl->simple_get($this->API.'get_siswa', array('where'=>['id'=>$result['id_user']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
			// print_r($result);
			if(is_null($result) || $result == 401){
				redirect(base_url());
			}else{
				// Get data untuk dicetak
				$data['siswa'] 		 = json_decode($this->curl->simple_get($this->API.'get_siswa', array('where'=>['id'=>decrypt_url($this->session->userdata('id_user_login'))]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
				$data['pendaftaran'] = json_decode($this->curl->simple_get($this->API.'get_pendaftaran', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
				$data['ada_prestasi']  = 'false';

				// Tanggal kelulusan
				if ($data['pendaftaran']['jalur_daftar'] == "prestasi"){
					$data['tgl_pengumuman'] = "22 Juni";
					$data['tgl_akhir_registrasi'] = "26 Juni";
				}else{
					$data['tgl_pengumuman'] = "... Juni";
					$data['tgl_akhir_registrasi'] = "... Juni";
				}

				// print_r($data['file']);
		    	$data['halaman'] = 'cetak_form';
				$this->load->view('content/V_cetak_kelulusan', $data);
			}
		}else{
			redirect(base_url());
		}
	}
}
