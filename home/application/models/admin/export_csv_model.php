<?php 
class export_csv_model extends CI_Model {

 function getdatabase()
	{
		$ketqua = array();
           
        // Select record
        $this->db->select('*');
        $q = $this->db->get('ve');
        $ketqua = $q->result_array();
        
        return $ketqua;
	}

}

/* End of file export_csv_model.php */
/* Location: ./application/models/export_csv_model.php */