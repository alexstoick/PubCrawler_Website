<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function index() {

		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules('number_of_pubs', '', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('my_budget', '', 'required|is_natural_no_zero');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata(array('error_message' => 'Incorrect data supplied'));
			redirect('/');
		} else {
			//$this->load->model('Model_
		}
	}
}

?>
