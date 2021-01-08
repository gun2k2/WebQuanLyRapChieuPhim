<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class addphim_model extends CI_Model {

	public function add($data)
	{
			
		
		 $this->db->insert('phimchieu', $data);
		return	$this->db->insert_id();
	}

	

}

/* End of file addphim_model.php */
/* Location: ./application/models/addphim_model.php */