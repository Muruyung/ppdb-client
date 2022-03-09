<?php
/******************************************
* Filename    : C_lupa_pass.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-09
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Controller untuk mengganti password yang lupa
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lupa_pass extends CI_Controller {

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
			if(is_null($result) || $result == 401){
				$this->session->sess_destroy();
				$data['halaman'] = 'lupa_pass';
				$this->session->set_userdata(['token_kelulusan'=>"kosong"]);
				$this->load->view('headfoot/header', $data);
				$this->load->view('content/V_lupa_pass');
				$this->load->view('headfoot/footer');
			}else{
				redirect(base_url());
			}
		}else{
			$this->session->sess_destroy();
			$data['halaman'] = 'lupa_pass';
			$this->session->set_userdata(['token_kelulusan'=>"kosong"]);
			$this->load->view('headfoot/header', $data);
			$this->load->view('content/V_lupa_pass');
			$this->load->view('headfoot/footer');
		}
	}

	// proses untuk cek password
	function cek_user($user){
		$data['where'] = array(
			'username'  => $user
		);
		// $this->API='https://svc-mc1.ppdb-man-1-cianjur.com/';
		// $this->API = 'http://localhost/ppdb_man_1_cianjur/service/';
		$user = json_decode($this->curl->simple_get($this->API.'Get_user', $data, array(CURLOPT_BUFFERSIZE => 10)), true);
		// print_r($user);
		if (!is_null($user) && $user[0] != '401'){
			// print_r($_SESSION);
			if ($user[0]['kesempatan_lupa'] == 0 && $user[0]['kesempatan_email'] == 0){
				echo -2;
			}else{
				echo 1;
			}
		}else{
			echo -1;
		}
	}

	function kirim(){
		$data['where'] = array(
			'nisn' => $this->input->post('username')
		);
		$siswa = json_decode($this->curl->simple_get($this->API.'Get_siswa', $data, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
		
		$data['where'] = array(
			'username' => $this->input->post('username')
		);
		$user = json_decode($this->curl->simple_get($this->API.'Get_user', $data, array(CURLOPT_BUFFERSIZE => 10)), true)[0];

		$this->load->config('email');
		$this->load->library('email');
		
		$from = $this->config->item('smtp_user');
		
		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($siswa['email']);
		$this->email->subject('Konfirmasi Lupa Password');
		$this->email->message('JANGAN BERIKAN LINK INI KEPADA SIAPA PUN, TERMASUK PIHAK ADMIN PPDB MAN 1 CIANJUR. 
Klik link di bawah untuk mengganti password anda:
'.base_url('C_ganti_pass_lupa').'/abdi_hilap_kedah_gentos/'.encrypt_url(encrypt_url($this->input->post('username'))));
		
		if ($user['kesempatan_email'] > 0){
			if ($this->email->send()) {
				$user['kesempatan_email'] -= 1;
				$data['data'] = array(
					'kesempatan_email' => $user['kesempatan_email'],
					'konfirmasi_lupa'  => 1
				);
				$update = $this->curl->simple_put($this->API.'Set_user', $data, array(CURLOPT_BUFFERSIZE => 10));
	
				// echo 'Your Email has successfully been sent.';
				$this->session->set_userdata(['data_lupa'=>['halaman'=>'1', 'username'=>$this->input->post('username')]]);
				echo 1;
			} else {
				// show_error($this->email->print_debugger());
				echo -1;
			}
		}else{
			echo -2;
		}
	}
}
