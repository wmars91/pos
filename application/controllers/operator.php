<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operator extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_operator');
		// cek_session();
	}

 	function index(){
 		$data['record'] = $this->model_operator->tampil_data();
		// $this->load->view('operator/lihat_data',$data);
		$this->template->load('template','operator/lihat_data',$data);
 }

 function insert(){
		if (isset($_POST['submit'])) {
				$nama 		= $this->input->post('nama',true);
				$username 	= $this->input->post('username',true);
				$password 	= $this->input->post('password',true);
				$data 		= array('nama_lengkap'=>$nama,
									'username'=>$username,
									'password'=>md5($password));
				
				$this->db->insert('operator',$data);
				redirect('operator'); //kembali ke firm lohat data

			} else {
				// $this->load->view('operator/form_input');
				$this->template->load('template','operator/form_input');
			}
	}

	function edit(){
				if (isset($_POST['submit'])) {
				$id 		= $this->input->post('id',true);
				$nama 		= $this->input->post('nama',true);
				$username 	= $this->input->post('username',true);
				$password	= $this->input->post('password',true);
				if (empty($password)) {
					$data 		= array('nama_lengkap'=>$nama,
										'username'=>$username);
				
				} else {
					$data 		= array('nama_lengkap'=>$nama,
									'username'=>$username,
									'password'=>md5($password)	);
				

				}
				// print_r($data);
				// die;
				$this->db->where('id_operator',$id);
				$this->db->update('operator',$data);
				// $this->model_barang->edit($data,$id);
				redirect('operator'); //kembali ke firm lohat data

			} else {
				$id = $this->uri->segment(3);
				$this->load->model('model_operator');
			    // $data['kategori'] = $this->model_kategori->show_data()->result();
				$data['record'] = $this->model_operator->get_one($id)->row_array();
				// $this->load->view('operator/form_edit',$data);
				$this->template->load('template','operator/form_edit',$data);
			}
	}

	function delete(){
		$id = $this->uri->segment(3);
		$this->db->where('id_operator',$id);
		$this->db->delete('operator');
		redirect('operator');
	}

}