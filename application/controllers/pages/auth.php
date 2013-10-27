<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function signin() {
		$this->load->view('pages/auth/signin');
	}
}

?>
