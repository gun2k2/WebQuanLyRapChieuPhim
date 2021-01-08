<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class showphong_model extends CI_Model {

	function getdatabase()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'asc');
		
		$ketqua = $this->db->get('phong');

		
		return $ketqua ->result_array();
	}
	function ktdanhmuc($id)
	{


		$this->db->where('id', $id);
		$ketqua = $this->db->get('phong');

		$ketqua = $ketqua ->result_array();
		foreach ($ketqua as $key => $value) {
			return $value['phong'];
			break;
		}
		//return $ketqua['name'];
	}
	 public function search($key)
	{

		$this->db->like('phong', $key);

		$query = $this->db->get('phong');
		return $query->result();
	}
	function sapxep()
	{

		$this->db->select('*');
		$this->db->order_by('id', 'asc');

		$ketqua = $this->db->get('phong');

		return $ketqua->result();

	}
	

}

/* End of file showadmin_model.php */
/* Location: ./application/models/showadmin_model.php */