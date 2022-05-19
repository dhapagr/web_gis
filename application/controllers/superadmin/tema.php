<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tema extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('superadmin_model');
		if ($this->session->userdata("role_user") != "superadmin") 
		{
			redirect('admin/welcome');
		}
		// $this->load->view('component/v_dashboard');
	}
    public function index()
	{
		$id_user = $this->session->userdata('id_user');	
		$this->load->view('admin/template/header_admin');
		$data['data_user']			= $this->superadmin_model->get_dataById($id_user);
        $data['tema'] 				= $this->superadmin_model->get_tema()->result();
		$this->load->view('superadmin/template/navigation_admin',$data);
        $this->load->view('superadmin/tema', $data);
		$this->load->view('superadmin/template/footer_admin');
	}
	
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