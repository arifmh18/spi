<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends AR_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->SecurityModel->auth();
		//Do your magic here
	}
	
	public function index()
	{
		$data = $this->notif_aktif('user', 'guru', 'siswa', 'industri');
		$data['title'] = 'Dashboard | SI Prakerin';
		$data['judul'] = 'Dashboard';
		$data['view'] = 'dashboard';
		$data['breadcumb'] = '<li><a href="'.base_url().'dashboard"><i class="fa fa-dashboard active"></i> Dashboard</a></li>';


		$this->load->view('master_template',$data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */