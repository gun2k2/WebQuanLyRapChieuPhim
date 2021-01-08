<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class showuser extends CI_Model {



	function getdatabase()
	{

		
		//$this->db->where('id', $id);
		$this->db->select('*');
		$ketqua = $this->db->get('user');

		$ketqua = $ketqua ->result_array();
		return $ketqua;
	}

	

}

/* End of file showuser.php */
/* Location: ./application/models/showuser.php */