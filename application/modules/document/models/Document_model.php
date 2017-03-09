<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Document_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->model('Ion_auth_model');
	}

	/**
	* this function will be used to fetch all the Inspector  
	* @return object
	*/
	function get_document_list() {
        

		if($this->ion_auth->in_group('admin')) {
			$this->db->select("e.id,  e.inspection_id, e.updated_at, e.client_status, e.client_date_signed, e.inspector_date_signed, f.name, i.inspector_id, i.client_id");
			$this->db->from('eform as e');
			$this->db->join('form as f', "e.form_id = f.id", 'left');
			$this->db->join('inspection as i', "e.inspection_id = i.id", 'left');
			//$this->db->where('i.inspector_id',$this->session->userdata( 'user_id' ));
			$this->db->where('e.client_status',"1");
		}
		//$this->db->where('i.inspector_id',$this->session->userdata( 'user_id' ));
		//$this->db->where('client_id',$this->session->userdata( 'user_id' ));

		$query = $this->db->get();
        return $query->result();
    }


    function get_inspector_document_list($inspector_id) {
        

		if($this->ion_auth->in_group('admin')) {
			$this->db->select("e.id,  e.inspection_id, e.updated_at, e.client_status, e.client_date_signed, e.inspector_date_signed, f.name, i.inspector_id, i.client_id");
			$this->db->from('eform as e');
			$this->db->join('form as f', "e.form_id = f.id", 'left');
			$this->db->join('inspection as i', "e.inspection_id = i.id", 'left');
			$this->db->where('i.inspector_id',$inspector_id);
			$this->db->where('e.client_status',"1");

		}
		//$this->db->where('i.inspector_id',$this->session->userdata( 'user_id' ));
		//$this->db->where('client_id',$this->session->userdata( 'user_id' ));

		$query = $this->db->get();
        return $query->result();
    }


}

?>