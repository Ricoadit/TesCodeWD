<?php

/**
* 
*/
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('AdminModel');
	}

	public function index() {
		$this->load->view('admin/index');
	}

	public function loginsubmit() {
		$this->form_validation->set_rules('uname','uname','required',array('required'=>'Silahkan masukan username anda'));
		$this->form_validation->set_rules('password','password','required',array('required'=>'Silahkan masukan password anda'));

		if($this->form_validation->run()==false){
			$this->load->view("admin/index");
		}
		else {
			if ($this->AdminModel->cheklogin($_POST["uname"],$_POST["password"])>0) {
				$this->session->set_userdata("uname",$_POST["uname"]);
				redirect(base_url() . "Home");
			}
			else {
				$data["loginerror"]="username dan password anda salah";
				$this->load->view("admin/index",$data);
			}
		}
	} 

	public function logout() {
		$this->session->sess_destroy();
		redirect('admin/index');
	}
}
