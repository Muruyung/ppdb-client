<?php
/******************************************
* Filename    : C_lupa_pass1.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-09
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Controller untuk mengganti password yang lupa
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lupa_pass1 extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		// $this->API = api_url();
		$this->API = 'http://localhost/ppdb_man_1_cianjur/service/';
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
			if((is_null($result) || $result == 401) && !is_null($this->session->userdata('data_lupa'))){
				$data['halaman'] = 'lupa_pass';
				$this->session->set_userdata(['token_kelulusan'=>"kosong"]);
				$this->load->view('headfoot/header', $data);
				$this->load->view('content/V_lupa_pass1');
				$this->load->view('headfoot/footer');
			}else{
				redirect(base_url());
			}
		}else{
			if (!is_null($this->session->userdata('data_lupa'))){
				$data['halaman'] = 'lupa_pass';
				$this->session->set_userdata(['token_kelulusan'=>"kosong"]);
				$this->load->view('headfoot/header', $data);
				$this->load->view('content/V_lupa_pass1');
				$this->load->view('headfoot/footer');
			}else{
				redirect(base_url());
			}
		}
	}
}
