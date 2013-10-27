<?php

class Pub_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * Retrieves all pubs
	 */
	public function get_pubs() {
		return $this->db->get('pubs')->result();
	}

	/**
	 * Select random pubs
	 */
	public function get_random_pubs($limit = 5) {
		$this->db->limit($limit);
		$this->db->order_by('rand()');
		return $this->db->get('pubs')->result();
	}

	/**
	 * Retrieve pub from pub id
	 */
	public function get_pub($pub_id) {
		return $this->db->get_where('pubs', array('pub_id' => $pub_id))->result();
	}


	/**
	 * Nearby pubs
	 */
	public function get_nearby_pubs($pub, $limit = 5) {
		$this->db->where('pub_location_latitude <', $pub->pub_location_latitude + 0.005);
		$this->db->where('pub_location_latitude >', $pub->pub_location_latitude - 0.005); 

		$this->db->where('pub_location_longitude <', $pub->pub_location_longitude + 0.005);
		$this->db->where('pub_location_longitude >', $pub->pub_location_longitude - 0.005);

		$this->db->limit(5);		

		return $this->db->get('pubs')->result();
	}


	/**
	 * Attributes
	 */
	public function get_pub_attributes($pub_id) {
		$this->db->join('pub_attributes', 'pub_attributes.pub_attr_id = pub_attributes_list.pub_attr_id');
		return $this->db->get_where('pub_attributes_list', array('pub_id' => $pub_id))->result();
	}
	public function join_attributes() {
		$this->db->join('pub_attributes_list', 'pub_attributes_list.pub_id = pubs.pub_id');
	}

	/**
	 * Zone
	 */
	public function join_zones() {
		$this->db->join('zones', 'zones.zone_id = pubs.pub_zone_id');
	}

	/** Misc
	 */
	public function exclude_pubs($pubs = array()) {
		$exclude_ids = array(0);
		foreach ($pubs as $pub) {
			array_push($exclude_ids, $pub->pub_id);
		}
		$this->db->where_not_in('pub_id', $exclude_ids);
	}
}
?>
