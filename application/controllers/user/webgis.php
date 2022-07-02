<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webgis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}
	
	public function index()
	{
		// $data['data_user']			= $this->User_model->get_dataById($id_user);
		$data['data_lokasi'] 		= $this->User_model->tampil_data_lokasi()->result_array();
		$data['data_kecelakaan'] 	= $this->User_model->tampil_data_kecelakaan()->result_array();
		$data['data_kecamatan'] 	= $this->db->get('tb_kecamatan')->result_array();

		$data['data_rawan'] 		= $this->User_model->titik_rawan();
		$data['data_sedang'] 		= $this->User_model->titik_sedang();
		$data['data_ringan'] 		= $this->User_model->titik_ringan();
		$this->load->view('user/template/header');
		$this->load->view('user/template/webgis_tmp', $data);
		$this->load->view('user/template/footer');

		// $ll = $this->User_model->tampil_data_kecelakaan()->result_array();
		// echo json_encode($ll);
	}
	public function filter_kecamatan($kecelakaan)
	{
		$data['data_kecelakaan']	= $this->User_model->get_filter_kec($kecelakaan)->result_array();
		
		echo json_encode($data); 
	}
	public function filter_kelurahan($kecelakaan)
	{
		$data['data_kecelakaan'] 	= $this->User_model->get_filter_kel($kecelakaan)->result_array();
		echo json_encode($data); 
	}
	public function getKel()
	{
		$id_kecamatan = $this->input->post('kecamatan');
		if ($id_kecamatan != null) {
			$kelurahan = $this->User_model->get_kelurahan_where($id_kecamatan)->result_array();
			$drop = '<option hidden>Pilih Kelurahan</option>';
			foreach ($kelurahan as $kel) {
				$drop = $drop . '<option value="' . $kel['id_kelurahan'] . '">' . $kel['nama_kelurahan'] . '</option>';
			}
			echo $drop;
		}

		// var_dump($filterCity);
	}
}
