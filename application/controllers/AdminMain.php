<?php

/**
* 
*/
class AdminMain extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('AdminModel');
	}

	public function index() {
		$this->load->view("body/header");
		$this->load->view("index");
		$this->load->view("body/footer");
	}
}