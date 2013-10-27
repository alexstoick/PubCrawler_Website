<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {

	private function authenticate($user) {
		$this->load->library('session');
		$this->session->set_userdata(array(
			'user_id' => $user->user_id,
			'user_authenticated' => true
		));
	}


	public function index() {
		$this->load->view('layouts/layout',
			array('content' => $this->load->view('signin/form'))
		);
	}

	/**
	 * Login
	 */
	public function login() {
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules('form_username', 'Email', 'required');
		$this->form_validation->set_rules('form_password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/layout',
				array('content' => $this->load->view('signin/form',
						array('error_message' => 'Please, provide username and password.')
					)
				)
			);
		} else {
			$this->load->model('User_model');

			$user_name = $this->input->post('form_username');
			if ($this->User_model->check_username($user_name)) {
				$user = $this->User_model->get_user_by_username($user_name);
				
				if ($this->User_model->check_password($user->user_id, $this->input->post('form_password'))) {
					$this->authenticate($user);
					redirect('/');
				} else {
					$this->load->view('layouts/layout',
						array('content' => $this->load->view('signin/form',
								array('error_message' => 'Incorrect username or password.')
							)
						)
					);
				}
				
			} else {
				$this->load->view('layouts/layout',
					array('content' => $this->load->view('signin/form',
							array('error_message' => 'Incorrect username and password.')
						)
					)
				);
			}
		}
	}

}

?>
