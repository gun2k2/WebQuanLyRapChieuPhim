<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contact_model extends CI_Model {

	function contact($data)
	{
		 $this->db->insert('contact', $data);
		return	$this->db->insert_id();
	}

}

/* End of file contact_model.php */
/* Location: ./application/models/contact_model.php */