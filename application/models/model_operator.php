<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_operator extends CI_Model {


	public function login($username,$password){
		$test = $this->db->get_where('operator',array('username'=>$username,'password'=> md5($password)));

		if ($test->num_rows()>0) {
			return 1;
		} else {
			return 0;
		}
	}

	public function tampil_data(){
		return $this->db->get('operator');
	}


	public function get_one($id){

		$param = array('id_operator'=>$id);
		return $this->db->get_where('operator',$param);
	}


}

