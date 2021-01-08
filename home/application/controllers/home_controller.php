<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$controller = $this->uri->segment(1);
		switch ($controller) {
			case 'home_controller':
		 		// xu ly du lieu khi truy van vao adm
				//$this->load->helper('admin');
				$this->check_login();
				break;
			 
			default:
				// xu ly du lieu o trang ngoai
				break;
		}
	}
	private function check_login()
	{
		$controller = $this->uri->rsegment('3'); // bien controller để kiem tra cột controller hien tại mà adm ngta truy cap vao bang controller nao
		$login = $this->session->userdata('login');
		//neu ma chua dang nhập ma truy cập vào 1 controller khác controller login thì chuyển về login
	 
	
		if (!$login && $controller != 'login') 
		{
			redirect(base_url('default'));
		}
		if ($login && $controller == 'login') 
		{
			redirect(base_url('home_controller'));
		}
	}
	function logout()
	{
			if ($this->session->userdata('login'))
			 {
					$this->session->unset_userdata('login');
					redirect(base_url('dang-nhap'));
			}
			redirect(base_url('dang-nhap'));
	}
	
	function profile($id)
	{
		$this->load->model('admin/Quanlyuser_model');
			

		$mang['mangtinh'] = $this->Quanlyuser_model->province();



		$mang['mangketqua'] = $this->Quanlyuser_model->editById($id);

		$this->load->view('profile',$mang,FALSE);
	}


	public function index()
	{
		//xóa lịch chiếu cũ
		$this->load->model('admin/showlichchieu_model');
		$dulieu['dulieutucontroller']= $this->showlichchieu_model->getdatabase();
		$now = date('yy-m-d');
		
		

		//load trang chủ
		$this->load->model('admin/quanlyuser_model');
		$mang['mangketqua'] = $this->quanlyuser_model->search_email($this->session->userdata('login'));

		$this->load->model('admin/showphim_model');

		$mang['phimdangchieu'] = $this->showphim_model->getdatabase(4);
		$mang['phimsapchieu'] = $this->showphim_model->getdatabase(4);

		$this->load->view('home_view',$mang,FALSE );
		

	}
	public function phim($id)
	{
		 
  
		$this->load->model('admin/showphim_model');
		$this->load->model('admin/showlichchieu_model');
		$ketqua['mangphim'] = $this->showphim_model->searchIDphim($id);
		
		$ketqua['mangketqua'] = $this->showlichchieu_model->searchIDphim($id);
		
		
		$this->load->view('phim_view', $ketqua, FALSE);
		$this->add_count($id);

	}
 
	function add_count($id)
    {
        $this->load->model('admin/showphim_model');
        $this->load->helper('cookie');
        // this line will return the cookie which has slug name
        $check_visitor = $this->input->cookie(urldecode($id), false);

        // tra ve dia chi ip cua khach
        $ip = $this->input->ip_address();
      
        if ($check_visitor == false) {
        
            $this->showphim_model->update_counter(urldecode($id));
        }
    }


	public function chonGhe($id)
	{
		$this->load->model('admin/showlichchieu_model');
		$ketqua['mangketqua'] = $this->showlichchieu_model->getdatabase($id);

		$this->load->model('admin/checkexists_ve_model');
		$ketqua['mangghehet'] = $this->checkexists_ve_model->check_exists_ghe($id);

		$this->load->view('chonghe_user_view', $ketqua);
	}

}

/* End of file home_controller.php */
/* Location: ./application/controllers/home_controller.php */