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
		$data = array(
			//data pribadi
			'nama' => '', 'ttl' => '', 'agama' => '', 'gender' => '', 'alamat' => '', 'telephone' => '',
			//data akun
			'email' => '', 'password' => '', 'confirm_password'	=> '',
		);
		$this->session->set_flashdata('pesan_register', $data);

		$this->load->view('user/template/header');
		$this->load->view('user/register');
		$this->load->view('user/template/footer');
	}
	public function registrasi()
	{
		//data pribadi
        $this->form_validation->set_rules('nama', 'Nama lengkap', 'required');
        $this->form_validation->set_rules('ttl', 'Tempat tanggal lahir', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('gender', 'Jenis kelamin', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telephone', 'No. telepon', 'required');

		//data akun
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[login_session.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan!');
        $this->form_validation->set_message('matches', '{field} tidak sesuai!');

		$data = array(
			'nama'		=> $this->input->post('nama'),
			'ttl'		=> $this->input->post('ttl'),
			'agama'		=> $this->input->post('agama'),
			'gender'	=> $this->input->post('gender'),
			'alamat'	=> $this->input->post('alamat'),
			'telephone'	=> $this->input->post('telephone'),
			'email'		=> $this->input->post('email'),
			'password'	=> $this->input->post('password'),
			'confirm_password'	=> $this->input->post('confirm_password'),
		);

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('pesan_register', $data);

			$this->load->view('user/template/header');
			$this->load->view('user/register');
			$this->load->view('user/template/footer');

		}else{
			$password = $this->input->post('password');

			// set aturan password
			$uppercase = preg_match('@[A-Z]@', $password);
			$lowercase = preg_match('@[a-z]@', $password);
			$number    = preg_match('@[0-9]@', $password);

			if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) 
			{
				$this->session->set_flashdata('pesan_register', $data);
				$this->session->set_flashdata('pwd_tdk_sesuai',
					'<div class="text-danger small ml-2">
						Password harus lebih dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka
					</div>'
				);
	
				$this->load->view('user/template/header');
				$this->load->view('user/register');
				$this->load->view('user/template/footer');

			}else{
				$data2 = array(
					'nama'		=> $this->input->post('nama'),
					'birth'		=> $this->input->post('ttl'),
					'agama'		=> $this->input->post('agama'),
					'gender'	=> $this->input->post('gender'),
					'alamat'	=> $this->input->post('alamat'),
					'telephone'	=> $this->input->post('telephone'),
					'email'		=> $this->input->post('email'),
					'password'	=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				);
				
				$this->db->insert('login_session', $data2);
				$this->session->set_flashdata('sukses_registrasi',
					'<script>
						Swal.fire("Sukses","Akun berhasil dibuat. Silakan login untuk masuk.","success")
					</script>'
				);
				redirect('user/login/');
			}
		}
	}
}
