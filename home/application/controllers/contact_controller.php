<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		if ($this->input->post()) 
		{
			
		
							
					 		$name 	  = 	$this->input->post('name');
							
					 		$email 	  = $this->input->post('email'); 		
					 		
					 		$noidung        = 	$this->input->post('noidung');					 		
					 		$data         = array(
					 				'name' => $name,
					 				'email' =>$email,
					 				'noidung' => $noidung
					 			);


							$this->load->model('contact_model');

							if ($this->contact_model->contact($data)) 
							{	
				 						
 				
 			 					$this->load->view('sendmailcontact');
 					
 		
	 			
 				

								//message la ten bien mà ta muon gan du lieu
								$this->session->set_flashdata('message', 'Cám ơn bạn đã đóng góp !');
								redirect(base_url('contact_controller')); 
								
					 		}
					 		else
					 		{

					 			$this->session->set_flashdata('message', 'Thất bại');
					 			redirect(base_url('contact_controller')); 
					 		}
					 	
					 
					 	redirect(base_url('contact_controller')); 
		}
		
		
		
	
		$this->load->view('contact_view');
	}

}

/* End of file contact_controller.php */
/* Location: ./application/controllers/contact_controller.php */