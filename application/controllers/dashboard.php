<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	

	

	function index(){
		// $this->load->view('view_dashboard');
		$this->template->load('template','view_dashboard');
	}


}