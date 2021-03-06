<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends AR_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->SecurityModel->auth();
		$this->SecurityModel->admin();
	}

	public function index()
	{
		$data = $this->notif_aktif('user', 'guru', 'siswa', 'industri');
		$data['title'] = 'Panel siswa | SI Prakerin';
		$data['judul'] = 'Panel siswa';
		$data['breadcumb'] = '<li><a href="'.base_url().'dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li><li><i class="fa fa-files-o"></i> Master Data</li><li class="active">siswa</li>';
		$data['view'] = 'master_data/siswa/index';
		$data['siswa'] = $this->m_global->get_data_all('user', [['jurusan', 'jurusan = kd_jurusan']], ['level'=> 'siswa', 'status'=> '1'],'no_induk, nama_lengkap, jurusan, user.id, nama_jurusan');
		$this->load->view('master_template', $data);
		
	}

	public function noaktif()
	{
		$data = $this->notif_aktif('user', 'guru', 'siswa', 'industri');
		$data['title'] = 'siswa Belum Aktif | SI Prakerin';
		$data['judul'] = 'Panel siswa Belum Aktif';
		$data['breadcumb'] = '<li><a href="'.base_url().'dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li><li><i class="fa fa-files-o"></i> Master Data</li><li><a href="'.base_url().'siswa">siswa</a></li><li class="active">Siswa Belum Aktif</li>';
		$data['view'] = 'master_data/siswa/noaktif';
		$data['siswa'] = $this->m_global->get_data_all('user', [['jurusan', 'jurusan = kd_jurusan']], ['level'=> 'siswa', 'status'=> '0'],'no_induk, nama_lengkap, jurusan, user.id, nama_jurusan');
		$this->load->view('master_template', $data);
				
	}

	public function add()
	{
		$data = $this->notif_aktif('user', 'guru', 'siswa', 'industri');
		$data['title'] = 'Tambah siswa | SI Prakerin';
		$data['judul'] = 'Tambah siswa';
		$data['breadcumb'] = '<li><a href="'.base_url().'dashboard"><i class="fa fa-dashboard active"></i> Dashboard</a></li><li><i class="fa fa-files-o"></i> Master Data</li><li><a href="'.base_url().'siswa">siswa</a></li><li class="active">Tambah siswa</li>';
		$data['view'] = 'master_data/siswa/add';
		$data['jurusan'] = $this->m_global->get_data_all('jurusan');

		$this->load->view('master_template', $data);
		
	}

	public function act_add()
	{
		$result = [];
		$post = $this->input->post();

		$this->form_validation->set_rules('induk', 'No induk', 'trim|required|numeric|min_length[18]|max_length[18]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('repass', 'Ulangi Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('no', 'No HP/Telp', 'trim|required|numeric');
		$this->form_validation->set_rules('domisili', 'Kota Domisili', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');

		$tgl = tgl_indo(date('Y-m-d'));
		$hari = nama_hari(date('Y-m-d'));

		if ($this->form_validation->run() == true){
			$data = array(
				'no_induk' => $post['induk'],
				'username' => $post['username'],
				'password' => md5($post['password']),
				'email' => $post['email'],
				'nama_lengkap' => $post['nama_lengkap'],
				'hp' => $post['no'],
				'domisili' => $post['domisili'],
				'alamat' => $post['alamat'],
				'avatar' => 'user-default.png',
				'level' => 'siswa',
				'created_at' => $hari.', '.$tgl,
				'created_by' => $this->session->userdata('id'),
				'jurusan' => $post['jurusan']
				);
			$proses = $this->m_global->insert('user', $data);
			if($proses) {
				$result['msg'] = 'Data siswa berhasil ditambahkan !';
				$result['sts'] = '1';
			} 
			else {
				$result['msg'] = 'Data siswa gagal ditambahkan !';
				$result['sts'] = '0';
			}
		}
		else {
			$result['msg'] = validation_errors();
			$result['sts'] = '0';
		}
		
		echo json_encode($result);


	}

	public function hapus(){
		$id = $this->input->post('id');
		$proses = $this->m_global->delete('user',['id'=>$id]);

		if($proses) {
			$result['msg'] = 'Data siswa berhasil dihapus !';
			$result['sts'] = '1';
		} 
		else {
			$result['msg'] = 'Data siswa gagal dihapus !';
			$result['sts'] = '0';
		}

		echo json_encode($result);
	}

	public function aktif(){
		$id = $this->input->post('id');
		$data = array(
			'status' => '1',
			'update_by' => $this->session->userdata('id')
			);

		$proses = $this->m_global->update('user', $data, ['id'=>$id]);

		if($proses) {
			$result['msg'] = 'Data siswa berhasil diaktifkan !';
			$result['sts'] = '1';
		} 
		else {
			$result['msg'] = 'Data siswa gagal diaktifkan !';
			$result['sts'] = '0';
		}

		echo json_encode($result);
	}

	public function detail($id){
		$data = $this->notif_aktif('user', 'guru', 'siswa', 'industri');
		$data['title'] = 'Detail siswa | SI Prakerin';
		$data['judul'] = 'Detail Data siswa';
		$data['breadcumb'] = '<li><a href="'.base_url().'dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li><li><i class="fa fa-files-o"></i> Master Data</li><li><a href="'.base_url().'siswa">siswa</a></li><li class="active">Detail Data</li>';
		$data['view'] = 'master_data/siswa/detail';

		$data['jurusan'] = $this->m_global->get_data_all('jurusan');
		$data['detail'] = $this->m_global->get_data_all('user', null, [strEncrypt('id', TRUE) => $id]);

		$this->load->view('master_template', $data);

	}

	public function edit($id){
		$data = $this->notif_aktif('user', 'guru', 'siswa', 'industri');
		$data['title'] = 'Edit siswa | SI Prakerin';
		$data['judul'] = 'Edit Data siswa';
		$data['breadcumb'] = '<li><a href="'.base_url().'dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li><li><i class="fa fa-files-o"></i> Master Data</li><li><a href="'.base_url().'siswa">siswa</a></li><li class="active">Edit Data</li>';
		$data['view'] = 'master_data/siswa/edit';

		$data['detail'] = $this->m_global->get_data_all('user', null, [strEncrypt('id', TRUE) => $id]);
		$data['jurusan'] = $this->m_global->get_data_all('jurusan');

		$this->load->view('master_template', $data);

	}

	public function act_edit($id)
	{
		$result = [];
		$post = $this->input->post();
		$password = $post['password'];

		$this->form_validation->set_rules('induk', 'No induk', 'trim|required|numeric|min_length[18]|max_length[18]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('no', 'No HP/Telp', 'trim|required|numeric');
		$this->form_validation->set_rules('domisili', 'Kota Domisili', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
		if (!empty($password)) {
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('repass', 'Ulangi Password', 'trim|required|matches[password]');			
		}

		$tgl = tgl_indo(date('Y-m-d'));
		$hari = nama_hari(date('Y-m-d'));

		if ($this->form_validation->run() == true){
			if ($password == '') {
				$data = array(
					'no_induk' => $post['induk'],
					'username' => $post['username'],
					'email' => $post['email'],
					'nama_lengkap' => $post['nama_lengkap'],
					'hp' => $post['no'],
					'domisili' => $post['domisili'],
					'alamat' => $post['alamat'],
					'update_at' => $hari.', '.$tgl,
					'update_by' => $this->session->userdata('id'),
					'jurusan' => $post['jurusan']
					);
			}
			else{
				$data = array(
					'no_induk' => $post['induk'],
					'username' => $post['username'],
					'password' => md5($post['password']),
					'email' => $post['email'],
					'nama_lengkap' => $post['nama_lengkap'],
					'hp' => $post['no'],
					'domisili' => $post['domisili'],
					'alamat' => $post['alamat'],
					'update_at' => $hari.', '.$tgl,
					'update_by' => $this->session->userdata('id'),
					'jurusan' => $post['jurusan']
					);				
			}
			$x = $this->m_global->get_data_all('user', null, ['no_induk' => $data['no_induk']]);
			if($x) {
				if(strEncrypt($x[0]->id) !== $id) {
					$result['msg'] = 'No Induk sudah ada !';
					$result['sts'] = '0';
				}
				else{
					$proses = $this->m_global->update('user', $data, [strEncrypt('id', TRUE) => $id]);
					if($proses) {
						$result['msg'] = 'Data siswa berhasil perbarui !';
						$result['sts'] = '1';
					} 
					else {
						$result['msg'] = 'Data siswa gagal perbarui !';
						$result['sts'] = '0';
					}
				}
			}
			else{
				$proses = $this->m_global->update('user', $data, [strEncrypt('id', TRUE) => $id]);
				if($proses) {
					$result['msg'] = 'Data siswa berhasil perbarui !';
					$result['sts'] = '1';
				} 
				else {
					$result['msg'] = 'Data siswa gagal perbarui !';
					$result['sts'] = '0';
				}
			}
		}
		else {
			$result['msg'] = validation_errors();
			$result['sts'] = '0';
		}
		
		echo json_encode($result);


	}

}

/* End of file siswa.php */
/* Location: ./application/controllers/siswa.php */