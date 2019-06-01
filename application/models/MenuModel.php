<?php

/**
* 
*/
class MenuModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getMenu() {
		$sql = "SELECT * FROM menu_makanan";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_makanan_keyword($keyword){
			$sql = "SELECT * FROM menu_makanan WHERE nama_makanan LIKE '%" .$keyword. "%'";
			// echo $sql; exit();
			$query = $this->db->query($sql);
			return $query->result_array();
		}

	public function delete($id) {
		$this->db->where('id',$id);
		$this->db->delete('menu_makanan');
	}

	public function simpan_data_makanan($data) {
		$this->db->insert('menu_makanan',$data);
	}

	public function edit_produk($id) {
		$this->db->select('*');
		$this->db->from('menu_makanan');
		$this->db->where('id',$id);
		return $this->db->get()->row_array();
	}

	public function ubah_data_makanan($data,$id) {
		$this->db->where('id',$id);
		$this->db->update('menu_makanan',$data);
	}

	public function detail_makanan($id) {
		$sql=" SELECT * FROM menu_makanan WHERE id = $id";
		$query=$this->db->query($sql);
		return $query->row(); // menampilkan satu data saja, karna ingin melihat detailnya
		
	}

	public function getMenuId() {
		$sql = "SELECT * FROM menu_makanan ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/*function get_no_pesanan(){
        $q = $this->db->query("SELECT MAX(RIGHT(no_order,4)) AS kd_max FROM pesanan_tbl WHERE DATE(tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy').$kd;
    }
 
    function simpan_pesanan($no_invoice){
        $hasil=$this->db->query("INSERT INTO pesanan_tbl (no_order) VALUES ('$no_order')");
        return $hasil;
    }*/

	public function simpan_pesanan($data) {
		$this->db->insert('pesanan_tbl',$data);
		$id_data = $this->db->insert_id();
		return (isset($id_data)) ? $id_data : FALSE;

	}

	public function simpan_detail_pesanan($data) {
		$this->db->insert('detail_order',$data);
	}
}