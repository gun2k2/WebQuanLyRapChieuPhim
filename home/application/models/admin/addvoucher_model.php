<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class addvoucher_model extends CI_Model {

	public function add($data)
	{
			
		
		$this->db->insert('voucher', $data);
		return	$this->db->insert_id();
	}

}

/* End of file addlichchieu_model.php */
/* Location: ./application/models/addlichchieu_model.php */