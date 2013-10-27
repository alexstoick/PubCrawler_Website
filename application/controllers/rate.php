<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rate extends CI_Controller {

	public function pub($pub_id = 0, $rating = 0) {
		$pub_id = intval($pub_id);
		$rating = intval($rating);

		if ($pub_id > 0 && ($rating > 0 && $rating < 6)) {
			if ($this->session->userdata('user_authenticated')) {
				$this->load->Model('Rating_model');

				$rating = new Rating($rating, $pub_id);
				$this->Rating_model->add_rating($rating);

				redirect('/');

			} else {
				show_error('User not logged in.', 500);
			}
			
		} else {
			show_error('Incorrect data supplied.', 500);
		}
	}
}

?>
