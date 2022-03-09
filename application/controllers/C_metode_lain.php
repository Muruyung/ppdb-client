<?php
/******************************************
* Filename    : C_metode_lain.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-09
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Controller untuk mengganti password yang lupa dengan metode lain
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class C_metode_lain extends CI_Controller {

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
				$this->load->view('content/V_metode_lain');
				$this->load->view('headfoot/footer');
			}else{
				redirect(base_url());
			}
		}else{
			if (!is_null($this->session->userdata('data_lupa'))){
				$data['halaman'] = 'lupa_pass';
				$this->session->set_userdata(['token_kelulusan'=>"kosong"]);
				$this->load->view('headfoot/header', $data);
				$this->load->view('content/V_metode_lain');
				$this->load->view('headfoot/footer');
			}else{
				redirect(base_url());
			}
		}
	}

	function cek_data($nisn="",$nik="",$kk="",$ibu=""){
		if (!is_null($this->session->userdata('data_lupa'))){
			$data['where'] = array(
				'username' => $this->session->userdata('data_lupa')['username']
			);
			$user = json_decode($this->curl->simple_get($this->API.'Get_user', $data, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
			
			if ($user['kesempatan_lupa'] > 0){
				$user['kesempatan_lupa'] -= 1;
				$data['data'] = array(
					'kesempatan_lupa' => $user['kesempatan_lupa']
				);
				$update = $this->curl->simple_put($this->API.'Set_user', $data, array(CURLOPT_BUFFERSIZE => 10));

				if ($nisn == $this->session->userdata('data_lupa')['username']){
					$data['where'] = array(
						'nisn' => $nisn,
						'nik'  => $nik
					);
					$siswa = json_decode($this->curl->simple_get($this->API.'Get_siswa', $data, array(CURLOPT_BUFFERSIZE => 10)), true);
					if (!is_null($siswa) && $siswa[0] != '401'){
						$data['where'] = array(
							'id_user' => $siswa[0]['id'],
							'jenis'   => 'ibu',
							'no_kk'   => $kk,
							'nama'    => $ibu,
						);
						$ortu = json_decode($this->curl->simple_get($this->API.'Get_ortu', $data, array(CURLOPT_BUFFERSIZE => 10)), true);
						if (!is_null($ortu) && $ortu[0] != '401'){
							$data['where'] = array(
								'username' => $this->session->userdata('data_lupa')['username']
							);
							$data['data'] = array(
								'konfirmasi_lupa' => 1
							);
							$update = $this->curl->simple_put($this->API.'Set_user', $data, array(CURLOPT_BUFFERSIZE => 10));
							echo 1;
						}else{
							echo -1;
						}
					}else{
						echo -1;
					}
				}else{
					echo -1;
				}
			}else{
				echo -2;
			}
		}
	}
}
