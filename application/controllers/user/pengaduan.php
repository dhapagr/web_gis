<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('pagination');
	}

	public function index()
    {
		$riwayat_input = $this->session->flashdata('input_kosong');
		if($riwayat_input != null){
			$data = [
				'subjek' 	=> $riwayat_input['subjek'],
				'pesan'		=> $riwayat_input['pesan'],
				'lokasi' 	=> $riwayat_input['lokasi'],
			];
		}else{
			$data = ['subjek' => '','pesan' => '','lokasi' => ''];
		}
		$this->session->set_flashdata('input', $data);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

		// pengaturan pagination 
		$config['base_url'] = base_url('user/pengaduan/index/');
		$config['total_rows'] = count($this->db->get_where('tb_pengaduan', ['status_pengaduan' => 1])->result_array());
		$config['per_page'] = 6;
		$choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
		$from = $this->uri->segment(4);
		$this->pagination->initialize($config);		

		$data_pengaduan = $this->user_model->get_pengaduan($config['per_page'],$from);
		foreach($data_pengaduan as $pengaduan):
			$dt_pengaduan[] = array(
				'id_pengaduan' 		=> $pengaduan['id_pengaduan'],
				'id_user'			=> $pengaduan['id_user'],
				'lokasi' 			=> $pengaduan['lokasi'],
				'subjek' 			=> $pengaduan['subjek'],
				'pesan' 			=> $pengaduan['pesan'],
				'tanggal_pengaduan' => $pengaduan['tanggal_pengaduan'],
				'tanggal_jawab' 	=> $pengaduan['tanggal_jawab'],
				'jawaban' 			=> $pengaduan['jawaban'],
				'status_pengaduan' 	=> $pengaduan['status_pengaduan'],
				'data_user' 		=> $this->user_model->get_data_user($pengaduan['id_user']),
				'gambar_pengaduan'	=> $this->user_model->get_gambar_pengaduan($pengaduan['id_pengaduan']),

			);
		endforeach;
		$data['dt_pengaduan'] = $dt_pengaduan;
		
        $this->load->view('user/template/header');
		$this->load->view('user/pengaduan', $data);
		$this->load->view('user/template/footer');
    }

	public function post_pengaduan()
	{
		$user = $this->session->userdata('role_user');
		if($user != 'umum'){
			redirect('user/pengaduan/');
		}else{
			$subjek		= $this->input->post('subjek');
			$pesan		= $this->input->post('pesan');
			$lokasi		= $this->input->post('lokasi');
			$tanggal 	= date('Y-m-d');
			$id_user	= $this->session->userdata('id_user');

			$data = [
				'id_user'			=> $id_user,
				'subjek'			=> $subjek,
				'pesan'				=> $pesan,
				'lokasi'			=> $lokasi,
				'tanggal_pengaduan'	=> $tanggal, 
				'status_pengaduan' 	=> 0
			];

			if($subjek != '' && $pesan != '' && $lokasi != ''){
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
