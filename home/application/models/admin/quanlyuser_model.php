<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quanlyuser_model extends CI_Model {


	function getdatabase()
	{ 


		$this->db->select('*');

		$ketqua = $this->db->get('user');

		$ketqua = $ketqua ->result_array();
		
		return $ketqua;
	}
	function district($province_id)
	{
		$this->db->where('province_id', $province_id);
		$this->db->order_by('name', 'asc');
		$ketqua = $this->db->get('district');
		$output = '<option value="">--Chọn Quận/Huyện--</option>';
		foreach ($ketqua->result_array() as $value) 
		{
			$output .= '<option value="'.$value["district_id"].'">'.$value["name"].'</option>'; 	
		}

		
		return $output;
	}

	function ward($district_id)
	{	
		$this->db->where('district_id', $district_id);
		$this->db->order_by('name', 'asc');
		$ketqua = $this->db->get('ward');
		$output = '<option value="">--Xã/Phường--</option>';
		foreach ($ketqua->result_array() as $value) 
		{
			$output .= '<option value="'.$value["ward_id"].'">'.$value["name"].'</option>'; 	
		}

		
		return $output;
	} 

	function province()
	{
		
		$this->db->order_by('name', 'asc');
		
		$ketqua = $this->db->get('province');

		$ketqua = $ketqua ->result_array();
		return $ketqua;
	}
	function kttinh($id)
	{


		$this->db->where('province_id', $id);
		$ketqua = $this->db->get('province');

		$ketqua = $ketqua ->result_array();
		foreach ($ketqua as $key => $value) {
			return $value['name'];
			break;
		}
		//return $ketqua['name'];
	}
	function kthuyen($id)
	{


		$this->db->where('district_id', $id);
		$ketqua = $this->db->get('district');

		$ketqua = $ketqua ->result_array();
		foreach ($ketqua as $key => $value) {
			return $value['name'];
			break;
		}
		//return $ketqua['name'];
	}
	function ktxa($id)
	{


		$this->db->where('ward_id', $id);
		$ketqua = $this->db->get('ward');

		$ketqua = $ketqua ->result_array();
		foreach ($ketqua as $key => $value) {
			return $value['name'];
			break;
		}
		//return $ketqua['name'];
	}

		
	public function  search($name = null  )
	{

			
			if ($name != null )
			{
				$this->db->like('name', $name);
				$where = $this->db->get('user');
				if ($where->num_rows() > 0) return $where->result();

				$this->db->like('email', $name);
				$where = $this->db->get('user');
				if ($where->num_rows() > 0) return $where->result();

				$this->db->like('sdt', $name);
				$where = $this->db->get('user');
				if ($where->num_rows() > 0) return $where->result();

				return null;
			}

	}	
	function sapxep()
	{	$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$ketqua = $this->db->get('user');
		return $ketqua->result();
	}
	function check_user($where = array())
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
	public function add($data)
	{
			
		
		 $this->db->insert('user', $data);
		return	$this->db->insert_id();
	}
	public function deleteDataById($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('user');
	}

	public function editById($i)

	{

		$this->db->select('*');
		$this->db->where('id', $i);
		$dulieu= $this->db->get('user');
		$dulieu= $dulieu->result_array();
		return $dulieu;
	}
	public function updateDataById($id,$name,$email ,$password,$ngaysinh,$gioitinh,$sdt,$diachi,$province ,$district,$ward)
	{

		$dulieucanupdate= array('password'=> $password, 'ngaysinh' => $ngaysinh,'gioitinh' => $gioitinh, 'diachi' => $diachi, 'province' => $province, 'district'=> $district, 'ward' => $ward  );
		$this->db->where('id', $id);
		return $this->db->update('user', $dulieucanupdate);
	}

	public function search_email($email)
	{
		$this->db->where('email', $email);
		$ketqua = $this->db->get('user');
		$ketqua = $ketqua->result_array();
		foreach ($ketqua as $key => $value) {
			return $value['id'];
		}
	}

}

/* End of file quanlyuser_model.php */
/* Location: ./application/models/admin/quanlyuser_model.php */