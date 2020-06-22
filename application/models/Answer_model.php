<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer_model extends CI_Model {

	private $table = 'answer';

	public function getAll()
	{
		return $this->db->get($this->table)->result_object();
	}

	public function getId($id = '')
	{
		$this->db->where('id', $id);
		return $this->db->get($this->table)->row();
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

/* End of file Answer_model.php */
/* Location: ./application/models/Answer_model.php */