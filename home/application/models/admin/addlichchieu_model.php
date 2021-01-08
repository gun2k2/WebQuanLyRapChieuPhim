<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class addlichchieu_model extends CI_Model {

	public function add($data)
	{
			
		
		 $this->db->insert('lichchieu', $data);
		return	$this->db->insert_id();
	}
	function check_exists($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('lichchieu');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}
}

/* End of file addlichchieu_model.php */
/* Location: ./application/models/addlichchieu_model.php */