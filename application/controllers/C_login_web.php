<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login_web extends CI_Controller {
  var $API ="";

	function __construct() {
		parent::__construct();
		$this->API="http://localhost/web_service/service/index.php";
	}
}

?>
