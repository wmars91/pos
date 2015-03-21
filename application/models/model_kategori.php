<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_kategori extends CI_Model {

	public function show_data(){
		return $this->db->get('kategori_barang');
	}

	public function insert(){
		$data = array(
						'nama_kategori'=>$this->input->post('kategori')
					 );
		$this->db->insert('kategori_barang',$data);
	}
	
	public function paging($page){
		return $this->db->query("select * from kategori_barang limit $page,4");
	}

	public function edit(){
				$data = array(
						'nama_kategori'=>$this->input->post('kategori')
					 );
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('kategori_barang',$data);

	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('kategori_barang');
	}

	public function get_one($id){

		$param = array('id'=>$id);
		return $this->db->get_where('kategori_barang',$param);
	}
}