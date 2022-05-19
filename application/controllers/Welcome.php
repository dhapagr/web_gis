<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		// if ($this->session->userdata("id_user") == NULL) 
		// {
		// 	redirect('admin/welcome');
		// }
	}
	public function index()
	{
		// $data['data_user']			= $this->admin_model->get_dataById($id_user);
		$data['data_lokasi'] 		= $this->admin_model->tampil_data_lokasi()->result_array();
		$data['data_kecelakaan'] 	= $this->admin_model->tampil_data_kecelakaan()->result_array();
		$data['data_kecamatan'] 	= $this->db->get('tb_kecamatan')->result_array();
		$this->load->view('user/template/header');
		$this->load->view('user/welcome_message', $data);
		$this->load->view('user/template/footer');
	}
}
