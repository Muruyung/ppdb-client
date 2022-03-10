<?php
/******************************************
* Filename    : C_edit_daftar.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-08
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Controller untuk edit data pendaftaran
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class C_edit_daftar extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		// $this->API = api_url();
		$this->API = api_url();
		date_default_timezone_set('Asia/Jakarta');
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
				redirect('C_home');
			}else{
				if ($result['tahap_daftar'] == 0){
					// Get data untuk selected value
					$data['agama'] = json_decode($this->curl->simple_get($this->API.'get_all_agama'),true);
					$data['hobi'] = json_decode($this->curl->simple_get($this->API.'get_all_hobi'),true);
					$data['citacita'] = json_decode($this->curl->simple_get($this->API.'get_all_citacita'),true);
					$data['tempattinggal'] = json_decode($this->curl->simple_get($this->API.'get_all_tempattinggal'),true);
					$data['jarak'] = json_decode($this->curl->simple_get($this->API.'get_all_jarak'),true);
					$data['waktu'] = json_decode($this->curl->simple_get($this->API.'get_all_waktu'),true);
					$data['transportasi'] = json_decode($this->curl->simple_get($this->API.'get_all_transportasi'),true);
					$data['pendidikan'] = json_decode($this->curl->simple_get($this->API.'get_all_pendidikan'),true);
					$data['kerja'] = json_decode($this->curl->simple_get($this->API.'get_all_kerja'),true);
					$data['penghasilan'] = json_decode($this->curl->simple_get($this->API.'get_all_penghasilan'),true);
					$data['kepemilikan'] = json_decode($this->curl->simple_get($this->API.'get_all_kepemilikan'),true);
					$data['tingkat'] = json_decode($this->curl->simple_get($this->API.'get_all_tingkat'),true);
					$data['jurusan'] = json_decode($this->curl->simple_get($this->API.'get_all_jurusan'),true);
					$data['provinsi'] = json_decode($this->curl->simple_get($this->API.'get_all_provinsi'),true);
					$data['bidang'] = json_decode($this->curl->simple_get($this->API.'get_all_bidang'),true);
					$data['prestasi_all'] = json_decode($this->curl->simple_get($this->API.'get_all_prestasi'),true);

					// Get data untuk diedit
					$data['siswa'] = json_decode($this->curl->simple_get($this->API.'get_siswa', array('where'=>['id'=>decrypt_url($this->session->userdata('id_user_login'))]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['kabupaten'] = json_decode($this->curl->simple_get($this->API.'get_kabupaten', array('where'=>['id_prov'=>$data['siswa']['provinsi']]), array(CURLOPT_BUFFERSIZE => 10)), true);
					$data['kecamatan'] = json_decode($this->curl->simple_get($this->API.'get_kecamatan', array('where'=>['id_kab'=>$data['siswa']['kabupaten']]), array(CURLOPT_BUFFERSIZE => 10)), true);
					$data['desa'] = json_decode($this->curl->simple_get($this->API.'get_desa', array('where'=>['id_kec'=>$data['siswa']['kecamatan']]), array(CURLOPT_BUFFERSIZE => 10)), true);
					$data['file'] = json_decode($this->curl->simple_get($this->API.'get_file', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true);
					$data['nilai'] = json_decode($this->curl->simple_get($this->API.'get_nilai', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true);
					$data['ayah'] = json_decode($this->curl->simple_get($this->API.'get_ortu', array('where'=>['id_user'=>$data['siswa']['id'], 'jenis' => 'ayah']), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['ibu'] = json_decode($this->curl->simple_get($this->API.'get_ortu', array('where'=>['id_user'=>$data['siswa']['id'], 'jenis' => 'ibu']), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['wali'] = json_decode($this->curl->simple_get($this->API.'get_ortu', array('where'=>['id_user'=>$data['siswa']['id'], 'jenis' => 'wali']), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['kabupaten_ortu'] = json_decode($this->curl->simple_get($this->API.'get_kabupaten', array('where'=>['id_prov'=>$data['ayah']['provinsi']]), array(CURLOPT_BUFFERSIZE => 10)), true);
					$data['kecamatan_ortu'] = json_decode($this->curl->simple_get($this->API.'get_kecamatan', array('where'=>['id_kab'=>$data['ayah']['kabupaten']]), array(CURLOPT_BUFFERSIZE => 10)), true);
					$data['desa_ortu'] = json_decode($this->curl->simple_get($this->API.'get_desa', array('where'=>['id_kec'=>$data['ayah']['kecamatan']]), array(CURLOPT_BUFFERSIZE => 10)), true);
					$data['pendaftaran'] = json_decode($this->curl->simple_get($this->API.'get_pendaftaran', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
					$data['prestasi'] = json_decode($this->curl->simple_get($this->API.'get_prestasi', array('where'=>['id_user'=>$data['siswa']['id']]), array(CURLOPT_BUFFERSIZE => 10)), true);

					// print_r($data['file']);
					$data['halaman'] = 'edit_daftar';
					$this->session->set_userdata(['token_kelulusan'=>"kosong"]);
					$this->load->view('headfoot/header_login', $data);
					$this->load->view('content/V_edit_daftar');
					$this->load->view('headfoot/footer');
				}else{
					redirect('c_daftar');
				}
			}
		}else{
			redirect('C_home');
		}
	}

	// proses untuk menambah data
	// insert data kontak
	function update(){
		// Menambahkan data siswa
		$siswa['where'] = array('id' => decrypt_url($this->session->userdata('id_user_login')));
		$siswa['data'] = array(
			'nama'				=> $this->input->post('nama_lengkap'),
			'gender'	  		=> $this->input->post('gender'),
			'agama'				=> $this->input->post('agama'),
			'tempat_lahir'		=> $this->input->post('tpt_lahir'),
			'tanggal_lahir'		=> $this->input->post('tgl_lahir'),
			'hobi'				=> $this->input->post('hobi'),
			'cita-cita'			=> $this->input->post('cita-cita'),
			'alamat'			=> $this->input->post('alamat_rumah'),
			'provinsi'			=> $this->input->post('provinsi'),
			'kabupaten'			=> $this->input->post('kabupaten'),
			'kecamatan'			=> $this->input->post('kecamatan'),
			'desa'				=> $this->input->post('desa'),
			'kode_pos'			=> $this->input->post('kode_pos'),
			'jarak'				=> $this->input->post('jarak'),
			'waktu'				=> $this->input->post('waktu'),
			'transportasi'		=> $this->input->post('transportasi'),
			'nisn'				=> $this->input->post('nisn'),
			'nik'				=> $this->input->post('nik'),
			'status_anak'		=> $this->input->post('status'),
			'anak_ke'			=> $this->input->post('anak_ke'),
			'jumlah_sdr'		=> $this->input->post('jumlah_sdr'),
			'tempat_tinggal'	=> $this->input->post('tempat_tinggal'),
			'tinggi'			=> $this->input->post('tinggi_bdn'),
			'no_hp'				=> $this->input->post('hp_siswa'),
			'email'				=> $this->input->post('email'),
			'kip'				=> $this->input->post('kip'),
			'no_kip'			=> $this->input->post('no_kip'),
			'paud'				=> $this->input->post('paud'),
			'tk'				=> $this->input->post('tk')
		);
		$update =  $this->curl->simple_put($this->API.'Set_siswa', $siswa, array(CURLOPT_BUFFERSIZE => 10));

		// Input data ortu dan wali
		$ayah['where'] = array(
			'id_user' => decrypt_url($this->session->userdata('id_user_login')),
			'jenis'		=> 'ayah'
		);
		$ayah['data'] = array(
			'no_kk'				=> $this->input->post('no_kk'),
			'nik'				=> $this->input->post('nik_ayah'),
			'pend'				=> $this->input->post('pend_ayah'),
			'kerja'				=> $this->input->post('kerja_ayah'),
			'nama'				=> $this->input->post('nama_ayah'),
			'penghasilan'		=> $this->input->post('gaji_ortu'),
			'no_hp'				=> $this->input->post('hp_ortu'),
			'tanggal_lahir'		=> $this->input->post('tgl_lahir_ayah'),
			'jenis'				=> 'ayah',
			'status_ortu'		=> $this->input->post('status_ayah'),
			'alamat'			=> $this->input->post('alamat_rumah_ortu'),
			'provinsi'			=> $this->input->post('provinsi_ortu'),
			'kabupaten'			=> $this->input->post('kabupaten_ortu'),
			'kecamatan'			=> $this->input->post('kecamatan_ortu'),
			'desa'				=> $this->input->post('desa_ortu'),
			'kode_pos'			=> $this->input->post('kode_pos_ortu'),
			'kepala_klg'		=> $this->input->post('nama_kepala_klg'),
			'kepemilikan_rumah'	=> $this->input->post('kepemilikan')
		);

		$ibu['where'] = array(
			'id_user' => decrypt_url($this->session->userdata('id_user_login')),
			'jenis'		=> 'ibu'
		);
		$ibu['data'] = array(
			'no_kk'			=> $this->input->post('no_kk'),
			'nik'			=> $this->input->post('nik_ibu'),
			'pend'			=> $this->input->post('pend_ibu'),
			'kerja'			=> $this->input->post('kerja_ibu'),
			'nama'			=> $this->input->post('nama_ibu'),
			'penghasilan'	=> $this->input->post('gaji_ortu'),
			'no_hp'			=> $this->input->post('hp_ortu'),
			'tanggal_lahir'	=> $this->input->post('tgl_lahir_ibu'),
			'jenis'			=> 'ibu',
			'status_ortu'	=> $this->input->post('status_ibu')
		);

		$get = json_decode($this->curl->simple_get($this->API.'get_ortu', array('where'=>['id_user'=>decrypt_url($this->session->userdata('id_user_login')), 'jenis'=>'wali']), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
		
		if ($this->input->post('nik_wali') != '' && $this->input->post('nama_wali') != ''){
			if(is_null($get) || $get == '401'){
				$wali['data'] = array(
					'id_user'				=> decrypt_url($this->session->userdata('id_user_login')),
					'nik'						=> $this->input->post('nik_wali'),
					'pend'					=> $this->input->post('pend_wali'),
					'kerja'					=> $this->input->post('kerja_wali'),
					'nama'					=> $this->input->post('nama_wali'),
					'penghasilan'		=> $this->input->post('gaji_wali'),
					'tanggal_lahir'	=> $this->input->post('tgl_lahir_wali'),
					'jenis'					=> 'wali'
				);
				$insert =  $this->curl->simple_post($this->API.'set_ortu', $wali, array(CURLOPT_BUFFERSIZE => 10));
				// print_r(json_encode($wali));
				// print_r($insert);
			}else{
				$wali['where'] = array(
					'id_user' => decrypt_url($this->session->userdata('id_user_login')),
					'jenis'		=> 'wali'
				);
				$wali['data'] = array(
					'nik'						=> $this->input->post('nik_wali'),
					'pend'					=> $this->input->post('pend_wali'),
					'kerja'					=> $this->input->post('kerja_wali'),
					'nama'					=> $this->input->post('nama_wali'),
					'penghasilan'		=> $this->input->post('gaji_wali'),
					'tanggal_lahir'	=> $this->input->post('tgl_lahir_wali'),
					'jenis'					=> 'wali'
				);
				$update =  $this->curl->simple_put($this->API.'set_ortu', $wali, array(CURLOPT_BUFFERSIZE => 10));
			}
		}else{
			if(!is_null($get) && $get != '401'){
				$wali = array(
					"id" => decrypt_url($this->session->userdata('id_user_login')),
					"jenis" => 'wali'
				);
				$delete =  $this->curl->simple_delete($this->API.'minus_ortu/',$wali, array(CURLOPT_BUFFERSIZE => 10));
			}
		}
		$update =  $this->curl->simple_put($this->API.'set_ortu', $ayah, array(CURLOPT_BUFFERSIZE => 10));
		$update =  $this->curl->simple_put($this->API.'set_ortu', $ibu, array(CURLOPT_BUFFERSIZE => 10));

		// Input data sekolah (pendaftaran)
		$pendaftaran['where'] = ['id_user' => decrypt_url($this->session->userdata('id_user_login'))];
		$pendaftaran['data'] = array(
			'jalur_daftar'		=> $this->input->post('jalur_daftar'),
			'sekolah'			=> $this->input->post('sekolah'),
			'nama_sekolah'		=> $this->input->post('nama_sekolah'),
			'status_sekolah'	=> $this->input->post('status_sekolah'),
			'lokasi_sekolah'	=> $this->input->post('lokasi_sekolah'),
			'alamat_sekolah'	=> $this->input->post('alamat_sekolah'),
			'npsn'				=> $this->input->post('npsn'),
			'thn_lulus'			=> $this->input->post('thn_lulus'),
			'no_ijazah'			=> $this->input->post('no_ijazah'),
			'jurusan'			=> $this->input->post('jurusan'),
			'peminatan'			=> $this->input->post('peminatan')
		);
		$update =  $this->curl->simple_put($this->API.'set_pendaftaran', $pendaftaran, array(CURLOPT_BUFFERSIZE => 10));

		// Input nilai rapot
		$hasil = 0;
		for ($c=1;$c<=5;$c++){
			$semester['where'] = array(
				'id_user'  => decrypt_url($this->session->userdata('id_user_login')),
				'semester' => $c
			);
			$semester['data'] = array(
				'semester'				=> $c,
				'nilai_inggris'			=> $this->input->post('sms'.$c.'_inggris'),
				'nilai_indonesia'		=> $this->input->post('sms'.$c.'_indo'),
				'nilai_mtk'				=> $this->input->post('sms'.$c.'_mtk'),
				'nilai_ipa'				=> $this->input->post('sms'.$c.'_ipa'),
				'nilai_ips'				=> $this->input->post('sms'.$c.'_ips'),
				'nilai_pai'				=> $this->input->post('sms'.$c.'_pai')
			);
			$update =  $this->curl->simple_put($this->API.'set_nilai', $semester, array(CURLOPT_BUFFERSIZE => 10));
			$hasil += $this->input->post('sms'.$c.'_inggris');
			$hasil += $this->input->post('sms'.$c.'_indo');
			$hasil += $this->input->post('sms'.$c.'_mtk');
			$hasil += $this->input->post('sms'.$c.'_ipa');
			$hasil += $this->input->post('sms'.$c.'_ips');
			$hasil += $this->input->post('sms'.$c.'_pai');
		}
		$data['where'] = ['id_user' => decrypt_url($this->session->userdata('id_user_login'))];
		$data['data'] = array(
			'nilai_total' 		=> $hasil,
			'nama' 				=> $this->input->post('nama_lengkap'),
			'sekolah' 			=> $this->input->post('nama_sekolah')
		);
		$update =  $this->curl->simple_put($this->API.'Set_seleksi', $data, array(CURLOPT_BUFFERSIZE => 10));

		// Input Prestasi
		$get = json_decode($this->curl->simple_get($this->API.'get_prestasi', array('where'=>['id_user'=>decrypt_url($this->session->userdata('id_user_login'))]), array(CURLOPT_BUFFERSIZE => 10)), true);
		// print_r($get);
		// echo '<br><br>';
		for($c=1;$c<=3;$c++){
			if ($this->input->post('pres'.$c) != ""){
				if ($get[0] == '401' || count($get) < $c){
					$prestasi['data'] = array(
						'id_user'				=> decrypt_url($this->session->userdata('id_user_login')),
						'nama_prestasi'			=> $this->input->post('pres'.$c),
						'tingkat'				=> $this->input->post('tp'.$c),
						'nomor'					=> $c,
						'tahun'					=> $this->input->post('tahun'.$c),
						'bidang'				=> $this->input->post('bidang'.$c),
						'kategori'				=> $this->input->post('kategori'.$c),
						'prestasi'				=> $this->input->post('prestasi'.$c),
						'penyelenggara'			=> $this->input->post('penyelenggara'.$c),
						'tempat'				=> $this->input->post('tempat'.$c)
					);
					$insert =  $this->curl->simple_post($this->API.'set_prestasi', $prestasi, array(CURLOPT_BUFFERSIZE => 10));
				}else{
					$prestasi['where'] = array(
						'id_user' 			=> decrypt_url($this->session->userdata('id_user_login')),
						'nomor'				=> $c
					);
					$prestasi['data'] = array(
						'nama_prestasi'			=> $this->input->post('pres'.$c),
						'tingkat'				=> $this->input->post('tp'.$c),
						'tahun'					=> $this->input->post('tahun'.$c),
						'bidang'				=> $this->input->post('bidang'.$c),
						'kategori'				=> $this->input->post('kategori'.$c),
						'prestasi'				=> $this->input->post('prestasi'.$c),
						'penyelenggara'			=> $this->input->post('penyelenggara'.$c),
						'tempat'				=> $this->input->post('tempat'.$c)
					);
					$update =  $this->curl->simple_put($this->API.'set_prestasi', $prestasi, array(CURLOPT_BUFFERSIZE => 10));
				}
			}else{
				if ($get[0] != '401' && isset($get[$c-1])){
					// print_r($get[$c-1]);
					// echo "\n";
					$id = array(
						'id' => $get[$c-1]['id']
					);
					// print_r($id);
					$delete =  $this->curl->simple_delete($this->API.'minus_prestasi/',$id, array(CURLOPT_BUFFERSIZE => 10));
				}
			}
		}

		//===========Upload file==============
		// mkdir('./assets/usr/'.encrypt_url(decrypt_url($this->session->userdata('id_user_login')))); // Membuat folder data user
		// $config['upload_path'] = './assets/usr/';
		// $config['max_size'] = "2048000";
		// $config['overwrite'] = true;

		// $this->load->library('upload', $config);

		// Upload foto diri
		$jenis_data = array(
			"foto_diri",
			"scan_sehat",
			"scan_akte",
			"scan_baik",
			"scan_kk",
			"scan_lulus",
			"scan_semester1",
			"scan_semester2",
			"scan_semester3",
			"scan_semester4",
			"scan_semester5",
			"sertifikat1",
			"sertifikat2",
			"sertifikat3",
			"file_kip"
		);
		foreach($jenis_data as $jns){
			$path = $_FILES[$jns]['name'];
			if ($path != ''){
				$file_type = $_FILES[$jns]['type'];
				$allowed = array("image/png", "image/jpg", "image/jpeg", "application/pdf");
				if(in_array($file_type, $allowed)) {
					$jenis = pathinfo($path, PATHINFO_EXTENSION);
					$fotoid = './assets/usr/'.$this->session->userdata('data_login')['username'].encrypt_url('11'.$this->session->userdata('data_login')['username']).'/'.$this->session->userdata('data_login')['username'].'_'.$jns.'.'.$jenis;
					
					$filedata['where'] = array(
						'id_user' 	=> decrypt_url($this->session->userdata('id_user_login')),
						'jenis'		=> $jns
					);
					$filedata['data'] = array(
						'path'		=> encrypt_url($fotoid)
					);

					move_uploaded_file($_FILES[$jns]['tmp_name'],$fotoid);
					$update =  $this->curl->simple_put($this->API.'set_file', $filedata, array(CURLOPT_BUFFERSIZE => 0));
				}
			}
		}

// 		print_r($filedata);

		if($update)
		{
			$this->session->set_flashdata('hasil','Update Data Berhasil');
		}else
		{
			$this->session->set_flashdata('hasil','Update Data Gagal');
		}
		clearstatcache();
		redirect(base_url('C_edit_daftar'));
		// print_r($this->input->post());
	}

	function cek_nisn($nisn){
		$data['where'] = array(
      		'nisn' => $nisn
		);
		// $this->API = 'https://svc-mc1.ppdb-man-1-cianjur.com/';
		
		$user = json_decode($this->curl->simple_get($this->API.'get_siswa', $data, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
		// print_r($user);
		if (is_null($user) || $user == '401'){
			echo 1;
		}else{
			echo -1;
		}
	}
}
