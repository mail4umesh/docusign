<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eform_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->model('Ion_auth_model');
	}

	/**
	* this function will be used to fetch all the Client  
	* @return object
	*/
	function get_form_id($eform_id) {
        $this->db->select('form_id');
        $this->db->where('id',$eform_id);

		$this->db->from('eform');
		
    
		$query = $this->db->get();
        $result = $query->result();
        if(is_array($result) && array_key_exists(0,$result)) {
        	return $result[0]->form_id;
        } else {
        	return 0;
        }
    }

    function get_eform_data($eform_id) {
        $this->db->select('form_data');
        $this->db->where('id',$eform_id);

		$this->db->from('eform');
		
    
		$query = $this->db->get();
        $result = $query->result();
        if(is_array($result) && array_key_exists(0,$result)) {
        	//echo "I am here Giving you somthing"."<br>";
        	//print_r($result); echo "<br>";
        	return $result[0]->form_data;
        } else {
        	//echo "I am here 00000000";
        	return 0;
        }
    }

    function get_inspector_sign($eform_id) {
        $this->db->select('inspector_sign');
        $this->db->where('id',$eform_id);

        $this->db->from('eform');
        
    
        $query = $this->db->get();
        $result = $query->result();
        if(is_array($result) && array_key_exists(0,$result)) {
            
            return $result[0]->inspector_sign;
        } else {
            
            return 0;
        }
    }

    function get_client_sign($eform_id) {
        $this->db->select('client_sign');
        $this->db->where('id',$eform_id);

        $this->db->from('eform');
        
    
        $query = $this->db->get();
        $result = $query->result();
        if(is_array($result) && array_key_exists(0,$result)) {
            
            return $result[0]->client_sign;
        } else {
            return 0;
        }
    }

    function get_inspector_status($eform_id) {
        $this->db->select('inspector_status');
        $this->db->where('id',$eform_id);

        $this->db->from('eform');
        
    
        $query = $this->db->get();
        $result = $query->result();
        if(is_array($result) && array_key_exists(0,$result)) {
            return $result[0]->inspector_status;
        } else {
            return 0;
        }
    }

    function get_client_status($eform_id) {
        $this->db->select('client_status');
        $this->db->where('id',$eform_id);

        $this->db->from('eform');
        
    
        $query = $this->db->get();
        $result = $query->result();
        if(is_array($result) && array_key_exists(0,$result)) {
            return $result[0]->client_status;
        } else {
            return 0;
        }
    }

    function get_resaon($eform_id) {
        $this->db->select('rejected');
        $this->db->where('id',$eform_id);

        $this->db->from('eform');
        
    
        $query = $this->db->get();
        $result = $query->result();
        if(is_array($result) && array_key_exists(0,$result)) {
            return $result[0]->rejected;
        } else {
            return 0;
        }
    }


    function get_selected_form($form_id){
    	$this->db->select('selected_form');
        $this->db->where('id',$form_id);

		$this->db->from('form');
		
    
		$query = $this->db->get();
        $result = $query->result();
        if(is_array($result) && array_key_exists(0,$result)) {
        	return $result[0]->selected_form;
      	} else {
        	return 404;
        }
    }

    function get_inspection_id($eform_id) {
        $this->db->select('inspection_id');
        $this->db->where('id',$eform_id);

        $this->db->from('eform');
        
    
        $query = $this->db->get();
        $result = $query->result();
        if(is_array($result) && array_key_exists(0,$result)) {
            return $result[0]->inspection_id;
        } else {
            return 0;
        }
    }

}
?>