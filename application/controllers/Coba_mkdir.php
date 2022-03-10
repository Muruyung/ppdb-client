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

class Coba_mkdir extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		// $this->API = 'https://svc-mc1.ppdb-man-1-cianjur.com/';
		$this->API = api_url();
	}

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
		$path = './assets/usr/coba';
		if (!mkdir($path)){
			echo "gagal";
		}else{
			echo "sukses";
		}
	}
}
