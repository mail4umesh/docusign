<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->model('Ion_auth_model');
	}

	/**
	* this function will be used to fetch all the Users  
	* @return object
	*/
	function get_all_user() {
        $this->db->select("u.*, g.group_id");
        	
        
		$where = "g.group_id = 1";
		$this->db->where($where);
		$this->db->where("active = 1");
	    $this->db->join('users_groups as g', "g.user_id = u.id", 'left');
	    $data = $this->db->get( 'users as u')->result();
	    return $data;
    }


    function get_user($user_id) {
		$this->db->select("u.*, g.group_id");
		$where = "u.id = ".$user_id;
		$this->db->where($where);
	    $this->db->join('users_groups as g', "g.user_id = u.id", 'left');
	    $data = $this->db->get( 'users as u')->result();
	    return $data;
    }

    function insert($data) {
    	$table_data = array(
				"first_name"			=>	$data['first_name'],
				"last_name"				=>	$data['last_name'],
				"username"				=>	$data['username'],  
				"company"				=>	$data['company'],
				"email"					=>	$data['email'],  
				"phone"					=>	$data['phone'],
				"active"				=>	1,
				"created_by"			=> 	$this->session->userdata( 'user_id' ),
				"password"				=>	$this->ion_auth_model->hash_password($data['password']),    
				"created_on"			=>	time(),
			);



    	$this->db->insert('users', $table_data);
    	$id = $this->db->insert_id();

    	$group_data = array(
				"user_id"				=>	$id,
				"group_id"				=>	$data['group_id'],
			);

    	$this->db->insert('users_groups', $group_data);

    	return $id;

    }


    function update($data, $id) {
    	$table_data = array(
				"first_name"			=>	$data['first_name'],
				"last_name"				=>	$data['last_name'],
				"username"				=>	$data['username'], 
				"company"				=>	$data['company'],
				"phone"					=>	$data['phone'],
				"email"					=>	$data['email'], 
				
			);


    	$this->db->where('id', $id);
    	$this->db->update('users', $table_data);
    	

    	$group_data = array(
				"user_id"				=>	$id,
				"group_id"				=>	$data['group_id'],
			);
    	$this->db->where('user_id', $id);
    	$this->db->update('users_groups', $group_data);

    }

    function change_password($data, $id) {
    	$table_data = array(
				
				"password"					=>	$this->ion_auth_model->hash_password($data['password']),
				
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