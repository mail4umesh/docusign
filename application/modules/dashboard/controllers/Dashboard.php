<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MX_Controller {


	function __construct() {
		parent::__construct();
		
		$this->load->library('template');
		

		// If not logged in, redirect to login page
		if(!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}

	}

	public function index(){
		
		$this->data 					= array();
		$this->data['title'] 			= "Dashboard";
		

		if($this->ion_auth->in_group('client')) {
			$this->load->model('dashboard_model');
			$this->data['pending_inspection_list'] =  $this->dashboard_model->client_pending_inspection_list();
		}
		if($this->ion_auth->in_group('inspector')) {
			$this->load->model('dashboard_model');
			$this->data['pending_inspection_list'] =  $this->dashboard_model->inspector_pending_inspection_list();
		}

		$this->template->load('default', 'index', $this->data);
		
		

		
	}
}

