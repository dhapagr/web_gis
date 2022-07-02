<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}
	public function index()
    {
		$this->session->sess_destroy();

		$data = array(
			'captcha' => $this->recaptcha->getWidget(),
			'script_captcha'=> $this->recaptcha->getScriptTag()
    	);

        $this->load->view('user/template/header');
		$this->load->view('user/login', $data);
		$this->load->view('user/template/footer');
    }

	public function auth()
	{
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

		$recaptcha	= $this->input->post('g-recaptcha-response');
		$response 	= $this->recaptcha->verifyResponse($recaptcha);

		if(!isset($response['success']) || $response['success'] <> FALSE)
		{
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('user/template/header');
				$this->load->view('user/login');
				$this->load->view('user/template/footer');
			}else{
				$auth = $this->Auth_model->cek_login_umum();

				if($auth == null){
					$this->session->set_flashdata('sukses_registrasi',
						'<script>
							Swal.fire("Gagal","Password yang Anda masukkan salah!","error")
						</script>'
					);
					redirect('user/Login');
				}else{
					$this->session->set_userdata('email', $auth->email);
					$this->session->set_userdata('role_user', $auth->role_user);
					$this->session->set_userdata('id_user', $auth->id_user);
					$this->session->set_userdata('nama', $auth->nama);

					redirect('user/Pengaduan/');
				}
			}
		}else {
			$this->session->set_flashdata('sukses_registrasi',
				'<script>
					Swal.fire("Gagal","Captcha wajib diisi!","error")
				</script>'
			);
			redirect('user/Login');
		}
	}

	public function logout_umum(){
		$this->session->sess_destroy();
		redirect('Welcome');
	}
}
