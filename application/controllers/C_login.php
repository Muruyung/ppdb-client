<?php
/******************************************
* Filename    : C_login.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-10
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Controller untuk login
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		$this->API = api_url();
		// $this->API = 'http://localhost/ppdb_man_1_cianjur/service/';
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
				$data['halaman'] = 'login';
				$this->load->view('headfoot/header', $data);
				$this->load->view('content/V_login');
				$this->load->view('headfoot/footer');
			}else{
				if ($result['tahap_daftar'] == 0){
					redirect('C_home');
				}else{
					redirect('c_daftar');
				}
			}
		}else{
			$data['halaman'] = 'login';
			$this->load->view('headfoot/header', $data);
			$this->load->view('content/V_login');
			$this->load->view('headfoot/footer');
		}

	}

	// proses untuk cek login
	function get($username, $password){
		$data['where'] = array(
			'username'  => $username,
			'password'  => $password
		);
		// $this->API='https://svc-mc1.ppdb-man-1-cianjur.com/';
		// $this->API = 'http://localhost/ppdb_man_1_cianjur/service/';
		$user = json_decode($this->curl->simple_get($this->API.'Get_user', $data, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
			// print_r($user);
		if (!is_null($user) && $user != '401'){
				$this->session->set_userdata(['data_login'=>['username'=>$data['where']['username'], 'password'=>encrypt_url($data['where']['password'])]]);
		// session_destroy();
		// print_r($_SESSION);
			echo 1;
		}else{
			echo -1;
		}
	}
}
