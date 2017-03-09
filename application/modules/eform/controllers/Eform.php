<?php 
class Eform extends MX_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('eform_model');
		$this->load->library('template');
		

		// If not logged in, redirect to login page
		if(!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}

		
	}

	public function index()
	{
		
		$this->data 					= array();
		$this->data['title'] 			= "Manage Admin Client";
		
	}

	public function showform($selected_form)
	{
		
		$this->data 					= array();
		$this->data['title'] 			= "Show Form";

		$this->data['eform_id'] 					= 0;
		$this->data['eform_data'] 					= array();
		$this->data['eform_data']['item'] 			= "";

		$this->template->load('default', $selected_form, $this->data);
		
	}

	public function load($eform_id){

		//Check if client Signed it 
		//Get client status;

		$client_status  = $this->eform_model->get_inspector_status($eform_id);
		if($client_status == "0"){

			//Get Form Id (Form Type Which Type of form is this)
			$form_id  = $this->eform_model->get_form_id($eform_id);
			
			//Get the selected form 
			$selected_form = $this->eform_model->get_selected_form($form_id);

			// Get the form data for the select eform 
			$eform_data  = $this->eform_model->get_eform_data($eform_id);
			$eform_data  = json_decode($eform_data,true);
			

			//echo "Eform_id : ".$eform_id."<br>";
			//echo "form_id : "; print_r($form_id);
			//echo "<br>";
			//echo "Selected Form Name : "; print_r($selected_form);
			//echo "<br>";
			//echo "form_data : "; print_r($eform_data);


			$this->data 					= array();
			$this->data['title'] 			= "Manage ".$selected_form." Client";

			$this->data['eform_id'] 			= $eform_id;
			$this->data['eform_data'] 			= $eform_data;

			$this->template->load('default', $selected_form, $this->data);
		} else {
			$this->data 					= array();
			$this->data['client_status']	= $this->eform_model->get_client_status($eform_id);
			if($this->data['client_status'] == 2){
				$this->data['reason'] = $this->eform_model->get_resaon($eform_id);
			}
			$this->data['eform_id'] 			= $eform_id;
			$this->template->load('default', "already_signed", $this->data);
		}
	}


	public function load_pdf($eform_id){

		//Get Form Id (Form Type Which Type of form is this)
		$form_id  = $this->eform_model->get_form_id($eform_id);
		
		//Get the selected form 
		$selected_form = $this->eform_model->get_selected_form($form_id);

		// Get the form data for the select eform 
		$eform_data 			= $this->eform_model->get_eform_data($eform_id);
		$eform_data  			= json_decode($eform_data,true);
		$inspector_sign 		= $this->eform_model->get_inspector_sign($eform_id);
		$client_sign 			= $this->eform_model->get_client_sign($eform_id);
		$client_status 			= $this->eform_model->get_client_status($eform_id);

		//echo "Eform_id : ".$eform_id."<br>";
		//echo "form_id : "; print_r($form_id);
		//echo "<br>";
		//echo "Selected Form Name : "; print_r($selected_form);
		//echo "<br>";
		//echo "form_data : "; print_r($eform_data);


		$this->data 					= array();
		$this->data['title'] 			= "Manage ".$selected_form." Client";

		$this->data['eform_id'] 			= $eform_id;
		$this->data['eform_data'] 			= $eform_data;
		$this->data['inspector_sign'] 			= $inspector_sign;
		$this->data['client_sign'] 			= $client_sign;
		$this->data['client_status'] 			= $client_status;
		

			

		$html = $this->load->view("themes/default/header_pdf",$this->data, true);
		$html = $html.$this->load->view("default/".$selected_form."_pdf",$this->data, true);

		echo $html;

		return $html;

		//$this->template->load('default', $selected_form, $this->data);
	}



	function do_add() {
		
		print_r($_POST);
		$id = $this->input->post('eform_id');

		$table_data = array('form_data' => json_encode($_POST) );
		
		if($id != "0"){
		
			$this->db->where('id', $id);
    		$this->db->update('eform', $table_data);
    	}

		
	}

	function save_sign_image($imagedata,$eform_id){
		$imagedata = str_replace('image/png;base64,', '', $imagedata);

		$imagedata = base64_decode($imagedata);

		$im = imagecreatefromstring($imagedata);
		if ($im !== false) {
		    header('Content-Type: image/png');
		    $black = imagecolorallocate($im, 0, 0, 0);

			// Make the background transparent
			imagecolortransparent($im, $black);

			$sign_image_name = $eform_id."_".$this->ion_auth->get_user_id();



		    imagepng($im, "public/signature/".$sign_image_name.".png");
		    imagedestroy($im);

		}
		else {
		    echo 'An error occurred.';
		}
		return $sign_image_name;

	}


	

	function add_invoive_item(){
		$this->load->view("default/invoice_list");
	}


	function get_signature($eform_id){
		$data["eform_id"] = $eform_id;
		$data["inspection_id"] = $this->eform_model->get_inspection_id($eform_id);

		$this->load->view("default/get_signature", $data);
	}

	

	function inspector_signature_submit(){
		echo "signature Submited";
		set_time_limit(-1);
		$this->load->helper(array('dompdf', 'file'));
		$eform_id = $this->input->post('eform_id');
		$imagedata = $this->input->post('image_data');
		$inspector_sign  = $this->save_sign_image($imagedata[1],$eform_id);
		$table_data = array('inspector_sign' => $inspector_sign, 'inspector_status' => '1', 'inspector_date_signed' => date('Y-m-d H:i:s')   );
		
		if($eform_id != "0"){
		
			$this->db->where('id', $eform_id);
    		$this->db->update('eform', $table_data);
    	}


	    $html = $this->load_pdf($eform_id);

    	$data = pdf_create_wide($html, '', false);
   		write_file('public/documents/eform_'.$eform_id.".pdf", $data);	

	}

	function client_signature_submit(){

		//set_time_limit(500);
		echo "signature Submited";
		$this->load->helper(array('dompdf', 'file'));
		$eform_id = $this->input->post('eform_id');
		$imagedata = $this->input->post('image_data');

		$client_sign  = $this->save_sign_image($imagedata[1],$eform_id);

		$table_data = array('client_sign' => $client_sign, 'client_status' => '1', 'client_date_signed' => date('Y-m-d H:i:s')   );
		
		if($eform_id != "0"){
		
			$this->db->where('id', $eform_id);
    		$this->db->update('eform', $table_data);
    	}

    	update_inspection_status($eform_id);

	    $html = $this->load_pdf($eform_id);
    	
	    $data = pdf_create($html, '', false);
    	write_file('public/documents/eform_'.$eform_id.".pdf", $data);


	}

	function update_inspection_status($eform_id){
		update_inspection_status($eform_id);
	}


	public function load_document($eform_id){

		//Get Form Id (Form Type Which Type of form is this)
		$form_id  = $this->eform_model->get_form_id($eform_id);
		
		//Get the selected form 
		$selected_form = $this->eform_model->get_selected_form($form_id);

		// Get the form data for the select eform 
		$eform_data  			= $this->eform_model->get_eform_data($eform_id);
		$eform_data  			= json_decode($eform_data,true);
		$inspector_sign 		= $this->eform_model->get_inspector_sign($eform_id);
		$client_sign 			= $this->eform_model->get_client_sign($eform_id);
		$client_status 			= $this->eform_model->get_client_status($eform_id);


		$this->data 					= array();
		$this->data['title'] 			= "Manage ".$selected_form." Client";

		$this->data['eform_id'] 				= $eform_id;
		$this->data['eform_data'] 				= $eform_data;
		$this->data['inspector_sign'] 			= $inspector_sign;
		$this->data['client_sign'] 				= $client_sign;
		$this->data['client_status'] 			= $client_status;


		

		$html = $this->load->view("themes/default/header_pdf",$this->data, true);
		$html = $html.$this->load->view("default/".$selected_form."_pdf",$this->data, true);

		if($this->ion_auth->in_group('client')) { 
			echo $html;
		}
		
		return $html;

		//$this->template->load('default', $selected_form, $this->data);
	}

	public function form2_item(){	
		$this->load->view("default/form2_item");
	}

	public function form3_item(){	
		$this->load->view("default/form3_item");
	}

	public function form5_item(){	
		$this->load->view("default/form5_item");
	}

}

?>
