<?php

class Rating {
	var	$rating_value,
		$rating_reference;

	public function Rating($value = 0, $reference = 0) {
		$this->set_value($value);
		$this->set_reference($reference);
	}

	public function set_value($value) {
		$this->rating_value = $value;
	}

	public function set_reference($reference) {
		$this->rating_reference = $reference;
	}
}

class Rating_model extends CI_Model {

	public function add_rating(Rating $rating) {
		$this->db->insert('ratings', $rating);
	}
	
	public function get_rating($reference_id) {
		$results = $this->db->get_where('ratings', array('rating_reference' => $reference_id))->result();

		$sum = 0;
		foreach ($results as $result) {
			$sum += $result->rating_value;
		}

		return count($results) ? round($sum/count($results)) : 0;
	}
}

?>
