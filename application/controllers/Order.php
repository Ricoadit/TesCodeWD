<?php

	/**
	* 
	*/
	class Order extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("MenuModel");
		}

		public function index() {
		$data["menu"] = $this->MenuModel->getMenu();
		$this->load->view("body/header");
		$this->load->view("pesanan/pesanan",$data);
		$this->load->view("body/footer");
		}

		public function caridata() {
		$data["menu"] = $this->MenuModel->getMenu();
		$this->load->view("body/header");
		$keyword = $this->input->get('keyword');
		$data['menu']=$this->MenuModel->get_makanan_keyword($keyword);
		$this->load->view("pesanan/pesanan",$data);
		$this->load->view("body/footer");
		}

		function simpan_pesanan(){
        $no_order=$this->input->post('no_order');
        $this->m_invoice->simpan_pesanan($no_order);
        redirect('Menu');
    }
}