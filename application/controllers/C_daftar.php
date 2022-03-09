<?php
/******************************************
* Filename    : C_daftar.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-14
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Controller untuk pendaftaran
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class C_daftar extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		$this->API = api_url();
		// $this->API = 'http://localhost/ppdb_man_1_cianjur/service/';
		date_default_timezone_set('Asia/Jakarta');
		// $this->API=decrypt_url($this->session->userdata('api'));

		// $this->API="http://localhost:55620/api";
	}

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
		if (!is_null($this->session->userdata('data_login'))){
			$login['where'] = array(
				'username' => $this->session->userdata('data_login')['username'],
				'password' => decrypt_url($this->session->userdata('data_login')['password'])
			);
			$result = json_decode($this->curl->simple_get($this->API.'get_user', $login, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
			// $result = json_decode($this->curl->simple_get($this->API.'get_siswa', array('where'=>['id'=>$result['id_user']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
			// print_r($result);
			if(is_null($result) || $result == 401){
				$data['agama'] = json_decode($this->curl->simple_get($this->API.'get_all_agama'),true);
				$data['hobi'] = json_decode($this->curl->simple_get($this->API.'get_all_hobi'),true);
				$data['citacita'] = json_decode($this->curl->simple_get($this->API.'get_all_citacita'),true);
				$data['tempattinggal'] = json_decode($this->curl->simple_get($this->API.'get_all_tempattinggal'),true);
				$data['jarak'] = json_decode($this->curl->simple_get($this->API.'get_all_jarak'),true);
				$data['waktu'] = json_decode($this->curl->simple_get($this->API.'get_all_waktu'),true);
				$data['transportasi'] = json_decode($this->curl->simple_get($this->API.'get_all_transportasi'),true);
				$data['provinsi'] = json_decode($this->curl->simple_get($this->API.'get_all_provinsi'),true);

		    $data['halaman'] = 'daftar';
				$this->load->view('headfoot/header', $data);
				$this->load->view('content/V_daftar_1');
				$this->load->view('headfoot/footer');
			}else{
				if ($result['tahap_daftar'] == 0){
					redirect('C_home');
				}else{
					$data['pendidikan'] = json_decode($this->curl->simple_get($this->API.'get_all_pendidikan'),true);
					$data['kerja'] = json_decode($this->curl->simple_get($this->API.'get_all_kerja'),true);
					$data['penghasilan'] = json_decode($this->curl->simple_get($this->API.'get_all_penghasilan'),true);
					$data['kepemilikan'] = json_decode($this->curl->simple_get($this->API.'get_all_kepemilikan'),true);
					$data['tingkat'] = json_decode($this->curl->simple_get($this->API.'get_all_tingkat'),true);
					$data['jurusan'] = json_decode($this->curl->simple_get($this->API.'get_all_jurusan'),true);
					$data['provinsi'] = json_decode($this->curl->simple_get($this->API.'get_all_provinsi'),true);
					$data['nisn'] = $this->session->userdata('data_login')['username'];
					$data['bidang'] = json_decode($this->curl->simple_get($this->API.'get_all_bidang'),true);
					$data['prestasi'] = json_decode($this->curl->simple_get($this->API.'get_all_prestasi'),true);
					
					$data['halaman'] = 'daftar';
					$this->load->view('headfoot/header_login', $data);
					$this->load->view('content/V_daftar_'.$result['tahap_daftar']);
					$this->load->view('headfoot/footer');
				}
			}
		}else{
			//=============Dihapus
			// $data['pendidikan'] = json_decode($this->curl->simple_get($this->API.'get_all_pendidikan'),true);
			// $data['kerja'] = json_decode($this->curl->simple_get($this->API.'get_all_kerja'),true);
			// $data['penghasilan'] = json_decode($this->curl->simple_get($this->API.'get_all_penghasilan'),true);
			// $data['kepemilikan'] = json_decode($this->curl->simple_get($this->API.'get_all_kepemilikan'),true);
			// $data['tingkat'] = json_decode($this->curl->simple_get($this->API.'get_all_tingkat'),true);
			// $data['jurusan'] = json_decode($this->curl->simple_get($this->API.'get_all_jurusan'),true);
			// $data['provinsi'] = json_decode($this->curl->simple_get($this->API.'get_all_provinsi'),true);
			// $data['bidang'] = json_decode($this->curl->simple_get($this->API.'get_all_bidang'),true);
			// $data['prestasi'] = json_decode($this->curl->simple_get($this->API.'get_all_prestasi'),true);
			//=============

			$data['agama'] = json_decode($this->curl->simple_get($this->API.'get_all_agama'),true);
			$data['hobi'] = json_decode($this->curl->simple_get($this->API.'get_all_hobi'),true);
			$data['citacita'] = json_decode($this->curl->simple_get($this->API.'get_all_citacita'),true);
			$data['tempattinggal'] = json_decode($this->curl->simple_get($this->API.'get_all_tempattinggal'),true);
			$data['jarak'] = json_decode($this->curl->simple_get($this->API.'get_all_jarak'),true);
			$data['waktu'] = json_decode($this->curl->simple_get($this->API.'get_all_waktu'),true);
			$data['transportasi'] = json_decode($this->curl->simple_get($this->API.'get_all_transportasi'),true);
			$data['provinsi'] = json_decode($this->curl->simple_get($this->API.'get_all_provinsi'),true);

	    	$data['halaman'] = 'daftar';
			$this->load->view('headfoot/header', $data);
			$this->load->view('content/V_daftar_1');
			$this->load->view('headfoot/footer');
		}
	}

	// Proses filter
	// Filter peminatan
	function get_peminatan(){
		if ($_POST['jurusan'] == ""){
			echo "<option value=''>--</option>";
		}else{
			$data['where'] = array(
				'jurusan' => $_POST['jurusan']
			);
			echo "<option value=''>Pilih Peminatan</option>";

			$peminatan = json_decode($this->curl->simple_get($this->API.'get_peminatan', $data, array(CURLOPT_BUFFERSIZE => 10)), true);
			foreach ($peminatan as $_peminatan) {
				echo "<option value='".$_peminatan['peminatan']."'>".$_peminatan['peminatan']."</option>";
			}
		}
	}

	// Filter Kabupaten
	function get_kabupaten(){
		if ($_POST['provinsi'] == ""){
			echo "<option value=''>--</option>";
		}else{
			$data['where'] = array(
				'id_prov' => $_POST['provinsi']
			);
			echo "<option value=''>Pilih Kabupaten</option>";

			$kabupaten = json_decode($this->curl->simple_get($this->API.'get_kabupaten', $data, array(CURLOPT_BUFFERSIZE => 10)), true);
			foreach ($kabupaten as $_kabupaten) {
				echo "<option value='".$_kabupaten['id_kab']."'>".$_kabupaten['nama']."</option>";
			}
		}
	}

	function get_kecamatan(){
		if ($_POST['kabupaten'] == ""){
			echo "<option value=''>--</option>";
		}else{
			$data['where'] = array(
				'id_kab' => $_POST['kabupaten']
			);
			echo "<option value=''>Pilih Kecamatan</option>";

			$kecamatan = json_decode($this->curl->simple_get($this->API.'get_kecamatan', $data, array(CURLOPT_BUFFERSIZE => 10)), true);
			foreach ($kecamatan as $_kecamatan) {
				echo "<option value='".$_kecamatan['id_kec']."'>".$_kecamatan['nama']."</option>";
			}
		}
	}

	function get_desa(){
		if ($_POST['kecamatan'] == ""){
			echo "<option value=''>--</option>";
		}else{
			$data['where'] = array(
				'id_kec' => $_POST['kecamatan']
			);
			echo "<option value=''>Pilih Desa</option>";

			$desa = json_decode($this->curl->simple_get($this->API.'get_desa', $data, array(CURLOPT_BUFFERSIZE => 10)), true);
			foreach ($desa as $_desa) {
				echo "<option value='".$_desa['id_kel']."'>".$_desa['nama']."</option>";
			}
		}
	}

	function get_pos(){
		if ($_POST['kecamatan'] == ""){
			echo "-";
		}else{
			$data['where'] = array(
				'id_kec' => $_POST['kecamatan']
			);
			$desa = json_decode($this->curl->simple_get($this->API.'get_pos', $data, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
			echo $desa['kode_pos'];
		}
	}

	private function upload_files($file, $up, $name){
		$_FILES = $file;
		$config['file_name'] = $name;
		$this->upload->initialize($config);
		if ($this->upload->do_upload($up)) {
			$this->upload->data();
		} else {
			return false;
		}
	}

	function create_folder(){
		if ($_POST['folder'] != ''){
			$path = './assets/usr/'.$_POST['folder'].encrypt_url('11'.$_POST['folder']);
			mkdir($path);
		}
	}

	function up_file(){
		if ($_FILES['file']["name"] != '' && $_POST['nama'] != "" && $_POST['nisn'] != "" && is_uploaded_file($_FILES['file']['tmp_name'])){
			if (!is_dir('./assets/usr/'.$_POST['nisn'].encrypt_url('11'.$_POST['nisn']))){
				$path = './assets/usr/'.$_POST['nisn'].encrypt_url('11'.$_POST['nisn']);
				mkdir($path);
			}
			$file_type = $_FILES['file']['type'];
			$allowed = array("image/png", "image/jpg", "image/jpeg", "application/pdf");
			if(!in_array($file_type, $allowed)) {
				echo -1;
			}else{
				$path = $_FILES['file']["name"];
				$jenis = pathinfo($path, PATHINFO_EXTENSION);
				$nama_file = $_POST['nisn'].'_'.$_POST['nama'].'.'.$jenis;
	
				$fotoid = './assets/usr/'.$_POST['nisn'].encrypt_url('11'.$_POST['nisn']).'/'.$nama_file;
				if (move_uploaded_file($_FILES['file']['tmp_name'],$fotoid)){
					echo 1;
				}else{
					echo 0;
				}
			}
		}else{
			echo -3;
		}
	}

	// proses untuk menambah data
	// insert data kontak
	function add1(){
		// print_r('Upload Data Siswa');
		// Menambahkan data siswa
		$nisn = $this->input->post('nisn');
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
			'paud'				=> $this->input->post('paud'),
			'tk'				=> $this->input->post('tk')
		);
		$insert =  $this->curl->simple_post($this->API.'set_siswa', $siswa, array(CURLOPT_BUFFERSIZE => 0));
		// Get id siswa terakhir
		$siswa = json_decode($this->curl->simple_get($this->API.'get_siswa', array('where'=>['nisn'=>$nisn, 'nik'=>$this->input->post('nik')]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];

		// print_r($siswa);
		// Input data jalur pendaftaran
		$pendaftaran['data'] = array(
			'id_user'				=> $siswa['id'],
			'jalur_daftar'	=> $this->input->post('jalur_daftar')
		);
		$insert =  $this->curl->simple_post($this->API.'set_pendaftaran', $pendaftaran, array(CURLOPT_BUFFERSIZE => 0));

		// Input username & password
		$panjangacak = 8;
		$base='ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';
		$max=strlen($base)-1;
		$acak='';
		mt_srand((double)microtime()*1000000);

		while (strlen($acak)<$panjangacak) {
			$acak.=$base[mt_rand(0,$max)];
		}

		$user['data'] = array(
			'id_user'				=> $siswa['id'],
			'username'			=> $this->input->post('nisn'),
			'password'			=> $acak,
			'tahap_daftar'	=> 2
		);
		$insert =  $this->curl->simple_post($this->API.'set_user', $user, array(CURLOPT_BUFFERSIZE => 0));

// Untuk email, jangan lupa dinyalain
		if ($insert){
			$this->session->set_flashdata('hasil','Insert Data Berhasil');
		}
		$this->load->config('email');
		$this->load->library('email');

		$from = $this->config->item('smtp_user');

		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($this->input->post('email'));
		$this->email->subject('Akun PPDB Online MAN 1 Cianjur');
		$this->email->message('Ini adalah akun PPDB Online Anda:
Username : '.$user['data']['username'].'
Password : '.$user['data']['password'].'
Silahkan akses '.base_url().'C_login untuk melakukan login.');
		
		$this->email->send();
		
		$this->session->set_userdata(['data_login'=>['username'=>$this->input->post('nisn'), 'password'=>encrypt_url($acak)]]);

		//===========Upload file==============
		// $config['upload_path'] = './assets/usr/';
		// $config['max_size'] = 0;
		// // $config['max_size'] = "2048000";
		// $config['overwrite'] = true;
		// $this->load->library('upload', $config);
		// mkdir('./assets/usr/'.encrypt_url($nisn)); // Membuat folder data user
		// $config['upload_path'] = './assets/usr/';
		// $config['max_size'] = 0;
		// // $config['max_size'] = "2048000";
		// $config['overwrite'] = true;
		// $this->load->library('upload', $config);


		// Upload foto diri
		$path = $_FILES['foto_diri']['name'];
		$jenis = pathinfo($path, PATHINFO_EXTENSION);
		// $this->upload_files($_FILES['foto_diri'], 'foto_diri', encrypt_url($nisn.'foto_diri').'.'.$jenis);
		// $fotoid = './assets/usr/'.encrypt_url($nisn.'foto_diri').'.'.$jenis;
		// move_uploaded_file($_FILES['foto_diri']['tmp_name'],$fotoid);
		$filedata['data'] = array(
			'id_user' => $siswa['id'],
			'jenis'		=> 'foto_diri',
			'path'		=> encrypt_url('./assets/usr/'.$nisn.encrypt_url('11'.$nisn).'/'.$nisn.'_foto_diri.'.$jenis)
		);
		$insert =  $this->curl->simple_post($this->API.'set_file', $filedata, array(CURLOPT_BUFFERSIZE => 0));

		//Upload scan surat keterangan sehat
		$path = $_FILES['scan_sehat']['name'];
		$jenis = pathinfo($path, PATHINFO_EXTENSION);
		// $this->upload_files($_FILES['scan_sehat'], 'scan_sehat', encrypt_url($nisn.'scan_sehat').'.'.$jenis);
		// $fotoid = './assets/usr/'.encrypt_url($nisn.'scan_sehat').'.'.$jenis;
		// move_uploaded_file($_FILES['scan_sehat']['tmp_name'],$fotoid);
		$filedata['data'] = array(
			'id_user' => $siswa['id'],
			'jenis'		=> 'scan_sehat',
			'path'		=> encrypt_url('./assets/usr/'.$nisn.encrypt_url('11'.$nisn).'/'.$nisn.'_scan_sehat.'.$jenis)
		);
		$insert =  $this->curl->simple_post($this->API.'set_file', $filedata, array(CURLOPT_BUFFERSIZE => 0));

		// Upload scan akte kelahiran
		$path = $_FILES['scan_akte']['name'];
		$jenis = pathinfo($path, PATHINFO_EXTENSION);
		// $this->upload_files($_FILES['scan_sehat'], 'scan_sehat', encrypt_url($nisn.'scan_sehat').'.'.$jenis);
		// $fotoid = './assets/usr/'.encrypt_url($nisn.'scan_akte').'.'.$jenis;
		// move_uploaded_file($_FILES['scan_akte']['tmp_name'],$fotoid);
		$filedata['data'] = array(
			'id_user' => $siswa['id'],
			'jenis'		=> 'scan_akte',
			'path'		=> encrypt_url('./assets/usr/'.$nisn.encrypt_url('11'.$nisn).'/'.$nisn.'_scan_akte.'.$jenis)
		);
		$insert =  $this->curl->simple_post($this->API.'set_file', $filedata, array(CURLOPT_BUFFERSIZE => 0));

		// Upload scan surat kelakuan baik
		$path = $_FILES['scan_baik']['name'];
		$jenis = pathinfo($path, PATHINFO_EXTENSION);
		// $this->upload_files($_FILES['scan_baik'], 'scan_baik', encrypt_url($nisn.'scan_baik').'.'.$jenis);
		// $fotoid = './assets/usr/'.encrypt_url($nisn.'scan_baik').'.'.$jenis;
		// move_uploaded_file($_FILES['scan_baik']['tmp_name'],$fotoid);
		$filedata['data'] = array(
			'id_user' => $siswa['id'],
			'jenis'		=> 'scan_baik',
			'path'		=> encrypt_url('./assets/usr/'.$nisn.encrypt_url('11'.$nisn).'/'.$nisn.'_scan_baik.'.$jenis)
		);
		$insert =  $this->curl->simple_post($this->API.'set_file', $filedata, array(CURLOPT_BUFFERSIZE => 0));

		redirect(base_url('C_daftar'));
	}

	function add2(){
		// Get id siswa terakhir
		$siswa = json_decode($this->curl->simple_get($this->API.'get_siswa', array('where'=>['nisn'=>$this->session->userdata('data_login')['username']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];

		// Input data ortu dan wali
		$ayah['data'] = array(
			'id_user'			=> $siswa['id'],
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
			'alamat'			=> $this->input->post('alamat_rumah'),
			'provinsi'			=> $this->input->post('provinsi'),
			'kabupaten'			=> $this->input->post('kabupaten'),
			'kecamatan'			=> $this->input->post('kecamatan'),
			'desa'				=> $this->input->post('desa'),
			'kode_pos'			=> $this->input->post('kode_pos'),
			'kepala_klg'		=> $this->input->post('nama_kepala_klg'),
			'kepemilikan_rumah'	=> $this->input->post('kepemilikan')
		);
		$insert =  $this->curl->simple_post($this->API.'set_ortu', $ayah, array(CURLOPT_BUFFERSIZE => 0));

		$ibu['data'] = array(
			'id_user'			=> $siswa['id'],
			'no_kk'				=> $this->input->post('no_kk'),
			'nik'				=> $this->input->post('nik_ibu'),
			'pend'				=> $this->input->post('pend_ibu'),
			'kerja'				=> $this->input->post('kerja_ibu'),
			'nama'				=> $this->input->post('nama_ibu'),
			'penghasilan'		=> $this->input->post('gaji_ortu'),
			'no_hp'				=> $this->input->post('hp_ortu'),
			'tanggal_lahir'		=> $this->input->post('tgl_lahir_ibu'),
			'jenis'				=> 'ibu',
			'status_ortu'		=> $this->input->post('status_ibu')
		);
		$insert =  $this->curl->simple_post($this->API.'set_ortu', $ibu, array(CURLOPT_BUFFERSIZE => 0));

		if ($this->input->post('nik_wali') != '' && $this->input->post('nama_wali') != ''){
			$wali['data'] = array(
				'id_user'			=> $siswa['id'],
				'nik'				=> $this->input->post('nik_wali'),
				'pend'				=> $this->input->post('pend_wali'),
				'kerja'				=> $this->input->post('kerja_wali'),
				'nama'				=> $this->input->post('nama_wali'),
				'penghasilan'		=> $this->input->post('gaji_wali'),
				'tanggal_lahir'		=> $this->input->post('tgl_lahir_wali'),
				'jenis'				=> 'wali'
			);
			$insert =  $this->curl->simple_post($this->API.'set_ortu', $wali, array(CURLOPT_BUFFERSIZE => 0));
		}

		//Upload scan KK
		$path = $_FILES['scan_kk']['name'];
		$jenis = pathinfo($path, PATHINFO_EXTENSION);
		// $this->upload_files($_FILES['scan_kk'], 'scan_kk', encrypt_url($nisn.'scan_kk').'.'.$jenis);
		// $fotoid = './assets/usr/'.encrypt_url($nisn.'scan_kk').'.'.$jenis;
		// move_uploaded_file($_FILES['scan_kk']['tmp_name'],$fotoid);
		$filedata['data'] = array(
			'id_user' => $siswa['id'],
			'jenis'		=> 'scan_kk',
			'path'		=> encrypt_url('./assets/usr/'.$this->session->userdata('data_login')['username'].encrypt_url('11'.$this->session->userdata('data_login')['username']).'/'.$this->session->userdata('data_login')['username'].'_scan_kk.'.$jenis)
		);
		$insert =  $this->curl->simple_post($this->API.'set_file', $filedata, array(CURLOPT_BUFFERSIZE => 0));

		$user['where'] = array(
			'id_user'				=> $siswa['id']
		);
		$user['data'] = array(
			'tahap_daftar'	=> 3
		);
		$update =  $this->curl->simple_put($this->API.'set_user', $user, array(CURLOPT_BUFFERSIZE => 0));

		redirect(base_url('C_daftar'));
	}

	function add3(){
		// Get id siswa terakhir
		$siswa = json_decode($this->curl->simple_get($this->API.'get_siswa', array('where'=>['nisn'=>$this->session->userdata('data_login')['username']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];

		// Input data sekolah (pendaftaran)
		$pendaftaran['where'] = array(
			'id_user'				=> $siswa['id']
		);
		$pendaftaran['data'] = array(
			'sekolah'			=> $this->input->post('sekolah'),
			'nama_sekolah'		=> $this->input->post('nama_sekolah'),
			'status_sekolah'	=> $this->input->post('status_sekolah'),
			'lokasi_sekolah'	=> $this->input->post('lokasi_sekolah'),
			'alamat_sekolah'	=> $this->input->post('alamat_sekolah'),
			'npsn'				=> $this->input->post('npsn'),
			'thn_lulus'			=> $this->input->post('thn_lulus'),
			'no_ijazah'			=> $this->input->post('no_ijazah')
		);
		$update =  $this->curl->simple_put($this->API.'set_pendaftaran', $pendaftaran, array(CURLOPT_BUFFERSIZE => 0));

		// Upload scan surat kelulusan
		$path = $_FILES['scan_lulus']['name'];
		$jenis = pathinfo($path, PATHINFO_EXTENSION);
		// $this->upload_files($_FILES['scan_lulus'], 'scan_lulus', encrypt_url($nisn.'scan_lulus').'.'.$jenis);
		// $fotoid = './assets/usr/'.encrypt_url($nisn.'scan_lulus').'.'.$jenis;
		// move_uploaded_file($_FILES['scan_lulus']['tmp_name'],$fotoid);
		$filedata['data'] = array(
			'id_user' => $siswa['id'],
			'jenis'		=> 'scan_lulus',
			'path'		=> encrypt_url('./assets/usr/'.$this->session->userdata('data_login')['username'].encrypt_url('11'.$this->session->userdata('data_login')['username']).'/'.$this->session->userdata('data_login')['username'].'_scan_lulus.'.$jenis)
		);
		$insert =  $this->curl->simple_post($this->API.'set_file', $filedata, array(CURLOPT_BUFFERSIZE => 0));

		$user['where'] = array(
			'id_user'				=> $siswa['id']
		);
		$user['data'] = array(
			'tahap_daftar'	=> 4
		);
		$update =  $this->curl->simple_put($this->API.'set_user', $user, array(CURLOPT_BUFFERSIZE => 0));

		redirect(base_url('C_daftar'));
	}

	function add4(){
		// Get id siswa terakhir
		$siswa = json_decode($this->curl->simple_get($this->API.'get_siswa', array('where'=>['nisn'=>$this->session->userdata('data_login')['username']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
		$pendaftaran = json_decode($this->curl->simple_get($this->API.'get_pendaftaran', array('where'=>['id_user'=>$siswa['id']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];

		// Input nilai rapot
		$hasil = 0;
		for ($c=1;$c<=5;$c++){
			$semester['data'] = array(
				'id_user'				=> $siswa['id'],
				'semester'				=> $c,
				'nilai_inggris'			=> $this->input->post('sms'.$c.'_inggris'),
				'nilai_indonesia'		=> $this->input->post('sms'.$c.'_indo'),
				'nilai_mtk'				=> $this->input->post('sms'.$c.'_mtk'),
				'nilai_ipa'				=> $this->input->post('sms'.$c.'_ipa'),
				'nilai_ips'				=> $this->input->post('sms'.$c.'_ips'),
				'nilai_pai'				=> $this->input->post('sms'.$c.'_pai')
			);
			$insert =  $this->curl->simple_post($this->API.'set_nilai', $semester, array(CURLOPT_BUFFERSIZE => 0));
			$hasil += $this->input->post('sms'.$c.'_inggris');
			$hasil += $this->input->post('sms'.$c.'_indo');
			$hasil += $this->input->post('sms'.$c.'_mtk');
			$hasil += $this->input->post('sms'.$c.'_ipa');
			$hasil += $this->input->post('sms'.$c.'_ips');
			$hasil += $this->input->post('sms'.$c.'_pai');
		}
		$data['data'] = array(
			'id_user' 			=> $siswa['id'],
			'nilai_total' 		=> $hasil,
			'nama' 				=> $siswa['nama'],
			'sekolah' 			=> $pendaftaran['nama_sekolah']
		);
		$insert =  $this->curl->simple_post($this->API.'Set_seleksi', $data, array(CURLOPT_BUFFERSIZE => 0));

		// Upload scan semester
		for($c=1;$c<=5;$c++){
			$path = $_FILES['scan_semester'.$c]['name'];
			$jenis = pathinfo($path, PATHINFO_EXTENSION);
			// $this->upload_files($_FILES['scan_semester'.$c], 'scan_semester'.$c, encrypt_url($nisn.'scan_semester'.$c).'.'.$jenis);
			// $fotoid = './assets/usr/'.encrypt_url($nisn.'scan_semester'.$c).'.'.$jenis;
			// move_uploaded_file($_FILES['scan_semester'.$c]['tmp_name'],$fotoid);
			$filedata['data'] = array(
				'id_user' => $siswa['id'],
				'jenis'		=> 'scan_semester'.$c,
				'path'		=> encrypt_url('./assets/usr/'.$this->session->userdata('data_login')['username'].encrypt_url('11'.$this->session->userdata('data_login')['username']).'/'.$this->session->userdata('data_login')['username'].'_scan_semester'.$c.'.'.$jenis)
			);
			$insert =  $this->curl->simple_post($this->API.'set_file', $filedata, array(CURLOPT_BUFFERSIZE => 0));
		}

		$pendaftaran = json_decode($this->curl->simple_get($this->API.'get_pendaftaran', array('where'=>['id_user'=>$siswa['id']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
		$user['where'] = array(
			'id_user'				=> $siswa['id']
		);
		if ($pendaftaran['jalur_daftar'] == 'umum'){
			$user['data'] = array(
				'tahap_daftar'	=> 6
			);

			// Upload file sertifikat
			for($c=1;$c<=3;$c++){
				$filedata['data'] = array(
					'id_user' 	=> $siswa['id'],
					'jenis'		=> 'sertifikat'.$c,
					'path'		=> encrypt_url('./assets/usr/'.$this->session->userdata('data_login')['username'].encrypt_url('11'.$this->session->userdata('data_login')['username']).'/'.$this->session->userdata('data_login')['username'].'_sertifikat'.$c.'.')
				);
				$insert =  $this->curl->simple_post($this->API.'set_file', $filedata, array(CURLOPT_BUFFERSIZE => 0));
			}
		}else{
			$user['data'] = array(
				'tahap_daftar'	=> 5
			);
		}
		$update =  $this->curl->simple_put($this->API.'set_user', $user, array(CURLOPT_BUFFERSIZE => 0));

		redirect(base_url('C_daftar'));
	}

	function add5(){
		// Get id siswa terakhir
		$siswa = json_decode($this->curl->simple_get($this->API.'get_siswa', array('where'=>['nisn'=>$this->session->userdata('data_login')['username']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];
		
		// Input Prestasi
		for($c=1;$c<=3;$c++){
			if ($this->input->post('pres'.$c) != "" && $this->input->post('tp'.$c) != ""){
				$prestasi['data'] = array(
					'id_user'				=> $siswa['id'],
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
				$insert =  $this->curl->simple_post($this->API.'set_prestasi', $prestasi, array(CURLOPT_BUFFERSIZE => 0));
			}
		}

		// Upload file sertifikat 1
		for($c=1;$c<=3;$c++){
			$path = $_FILES['sertifikat'.$c]['name'];
			$jenis = pathinfo($path, PATHINFO_EXTENSION);
			// $this->upload_files($_FILES['sertifikat'.$c], 'sertifikat'.$c, encrypt_url($nisn.'sertifikat'.$c).'.'.$jenis);
			// $fotoid = './assets/usr/'.encrypt_url($nisn.'sertifikat'.$c).'.'.$jenis;
			// move_uploaded_file($_FILES['sertifikat'.$c]['tmp_name'],$fotoid);
			$filedata['data'] = array(
				'id_user' => $siswa['id'],
				'jenis'		=> 'sertifikat'.$c,
				'path'		=> encrypt_url('./assets/usr/'.$this->session->userdata('data_login')['username'].encrypt_url('11'.$this->session->userdata('data_login')['username']).'/'.$this->session->userdata('data_login')['username'].'_sertifikat'.$c.'.'.$jenis)
			);
			$insert =  $this->curl->simple_post($this->API.'set_file', $filedata, array(CURLOPT_BUFFERSIZE => 0));
		}

		$user['where'] = array(
			'id_user'				=> $siswa['id']
		);
		$user['data'] = array(
			'tahap_daftar'	=> 6
		);
		$update =  $this->curl->simple_put($this->API.'set_user', $user, array(CURLOPT_BUFFERSIZE => 0));

		redirect(base_url('C_daftar'));
	}

	function add6(){
		// Get id siswa terakhir
		$siswa = json_decode($this->curl->simple_get($this->API.'get_siswa', array('where'=>['nisn'=>$this->session->userdata('data_login')['username']]), array(CURLOPT_BUFFERSIZE => 10)), true)[0];

		// Menambahkan data KIP
		$siswa['where'] = array(
			'id'						=> $siswa['id']
		);
		$siswa['data'] = array(
			'kip'						=> $this->input->post('kip'),
			'no_kip'					=> 0
		);
		if ($this->input->post('kip') == "Iya"){
			$siswa['data']['no_kip'] = $this->input->post('no_kip');
		}
		$update =  $this->curl->simple_put($this->API.'set_siswa', $siswa, array(CURLOPT_BUFFERSIZE => 0));

		// Input data pendaftaran
		$pendaftaran['where'] = array(
			'id_user'				=> $siswa['id']
		);
		$pendaftaran['data'] = array(
			'jurusan'				=> $this->input->post('jurusan'),
			'peminatan'			=> $this->input->post('peminatan')
		);
		$update =  $this->curl->simple_put($this->API.'set_pendaftaran', $pendaftaran, array(CURLOPT_BUFFERSIZE => 0));

		// Upload file KIP
		$path = $_FILES['file_kip']['name'];
		$jenis = pathinfo($path, PATHINFO_EXTENSION);
		// $this->upload_files($_FILES['file_kip'], 'file_kip', encrypt_url($nisn.'file_kip').'.'.$jenis);
		// $fotoid = './assets/usr/'.encrypt_url($nisn.'file_kip').'.'.$jenis;
		// move_uploaded_file($_FILES['file_kip']['tmp_name'],$fotoid);
		$filedata['data'] = array(
			'id_user' => $siswa['id'],
			'jenis'		=> 'file_kip',
			'path'		=> encrypt_url('./assets/usr/'.$this->session->userdata('data_login')['username'].encrypt_url('11'.$this->session->userdata('data_login')['username']).'/'.$this->session->userdata('data_login')['username'].'_file_kip.'.$jenis)
		);
		$insert =  $this->curl->simple_post($this->API.'set_file', $filedata, array(CURLOPT_BUFFERSIZE => 0));

		$user['where'] = array(
			'id_user'				=> $siswa['id']
		);
		$user['data'] = array(
			'tahap_daftar'	=> 0
		);
		$update =  $this->curl->simple_put($this->API.'set_user', $user, array(CURLOPT_BUFFERSIZE => 0));

		redirect(base_url('C_daftar'));
	}

	function cek_nisn($nisn){
		$data['where'] = array(
      		'nisn' => $nisn
		);
		// $this->API = 'https://svc-mc1.ppdb-man-1-cianjur.com/';
		// $this->API = 'http://localhost/ppdb_man_1_cianjur/service/';
		$user = json_decode($this->curl->simple_get($this->API.'get_siswa', $data, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
		// print_r($user);
		if (is_null($user) || $user == '401'){
			echo 1;
		}else{
			echo -1;
		}
	}
}
