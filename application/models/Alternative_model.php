<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternative_model extends CI_Model {

	private $table = 'alternative';

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

/* End of file Alternative_model.php */
/* Location: ./application/models/Alternative_model.php */