<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Showadmin_model extends CI_Model {

	function getdatabase()
	{


		$this->db->select('*');
		$ketqua = $this->db->get('admin');

		$ketqua = $ketqua ->result_array();
		return $ketqua;
	}
		
	public function  search($key)
	{
			$this->db->like('name', $key);
			$query = $this->db->get('admin');
			return $query->result();

	}	
	function sapxep()
	{	$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$ketqua = $this->db->get('admin');
		return $ketqua->result();
	}

	
	

}

/* End of file showadmin_model.php */
/* Location: ./application/models/showadmin_model.php */