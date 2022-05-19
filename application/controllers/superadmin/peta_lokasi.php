<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta_lokasi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
		$data['data_lokasi'] 		= $this->superadmin_model->tampil_data_lokasi()->result_array();
		$this->load->view('superadmin/template/navigation_admin', $data);
		$this->load->view('superadmin/peta_lokasi', $data);
		$this->load->view('superadmin/template/footer_admin');
		
	}
	
}
