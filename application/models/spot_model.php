<?php

class Spot {
	var	$crawl_id,
		$spot_order,
		$spot_type,
		$spot_reference;

	public function Spot($crawl_id) {
		$this->crawl_id = $crawl_id;
	}

	public function set_order($order) {
		$this->spot_order = $order;
	}
	public function get_order() {
		return $this->spot_order;
	}

	public function set_type($type) {
		$this->spot_type = $type;
	}

	public function set_reference($id) {
		$this->spot_reference = $id;
	}
}

class Spot_model extends CI_Model {
	
	public function add_spot(Spot $spot) {
		$this->db->insert('spots', $spot);
		return $this->db->insert_id();
	}
}

?>
