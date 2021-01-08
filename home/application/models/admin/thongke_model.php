<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class thongke_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getData($ngaybatdau, $ngayketthuc)
	{
		# code...
		$this->db->select('*');
		$this->db->where('ngaymua >=', $ngaybatdau);
		$this->db->where('ngaymua <=', $ngayketthuc);
		

		$query = $this->db->get('ve');
		return $query->result;
	}

}

/* End of file thongke_model.php */
/* Location: ./application/models/thongke_model.php */