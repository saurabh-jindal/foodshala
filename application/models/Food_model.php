<?php
class Food_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	/*
	 * Restauarnts Model
	 */
	/*
	 * logged In Restaurants ADD Menu Items Model
	 * I have used static images for now but it can be configured for the website.
	 */
	public function add_menu()
	{
		$data = array(
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
				'user_id' => $this->session->userdata('user_id'),
				'veg' => $this->input->post('veg'),
		);
		if ($_FILES['image']['name'] !== null) {
			$slug = url_title($this->session->userdata('name'), 'dash', true);
			$time = substr(md5(time()), 1, 8);
			$fileext = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
			$filename = "{$slug}-{$time}-{$fileext}";
			$config = array(
					'upload_path' => '/assets/img/uploads/',
					'allowed_types' => 'gif|jpg|png',
					'max_sizes' => '100',
					'max_width' => '1024',
					'max_height' => '768',
					'file_name' => $filename,
			);
			$this->load->library('upload', $config);
			// if everything okay sends the path to database
			if ($this->upload->do_upload('image')) {
				// getting the errors
				// $this->upload->display_errors()
				$data['image'] = "{$config['upload_path']}{$filename}";
			}

		}
		/*
		 * To filter out the content for XSS Attack
		 */
		$data = $this->security->xss_clean($data);
		return $this->db->insert('food', $data);
	}

	/*
	 * Returning Restaurant ID
	 * In case of Restaurants ->  User ID == Restaurants ID
	 */
	public function get_restaurant_id($food_id)
	{
		$query = $this->db->where('id', $food_id);
		$result = $this->db->get('food');
		if ($result->num_rows() == 1) {
			return $result->row(0)->user_id;
		} else {
			return false;
		}
	}

	/*
	 * Returning Restaurants Name
	 */
	public function get_restaurant_name($restaurant_id)
	{
		$query = $this->db->where('id', $restaurant_id);
		$result = $this->db->get('users');
		if ($result->num_rows() == 1) {
			return $result->row(0)->name;
		} else {
			return false;
		}
	}

	/*
	 * Returning Orders for a perticular Restaurants
	 */
	public function get_orders($user_id)
	{
		$query = $this->db->where('restaurant_id', $user_id);
		$result = $this->db->get('order');
		return $result->result_array();
	}


/*
 * FOOD MODELS
 */

	/*
	 * Returning all Available food
	 */
	public function get_foods()
	{
		$query = $this->db->get('food');

		return $query->result_array();
	}


	/*
	 * Returning Food name for a food ID
	 */
	public function get_food_name($food_id)
	{
		$query = $this->db->where('id', $food_id);
		$result = $this->db->get('food');
		if ($result->num_rows() == 1) {
			return $result->row(0)->name;
		} else {
			return false;
		}
	}

	/*
	 * Returing Food price for a perticular Food ID
	 */
	public function get_food_price($food_id){
		$query = $this->db->where('id', $food_id);
		$result = $this->db->get('food');
		if($result->num_rows() == 1){
			return $result->row(0)->price;
		} else {
			return false;
		}
	}
	/*
	 * Returing Food Image for a perticular Food ID
	 */
	public function get_food_image($food_id){
		$query = $this->db->where('id', $food_id);
		$result = $this->db->get('food');
		if($result->num_rows() == 1){
			return $result->row(0)->image;
		} else {
			return false;
		}
	}


/*
 * USER MODELS
 */

	/*
	 * Add TO CART model for normal Users
	 */
	public function add_to_cart($restaurant_id, $people_id, $food_id)
	{
		$data = array(
				'people_id' => $people_id,
				'food_id' => $food_id,
				'restaurant_id' => $restaurant_id,
		);
		return $this->db->insert('order', $data);
	}


	/*
	 * Returning Cart foods for a perticular USER ID
	 */
	public function get_cart_foods($user_id)
	{
		$query = $this->db->where('people_id', $user_id);
		$result = $this->db->get('order');

		return $result->result_array();
	}

	/*
	 * Returning User Email
	 */
	public function get_email($user_id)
	{
		$query = $this->db->where('id', $user_id);
		$result = $this->db->get('users');
		if ($result->num_rows() == 1) {
			return $result->row(0)->email;
		} else {
			return false;
		}
	}

	/*
	 * Returning User Name for a user id
	 */
	public function get_name($user_id)
	{
		$query = $this->db->where('id', $user_id);
		$result = $this->db->get('users');
		if ($result->num_rows() == 1) {
			return $result->row(0)->name;
		} else {
			return false;
		}
	}

}
?>
