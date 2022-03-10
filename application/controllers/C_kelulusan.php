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

class C_kelulusan extends CI_Controller {

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
				// $date_ex = date_create("2020-05-31");
				// $date_now = date_create(date("Y-m-d"));
				// $diff = date_diff($date_ex, $date_now);
				if ($this->session->userdata('token_kelulusan') == encrypt_url($this->session->userdata("id_user_login"))){
					if ($result['tahap_daftar'] == 0){
						$data['siswa'] = json_decode($this->curl->simple_get($this->API.'get_siswa', array('where'=>['id'=>decrypt_url($this->session->userdata('id_user_login'))]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
						$data['pendaftaran'] = json_decode($this->curl->simple_get($this->API.'get_pendaftaran', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
						$data['halaman'] = 'kelulusan';
						$this->load->view('headfoot/header_login', $data);
						$this->load->view('content/V_kelulusan');
						$this->load->view('headfoot/footer');
					}else{
						redirect('c_daftar');
					}
				}else{
					redirect(base_url());
				}
			}
		}else{
			redirect(base_url());
		}
	}
}
