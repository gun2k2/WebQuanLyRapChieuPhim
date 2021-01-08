<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class editphim_model extends CI_Model {

	public function editById($i)

	{

		//$this->db->select('*');
		$this->db->where('id', $i);
		$dulieu= $this->db->get('phimchieu');
		$dulieu= $dulieu->result_array();
		return $dulieu;
	}
	public function updateDataById($id,$tenphim,$tentienganh,$image,$nsx,$theloai,$quocgia,$daodien,$dienvien,$trailer ,$noidung,$ngaykhoichieu,$thoiluong,$p_id)

		{
			
			$data  = array(
				
			 				'tenphim' => $tenphim,
			 				'tentienganh' => $tentienganh,
			 				'image' => $image,
			 				'nsx' => $nsx,
			 				'theloai' => $theloai,
			 				'quocgia'=> $quocgia, 
			 				'daodien' => $daodien,
			 				'dienvien' => $dienvien,
			 				'trailer' => $trailer,
			 				'noidung' => $noidung,
			 				'ngaykhoichieu' => $ngaykhoichieu,
			 				'thoiluong'=> $thoiluong, 
			 				'p_id'=> $p_id, 
			 				

			 			);
		$this->db->where('id', $id);
		return $this->db->update('phimchieu', $data);
	}

	

}

/* End of file editadmin_model.php */
/* Location: ./application/models/editadmin_model.php */