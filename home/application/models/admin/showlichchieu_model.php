<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class showlichchieu_model extends CI_Model {

	function getdatabase($id = null )
	{


		if ($id == null ) $this->db->select('*');
		else $this->db->where('id', $id);
		$this->db->order_by('tenphim', 'asc');
		$ketqua = $this->db->get('lichchieu');


		$ketqua = $ketqua ->result_array();

		
		return $ketqua;
	}

	public function  search($key)

	{

			//tìm dữ liệu tên phim ở bảng Phim theo $key 
			$this->db->like('tenphim', $key);	
			//và Trạng thái phải là Đang chiếu
			$this->db->where('p_id', 2);		
			$ketqua = $this->db->get('phimchieu');
			$ketqua = $ketqua->result_array();


			$where = ""; $n = 0; $temp = array(0 => null);
			//tạo mảng chứa các ID tìm được ở bảng Phim
			foreach ($ketqua as $value) 
			{
				$n++; 
				$temp[$n] = $value['id'];
			}


			//thiết lập nối chuỗi biến where để tìm dữ liệu, vd: where = "id = ... or id = ... or...."
			for ($i=1; $i <= $n ; $i++)
			{ 
				$where = $where." tenphim = ".$temp[$i]." OR ";

			}
			//ID cuối cùng không cần OR nữa 
			$where = $where." tenphim = ".$temp[$n];
			$this->db->where($where);
			
			$ketqua = $this->db->get('lichchieu');
			$ketqua = $ketqua->result_array();
			return $ketqua;

	}	
	public function getmang_tenphim()
	{
		$this->db->select('*');
		$this->db->order_by('tenphim', 'asc');
		$ketqua = $this->db->get('lichchieu');
		$ketqua = $ketqua->result_array();
		$n = 1; $mang = array();
		

		foreach ($ketqua as $value) 
		{
			if ($n == 1 )
			{				
				$mang[$n] = $value['tenphim'];
				$n++;				
			}				
			else 
			{	
				if ($mang[$n-1] != $value['tenphim']) 
				{					
					$mang[$n] = $value['tenphim'];
					$n++;
				}
			}
			
		}
		return $mang;
	}

	public function getmang_phong()
	{
		$this->db->select('*');	
		$this->db->order_by('phong', 'asc');
		$ketqua = $this->db->get('lichchieu');
		$ketqua = $ketqua->result_array();
		$n = 1; $mang = array();
		

		foreach ($ketqua as $value) 
		{
			if ($n == 1 )
			{				
				$mang[$n] = $value["phong"];
				$n++;				
			}				
			else 
			{	
				if ($mang[$n-1] != $value["phong"]) 
				{					
					$mang[$n] = $value["phong"];
					$n++;
				}
			}
			
		}
		return $mang;
	}

	public function getmang_lichchieu($tenphim, $column)
	{
		$this->db->where('tenphim', $tenphim);	
		$this->db->order_by($column, 'asc');
		$ketqua = $this->db->get('lichchieu');
		$ketqua = $ketqua->result_array();
		$n = 1; $mang = array();
		

		foreach ($ketqua as $value) 
		{
			if ($n == 1 )
			{				
				$mang[$n] = $value[$column];
				$n++;				
			}				
			else 
			{	
				if ($mang[$n-1] != $value[$column]) 
				{					
					$mang[$n] = $value[$column];
					$n++;
				}
			}
			
		}
		return $mang;
	}

	
	public function soghe_conlai($id_lichchieu)
	{
		$this->db->where('lichchieu', $id_lichchieu);
		$ketqua = $this->db->get('ve');
		return 25-$ketqua->num_rows();
	}

	function ktdanhmuc($id)
	{
			$this->db->where('id', $id);
			$ketqua = $this->db->get('lichchieu');
			return $ketqua -> result_array();
	}

	function sapxep()
	{	$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$ketqua = $this->db->get('lichchieu');
		return $ketqua->result_array(); 
	}

	//hàm dùng trog giao diện của USER chọn Đặt vé
	public function searchIDphim($id)
	{
		$this->db->where('tenphim', $id);
		$ketqua = $this->db->get('lichchieu');

		return $ketqua->result_array();
	}

	public function checkexist($tenphim = null,$ngaychieu = null, $phong = null, $gio = null, $id = null)
	{
		if ($tenphim != null )$this->db->where('tenphim', $tenphim);
		if ($ngaychieu != null )$this->db->where('ngaychieu', $ngaychieu);
		if ($phong != null )$this->db->where('phong', $phong);
		if ($gio != null ) $this->db->where('thoigian', $gio);
		if ($id != null ) $this->db->where('id', $id);
		$ketqua = $this->db->get('lichchieu');
		if ($ketqua->num_rows() > 0 ) return true;
		return false;
	}

	
	public function deleteData($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('lichchieu');
	}

}

/* End of file showadmin_model.php */
/* Location: ./application/models/showadmin_model.php */