<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {

		function __construct(){
		parent::__construct();
		$this->load->model('model_barang');
		// cek_session();
	}

	
	function index(){
		$this->load->library('pagination');
		$config['base_url'] 	= base_url().'index.php/kategori/index/';
		$config['total_rows'] 	= $this->model_barang->tampil_data()->num_rows();
   	    $config['per_page'] 	= 4;
		$this->pagination->initialize($config);
		$data['paging'] 		=  $this->pagination->create_links();
		
		$halaman = $this->uri->segment(3);
		$halaman = $halaman==''?0:$halaman;	
		$data['record'] = $this->model_barang->paging($halaman,$config['per_page']);
		
		// $data['record'] = $this->model_barang->tampil_data();
		// $this->load->view('barang/lihat_data',$data);
		$this->template->load('template','barang/lihat_data',$data);
	}

	function insert(){
		if (isset($_POST['submit'])) {
				// proses input
				// $this->model_barang->insert();
				$nama 		= $this->input->post('nama_barang');
				$kategori 	= $this->input->post('kategori');
				$harga 		= $this->input->post('harga');
				$data 		= array('nama_barang'=>$nama,
									'kategori_id'=>$kategori,
									'harga'=>$harga	);
				// print_r($data);
				// die;
				$this->model_barang->insert($data);
				redirect('barang'); //kembali ke firm lohat data

			} else {
				$this->load->model('model_kategori');
				$data['kategori'] = $this->model_kategori->show_data()->result();
				// $this->load->view('barang/form_input',$data);
				$this->template->load('template','barang/form_input',$data);
			}
	}

	function edit(){
				if (isset($_POST['submit'])) {
				$id 		= $this->input->post('id_barang');
				$nama 		= $this->input->post('nama_barang');
				$kategori 	= $this->input->post('kategori');
				$harga 		= $this->input->post('harga');
				$data 		= array('nama_barang'=>$nama,
									'kategori_id'=>$kategori,
									'harga'=>$harga	);
				// print_r($data);
				// die;
				$this->model_barang->edit($data,$id);
				redirect('barang'); //kembali ke firm lohat data

			} else {
				$id = $this->uri->segment(3);
				$this->load->model('model_kategori');
			    $data['kategori'] = $this->model_kategori->show_data()->result();
				$data['record'] = $this->model_barang->get_one($id)->row_array();
				// $this->load->view('barang/form_edit',$data);
				$this->template->load('template','barang/form_edit',$data);
			}
	}

	function get_one($id){
				$param = array('id_barang'=>$id);
				return $this->db->get_where('barang',$param);

	}

	function delete(){
		$id = $this->uri->segment(3);
		$this->model_barang->delete($id);
		redirect('barang');
	}
}