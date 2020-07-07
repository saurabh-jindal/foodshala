<?php
class Users extends CI_Controller{

	//	register normal people
	public function register(){
		// Validation of form
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
		$this->form_validation->set_rules('veg', 'veg', 'required');
//		0 for non-veg 1 for veg
		if ($this->form_validation->run() === false) {
			$this->load->view('templates/header');
			$this->load->view('users/register');
			$this->load->view('templates/footer');
		}else{
			$encrypt_password = md5($this->input->post('password'));
			$this->User_model->register($encrypt_password);
//			message send
			$this->session->set_flashdata('user_registered', 'Congratulations ! You are now registered.');
			redirect('users/login');
		}
	}
	public function register_restaurant(){
		// Form validation
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
		if($this->form_validation->run() === false){
			$this->load->view('templates/header');
			$this->load->view('users/register_restaurant');
			$this->load->view('templates/footer');
		}
		else{
			// Password Encryption
			$encrypt_password = md5($this->input->post('password'));
			$this->User_model->register_restaurant($encrypt_password);
			// Flash Message
			$this->session->set_flashdata('user_registered', 'Yeah ! You are now registered.');
			redirect('users/login');
		}
	}

//	login controller
	public function login(){
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() === false) {
			$this->load->view('templates/header');
			$this->load->view('users/login');
			$this->load->view('templates/footer');
		}else{
			// Logged In
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			// Getting user_id
			$user_id = $this->User_model->login($email, $password);

			// User type
			$user_role = $this->User_model->get_user_role($user_id);

			// Veg or Non-veg ?
			$user_veg = $this->User_model->get_user_preference($user_id);

			// name
			$name = $this->User_model->get_user_name($user_id);
			if ($user_id){
				$user_data = array(
					'user_id'    => $user_id,
            		'email'      => $email,
            		'logged_in'  => true,
            		'user_role'  => $user_role,
            		'user_veg' => $user_veg,
            		'name'       => $name,
				);
				$this->session->set_userdata($user_data);
				redirect('home');
			}
			else{
				$this->session->set_flashdata('login_failed', 'Something wrong with User or Password');
			}
		}
	}

//	logout controller
	public function logout(){
		// unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('user_role');
		$this->session->unset_userdata('user_veg');
		$this->session->unset_userdata('name');
		redirect('users/login');
	}
}

?>
