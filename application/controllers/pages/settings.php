<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function crawl() {
		$this->load->view('pages/settings/crawl');
	}
	
	public function password() {
		$this->load->view('pages/settings/password');
	}
}

?>
