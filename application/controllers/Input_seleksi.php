<?php
/******************************************
* Filename    : C_pemberitahuan.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-14
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Controller untuk halaman tabel statistik
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class input_seleksi extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		// $this->API = 'https://'.encrypt_url("svc-mc1").'.man1cianjur.com/';
		$this->API = 'http://localhost/ppdb_man_1_cianjur/service/';
		ini_set('max_execution_time', '0'); // for infinite time of execution
		// $this->API = 'http://localhost/ppdb_man_1_cianjur/service/';
	}

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
		$admin['username'] 	 = encrypt_url('mansacjr');
		$admin['password'] 	 = encrypt_url('1mancjr');
		$siswa 			 = json_decode($this->curl->simple_get($this->API.'get_all_siswa', $admin, array(CURLOPT_BUFFERSIZE => 10)), true);
		$pendaftaran = json_decode($this->curl->simple_get($this->API.'get_all_pendaftaran', $admin, array(CURLOPT_BUFFERSIZE => 10)), true);
		foreach ($siswa as $_siswa) {
			$where['where'] = array('id_user' => $_siswa['id']);
			$nilai = json_decode($this->curl->simple_get($this->API.'get_nilai', $where, array(CURLOPT_BUFFERSIZE => 10)), true);
			$hasil = 0;
			$sekolah = "";
			foreach ($nilai as $_nilai) {
				$hasil += intval($_nilai['nilai_inggris']);
				$hasil += intval($_nilai['nilai_indonesia']);
				$hasil += intval($_nilai['nilai_mtk']);
				$hasil += intval($_nilai['nilai_ipa']);
				$hasil += intval($_nilai['nilai_ips']);
				$hasil += intval($_nilai['nilai_pai']);
			}
			foreach ($pendaftaran as $skl) {
				if ($skl['id_user'] == $_siswa['id']){
					$sekolah = $skl['nama_sekolah'];
				}
			}
			$cek = json_decode($this->curl->simple_get($this->API.'get_seleksi', array('where'=>['id_user'=>$_siswa['id']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
			if ($cek == 401){
				$data['data'] = array(
					'id_user' 			=> $_siswa['id'],
					'nilai_total' 		=> $hasil,
					'nama' 				=> $_siswa['nama'],
					'sekolah' 			=> $sekolah
				);
				print_r($data);
				$insert =  $this->curl->simple_post($this->API.'Set_seleksi', $data, array(CURLOPT_BUFFERSIZE => 0));
			}else{
				$data['where'] = ['id_user' => $_siswa['id']];
				$data['data'] = array(
					'nilai_total' => $hasil,
					'nama' 				=> $_siswa['nama'],
					'sekolah' 		=> $sekolah
				);
				$update =  $this->curl->simple_put($this->API.'Set_seleksi', $data, array(CURLOPT_BUFFERSIZE => 10));
			}
		}
		echo "Selesai";
	}

}
