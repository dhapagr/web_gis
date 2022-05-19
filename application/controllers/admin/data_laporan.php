<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_laporan extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		if ($this->session->userdata("id_user") == NULL) 
		{
			redirect('admin/welcome');
		}
	}
    public function index()
	{
		$id_user = $this->session->userdata('id_user');		
		$data['data_user']			= $this->admin_model->get_dataById($id_user);
		$this->load->view('admin/template/header_admin');
		$this->load->view('admin/template/navigation_admin',$data);
		$this->load->view('admin/data_laporan');
		$this->load->view('admin/template/footer_admin');
	}
}