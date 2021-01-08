<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class quanlyvoucher_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$controller = $this->uri->segment(1);
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
		$controller = strtolower($controller);

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
		elseif (!in_array($controller , array('loginadmin_controller','quanlyphong_controller'))) // neu khong phai 1 trong 2 controller này thì  chung ta thuc hiện kiểm tra quyền tại đây
		 {	
			
				 $admin_id = $this->session->userdata('admin_id');
				 $admin_root = $this->config->item('root_admin');
				 if ($admin_id != $admin_root) {

				 	$permissions_admin = $this->session->userdata('permissions');
					
				 	$controller  = $this->uri->rsegment(1);
				 	$action = $this->uri->rsegment(2);
				 	$check = true;
					if (!isset($permissions_admin->{$controller})) 
				 	{
						$check  = false;	
				 	}
				 	$permissions_actions = $permissions_admin->{$controller};
				 	if (!in_array($action,$permissions_actions )) 
				 	{
				 		$check  = false;
				 	}	
					if (!$check) {
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
		$this->home_model->update_voucher();
		$this->load->model('admin/showvoucher_model');
		$dulieu = $this->showvoucher_model->getdatabase();
		$dulieu = array('dulieutucontroller' => $dulieu );

		
		//lay noi dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view

		$this->load->view('admin/quanlyvoucher_view',$dulieu, FALSE);

	}

	function  search()
	{		$this->load->model('admin/showvoucher_model');
			$key = $this->input->post('ma_voucher');
			$data= $this->showvoucher_model->search($key);
			$data = array('dulieutucontroller' => $data );;
			$message = $this->session->flashdata('message');
	 		$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view
			$this->load->view('admin/timkiemsapxepvoucher_view', $data);
	}

		function check_voucher()
	{
		
		$ma_voucher = 	$this->input->post('ma_voucher');
		$where = array('ma_voucher' => $ma_voucher);
		$this->load->model('admin/Checkexists_model');
		if($this->Checkexists_model->check_exists_voucher($where))
		{
				//tra ve thong bao loi
			$this->form_validation->set_message(__FUNCTION__,'Mã đã tồn tại');
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

		$this->form_validation->set_rules('ma_voucher', 'Mã voucher', 'required|callback_check_voucher');
	


			if($this->form_validation->run())
			{
					$ngayhethan = $this->input->post('ngayhethan');
			 		$ma_voucher = $this->input->post('ma_voucher');
					$percent = $this->input->post('percent');

			 		$data = array(

			 				'ngayhethan' => $ngayhethan,	
			 				'ma_voucher' 	=> $ma_voucher,
			 				'percent' =>$percent
			 			);
					$this->load->model('admin/addvoucher_model');

					if ($this->addvoucher_model->add($data)) 
					{	

						//message la ten bien mà ta muon gan du lieu
						$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
						
			 		}
			 		else
			 		{
			 			$this->session->set_flashdata('message', 'Không thêm dược');
			 		}
			 		// chuyen toi trang danh sach quyen tri vien
			 		redirect(base_url('admin/quanlyvoucher_controller')); 
			 	}
			 }
			
			 $this->load->view('admin/addvoucher_view');	
	}

	public function deleteData($idnhanduoc)
	{
		$this->load->model('admin/deletevoucher_model');
		if ($this->deletevoucher_model->deleteDataById($idnhanduoc)) 
		{
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');	
		}	
		else
		{
			 	$this->session->set_flashdata('message', 'Không xóa dược');
		}
		// chuyen toi trang danh sach quyen tri vien
		redirect(base_url('admin/quanlyvoucher_controller')); 
	}

}

/* End of file quanlyvoucher_controller.php */
/* Location: ./application/controllers/quanlyvoucher_controller.php */