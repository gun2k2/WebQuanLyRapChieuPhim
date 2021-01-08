<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class editve_model extends CI_Model {

	public function editById($i)

	{

		$this->db->select('*');
		$this->db->where('id', $i);
		$dulieu= $this->db->get('ve');
		$dulieu= $dulieu->result_array();
		return $dulieu;
	}
	public function updateDataById($id,$tenphim,$lichchieu,$phongchieu,$maghe)
	{

		$dulieucanupdate= array(
			'id' =>  $id, 
			'tenphim' =>$tenphim,
			'lichchieu' => $lichchieu,
			'phongchieu' => $phongchieu,
			'maghe' => $maghe
			
		);
		$this->db->where('id', $id);
		return $this->db->update('ve', $dulieucanupdate);
	}

}

/* End of file editve_model.php */
/* Location: ./application/models/editve_model.php */