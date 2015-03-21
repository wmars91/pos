<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(array('model_barang','model_transaksi'));
		// cek_session();
	}

	function index(){

		if (isset($_POST['submit'])) {
			
			$this->model_transaksi->simpan_barang();
			redirect('transaksi');
		} else {

			$data['record'] = $this->model_barang->tampil_data();
			$data['detail'] = $this->model_transaksi->tampil_detail_transaksi();
			$this->template->load('template','transaksi/form_transaksi',$data);
		}

	}

	function hapusitem(){
		$id = $this->uri->segment(3);
		$this->model_transaksi->hapusitem($id);
		redirect('transaksi');
	}

	function selesai_belanja(){

		$date = date('Y-m-d');
		$user = $this->session->userdata('username');
		$id_operator = $this->db->get_where('operator',array('username'=>$user))->row_array();

		$data = array('operator_id'=>$id_operator['id_operator'],
					  'tanggal_transaksi'=>$date,
					  );
		$this->model_transaksi->selesai_belanja($data); 
		redirect('transaksi');
	}

	function laporan(){
		if (isset($_POST['submit'])) {
			
			$tgl1 = $this->input->post('tgl1');
			$tgl2 = $this->input->post('tgl2');
			$data['record'] = $this->model_transaksi->laporan_periode($tgl1,$tgl2);
			$this->template->load('template','transaksi/laporan',$data);			
			// redirect('transaksi/laporan_periode',$data);			

			} else {

			$data['record']= $this->model_transaksi->laporan_default();
			$this->template->load('template','transaksi/laporan',$data);			
			
			}

	}
	function excel(){		
		header("Content-type=application/vnd.ms-excel");
		header("Content-dispostion:attachment;filename=laporantransaksi.xls");
		$data['record']= $this->model_transaksi->laporan_default();
		$this->load->view('transaksi/laporan_excel',$data);
	}
	
	function pdf(){
		$this->load->library('cfpdf');
		
		$pdf=new FPDF('L','mm','A4'); //L=lanscape mm=milimeter A4=paper
		$pdf->AddPage();
		//Header
		$pdf->SetFontSize(14);
		$pdf->SetFont('Arial','B','L');
		$pdf->Text(10, 10, 'LAPORAN TRANSAKSI');
		
		$pdf->Cell(20,10,'','',1); //spasi
		
		//header table
		$pdf->SetFontSize(12);
		$pdf->SetFont('Arial','B','L');
		$pdf->Cell(10,7,'No',1,0);
		$pdf->Cell(50,7,'Tanggal Transaksi',1,0);
		$pdf->Cell(50,7,'Operator',1,0);
		$pdf->Cell(50,7,'Transaksi',1,1);
		
		//data from database
		$pdf->SetFont('Arial','','L');
		$data = $this->model_transaksi->laporan_default();
		$total=0;
		$no=1;
		foreach ($data->result() as $r) {
		
		$pdf->Cell(10,7,$no,1,0);
		$pdf->Cell(50,7,$r->tanggal_transaksi,1,0);
		$pdf->Cell(50,7,$r->nama_lengkap,1,0);
		$pdf->Cell(50,7,$r->total,1,1);
		$no++;
		$total=$total+$r->total;
		}
		//end data
		$pdf->SetFont('Arial','B','L');
		$pdf->Cell(110,7,'Total Transaksi',1,0,'C'); // C = center
		$pdf->Cell(50,7,$total,1,1);
		$pdf->Output();
	}

}
