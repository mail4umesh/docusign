<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	function __construct() {
		parent::__construct();
		
	}
	/**
	* this function will be used to fetch all the client 
	* @return object
	*/
	function client_pending_inspection_list() {
        $this->db->select("*");
		$this->db->from('inspection');
		$this->db->where('client_id',$this->session->userdata( 'user_id' ));
		$this->db->where('status','0');

		$query = $this->db->get();
        return $query->result();
    }

    function inspector_pending_inspection_list() {
        $this->db->select("*");
		$this->db->from('inspection');

		$this->db->where('inspector_id',$this->session->userdata( 'user_id' ));
		$this->db->where('status','0');

		$query = $this->db->get();
        return $query->result();
    }


   
   	
}