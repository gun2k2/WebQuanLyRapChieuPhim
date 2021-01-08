<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class addve_model extends CI_Model {

	public function add($data)
	{
			
		
		$this->db->insert('ve', $data);
		return	$this->db->insert_id();

	
	}

}
