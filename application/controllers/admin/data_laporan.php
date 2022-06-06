<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_laporan extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('user_model');
		date_default_timezone_set('Asia/Jakarta'); 
		if ($this->session->userdata("role_user") != "admin")
		{
			redirect('admin/welcome');
		}
	}
    public function index()
	{
		$id_user = $this->session->userdata('id_user');		
		$data['data_user']			= $this->admin_model->get_dataById($id_user);
		$pengaduan = $this->admin_model->get_pengaduan()->result_array();
		foreach($pengaduan as $p_aduan):
			$dt_pengaduan[] = [
				'id_pengaduan' 		=> $p_aduan['id_pengaduan'],
				'lokasi' 			=> $p_aduan['lokasi'],
				'subjek' 			=> $p_aduan['subjek'],
				'tanggal_pengaduan' => $p_aduan['tanggal_pengaduan'],
				'jawaban' 			=> $p_aduan['jawaban'],
				'status_pengaduan' 	=> $p_aduan['status_pengaduan'],
				'data_user' 		=> $this->user_model->get_data_user($p_aduan['id_user']),
			];
		endforeach;
		$data['dt_pengaduan'] = $dt_pengaduan;
		// echo "<pre>"; print_r($data); exit;
		$this->load->view('admin/template/header_admin');
		$this->load->view('admin/template/navigation_admin',$data);
		$this->load->view('admin/data_laporan');
		$this->load->view('admin/template/footer_admin');
	}

	public function get_detail_pengaduan($id_pengaduan)
	{
		$pengaduan 	= $this->db->get_where('tb_pengaduan', ['id_pengaduan' => $id_pengaduan])->row();
		$data_user	= $this->db->get_where('login_session', ['id_user' => $pengaduan->id_user])->row();
		$gambar		= $this->db->get_where('tb_gambar_pengaduan', ['id_pengaduan' => $id_pengaduan])->result();
		if($data_user->gender == "L"){$gender = "Pria";}else{$gender = "Wanita";}
		if($pengaduan->tanggal_jawab == null){ 
			$tanggal_jawab = "-"; 
			$jawaban= "<small class='text-danger'>Belum terjawab</small>";
		}else{
			$tanggal_jawab = date('d-m-Y', strtotime($pengaduan->tanggal_jawab));
			$jawaban= $pengaduan->jawaban;
		}

		foreach($gambar as $key => $gb):
			$tempel_gambar[$key] = 
			'<div class="col-lg-10 col-6">
				<img src="'.base_url("./assets/user/img/gb_pengaduan/".$gb->gambar).'" alt="" width="100%" height="auto" style="border-radius: 10px;">
			</div>';
		endforeach;
		

		echo'<div id="modal-detail-pengaduan" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header d-flex justify-content-between">
							<h5 class="modal-title">Detail Pengaduan</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-7">
									<div>
										<h6 class="text-primary"><i class="fas fa-user-circle"></i> Pelapor: <span class="text-secondary">'.$data_user->nama.'</span></h6>
									</div>
									<div>
										<h6 class="text-primary"><i class="fas fa-venus-mars"></i> Gender: <span class="text-secondary">'.$gender.'</span></h6>
									</div>
									<div>
										<h6 class="text-primary"><i class="fas fa-play-circle"></i> Subjek: <span class="text-secondary">'.$pengaduan->subjek.'</span></h6>
									</div>
									<div>
										<h6 class="text-primary"><i class="fas fa-map-marker-alt"></i> Lokasi: <span class="text-secondary">'.$pengaduan->lokasi.'</span></h6>
									</div>
									<div>
										<h6 class="text-primary"><i class="fas fa-calendar-week"></i> Tgl Pengaduan: <span class="text-secondary">'.date('d-m-Y', strtotime($pengaduan->tanggal_pengaduan)).'</span></h6>
									</div>
									<div>
										<h6 class="text-primary"><i class="fas fa-envelope"></i> Pesan: </h6>
										<div style="text-align: justify; margin-left: 20px;">
											<h6 class="text-secondary">'.$pengaduan->pesan.'</h6>
										</div>
									</div>
									<div>
										<h6 class="text-primary"><i class="fas fa-calendar-week"></i> Tgl Jawab: <span class="text-secondary">'.$tanggal_jawab.'</span></h6>
									</div>
									<div>
										<h6 class="text-primary"><i class="fas fa-check-circle"></i> Jawaban: </h6>
										<div style="text-align: justify; margin-left: 20px;">
											<h6 class="text-secondary">'.$jawaban.'</h6>
										</div>
									</div>
								</div>
								<div class="col-lg-5">
									<div>
										<h6 class="text-primary"><i class="fas fa-image"></i> Gambar pengaduan</h6>
									</div>
									<div class="row">';
										if($gambar != null){
											foreach($gambar as $key => $gb):
												echo'<div class="col-lg-12 col-sm-6">
													<img src="'.base_url("./assets/user/img/gb_pengaduan/".$gb->gambar).'" alt="" width="100%" height="auto" style="border-radius: 10px; margin-bottom: 10px;">
												</div>';
											endforeach;
										}else{
											echo'<small class="text-danger" style="margin-left: 34px;">Pelapor tidak menyertakan gambar.</small>';
										}
									echo'</div>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-1 mt-1">
							<button type="button" class="btn btn-primary btn-sm mr-3" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>';
	}

	public function edit_pengaduan($id_pengaduan)
	{
		$pengaduan 	= $this->db->get_where('tb_pengaduan', ['id_pengaduan' => $id_pengaduan])->row();
		$data_user	= $this->db->get_where('login_session', ['id_user' => $pengaduan->id_user])->row();
		$gambar		= $this->db->get_where('tb_gambar_pengaduan', ['id_pengaduan' => $id_pengaduan])->result();
		if($data_user->gender == "L"){$gender = "Pria";}else{$gender = "Wanita";}
		if($pengaduan->tanggal_jawab == null){ 
			$tanggal_jawab = "-"; 
			$jawaban= "<h6 class='text-danger'>Belum terjawab</h6>";
		}else{
			$tanggal_jawab = date('d-m-Y', strtotime($pengaduan->tanggal_jawab));
			$jawaban= $pengaduan->jawaban;
		}

		foreach($gambar as $key => $gb):
			$tempel_gambar[$key] = 
			'<div class="col-lg-10 col-6">
				<img src="'.base_url("./assets/user/img/gb_pengaduan/".$gb->gambar).'" alt="" width="100%" height="auto" style="border-radius: 10px;">
			</div>';
		endforeach;
		

		echo'<div id="modal-edit-pengaduan" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header d-flex justify-content-between">
							<h5 class="modal-title">Edit Pengaduan</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-6">
									<div>
										<h6 class="text-primary"><i class="fas fa-user-circle"></i> Pelapor: <span class="text-secondary">'.$data_user->nama.'</span></h6>
									</div>
									<div>
										<h6 class="text-primary"><i class="fas fa-venus-mars"></i> Gender: <span class="text-secondary">'.$gender.'</span></h6>
									</div>
									<div>
										<h6 class="text-primary"><i class="fas fa-play-circle"></i> Subjek: <span class="text-secondary">'.$pengaduan->subjek.'</span></h6>
									</div>
									<div>
										<h6 class="text-primary"><i class="fas fa-map-marker-alt"></i> Lokasi: <span class="text-secondary">'.$pengaduan->lokasi.'</span></h6>
									</div>
									<div>
										<h6 class="text-primary"><i class="fas fa-calendar-week"></i> Tgl Pengaduan: <span class="text-secondary">'.date('d-m-Y', strtotime($pengaduan->tanggal_pengaduan)).'</span></h6>
									</div>
									<div>
										<h6 class="text-primary"><i class="fas fa-envelope"></i> Pesan: </h6>
										<div style="text-align: justify; margin-left: 20px;">
											<h6 class="text-secondary">'.$pengaduan->pesan.'</h6>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-2">
										<h6 class="text-primary"><i class="fas fa-calendar-week"></i> Tgl Jawab: <span class="text-secondary">'.date('d-m-Y').'</span></h6>
										<small class="text-danger" style="margin-left: 20px; margin-top: -6px; position: absolute;"> *Tgl dibuat otomatis sesuai saat ini</small>
									</div>
									<div>
										<h6 class="text-primary"><i class="fas fa-check-circle"></i> Jawaban: </h6>
										<div style="text-align: justify; margin-left: 20px;">
											<textarea id="jawaban" name="jawaban" class="form-control" placeholder="Tuliskan jawaban disini!" style="height: 100px;">'.$pengaduan->jawaban.'</textarea>
										</div>
									</div>
								</div>
							</div>
							<div>
								<h6 class="text-primary"><i class="fas fa-image"></i> Gambar pengaduan</h6>
							</div>
							<div class="row">';
								if($gambar != null){
									foreach($gambar as $key => $gb):
										echo'<div class="col-md-6 col-sm-12">
											<img src="'.base_url("./assets/user/img/gb_pengaduan/".$gb->gambar).'" alt="" width="100%" height="auto" style="border-radius: 10px; margin-bottom: 10px;">
										</div>';
									endforeach;
								}else{
									echo'<small class="text-danger" style="margin-left: 34px;">Pelapor tidak menyertakan gambar.</small>';
								}
							echo'</div>
						</div>
						<div class="d-flex justify-content-end mb-1 mt-1">
							<button type="button" class="btn btn-primary btn-sm mr-2" onclick="simpan('.$pengaduan->id_pengaduan.')">Simpan</button>
							<button type="button" class="btn btn-secondary btn-sm mr-3" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>';
	}

	public function simpan_jawaban($id_pengaduan)
	{
		$jawaban = $this->input->post('jawaban');
		$data = ['tanggal_jawab' => date('Y-m-d'), 'jawaban' => $jawaban];
		$sukses = $this->db->update('tb_pengaduan', $data, ['id_pengaduan' => $id_pengaduan]);
		if($sukses){echo 1;}else{echo 0;}
	}

	public function hapus_pengaduan($id_pengaduan)
	{
		$sukses = $this->db->delete('tb_pengaduan', ['id_pengaduan' => $id_pengaduan]);
		if($sukses){echo 1;}else{echo 0;}
	}

	public function ubah_status_pengaduan($id_pengaduan, $status){
		$sukses = $this->db->update('tb_pengaduan', ['status_pengaduan' => $status], ['id_pengaduan' => $id_pengaduan]);
		if($sukses){echo 1;}else{echo 0;}
	}
}