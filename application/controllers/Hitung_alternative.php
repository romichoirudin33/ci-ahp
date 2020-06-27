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
		//todo hitung bobot kriteria dengan ahp
		$this->countWeight();

		$data['alternative'] = $this->Alternative_model->getAll();
		$data['criteria'] = $this->Criteria_model->getAll();
		$data['content'] = 'admin/hitung_alternative/index';
		$this->load->view('v_admin', $data, FALSE);
	}

	public function countWeight()
	{
		$cri = $this->Criteria_model->getAll();
		// $this->db->where('id', 5);
		// $cri = $this->db->get('criteria')->result_object();

		foreach ($cri as $c) {
			$this->db->where('criteria_id', $c->id);
			$criteria = $this->db->get('detail_alternative')->result_object();

			$criteria_x = [];
			$i = 0;
			foreach ($criteria as $key) {
				$criteria_x[$i] = $key->value;
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
				$this->Detail_alternative_model->update($object, $id);
				$i++;
			}

			// echo json_encode($tampung);
			// echo "<br>";
			// echo json_encode($normalisasi);
			// echo json_encode($hasil_tambah_normalisasi);
			// echo json_encode($hasil_penjumlahan);
			// echo json_encode($bobot_kriteria);
		}

		$alternative = $this->Alternative_model->getAll();
		foreach ($alternative as $a) {
			$this->db->where('alternative_id', $a->id);
			$detail = $this->db->get('detail_alternative')->result_object();

			$bobot = 0;
			foreach ($detail as $d) {
				$cri = $this->Criteria_model->getId($d->criteria_id);
				$bobot += ($d->weight_value * $cri->weight_value);
			}

			$object = array(
				'weight_value' => $bobot
			);
			$this->Alternative_model->update($object, $a->id);
		}

	}

	public function edit($id='')
	{
		$data = $this->Alternative_model->getId($id);
		if ($data) {
			$object = array(
				'status' => $data->status == "0" ? "1" : "0",
			);
			$this->Alternative_model->update($object, $id);
			$this->session->set_flashdata('info', 'Data Berhasil Di Update');
		}
		redirect('hitung_alternative');
	}

}

/* End of file Hitung_alternative.php */
/* Location: ./application/controllers/Hitung_alternative.php */