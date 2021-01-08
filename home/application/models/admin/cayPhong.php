<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class node
{
	public $data, $id;

	public function __construct($data, $id)
	{
		$this->data = $data;
		$this->id = $id;
	}

};
class node_root
{
	public $data;

	public function __construct()
	{
		$this->data = array();
	}

};

class cayPhong extends CI_Model {

	public $root;

	public function __construct()
	{
		parent::__construct();
		$this->root = new node_root();
		
	}


	//Lấy dữ liệu
	public function getdatabase($data)
	{
		foreach ($data as $value) 
		{
			$phong = new node($value['phong'], $value['id']);

			$this->root->data[] = $phong;


		}
	}


	//Kiểm tra tồn tại

	public function check_exists($data)
	{
		
		$data = strtoupper($data);
		
		foreach ($this->root->data as  $value) {
			if ($data == $value->data) 
			{
				return true;
			}
		}
		return false;
		
		
	}

	//Thêm

	public function add($data)
	{
		$mangphong = array(); 
		$data = strtoupper($data);
		
		$mangphong['phong'] = $data;
		$this->db->insert('phong', $mangphong);
		return	true;
		
	}

	//Sửa
	public function edit($id, $phong)
	{
		$dulieucanupdate         = array('id' => $id,'phong' =>$phong);
		$this->db->where('id', $id);
		return $this->db->update('phong', $dulieucanupdate);
	}

	//Xoá
	public function delete($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('phong');
	}

	//tìm kiếm bằng id
	public function searchbyid($id)
	{
		$ketqua = array();
		foreach ($this->root->data as  $value) 
		{
			if ($id == $value->id) return $value;
		}
		
	}

	//tìm kiếm
	public function search($key)
	{
		$ketqua = $arr_temp = array();
		$key = strtoupper($key);
		
		foreach ($this->root->data as  $value) 
		{
			if (strpos($value->data, $key) !==false) $ketqua[] = $value;
		}
		return $ketqua;
		

	
	}

}

/* End of file cayPhong.php */
/* Location: ./application/models/cayPhong.php */