<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class checkexists_ve_model extends CI_Model {


	function check_exists($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('ve');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}

	public function check_exists_ghe($id)
	{
		$mangghehet = array();
		$this->db->where('lichchieu', $id);
		$manglichchieu = $this->db->get('ve');
		$i = 0;
		$manglichchieu = $manglichchieu->result_array();
		
		foreach ($manglichchieu as $value)
		{
			$i++;
			$mangghehet[$i] = $value['ma_ve'];
		}
		return $mangghehet;
	}

	

}

/* End of file checkexists_ve_model.php */
/* Location: ./application/models/checkexists_ve_model.php */