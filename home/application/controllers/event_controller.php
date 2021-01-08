<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class event_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('event_model');

	}

	public function index()

	{
		
		$mang['mangevent'] = $this->event_model->getdatabase();
		$this->load->view('event_view', $mang, FALSE);
	}
  
	public function detail($id)
	{

		$ketqua['mangchitiet'] = $this->event_model->getchitiet($id);
		$this->load->view('detail_view',$ketqua,FALSE);
		$this->add_count($id);
	}

	function add_count($id)
    {
        
        $this->load->helper('cookie');
        // this line will return the cookie which has slug name
        $check_visitor = $this->input->cookie(urldecode($id), false);

        // tra ve dia chi ip cua khach
        $ip = $this->input->ip_address();
      
        if ($check_visitor == false) {
        
            $this->event_model->update_counter(urldecode($id));
        }
    }

}

/* End of file event_controller.php */
/* Location: ./application/controllers/event_controller.php */