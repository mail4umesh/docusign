<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MX_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('profile_model');
		$this->load->library('template');
		

		// If not logged in, redirect to login page
		if(!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}

	}

	public function index()
	{
		
		$data['title'] = "Profile View";

		

		$profile	= $this->profile_model->get_profile();
		
		$data['profile'] = $profile[0];


		$this->template->load('default', 'view', $data);

		
	}

	public function change_password()
	{
		
		$this->data 					= array();
		$this->data['title'] 			= "Change Password";
		
		$this->data['edit']				= $this->profile_model->get_profile();

		$this->template->load('default', 'change_password', $this->data);
	}

	function do_change_password() {
		
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

		if ($this->form_validation->run() == FALSE) {
			
			$this->change_password();
		} else {

			$table_data = array(
				"password"				=>	$this->input->post('password'),
			);

			

			
				
				
				$profiles_id 				=	$this->ion_auth->get_user_id();
				
				$this->profile_model->change_password($table_data, $profiles_id);
				$id = $this->input->post('profiles_id');
				$this->session->set_flashdata('success','Password successfully updated');
			
				redirect('profile');
			
		}
	}


	function add($data = array()){
		
		$type = $this->uri->segment(3,'');
		if(!is_array($data)) {
			$data = array();
		}

		

		$this->template->load('default', 'add', $data);
		
	}

	

	function edit() {
		
		$data['title'] = "Edit Item";

		

		$data['edit']	= $this->profile_model->get_profile();
		

		$this->add($data); 
	}



	function do_add() {
		
		$this->form_validation->set_rules('first_name','First Name','required');
		

		if ($this->form_validation->run() == FALSE) {
			if($this->input->post('profiles_id') == "" ) {
				$this->add();	
			} else {
				$this->edit($this->input->post('profiles_id') );
			}
			

		} else {
			$table_data = array(
				"first_name"			=>	$this->input->post('first_name'),
				"last_name"				=>	$this->input->post('last_name'),
				"company"				=>	$this->input->post('company'),
				"phone"					=>	$this->input->post('phone'),
			
			);

				
				$profile_id 				=	$this->ion_auth->get_user_id();
				
				$this->profile_model->update($table_data, $profile_id);
				
				$this->session->set_flashdata('success','Profile successfully updated');
			
			redirect('profile'.$id);
		}
	}

	


	


}