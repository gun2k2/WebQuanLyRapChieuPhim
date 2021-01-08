<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function updateData()
	{
		$this->update_trangthai_phim();
		
		$this->update_lichchieu();
		$this->update_voucher();
	}

	public function update_trangthai_phim()
	{	
		$this->db->select('*');
		
		$ketqua = $this->db->get('phimchieu');
		$now = date("yy-m-d");	
	

		foreach ($ketqua->result_array() as $key => $value) 
		{
			//echo $value['ngaykhoichieu']."<br>";
			if ($now < $value['ngaykhoichieu']) 
			{
				$value['p_id'] = 3;
				$this->db->where('id', $value['id']);
				$this->db->update('phimchieu', $value);
			}
			else if ($now > $value['ngayketthuc']) 
			{
				$value['p_id'] = 4;
				$this->db->where('id', $value['id']);
				$this->db->update('phimchieu', $value);
			}
			else
			{
				$value['p_id'] = 2;
				$this->db->where('id', $value['id']);
				$this->db->update('phimchieu', $value);
			}				
		}			
	}

	public function update_lichchieu()
	{
		$this->update_trangthai_phim();	
		$this->load->model('admin/showlichchieu_model');
		$manglichchieu= $this->showlichchieu_model->getdatabase();
		$now = date('yy-m-d');
		foreach ($manglichchieu as $key => $value) 
		{
			$boo1 = $boo2 = false;
			//Xoá phim đã chiếu nhưng vẫn còn trong lịch chiếu
			$this->db->where('id', $value['tenphim']);
			$this->db->where('p_id', 4);
			if ($this->db->get('phimchieu')->num_rows() > 0) $boo1 = true;

			//Xoá lịch chiếu quá hạn
			$this->db->where('ngaychieu < ', $now);
			if ($this->db->get('lichchieu')->num_rows() > 0  ) $boo2 = true;
			

			if ($boo1 or $boo2) 
			{
				$this->db->where('id', $value['id']);
				$this->db->delete('lichchieu');
			}

		}

		//Xoá lịch chiếu nếu không tồn tại phòng
		$this->load->model('admin/showphong_model');
		
		$phong_lichchieu = $this->showlichchieu_model->getmang_phong();
		foreach ($phong_lichchieu as $value) 
		{
			$this->db->where('id', $value);
			if ($this->db->get('phong')->num_rows() == 0) 
			{
				//xoa
				$this->db->where('phong', $value);
				$this->db->delete('lichchieu');
			}
		}
			
		

		//Xoá lịch chiếu nếu không tồn tại phim
		$this->load->model('admin/showphim_model');
		
		$phim_lichchieu = $this->showlichchieu_model->getmang_tenphim();
		foreach ($phim_lichchieu as $value) 
		{
			$this->db->where('id', $value);
			if ($this->db->get('phimchieu')->num_rows() == 0) 
			{
				//xoa
				$this->db->where('tenphim', $value);
				$this->db->delete('lichchieu');
			}
		}
			


	}
	public function update_voucher()
	{
		$now = date('yy-m-d');

		$this->db->select('*');		
		$ketqua = $this->db->get('voucher');
		foreach ($ketqua->result_array() as $key => $value) 
		{
			//echo $value['ngaykhoichieu']."<br>";
			if ($now > $value['ngayhethan']) 
			{
				$this->db->where('id', $value['id']);
				$this->db->delete('voucher');
			}
						
		}		
	}



}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */