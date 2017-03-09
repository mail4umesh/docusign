<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inspection_model extends CI_Model {
	function __construct() {
		parent::__construct();
		
	}
	/**
	* this function will be used to fetch all the inspections  
	* @return object
	*/
	function get_all_inspection() {
        $this->db->select('*');
		$this->db->from('inspection');
		
    
		$this->db->where("deleted","0");
		$this->db->order_by("id","asc");
		$query = $this->db->get();
        return $query->result();
    }

    function get_inspection($id) {
        $this->db->select('*');
		$this->db->from('inspection');
		$this->db->where('id', $id);	
    
		
		$query = $this->db->get();
        return $query->result();
    }

    function get_all_forms() {
        $this->db->select('*');
		$this->db->from('form');
		
    
		$this->db->where("deleted","0");
		$this->db->order_by("id","asc");
		$query = $this->db->get();
        return $query->result();
    }

    
    function insert($data) {
    	$table_data = array(
				
			"client_id"						=>	$data['client_id'],
			"inspector_id"					=>	$data['inspector_id'],
			"schedule_date"					=>	$data['schedule_date'],
			
			"location"						=>	$data['location'],
			"city"							=>	$data['city'],
			"country"						=>	$data['country'],
			"state"							=>	$data['state'],
			"address1"						=>	$data['address1'],
			"address2"						=>	$data['address2'],
			"note"							=>	$data['note'],
			
			"forms"							=>	$data['forms'],

			"updated_at"					=> date('Y-m-d H:i:s'),

		);



    	$this->db->insert('inspection', $table_data);
    	$id = $this->db->insert_id();

    	// Remove dublicate form id 
    	$forms_list = array_unique($this->input->post('forms'));
    	//echo "id : ".$id;
    	
    	
    	// Now Create entry in eform table for this inspection 
    	$eform_table_data = array(		
			"inspection_id"					=>	$id,
			"created_at"					=> date('Y-m-d H:i:s'),
			"updated_at"					=> date('Y-m-d H:i:s'),
			);
    	
    	foreach ($forms_list as $key => $form) {
    		$eform_table_data["form_id"]	= $form;
    		//create an array of data for eform including form id and inspection id
    		$this->insert_eform($eform_table_data);
    	}
    	
    	
    	

    	return $id;


    }


    function update($data, $id) {
    	$table_data = array(
				
			"client_id"						=>	$data['client_id'],
			"inspector_id"					=>	$data['inspector_id'],
			"schedule_date"					=>	$data['schedule_date'],
			
			"location"						=>	$data['location'],
			"city"							=>	$data['city'],
			"country"						=>	$data['country'],
			"state"							=>	$data['state'],
			"address1"						=>	$data['address1'],
			"address2"						=>	$data['address2'],
			"note"							=>	$data['note'],
			
			"forms"							=>	$data['forms'],

			"updated_at"					=> date('Y-m-d H:i:s'),
				

			);

    	

    	$this->db->where('id', $id);
    	$this->db->update('inspection', $table_data);

    	// Remove Duplicate form id
    	$forms_list = array_unique($this->input->post('forms'));
    	//echo "id : ".$id;
    	
    	//  Now Create entry in eform table for this inspection 
    	$eform_table_data = array(		
			"inspection_id"					=>	$id,
			"created_at"					=> date('Y-m-d H:i:s'),
			"updated_at"					=> date('Y-m-d H:i:s'),
			);
    	
    	foreach ($forms_list as $key => $form) {
    		$eform_table_data["form_id"]	= $form;
    		//create an array of data for eform including form id and inspection id
    		$this->update_eform($eform_table_data);
    	}

    	// now remove extra form if any, Like user edit inspection and remove a form now which was already exist 
    	$this->remove_extra($forms_list, $id);
    	

    }

    function insert_eform($data){
    	$this->db->insert('eform', $data);
    }

    function update_eform($data){
    	// check if form for this inspection exit then ok else insert new
    	if($this->form_exist($data) == 0){ $this->insert_eform($data); }
    }

    function form_exist($data){
    	//SELECT count(*) FROM eform WHERE inspection_id = 5 AND form_id = 1
    	$this->db->select('count(*) as  c');
		$this->db->from('eform');
		
    
		$this->db->where("inspection_id",$data["inspection_id"]);
		$this->db->where("form_id",$data["form_id"]);
		
		$query = $this->db->get();
        $result = $query->result();
        return $result[0]->c;

    }

    function remove_extra($forms_list,$inspection_id){

    	$this->db->where("inspection_id", $inspection_id);
	    $this->db->where_not_in("form_id",$forms_list);
	    $this->db->delete('eform');
	}
    


    function get_inspection_forms_list($id){
    	

	    $this->db->select("e.*, f.name");
		$this->db->from('eform as e ');

		$this->db->join('form as f', "e.form_id = f.id", 'left');
		$this->db->where('e.inspection_id',$id);
		
		$query = $this->db->get();
        return $query->result();
	    return $data;
    }
}
?>