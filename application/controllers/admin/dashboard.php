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
		$this->load->model('Admin_model');
		if ($this->session->userdata("id_user") == NULL) 
		{
			redirect('admin/Welcome');
		}
		// $this->load->view('component/v_dashboard');

	}
	public function index()
	{
		$id_user = $this->session->userdata('id_user');		
		$this->load->view('admin/template/header_admin');
		$data['data_user']			= $this->admin_model->get_dataById($id_user);
		$data['dt_kecelakaan'] 		= $this->admin_model->tampil_data_kecelakaan()->num_rows();
		$data['dt_kelurahan'] 		= $this->admin_model->tampil_data_kelurahan()->num_rows();
		// echo "<pre>"; var_dump($data['data_user']);
		// exit;
		$this->load->view('admin/template/navigation_admin',$data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/template/footer_admin');
	}
	
}
		// $id_user = $this->session->userdata('id_user');		
		// $data['data_user']			= $this->admin_model->get_dataById($id_user);
		// $this->load->view('admin/template/navigation_admin',$data);