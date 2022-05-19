<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tema extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		if ($this->session->userdata("id_user") == NULL) 
		{
			redirect('admin/welcome');
		}

		// $this->load->view('component/v_dashboard');
	}
    public function index()
	{
		$id_user = $this->session->userdata('id_user');	
		$this->load->view('admin/template/header_admin');
		$data['data_user']			= $this->admin_model->get_dataById($id_user);
        $data['tema'] 				= $this->admin_model->get_tema()->result();
		$this->load->view('admin/template/navigation_admin',$data);
        $this->load->view('admin/tema', $data);
		$this->load->view('admin/template/footer_admin');
	}
	// public function v_dashboard()
	// {
		// 	$this->load->view('admin/template/header_admin');
		// 	// $this->load->view('admin/template/navigation_admin');
		// 	$data['data_lokasi'] 		= $this->admin_model->tampil_data_lokasi()->result_array();
		// 	$data['data_kecelakaan'] 	= $this->admin_model->get_data_kecelakaan();
		// 	$data['data_laka']			= $this->admin_model->tampil_data_kecelakaan()->result_array();
		// 	// $data['data_by_id']			= $this->admin_model->get_dtkec()->result_array();
		// 	$data['data_kecamatan'] 	= $this->db->get('tb_kecamatan')->result_array();
		// 	$data['data_kelurahan'] 	= $this->db->get('tb_kelurahan')->result_array();
		// 	// $data['data_all'] 			= $this->db->query("SELECT * FROM tb_kecelakaan WHERE id_kecelakaan = '$id'")->result_array();
			
		// 	$this->load->view('admin/template/v_dashboard',$data);
		// 	$this->load->view('admin/template/footer_admin');
	// }
    public function edit_tema()
    {
		$data = $this->input->post('semi');

		$kode_tema = substr($data, -1);

		$data2 = substr($data, 0, -1);
		
		$semi1 = strstr($data2, '_', true);
        $semi2 = substr($data2, strpos($data2, "_") + 1);

		$update = array(
			'kode_tema'			=> $kode_tema,
			'tema_navigation' 	=> $semi1,
			'tema_body' 		=> $semi2,
		);

		$where = array('id_tema' => 4);

		$this->db->update('tb_tema', $update, $where);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}