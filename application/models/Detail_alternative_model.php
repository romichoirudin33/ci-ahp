<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_alternative_model extends CI_Model {

	private $table = 'detail_alternative';

	public function getAll()
	{
		return $this->db->get($this->table)->result_object();
	}

	public function getId($id = '')
	{
		$this->db->where('id', $id);
		return $this->db->get($this->table)->result_object();
	}

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('id' => $id));
	}

	public function delete($id ='')
	{
		return $this->db->delete($this->table, array('id' => $id));
	}

}

/* End of file Detail_alternative_model.php */
/* Location: ./application/models/Detail_alternative_model.php */