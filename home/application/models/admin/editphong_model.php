<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class editphong_model extends CI_Model {

	public function editById($i)

	{

		$this->db->select('*');
		$this->db->where('id', $i);
		$dulieu= $this->db->get('phong');
		$dulieu= $dulieu->result_array();
		return $dulieu;
	}
	public function updateDataById($id,$phong)
	{
			$dulieucanupdate         = array(
			 		'id' => $id,
			 		'phong' =>$phong
			 			);
		$this->db->where('id', $id);
		return $this->db->update('phong', $dulieucanupdate);
	}

	

}

/* End of file editadmin_model.php */
/* Location: ./application/models/editadmin_model.php */