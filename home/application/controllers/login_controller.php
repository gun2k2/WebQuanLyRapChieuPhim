<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_controller extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		        $this->load->helper('form');
	}
 
	public function index()
	{
		
		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');
		if ($this->input->post()) 
		{	
			//set tập lệnh 
			$this->form_validation->set_rules('login', 'login', 'callback_check_login'); // goi ham de kiem tra dieu kien nhap vao dung hay chua
			if ($this->form_validation->run())//neu phuong thuc này thưc hiện đúng thì adm dang nhap thanh cong
			 {
			 	$email = 	$this->input->post('email');
			 	$this->session->set_userdata('login', $email);//ten bien login, de chung ta biet duoc la admin da dang nhap thanh cong roi
			 	//$user = $this->get_user_info();
			 	//$this->session->set_userdata('user_id_login', $user->id);
				redirect(base_url('trang-chu')); 
			}
		}


		$this->load->view('login_view');
	}


	function check_username()
	{
		$email = 	$this->input->post('email');
		$where = array('email' => $email);
		$this->load->model('Checkexists_model');
		if($this->Checkexists_model->check_exists1($where))
		{
				//tra ve thong bao loi
			$this->form_validation->set_message(__FUNCTION__,'Email đã tồn tại');
			 //neu co roi thi
			return FALSE;
		}
		else
		{
			return true;
		}
	}

	function registration()
	{
		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');

		//neu ma du liệu post len thi kiem tra
		if ($this->input->post()) 
			{
			$this->form_validation->set_rules('name', 'Tên', 'required|min_length[5]');
			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_username');
			$this->form_validation->set_rules('password', 'Mật Khẩu', 'required|min_length[5]');
			$this->form_validation->set_rules('confirm', 'Mật Khẩu', 'required|matches[password]');
			 //nhap liệu chính xác
			if($this->form_validation->run())// tra ve gai tri true thi 
			// 	//add vao csdl
			 {
			 		$name 	  = 	$this->input->post('name');
		 			$email = 	$this->input->post('email');
			 		$password = 	$this->input->post('password');
			 		$sdt = 	$this->input->post('sdt');
			 		$data = array('name' => $name, 'email' => $email ,'password'=> $password, 'sdt' => $sdt);

					$this->load->model('Checkexists_model');

					if ($this->Checkexists_model->inser($data)) 
					{	
						//message la ten bien mà ta muon gan du lieu
						$this->session->set_flashdata('message', 'Đăng ký dữ liệu thành công');
						
			 		}
			 		else
			 		{
			 			$this->session->set_flashdata('message', 'Không đăng ký được');
			 		}
			 		// chuyen toi trang danh sach quyen tri vien
			 		redirect(base_url('home')); 
			 }

			 }
			 $this->load->view('registration_view');

	}



	 

	// ham kiem tra username va pssword co chinh xac k
	function check_login()
	{
		$email = 	$this->input->post('email');
		$password = 	$this->input->post('password');

		$this->load->model('Checkexists_model');
		// cho mot mang gom tai khoan va mat khau dang nhap
		$where = array('email'=> $email, 'password' => $password );
		if($this->Checkexists_model->check_exists1($where)) // kiem tra xem co ton tai hay k
		{
			// chung to chung ta dang nhap thanh cong
			return true;
		}
		$this->form_validation->set_message(__FUNCTION__, 'email hoặc password sai!');
		// truoc khi return false thi co mot thong bao
			return FALSE;
		
	}

	


 	function forgotpassword()
 	{
 		$this->load->view('forgotpassword_view');
 	}

 	function resetlink()
 	{


 		$email = $this->input->post('email');
 		$result = $this->db->query("select * from user where email='".$email."'")->result_array();
 		if (count($result)>0) 
 		{
 				
 			$this->load->view('sendmail');
 			$this->session->set_flashdata('message', 'Check email !' );
 			redirect(base_url('login_controller/forgotpassword'));
 			
 		}



 		else
 		{
 			$this->session->set_flashdata('message', 'Email chưa đăng ký !' );
 			redirect(base_url('login_controller/forgotpassword')); 
 		}
 	}

 	function reset()
 	{
		$data['tokan'] = $this->input->get('tokan');
 		$_SESSION['tokan'] = $data['tokan'];
 		$this->load->view('resetpass_view');
 	}
 	function updatepass()
 	{
 		$_SESSION['tokan'];
 		$data= $this->input->post();
 		if ($data['password']==$data['re_password'])
 		 {
 $this->db->query("update user set password='".$data['password']."' where password='".$_SESSION['tokan']."'");
 		redirect(base_url('dang-nhap')); 
 		}
 		else
 		{
 			
 			$this->session->set_flashdata('message','Mật Khẩu Không Trùng Khớp !' );
 			redirect(base_url('login_controller/reset')); 
 		}
 		
 	}








	

		
		

	

	

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */


	
	




