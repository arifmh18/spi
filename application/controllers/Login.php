<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if (!empty($this->session->userdata('username'))) 
		{
			redirect('dashboard');
		}
		else
		{
			$this->load->view('login');
		}
	}

	public function auth()
	{
		$e = $this->input->post('email');
		$p = $this->input->post('password');

		$this->load->model('LoginModel');
		$this->LoginModel->authen($e,$p);
	}

	public function out()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function registrasi()
	{
		$data['jurusan'] = $this->m_global->get_data_all('jurusan');
		$this->load->view('registrasi',$data);
	}
	public function act_registrasi()
	{
		$post = $this->input->post();
		$level = $post['level'];

		// $this->form_validation->set_rules('induk', 'No induk', 'trim|required|numeric|min_length[18]|max_length[18]');
		if ($level == 'guru') {
			$this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric|min_length[18]|max_length[18]');
			$no_induk = $post['nip'];
		}
		if ($level == 'siswa') {
			$this->form_validation->set_rules('nis', 'NIS', 'trim|required|numeric|min_length[4]|max_length[10]');
			$no_induk = $post['nis'];
		}
		if ($level == 'industri') {
			$this->form_validation->set_rules('npwp', 'NPWP', 'trim|required|numericv|min_length[15]|max_length[15]');
			$no_induk = $post['npwp'];
		}
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
				'no_induk' => $no_induk,
				'username' => $post['username'],
				'password' => md5($post['password']),
				'email' => $post['email'],
				'nama_lengkap' => $post['nama_lengkap'],
				'hp' => $post['no'],
				'domisili' => $post['domisili'],
				'alamat' => $post['alamat'],
				'avatar' => 'user-default.png',
				'level' => $level,
				'created_at' => $hari.', '.$tgl,
				'status' => '0',
				'jurusan' => $post['jurusan']
				);
			$proses = $this->m_global->insert('user', $data);
			if($proses) {
				$result['msg'] = 'Data berhasil ditambahkan ! <br> Silahkan menunggu konfirmasi dari admin untuk masuk sistem';
				$result['sts'] = '1';
			} 
			else {
				$result['msg'] = 'Data gagal ditambahkan !';
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

/* End of file Login */
/* Location: ./application/controllers/Login */