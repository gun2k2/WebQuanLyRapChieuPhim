<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class deleteve_model extends CI_Model {


	public function deleteDataById($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('ve');
	}




	

	

}

/* End of file editadmin_model.php */
/* Location: ./application/models/editadmin_model.php */