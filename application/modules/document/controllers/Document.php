<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Document extends MX_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('document_model');
		$this->load->library('template');
		

		// If not logged in, redirect to login page
		if(!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}

		if(!$this->ion_auth->in_group('admin')) {
			$this->session->set_flashdata('info','You don\'t have permission to View Inspector');
			redirect('dashboard');
		}
	}

	public function index(){
		$this->data 								= array();
		$this->data['title'] 						= "Document List";
		$this->data['document_list'] 				= $this->document_model->get_document_list();

		$this->template->load('default', 'index', $this->data);
	}

	public function inspector_list($inspector_id){
		$this->data 								= array();
		$this->data['title'] 						= "Document List";
		$this->data['document_list'] 				= $this->document_model->get_inspector_document_list($inspector_id);

		$this->template->load('default', 'index', $this->data);
	}
}
?>