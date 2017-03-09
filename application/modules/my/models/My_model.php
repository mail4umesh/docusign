<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_model extends CI_Model {
	function __construct() {
		parent::__construct();
		
	}
	/**
	* this function will be used to fetch all the client 
	* @return object
	*/
	function get_client_pending_inspection_list() {
        $this->db->select("*");
		$this->db->from('inspection');

		$this->db->where('client_id',$this->session->userdata( 'user_id' ));
		$this->db->where('status','0');

		$query = $this->db->get();
        return $query->result();
    }

    function get_client_inspection_list() {
        $this->db->select("*");
		$this->db->from('inspection');
		
		$this->db->where('client_id',$this->session->userdata( 'user_id' ));

		$query = $this->db->get();
        return $query->result();
    }


    function get_client_inspection_detail($id) {
        $this->db->select("*");
		$this->db->from('inspection');

		$this->db->where('id',$id);
		$this->db->where('client_id',$this->session->userdata( 'user_id' ));

		$query = $this->db->get();
        return $query->result();
    }


    //*********************************************Inspector Function ***********************************8

    function get_inspector_pending_inspection_list() {
        $this->db->select("*");
		$this->db->from('inspection');

		$this->db->where('inspector_id',$this->session->userdata( 'user_id' ));
		$this->db->where('status','0');

		$query = $this->db->get();
        return $query->result();
    }

    function get_inspector_inspection_list() {
        $this->db->select("*");
		$this->db->from('inspection');
		
		$this->db->where('inspector_id',$this->session->userdata( 'user_id' ));

		$query = $this->db->get();
        return $query->result();
    }



    function get_inspector_inspection_detail($id) {
        $this->db->select("*");
		$this->db->from('inspection');

		$this->db->where('id',$id);
		$this->db->where('inspector_id',$this->session->userdata( 'user_id' ));

		$query = $this->db->get();
        return $query->result();
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

    function get_document_detail($eform_id){
    	

	    $this->db->select("e.*, f.name, i.schedule_date, i.client_id, i.inspector_id");
		$this->db->from('eform as e ');

		$this->db->join('form as f', "e.form_id = f.id", 'left');
		$this->db->join('inspection as i', "i.id = e.inspection_id", 'left');
		$this->db->where('e.id',$eform_id);
		
		$query = $this->db->get();
        return $query->result();
	    return $data;
    }

    function get_document_list() {
        

		if($this->ion_auth->in_group('inspector')) {
			$this->db->select("e.id,  e.inspection_id, e.updated_at, e.client_status, e.client_date_signed, e.inspector_date_signed, f.name, i.inspector_id, i.client_id");
			$this->db->from('eform as e');
			$this->db->join('form as f', "e.form_id = f.id", 'left');
			$this->db->join('inspection as i', "e.inspection_id = i.id", 'left');
			$this->db->where('i.inspector_id',$this->session->userdata( 'user_id' ));
			$this->db->where('e.inspector_status',"1");
		} else if($this->ion_auth->in_group('client')) {
			$this->db->select("e.id, e.inspection_id, e.updated_at, e.client_status, e.client_date_signed, e.inspector_date_signed, f.name, i.inspector_id, i.client_id");
			$this->db->from('eform as e');
			$this->db->join('form as f', "e.form_id = f.id", 'left');
			$this->db->join('inspection as i', "e.inspection_id = i.id", 'left');
			$this->db->where('i.client_id',$this->session->userdata( 'user_id' ));
			$this->db->where('e.client_status',"1");			
		}
		//$this->db->where('i.inspector_id',$this->session->userdata( 'user_id' ));
		//$this->db->where('client_id',$this->session->userdata( 'user_id' ));

		$query = $this->db->get();
        return $query->result();
    }

    
}