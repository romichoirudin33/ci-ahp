<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternative extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Criteria_model');
		$this->load->model('Answer_model');
		$this->load->model('Alternative_model');
	}

	public function index()
	{
		$data['data'] = $this->Alternative_model->getAll();
		$data['content'] = 'admin/alternative/index';
		$this->load->view('v_admin', $data, FALSE);
	}

}

/* End of file Alternative.php */
/* Location: ./application/controllers/Alternative.php */