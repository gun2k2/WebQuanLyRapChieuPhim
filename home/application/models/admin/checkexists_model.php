<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkexists_model extends CI_Model {



		function check_exists($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('admin');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}
	function check_exists_phong($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong');

		if ($query->num_rows() > 0) {
			return TRUE;
		}
		else
		{
			FALSE;
		}
	}
	// kiem tra ma voucher co ton tai khong
		function check_exists_voucher($where = array())
	{
		$percent = null; 
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('voucher');
		foreach ($query->result_array() as $key => $value) {
			$percent = $value['percent'];
		}
		return $percent;
		
	}


	// kiem tra ma phim co ton tai khong
		function check_exists_phim($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phimchieu');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}

	function get_info_rule($where= array())
	{
		
		$this->db->where($where);
		$query = $this->db->get('admin');
		if ($query->num_rows()) {
			return $query->row();
			
		} 
		return FALSE;
	}

		function check_exists_ghe($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong_1');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}

		function check_exists_ghe2($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong_2');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}


		function check_exists_ghe3($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong_3');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}

		function check_exists_ghe4($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong_4');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}
		function check_exists_ghe5($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong_5');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}



		function check_exists_ghe6($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong_6');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}

		function check_exists_ghe7($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong_7');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}

		function check_exists_mave1($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong_1');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}
		function check_exists_mave2($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong_2');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}
		function check_exists_mave3($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong_3');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}
		function check_exists_mave4($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong_4');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}
		function check_exists_mave5($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong_5');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}
		function check_exists_mave6($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong_6');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}
		function check_exists_mave7($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phong_7');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}
		function check_exists_tenphim($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phimchieu');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}


		function check_exists_tentienganh($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('phimchieu');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}

	

}

/* End of file checkexists_model.php */
/* Location: ./application/models/checkexists_model.php */