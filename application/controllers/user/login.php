<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}
	public function index()
    {
		$this->session->sess_destroy();

        $this->load->view('user/template/header');
		$this->load->view('user/login');
		$this->load->view('user/template/footer');
    }

	public function auth()
	{
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('user/template/header');
			$this->load->view('user/login');
			$this->load->view('user/template/footer');
		}else{
			$auth = $this->auth_model->cek_login_umum();

			if($auth == null){
				$this->session->set_flashdata('sukses_registrasi',
					'<script>
						Swal.fire("Gagal","Password yang Anda masukkan salah!","error")
					</script>'
				);
				redirect('user/login');
			}else{
				$this->session->set_userdata('email', $auth->email);
                $this->session->set_userdata('role_user', $auth->role_user);
                $this->session->set_userdata('id_user', $auth->id_user);
				$this->session->set_userdata('nama', $auth->nama);

				redirect('user/pengaduan/');
			}
		}
	}

	public function logout_umum(){
		$this->session->sess_destroy();
		redirect('Welcome');
	}
}
