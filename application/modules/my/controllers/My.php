<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My extends MX_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->library('template');
		

		// If not logged in, redirect to login page
		if(!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}

		
	}

	public function index()
	{
		$this->data 					= array();
		$this->data['title'] 			= "Manage Inspections";
		//$this->data['inspection']		= $this->inspection_model->get_all_inspection();

		//$this->template->load('default', 'index', $this->data);
		//$this->template->load('default', 'dashboard');
		redirect("dashboard");
	}



	function inspection_detail($id){
		$this->data 					= array();
		$this->data['title'] 			= "Manage Inspections";
		$this->load->model('my_model');

		if($this->ion_auth->in_group('client')) { 
			$inspection 					= $this->my_model->get_client_inspection_detail($id);
		} else  {
			$inspection 					= $this->my_model->get_inspector_inspection_detail($id);
		}
		

		$this->data['inspection']		= $inspection[0];

		$this->data['inspection_form_list']		= $this->my_model->get_inspection_forms_list($id);



		$this->template->load('default', 'inspection_detail_view', $this->data);


		//print_r($this->data['inspection_detail']);
	}

	function inspection_list(){
		$this->data 					= array();
		$this->data['title'] 			= "All Inspections";
		$this->load->model('my_model');

		if($this->ion_auth->in_group('client')) { 
			$inspection 					= $this->my_model->get_client_inspection_list();
		} else {
			$inspection 					= $this->my_model->get_inspector_inspection_list();
		}

		$this->data['inspection']		= $inspection;

		$this->template->load('default', 'inspection_index_view', $this->data);

	}

	function document_detail($eform_id){

		$this->data 								= array();
		$this->data['title'] 						= "Document Detail";
		$this->load->model('my_model');

		$this->data['document_detail'] 				= $this->my_model->get_document_detail($eform_id);
		

		if($this->ion_auth->in_group('client')) { 
			$this->template->load('default', 'document_detail', $this->data);
		}
	}

	function document_list(){
		$this->data 								= array();
		$this->data['title'] 						= "Document List";
		$this->load->model('my_model');
		$this->data['document_list'] 				= $this->my_model->get_document_list();

		$this->template->load('default', 'document_list', $this->data);

	}

	function rejected(){
		$id = $this->input->post("eform_id");
		//echo "<br>";
		//echo "reason : ".$this->input->post("rejected");

		$table_data = array(
				"rejected"				=>	$this->input->post("rejected"),
				"client_status"			=>	'2',
			);


    	$this->db->where('id', $id);
    	$this->db->update('eform', $table_data);

	}

}
	