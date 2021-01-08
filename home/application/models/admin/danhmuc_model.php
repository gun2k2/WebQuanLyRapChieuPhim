<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class danhmuc_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function getdatabase($id = null)
	{


		if ($id == null) {
			$this->db->select('*');
			$this->db->order_by('id', 'asc');
		}
		else 
			{
				$this->db->where('id', $id);
			}
		$ketqua = $this->db->get('danhmuc');

		$ketqua = $ketqua ->result_array();
		foreach ($ketqua as $key => $value) {
			return $value['name'];
			break;
		}
		//return $ketqua['name'];
	}

}

/* End of file danhmuc.php */
/* Location: ./application/models/danhmuc.php */