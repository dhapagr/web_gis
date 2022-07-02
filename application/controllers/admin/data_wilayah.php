<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_wilayah extends CI_Controller {

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
		$d['data_user']				= $this->Admin_model->get_dataById($id_user);
		$d['data_kecamatan']		= $this->Admin_model->tampil_data_kecamatan()->result_array();
		$d['data_kelurahan']		= $this->Admin_model->tampil_data_kelurahan()->result_array();
		$d['data_wilayah']			= $this->Admin_model->tampil_data_wilayah()->result_array();
		$d['kec_taman']					= $this->Admin_model->tampil_data_KecTaman()->result_array();
		$d['kec_mangu']					= $this->Admin_model->tampil_data_Kecmanguharjo()->result_array();
		$d['kec_karto']					= $this->Admin_model->tampil_data_KecKartoharjo()->result_array();
		$this->load->view('admin/template/navigation_admin',$d);
		//echo "<pre>"; print_r($d); exit;
		$this->load->view('admin/data_wilayah', $d);
		$this->load->view('admin/template/footer_admin');
	
	}
	public function tambah_data_wilayah()
	{
		$data = array(
			'id_kecamatan' => $this->input->post('kecamatan'),
			'nama_kelurahan' => $this->input->post('kelurahan'),
		);
		$table = "tb_kelurahan";
		$this->Admin_model->insert_table($table, $data);
		$this->session->set_flashdata('test', 
				'<script>swal("Sukses","Data berhasil ditambahkan","success");</script>');
		redirect(base_url("admin/Data_wilayah"));
	}
	// function hapus_data_wilayah($id_data = true)
	// {
	// 	$this->Admin_model->delete_table('tb_kelurahan', array('id_kelurahan' => $id_data));
	// 	$this->session->set_flashdata('test', 
	// 			'<script>swal("Sukses","Data berhasil ditambahkan","success");</script>');
	// 	redirect('admin/data_wilayah');
	// }
	function hapus($id){
		$where = array('id_kelurahan' => $id);
		$this->db->delete('tb_kelurahan', $where);
		$this->Admin_model->hapus_data($where,'tb_kelurahan');
		$this->session->set_flashdata('test', 
				'<script>swal("Sukses","Data berhasil dihapus","success");</script>');
		redirect('admin/Data_wilayah');
	}
	function update_data_wilayah($id)
	{
		$data = array(
			'id_kecamatan' => $this->input->post('kec'),
			'nama_kelurahan' => $this->input->post('kel'),
		); 
		$this->db->update('tb_kelurahan', $data, array('id_kelurahan' => $id ));
		// $this->Admin_model->update_table('tb_kelurahan', $data, array('id_kelurahan' => $id ));
		// $this->session->set_flashdata('item', '<div class="btn btn-outline-success mr-1 mb-1" id="progress-bar"></div>');
		redirect('admin/Data_wilayah');
	}
}