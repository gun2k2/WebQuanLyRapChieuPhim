<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class quanlyphong_controller extends CI_Controller
{
	public $cay;
	public function __construct()
	{
		parent::__construct();
		$controller = $this->uri->segment(1);
		$this->load->model('admin/cayPhong');
		$this->cay = new cayPhong();

		$this->load->model('admin/showphong_model');
		$this->cay->getdatabase($this->showphong_model->getdatabase());
		switch ($controller) {
			case 'admin':
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
		
		$data = array('dulieutucontroller'=> $this->cay->root->data);
		$this->load->view('admin/quanlyphong_view',$data, false);
	}

	 function  search()
	{		
			$key = $this->input->post('phong');
			$data['dulieutucontroller'] = $this->cay->search($key);
			if (count($this->cay->search($key)) == 0 ) $this->session->set_flashdata('message', 'Không có kết quả !!!');
			$this->data['message'] = $this->session->flashdata('message'); //$message la noi dung thong bao ta se truyen qua view
			$this->load->view('admin/quanlyphong_view', $data);

	}

	function sapxep()
	{
		$this->load->model('admin/Showphong_model');

		$data['dulieutucontroller'] = $this->Showphong_model->sapxep();
		$message = $this->session->flashdata('message');
	 	$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view


		$this->load->view('admin/quanlyphong_view', $data);

	}

	function check_phong()
	{
		
		$phong = 	strtoupper($this->input->post('phong'));
		
		
		if($this->cay->check_exists($phong))
		{
			//tra ve thong bao loi
			$this->form_validation->set_message(__FUNCTION__,'Phòng '.$phong.' đã tồn tại');
			 //neu co roi thi
			return FALSE;
		}
		else
		{
			return true;
		}
	}

	public function add()
	{

		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');
		if ($this->input->post()) 
		{
			$this->form_validation->set_rules('phong', 'Tên Phòng', 'required|callback_check_phong');
			if($this->form_validation->run())
			{
			 		$phong 	  = 	$this->input->post('phong');
			 		

					if ($this->cay->add($phong)) 
					{	

						//message la ten bien mà ta muon gan du lieu
						$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
						
			 		}
			 		else
			 		{
			 			$this->session->set_flashdata('message', 'Thêm mới dữ liệu thất bại');
			 		}
			 		// chuyen toi trang danh sach quyen tri vien
			 		
			 		redirect(base_url('admin/quanlyphong_controller')); 
		 	}
		}
		
		$this->load->view('admin/addphong_view');	
	}
	public function deleteData($idnhanduoc)
	{
		if ($this->cay->delete($idnhanduoc)) 
		{
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');	
		}	
		else
		{
			 	$this->session->set_flashdata('message', 'Không xóa dược');
		}
		$this->load->model('admin/home_model');
		$this->home_model->update_lichchieu();
		// chuyen toi trang danh sach quyen tri vien
		redirect(base_url('admin/quanlyphong_controller')); 
	}


	public function editData($id)
	{
		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');
		
		$ketqua['phong'] = $this->cay->searchbyid($id);
		$this->load->view('admin/editphong_view', $ketqua, FALSE);
	}

	public function updateDulieu()
	{
		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');
		$id 	  =     $this->input->post('id');
		//neu ma du liệu post len thi kiem tra
		if ($this->input->post()) 
		{

	
			$this->form_validation->set_rules('phong', 'Tên Phòng', 'required|callback_check_phong');

			if($this->form_validation->run())// tra ve gai tri true thi 
			 	//add vao csdl
			{	
		 		$id 	  =     $this->input->post('id');
		 		$phong 	  = 	strtoupper($this->input->post('phong'));
			

				

				if ($this->cay->edit($id,$phong)) 
				{
					$this->load->model('admin/home_model');
					$this->home_model->update_lichchieu();
			
					$this->session->set_flashdata('message', 'Edit dữ liệu thành công');
					
				}
				else 	$this->session->set_flashdata('message', 'Edit dữ liệu thất bại');
				
				// chuyen toi trang danh sach quyen tri vien		
				redirect(base_url('admin/quanlyphong_controller')); 
			}

			else $this->editData($id);
		}
	}

}

/* End of file quanlyphong_controller.php */
/* Location: ./application/controllers/quanlyphong_controller.php */