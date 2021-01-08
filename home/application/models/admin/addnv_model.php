<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class addnv_model extends CI_Model {

	public function add($data)
	{
			
		
		 $this->db->insert('admin', $data);
		return	$this->db->insert_id();
	}

}

/* End of file addnv_model.php */
/* Location: ./application/models/addnv_model.php */