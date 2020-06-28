<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Criteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id') == null) {
			redirect('auth','refresh');
		}
		$this->load->model('Criteria_model');
		$this->load->model('Answer_model');
		//Do your magic here
	}

	public function index()
	{
		//todo hitung bobot kriteria dengan ahp
		$this->countWeight();

		$data['data'] = $this->Criteria_model->getAll();
		$data['content'] = 'admin/criteria/index';
		$this->load->view('v_admin', $data, FALSE);
	}

	public function add()
	{
		if ($this->input->post('submit')) {
			$name = $this->input->post('name');
			$value = $this->input->post('value');
			$object = array(
				'name' => $name,
				'value' => $value,
			);
			if ($this->Criteria_model->create($object)) {
				$this->session->set_flashdata('info', 'Data Berhasil Di Tambah');
				redirect('criteria');
			}else{
				$this->session->set_flashdata('info', 'Data Gagal Di Tambah');
				redirect('criteria');
			}
		}else{
			$data['content'] = 'admin/criteria/add';
			$this->load->view('v_admin', $data, FALSE);
		}
	}

	public function edit($id = null)
	{
		if ($this->input->post('submit')) {
			$name = $this->input->post('name');
			$value = $this->input->post('value');
			$object = array(
				'name' => $name,
				'value' => $value,
			);
			if ($this->Criteria_model->update($object, $id)) {
				$this->session->set_flashdata('info', 'Data Berhasil Di Update');
				redirect('criteria');
			}else{
				$this->session->set_flashdata('info', 'Data Gagal Di Tambah');
				redirect('criteria');
			}
		}else{
			if ($this->Criteria_model->getId($id)) {
				$data['data'] = $this->Criteria_model->getId($id);
				$data['content'] = 'admin/criteria/edit';
				$this->load->view('v_admin', $data, FALSE);
			}else{
				redirect('criteria');
			}
		}
	}

	public function delete($id = null)
	{
		if ($this->Criteria_model->delete($id)) {
			$this->session->set_flashdata('info', 'Data Berhasil Di Hapus !');
			redirect('criteria','refresh');
		}else{
			$this->session->set_flashdata('info', 'Data Gagal Di Hapus !');
			redirect('criteria','refresh');
		}
	}

	public function delete_answer($id = null)
	{
		$data = $this->Answer_model->getId($id);
		if ($this->Answer_model->delete($id)) {
			$this->session->set_flashdata('info', 'Data Berhasil Di Hapus !');
			redirect('criteria/detail/'.$data->criteria_id);
		}else{
			$this->session->set_flashdata('info', 'Data Gagal Di Hapus !');
			redirect('criteria/detail/'.$data->criteria_id);
		}
	}

	public function detail($id = null)
	{
		if ($this->input->post('submit')) {
			$name = $this->input->post('name');
			$value = $this->input->post('value');
			$criteria_id = $this->input->post('criteria_id');
			$object = array(
				'name' => $name,
				'value' => $value,
				'criteria_id' => $criteria_id,
			);
			if ($this->Answer_model->create($object)) {
				$this->session->set_flashdata('info', 'Data Berhasil Di Tambah');
				redirect('criteria/detail/'.$id);
			}else{
				$this->session->set_flashdata('info', 'Data Gagal Di Tambah');
				redirect('criteria/detail/'.$id);
			}
		}else{
			if ($this->Criteria_model->getId($id)) {
				$data['data'] = $this->Criteria_model->getId($id);
				$data['content'] = 'admin/criteria/detail';
				$this->load->view('v_admin', $data, FALSE);
			}else{
				redirect('criteria');
			}
		}
	}

	public function countWeight()
	{
		$criteria = $this->Criteria_model->getAll();
		$criteria_x = [];
		$criteria_y = [];
		$i = 0;
		foreach ($criteria as $key) {
			$criteria_x[$i] = $key->value;
			$criteria_y[$i] = $key->value;
			$i++;
		}

		$length = count($criteria);
		$tampung = [];
		for ($i=0; $i < $length; $i++) { 
			for ($j=0; $j < $length; $j++) { 
				$tampung[$i][$j] = $criteria_x[$i] / $criteria_x[$j];
			}
		}

		$normalisasi = [];
		for ($i=0; $i < $length; $i++) { 
			for ($j=0; $j < $length; $j++) { 
				$temp = 0;
				for ($k=0; $k<$length; $k++) {
					$temp += $tampung[$i][$k] * $tampung[$k][$j];
				}
				$normalisasi[$i][$j] = $temp;
			}
		}

		$hasil_tambah_normalisasi = [];
		$hasil_penjumlahan = 0;
		for ($i=0; $i < $length; $i++) { 
			$temp = 0;
			for ($j=0; $j < $length; $j++) { 
				$temp += $normalisasi[$i][$j];
			}
			$hasil_tambah_normalisasi[$i] = $temp;
			$hasil_penjumlahan += $temp;
		}

		$bobot_kriteria = [];
		for ($i=0; $i < $length; $i++) { 
			$bobot_kriteria[$i] = $hasil_tambah_normalisasi[$i] / $hasil_penjumlahan;
		}

		$i=0;
		foreach ($criteria as $key) {
			$id = $key->id;
			$object = array(
				'weight_value' => $bobot_kriteria[$i]
			);
			$this->Criteria_model->update($object, $id);
			$i++;
		}

		// echo json_encode($tampung);
		// echo "<br>";
		// echo json_encode($normalisasi);
		// echo json_encode($hasil_tambah_normalisasi);
		// echo json_encode($hasil_penjumlahan);
		// echo json_encode($bobot_kriteria);
	}

}

/* End of file Criteria.php */
/* Location: ./application/controllers/Criteria.php */