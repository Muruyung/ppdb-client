<?php
/******************************************
* Filename    : C_pemberitahuan.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-02
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Controller untuk halaman cara pendaftaran
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_encrypt extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		// $this->API = 'https://svc-mc1.ppdb-man-1-cianjur.com/';
		$this->API = api_url();
	}

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
		$data = array(
			'encrypt' => encrypt_url('30'),
			'decrypt' => decrypt_url('Nk4ybGR0eHFqVzhSQ21id2FXQnU5STg1cVc2ZnZuelJBT2RlWGFubVNuRXl3cFh6K3VVbjVTVmlvdFpqc0VwTC9XbXBhMTdOL00wRGl6SytyRXoyUHM2TmZaUEJvNXpEZVoxL3JyMHNOWnBPcjVBZkpMOFRFclB0ZTdqcTZlMlQ='),
			'ingfona' => explode('.', decrypt_url('Nk4ybGR0eHFqVzhSQ21id2FXQnU5STg1cVc2ZnZuelJBT2RlWGFubVNuRXl3cFh6K3VVbjVTVmlvdFpqc0VwTC9XbXBhMTdOL00wRGl6SytyRXoyUHM2TmZaUEJvNXpEZVoxL3JyMHNOWnBPcjVBZkpMOFRFclB0ZTdqcTZlMlQ='))[1]
		);
		print_r($data);
	}
}
