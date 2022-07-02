<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile extends CI_Controller {

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
		$this->load->view('superadmin/template/header_admin');
		$data['data_user']			= $this->Superadmin_model->get_dataById($id_user);
		$this->load->view('superadmin/template/navigation_admin', $data);
		$this->load->view('superadmin/user_profile', $data);
		$this->load->view('superadmin/template/footer_admin');
	}
	public function update($id)
	{
		$id_user	=	$this->session->userdata('id_user');	
		$nama		=	$this->input->post('name_edit');
		$email		=	$this->input->post('email_edit');
		$username	=	$this->input->post('username_edit');
		$tgl		=	$this->input->post('date_edit');
		$alamat		=	$this->input->post('alamat_edit');
		$telp		=	$this->input->post('nomor_edit');
		$gender		=	$this->input->post('gender');

		$cek_perubahan = $this->db->query("SELECT * FROM tb_user WHERE id_user = '$id'")->result_array();
		foreach($cek_perubahan as $cek_berubah);
		if(
			$cek_berubah['nama_user'] 			== $nama && 
			$cek_berubah['email_user'] 			== $email && 
			$cek_berubah['username_user']		== $username && 
			$cek_berubah['tgl_lahir'] 			== $tgl && 
			$cek_berubah['alamat_user']			== $alamat && 
			$cek_berubah['nomor_user'] 			== $telp && 
			$cek_berubah['jenis_kelamin'] 		== $gender 
			)
		{
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
			//redirect('superadmin/user_profile');
		}
		else
		{
			$this->form_validation->set_rules('email_edit', 'Email', 'required|is_unique[tb_user.email_user]');
			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
					'nama_user' 		=> $nama,
					'email_user' 		=> $email,
					'username_user' 	=> $username,
					'tgl_lahir' 		=> $tgl,
					'alamat_user' 		=> $alamat,
					'nomor_user' 		=> $telp,
					'jenis_kelamin'		=> $gender,
				); 
				
				// echo "<pre>"; var_dump($data);
				// exit;
				$where = array('id_user' => $id );
				$post = $this->db->update('tb_user', $data, $where);
				if($post)
				{
					if ($_FILES['profil_edit']['name'] == '') {
					} else {
						$foto 							= $_FILES['profil_edit']['name'];
						// $ext_foto 						= pathinfo($foto, PATHINFO_EXTENSION);
						// $nama_foto 						= 'foto_' . $id_user . '.' . $ext_foto;
						$image_path						= './assets/admin/images/profil';
						$config['upload_path'] 			= $image_path;
						$config['allowed_types']		= 'jpg|jpeg|png|JPG|JPEG|PNG';
						$config['file_name'] 			= $foto;
						$config['max_size'] 			= 5000;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						$this->upload->do_upload('profil_edit');
			
						$foto_update = array(
							'foto_user' => $foto,
						);
						$where = array('id_user' => $id );
						$this->db->update('tb_user', $foto_update, $where);
					}
				}
				$sessionflash = $this->session->set_flashdata('test', 
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
				// redirect('superadmin/user_profile');
			}
			else
			{
				if(
					$cek_berubah['nama_user'] 			== $nama && 
					$cek_berubah['username_user']		== $username && 
					$cek_berubah['tgl_lahir'] 			== $tgl && 
					$cek_berubah['alamat_user']			== $alamat && 
					$cek_berubah['nomor_user'] 			== $telp && 
					$cek_berubah['jenis_kelamin'] 		== $gender
				)
				{
					$sessionflash=$this->session->set_flashdata('test', 
					'<script>
						Swal.fire({
							position:	"top-center-start",
							icon: "error",
							title: "Email Telah Digunakan",
							showConfirmButton: false,
							timer: 2000,
							confirmButtonClass: "btn btn-primary",
							buttonsStyling: false,
						})
					</script>');
					// redirect('superadmin/user_profile');
				}
				else
				{
					$data = array(
						'nama_user' 		=> $nama,
						// 'email_user' 		=> $email,
						'username_user' 	=> $username,
						'tgl_lahir' 		=> $tgl,
						'alamat_user' 		=> $alamat,
						'nomor_user' 		=> $telp,
						'jenis_kelamin'		=> $gender,
					); 
					$where = array('id_user' => $id );
					$this->db->update('tb_user', $data, $where);
				
					if ($_FILES['profil_edit']['name'] == '') {
					} else {
						$foto 							= $_FILES['profil_edit']['name'];
						// $ext_foto 						= pathinfo($foto, PATHINFO_EXTENSION);
						// $nama_foto 						= 'foto_' . $id_user . '.' . $ext_foto;
						$image_path						= './assets/admin/images/profil';
						$config['upload_path'] 			= $image_path;
						$config['allowed_types']		= 'jpg|jpeg|png|JPG|JPEG|PNG';
						$config['file_name'] 			= $foto;
						$config['max_size'] 			= 5000;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						$this->upload->do_upload('profil_edit');
				
						$foto_update = array(
							'foto_user' => $foto,
						);
						$where = array('id_user' => $id );
						$this->db->update('tb_user', $foto_update, $where);
					}
					
					$sessionflash=$this->session->set_flashdata('test', 
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
					// redirect('superadmin/user_profile');
				}
			}
		}

		if ($_FILES['profil_edit']['name'] == '') {
		} else {
			$foto 							= $_FILES['profil_edit']['name'];
			// $ext_foto 						= pathinfo($foto, PATHINFO_EXTENSION);
			// $nama_foto 						= 'foto_' . $id_user . '.' . $ext_foto;
			$image_path						= './assets/admin/images/profil';
			$config['upload_path'] 			= $image_path;
			$config['allowed_types']		= 'jpg|jpeg|png|JPG|JPEG|PNG';
			$config['file_name'] 			= $foto;
			$config['max_size'] 			= 5000;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('profil_edit');

			$foto_update = array(
				'foto_user' => $foto,
			);
			$where = array('id_user' => $id );

			$this->db->update('tb_user', $foto_update, $where);
			$sessionflash= $this->session->set_flashdata('test', 
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
				</script>'
			);
		}
		// echo print_r($foto_update);
		// exit;
		$sessionflash;
		redirect('superadmin/User_profile');
	}
	public function test()
	{
		// $this->load->view('admin/template/header_admin');
		$this->load->view('admin/template/v_datakecelakaan');
		// $this->load->view('admin/user_profile');

	}

}