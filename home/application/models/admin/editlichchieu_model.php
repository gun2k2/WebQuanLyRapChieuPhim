<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class editlichchieu_model extends CI_Model {

	public function editById($i)

	{

		$this->db->select('*');
		$this->db->where('id', $i);
		$dulieu= $this->db->get('lichchieu');
		$dulieu= $dulieu->result_array();
		return $dulieu;
	}
	public function updateDataById($id,$tenphim,$phong,$ngaychieu,$thoigian,$cachieu)
	{
			$dulieucanupdate         = array(
			 				'tenphim'  => $tenphim,
			 				'phong' 	   => $phong,
			 				'ngaychieu'=> $ngaychieu, 
			 				'thoigian' => $thoigian, 
			 				'cachieu' => $cachieu

			 			);
		$this->db->where('id', $id);
		return $this->db->update('lichchieu', $dulieucanupdate);
	}

	

}

/* End of file editadmin_model.php */
/* Location: ./application/models/editadmin_model.php */