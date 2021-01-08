<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deleteadmin_model extends CI_Model {

	public function deleteDataById($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('admin');
	}
	

}

/* End of file deleteadmin_model.php */
/* Location: ./application/models/deleteadmin_model.php */