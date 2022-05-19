<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		// $this->load->model('superadmin_model');
		if ($this->session->userdata("role_user") != "superadmin") 
		{
			redirect('admin/welcome');
		}
		// $this->load->view('component/v_dashboard');
	}
	public function index()
	{
		$id_user = $this->session->userdata('id_user');	
		$data['data_user']			= $this->superadmin_model->get_dataById($id_user);
		$data['tema'] 				= $this->superadmin_model->get_tema()->result();
		$data['dt_kecelakaan'] 		= $this->superadmin_model->tampil_data_kecelakaan()->num_rows();
		$data['dt_kelurahan'] 		= $this->superadmin_model->tampil_data_kelurahan()->num_rows();
		$this->load->view('superadmin/template/header_admin');
		$this->load->view('superadmin/template/navigation_admin', $data);
		$this->load->view('superadmin/dashboard', $data);
		$this->load->view('superadmin/template/footer_admin');
	}
	
}
