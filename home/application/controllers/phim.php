<?php if ( ! defined('BASEPATH')) exit('No direct script accesss allowed');

class phim extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}


	function search()
	{	
		$this->load->model('phimchieu');
		$key =  $this->input->get('key-search');

		$this->data['key'] = trim($key); // xoa khoảng trống
		$input = array();
		$input['like'] = array('tenphim',$key);
		//biến list để lưu tất cả sản phẩm phù hợp với tên tìm kiếm
		$list = $this->phimchieu->getlist($input);
		//gui biến this qua view thông qua biến list;
		$this->data['list']=$list;

		$this->load->view('search', $this->data, FALSE);
	}
	public function check_conve()
	{
		$i = 0;  $ketqua = array();
		$this->load->model('admin/showve_model');
		$mangve = $this->showve_model->getdatabase();

		//tạo mảng chứa các lịch chiếu (tên phim) đã hết vé
		foreach ($mangve as $value1) 
		{
			$n = 0;
			foreach ($mangve as  $value2) 
			{
				if ($i > 0) if ($ketqua[$i] == $value2['tenphim']) break;
				if ($value1['lichchieu'] == $value2['lichchieu']) $n++;
			}
			if ($n >= 25) 
			{
				$i++;
				$ketqua[$i] = $value1['tenphim'];
			}
		}
		
		return $ketqua;
	}
	public function phimdangchieu()
	{
		$this->load->model('admin/showphim_model');
		$mang['phimdangchieu']=$this->showphim_model->getdatabase(2);
		$mang['manghetve'] = $this->check_conve();
		
		$this->load->view('phimdangchieu_view', $mang);

		
	}
	public function phimsapchieu()
	{
		$this->load->model('admin/showphim_model');
		$mang['phimsapchieu']=$this->showphim_model->getdatabase(3);
		$this->load->view('phimsapchieu_view', $mang);
	}
	

}

/* End of file phim.php */
/* Location: ./application/controllers/phim.php */