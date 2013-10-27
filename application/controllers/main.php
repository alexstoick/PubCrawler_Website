<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Main page
	 */
	public function index() {
		$this->load->model('Pub_model');

		$this->Pub_model->get_pubs();

		$user = array();
		if ($this->session->userdata('user_authenticated')) {
			$user_id = $this->session->userdata('user_id');

			$this->load->model('User_model');
			
			$user = array(
				'user' => $this->User_model->get_user_by_id($user_id),
				'attrs' => $this->User_model->get_user_attributes($user_id)
			);
		}

		$this->load->view('main/index', array(
				'user' => $user,
				'error_message' => $this->session->userdata('error_message'),
			)
		);
	}
}

?>
