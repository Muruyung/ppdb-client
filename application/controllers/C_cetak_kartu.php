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

class C_cetak_kartu extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		// $this->API = api_url();
		$this->API = api_url();
		// $this->API=decrypt_url($this->session->userdata('api'));

		// $this->API="http://localhost:55620/api";
	}

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
		if (!is_null($_GET['token'])){
			$data['siswa'] = json_decode($this->curl->simple_get($this->API.'get_siswa', array('where'=>['id'=>decrypt_url($_GET['token'])]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
			if (!is_null($data['siswa']) && $data['siswa'] != 401){
				$data['nilai'] = json_decode($this->curl->simple_get($this->API.'get_nilai', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true);
				if (!is_null($data['nilai']) || $data['nilai'][0] != 401){
					$data['password'] = '';
					if (!is_null($this->session->userdata('data_login')) && $this->session->userdata('id_user_login') == $_GET['token']){
						$login['where'] = array(
							'username' => $data['siswa']['nisn'],
							'password' => decrypt_url($this->session->userdata('data_login')['password'])
						);
						$result = json_decode($this->curl->simple_get($this->API.'get_user', $login, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
						if(!is_null($result) && $result != 401){
							$data['password'] = decrypt_url($this->session->userdata('data_login')['password']);
						}
					}
					$data['provinsi']	 	= json_decode($this->curl->simple_get($this->API.'get_provinsi', array('where'=>['id_prov'=>$data['siswa']['provinsi']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['kabupaten'] 	 	= json_decode($this->curl->simple_get($this->API.'get_kabupaten', array('where'=>['id_prov'=>$data['siswa']['provinsi']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['kecamatan'] 	 	= json_decode($this->curl->simple_get($this->API.'get_kecamatan', array('where'=>['id_kab'=>$data['siswa']['kabupaten']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['desa'] 		 	= json_decode($this->curl->simple_get($this->API.'get_desa', array('where'=>['id_kec'=>$data['siswa']['kecamatan']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['file'] 		 	= json_decode($this->curl->simple_get($this->API.'get_file', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true);
					$data['ortu'] 		 	= json_decode($this->curl->simple_get($this->API.'get_ortu', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true);
					$data['pendaftaran'] 	= json_decode($this->curl->simple_get($this->API.'get_pendaftaran', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['ada_prestasi']	= 'false';
					if($data['pendaftaran']['jalur_daftar'] == 'prestasi'){
						$data['ada_prestasi']  = 'true';
						$data['prestasi']  = json_decode($this->curl->simple_get($this->API.'get_prestasi', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true);
					}
			
					// print_r($data['file']);
					$data['halaman'] = 'cetak_form';
					$this->load->view('content/V_cetak_kartu', $data);
				}else{
					redirect(base_url());
				}
			}else{
				redirect(base_url());
			}
		}else{
			redirect(base_url());
		}
	}
}
