<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('phimchieu');

		$mang['phimdangchieu'] = $this->phimchieu->show6phim(6);

		$this->load->view('home1_view', $mang,FALSE);
	} 

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */