<?php
/**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('cart');

	}

	function index() {
		$this->load->view("body/header");
		$this->load->view("index");
		$this->load->view("body/footer");
	}
}