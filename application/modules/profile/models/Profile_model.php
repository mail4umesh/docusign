<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->model('Ion_auth_model');
	}


    function get_profile() {
		$this->db->select("u.*, g.group_id");
		$where = "u.id = ".$this->ion_auth->get_user_id();
		$this->db->where($where);
	    $this->db->join('users_groups as g', "g.user_id = u.id", 'left');
	    $data = $this->db->get( 'users as u')->result();
	    return $data;
    }

    function change_password($data, $id) {
    	$table_data = array(
				"password"					=>	$this->ion_auth_model->hash_password($data['password']),
			);


    	$this->db->where('id', $id);
    	$this->db->update('users', $table_data);

    }

    function update($data, $id) {
    	$table_data = array(
				"first_name"			=>	$data['first_name'],
				"last_name"				=>	$data['last_name'],
				"company"				=>	$data['company'],
				"phone"					=>	$data['phone'],
				
			);


    	$this->db->where('id', $id);
    	$this->db->update('users', $table_data);
    	
    }


    public function hash_password($password, $salt=false, $use_sha1_override=FALSE)
	{
		if (empty($password))
		{
			return FALSE;
		}

		//bcrypt
		if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt')
		{
			return $this->bcrypt->hash($password);
		}


		if ($this->store_salt && $salt)
		{
			return  sha1($password . $salt);
		}
		else
		{
			$salt = $this->salt();
			return  $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
		}
	}

}