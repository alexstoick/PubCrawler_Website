<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View extends CI_Controller {

	/**
	 * Display all pubs
	 */
	public function pubs() {
		$this->load->model('Pub_model');

		$this->Pub_model->join_zones();

		$output = array();
		foreach ($this->Pub_model->get_pubs() as $pub) {
			array_push($output, array('pub' => $pub, 'attributes' => $this->Pub_model->get_pub_attributes($pub->pub_id)));
		}

		$this->load->view('pages/view/pubs', 
			array('pubs' => $output)
		);
	}
	
}

?>
