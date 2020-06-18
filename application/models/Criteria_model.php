<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Criteria_model extends CI_Model {

	private $table = 'criteria';

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

/* End of file Criteria_model.php */
/* Location: ./application/models/Criteria_model.php */