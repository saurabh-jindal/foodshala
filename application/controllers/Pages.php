<?php
class Pages extends CI_Controller{
//	general function
	public function __construct()
	{
		parent::__construct();

		// load Session Library
		$this->load->library('session');
	}

	/*
	 * I have tried to make this website XSS Attack Proof
	 * To make it secure.
	 */

	public function view($page = 'home'){
		if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
			show_404();
		}
		/*
		 * Home Page showing all foods without order functionality
		 * It is basically built for the restaurant owners to check their food
		 */
		$data['foods'] = $this->Food_model->get_foods();
		$this->load->view('templates/header');
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer');
	}

}
?>

