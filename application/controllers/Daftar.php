<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends AR_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->SecurityModel->auth();
	}
	public function index()
	{
		$data = $this->notif_aktif('user', 'guru', 'siswa', 'industri');
		$data['title'] = 'Panel industri | SI Prakerin';
		$data['judul'] = 'Panel industri';
		$data['breadcumb'] = '<li><a href="'.base_url().'dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li><li><i class="fa fa-check-square-o"></i> Administrasi</li><li class="active">Pendaftaran Praktik Industri</li>';
		if ($this->session->userdata('level') == 'admin') {
			$data['daftar'] = $this->m_global->get_data_all('kelompok',null,null,'ketua, industri, guru');
			$data['view'] = 'administrasi/pendaftaran/index';
		}
		else if ($this->session->userdata('level') == 'siswa') {
			$id = $this->session->userdata('id');
			$x = $this->m_global->get_data_all('user', [['kelompok','no_induk = ketua or no_induk = anggota']], ['user.id'=>$id]);
			if ($x) {
				$data['pendaftar'] = $this->m_global->get_data_all('kelompok', [['user','anggota = no_induk']], null);
				$data['view'] = 'administrasi/pendaftaran/post_add';
			}
			else{
				$data['daftar'] = $this->m_global->get_data_all('user',[['jurusan','kd_jurusan = jurusan']],['user.id'=>$id],'no_induk, user.id, jurusan, nama_jurusan');
				$data['industri'] = $this->m_global->get_data_all('user',null,['level'=>'industri'],'id, nama_lengkap, domisili', null, ['domisili', 'asc']);
				$data['view'] = 'administrasi/pendaftaran/add';
			}
		}
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";
		$this->load->view('master_template', $data);
	}

	public function act_add()
	{
		$result = [];
		$post = $this->input->post();

		$this->form_validation->set_rules('induk', 'No induk', 'trim|required|numeric');
		$this->form_validation->set_rules('anggota', 'Anggota', 'trim|required|numeric');
		$this->form_validation->set_rules('industri', 'Tempat Industri', 'trim|required');

		$tgl = tgl_indo(date('Y-m-d'));
		$hari = nama_hari(date('Y-m-d'));

		if ($this->form_validation->run() == true){
			$data = array(
				'ketua' => $post['induk'],
				'anggota' => $post['anggota'],
				'industri' => $post['industri'],
				'created_at' => $hari.', '.$tgl,
				'created_by' => $this->session->userdata('id'),
				'jurusan' => $post['jurusan']
				);
			$proses = $this->m_global->insert('kelompok', $data);
			if($proses) {
				$result['msg'] = 'Data Pendaftar ditambahkan !';
				$result['sts'] = '1';
			} 
			else {
				$result['msg'] = 'Data Pendaftar ditambahkan !';
				$result['sts'] = '0';
			}
		}
		else {
			$result['msg'] = validation_errors();
			$result['sts'] = '0';
		}
		
		echo json_encode($result);


	}


}

/* End of file Daftar.php */
/* Location: ./application/controllers/Daftar.php */