<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class quanlyve_controller extends CI_Controller {



	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');

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
		$this->home_model->updateData();

		$this->load->model('admin/showve_model');
		$dulieu = $this->showve_model->getdatabase();
		$dulieu = array('dulieutucontroller'=> $dulieu);

		// $this->session->set_flashdata('message');
		//lay noi dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view

		$this->load->view('admin/quanlyve_view',$dulieu, FALSE);

	}
	
	function checkmaghe()
	{

		$maghe = 		$this->input->post('maghe');
		$tenphim =	$this->input->post('tenphim');
	
		$lichchieu = 	$this->input->post('lichchieu');
		$mave= $tenphim.$lichchieu.$maghe;
		$where = array('ma_ve' => $mave );

		$this->load->model('admin/checkexists_ve_model'); 
		if($this->checkexists_ve_model->check_exists($where))
		{
				//tra ve thong bao loi
			$this->form_validation->set_message(__FUNCTION__,'Ghế Đã Hết, Vui lòng chọn ghế khác !.');
			 //neu co roi thi
			return FALSE;
		}
		else
		{
			return true;
		}
	}



	function search()
	{

		$this->load->model('admin/showve_model');
		$key = $this->input->post('tenphim');

		$data['dulieutucontroller'] = $this->showve_model->search($key);
		$this->session->set_flashdata('message');
		if ($this->showve_model->search($key) ==  null) $this->session->set_flashdata('message', 'Không có vé!!');

		$message = $this->session->flashdata('message');
	 	$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view

	 	$this->load->view('admin/quanlyve_view', $data);


	}
	function sapxep()
	{
			$this->load->model('admin/showve_model');

			$data['dulieutucontroller'] = $this->showve_model->sapxep();

			$message = $this->session->flashdata('message');
	 	$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view

	 	$this->load->view('admin/timkiemsapxepve_view', $data);
	}


	public function add()
	{
		$this->load->model('admin/showlichchieu_model');
		$ketqua['manglichchieu'] = $this->showlichchieu_model->getdatabase();   
		
		//tạo mảng phim đang chiếu trong lịch chiếu
		$n = 1; $mangphim = array();
		foreach ($ketqua['manglichchieu'] as $value) 
		{			
			if ($n == 1 )
			{				
				$mangphim[$n] = $value['tenphim'];
				$n++;				
			}				
			else 
			{		
				if ($mangphim[$n-1] != $value['tenphim']) 
				{
					
					$mangphim[$n] = $value['tenphim'];
					$n++;
				}
			}	
		}

		$ketqua['mangphim'] = $mangphim;
		
		$this->load->view('admin/addve_view', $ketqua);
		
	}
	//kiem tra voucher co ton tai khong
	public function check_voucher()
	{
		$mavoucher = 	$this->input->post('ma_voucher');
		if($mavoucher == ''){
			return true;
		}
		$where = array('ma_voucher' => $mavoucher);
		$this->load->model('admin/Checkexists_model');
		if($this->Checkexists_model->check_exists_voucher($where) != null)
		{
				
			 //neu co roi thi
			return true;
		}
		else
		{
			// //tra ve thong bao loi
			$this->form_validation->set_message(__FUNCTION__,'Voucher không tồn tại');
			return false;
		}
	}

	public function addve()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$lichchieu = $this->input->post('lichchieu');
		if ($this->input->post()) 
		{
			$this->form_validation->set_rules('ma_voucher', 'Mã voucher', 'callback_check_voucher');
			$this->form_validation->set_rules('maghe', 'Mã Ghế', 'required|callback_checkmaghe');
			

			$mavoucher = 	$this->input->post('ma_voucher');
			$where = array('ma_voucher' => $mavoucher);
			$this->load->model('admin/Checkexists_model');
			$voucher = $this->Checkexists_model->check_exists_voucher($where);
			if($voucher != null)
			{
				$giave = 45000;
				 //neu co roi thi
				$giave = $giave - $giave*$voucher/100;
			}
			else
			{
				// //tra ve thong bao loi
				// $this->form_validation->set_message(__FUNCTION__,'Voucher không tồn tại');
				$giave = 45000;
			}

		
			 		if($this->form_validation->run())
					{
							$lichchieu = $this->input->post('lichchieu');
					 		$tenphim 	  = 	$this->input->post('tenphim');
							
					 		$mavoucher 	  = $this->input->post('ma_voucher'); 		
					 		
					 		$maghe        = 	$this->input->post('maghe');


					 		$mave 	  = 	$tenphim.$lichchieu.$maghe;

					 		$this->load->model('admin/showlichchieu_model');
					 		$manglichchieu = $this->showlichchieu_model->getdatabase($lichchieu);

					 		foreach ($manglichchieu as $key => $value) 
					 		{
					 			$phong = $value['phong'];
					 			$giochieu = $value['thoigian'];
					 			

					 		}
					 		

					 		$data         = array(
					 				'ma_ve' => $mave,
					 				'tenphim' => $tenphim,
					 				'giave' => $giave,
					 				'maghe' => $maghe,
					 				'phong' => $phong,
					 				'giochieu' => $giochieu,
					 				
					 				'lichchieu' => $lichchieu
					 			);


							$this->load->model('admin/addve_model');

							if ($this->addve_model->add($data)) 
							{	
				 				

								//message la ten bien mà ta muon gan du lieu
								$this->session->set_flashdata('message', 'Mua vé thành công, giá vé là: '.number_format($giave));
								
					 		}
					 		else
					 		{

					 			$this->session->set_flashdata('message', 'Mua Vé Thất Bại');
					 			redirect(base_url('admin/quanlyve_controller/chonghe/'.$lichchieu)); 
					 		}
					 		// chuyen toi trang danh sach quyen tri vien
					 		redirect(base_url('admin/quanlyve_controller/chonghe/'.$lichchieu)); 
					 	}
					 	$this->session->set_flashdata('message', 'Voucher không tồn tại');
					 	redirect(base_url('admin/quanlyve_controller/chonghe/'.$lichchieu)); 
		}
		
		
		$this->index();
		
	}

	public function chonGhe($id)
	{
		
		$this->load->model('admin/showlichchieu_model');
		$ketqua['mangketqua'] = $this->showlichchieu_model->getdatabase($id);
		$this->load->model('admin/checkexists_ve_model');
		$ketqua['mangghehet'] = $this->checkexists_ve_model->check_exists_ghe($id);

		$this->load->view('admin/chonghe_view', $ketqua);
	}
	public function deleteData($idnhanduoc)
	{
		$this->load->model('admin/deleteve_model');
		if ($this->deleteve_model->deleteDataById($idnhanduoc)) 
		{
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');	
		}	
		else
		{
			 	$this->session->set_flashdata('message', 'Không xóa dược');
		}
		// chuyen toi trang danh sach quyen tri vien
		redirect(base_url('admin/quanlyve_controller')); 	
	}
	

	function sendmail()
 	{


 		$email = $this->input->post('email');
 		$result = $this->db->query("select * from user where email='".$email."'")->result_array();
 		if (count($result)>0) 
 		{
 				
 			$this->load->view('sendmailve');
 			$this->session->set_flashdata('message', 'Check email !' );
 			redirect(base_url('phim1/phong1/h1'));
 			
 		}


 	}
	
	public function addVeUser()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$lichchieu = $this->input->post('lichchieu');
		if ($this->input->post()) 
		{
			$this->form_validation->set_rules('ma_voucher', 'Mã voucher', 'callback_check_voucher');
			$this->form_validation->set_rules('maghe', 'Mã Ghế', 'required|callback_checkmaghe');
			

			

		
			 		if($this->form_validation->run())
					{

						$mavoucher = 	$this->input->post('ma_voucher');
						$where = array('ma_voucher' => $mavoucher);
						$this->load->model('admin/Checkexists_model');
						$voucher = $this->Checkexists_model->check_exists_voucher($where);
						if($voucher != null)
						{
							$giave = 45000;
							 //neu co roi thi
							$giave = $giave - $giave*$voucher/100;
						}
						else
						{
							// //tra ve thong bao loi
							// $this->form_validation->set_message(__FUNCTION__,'Voucher không tồn tại');
							$giave = 45000;
						}
						


							$lichchieu = $this->input->post('lichchieu');
					 		$tenphim 	  = 	$this->input->post('tenphim');
							
					 		$mavoucher 	  = $this->input->post('ma_voucher'); 		
					 		
					 		$maghe        = 	$this->input->post('maghe');

					 		$email        = 	$this->input->post('email');

					 		$mave 	  = 	$tenphim.$lichchieu.$maghe;
					 		

					 		$this->load->model('admin/showlichchieu_model');
					 		$manglichchieu = $this->showlichchieu_model->getdatabase($lichchieu);

					 		foreach ($manglichchieu as $key => $value) 
					 		{
					 	 		$phong = $value['phong'];
					 			$giochieu = $value['thoigian'];

					 		}
					 		$data         = array(
					 				'ma_ve' => $mave,
					 				'tenphim' => $tenphim,
					 				'giave' => $giave,
					 				'maghe' => $maghe,
					 				'phong' => $phong,
					 				'giochieu' => $giochieu,
					 				'email' => $email,
					 				'lichchieu' => $lichchieu
					 			);
					 		$this->load->model('admin/showphim_model');
					 		$this->load->model('admin/showphong_model');
					 		$temp['mangketqua'] = array(
					 				'ma_ve' => $mave,
					 				'tenphim' => $this->showphim_model->ktdanhmuc($tenphim),
					 				'giave' => $giave,
					 				'maghe' => $maghe,
					 				'phong' => $this->showphong_model->ktdanhmuc($phong),
					 				'giochieu' => $giochieu,
					 				'email' => $email,
					 				'lichchieu' => $lichchieu
					 			);
							$this->load->model('admin/addve_model');

							
				 			$result = $this->db->query("select * from user where email='".$email."'")->result_array();
 		  					if (count($result)>0) 
 								{			
 				
	 			 					$this->load->view('sendmailve',$temp);
	 								if ($this->addve_model->add($data)) 
										{	
		 									//message la ten bien mà ta muon gan du lieu
											$this->session->set_flashdata('message', 'Mua vé thành công,  giá vé là: '.number_format($giave));
		 								}
								 		else
								 		{

								 			$this->session->set_flashdata('message', 'Mua Vé Thất Bại');
								 			redirect(base_url('home_controller/chonghe/'.$lichchieu)); 
								 		}
							 		// chuyen toi trang danh sach quyen tri vien
							 		redirect(base_url('home_controller/chonghe/'.$lichchieu));
	 							}
 								else
 								{
 									$this->session->set_flashdata('message', 'Email chưa đăng ký !' );
 										redirect(base_url('home_controller/chonghe/'.$lichchieu)); 
 								}

								
								
					 		 
					 	}
					 	$this->session->set_flashdata('message', 'Voucher không tồn tại !!!');
					 	redirect(base_url('home_controller/chonghe/'.$lichchieu)); 
		}
		
		
		
	}


}

/* End of file quanlyve_controller.php */
/* Location: ./application/controllers/quanlyve_controller.php */