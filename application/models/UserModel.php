<?php

class UserModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('array');
			$this->load->helper('url');
			$this->load->database();
		}

		/*public function validation ($simpan) {
			$this->load->library('form_validation');
			if ($simpan == "save");
				$this->form_validation->set_rules('name','nama', 'trim|required|min_length[4]|max_length[22]');
				$this->form_validation->set_rules('email','email', 'required|valid_email|is_unique[customer_tbl.email]');
				$this->form_validation->set_rules('no_tlp','no telepon', 'trim|required|min_length[11]|max_length[13]');
				$this->form_validation->set_rules('alamat','alamat', 'trim|required|min_length[10]|max_length[30]');
				$this->form_validation->set_rules('username','username', 'required|is_unique[customer_tbl.username]');
				$this->form_validation->set_rules('password','password', 'trim|required|min_length[8]|max_length[22]');

				$this->form_validation->set_message('required','{field} Mohon untuk mengisi form dengan benar');
				$this->form_validation->set_message('valid_email', 'format email tidak benar');
				$this->form_validation->set_message('numeric', 'No telepon harus angka');
				$this->form_validation->set_message('is_unique', '%s telah dipakai silahkan gunakan email yang lain');

				if($this->form_validation->run())
					return TRUE;
				else 

					return FALSE;
		}*/

		public function get_by_id($id) {
			$this->db->where('uname',$uname);
			$this->db->where('status',$status['kasir'])
			$query = $this->db->get('admin');
			return $query->row_array();
		}
	}