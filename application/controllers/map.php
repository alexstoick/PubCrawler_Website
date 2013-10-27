<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends CI_Controller {

	private function generate_json($pubs) {
		$this->load->model('Rating_model');

		$number_of_pubs = count($pubs);
		$center = array('lat' => 0, 'long' => 0);
		$data = array();
		foreach ($pubs as $pub) {
			array_push($data, array(
				'lat' => $pub->pub_location_latitude,
				'lng' => $pub->pub_location_longitude,
				'data' => array(
						'id' => $pub->pub_id,
						'rating' => $this->Rating_model->get_rating($pub->pub_id),
						'name' => $pub->pub_name
					)
				)
			);

			$center['lat'] += floatval($pub->pub_location_latitude);
			$center['long'] += floatval($pub->pub_location_longitude);
		}

		$x = $center['lat']/$number_of_pubs;
		$y = $center['long']/$number_of_pubs;

		$json = array(
			"center" => array($x, $y),
			"macDoList" => $data
		);

		return $json;
	}

	/**
	 * Retrieve all pubs
	 */
	public function load_pubs() {
		$this->load->model('Pub_model');
		$pubs = $this->Pub_model->get_pubs();

		$this->output
    			->set_content_type('application/json')
    			->set_output(json_encode($this->generate_json($pubs)));
	}

	/**
	 * Generate random crawl
	 */

	public function generate($limit = 5) {

		/**
		 * Load models
		 */
		$this->load->model(array(
			'Pub_model',
			'Crawl_model',
			'Spot_model'
			)
		);

		$this->load->helper('map_helper');

		$crawl = new Crawl('title');
		$crawl->set_id($this->Crawl_model->add_crawl($crawl));

		$pub = current($this->Pub_model->get_random_pubs(1));

		$selected_pubs = array($pub);
		$order = 1;
		while ($limit--) {

			$this->Pub_model->exclude_pubs($selected_pubs);
			$pubs = $this->Pub_model->get_nearby_pubs($pub);

			if (empty($pubs)) break;

			$pub = find_closest_pub($pub, $pubs);

			$spot = new Spot($crawl->get_id());
			$spot->set_reference($pub->pub_id);
			$spot->set_order($order++);
			$spot->set_type(1);
			$this->Spot_model->add_spot($spot);

			array_push($selected_pubs, $pub);
		}

		$pub_list = array();
		foreach ($selected_pubs as $pub) {
			array_push($pub_list, array($pub->pub_name, $pub->pub_location_latitude, $pub->pub_location_longitude));
		}

		$this->output
    			->set_content_type('application/json')
    			->set_output(json_encode($pub_list));

	}
}
?>
