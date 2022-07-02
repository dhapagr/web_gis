<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta_kecelakaan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * http://example.com/index.php/welcome
	 *	- or -
	 * http://example.com/index.php/welcome/index
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
		$this->load->model('Superadmin_model');
		if ($this->session->userdata("role_user") != "superadmin") 
		{
			redirect('admin/Welcome');
		}
        // $this->load->view('component/v_dashboard');
	}
    public function index()
	{
		$id_user = $this->session->userdata('id_user');	
		$data['data_user']			= $this->superadmin_model->get_dataById($id_user);
		$data['data_lokasi'] 		= $this->superadmin_model->tampil_data_lokasi()->result_array();
		$data['data_kecelakaan'] 	= $this->superadmin_model->tampil_data_kecelakaan()->result_array();
		$data['data_kecamatan'] 	= $this->db->get('tb_kecamatan')->result_array();
		$data['content']			= 'admin/template/v_datakecelakaan';
		
        $this->load->view('superadmin/template/header_admin');
        $this->load->view('superadmin/template/navigation_admin', $data);
        $this->load->view('superadmin/peta_kecelakaan', $data);
        $this->load->view('superadmin/template/footer_admin');
		
	}
	public function filter_kecamatan($kecelakaan)
	{
		$data['data_kecelakaan']	= $this->superadmin_model->get_filter_kec($kecelakaan)->result_array();
		
		echo json_encode($data); 
	}
	public function filter_kelurahan($kecelakaan)
	{
		$data['data_kecelakaan'] 	= $this->superadmin_model->get_filter_kel($kecelakaan)->result_array();
		echo json_encode($data); 
	}
	public function getKel()
	{
		$id_kecamatan = $this->input->post('kecamatan');
		if ($id_kecamatan != null) {
			$kelurahan = $this->superadmin_model->get_kelurahan_where($id_kecamatan)->result_array();
			$drop = '<option hidden>Pilih Kelurahan</option>';
			foreach ($kelurahan as $kel) {
				$drop = $drop . '<option value="' . $kel['id_kelurahan'] . '">' . $kel['nama_kelurahan'] . '</option>';
			}
			echo $drop;
		}

		// var_dump($filterCity);
	}
}