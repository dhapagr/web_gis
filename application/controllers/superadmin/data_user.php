<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_user extends CI_Controller {

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
        $data['detail']		    	= $this->db->get('tb_user')->result_array();
        $data['admin_detail']		= $this->superadmin_model->get_data_admin()->result_array();
        $data['spadmin_detail']		= $this->superadmin_model->get_data_superadmin()->result_array();
		$this->load->view('superadmin/template/header_admin');
		$this->load->view('superadmin/template/navigation_admin', $data);
		$this->load->view('superadmin/data_user', $data);
		$this->load->view('superadmin/template/footer_admin');
	}
	public function edit_view($id)
	{	
		$id_user = $this->session->userdata('id_user');		
		$data['data_user']			= $this->superadmin_model->get_dataById($id_user);
		// $data['data_by_id']			= $this->admin_model->get_dtkec($id)->result_array();
		$data['detail_user'] 		= $this->db->query("SELECT * FROM tb_user WHERE id_user = '$id'")->result_array();
		$this->load->view('superadmin/template/header_admin');
		$this->load->view('superadmin/template/navigation_admin', $data);
		$this->load->view('superadmin/template/v_edituser', $data);
		$this->load->view('superadmin/template/footer_admin');
	}
	
	public function tambah_data()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[tb_user.email_user]');
		if ($this->form_validation->run() == FALSE)
    	{
			$this->session->set_flashdata('test', 
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
			$id_user = $this->session->userdata('id_user');	
			$data['data_user']			= $this->superadmin_model->get_dataById($id_user);
			$data['detail']		    	= $this->db->get('tb_user')->result_array();
			$data['admin_detail']		= $this->superadmin_model->get_data_admin()->result_array();
			$data['spadmin_detail']		= $this->superadmin_model->get_data_superadmin()->result_array();
			$this->load->view('superadmin/template/header_admin');
			$this->load->view('superadmin/template/navigation_admin', $data);
			$this->load->view('superadmin/data_user', $data);
			$this->load->view('superadmin/template/footer_admin');
        }
        else
        {
			$postdt			= $this->input->post('foto_user');
			if($postdt == null)
			{
				$pass	= $this->input->post('confirm-password');
				$pwd	= password_hash($pass, PASSWORD_DEFAULT);
				$data = array(
					'nama_user' 		=> $this->input->post('name'),
					'email_user' 		=> $this->input->post('email'),
					'password_user'		=> $pwd,
					'username_user' 	=> $this->input->post('username'),
					'jenis_kelamin' 	=> $this->input->post('gender'),
					'nomor_user' 		=> $this->input->post('mobile_add'),
					'alamat_user' 		=> $this->input->post('alamat'),
					'role_user'		 	=> 'admin',
					// 'foto_user' 		=> $foto,
				);
				// echo "<pre>"; var_dump($pwd);
				// exit;
				$this->superadmin_model->insert_table('tb_user', $data);
			}
			else
			{
				$foto 							= $_FILES['foto_user']['name'];
				$image_path						= './assets/admin/images/profil';
				$config['upload_path'] 			= $image_path;
				$config['allowed_types']		= 'jpg|jpeg|png|JPG|JPEG|PNG';
				$config['file_name'] 			= $foto;
				$config['max_size'] 			= 5000;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$true = $this->upload->do_upload('foto_user');
		
				if($true)
				{
					$pass	= $this->input->post('confirm-password');
					$pwd	= password_hash($pass, PASSWORD_DEFAULT);
					$data = array(
						'nama_user' 		=> $this->input->post('name'),
						'email_user' 		=> $this->input->post('email'),
						'password_user'		=> $pwd,
						'username_user' 	=> $this->input->post('username'),
						'jenis_kelamin' 	=> $this->input->post('gender'),
						'nomor_user' 		=> $this->input->post('mobile_add'),
						'alamat_user' 		=> $this->input->post('alamat'),
						'role_user'		 	=> $this->input->post('role'),
						'foto_user' 		=> $foto,
					);
					// echo "<pre>"; var_dump($data);
					// exit;
					$this->superadmin_model->insert_table('tb_user', $data);
				}
			}
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
			redirect('superadmin/data_user');
		}
	}
	public function update($id)
	{
			$pass	= $this->input->post('pass2');
			$pwd	= password_hash($pass, PASSWORD_DEFAULT);

			$id_user	=	$this->session->userdata('id_user');	
			$nama		=	$this->input->post('name_edit');
			$email		=	$this->input->post('email_edit');
			$username	=	$this->input->post('username_edit');
			$password	=	$pwd;
			$tgl		=	$this->input->post('date_edit');
			$alamat		=	$this->input->post('alamat_edit');
			$telp		=	$this->input->post('mobile_edit');
			$gender		=	$this->input->post('gender_edit');

			$cek_perubahan = $this->db->query("SELECT * FROM tb_user WHERE id_user = '$id'")->result_array();
			foreach($cek_perubahan as $cek_berubah);

			if($pass == '')
			{
				if(
					$cek_berubah['nama_user'] 			== $nama && 
					$cek_berubah['email_user'] 			== $email && 
					$cek_berubah['username_user']		== $username && 
					// $cek_berubah['passsword_user']		== $password && 
					$cek_berubah['tgl_lahir'] 			== $tgl && 
					$cek_berubah['alamat_user']			== $alamat && 
					$cek_berubah['nomor_user'] 			== $telp && 
					$cek_berubah['jenis_kelamin'] 		== $gender
					)
				{
					// echo "<pre>"; var_dump($pass,$cek_berubah['password_user']);
					// exit;
					$session_flash	=	$this->session->set_flashdata('test', 
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
					// redirect(base_url()."superadmin/data_user");
				}
				else{
					$this->form_validation->set_rules('email_edit', 'Email', 'required|is_unique[tb_user.email_user]');
					if ($this->form_validation->run() == TRUE)
					{
						$data = array(
							'nama_user' 		=> $nama,
							'email_user' 		=> $email,
							'username_user' 	=> $username,
							// 'password_user'		=> $pass,
							'tgl_lahir' 		=> $tgl,
							'alamat_user' 		=> $alamat,
							'nomor_user' 		=> $telp,
							'jenis_kelamin'		=> $gender,
						); 
						
						$where = array('id_user' => $id );
						// echo "<pre>"; var_dump($data);
						// exit;
						$post = $this->db->update('tb_user', $data, $where);
						if ($post) {
								
							if ($_FILES['customFile_edit']['name'] == '') {
							} 
							else {
								$foto 							= $_FILES['customFile_edit']['name'];
								// $ext_foto 						= pathinfo($foto, PATHINFO_EXTENSION);
								// $nama_foto 						= 'foto_' . $id_user . '.' . $ext_foto;
								$image_path						= './assets/admin/images/profil';
								$config['upload_path'] 			= $image_path;
								$config['allowed_types']		= 'jpg|jpeg|png|JPG|JPEG|PNG';
								$config['file_name'] 			= $foto;
								$config['max_size'] 			= 5000;
								$this->load->library('upload', $config);
								$this->upload->initialize($config);
								$this->upload->do_upload('customFile_edit');
			
								$foto_update = array(
									'foto_user' => $foto,
								);
								$where = array('id_user' => $id );
								$this->db->update('tb_user', $foto_update, $where);
			
							}
								// echo "<pre>"; var_dump($_FILES['profil_edit']['name']);
								// exit;
						}
						
						$session_flash	=	$this->session->set_flashdata('test', 
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
						// redirect('superadmin/data_user');
					}
					else{
						if(
							$cek_berubah['nama_user'] 			== $nama && 
							$cek_berubah['username_user']		== $username && 
							// $cek_berubah['passsword_user']		== $password && 
							$cek_berubah['tgl_lahir'] 			== $tgl && 
							$cek_berubah['alamat_user']			== $alamat && 
							$cek_berubah['nomor_user'] 			== $telp && 
							$cek_berubah['jenis_kelamin'] 		== $gender
						)
						{ $session_flash	=	$this->session->set_flashdata('test', 
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
							// redirect('superadmin/data_user');
						}
						else
						{
							$data = array(
								'nama_user' 		=> $nama,
								'username_user' 	=> $username,
								// 'password_user'		=> $pass,
								'tgl_lahir' 		=> $tgl,
								'alamat_user' 		=> $alamat,
								'nomor_user' 		=> $telp,
								'jenis_kelamin'		=> $gender,
							); 
							
							$where = array('id_user' => $id );
							// echo "<pre>"; var_dump($data);
							// exit;
							$post = $this->db->update('tb_user', $data, $where);
							if ($post) {
									
								if ($_FILES['customFile_edit']['name'] == '') {
								} 
								else {
									$foto 							= $_FILES['customFile_edit']['name'];
									// $ext_foto 						= pathinfo($foto, PATHINFO_EXTENSION);
									// $nama_foto 						= 'foto_' . $id_user . '.' . $ext_foto;
									$image_path						= './assets/admin/images/profil';
									$config['upload_path'] 			= $image_path;
									$config['allowed_types']		= 'jpg|jpeg|png|JPG|JPEG|PNG';
									$config['file_name'] 			= $foto;
									$config['max_size'] 			= 5000;
									$this->load->library('upload', $config);
									$this->upload->initialize($config);
									$this->upload->do_upload('customFile_edit');
				
									$foto_update = array(
										'foto_user' => $foto,
									);
									$where = array('id_user' => $id );
									$this->db->update('tb_user', $foto_update, $where);
				
								}
									// echo "<pre>"; var_dump($_FILES['profil_edit']['name']);
									// exit;
							}
							
							$session_flash	=	$this->session->set_flashdata('test', 
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
							// redirect('superadmin/data_user');
						}
					}
				}
				if ($_FILES['customFile_edit']['name'] == '') {
				} 
				else {
					$foto 							= $_FILES['customFile_edit']['name'];
					// $ext_foto 						= pathinfo($foto, PATHINFO_EXTENSION);
					// $nama_foto 						= 'foto_' . $id_user . '.' . $ext_foto;
					$image_path						= './assets/admin/images/profil';
					$config['upload_path'] 			= $image_path;
					$config['allowed_types']		= 'jpg|jpeg|png|JPG|JPEG|PNG';
					$config['file_name'] 			= $foto;
					$config['max_size'] 			= 5000;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload('customFile_edit');

					$foto_update = array(
						'foto_user' => $foto,
					);
					$where = array('id_user' => $id );
					$this->db->update('tb_user', $foto_update, $where);
				}
			}
			
			else{
				$this->form_validation->set_rules('email_edit', 'Email', 'required|is_unique[tb_user.email_user]');
				if ($this->form_validation->run() == TRUE)
				{
					$data = array(
						'nama_user' 		=> $nama,
						'email_user' 		=> $email,
						'username_user' 	=> $username,
						'password_user'		=> $pwd,
						'tgl_lahir' 		=> $tgl,
						'alamat_user' 		=> $alamat,
						'nomor_user' 		=> $telp,
						'jenis_kelamin'		=> $gender,
					); 
					$where = array('id_user' => $id );
					// echo "<pre>"; var_dump($data);
					// exit;
					$post = $this->db->update('tb_user', $data, $where);
					if ($post) {
							
						if ($_FILES['customFile_edit']['name'] == '') {
						} 
						else {
							$foto 							= $_FILES['customFile_edit']['name'];
							// $ext_foto 						= pathinfo($foto, PATHINFO_EXTENSION);
							// $nama_foto 						= 'foto_' . $id_user . '.' . $ext_foto;
							$image_path						= './assets/admin/images/profil';
							$config['upload_path'] 			= $image_path;
							$config['allowed_types']		= 'jpg|jpeg|png|JPG|JPEG|PNG';
							$config['file_name'] 			= $foto;
							$config['max_size'] 			= 5000;
							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							$this->upload->do_upload('customFile_edit');
		
							$foto_update = array(
								'foto_user' => $foto,
							);
							$where = array('id_user' => $id );
							$this->db->update('tb_user', $foto_update, $where);
							$session_flash	=	$this->session->set_flashdata('test', 
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
						}
							// echo "<pre>"; var_dump($_FILES['profil_edit']['name']);
							// exit;
					}
					$session_flash	=	$this->session->set_flashdata('test', 
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
					// redirect('superadmin/data_user');
				}
				else{
					$data = array(
						'nama_user' 		=> $nama,
						// 'email_user' 		=> $email,
						'username_user' 	=> $username,
						'password_user'		=> $pwd,
						'tgl_lahir' 		=> $tgl,
						'alamat_user' 		=> $alamat,
						'nomor_user' 		=> $telp,
						'jenis_kelamin'		=> $gender,
					); 
					$where = array('id_user' => $id );
					// echo "<pre>"; var_dump($data);
					// exit;
					$post = $this->db->update('tb_user', $data, $where);
					if ($post) {
							
						if ($_FILES['customFile_edit']['name'] == '') {
						} 
						else {
							$foto 							= $_FILES['customFile_edit']['name'];
							// $ext_foto 						= pathinfo($foto, PATHINFO_EXTENSION);
							// $nama_foto 						= 'foto_' . $id_user . '.' . $ext_foto;
							$image_path						= './assets/admin/images/profil';
							$config['upload_path'] 			= $image_path;
							$config['allowed_types']		= 'jpg|jpeg|png|JPG|JPEG|PNG';
							$config['file_name'] 			= $foto;
							$config['max_size'] 			= 5000;
							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							$this->upload->do_upload('customFile_edit');
		
							$foto_update = array(
								'foto_user' => $foto,
							);
							$where = array('id_user' => $id );
							$this->db->update('tb_user', $foto_update, $where);
						}
							// echo "<pre>"; var_dump($_FILES['profil_edit']['name']);
							// exit;
					}
					$session_flash	=	$this->session->set_flashdata('test', 
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
					// redirect('superadmin/data_user');
				}
				
			}
			if ($_FILES['customFile_edit']['name'] == '') {
			} 
			else {
				$foto 							= $_FILES['customFile_edit']['name'];
				// $ext_foto 						= pathinfo($foto, PATHINFO_EXTENSION);
				// $nama_foto 						= 'foto_' . $id_user . '.' . $ext_foto;
				$image_path						= './assets/admin/images/profil';
				$config['upload_path'] 			= $image_path;
				$config['allowed_types']		= 'jpg|jpeg|png|JPG|JPEG|PNG';
				$config['file_name'] 			= $foto;
				$config['max_size'] 			= 5000;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->upload->do_upload('customFile_edit');

				$foto_update = array(
					'foto_user' => $foto,
				);
				$where = array('id_user' => $id );
				$this->db->update('tb_user', $foto_update, $where);
				$session_flash	=	$this->session->set_flashdata('test', 
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
			}
			$session_flash;
			redirect('superadmin/data_user');
	}
	function hapus($id){
		$where = array('id_user' => $id);
		$this->db->delete('tb_user', $where);
		// $this->superadmin_model->hapus_data($where,'tb_user');
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
		redirect('superadmin/data_user');
	}
}
