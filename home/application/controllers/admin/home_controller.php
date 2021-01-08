<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_controller extends CI_Controller {

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
	 	$this->load->model('admin/Showadmin_model');
	 	$this->load->model('admin/home_model');
		$dulieu = $this->Showadmin_model->getdatabase();
		$dulieu = array('dulieutucontroller'=> $dulieu);
		$this->home_model->updateData();
		//$this->session->set_flashdata('message');
	 	//lay noi dung của biến message
	 	$message = $this->session->flashdata('message');
	 	$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view

	 	$this->load->view('admin/home_view',$dulieu, false);
	 }
	public function  search()
	{		$this->load->model('admin/Showadmin_model');
			$key = $this->input->post('name');
			$this->session->set_flashdata('message');
			$data['dulieutucontroller'] = $this->Showadmin_model->search($key);
			if ($this->Showadmin_model->search($key)==null) $this->session->set_flashdata('message', 'Không có kết quả !!!');
			$message = $this->session->flashdata('message');
	 		$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view

			$this->load->view('admin/timkiemsapxepadmin_view', $data);

	}

	function sapxep()
	{
		$this->load->model('admin/Showadmin_model');

		$data['dulieutucontroller'] = $this->Showadmin_model->sapxep();
		$message = $this->session->flashdata('message');
	 	$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view


		$this->load->view('admin/timkiemsapxepadmin_view', $data);

	}
	//kiem tra username da ton tai chua
	function check_username()
	{
		$username = 	$this->input->post('username');
		$where = array('username' => $username);
		$this->load->model('admin/Checkexists_model');
		if($this->Checkexists_model->check_exists($where))
		{
				//tra ve thong bao loi
			$this->form_validation->set_message(__FUNCTION__,'Tài Khoản đã tồn tại');
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

		//neu ma du liệu post len thi kiem tra
		if ($this->input->post()) 
			{
			$this->form_validation->set_rules('name', 'Tên', 'required|min_length[5]');
	$this->form_validation->set_rules('username', 'Tài Khoản Đăng Nhập','required|callback_check_username');
			$this->form_validation->set_rules('password', 'Mật Khẩu', 'required|min_length[5]');
			$this->form_validation->set_rules('re_password', 'Mật Khẩu', 'required|matches[password]');
			 //nhap liệu chính xác
			if($this->form_validation->run())// tra ve gai tri true thi 
			// 	//add vao csdl
			 {
			 		$name 	  = 	$this->input->post('name');
					$username = 	$this->input->post('username');
			 		$password = 	$this->input->post('password');
			 		$password = md5($password);	
			 		$data = array('name' => $name,'username' => $username,'password'=> $password);

			 		$permissions = $this->input->post('permissions');
			 		$data['permissions'] = json_encode($permissions); //chung ta luu vao cot permissions, va luu no dưới dạng chuỗi 
					$this->load->model('admin/addnv_model');

					if ($this->addnv_model->add($data)) 
					{	
						//message la ten bien mà ta muon gan du lieu
						$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
						
			 		}
			 		else
			 		{
			 			$this->session->set_flashdata('message', 'Không thêm dược');
			 		}
			 		// chuyen toi trang danh sach quyen tri vien
			 		redirect(base_url('admin/home_controller')); 
			 }

			 }


			 $this->config->load('permissions',true);
			 $config_permissions =  $this->config->item('permissions');
			// load view ra
			 $this->data['config_permissions'] = $config_permissions;

			 $this->load->view('admin/addadmin_view', $this->data );	
	}
	public function deleteData($idnhanduoc)
	{
		$this->load->model('admin/deleteadmin_model');
		if ($this->deleteadmin_model->deleteDataById($idnhanduoc)) 
		{
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');	
		}	
		else
		{
			 	$this->session->set_flashdata('message', 'Không xóa dược');
		}
		// chuyen toi trang danh sach quyen tri vien
		redirect(base_url('admin/home_controller')); 	
	}

	
	public function editData($id)
	{
		$this->load->model('admin/Editadmin_model');
		$ketqua = $this->Editadmin_model->editById($id);
		$ketqua = array('mangketqua' =>$ketqua);

		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');
		 //truyen ket qua cho viewedit de sua du lieu
		$this->load->view('admin/editadmin_view', $ketqua, FALSE);

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
$this->form_validation->set_rules('name', 'Tên', 'required|min_length[5]');
$this->form_validation->set_rules('username', 'Tài Khoản Đăng Nhập',  'required|is_unique[admin.username]');
$this->form_validation->set_rules('password', 'Mật Khẩu', 'required|min_length[5]');
$this->form_validation->set_rules('re_password', 'Mật Khẩu', 'required|matches[password]');

				
	
			if($this->form_validation->run())// tra ve gai tri true thi 
			 	//add vao csdl
			 {	
			 		$id 	  =     $this->input->post('id');
			 		$name 	  = 	$this->input->post('name');
					$username = 	$this->input->post('username');
			 		$password = 	$this->input->post('password');
			 		$password = md5($password);	
				$this->load->model('admin/Editadmin_model');


			if ($this->Editadmin_model->updateDataById($id,$name,$username,$password)) 
				{
			
					$this->session->set_flashdata('message', 'Edit dữ liệu thành công');
						redirect(base_url('admin/home_controller')); 
				}
			else
			{
				
				$this->session->set_flashdata('message', 'Edit dữ liệu thất bại');
					redirect(base_url('admin/home_controller/editData/'.$id)); 
				
			}

			// chuyen toi trang danh sach quyen tri vien
			

			}
			else 
			{
				$this->session->set_flashdata('message', 'Chinh sua that bai');
				redirect(base_url('admin/home_controller/editData/'.$id)); 
			}

			}
		
			


	}


}

/* End of file home_controller.php */
/* Location: ./application/controllers/home_controller.php */