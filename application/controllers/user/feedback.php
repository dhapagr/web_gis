<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		if($this->session->userdata('role_user') != 'umum'){
			redirect('user/login');
		}
	}
	
	public function add()
    {
		$this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('subject', 'subject', 'required');
        $this->form_validation->set_rules('message', 'message', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!');
      
        $data = array(
			'nama' 		    => $this->input->post('name'),
			'email' 		=> $this->input->post('email'),
			'subject' 		=> $this->input->post('subject'),
			'isi' 		    => $this->input->post('message'),
		);

		$table = "tb_feedback";
		$data2 = $this->admin_model->insert_table($table, $data);
		if($data2)
		{
			// echo "success";
			redirect('Welcome');
		}
		else{
			echo "gagal";
		}
    }
}
