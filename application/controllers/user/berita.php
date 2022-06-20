<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_berita');
		$this->load->library('user_agent');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{	
		$data['tag']			= $this->db->get('tb_tag')->result_array();
		$data['berita_banner']	= $this->model_berita->get_berita_banner(); //tranding
		$data['berita_terbaru']	= $this->model_berita->get_berita_terbaru()->result_array();
		$data['berita_random']	= $this->model_berita->get_berita_random()->result_array();
		$data['video_berita']	= $this->model_berita->get_video_random()->result_array();
		$data['video_terbaru']	= $this->model_berita->get_video_terbaru()->result_array();
		// echo json_encode($data['berita_banner']); exit;
		$this->load->view('template_berita/header');
		$this->load->view('template_berita/navbar');
		$this->load->view('user/berita_2', $data);
		$this->load->view('template_berita/footer');
	}

	public function kategori($param)
	{
		$id_kategori = $this->db->get_where('tb_tag', ['nama_tag' => $param])->row();
		$data['kategori'] = $param;

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link text-white">';
        $config['cur_tag_close']    = '</span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

		// pengaturan pagination  
		$config['base_url'] = base_url('user/berita/kategori/'.$param.'/');
		$config['total_rows'] = $this->model_berita->hitung_berita_kategori($id_kategori->id_tag);
		$config['per_page'] = 4;
		$choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
		$from = $this->uri->segment(5);
		$this->pagination->initialize($config);		

		$data['kategori_berita'] = $this->model_berita->get_berita_kategori($config['per_page'], $from, $id_kategori->id_tag);
		$data['berita_terbaru']	= $this->model_berita->get_berita_terbaru()->result_array();
		$data['tranding']	= $this->model_berita->get_berita_banner();// tranding

		$this->load->view('template_berita/header');
		$this->load->view('template_berita/navbar');
		$this->load->view('user/kategori_berita', $data);
		$this->load->view('template_berita/footer');
	}

	public function detail_berita($param)
	{
		// get data user
		if ($this->agent->is_browser())
			{$agent 	= 	
				"Browser: ".$this->agent->browser()."\n".		
				"Version: ".$this->agent->version()."\n";}
		elseif ($this->agent->is_robot())
			{$agent 	= 	
				"Robot name: ".$this->agent->robot()."\n";}
		elseif ($this->agent->is_mobile())
			{$agent 	= 	
				"Mobile: ".$this->agent->mobile()."\n";}
		else
			{$agent 	= 
				'Unidentified User Agent \n';}
		$platform = $this->agent->platform();
		// get ip user
		$ipaddress = $this->input->ip_address();
     		
		$hasil = str_replace("-", " ", $param);
		$detail_berita = $this->db->get_where('tb_berita', ['sub_judul' => $hasil])->row();
		$data_user = $agent."Platform: ".$platform."\nIP Client: ". $ipaddress; 

		$data2 = [
			'id_berita' 		=> $detail_berita->id_berita,
			'data_pengunjung' 	=> $data_user,
			'created_at'		=> date('Y-m-d H:i:s'),
		];

		$this->db->insert('tb_berita_dilihat', $data2);

		// tampil data
		$data['berita'] = $detail_berita;
		$data['berita_terbaru']	= $this->model_berita->get_berita_terbaru()->result_array();
		$data['tranding']	= $this->model_berita->get_berita_banner();// tranding

		$this->load->view('template_berita/header');
		$this->load->view('template_berita/navbar');
		$this->load->view('user/detail_berita', $data);
		$this->load->view('template_berita/footer');
	}
}
