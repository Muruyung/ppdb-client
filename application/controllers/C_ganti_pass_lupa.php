<?php
/******************************************
* Filename    : C_lupa_pass_lupa.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-09
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Controller untuk mengganti password yang lupa
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ganti_pass_lupa extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		// $this->API = api_url();
		$this->API = api_url();
	}

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
		redirect(base_url());
	}
	
	function abdi_hilap_kedah_gentos($user = ""){
		if (!empty($this->input->post('nisn')) && $user == ""){
			$user = encrypt_url(encrypt_url($this->input->post('nisn')));
		}
		if ($user == ""){
			redirect(base_url());
		}else{
			$data['where'] = array(
				'username'  => decrypt_url(decrypt_url($user))
			);
			$get_user = json_decode($this->curl->simple_get($this->API.'Get_user', $data, array(CURLOPT_BUFFERSIZE => 10)), true);
			if (!is_null($get_user) && $get_user[0] != '401'&& $get_user[0]['konfirmasi_lupa'] == 1){
				$this->session->set_userdata(['data_lupa'=>['username'=>$user]]);
				$data['halaman'] = 'ganti_lupa_pass';
				// print_r($get_user);
				$this->load->view('headfoot/header', $data);
				$this->load->view('content/V_ganti_pass_lupa');
				$this->load->view('headfoot/footer');
			}else{
				redirect(base_url());
			}
		}
	}

	function gentos_heula_ah_pass_na($baru = ""){
		if ($baru == ""){
			redirect(base_url());
		}else{
			$data['where'] = array(
				'username' => decrypt_url(decrypt_url($this->session->userdata('data_lupa')['username']))
			);
			$data['data'] = array(
				'password'  		=> $baru,
				'kesempatan_email' 	=> 5,
				'kesempatan_lupa'  	=> 5,
				'konfirmasi_lupa'  	=> 0
			);
			$user =  $this->curl->simple_put($this->API.'Set_user', $data, array(CURLOPT_BUFFERSIZE => 10));
			// print_r($data);
			if (!is_null($user) && $user != '502'){
				$this->session->set_flashdata('hasil','Update Data Berhasil');
				$this->session->sess_destroy();
				echo 1;
			}else{
				$this->session->set_flashdata('hasil','Insert Data Gagal');
				echo -1;
			}
		}
	}
}
