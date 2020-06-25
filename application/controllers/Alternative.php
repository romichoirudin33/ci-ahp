<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternative extends CI_Controller {

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
		$data['data'] = $this->Alternative_model->getAll();
		$data['content'] = 'admin/alternative/index';
		$this->load->view('v_admin', $data, FALSE);
	}

	public function add()
	{
		if ($this->input->post('submit')) {
			$name = $this->input->post('name');
			$value = $this->input->post('value');

			$object = array(
				'name' => $name,
			);
			$this->Alternative_model->create($object);
			$alternative_id = $this->db->insert_id();

			foreach ($value as $k => $v) {
				$object = array(
					'alternative_id' => $alternative_id,
					'criteria_id' => $k,
					'value' => $v
				);
				$this->Detail_alternative_model->create($object);
			}

			$this->session->set_flashdata('info', 'Data Berhasil Di Tambah');
			redirect('alternative');

		}else{
			$data['content'] = 'admin/alternative/add';
			$data['criteria'] = $this->Criteria_model->getAll();
			$this->load->view('v_admin', $data, FALSE);
		}
	}

	public function delete($id = null)
	{
		if ($this->Alternative_model->delete($id)) {
			$this->session->set_flashdata('info', 'Data Berhasil Di Hapus !');
			redirect('alternative','refresh');
		}else{
			$this->session->set_flashdata('info', 'Data Gagal Di Hapus !');
			redirect('alternative','refresh');
		}
	}

	public function detail($id = null)
	{
		if ($this->Alternative_model->getId($id)) {
			$data['data'] = $this->Alternative_model->getId($id);
			$data['content'] = 'admin/alternative/detail';
			$this->load->view('v_admin', $data, FALSE);
		}else{
			redirect('alternative');
		}
	}

}

/* End of file Alternative.php */
/* Location: ./application/controllers/Alternative.php */