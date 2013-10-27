<?php

class User_model extends CI_Model {
	
	/**
	 * Check whether username exists
	 */
	public function check_username($user_name = null) {
		$q = $this->db->get_where('users', array('user_name' => $user_name));
		return ($q->num_rows() > 0) ? 1 : 0;
	}

	/**
	 * Check password
	 */
	public function check_password($user_id, $password) {
		$q = $this->db->get_where('users',
			array(
				'user_id' => $user_id,
				'user_password' => sha1($password)
			)
		);

		return ($q->num_rows() > 0) ? 1 : 0;
	}

	/**
	 * Retrieve user by userid
	 */
	public function get_user_by_id($user_id) {
		return $this->db->get_where('users',
			array(
				'user_id' => $user_id
			)
		)->row();
	}

	/**
	 * Retrieve user by username
	 */
	public function get_user_by_username($user_name) {
		return $this->db->get_where('users',
			array(
				'user_name' => $user_name
			)
		)->row();
	}

	/**
	 * Get user attributes
	 */
	public function get_user_attributes($user_id) {
		$this->db->join('user_attributes', 'user_attributes.user_attr_id = user_attributes_list.user_attr_id');
		return $this->db->get_where('user_attributes_list', array('user_id' => $user_id))->result();
	}
}

?>
