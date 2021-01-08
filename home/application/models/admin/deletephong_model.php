<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class deletephong_model extends CI_Model {

	public function deleteDataById($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('phong');
	}
	

}

/* End of file deleteadmin_model.php */
/* Location: ./application/models/deleteadmin_model.php */