<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{	
		if ($this->input->post('submit')) {
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$data = $this->User_model->auth($user,$pass);
			if ($data) {
				$array = array(
					'name' => $data->name,
					'id' => $data->id,
				);
				$this->session->set_userdata( $array );
				redirect('/','refresh');
			}else{
				$this->session->set_flashdata('info', 'Login gagal username dan password tidak cocok');
				redirect('auth','refresh');
			}
		}else{
			$this->load->view('login');
		}
	}

	public function destroy()
	{
		$this->session->sess_destroy();
		redirect('auth','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */