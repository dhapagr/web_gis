<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		if ($this->session->userdata("role_user") != 'admin') 
		{
			redirect('admin/Welcome');
		}
		// $this->load->view('component/v_dashboard');
	}
    public function index()
	{
		$id_user = $this->session->userdata('id_user');		
		// $this->load->view('admin/template/navigation_admin',$data);
		$this->load->view('admin/template/header_admin');
		// $data['data_kecamatan']	= $this->Admin_model->tampil_data_kecamatan()->result_array();
		$data['data_user']			= $this->Admin_model->get_dataById($id_user);
        $data['data_tag'] 	        = $this->db->get('tb_tag')->result_array();
		$this->load->view('admin/template/navigation_admin', $data);
		$this->load->view('admin//template/v_tag', $data);
		$this->load->view('admin/template/footer_admin');
	}
    public function add()
	{
		$data = array(
			'nama_tag' 		=> $this->input->post('tag')
        );
        $table = "tb_tag";
		$this->Admin_model->insert_table($table, $data);
		$this->session->set_flashdata('test', 
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
		redirect(base_url("admin/Tag"));
	}
    function hapus($id){
		$where = array('id_tag' => $id);
		$this->db->delete('tb_tag', $where);
		// $this->superAdmin_model->hapus_data($where,'tb_user');
		$this->session->set_flashdata('test', 
				'<script>
					Swal.fire({
						position: "top-center-start",
						icon: "success",
						title: "Data Telah Dihapus",
						showConfirmButton: false,
						timer: 2000,
						confirmButtonClass: "btn btn-primary",
						buttonsStyling: false,
					})
				</script>');
		redirect('admin/Tag');
	}
}