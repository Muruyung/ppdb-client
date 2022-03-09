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

class C_cara_daftar extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		// $this->API = 'https://'.encrypt_url("svc-mc1").'.man1cianjur.com/';
		$this->API = 'http://localhost/ppdb_man_1_cianjur/service/';
	}

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
		// $this->session->set_userdata(['api'=>encrypt_url($api)]);
		$data['halaman'] = 'cara_daftar';
		$data['login'] = 'false';
		if (!is_null($this->session->userdata('data_login'))){
			$login['where'] = array(
				'username' =>$this->session->userdata('data_login')['username'],
				'password' => decrypt_url($this->session->userdata('data_login')['password'])
			);
			$result = json_decode($this->curl->simple_get($this->API.'get_user', $login, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
			// print_r($result);
			if(is_null($result) || $result == 401){
				$this->load->view('headfoot/header', $data);
				$this->load->view('content/V_cara_daftar');
				$this->load->view('headfoot/footer');
			}else{
				redirect(base_url());
			}
		}else{
			$this->load->view('headfoot/header', $data);
			$this->load->view('content/V_cara_daftar');
			$this->load->view('headfoot/footer');
		}
	}
}
