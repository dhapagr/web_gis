<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_dtkecelakaan extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		if ($this->session->userdata("id_user") == NULL) 
		{
			redirect('admin/Welcome');
		}

		// $this->load->view('component/v_dashboard');

	}
    public function index()
	{
		$this->load->view('admin/template/header_admin');
		// $this->load->view('admin/template/navigation_admin');
		$data['data_lokasi'] 		= $this->admin_model->tampil_data_lokasi()->result_array();
		$data['data_kecelakaan'] 	= $this->db->get('tb_kecelakaan')->result_array();
		$data['data_wilayah']		= $this->admin_model->tampil_data_kecelakaan()->result_array();
		$data['data_kecamatan'] 	= $this->db->get('tb_kecamatan')->result_array();
		// $test['edit_data'] = $this->db->query("SELECT * FROM tb_kecelakaan WHERE id_kecelakaan = '$id'")->result_array();
		$this->load->view('admin/template/v_addkecelakaan',$data);
		$this->load->view('admin/template/footer_admin');
	}
	function edit($id)
	{
		$data= $this->db->query("SELECT * FROM tb_kecelakaan WHERE id_kecelakaan = '$id'")->result_array();
		redirect('admin/Edit_dtkecelakaan', $data);
	}
}