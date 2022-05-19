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
		$data['data_lokasi'] 		= $this->admin_model->tampil_data_lokasi()->result_array();
		$this->load->view('admin/template/navigation_admin', $data);
		$this->load->view('admin/peta_lokasi', $data);
		$this->load->view('admin/template/footer_admin');
		
	}

	function update_lokasi()
	{
		$data = array(
			'longitude' => $this->input->post('longitude'),
			'latitude' => $this->input->post('latitude'),
			'ketinggian' => $this->input->post('height'),
		);
		$this->admin_model->update_table('tb_lokasi', $data, array('id_lokasi' => 1));
		$this->session->set_flashdata('success', 
		'<script>
			Swal.fire({
				position:	"top-center-start",
				icon: "success",
				title: "Data Berhasil Ditambah",
				showConfirmButton: false,
				timer: 2000,
				confirmButtonClass: "btn btn-primary",
				buttonsStyling: false,
			})
		</script>');
		redirect('admin/peta_lokasi');
	}
}
