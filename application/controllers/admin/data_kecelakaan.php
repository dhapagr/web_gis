<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kecelakaan extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		if ($this->session->userdata("role_user") != 'admin') 
		{
			redirect('admin/welcome');
		}
		// $this->load->view('component/v_dashboard');

	}
    public function index()
	{
		$id_user = $this->session->userdata('id_user');		
		// $this->load->view('admin/template/navigation_admin',$data);
		$this->load->view('admin/template/header_admin');
		// $data['data_kecamatan']	= $this->admin_model->tampil_data_kecamatan()->result_array();
		$data['data_user']			= $this->admin_model->get_dataById($id_user);
		$data['data_lokasi'] 		= $this->admin_model->tampil_data_lokasi()->result_array();
		$data['data_kecelakaan'] 	= $this->db->get('tb_kecelakaan')->result_array();
		$data['data_wilayah']		= $this->admin_model->tampil_data_kecelakaan()->result_array();
		$data['data_kecamatan'] 	= $this->db->get('tb_kecamatan')->result_array();

		$this->load->view('admin/template/navigation_admin', $data);
		$this->load->view('admin/data_kecelakaan', $data);
		$this->load->view('admin/template/footer_admin');
	}
	public function tambah_data()
	{
		$prosentase 			= $this->input->post('meninggal');
		if($prosentase == 1)
			{$value = 'ringan';}
		elseif($prosentase == 2)
			{$value = 'sedang';}
		elseif($prosentase >= 3)
			{$value = 'berat';}
		// endif;
		$data = array(
			'nama_jalan' 		=> $this->input->post('jalan'),
			'longitude' 		=> $this->input->post('longitude'),
			'latitude' 			=> $this->input->post('latitude'),
			'id_kecamatan' 		=> $this->input->post('kecamatan'),
			'id_kelurahan' 		=> $this->input->post('kelurahan'),
			'jumlah_kecelakaan' => $this->input->post('jumlah_kec'),
			'meninggal_dunia' 	=> $this->input->post('meninggal'),
			'luka_berat' 		=> $this->input->post('luka_berat'),
			'luka_ringan' 		=> $this->input->post('luka_ringan'),
			'kerugian_materi' 	=> $this->input->post('kermat'),
			'id_waktu'		 	=> $this->input->post('waktu'),
			'id_jenis'		 	=> $this->input->post('jenis_kendaraan'),
			'id_profesi'	 	=> $this->input->post('profesi'),
			'id_umur'		 	=> $this->input->post('umur'),
			'id_type' 			=> $this->input->post('type'),
			'prosentase'		=> $value,
		);
		// echo "<pre>"; var_dump($data);
		// exit;
		$table = "tb_kecelakaan";
		$this->admin_model->insert_table($table, $data);
		$this->session->set_flashdata('test', 
				'<script>swal("Sukses","Data berhasil ditambahkan","success");</script>');
		redirect(base_url("admin/data_kecelakaan"));
	}
	function hapus($id){
		$where = array('id_kecelakaan' => $id);
		$this->db->delete('tb_kecelakaan', $where);
		$this->admin_model->hapus_data($where,'tb_kecelakaan');
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
		redirect('admin/data_kecelakaan');
	}

	function edit($id)
	{
		// $where = $this->db->where('id_kecelakaan',$id);
		$id_user = $this->session->userdata('id_user');		
		$this->load->view('admin/template/header_admin');
		$data['data_user']			= $this->admin_model->get_dataById($id_user);
		$data['data_lokasi'] 		= $this->admin_model->tampil_data_lokasi()->result_array();
		$data['data_kecelakaan'] 	= $this->admin_model->get_data_kecelakaan();
		$data['data_laka']			= $this->admin_model->tampil_data_kecelakaan()->result_array();
		$data['data_by_id']			= $this->admin_model->get_dtkec2($id)->result_array();
		$data['data_kecamatan'] 	= $this->db->get('tb_kecamatan')->result_array();
		$data['data_kelurahan'] 	= $this->db->get('tb_kelurahan')->result_array();
		$data['data_waktu']		 	= $this->db->get('tb_wkt')->result_array();
		$data['data_kendaraan']		= $this->db->get('tb_jeniskendaraan')->result_array();
		$data['data_profesi']		= $this->db->get('tb_profesikorban')->result_array();
		$data['data_umur']			= $this->db->get('tb_umurkorban')->result_array();
		$data['data_type']			= $this->db->get('tb_typekejadian')->result_array();
		$data['data_all'] 			= $this->db->query("SELECT * FROM tb_kecelakaan WHERE id_kecelakaan = '$id'")->result_array();
		$this->load->view('admin/template/navigation_admin', $data);
		$this->load->view('admin/template/v_edit_dt_kecelakaan', $data); 
		$this->load->view('admin/template/footer_admin');
	}

	function update($id)
	{
		$nama_jalan 			= $this->input->post('jalan_edit');
		$lng 					= $this->input->post('lng_edit');
		$lat 					= $this->input->post('lat_edit');
		$kecamatan 				= $this->input->post('kecamatan_edit');
		$kelurahan 				= $this->input->post('kelurahan_edit');
		$jumlah_kec 			= $this->input->post('jumlah_kec');
		$meninggal_dunia 		= $this->input->post('md_edit');
		$luka_berat 			= $this->input->post('lb_edit');
		$luka_ringan 			= $this->input->post('lk_edit');
		$number 				= $this->input->post('kermat_edit');
		$waktu 					= $this->input->post('waktu');
		$jenis_kendaraan 		= $this->input->post('jenis_kendaraan');
		$profesi 				= $this->input->post('profesi');
		$umur 					= $this->input->post('umur');
		$type 					= $this->input->post('type');
		$format 				= str_replace(".","",$number);
		$prosentase 			= $meninggal_dunia;
		if($prosentase == 1)
			{$value = 'ringan';}
		elseif($prosentase == 2)
			{$value = 'sedang';}
		elseif($prosentase >= 3)
			{$value = 'berat';}
		// echo "<pre>"; var_dump($kelurahan);
		// exit;

		$cek_perubahan = $this->db->query("SELECT * FROM tb_kecelakaan WHERE id_kecelakaan = '$id'")->result_array();
		foreach($cek_perubahan as $cek_berubah);
		
		if (	
			$cek_berubah['nama_jalan'] 			== $nama_jalan && 
			$cek_berubah['longitude'] 			== $lng && 
			$cek_berubah['latitude']			== $lat && 
			$cek_berubah['id_kecamatan'] 		== $kecamatan && 
			$cek_berubah['id_kelurahan']		== $kelurahan && 
			$cek_berubah['meninggal_dunia'] 	== $meninggal_dunia && 
			$cek_berubah['luka_berat'] 			== $luka_berat && 
			$cek_berubah['luka_ringan'] 		== $luka_ringan &&
			$cek_berubah['kerugian_materi'] 	== $format &&
			$cek_berubah['id_waktu']		 	== $waktu &&
			$cek_berubah['id_jenis']		 	== $jenis_kendaraan &&
			$cek_berubah['id_profesi']		 	== $profesi &&
			$cek_berubah['id_umur']		 		== $umur &&
			$cek_berubah['id_type']		 		== $type 
			){
			// echo "<pre>"; var_dump($cek_berubah);
			// exit;
			$this->session->set_flashdata('test', 
			'<script>
				Swal.fire({
					position:	"top-center-start",
					icon: "info",
					title: "Data tidak ada yang dirubah",
					showConfirmButton: false,
					timer: 2000,
					confirmButtonClass: "btn btn-primary",
					buttonsStyling: false,
				})
			</script>');
			redirect(base_url()."admin/data_kecelakaan");
		}
		else{

			$number = $this->input->post('kermat_edit');
			$format = str_replace(".","",$number);
			
			$data = array(
				'nama_jalan' 		=> $nama_jalan,
				'longitude' 		=> $lng,
				'latitude' 			=> $lat,
				'id_kecamatan' 		=> $kecamatan,
				'id_kelurahan' 		=> $kelurahan,
				'jumlah_kecelakaan'	=> $jumlah_kec,
				'meninggal_dunia' 	=> $meninggal_dunia,
				'luka_berat' 		=> $luka_berat,
				'luka_ringan' 		=> $luka_ringan,
				'kerugian_materi' 	=> $format,
				'id_waktu'			=> $waktu,
				'id_jenis'			=> $jenis_kendaraan,
				'id_profesi'		=> $profesi,
				'id_umur'			=> $umur,
				'id_type'			=> $type,	
				'prosentase'		=> $value,
			); 
			$where = array('id_kecelakaan' => $id );
			// echo "<pre>"; var_dump($data);
			// exit;
			$this->db->update('tb_kecelakaan', $data, $where);
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
			redirect('admin/data_kecelakaan');
		}
				
	}
	function update_data($id)
	{
		$nama_jalan = $this->input->post('jalan_tabel');
		$lng = $this->input->post('lng_tabel');
		$lat = $this->input->post('lat_tabel');
		$meninggal_dunia = $this->input->post('md_tabel');
		$luka_berat = $this->input->post('lb_tabel');
		$luka_ringan = $this->input->post('lk_tabel');
		$number = $this->input->post('kermat_tabel');
		$format = str_replace(".","",$number);

		$cek_perubahan = $this->db->query("SELECT * FROM tb_kecelakaan WHERE id_kecelakaan = '$id'")->result_array();
		foreach($cek_perubahan as $cek_berubah);
		// var_dump($cek_berubah);
		// exit;
		if (	
				$cek_berubah['nama_jalan'] 			== $nama_jalan && 
				$cek_berubah['longitude'] 			== $lng && 
				$cek_berubah['latitude']			== $lat && 
				$cek_berubah['meninggal_dunia'] 	== $meninggal_dunia && 
				$cek_berubah['luka_berat'] 			== $luka_berat && 
				$cek_berubah['luka_ringan'] 		== $luka_ringan &&
				$cek_berubah['kerugian_materi'] 	== $format
			){
			$this->session->set_flashdata('test', 
				'<script>swal("info","Tidak Ada Perubahan Data","info");</script>');
			redirect(base_url()."admin/data_kecelakaan");
		
		}else{

			$number = $this->input->post('kermat');
			$format = str_replace(".","",$number);
			
			$data = array(
				'nama_jalan' => $this->input->post('jalan'),
				'longitude' => $this->input->post('lng'),
				'latitude' => $this->input->post('lat'),
				'meninggal_dunia' => $this->input->post('md'),
				'luka_berat' => $this->input->post('lb'),
				'luka_ringan' => $this->input->post('lk'),
				'kerugian_materi' => $format,
			); 
			$where = array('id_kecelakaan' => $id );
			// var_dump($data);
			// exit;
			$this->db->update('tb_kecelakaan', $data, $where);
			$this->session->set_flashdata('test', 
					'<script>swal("Sukses","Data berhasil Diubah","success");</script>');
			redirect('admin/data_kecelakaan');
		}
	}

	public function getKel()
	{
		$id_kecamatan = $this->input->post('kecamatan');
		if ($id_kecamatan != null) {
			$kelurahan = $this->admin_model->get_kelurahan_where($id_kecamatan)->result_array();
			$drop = '<option hidden>Pilih Kelurahan</option>';
			foreach ($kelurahan as $kel) {
				$drop = $drop . '<option value="' . $kel['id_kelurahan'] . '">' . $kel['nama_kelurahan'] . '</option>';
			}
			echo $drop;
		}

		// var_dump($filterCity);
	}
	public function export($id)
	{
		$this->load->library('dompdf_gen');
		$data['data_export']	= $this->admin_model->get_dtkec($id)->result_array();
		$data['title']			=
		$this->load->view('admin/template/header_admin');
		$this->load->view('admin/template/file_export', $data);
		
		$dompdf = new DOMPDF();
		$paper_size 	= 'A4';
		$orientation	= 'landscape';
		$html			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$html = preg_replace('/>\s+</', '><', $html);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data Kecelakaan.pdf", array('Attachment' => 0));
	}
	public function add_view()
	{	
		$id_user = $this->session->userdata('id_user');		
		$this->load->view('admin/template/header_admin');
		$data['data_user']			= $this->admin_model->get_dataById($id_user);
		$data['data_lokasi'] 		= $this->admin_model->tampil_data_lokasi()->result_array();
		$data['data_kecelakaan'] 	= $this->db->get('tb_kecelakaan')->result_array();
		$data['data_wilayah']		= $this->admin_model->tampil_data_kecelakaan()->result_array();
		$data['data_kecamatan']		= $this->admin_model->tampil_data_kecamatan()->result_array();
		$data['data_waktu']		 	= $this->db->get('tb_wkt')->result_array();
		$data['data_kendaraan']		= $this->db->get('tb_jeniskendaraan')->result_array();
		$data['data_profesi']		= $this->db->get('tb_profesikorban')->result_array();
		$data['data_umur']			= $this->db->get('tb_umurkorban')->result_array();
		$data['data_type']			= $this->db->get('tb_typekejadian')->result_array();
		$this->load->view('admin/template/navigation_admin',$data);
		$this->load->view('admin/template/v_addkecelakaan',$data);
		$this->load->view('admin/template/footer_admin');
	}
	// public function data_view()
	// {
	// 	$this->load->view('admin/template/header_admin');
	// 	// $this->load->view('admin/template/navigation_admin');
	// 	$data['data_lokasi'] 		= $this->admin_model->tampil_data_lokasi()->result_array();
	// 	$data['data_kecelakaan'] 	= $this->db->get('tb_kecelakaan')->result_array();
	// 	$data['data_wilayah']		= $this->admin_model->tampil_data_kecelakaan()->result_array();
	// 	$data['data_kecamatan'] 	= $this->db->get('tb_kecamatan')->result_array();
	// 	$this->load->vars($data);
    //     $this->load->view('admin/template/v_datakecelakaan');
    //     $this->load->view('admin/template/footer_admin');
	// }
}
