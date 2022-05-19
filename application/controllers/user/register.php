<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('user/template/header');
		$this->load->view('user/register');
		$this->load->view('user/template/footer');
	}
	public function registrasi()
	{
		$this->form_validation->set_rules('email', 'email', 'required|is_unique[tb_user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');
		$this->form_validation->set_rules('username', 'Username', 'required');

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|is_unique[tb_pegawai.nama_lengkap]');
        $this->form_validation->set_rules('ttl', 'Birth Date', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telephone', 'No. Telepon', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan!');
        $this->form_validation->set_message('matches', '{field} tidak sesuai!');

		if ($this->form_validation->run() == TRUE)
		{
			echo'dfadfa';
		}
		else
		{
			echo'salah';
		}
	}
}
