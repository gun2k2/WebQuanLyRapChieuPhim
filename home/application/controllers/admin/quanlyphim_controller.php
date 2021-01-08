<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class quanlyphim_controller extends CI_Controller 
{

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
		$this->load->model('admin/Showphim_model');
		$this->load->model('admin/home_model');
		$this->home_model->update_trangthai_phim();
		$dulieu = $this->Showphim_model->getdatabase();
		$dulieu = array('dulieutucontroller' => $dulieu );

		
		//lay noi dung của biến message
		// $this->session->set_flashdata('message');
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view

		$this->load->view('admin/quanlyphim_view',$dulieu, FALSE);

	}

	 function  search()
	{		$this->load->model('admin/Showphim_model');
			$key = $this->input->post('tenphim');
			$data['dulieutucontroller'] = $this->Showphim_model->search($key);
			$this->session->set_flashdata('message');
			if ($this->Showphim_model->search($key) == null) $this->session->set_flashdata('message', 'Không tìm thấy phim !!!');

			$message = $this->session->flashdata('message');
	 		$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view

			$this->load->view('admin/timkiemsapxepphim_view', $data);

	}

	function sapxep()
	{
		$this->load->model('admin/Showphim_model');

		$data['dulieutucontroller'] = $this->Showphim_model->sapxep();
		$message = $this->session->flashdata('message');
	 	$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view


		$this->load->view('admin/timkiemsapxepphim_view', $data);

	}


	//kiem tra tenphim da ton tai chua
	function check_tenphim()
	{
		
		$tenphim = 	$this->input->post('tenphim');
		$where = array('tenphim' => $tenphim);
		$this->load->model('admin/Checkexists_model');
		if($this->Checkexists_model->check_exists_tenphim($where))
		{
				//tra ve thong bao loi
			$this->form_validation->set_message(__FUNCTION__,'Phim đã tồn tại');
			 //neu co roi thi
			return FALSE;
		}
		else
		{
			return true;
		}
	}


	//kiem tra tentienganh da ton tai chua
	function check_tentienganh()
	{
		$tentienganh = 	$this->input->post('tentienganh');
		$where = array('tentienganh' => $tentienganh);
		$this->load->model('admin/Checkexists_model');
		if($this->Checkexists_model->check_exists_tentienganh($where))
		{
				//tra ve thong bao loi
			$this->form_validation->set_message(__FUNCTION__,'Tên đã tồn tại');
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

			$this->form_validation->set_rules('tenphim', 'Tên Phim', 'required|callback_check_tenphim');
			$this->form_validation->set_rules('tentienganh', 'Tên tiếng anh', 'callback_check_tentienganh');
			
			if($this->form_validation->run())
			{
			 		$tenphim 	  = 	$this->input->post('tenphim');
			 		$tentienganh 	  = 	$this->input->post('tentienganh');
			 		$nsx 	  = 	$this->input->post('nsx');
					$theloai 	  = 	$this->input->post('theloai');
			 		$quocgia 	  = 	$this->input->post('quocgia');
			 		$daodien 	  = 	$this->input->post('daodien');
			 		$dienvien 	  = 	$this->input->post('dienvien');
			 		$trailer 	  = 	$this->input->post('trailer');
			 		$noidung 	  = 	$this->input->post('noidung');
			 		$ngaykhoichieu 	  = 	$this->input->post('ngaykhoichieu');
			 		$thoiluong 	  = 	$this->input->post('thoiluong');
			 		$ngayketthuc    = 	$this->input->post('ngayketthuc');

			 			//xu ly anh upload
						$target_dir = "images/";
						$target_file = $target_dir . basename($_FILES["image"]["name"]);
						// echo $target_file;
						// die();
						$uploadOk = 1;
						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

						// Check if image file is a actual image or fake image
						if(isset($_POST["submit"])) {
						  $check = getimagesize($_FILES["image"]["tmp_name"]);
						  if($check !== false) {
						    echo "File is an image - " . $check["mime"] . ".";
						    $uploadOk = 1;
						  } else {
						    echo "File is not an image.";
						    $uploadOk = 0;
						  }
						}

						// Check if file already exists
						if (file_exists($target_file)) {
						  echo "Đã có 1 file trùng tên";
						  $uploadOk = 0;
						}

						// Check file size
						if ($_FILES["image"]["size"] > 500000) {
						  echo "Sorry, your file is too large.";
						  $uploadOk = 0;
						}

						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
						  echo "Chỉ chấp nhận file ảnh";
						  $uploadOk = 0;
						}

						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
						  echo "File chưa được upload";
						// if everything is ok, try to upload file
						} else {
						  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
						    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
						  } else {
						    echo "Sorry, there was an error uploading your file.";
						  }
						}

						$image = $_FILES["image"]["name"];


			 		$data         = array(
			 				'tenphim' => $tenphim,
			 				'tentienganh' => $tentienganh,
			 				'image' => $image,
			 				'nsx' => $nsx,
			 				'theloai' => $theloai,
			 				'quocgia'=> $quocgia, 
			 				'daodien'=> $daodien, 
			 				'dienvien'=> $dienvien, 
			 				'trailer'=> $trailer, 
			 				'noidung'=> $noidung, 
			 				'ngaykhoichieu'=> $ngaykhoichieu, 
			 				'thoiluong'=> $thoiluong, 
			 				'ngayketthuc'=> $ngayketthuc, 
			 				'giave'=> 45000, 

			 			);
					$this->load->model('admin/addphim_model');

					if ($this->addphim_model->add($data)) 
					{	

						//message la ten bien mà ta muon gan du lieu
						$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
						
			 		}
			 		else
			 		{
			 			$this->session->set_flashdata('message', 'Không thêm dược');
			 		}
			 		// chuyen toi trang danh sach quyen tri vien
			 		redirect(base_url('admin/quanlyphim_controller')); 
			 	}
			 }
			
			 $this->load->view('admin/addphim_view');	
	}


		public function deleteData($idnhanduoc)
	{
		$this->load->model('admin/Showphim_model');
		$this->db->where('tenphim', $idnhanduoc);
		if ($this->db->get('lichchieu')->num_rows() > 0) $this->session->set_flashdata('message', 'Lịch chiếu tồn tại phim '.$this->Showphim_model->ktdanhmuc($idnhanduoc));
		else
		{
			$this->load->model('admin/deletephim_model');
			if ($this->deletephim_model->deleteDataById($idnhanduoc)) 
			{
					$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');	
			}	
			else
			{
				 	$this->session->set_flashdata('message', 'Không xóa dược');
			}

			$this->load->model('admin/home_model');
			$this->home_model->update_lichchieu();
		}
		// chuyen toi trang danh sach quyen tri vien
		redirect(base_url('admin/quanlyphim_controller')); 
	}

	public function editData($id)
	{
		$this->load->model('admin/editphim_model');
		$ketqua = $this->editphim_model->editById($id);
		$ketqua = array('mangketqua' =>$ketqua);

		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');
		 //truyen ket qua cho viewedit de sua du lieu
		$this->load->view('admin/editphim_view', $ketqua, FALSE);

	}

	public function updateDulieu()
	{
		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');

		//neu ma du liệu post len thi kiem tra
		if ($this->input->post()) 
			{

			$this->form_validation->set_rules('tenphim', 'Tên Phim', 'required|callback_check_tenphim');
			

			if($this->form_validation->run())// tra ve gai tri true thi 
			 	//add vao csdl
			 {		
			 		$id 	  =     $this->input->post('id');
			 		$tenphim 	  = 	$this->input->post('tenphim');
			 		$tentienganh 	  = 	$this->input->post('tentienganh');
			 		$nsx 	  = 	$this->input->post('nsx');
					$theloai 	  = 	$this->input->post('theloai');
			 		$quocgia 	  = 	$this->input->post('quocgia');
			 		$daodien 	  = 	$this->input->post('daodien');
			 		$dienvien 	  = 	$this->input->post('dienvien');
			 		$trailer 	  = 	$this->input->post('trailer');
			 		$noidung 	  = 	$this->input->post('noidung');
			 		$ngaykhoichieu= 	$this->input->post('ngaykhoichieu');
			 		$thoiluong 	  = 	$this->input->post('thoiluong');
			 		$p_id    = 	$this->input->post('p_id');

			 			//xu ly anh upload
						$target_dir = "images/";
						$target_file = $target_dir . basename($_FILES["image"]["name"]);
						// echo $target_file;
						// die();
						$uploadOk = 1;
						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

						// Check if image file is a actual image or fake image
						if(isset($_POST["submit"])) {
						  $check = getimagesize($_FILES["image"]["tmp_name"]);
						  if($check !== false) {
						    echo "File is an image - " . $check["mime"] . ".";
						    $uploadOk = 1;
						  } else {
						    echo "File is not an image.";
						    $uploadOk = 0;
						  }
						}

						// Check if file already exists
						if (file_exists($target_file)) {
						  echo "Đã có 1 file trùng tên";
						  $uploadOk = 0;
						}

						// Check file size
						if ($_FILES["image"]["size"] > 500000) {
						  echo "Sorry, your file is too large.";
						  $uploadOk = 0;
						}

						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
						  echo "Chỉ chấp nhận file ảnh";
						  $uploadOk = 0;
						}

						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
						  echo "File chưa được upload";
						// if everything is ok, try to upload file
						} else {
						  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
						    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
						  } else {
						    echo "Sorry, there was an error uploading your file.";
						  }
						}

						$image = $_FILES["image"]["name"];


			 	

				$this->load->model('admin/editphim_model');
				if ($this->editphim_model->updateDataById($id,$tenphim,$tentienganh,$image,$nsx,$theloai,$quocgia,$daodien,$dienvien,$trailer ,$noidung,$ngaykhoichieu,$thoiluong,$p_id)) 
				{
					$this->load->model('admin/home_model');
					$this->home_model->update_lichchieu();
			
					$this->session->set_flashdata('message', 'Update dữ liệu thành công');
				}
			else 	
			{
				$this->session->set_flashdata('message', 'Update dữ liệu thất bại');
			}
			// chuyen toi trang danh sach quyen tri vien
			redirect(base_url('admin/quanlyphim_controller')); 

			}
			else {
				$this->session->set_flashdata('message', 'Edit dữ liệu thất bại');
				redirect(base_url('admin/quanlyphim_controller')); 
			}

			}


	}

}


/* End of file quanlyphim_controller.php */
/* Location: ./application/controllers/quanlyphim_controller.php */

/* End of file quanlyphim_controller.php */
/* Location: ./application/controllers/quanlyphim_controller.php */