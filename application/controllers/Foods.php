<?php
class Foods extends CI_Controller{
//	all available foods
	public function __construct()
	{
		parent::__construct();

		// load Session Library
		$this->load->library('session');
	}
	public function index(){
//		$data['title'] = "Hot Foods";
		$data['foods'] = $this->Food_model->get_foods();
		// Extracting name of restaurants for corresponding foods
		$data['rnames'] = array();
		for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
			$name = $this->Food_model->get_name($data['foods'][$x]['user_id']);
			array_push($data['rnames'], $name);
		}
		$this->load->view('templates/header');
		$this->load->view('foods/index', $data);
		$this->load->view('templates/footer');
	}

	// adding food as a restaurant
	public function add_menu(){
		if($this->session->userdata('user_role') != null){
			if($this->session->userdata('user_role') == 0){
//				form validation
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('price', 'Price', 'required');
				if ($this->form_validation->run() === false) {
					$this->load->view('templates/header');
					$this->load->view('foods/add_menu');
					$this->load->view('templates/footer');
				} else {
					$this->Food_model->add_menu();

					redirect('home');
				}
			}else{
				print_r('Sorry you do not have proper permissions.');
			}

		}else{
			redirect('user/login');
		}
	}


//	order food
	public function add_to_cart($food_id){
		// Validation to check only users should add food to cart.
		if ($this->session->userdata('user_role') != null) {
			if ($this->session->userdata('user_role') == 1) {
				$people_id = $this->session->userdata('user_id');
				$restaurant_id = $this->Food_model->get_restaurant_id($food_id);
				$this->Food_model->add_to_cart($restaurant_id, $people_id, $food_id);
				// Flash message
				$this->session->set_flashdata('added_to_cart', 'Your food is added to cart.');
				redirect('foods');
			} else {
				print_r('Sorry a restaurant can\'t add food to cart. :(');
			}
		} else {
			redirect('users/login');
		}
	}
	
	public function view_cart(){
		//validation for only user accessible
		if ($this->session->userdata('user_role') != null) {
			if ($this->session->userdata('user_role') == 1) {
				$user_id = $this->session->userdata('user_id');
				$data['foods'] = $this->Food_model->get_cart_foods($user_id);
				// Extracting name of foods
				$data['fname'] = array();
				for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
					$name = $this->Food_model->get_food_name($data['foods'][$x]['food_id']);
					array_push($data['fname'], $name);
				}
				//extracting food price
				$data['price'] = array();
				for($x = 0; $x <= count($data['foods']) - 1; $x++) {
					$p = $this->Food_model->get_food_price($data['foods'][$x]['food_id']);
					array_push($data['price'], $p);
				}
				$data['total_price'] = array_sum($data['price']);


				// Extracting name of restaurants
				$data['rname'] = array();
				for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
					$name = $this->Food_model->get_restaurant_name($data['foods'][$x]['restaurant_id']);
					array_push($data['rname'], $name);
				}

				$this->load->view('templates/header');
				$this->load->view('foods/view_cart', $data);
				$this->load->view('templates/footer');
			} else {
				print_r('Sorry, a user cannot view orders, :(');
			}
		} else {
			redirect('users/login');
		}
	}
	// view for only restaurants
	public function view_orders()
	{
		// Backend validation to check only restaurant should access view_orders section.
		if ($this->session->userdata('user_role') != null) {
			if ($this->session->userdata('user_role') == 0) {
				$user_id = $this->session->userdata('user_id');
				$data['orders'] = $this->Food_model->get_orders($user_id);

				// Extracting name of users who ordered
				$data['uname'] = array();
				for ($x = 0; $x <= count($data['orders']) - 1; $x++) {
					$name = $this->Food_model->get_name($data['orders'][$x]['people_id']);
					array_push($data['uname'], $name);
				}
				$data['foodname'] = array();
				for($x = 0; $x <= count($data['orders']) - 1; $x++) {
					$name = $this->Food_model->get_food_name($data['orders'][$x]['food_id']);
					array_push($data['foodname'], $name);
				}
				$data['foodprice'] = array();
				for($x = 0; $x <= count($data['orders']) - 1; $x++) {
					$name = $this->Food_model->get_food_price($data['orders'][$x]['food_id']);
					array_push($data['foodprice'], $name);
				}

				// Extracting email of user who ordered
				$data['email'] = array();
				for ($x = 0; $x <= count($data['orders']) - 1; $x++) {
					$name = $this->Food_model->get_email($data['orders'][$x]['people_id']);
					array_push($data['email'], $name);
				}

				$this->load->view('templates/header');
				$this->load->view('foods/view_orders', $data);
				$this->load->view('templates/footer');
			} else {
				print_r('Sorry a user cannot view orders, :(');
			}
		} else {
			redirect('users/login');
		}
	}

}
?>
