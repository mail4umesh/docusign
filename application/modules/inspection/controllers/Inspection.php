<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inspection extends MX_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('inspection_model');
		$this->load->library('template');
		

		// If not logged in, redirect to login page
		if(!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}

		if(!$this->ion_auth->in_group('admin')) {
			$this->session->set_flashdata('info','You don\'t have permission to View Inspections');
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->data 					= array();
		$this->data['title'] 			= "Manage Inspections";
		$this->data['inspection']		= $this->inspection_model->get_all_inspection();

		$this->template->load('default', 'index', $this->data);
	}

	

	function add($data = array()){
		

		$type = $this->uri->segment(3,'');
		if(!is_array($data)) {
			$data = array();
		}

		
		$data['title'] 					= "Add Inspection";
		$data['client_list']			= get_all_client();
		$data['inspector_list']			= get_all_inspector();
		$data['forms']					= $this->inspection_model->get_all_forms();
		

		$this->template->load('default', 'add', $data);
		
	}

	function edit($inspection_id) {
		$data['title'] = "Edit Item";

		$data['edit']		= $this->inspection_model->get_inspection($inspection_id);

		
		

		$this->add($data); 
	}

	
	function do_add() {
		
		

		$unique = array_unique($this->input->post('forms'));
		$forms_ids = implode($unique,",");


		$table_data = array(
			"client_id"						=>	$this->input->post('client'),//$this->get_id($this->input->post('client')),
			"inspector_id"					=>	$this->input->post('inspector'),//$this->get_id($this->input->post('inspector')),
			"schedule_date"					=>	convert_date_usa_to_mysql($this->input->post('schedule_date')),
			
			"location"						=>	$this->input->post('location'),
			"city"							=>	$this->input->post('city'),
			"country"						=>	$this->input->post('country'),
			"state"							=>	$this->input->post('state'),
			"address1"						=>	$this->input->post('address1'),
			"address2"						=>	$this->input->post('address2'),
			"note"							=>	$this->input->post('note'),
			
			"forms"							=>	$forms_ids,

		);


		
		if($this->input->post('inspection_id')) {
				
			$inspection_id 				=	$this->input->post('inspection_id');
			
			$this->inspection_model->update($table_data,$inspection_id);
			$id = $this->input->post('inspection_id');
			$this->session->set_flashdata('success','Inspection Details successfully updated');
		
		} else {
			


			$id = $this->inspection_model->insert($table_data);
			$this->session->set_flashdata('success','Inspection successfully Created');

		} 

		redirect('inspection/view/'.$id);
		
	}

	

	function get_id($selected){
		$exploded = explode("ID : ", $selected);
		return $exploded[1];
	}


	function view($inspection_id) {
		
		$data['title'] = "Inspection View";

		$inspection 			= $this->inspection_model->get_inspection($inspection_id);
		$data['inspection']		= $inspection[0];

		$data['inspection_form_list']		= $this->inspection_model->get_inspection_forms_list($inspection_id);


		
		$this->template->load('default', 'view', $data);
		
	}

	function remove($id) {
		
    	$table_data = array(
    		"deleted"		=> "1",
    	);

    	$this->db->where('id', $id);
    	$this->db->update('inspection', $table_data);

    	$this->remove_eform($id);

    	$this->session->set_flashdata('success','Inspection Deleted');
		redirect('inspection');
    }

    function remove_eform($id){
    	$this->db->where('inspection_id', $id);
    	$this->db->delete('eform');

    }
	

	function add_inspection(){
		$forms			= $this->inspection_model->get_all_forms();
		$form_list = array();
			foreach($forms as $form){
		        $form_list[$form->id] = $form->name;
		    }
		$selected = "";//@$form_id->assigned_to;
	    echo form_dropdown('forms[]', $form_list, $selected,'class="form-control forms top-margin-10"');
	    echo '<button type="button" class="btn btn-sm btn-danger remove-button">Remove</button>';
		
	    echo '<script type="text/javascript">';
		echo '$(".remove-button").on("click",function(){ $(this).prev(".forms").remove(); $(this).remove(); });'; 
		echo '</script>';           
	}

	function checkexist(){
		$data = $arrayName = array('inspection_id' => 4, 'form_id' => 3 );
		$result = $this->inspection_model->form_exist($data);
		print_r($result);

	}


}