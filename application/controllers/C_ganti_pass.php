<?php
/******************************************
* Filename    : C_ganti_pass.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-09
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Controller untuk mengganti password
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ganti_pass extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		// $this->API = 'https://'.encrypt_url("svc-mc1").'.man1cianjur.com/';
		$this->API = api_url();
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
				$data['halaman'] = 'ganti_pass';
				$this->session->set_userdata(['token_kelulusan'=>"kosong"]);
				$this->load->view('headfoot/header_login', $data);
				$this->load->view('content/V_ganti_pass');
				$this->load->view('headfoot/footer');
			}
		}else{
			redirect(base_url());
		}
	}

	// proses untuk cek password
	function get($lama){
		$data['where'] = array(
			'username'  => $this->session->userdata('data_login')['username'],
			'password'  => $lama
		);
    	// $this->API='https://svc-mc1.ppdb-man-1-cianjur.com/';
    	
    	$user = json_decode($this->curl->simple_get($this->API.'Get_user', $data, array(CURLOPT_BUFFERSIZE => 10)), true);
    	// print_r($user);
    	if (!is_null($user) && $user[0] != '401'){
    	  // print_r($_SESSION);
    	  echo 1;
    	}else{
    	  echo -1;
    	}
	}

	function set(){
		$data['where'] = array(
			'username' => $this->session->userdata('data_login')['username'],
			'password' => decrypt_url($this->session->userdata('data_login')['password'])
		);
		$data['data'] = array(
			'password'  => $this->input->post('pass_baru')
		);
		$user =  $this->curl->simple_put($this->API.'Set_user', $data, array(CURLOPT_BUFFERSIZE => 10));
		// print_r($data);
		if (!is_null($user) && $user != '502'){
			$this->session->set_flashdata('hasil','Update Data Berhasil');
			$this->session->set_userdata(['data_login'=>['username' =>$this->session->userdata('data_login')['username'], 'password'=>encrypt_url($this->input->post('pass_baru'))]]);
			redirect(base_url());
		}else{
			$this->session->set_flashdata('hasil','Insert Data Gagal');
			echo "gagal";
		}
	}
}
