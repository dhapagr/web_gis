<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
    {
		$riwayat_input = $this->session->flashdata('input_kosong');
		if($riwayat_input != null){
			$data = [
				'subjek' 	=> $riwayat_input['subjek'],
				'pesan'		=> $riwayat_input['pesan'],
				'nama' 		=> $riwayat_input['nama'],
				'email' 	=> $riwayat_input['email'],
			];
		}else{
			$data = ['subjek' => '','pesan' => '','nama' => '','email' => ''];
		}
		$this->session->set_flashdata('input', $data);

        $this->load->view('user/template/header');
		$this->load->view('user/pengaduan');
		$this->load->view('user/template/footer');
    }

	public function post_pengaduan()
	{
		$user = $this->session->userdata('role_user');
		if($user != 'umum'){
			redirect('user/pengaduan/');
		}else{
			$subjek	= $this->input->post('subjek');
			$pesan	= $this->input->post('pesan');
			$nama	= $this->input->post('nama');
			$email	= $this->input->post('email');

			$data = ['subjek'=> $subjek,'pesan'=> $pesan,'nama'=> $nama,'email'=> $email];

			if($subjek != '' && $pesan != '' && $nama != '' && $email != ''){
				$this->db->insert('tb_pengaduan', $data);
				$id_pengaduan = $this->db->insert_id();

				$total_gb  = $this->input->post('jml_gb');
				if($total_gb == 0){
					// Tidak terdapat gambar
					$this->session->set_flashdata('pesan_pengaduan',
						'<script type="text/javascript">
							Swal.fire("Sukses","Pengaduan berhasil terkirim.","success");
						</script>'
					);
					redirect('user/pengaduan/');
				}else{
					// Terdapat gambar
					$data2 = [];
					for ($i = 0; $i < $total_gb; $i++) :
						if ($_FILES['gambar']['name'][$i] == ''){
							$this->session->set_flashdata('input_kosong', $data);
							$this->session->set_flashdata('pesan_pengaduan',
								'<script type="text/javascript">
									Swal.fire("Gagal","Format gambar tidak sesuai","error");
								</script>'
							);
							redirect('user/pengaduan/');
						}else{
							$_FILES['file']['name']     = $_FILES['gambar']['name'][$i];
							$_FILES['file']['type']     = $_FILES['gambar']['type'][$i];
							$_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
							$_FILES['file']['error']    = $_FILES['gambar']['error'][$i];
							$_FILES['file']['size']     = $_FILES['gambar']['size'][$i];

							$config['upload_path']     	= './assets/user/img/gb_pengaduan';
							$config['allowed_types']   	= 'jpg|jpeg|png';
							$config['max_size'] 	  	= 5120; // max 5mb
							$config['file_name'] 		= md5($_FILES['gambar']['name'][$i]);

							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							
							if ($this->upload->do_upload('file')) {
								$nama_gambar[$i] = $this->upload->data()['file_name'];

								$data2[$i] = array(
									'id_pengaduan' 	=> $id_pengaduan,
									'gambar'    	=> $nama_gambar[$i],
								);
								$this->db->insert('tb_gambar_pengaduan', $data2[$i]);

							} else {
								$where = ['id_pengaduan' => $id_pengaduan];

								// delete gambar dari folder
								$get_gambar = $this->db->get_where('tb_gambar_pengaduan', $where)->result_array();
								if($get_gambar != null):
									foreach($get_gambar as $nm_file):
										unlink('./assets/user/img/gb_pengaduan/'.$nm_file['gambar']);
									endforeach;
								endif;
								// delete gambar dari db
								$this->db->delete('tb_gambar_pengaduan', $where);
								$this->db->delete('tb_pengaduan', $where);

								$this->session->set_flashdata('input_kosong', $data);
								$this->session->set_flashdata('pesan_pengaduan',
									'<script type="text/javascript">
										Swal.fire("Gagal","Format gambar tidak sesuai","error");
									</script>'
								);
								redirect('user/pengaduan/');
							}
						} 
					endfor;

					$this->session->set_flashdata('pesan_pengaduan',
						'<script type="text/javascript">
							Swal.fire("Sukses","Pengaduan berhasil terkirim.","success");
						</script>'
					);
					redirect('user/pengaduan/');
				}
			}else{
				$this->session->set_flashdata('input_kosong', $data);
				$this->session->set_flashdata('pesan_pengaduan',
					'<script type="text/javascript">
						Swal.fire("Peringatan","Semua form input wajib di isi!","warning");
					</script>'
				);
				redirect('user/pengaduan/');
			}
		}
	}
}
