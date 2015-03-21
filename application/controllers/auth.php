<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
			parent::__construct();

			$this->load->model('model_operator');

	}


	public function login()
	{
	
		// $this->load->view('form-login');

		if (isset($_POST['submit'])) {
			
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			// $this->load->model('model_operator');
			$hasil    = $this->model_operator->login($username,$password);
			if ($hasil == 1 ) {

				$this->db->where('username',$username);
				$this->db->update('operator',array('last_login'=>date('Y-m-d')));
				$this->session->set_userdata(array('status_login'=>'oke','username'=>$username));
				redirect('dashboard');
			} else {

				redirect('auth/login');
			}

		} else {
			// $this->load->view('form-login');	
			$this->template->load('template_login','form-login');		
		}
	}

	public function logout(){

		$this->session->sess_destroy();
		redirect('auth/login');
	}
}

