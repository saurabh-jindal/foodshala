<?php
class Pages extends CI_Controller{
//	general function
	public function __construct()
	{
		parent::__construct();

		// load Session Library
		$this->load->library('session');
	}

	public function view($page = 'home'){
		if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
			show_404();
		}
		// I want to send some foods here without any order functionality.
		$data['foods'] = $this->Food_model->get_foods();
		$this->load->view('templates/header');
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer');
	}

}
?>

