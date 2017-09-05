<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AR_Controller extends CI_Controller {

	public function notif_aktif($tabel, $guru, $siswa, $industri)
	{
		$data['jumlah'] = count($this->m_global->get_data_all($tabel, null, ['status' =>'0']));
		$data['jml_guru'] = count($this->m_global->get_data_all($tabel, null, ['level'=> $guru,'status' =>'0']));
		$data['jml_siswa'] = count($this->m_global->get_data_all($tabel, null, ['level'=> $siswa,'status' =>'0']));
		$data['jml_industri'] = count($this->m_global->get_data_all($tabel, null, ['level'=> $industri,'status' =>'0']));

		return $data;
	}

	

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */