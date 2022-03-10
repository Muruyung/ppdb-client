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

class C_pemberitahuan extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		// $this->API = api_url();
		$this->API = 'http://localhost/ppdb_man_1_cianjur/service/';
	}

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
		// redirect(base_url());
		// $this->session->set_userdata(['api'=>encrypt_url($api)]);
		$data['halaman'] 		 = 'pemberitahuan';
		$data['login'] 			 = 'false';
		$admin['username'] 	 = encrypt_url('mansacjr');
		$admin['password'] 	 = encrypt_url('rahasia1.');
		$data['siswa'] 			 = json_decode($this->curl->simple_get($this->API.'get_all_siswa', $admin, array(CURLOPT_BUFFERSIZE => 10)), true);
		$data['seleksi'] 		 = json_decode($this->curl->simple_get($this->API.'get_all_seleksi', array(CURLOPT_BUFFERSIZE => 10)), true);

		echo "<script>console.log('Data Siswa: " . $data['siswa'][0] . "' );</script>";
		if ($data['siswa'][0] != 401 && $data['seleksi'][0] != 401){
			$ortu				  			 = json_decode($this->curl->simple_get($this->API.'get_all_ortu', $admin, array(CURLOPT_BUFFERSIZE => 10)), true);
			$data['pendaftaran'] = json_decode($this->curl->simple_get($this->API.'get_all_pendaftaran', $admin, array(CURLOPT_BUFFERSIZE => 10)), true);
			$data['jum_agama']	 = array_count_values(array_column($data['siswa'],'agama'));
			$data['jum_gender']	 = array_count_values(array_column($data['siswa'],'gender'));
			$data['jum_pend']	 	 = array_count_values(array_column($ortu,'pend'));
			$data['jum_kerja']	 = array_count_values(array_column($ortu,'kerja'));
			$data['jum_sekolah'] = array_count_values(array_column($data['pendaftaran'],'nama_sekolah'));
			$data['jum_jurusan'] = array_count_values(array_column($data['pendaftaran'],'jurusan'));
			$data['jum_jalur'] = array_count_values(array_column($data['pendaftaran'],'jalur_daftar'));
			$data['jum_usia']		 = [];
			foreach ($data['siswa'] as $_siswa) {
				$tanggal = $_siswa['tanggal_lahir'];
				$tanggal = explode("/", $tanggal);
				array_push($data['jum_usia'],(date("md", date("U", mktime(0, 0, 0, $tanggal[1], $tanggal[0], $tanggal[2]))) > date("md") ? ((date("Y") - $tanggal[2]) - 1) : (date("Y") - $tanggal[2])));
			}

// 			print_r($data['nilai']);
			$data['jum_usia'] = array_count_values($data['jum_usia']);

			// arsort($data['nilai']);

			$data['isi'] = 'true';
// 			print_r($data);
			if (!is_null($this->session->userdata('data_login'))){
				$login['where'] = array(
					'username' =>$this->session->userdata('data_login')['username'],
					'password' => decrypt_url($this->session->userdata('data_login')['password'])
				);
				$result = json_decode($this->curl->simple_get($this->API.'get_user', $login, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
				// print_r($result);

				if(is_null($result) || $result == 401){
					$this->load->view('headfoot/header', $data);
					$this->load->view('content/V_pemberitahuan');
					$this->load->view('headfoot/footer');
				}else{
					if ($result['tahap_daftar'] == 0){
						$data['login'] = 'true';
						$data['id_user_login'] = $this->session->userdata("id_user_login");
						$this->session->set_userdata(['token_kelulusan'=>"kosong"]);
						// print_r($data['pendaftaran']);
						$this->load->view('headfoot/header_login', $data);
						$this->load->view('content/V_pemberitahuan');
						$this->load->view('headfoot/footer');
					}else{
						redirect('c_daftar');
					}
				}
			}else{
				$this->load->view('headfoot/header', $data);
				$this->load->view('content/V_pemberitahuan');
				$this->load->view('headfoot/footer');
			}
		}else{
			$data['isi'] = 'false';
			$this->load->view('headfoot/header', $data);
			$this->load->view('content/V_pemberitahuan');
			$this->load->view('headfoot/footer');
		}
	}

}
