<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offers extends CI_Controller {

	public function index() {
		$this->load->model('Offer_model');

		$this->load->view('layouts/pages',
			array('content' => $this->load->view('offers/list', '', true))
		);
	}
}

?>
