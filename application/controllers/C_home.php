<?php
/******************************************
* Filename    : C_home.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-02
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Controller untuk halaman beranda
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		$this->API = api_url();
		
	}

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
		// $this->session->set_userdata(['api'=>encrypt_url($api)]);
		$data['halaman'] = 'beranda';
		$data['login'] = 'false';
		if (!is_null($this->session->userdata('data_login'))){
			$login['where'] = array(
				'username' => $this->session->userdata('data_login')['username'],
				'password' => decrypt_url($this->session->userdata('data_login')['password'])
			);
			$result = json_decode($this->curl->simple_get($this->API.'get_user', $login, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
			// print_r($result);
			if(is_null($result) || $result == 401){
				$this->load->view('headfoot/header', $data);
				$this->load->view('content/V_home');
				$this->load->view('headfoot/footer');
			}else{
				if ($result['tahap_daftar'] == 0){
					$result = json_decode($this->curl->simple_get($this->API.'get_siswa', array('where'=>['id'=>decrypt_url($result['id_user'])]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['login'] = 'true';
					$data['nama'] = $result['nama'];
					$this->session->set_userdata(['token_kelulusan'=>"kosong"]);
					$this->session->set_userdata(['id_user_login'=>encrypt_url($result['id'])]);
					$this->load->view('headfoot/header_login', $data);
					$this->load->view('content/V_home');
					$this->load->view('headfoot/footer');
				}else{
					redirect('c_daftar');
				}
			}
		}else{
			$this->load->view('headfoot/header', $data);
			$this->load->view('content/V_home');
			$this->load->view('headfoot/footer');
		}
	}

	function logout(){
		$this->session->sess_destroy();
    	redirect('c_login');
	}

	function kelulusan(){
		$this->session->set_userdata(['token_kelulusan'=>encrypt_url($this->session->userdata("id_user_login"))]);
		redirect('c_kelulusan');
	}
}
