<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {

	function getdatabase($id=null)
	{


		if ($id == null) 
		{
			$this->db->select('*');
			$this->db->order_by('id', 'asc'); 
		}
		
		$ketqua = $this->db->get('event');

		$ketqua = $ketqua ->result_array();
		return $ketqua;

	}

	public function getchitiet($id)
	{
		$this->db->where('id', $id);
		$ketqua = $this->db->get('event');
		
		return $ketqua->result_array();
	}

function update_counter($id)
    {
   
     
        $this->db->where('id', urldecode($id));
        $this->db->select('view'); 
        $count = $this->db->get('event')->row();
      
        $this->db->where('id', urldecode($id));
        $this->db->set('view', ($count->view + 1));
        return $this->db->update('event');   

          
       
        
    }
}

/* End of file event_model.php */
/* Location: ./application/models/event_model.php */