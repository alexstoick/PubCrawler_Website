<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signout extends CI_Controller {

	private function deauthenticate() {
		$this->session->sess_destroy();
	}

	public function index() {
		$this->deauthenticate();
		redirect('/');
	}

}

?>
