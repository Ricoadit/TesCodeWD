<?php
/**
* 
*/
class Menu extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MenuModel');
		$this->load->library('cart');
		$this->load->database();

	}

	public function index() {
		$data["menu"] = $this->MenuModel->getMenu();
		$this->load->view("body/header");
		$this->load->view("produk/menu_makanan",$data);
		$this->load->view("body/footer");
		
	}

	public function caridata() {
		$data["menu"] = $this->MenuModel->getMenu();
		$this->load->view("body/header");
		
		
		$keyword = $this->input->get('keyword');
		$data['menu']=$this->MenuModel->get_makanan_keyword($keyword);
		$this->load->view("produk/menu_makanan",$data);
		$this->load->view("body/footer");
	}

	public function hapus($id) {
		$data["menu"] = $this->MenuModel->delete($id);
		$this->load->view("body/header");
		$this->load->view("produk/menu_makanan",$data);
		$this->load->view("body/footer");

		redirect('menu');
	} 

	public function simpan_data_makanan() {
		$config['upload_path'] = './assets/img';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 40000;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload("gambar");
		$data = $this->upload->data();

		$gambar = $data['file_name'];

		$data_produk = array('nama_makanan' =>$this->input->post('nama_makanan'),
							'kategori' 		=>$this->input->post('kategori'),
							'satuan' 		=>$this->input->post('satuan'),
							'harga' 		=>$this->input->post('harga'),
							'status'		=>$this->input->post('status'),
							'gambar' 		=>$gambar);

		$simpan_data = $this->MenuModel->simpan_data_makanan($data_produk);
		//var_dump($data_produk); exit;
		$data["menu"] = $this->MenuModel->getMenu();
		$this->load->view("body/header");
		$this->load->view("produk/menu_makanan",$data);
		$this->load->view("body/footer");

		redirect('menu');
	}

	public function edit_produk($id) {
		$data["menu"] = $this->MenuModel->edit_produk($id);
		//$data["makanan"] = $this->MenuModel->getMenu($id);
		$this->load->view("body/header");
		$this->load->view("produk/edit",$data);
		$this->load->view("body/footer");


	} 

		public function edit_data_makanan($id) {
		$config['upload_path'] = './assets/img';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 40000;
		$gambar = $this->input->post('gambar_old');

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload("gambar");
		$data = $this->upload->data();

		if ($this->upload->do_upload("gambar")) {
		$gambar = $data['file_name'];
		}
		$data_produk = array('nama_makanan' =>$this->input->post('nama_makanan'),
							'kategori' 		=>$this->input->post('kategori'),
							'satuan' 		=>$this->input->post('satuan'),
							'harga' 		=>$this->input->post('harga'),
							'gambar' 		=>$gambar);

		$simpan_data = $this->MenuModel->ubah_data_makanan($data_produk,$id);
		$data["menu"] = $this->MenuModel->getMenu();

		$this->load->view("body/header");
		$this->load->view("produk/menu_makanan",$data);
		$this->load->view("body/footer");

		redirect('menu');
	}

	public function detail_makanan($id) {
		$data["menu"] = $this->MenuModel->detail_makanan($id);
		$this->load->view("body/header");
		$this->load->view("produk/detail_makanan",$data);
		$this->load->view("body/footer");
	}

	public function order() {
		$data = array(
						'id' 			=> $this->input->post('id'),
						'name' 	=> $this->input->post('nama_makanan'),
						'kategori' 		=> $this->input->post('kategori'),
						'satuan' 		=> $this->input->post('satuan'),
						'qty' =>$this->input->post('qty'),
						'price' 		=> $this->input->post('harga'),
						'status' 		=> $this->input->post('status'),
						'gambar' 		=> $this->input->post('gambar'),
					); array(
						'id' 			=> $this->input->post('id'),
						'name' 			=> $this->input->post('nama_makanan'),
						'kategori' 		=> $this->input->post('kategori'),
						'satuan' 		=> $this->input->post('satuan'),
						'qty'			 =>$this->input->post('qty'),
						'price' 		=> $this->input->post('harga'),
						'status' 		=> $this->input->post('status'),
						'gambar' 		=> $this->input->post('gambar')
					);

				$this->cart->insert($data);
				$this->session->set_flashdata('flash','berhasil ditambahkan...');
				//var_dump($data); exit;
				redirect('Menu');
	}

	public function data_order() {
		//$data['menu']=$this->MenuModel->get_no_order();
		$data["menu"] = $this->MenuModel->getMenuId();
		$this->load->view("body/header");
		$this->load->view("produk/pesanan",$data);
		$this->load->view("body/footer");
	}

	/*public function simpan_order() {
		$no_order=$this->input->post('no_order');
		$this->MenuModel->simpan_order($no_order);
		redirect('Menu');
	}*/

	

	public function hapusdatapesanan($id) {
		$data = array('rowid'=>$id,
						'qty' =>0);
		$this->cart->update($data);
		redirect('Menu/data_order');
	}

	public function update_orderan() {
		$cartorder = $_POST['cart'];
		foreach ($cartorder as $id => $cart) {
		
		$rowid = $cart['rowid'];
		$price = $cart['price'];
		$gambar = $cart['gambar'];
		$jumlah = $price * $cart['qty'];
		$qty = $cart['qty'];


		$data = array('rowid' =>$rowid,
					'price' =>$price,
					'gambar' =>$gambar,
					'amount' =>$jumlah,
					'qty' =>$qty); 
		$this->cart->update($data);
 
		}

		redirect('Menu/data_order');
		
	}

	public function simpan_pesanan() {
		//$session = $this->session->userdata("username");
		
		$tgl_order = date("Y-m-d");
		$no_bangku = $this->input->get('no_bangku', TRUE);
		$total_harga = $this->input->get('total_harga', TRUE);

		$data_order = array('tgl_order' =>$tgl_order,
							'no_bangku' =>$no_bangku,
							'total_harga' =>$total_harga
		);
		//var_dump($data_order); exit; 
		$id_order = $this->MenuModel->simpan_pesanan($data_order);

		if ($cart = $this->cart->contents()) {
			foreach ($cart as $item) {
				$data_detail = array('no_order' => $id_order,
										'id' => $item['id'],
										'qty' =>$item['qty'],
										'harga' => $item['subtotal']);
				$simpan = $this->MenuModel->simpan_detail_pesanan($data_detail);
			}
		}

		$this->cart->destroy();
		$data["menu"] = $this->MenuModel->getMenu();
		$this->load->view("body/header");
		$this->load->view("produk/menu_makanan",$data);
		$this->load->view("body/footer");
		$this->cart->destroy();
		redirect('Menu');
	}

	 public function chekoutfunction() {
        /*$data["get_data_user"]=$this->UserModel->get_by_id($this->session->userdata('uname'));*/
      
        $this->load->view("produk/chekout_pesanan");
        $this->load->view("body/footer");
    }


}