<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_barang extends CI_Model {


	function tampil_data(){

		$query = "select b.id_barang,b.nama_barang,b.harga,kb.nama_kategori
					from barang as b, kategori_barang as kb where b.kategori_id=kb.id";
		return $this->db->query($query);
	}
	
	 function paging($page,$halaman){
		$query = "select b.id_barang,b.nama_barang,b.harga,kb.nama_kategori
					from barang as b, kategori_barang as kb where b.kategori_id=kb.id limit $page,$halaman";
		return $this->db->query($query);
		
		}

	public function insert($data){
		$this->db->insert('barang',$data);
	}

	public function get_one($id){

		$param = array('id_barang'=>$id);
		return $this->db->get_where('barang',$param);
	}

	public function edit($data,$id){

		$this->db->where('id_barang',$id);
		$this->db->update('barang',$data);

	}

	public function delete($id){
		$this->db->where('id_barang',$id);
		$this->db->delete('barang');
	}



}