<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export_csv_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->$this->load->model('export_csv_model');
	}

	function index()
	{
			
	}

	function export()
	{
		$file_name = 've_details_on'.date('Ymd').'.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$file_name");
		header("Content-Type: application/csv; ");

		$this->load->model('admin/showve_model');
		$data_ve = $this->showve_model->getdatabase();

		$this->load->model('admin/showphim_model');
		$this->load->model('admin/showphong_model');
		$this->load->model('admin/showlichchieu_model');
		

		$file =  fopen('php://output', 'w');
		$header = array("ID","Ngay", "Ma ve", "Ma Ghe", "Email", "Gia ve", "Lich chieu", "Ten phim", "Phong", "Gio chieu");
		
		fputcsv($file, $header);
		
		foreach ($data_ve as  $value) 
		{
			foreach ($value as  $value1) 
			{
				$value['tenphim'] = $this->showphim_model->ktdanhmuc($value['tenphim'], true);
				$value['phong'] = $this->showphong_model->ktdanhmuc($value['phong']);
				break;
			}
			
			fputcsv($file, $value);
		}
		fclose($file);
		exit;
	}

}

/* End of file Export_csv_controller.php */
/* Location: ./application/controllers/Export_csv_controller.php */