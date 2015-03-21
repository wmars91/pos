<?php

	function cek_session(){
		$CI 		=	& get_instance(); 
		$session	=	$CI->session->set_userdata('status_login');

		if ($session != 'oke') {
			 redirect('auth/login');
		}
	}

?>