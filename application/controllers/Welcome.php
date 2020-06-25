<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['content'] = 'admin/welcome';
		$this->load->view('v_admin', $data, FALSE);
		// $this->load->view('welcome_message');
	}
}
