<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editadmin_model extends CI_Model {

	public function editById($i)

	{

		$this->db->select('*');
		$this->db->where('id', $i);
		$dulieu= $this->db->get('admin');
		$dulieu= $dulieu->result_array();
		return $dulieu;
	}
	public function updateDataById($id,$name,$username,$password)
	{

		$dulieucanupdate= array(
			'id' =>  $id, 
			'name' =>$name,
			'username' => $username,
			'password' => $password
			
		);
		$this->db->where('id', $id);
		return $this->db->update('admin', $dulieucanupdate);
	}

	

}

/* End of file editadmin_model.php */
/* Location: ./application/models/editadmin_model.php */