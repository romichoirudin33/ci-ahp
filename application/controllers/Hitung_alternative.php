<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hitung_alternative extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Criteria_model');
		$this->load->model('Answer_model');
		$this->load->model('Alternative_model');
		$this->load->model('Detail_alternative_model');
	}

	public function index()
	{
		
	}

}

/* End of file Hitung_alternative.php */
/* Location: ./application/controllers/Hitung_alternative.php */