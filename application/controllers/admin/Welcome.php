<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->view('admin/template/head_auth');
		$this->load->view('admin/login');
		$this->load->view('admin/template/footer_auth');
		$this->session->sess_destroy();
	}
	function check_login()
	{
		$data = array(
			'username_admin' => $this->input->post('username', TRUE),
			'password_admin' => md5($this->input->post('pass', TRUE))
		);

		$this->load->model('admin_model'); // load model_user
		$cek_login = $this->admin_model->where($data);
		//	print_r($this->db->last_query());

		if ($cek_login->num_rows() > 0) {
			$sql = $cek_login->result_array();

			$items = array();
			foreach ($sql as $key) {
				$items = $key;
			}
			// print_r($items);
			$this->session->set_userdata($items);

			$_SESSION['ses_kcfinder'] = array();
			$_SESSION['ses_kcfinder']['disabled'] = false;
			$_SESSION['ses_kcfinder']['uploadURL'] = "../content_upload";

			//	$this->session->set_flashdata('data','<div class="alert alert-success">Berhasil Masuk</div>');
			redirect('admin/dashboard');
		} else {
			// echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
			$this->session->set_flashdata('error', 'Username atau Password tidak valid');
        	redirect('admin/welcome');
		}
	}

	function prosesLogin()
    {
		$this->load->model('auth_model'); // load model_user
		$this->form_validation->set_rules('email_user', 'Email', 'required', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password_user', 'Password', 'required', ['required' => 'Password wajib diisi!']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template/head_auth');
			$this->load->view('admin/login');
			$this->load->view('admin/template/footer_auth');
        } else {
            $auth = $this->auth_model->cek_login();
            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', 
				'<script>
					var isRtl = $("html").attr("data-textdirection") === "rtl";
					toastr["error"]("Password Yang Dimasukkan Salah!", "INVALID PASSWORD!", {
						positionClass: "toast-top-center",
						rtl: isRtl
					});
				</script>'
				);
                redirect('admin/welcome');
            } else {
                $this->session->set_userdata('email_user', $auth->email_user);
                $this->session->set_userdata('role_user', $auth->role_user);
                $this->session->set_userdata('id_user', $auth->id_user);
                switch ($auth->role_user) {
                    case 'admin':
						redirect('admin/dashboard');
                        break;
                    case 'superadmin':
                        redirect('superadmin/dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }

	function logout()
	{
		//$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('admin/welcome', 'refresh');
	}
}
