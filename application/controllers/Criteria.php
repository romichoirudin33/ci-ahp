<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Criteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data['content'] = 'admin/criteria/index';
		$this->load->view('v_admin', $data, FALSE);
	}

}

/* End of file Criteria.php */
/* Location: ./application/controllers/Criteria.php */