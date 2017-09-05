<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function authen($e, $p)
	{
		$pass = md5($p);
		$this->db->where('email', $e);
		$this->db->where('password', $pass);
		$this->db->where('status', '1');
		$query = $this->db->get('user');

		if ($query->num_rows()>0) 
		{
			foreach ($query->result() as $row) 
			{
				$sess = array('username' => $row->username,
							// 'password' => $row->password,
							'id' => $row->id,
							'nama_lengkap' => $row->nama_lengkap,
							// 'email' => $row->email,
							'level' => $row->level,
							'status' => $row->status,
							'avatar' => $row->avatar 
							);
				
				$this->session->set_userdata($sess);
				redirect('dashboard');
			}
		}
		else
		{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> Maaf <strong>Email atau Password </strong> anda salah. <br>Atau akun anda belum diaktifkan</div>');
			redirect('login');
		}
	}
}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */