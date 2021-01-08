<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkexists_model extends CI_Model {



		function check_exists($password)
	{
		$this->db->where('password',$password);
	
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('user');

		if ($query->num_rows() > 0)
		{
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}

	function check_exists1($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('user');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}

	 function inser($data)
	 {

	 	
	 	$this->db->insert('user', $data);
	 	return $this->db->insert_id();
	 }

	

}

/* End of file checkexists_model.php */
/* Location: ./application/models/checkexists_model.php */