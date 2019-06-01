<?php
/**
* 
*/
class AdminModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function cheklogin($uname,$password){
		$this->db->from('admin');
		$this->db->where("uname",$uname);
		$this->db->where("password",md5($password));
		

		return $this->db->get()->num_rows();
	}
}