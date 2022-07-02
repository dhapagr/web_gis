<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		if ($this->session->userdata("role_user") != 'admin') 
		{
			redirect('admin/Welcome');
		}
		date_default_timezone_set('Asia/Jakarta');
		// $this->load->view('component/v_dashboard');
	}
    public function index()
	{
		$id_user = $this->session->userdata('id_user');		
		// $this->load->view('admin/template/navigation_admin',$data);
		$this->load->view('admin/template/header_admin');
		// $data['data_kecamatan']	= $this->Admin_model->tampil_data_kecamatan()->result_array();
		$data['data_user']			= $this->Admin_model->get_dataById($id_user);
		$data['data_berita'] 	    = $this->db->get('tb_berita')->result_array();
		$this->load->view('admin/template/navigation_admin', $data);
		$this->load->view('admin/berita', $data);
		$this->load->view('admin/template/footer_admin');
	}
	public function add()
	{
		$id_user = $this->session->userdata('id_user');		
		// $this->load->view('admin/template/navigation_admin',$data);
		$this->load->view('admin/template/header_admin');
		$data['dt_tag'] 	= $this->db->get('tb_tag')->result_array();
		$data['data_user']			= $this->Admin_model->get_dataById($id_user);
		$this->load->view('admin/template/navigation_admin', $data);
		$this->load->view('admin//template/v_addberita', $data);
		$this->load->view('admin/template/footer_admin');
	} 
	public function tambah_berita()
	{
		$foto 	= $_FILES['file_berita']['name'];
		// $ext_foto 		= pathinfo($foto, PATHINFO_EXTENSION);
		// $nama_foto 		= 'foto_' . $id_user . '.' . $ext_foto;
		$image_path		= './assets/admin/images/berita';
		$config['upload_path'] 			= $image_path;
		$config['allowed_types']		= 'jpg|jpeg|png|JPG|JPEG|PNG';
		$config['file_name'] 			= $foto;
		$config['max_size'] 			= 5000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('file_berita');
	
		$foto_berita = array(
			'foto_user' => $foto,
		);
		// // $where = array('id_user' => $id );
		// $this->db->update('tb_user', $foto_update, $where);
		if ($this->input->post('tag')!=''){
			$tag_seo = $this->input->post('tag');
			$tag=implode(',',$tag_seo);
			$data = array(
				'judul_berita' 		=> $this->input->post('judul'),
				'sub_judul' 		=> $this->input->post('sub_judul'),
				'video_berita' 		=> $this->input->post('video'),
				'foto_berita' 		=> $foto,
				'keterangan_berita' => $this->input->post('keterangan'),
				'isi_berita' 		=> $this->input->post('isi_berita'),
				'tag_berita' 		=> $tag,
				'created_at'		=> date('Y-m-d H:i:s'),
				'status' 			=> 1,
			);
		}		
		else{
			redirect(base_url("admin/Berita/add"));
		}
		
		// echo "<pre>"; var_dump($data);
		// exit;
		$table = "tb_berita";
		$this->Admin_model->insert_table($table ,$data);
		$this->session->set_flashdata('test', 
				'<script>swal("Sukses","Data berhasil ditambahkan","success");</script>');
		redirect(base_url("admin/Berita"));
	} 
	public function edit($id)
	{
		$id_user = $this->session->userdata('id_user');		
		// $this->load->view('admin/template/navigation_admin',$data);
		$this->load->view('admin/template/header_admin');
		$data['dt_tag'] 			= $this->db->get('tb_tag')->result_array();
		$test			 			= $this->Admin_model->get_dtberita($id)->result_array();
		foreach($test as $tst)
		{
			$select	= $tst['tag_berita'];
		}
		
		$data['select']				= $this->Admin_model->select($select);
		// echo "<pre>"; print_r($data['select']);
		// exit;
		$data['data_by_id']			= $this->Admin_model->get_dtberita($id)->result_array();
		$data['data_user']			= $this->Admin_model->get_dataById($id_user);
		$this->load->view('admin/template/navigation_admin', $data);
		$this->load->view('admin//template/v_editberita', $data);
		$this->load->view('admin/template/footer_admin');
	} 
	public function edit_berita($id)
	{	
		$tag_seo = $this->input->post('tag');
		$tag=implode(',',$tag_seo);

		if ($this->input->post('tag')!='')
		{
			$data = array(
				'judul_berita' 		=> $this->input->post('judul'),
				'sub_judul' 		=> $this->input->post('sub_judul'),
				'video_berita' 		=> $this->input->post('video'),
				'keterangan_berita' => $this->input->post('keterangan'),
				'isi_berita' 		=> $this->input->post('isi_berita'),
				'tag_berita' 		=> $tag,
				'status' 			=> 1,
			);
			$where 	= array('id_berita' => $id );
			$post	= $this->db->update('tb_berita', $data, $where);
			if ($post) {
				if ($_FILES['file_berita']['name'] == '') {
				} else {
					$foto 	= $_FILES['file_berita']['name'];
					$image_path		= './assets/admin/images/berita';
					$config['upload_path'] 			= $image_path;
					$config['allowed_types']		= 'jpg|jpeg|png|JPG|JPEG|PNG';
					$config['file_name'] 			= $foto;
					$config['max_size'] 			= 5000;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload('file_berita');
					
					$foto_update = array(
						'foto_berita' => $foto,
					);
					$where = array('id_berita' => $id );
					$this->db->update('tb_berita', $foto_update, $where);
				}
				// echo "<pre>"; var_dump($_FILES['file_berita']);
				// exit;
			}
			// echo "<pre>"; var_dump($tag);
			// exit;
		}		
		else{
			$data = array(
				'judul_berita' 		=> $this->input->post('judul'),
				'sub_judul' 		=> $this->input->post('sub_judul'),
				'video_berita' 		=> $this->input->post('video'),
				'keterangan_berita' => $this->input->post('keterangan'),
				'isi_berita' 		=> $this->input->post('isi_berita'),
				'tag_berita' 		=> $tag,
				'status' 			=> 1,
			);
			$where 	= array('id_berita' => $id );
			$post	= $this->db->update('tb_berita', $data, $where);
			if ($post) {
				if ($_FILES['file_berita']['name'] == '') {
				} else {
					$foto 	= $_FILES['file_berita']['name'];
					$image_path		= './assets/admin/images/berita';
					$config['upload_path'] 			= $image_path;
					$config['allowed_types']		= 'jpg|jpeg|png|JPG|JPEG|PNG';
					$config['file_name'] 			= $foto;
					$config['max_size'] 			= 5000;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload('file_berita');

					$foto_update = array(
						'foto_berita' => $foto,
					);
					$where = array('id_berita' => $id );
					$this->db->update('tb_berita', $foto_update, $where);
				}
				// echo "<pre>"; var_dump($_FILES['file_berita']);
				// exit;
			}
			// echo "<pre>"; var_dump($tag);
			// exit;
		}
		$where = array('id_berita' => $id );
		// echo "<pre>"; var_dump($data);
		// exit;
		$this->db->update('tb_berita', $data, $where);
		$this->session->set_flashdata('test', 
		'<script>
			Swal.fire({
				position:	"top-center-start",
				icon: "success",
				title: "Data Berhasil Diubah",
				showConfirmButton: false,
				timer: 2000,
				confirmButtonClass: "btn btn-primary",
				buttonsStyling: false,
			})
		</script>');
		redirect('admin/Berita');
	}
	function hapus($id){
		$where = array('id_berita' => $id);
		$this->db->delete('tb_berita', $where);
		$this->Admin_model->hapus_data($where,'tb_berita');
		$this->session->set_flashdata('test', 
		'<script>
			Swal.fire({
				position:	"top-center-start",
				icon: "success",
				title: "Data Berhasil Dihapus",
				showConfirmButton: false,
				timer: 2000,
				confirmButtonClass: "btn btn-primary",
				buttonsStyling: false,
			})
		</script>');
		redirect('admin/Berita');
	}
	public function status($id_berita)
	{	
		$data 			= $this->db->get_where('tb_berita', array('id_berita' => $id_berita))->result_array();
		foreach($data as $dt)
		{
			// $dt['status'];	
			if($dt['status'] == 1)
			{
				$upload = array('status'	=> 0,);
				$xyz = 0;
			}
			else{
				$upload = array('status' 	=> 1,);
				$xyz = 1;
			}
		}
		echo $xyz;
		$where = array('id_berita' => $id_berita );
		$this->db->update('tb_berita', $upload, $where);
	}
}