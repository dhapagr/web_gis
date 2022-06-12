<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$this->load->view('template_berita/header');
		$this->load->view('template_berita/navbar');
		$this->load->view('user/berita_2');
		$this->load->view('template_berita/footer');
	}
}
