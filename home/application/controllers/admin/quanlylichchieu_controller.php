<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class quanlylichchieu_controller extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$controller = $this->uri->segment(1);
		switch ($controller) {
			case 'admin':
	 			// xu ly du lieu khi truy van vao adm
				
				$this->check_login();
				break;
			
			
			
			default:
				// xu ly du lieu o trang ngoai
				break;
		}
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

	
	//thuc hien dang xuat
	function logout()
	{
			if ($this->session->userdata('login'))
			 {
					$this->session->unset_userdata('login');
					redirect(base_url('admin/loginadmin_controller'));
			}
	}
	public function index()
	{ 
		$this->load->model('admin/home_model');
		$this->home_model->update_lichchieu();
		$this->load->model('admin/showlichchieu_model');
		

		$dulieu['dulieutucontroller']= $this->showlichchieu_model->getdatabase();

		//lay noi dung của biến message
		$this->data['message'] = $this->session->flashdata('message'); //$message la noi dung thong bao ta se truyen qua view

		$this->load->view('admin/quanlylichchieu_view',$dulieu, FALSE);

	}

	 function  search()
	{		$this->load->model('admin/Showlichchieu_model');
			$key = $this->input->post('tenphim');
			$data['dulieutucontroller'] = $this->Showlichchieu_model->search($key);
			$this->session->set_flashdata('message');
			if ($this->Showlichchieu_model->search($key) == null ) $this->session->set_flashdata('message', 'Không có lịch chiếu !!');

			$message = $this->session->flashdata('message');
	 		$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view

			$this->load->view('admin/timkiemsapxeplichchieu_view', $data);

	}

	 function sapxep()
	{
		$this->load->model('admin/Showlichchieu_model');

		$data['dulieutucontroller'] = $this->Showlichchieu_model->sapxep();
		$message = $this->session->flashdata('message');
	 	$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view


		$this->load->view('admin/timkiemsapxeplichchieu_view', $data);

	}
	function check_thoigian()
	{
		$thoigian 	  = 	$this->input->post('thoigian');
		
		if ($thoigian >= "09:00" & $thoigian < "13:00" ) 
			{
				return "ca1";
				
			}
		else if ($thoigian >= "13:00" & $thoigian < "17:00" ) 
		{
			return "ca2";
			
		}
		else  if ($thoigian >= "17:00" & $thoigian <= "21:00" ) 
		{
			return "ca3";
			
		}
		else 
		{
			
			return null;
		}
	}

	function check_lichchieu()
	{
		$cachieu = $this->check_thoigian();
		if ($cachieu != null)
		{
			$phong 		= 	$this->input->post('phong');
			
			$ngaychieu 	  = 	$this->input->post('ngaychieu');

			$where['phong'] = $phong;
			$where['cachieu'] = $cachieu;
			$where['ngaychieu'] = $ngaychieu;
			$this->load->model('admin/addlichchieu_model');
			$this->load->model('admin/showphong_model');
			if($this->addlichchieu_model->check_exists($where))
			{
				//tra ve thong bao loi
				$this->form_validation->set_message(__FUNCTION__,"Thời gian bạn chọn trong ngày ".$ngaychieu." và ".$this->showphong_model->ktdanhmuc($phong)." đang chiếu phim khác rồi !!!");
				
				 //neu co roi thi
				return FALSE;
			}
			else
			{
				return true;
			}
		}
		else 
		{
			$this->form_validation->set_message(__FUNCTION__,'Thời gian phải lớn hơn 9h và bé hơn 21h');
			return false;
		}
		
	}

	function check_ngaychieu()
	{
		$ngaychieu 	  = 	$this->input->post('ngaychieu');
		
		$tenphim 	  = 	$this->input->post('tenphim');

		$this->db->where('id', $tenphim);
		$ketqua = $this->db->get('phimchieu');
		$this->load->model('admin/showphim_model');
		
		foreach ($ketqua->result_array() as  $value) {
			$ngaybatdau = $value['ngaykhoichieu'];
			$ngayketthuc =$value['ngayketthuc'];

			if ($ngaychieu < $ngaybatdau or $ngaychieu > $ngayketthuc)
			{
				$this->form_validation->set_message(__FUNCTION__,'Ngày chiếu của '. $this->showphim_model->ktdanhmuc($tenphim).' phải nằm trong '	. $ngaybatdau.' và '. $ngayketthuc);

				
				return false;
			}
			else return true;
			
			
		}

	}
	

	 function add()
	{

		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');

		if ($this->input->post()) 
		{

		
			$this->form_validation->set_rules('ngaychieu', 'Ngày Chiếu', 'required|callback_check_ngaychieu');
			$this->form_validation->set_rules('thoigian', 'Thời Gian', 'required|callback_check_lichchieu');

			

			if($this->form_validation->run())
			{
			 		$tenphim 	  = 	$this->input->post('tenphim');
					$phong 	  	  = 	$this->input->post('phong');
			 		$ngaychieu 	  = 	$this->input->post('ngaychieu');
			 		$thoigian 	  = 	$this->input->post('thoigian');
			 		$cachieu = $this->check_thoigian();

			 		$data         = array(

			 				'tenphim'  	=> $tenphim,
			 				'phong' 	=> $phong,
			 				'ngaychieu'	=> $ngaychieu, 
			 				'thoigian' 	=> $thoigian, 
			 				'cachieu'	=> $cachieu,
			 				

			 			);
					$this->load->model('admin/addlichchieu_model');

					if ($this->addlichchieu_model->add($data)) 
					{	
 
						//message la ten bien mà ta muon gan du lieu
						$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
						
			 		}
			 		else
			 		{
			 			$this->session->set_flashdata('message', 'Không thêm dược');
			 		}
			 		// chuyen toi trang danh sach quyen tri vien
				 	redirect(base_url('admin/quanlylichchieu_controller')); 
			}
			
			
			
		}

	 	//lay dữ liệu Phòng
		$this->load->model('admin/showphong_model');
		$mang['mangphong'] = $this->showphong_model->getdatabase();
		
		//lấy dữ liệu Tên phim
		$this->load->model('admin/showphim_model');
		//lấy phim có trang thái đang chiếu ra		
		$mang['mangphim']=$this->showphim_model->getdatabase(2); //2: đang chiếu ; 3: sắp chiếu ; 4: đã chiếu


		$this->load->view('admin/addlichchieu_view',$mang, FALSE);
		
	}


	 function deleteData($idnhanduoc)
	{
		$this->load->model('admin/deletelichchieu_model');
		if ($this->deletelichchieu_model->deleteDataById($idnhanduoc)) 
		{
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');	
		}	
		else
		{
			 	$this->session->set_flashdata('message', 'Không xóa dược');
		}
		
		// chuyen toi trang danh sach quyen tri vien
		redirect(base_url('admin/quanlylichchieu_controller')); 
	}


	 function editData($id)
	{
		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');
		

		$this->load->model('admin/showphim_model');
		//lấy phim có trang thái đang chiếu ra		
		$ketqua['mangphim']=$this->showphim_model->getdatabase(2); //2: đang chiếu ; 3: sắp chiếu ; 4: đã chiếu

		$this->load->model('admin/showphong_model');
		$ketqua['mangphong'] = $this->showphong_model->getdatabase();

		$this->load->model('admin/editlichchieu_model');
		$ketqua['mangketqua'] = $this->editlichchieu_model->editById($id);
		
		
		if(!$ketqua)
		{
			$this->session->set_flashdata('message', 'Dữ liệu không tồn tại');
			redirect(base_url('admin/quanlylichchieu_controller')); 
		}
		

		 //truyen ket qua cho viewedit de sua du lieu
		$this->load->view('admin/editlichchieu_view', $ketqua, FALSE);

	}
	 function updateDulieu()
	{
		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');

		$id 		= $this->input->post('id');
		//neu ma du liệu post len thi kiem tra
		if ($this->input->post()) 
			{
			$this->form_validation->set_rules('thoigian', 'Thời Gian', 'required|callback_check_lichchieu');

		

			if($this->form_validation->run())// tra ve gai tri true thi 
			 	//add vao csdl
			 {	
			 		$id 		= $this->input->post('id');
			 		$tenphim 	  = 	$this->input->post('tenphim');
					$phong 	  	  = 	$this->input->post('phong');
			 		$ngaychieu 	  = 	$this->input->post('ngaychieu');
			 		$thoigian 	  = 	$this->input->post('thoigian');
			 		$cachieu 		= $this->check_thoigian();

				$this->load->model('admin/editlichchieu_model');

			if ($this->editlichchieu_model->updateDataById($id,$tenphim,$phong,$ngaychieu,$thoigian,$cachieu)) 
				{
					
					$this->session->set_flashdata('message', 'Edit dữ liệu thành công');
				}
			else 	
			{
				$this->session->set_flashdata('message', 'Edit dữ liệu thất bại');
				redirect(base_url('admin/quanlylichchieu_controller')); 
			}
			// chuyen toi trang danh sach quyen tri vien
			redirect(base_url('admin/quanlylichchieu_controller')); 

			}
			else {
				$this->session->set_flashdata('message', 'Trung lich chieu');
				redirect(base_url('admin/quanlylichchieu_controller/editData/'.$id)); 
			}

			}


	}

}

/* End of file quanlylichchieu_controller.php */
/* Location: ./application/controllers/quanlylichchieu_controller.php */