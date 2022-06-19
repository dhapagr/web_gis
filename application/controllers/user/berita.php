<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_berita');
	}

	public function index()
	{	
		$data['tag']			= $this->db->get('tb_tag')->result_array();
		$data['berita_banner']	= $this->model_berita->get_berita_banner()->row(); //tranding
		$data['berita_terbaru']	= $this->model_berita->get_berita_terbaru()->result_array();
		$data['video_berita']	= $this->model_berita->get_video_berita()->result_array();
		// echo json_encode($data); exit;
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
		$data['tranding']	= $this->model_berita->get_berita_banner()->row();// tranding

		$this->load->view('template_berita/header');
		$this->load->view('template_berita/navbar');
		$this->load->view('user/kategori_berita', $data);
		$this->load->view('template_berita/footer');
	}

	public function detail_berita($param)
	{
		$hasil = str_replace("-", " ", $param);
		$data['berita'] = $this->db->get_where('tb_berita', ['sub_judul' => $hasil])->row();
		$data['berita_terbaru']	= $this->model_berita->get_berita_terbaru()->result_array();
		$data['tranding']	= $this->model_berita->get_berita_banner()->row();// tranding

		$this->load->view('template_berita/header');
		$this->load->view('template_berita/navbar');
		$this->load->view('user/detail_berita', $data);
		$this->load->view('template_berita/footer');
	}
}
