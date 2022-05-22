<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		if($this->session->userdata('role_user') != 'umum'){
			redirect('user/login');
		}
	}

	public function index()
	{
		$this->load->view('user/template/header');
		$this->load->view('user/berita');
		$this->load->view('user/template/footer');
	}
}
