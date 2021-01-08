<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class phimchieu extends CI_Model {


 
	function getdatabase($id)
	{

		
		//$this->db->select($id);
		$this->db->where('id', $id);
		$ketqua = $this->db->get('phimchieu');
		$ketqua = $ketqua ->result_array();
		return $ketqua;
		
		
	}
	function show6phim($soluong)
	{

		$this->db->select('*');
		$ketqua = $this->db->get('phimchieu');
		$ketqua = $ketqua ->result_array();
		return $ketqua;
	}
	function showphim()
	{
		$this->db->select('*');
		$ketqua = $this->db->get('phimchieu');
		$ketqua = $ketqua ->result_array();
		return $ketqua;
	}

	 function add($data)
	{
			
		$this->db->where('id', $data);
		 $this->db->insert('phimchieu', $data);
		return	$this->db->insert_id();
	}
	 function  search($key)
	{
			$this->db->like('tenphim', $key);
			$query = $this->db->get('phimchieu');
			return $query->result();

	}	
	function getlistsetinput($input =array())
	{
		if ((isset($input['like'])) && $input['like'])
		 {		//thứ tự đầu tiên là tên cột, thứ tự thứ 2 là tên giá trị muốn tìm kiếm
			$this->db->like($input['like'][0],$input['like'][1]); 
			// vi du: $input['like'] = array('name','phi vụ triệu độ');
		}
	}
	function getlist($input=array())
	{
		//xử lí các dữ liệu đầu vào	
		$this->getlistsetinput($input);
	
		//thực hiện truy vấn dữ liệu
		$query  = $this->db->get('phimchieu');
		return $query->result();
	}

	public function check_conve_tong($id_phim)
	{
		//Lấy tất cả lịch chiếu của PHIM x 25 so sánh với số vé đã mua của PHIM đó
		$this->db->where('tenphim', $id_phim);
		$manglichchieu = $this->db->get('lichchieu');
		
		

		$this->db->where('id', $id_phim);
		$mangphim = $this->db->get('phimchieu');
		$ngaybatdau = $mangphim->result()[0]->ngaykhoichieu;
		$ngayketthuc = $mangphim->result()[0]->ngayketthuc;

		$this->db->where('tenphim', $id_phim);
		$this->db->where('ngaymua >=', date('yy-m-d'));
		$this->db->where('ngaymua <=', $ngayketthuc);
		

		$ketqua = $this->db->get('ve');

		if ($manglichchieu->num_rows()*25  <= $ketqua->num_rows() & $ketqua->num_rows() != 0 ) return false;
		else return true;

		

	
	}


}

/* End of file showuser.php */
/* Location: ./application/models/showuser.php */