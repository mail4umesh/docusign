<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form extends MX_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('form_model');
		$this->load->library('template');
		

		// If not logged in, redirect to login page
		if(!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}

		if(!$this->ion_auth->in_group('admin') ) {
			$this->session->set_flashdata('info','You don\'t have permission to View Form Product');
			redirect('dashboard');
		}
	}

	public function index(){
		$this->data 					= array();
		$this->data['title'] 			= "Manage Form Price";
		$this->data['forms']			= $this->form_model->get_all_form();

		$this->template->load('default', 'index', $this->data);

	}

	function add($data = array()){
		if(!$this->ion_auth->in_group('admin')) {
			$this->session->set_flashdata('error','You don\'t have permission to Add Form');
			redirect('form');
		}

		$type = $this->uri->segment(3,'');
		if(!is_array($data)) {
			$data = array();
		}

		$this->template->load('default', 'add', $data);
		
	}

	function edit($form_id) {
		$data['title'] = "Edit Item";

		if(!$this->form_model->get_form($form_id)) {
			$this->session->set_flashdata('error','No form found with that ID');
			redirect('form','refresh');
		}

		$data['edit']	= $this->form_model->get_form($form_id);
		

		$this->add($data); 
	}



	function do_add() {
		
			$table_data = array(
				"name"						=>	$this->input->post('name'),
				"example_pdf"				=>	$this->input->post('example_pdf'),
				"description"				=>	$this->input->post('description'),
				"selected_form"				=>	$this->input->post('selected_form'),
			);

			if($this->input->post('form_id')) {
				
				
				$form_id 				=	$this->input->post('form_id');
				
				$this->form_model->update($table_data,$form_id);
				$id = $this->input->post('form_id');

				$this->session->set_flashdata('success','Form successfully updated');
			} else {
				

				$id = $this->form_model->insert($table_data);
				$this->session->set_flashdata('success','Form successfully added');
			}

			redirect('form/index');
		
	}

	function view($form_id) {
		$data['title'] = "Form View";

		if(!$this->form_model->get_form($form_id)) {
			$this->session->set_flashdata('error','No form product found with that ID');
			redirect('form','refresh');
		}

		$form		= $this->form_model->get_form($form_id);
		
		$data['form'] 	= $form[0];
		
		$this->template->load('default', 'view', $data);
		
	}


	function remove($id) {
		
    	$table_data = array(
    		"deleted"		=> "1",
    	);

    	$this->db->where('id', $id);
    	$this->db->update('form', $table_data);

    	$this->session->set_flashdata('success','Form Deleted');
		redirect('form');
    }



    function do_upload_pdf($file_input)

	{
		//$rootpath = str_replace("application\\", "", APPPATH);
		//$upload_path = $rootpath."public\\example_pdf\\";

		//$config['upload_path'] 			= $upload_path;
		$config['allowed_types'] 		= 'pdf';
		$config['max_size']				= '250000';
		$config['file_name']			= $this->ion_auth->get_user_id()."_".time();

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($file_input))
		{
			$error = array('error' => $this->upload->display_errors());

			return $error;
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			return $data;
			//$this->load->view('upload_success', $data);
		}
	}

	function upload_pdf()
	{
		$config['upload_path'] 			= './public/example_pdf/';
		//$rootpath = str_replace("application\\", "", APPPATH);
		//$upload_path = $rootpath."public\\example_pdf\\";

		//$config['upload_path'] 			= $upload_path;

		//$config['upload_path'] 			= realpath(dirname(__FILE__)).'/public/example_pdf/';
		$config['allowed_types'] 		= 'pdf';
		$config['max_size']				= '250000';
		$config['file_name']			= $this->ion_auth->get_user_id()."_".time();

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload("file"))
		{
			$arr = array('success' => 0,'upload_error' => $this->upload->display_errors());
		}
		else
		{
			
			$upload_data = $this->upload->data();
			$arr = array('success' => 1, 'file_name'=>$upload_data['file_name'] );
			
		}

		echo json_encode( $arr );
	}

	
}


?>