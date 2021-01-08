<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Showphim_model extends CI_Model {

	function getdatabase($id=null)
	{  
 
 
		if ($id == null) 
		{
			$this->db->select('*');
			$this->db->order_by('id', 'asc'); 
		}
		else
		{
			$this->db->where('p_id', $id);
			$this->db->order_by('id', 'asc');
		}
		$ketqua = $this->db->get('phimchieu');

		$ketqua = $ketqua ->result_array();
		return $ketqua;

	}

	public function getmang_tenphim()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$ketqua = $this->db->get('phimchieu');
		$ketqua = $ketqua->result_array();
		$n = 1; $mang = array();
		

		foreach ($ketqua as $value) 
		{
			if ($n == 1 )
			{				
				$mang[$n] = $value['id'];
				$n++;				
			}				
			else 
			{	
				if ($mang[$n-1] != $value['id']) 
				{					
					$mang[$n] = $value['id'];
					$n++;
				}
			}
			
		}
		return $mang;
	}
	
	function ktdanhmuc($id, $tienganh = false)
	{


		$this->db->where('id', $id);
		$ketqua = $this->db->get('phimchieu');

		$ketqua = $ketqua ->result_array();
		foreach ($ketqua as $key => $value) {
			if ($tienganh) return $value['tentienganh'];
			return $value['tenphim'];
			break;
		}
		//return $ketqua['name'];
	}

	public function  search($key)
	{
			$this->db->like('tenphim', $key);
			$query = $this->db->get('phimchieu');
			return $query->result();

	}	

	function sapxep()
	{	$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$ketqua = $this->db->get('phimchieu');
		return $ketqua->result();
	}

	//hàm dùng trog giao diện của USER chọn Đặt vé
	public function searchIDphim($id)
	{
		$this->db->where('id', $id);
		$ketqua = $this->db->get('phimchieu');
		
		return $ketqua->result_array();
	}
	//update lai con mat (f5) 
	function update_counter($id)
    {
   
     
        $this->db->where('id', urldecode($id));
        $this->db->select('view'); 
        $count = $this->db->get('phimchieu')->row();
      
        $this->db->where('id', urldecode($id));
        $this->db->set('view', ($count->view + 1));
        return $this->db->update('phimchieu');   

          
       
        
    }
	

}

/* End of file showadmin_model.php */
/* Location: ./application/models/showadmin_model.php */