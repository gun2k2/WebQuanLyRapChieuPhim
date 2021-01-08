<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class showve_model extends CI_Model {

	function getdatabase()
	{


		$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$ketqua = $this->db->get('ve');
		
		return $ketqua->result_array();
	}



	function search($key)
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
			
			$ketqua = $this->db->get('ve');
			$ketqua = $ketqua->result_array();
			return $ketqua;	}
	function sapxep()
	{

		$this->db->select('*');
		$this->db->order_by('id', 'asc');

		$ketqua = $this->db->get('ve');

		return $ketqua->result();

	}
	public function Search_Date($ngaybatdau, $ngayketthuc, $tenphim = null )
	{
		if ($tenphim != null) 
		{
			$where = $this->Search_thongke($tenphim);
			
			if ($where != null) $this->db->where($where);
			
		}
		if ($ngaybatdau != null) $this->db->where('ngaymua >=', $ngaybatdau);
		if ($ngayketthuc != null)$this->db->where('ngaymua <=', $ngayketthuc.' 23:59:59');
		
		$ketqua = $this->db->get('ve');
		return $ketqua->result_array();

	}

	public function Search_thongke($key)
	{
		//tìm dữ liệu tên phim ở bảng Phim theo $key 
		$this->db->like('tenphim', $key);	
		
		$ketqua = $this->db->get('phimchieu');

		if ($ketqua->num_rows() == 0) return null;
		$ketqua = $ketqua->result_array();


		$where = ""; $n = 0; $temp = null;
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
		

		
		return $where;

	}
	

}

/* End of file showve_model.php */
/* Location: ./application/models/showve_model.php */