<?php

class Offer_model extends CI_Model {
	
	/**
	 * Retrieve all offers
	 */
	public function get_offers() {
		return $this->db->get('orders')->result();
	}
}

?>
