<?php 
class Loginmodel extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->table = "user";
	}
	function cekLogin($user,$pass){
		$this->db->select('user,pass,nama,level');
		$this->db->from($this->table);
		$this->db->where('user', $user, TRUE);
		$this->db->where('pass',"md5('$pass')", FALSE);
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return false;
		}else{
			return true;
		}
	}
	function getDataforsession($user,$pass){
		$this->db->select('user,nama,level');
		$this->db->from($this->table);
		$this->db->where('user', $user, TRUE);
		$this->db->where('pass',"md5('$pass')", FALSE);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row[0];
	}
}
?>