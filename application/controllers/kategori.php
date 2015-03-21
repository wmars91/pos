<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_kategori');
	
	}

	function index(){
		 $this->load->library('pagination');
		 $config['base_url'] = base_url().'index.php/kategori/index/';
		 $config['total_rows'] = $this->model_kategori->show_Data()->num_rows();
		 $config['per_page'] = 4;
		$this->pagination->initialize($config);
		$data['paging'] =  $this->pagination->create_links();
		
		$halaman = $this->uri->segment(3);
		$halaman = $halaman==''?0:$halaman;	
		$data['record'] = $this->model_kategori->paging($halaman);
		// $this->load->view('kategori/lihat_data',$data);
		$this->template->load('template','kategori/lihat_data',$data);
	}

	function insert(){
			if (isset($_POST['submit'])) {
				// proses input
				$this->model_kategori->insert();
				redirect('kategori'); //kembali ke firm lohat data

			} else {
				// $this->load->view('kategori/form_input');
				$this->template->load('template','kategori/form_input');
			}
	}

	function edit(){
		if (isset($_POST['submit'])) {
				// proses input
				$this->model_kategori->edit();
				redirect('kategori'); //kembali ke form lihat data

			} else {
				$id = $this->uri->segment(3);
				$data['record'] = $this->model_kategori->get_one($id)->row_array();
				// $this->load->view('kategori/form_edit',$data);
				$this->template->load('template','kategori/form_edit',$data);
			}	
	}

	function delete(){
		$id = $this->uri->segment(3);
		$this->model_kategori->delete($id);
		redirect('kategori');
	}
}