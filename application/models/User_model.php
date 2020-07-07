<?php

class User_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	/*
	 * Disclaimer
	 * User Model are configured as follows :
	 * User Role -> 0 for restaurants and 1 for normal users
	 * Veg Preference -> 0 for Non-veg and 1 for veg
	 */


	/*
	 * Login model providing USER ID for further use
	 */
	public function login($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$result = $this->db->get('users');
		if ($result->num_rows() == 1) {
			return $result->row(0)->id;
		} else {
			return false;
		}
	}


	/*
	 * Getting USER ROLE either restaurant owner as 0 or Normal User as 1
	 */
	public function get_user_role($user_id)
	{
		$this->db->where('id', $user_id);
		$result = $this->db->get('users');
		if ($result->num_rows() == 1) {
			return $result->row(0)->role;
		} else {
			return false;
		}
	}

	/*
	 * Returning User Name
	 */
	public function get_user_name($user_id)
	{
		$this->db->where('id', $user_id);
		$result = $this->db->get('users');
		if ($result->num_rows() == 1) {
			return $result->row(0)->name;
		} else {
			return false;
		}
	}

	/*
	 * Returning User Preference 0 for Non-veg and 1 for Veg
	 */
	public function get_user_preference($user_id)
	{
		$this->db->where('id', $user_id);
		$result = $this->db->get('users');
		if ($result->num_rows() == 1) {
			return $result->row(0)->veg;
		} else {
			return false;
		}
	}


	/*
	 * Register Normal User Model
	 */
	public function register($enc_password)
	{
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => $enc_password,
			'role' => 1,
			'veg' => $this->input->post('veg'),
		);
		/*
		 * Filter out the content for XSS
		 */
		$data = $this->security->xss_clean($data);
		return $this->db->insert('users', $data);
	}

	/*
	 * Register Restaurant Model
	 */
	public function register_restaurant($enc_password)
	{
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => $enc_password,
			'role' => 0,
		);
		/*
		 * Filter out the content for XSS Attack
		 */
		$data = $this->security->xss_clean($data);
		return $this->db->insert('users', $data);
	}


}
?>
