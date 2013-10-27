<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {

	/**
	 * Set output
	 */
	private function set_output_json($output = array()) {
		$this->output
    			->set_content_type('application/json')
    			->set_output(json_encode($output));
	}
	

	public function index() {
		
	}

	


	public function authenticate($secret = null) {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->output
	    			->set_content_type('application/json')
	    			->set_output(json_encode(array('success' => false)));
		} else {
			$this->load->model('User_model');

			$user_name = $this->input->post('username');
			if ($this->User_model->check_username($user_name)) {
				$user = $this->User_model->get_user_by_username($user_name);
				
				if ($this->User_model->check_password($user->user_id, $this->input->post('password'))) {
					$this->output
			    			->set_content_type('application/json')
			    			->set_output(json_encode(array('success' => true)));
				} else {
					$this->output
			    			->set_content_type('application/json')
			    			->set_output(json_encode(array('success' => false)));
				}
				
			} else {
				$this->output
		    			->set_content_type('application/json')
		    			->set_output(json_encode(array('success' => false)));
			}

			
		}
	}

	/**
	 * Retrieve list of pubs
	 */
	public function pub($pub_id = 0, $zone_id = 0) {
		$this->load->model('Pub_model');

		if (intval($pub_id) > 0) {
			$this->set_output_json($this->Pub_model->get_pub($pub_id));
		} else {
			$this->set_output_json($this->Pub_model->get_pubs());
		}
	}
}
