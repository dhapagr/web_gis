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
		$tag 			= $this->db->get('tb_tag')->result_array();
		$berita_banner 	= $this->model_berita->get_berita_banner()->row();
		$berita_terbaru	= $this->model_berita->get_berita_terbaru()->result_array();

		if($tag == null){$data['tag'] = [];}
		else{$data['tag'] = $tag;}
		if($berita_banner == null){$data['berita_banner'] = [];}
		else{$data['berita_banner'] = $berita_banner;}
		if($berita_terbaru == null){$data['berita_terbaru'] = [];}
		else{$data['berita_terbaru'] = $berita_terbaru;}
		
		// echo json_encode($data); exit;
		$this->load->view('template_berita/header');
		$this->load->view('template_berita/navbar');
		$this->load->view('user/berita_2', $data);
		$this->load->view('template_berita/footer');
	}
}
