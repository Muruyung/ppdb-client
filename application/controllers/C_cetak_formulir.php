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

class C_cetak_formulir extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		// $this->API = 'https://'.encrypt_url("svc-mc1").'.man1cianjur.com/';
		$this->API = 'http://localhost/ppdb_man_1_cianjur/service/';
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
				if ($result['tahap_daftar'] == 0){
					// Get data untuk dicetak
					$data['siswa'] 		 	 = json_decode($this->curl->simple_get($this->API.'get_siswa', array('where'=>['id'=>decrypt_url($this->session->userdata('id_user_login'))]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['provinsi']	 	 = json_decode($this->curl->simple_get($this->API.'get_provinsi', array('where'=>['id_prov'=>$data['siswa']['provinsi']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['kabupaten'] 	 = json_decode($this->curl->simple_get($this->API.'get_kabupaten', array('where'=>['id_kab'=>$data['siswa']['kabupaten']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['kecamatan'] 	 = json_decode($this->curl->simple_get($this->API.'get_kecamatan', array('where'=>['id_kec'=>$data['siswa']['kecamatan']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['desa'] 		 	 = json_decode($this->curl->simple_get($this->API.'get_desa', array('where'=>['id_kel'=>$data['siswa']['desa']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['file'] 		 	 = json_decode($this->curl->simple_get($this->API.'get_file', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['nilai'] 		 	 = json_decode($this->curl->simple_get($this->API.'get_nilai', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true);
					$data['ortu'] 		 	 = json_decode($this->curl->simple_get($this->API.'get_ortu', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true);
					$data['pendaftaran'] = json_decode($this->curl->simple_get($this->API.'get_pendaftaran', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['ada_prestasi']  = 'false';
					if($data['pendaftaran']['jalur_daftar'] == 'prestasi'){
						$data['ada_prestasi']  = 'true';
						$data['prestasi']  = json_decode($this->curl->simple_get($this->API.'get_prestasi', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true);
					}
					$data['bulan'] = array(
						'01' =>'Januari',
						'02' =>'Februari',
						'03' =>'Maret',
						'04' =>'April',
						'05' =>'Mei',
						'06' =>'Juni',
						'07' =>'Juli',
						'08' =>'Agustus',
						'09' =>'September',
						'10' =>'Oktober',
						'11' =>'November',
						'12' =>'Desember',
					);

					// print_r($data['file']);
					$data['halaman'] = 'cetak_form';
					$this->load->view('content/V_cetak_formulir', $data);
				}else{
					$data['pendidikan'] = json_decode($this->curl->simple_get($this->API.'get_all_pendidikan'),true);
					$data['kerja'] = json_decode($this->curl->simple_get($this->API.'get_all_kerja'),true);
					$data['penghasilan'] = json_decode($this->curl->simple_get($this->API.'get_all_penghasilan'),true);
					$data['tingkat'] = json_decode($this->curl->simple_get($this->API.'get_all_tingkat'),true);
					$data['jurusan'] = json_decode($this->curl->simple_get($this->API.'get_all_jurusan'),true);

					$data['halaman'] = 'daftar';
					$this->load->view('headfoot/header', $data);
					$this->load->view('content/V_daftar_'.$result['tahap_daftar']);
					$this->load->view('headfoot/footer');
				}
			}
		}else{
			redirect(base_url());
		}
	}
}
