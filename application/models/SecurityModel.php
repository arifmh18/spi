<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SecurityModel extends CI_Model {

	public function auth()
	{
		$username = $this->session->userdata('username');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('Login');
		}

	}

	public function admin()
	{
		if ($this->session->userdata('level') !== 'admin') {
			redirect('Error');
		}
	}
}

/* End of file SecurityModel */
/* Location: ./application/models/SecurityModel */