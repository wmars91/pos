<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_transaksi extends CI_Model {


	function simpan_barang(){
		$nama_barang = $this->input->post('barang');
		$qty		 = $this->input->post('qty');
		$data_barang = $this->db->get_where('barang',array('nama_barang'=>$nama_barang))->row_array();
		$id_barang	 = $data_barang['id_barang'];
		$harga		 = $data_barang['harga'];
		$data 		 = array('barang_id'=>$id_barang,
							 'qty'=> $qty,
							 'harga'=> $harga,
							 'status'=>'0');
		$this->db->insert('transaksi_detail',$data);
	}

	function tampil_detail_transaksi(){
		$query = "select a.detail_id,a.qty,a.harga,b.nama_barang from transaksi_detail as a, barang as b where a.			  barang_id=b.id_barang and a.status ='0' ";
		return $this->db->query($query);
	}


	function hapusitem($id){
		$this->db->where('detail_id',$id);
		$this->db->delete('transaksi_detail');	
	}

	function selesai_belanja($data){
		$this->db->insert('transaksi',$data);
		$id_transaksi = $this->db->query("select id_transaksi from 
										 transaksi order by id_transaksi desc limit 1")->row_array();
		$this->db->query("update transaksi_detail set 
						  status='1',transaksi_id=$id_transaksi[id_transaksi] where status='0' ");	
	}

	function laporan_default(){
		$query = " SELECT a.tanggal_transaksi,a.operator_id,c.nama_lengkap,sum(b.harga*b.qty) as total FROM 
				  transaksi as a ,transaksi_detail as b,operator as c where b.transaksi_id = a.id_transaksi 
				  and a.operator_id=c.id_operator group by b.transaksi_id ";
		return $this->db->query($query);
	}

	function laporan_periode($tgl1,$tgl2){
		$query = " SELECT a.tanggal_transaksi,a.operator_id,c.nama_lengkap,sum(b.harga*b.qty) as total FROM 
				  transaksi as a ,transaksi_detail as b,operator as c where b.transaksi_id = a.id_transaksi 
				  and a.operator_id=c.id_operator and a.tanggal_transaksi between '$tgl1' and '$tgl2' 
				  group by b.transaksi_id ";
		return $this->db->query($query);
	}
}

























