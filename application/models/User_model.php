<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public $table = 'users';

	public function auth($user = null, $pass = null){
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		return $this->db->get($this->table)->row();
	}
	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */