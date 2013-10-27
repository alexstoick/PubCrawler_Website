<?php

class Crawl {
	var $crawl_id;
	var $crawl_title;

	public function Crawl($crawl_title) {
		$this->crawl_title = $crawl_title;
	}
	
	public function set_id($id) {
		$this->crawl_id = $id;
	}
	public function get_id() {
		return $this->crawl_id;
	}
}

class Crawl_model extends CI_Model {


	public function add_crawl(Crawl $crawl) {
		$this->db->insert('crawls', $crawl);
		return $this->db->insert_id();
	}
}

?>
