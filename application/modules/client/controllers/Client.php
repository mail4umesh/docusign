<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends MX_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('client_model');
		$this->load->library('template');
		

		// If not logged in, redirect to login page
		if(!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}

		if(!$this->ion_auth->in_group('admin')) {
			$this->session->set_flashdata('info','You don\'t have permission to View Client');
			redirect('dashboard');
		}
	}

	public function index()
	{
		


		$this->data 					= array();
		$this->data['title'] 			= "Manage Client";
		$this->data['users']			= $this->client_model->get_all_user();

		$this->template->load('default', 'index', $this->data);
	}

	public function change_password($user_id)
	{
		
		$this->data 					= array();
		$this->data['title'] 			= "Change Password";
		
		$this->data['edit']			= $this->client_model->get_user($user_id);



		$this->template->load('default', 'change_password', $this->data);
	}

	function do_change_password() {
		
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

		if ($this->form_validation->run() == FALSE) {
			
			$this->change_password($this->input->post('users_id') );
		} else {

			$table_data = array(
				"password"				=>	$this->input->post('password'),
			);

			

			if($this->input->post('users_id')) {
				
				
				$users_id 				=	$this->input->post('users_id');
				
				$this->client_model->change_password($table_data, $users_id);
				$id = $this->input->post('users_id');
				$this->session->set_flashdata('success','Password successfully updated');
			
				redirect('client/view/'.$id);
			}
		}
	}




	function add($data = array()){
		if(!$this->ion_auth->in_group('admin') && !$this->ion_auth->in_group('manager') ) {
			$this->session->set_flashdata('error','You don\'t have permission to Add User');
			redirect('client');
		}



		$type = $this->uri->segment(3,'');
		if(!is_array($data)) {
			$data = array();
			$data['title'] 			= "Add Client";
		}

		$this->template->load('default', 'add', $data);
		
	}

	function edit($user_id) {
		$data['title'] = "Edit Client";

		if(!$this->client_model->get_user($user_id)) {
			$this->session->set_flashdata('error','No user found with that ID');
			redirect('client','refresh');
		}

		$data['edit']	= $this->client_model->get_user($user_id);
		

		$this->add($data); 
	}



	function do_add() {
		
		$this->form_validation->set_rules('first_name','First Name','required');
		
		if($this->input->post('users_id') == "" ) {
			$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		} 
		

		if ($this->form_validation->run() == FALSE) {
			if($this->input->post('users_id') == "" ) {
				$this->add();	
			} else {
				$this->edit($this->input->post('users_id') );
			}
			

		} else {
			$table_data = array(
				"first_name"			=>	$this->input->post('first_name'),
				"last_name"				=>	$this->input->post('last_name'),
				"username"				=>	$this->input->post('username'),
				"company"				=>	$this->input->post('company'),
				"email"					=>	$this->input->post('email'),  
				"phone"					=>	$this->input->post('phone'),
				"password"				=>	$this->input->post('password'),
				"group_id"				=>	'3',
				


			);

			

			if($this->input->post('users_id')) {
				
				
				$user_id 				=	$this->input->post('users_id');
				
				$this->client_model->update($table_data,$user_id);
				$id = $this->input->post('users_id');
				$this->session->set_flashdata('success','Client successfully updated');
			} else {
				

				$id = $this->client_model->insert($table_data);
				$this->session->set_flashdata('success','Client successfully added');
			}
			redirect('client/view/'.$id);
		}
	}

	function view($user_id) {
		$data['title'] = "User View";

		if(!$this->client_model->get_user($user_id)) {
			$this->session->set_flashdata('error','No Client found with that ID');
			redirect('client','refresh');
		}

		$client	= $this->client_model->get_user($user_id);

		$data['title'] 			= "Client Detail";
		
		$data['user'] = $client[0];

		$data['inspection_list']	= $this->client_model->get_inspection_list($user_id);
		$data['pending_form_list']	= $this->client_model->get_pending_form_list($user_id);


		$this->template->load('default', 'view', $data);
		
	}


	function remove($id) {
		if(!$this->ion_auth->in_group('admin') ) {
			$this->session->set_flashdata('error','You don\'t have permission to delete Client');
			redirect('dashboard');
		}

    	$table_data = array(
    		"active"		=> "0",
    	);

    	$this->db->where('id', $id);
    	$this->db->update('users', $table_data);

    	$this->session->set_flashdata('success','Client Deleted');
		redirect('client');
    }

    

    

}