<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Form_model extends CI_Model {
	function __construct() {
		parent::__construct();
		
	}
	/**
	* this function will be used to fetch all the forms  
	* @return object
	*/
	function get_all_form() {
        $this->db->select('*');
		$this->db->from('form');
		
    
		$this->db->where("deleted","0");
		$this->db->order_by("id","asc");
		$query = $this->db->get();
        return $query->result();
    }

    function get_form($id) {
        $this->db->select('*');
		$this->db->from('form');
		$this->db->where('id', $id);	
    
		
		$query = $this->db->get();
        return $query->result();
    }

    
    function insert($data) {
    	$table_data = array(
				
				
				"name"							=>	$data['name'],
				"example_pdf"					=>	$data['example_pdf'],
				"description"					=>	$data['description'],
				"selected_form"					=>	$data['selected_form'],
				
				"created_at"					=> date('Y-m-d H:i:s'),
				"updated_at"					=> date('Y-m-d H:i:s'),

			);



    	$this->db->insert('form', $table_data);
    	$id = $this->db->insert_id();

    	return $id;

    }


    function update($data, $id) {
    	$table_data = array(
				
				
				"name"							=>	$data['name'],
				"example_pdf"					=>	$data['example_pdf'],
				"description"					=>	$data['description'],
				"selected_form"					=>	$data['selected_form'],
				
				"updated_at"					=> date('Y-m-d H:i:s'),
				

			);

    	//print_r($data);


    	$this->db->where('id', $id);
    	$this->db->update('form', $table_data);

    }


    
}
?>