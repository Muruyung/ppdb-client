<?php
/******************************************
* Filename    : Cetak_QR.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2021-04-30
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Controller untuk cetak QR Code
*
******************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_QR extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		// $this->API = 'https://svc-mc1.ppdb-man-1-cianjur.com/';
		
	}

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
		QRcode::png('coba qr code','./assets/usr/cobaQR.png');
	}
}
