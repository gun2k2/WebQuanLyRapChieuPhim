<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class thongke_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	private function check_login()
	{
		$controller = $this->uri->rsegment('1'); // bien controller để kiem tra cột controller hien tại mà adm ngta truy cap vao bang controller nao
		//$controller = strtolower($controller); 

		$login = $this->session->userdata('login');
		//neu ma chua dang nhập ma truy cập vào 1 controller khác controller login thì chuyển về login
		if (!$login && $controller != 'login') 
		{
			redirect(base_url('admin/loginadmin_controller'));
		}
		if ($login && $controller == 'login') 
		{
			redirect(base_url('admin/quanlyphong_controller'));
		}
		elseif (!in_array($controller , array('loginadmin_controller','quanlyphong_controller'))) // neu controller hien tại truy cập vào khong phai 1 trong  2 controller này thì  chung ta thuc hiện kiểm tra quyền tại đây ( 2 controller mặc định adm nào cũng duoc phép truy cập)
		 {	
				
				 $admin_id = $this->session->userdata('admin_id'); // lấy ra admin đăng nhập
				 $admin_root = $this->config->item('root_admin'); // 	admin chính thống
				 if ($admin_id != $admin_root) { // nếu admin đăng nhập hiện tại khác admin gốc thì kiểm trang

				 	$permissions_admin = $this->session->userdata('permissions');// lấy ra mảng quyền của admin
					//lấy ra controller và action của controller
				 	$controller  = $this->uri->rsegment(1);
				 	$action = $this->uri->rsegment(2);

				 	$check = true;
					if (!isset($permissions_admin->{$controller})) // nếu không tòn tại cái controller trong mảng quyền 
				 	{
						$check  = false;	// không có quyền
				 	}
				 	$permissions_actions = $permissions_admin->{$controller}; // lấy ra các action quyền của controller 
				 	if (!in_array($action,$permissions_actions )) // nếu action  đang truy cập trên thanh url không thuộc mảng quyền thì adm đó không có quyền truy cập vào
				 	{
				 		$check  = false;	// không có quyền
				 	}	

					if (!$check) {
						//hiển thi ra 1 câu thông báo cho adm đó biết
						$this->session->set_flashdata('message', 'Ban khong co quyen truy cap vao');
			 		redirect(base_url('admin/quanlyphong_controller'));
						
				 	}
				 }
				
		}

	}


	public function index()
	{
		//lấy ra ds phim
		$this->load->model('admin/showphim_model');
		$mangphim = $this->showphim_model->getmang_tenphim();
		$this->load->model('admin/showve_model');
		$i=0;

		//thống kê theo tên phim
		foreach ($mangphim as $id_phim) 
		{
			$tongcong = 0; $soluong = 0; 
			$this->db->where('tenphim', $id_phim);
			$mangve = $this->db->get('ve');
			foreach ($mangve->result_array() as $ve)
			{
				$tongcong = $tongcong + $ve['giave'];
				$soluong++;
			}
			$i++;
			$mangsoluong[$i] = $soluong;
			$mangtongcong[$i] = $tongcong;
		}


		//sắp xếp tăng dần theo tổng tiền
		for ($j = 1; $j < $i ; $j++)
		for ($k = $j+1; $k <= $i; $k++)
		{
			if ($mangtongcong[$j] < $mangtongcong[$k])
			{
				$temp = $mangtongcong[$j];
				$mangtongcong[$j] = $mangtongcong[$k];
				$mangtongcong[$k] = $temp;

				$temp = $mangphim[$j];
				$mangphim[$j] = $mangphim[$k];
				$mangphim[$k] = $temp;

				$temp = $mangsoluong[$j];
				$mangsoluong[$j] = $mangsoluong[$k];
				$mangsoluong[$k] = $temp;

			}
		}

		$ketqua['mangphim'] = $mangphim;
		$ketqua['mangsoluong'] = $mangsoluong;
		$ketqua['mangtongcong'] = $mangtongcong;

		$this->load->view('admin/thongke_view', $ketqua);
	}
	public function thongke($key = null)
	{
		$this->load->model('admin/showphim_model');

		$ngaybatdau 	= $this->input->post('ngaybatdau');
		$ngayketthuc 	= $this->input->post('ngayketthuc');
		$tenphim		= $this->input->post('tenphim');
		if ($tenphim == null ) $tenphim = $this->showphim_model->ktdanhmuc($key);
		$this->load->model('admin/showve_model');

		$ketqua['mangketqua'] = $this->showve_model->Search_date($ngaybatdau, $ngayketthuc, $tenphim);

		if ($this->showve_model->Search_date($ngaybatdau, $ngayketthuc, $tenphim) == null ) $this->session->set_flashdata('message', "Không có dữ liệu !!!");
		$this->ketqua['message']  = $this->session->flashdata('message');
		

		$this->load->view('admin/timkiem_thongke_view', $ketqua, FALSE);

		
		
	}

}

/* End of file thongke_controller.php */
/* Location: ./application/controllers/thongke_controller.php */