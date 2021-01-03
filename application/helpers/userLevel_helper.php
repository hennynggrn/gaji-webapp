<?php 
	function authUserLevel() {
		$ci =& get_instance();

		if ($ci->session->userdata('user_level_id') !== NULL) {
			$token_id = $ci->session->userdata('user_level_id');
			$auth_level = array('0', '1', '2'); // except these read-only

			if (in_array($token_id, $auth_level)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}		

	function authUserAdmin() {
		$ci =& get_instance();

		if ($ci->session->userdata('user_level_id') !== NULL) {
			$token_id = $ci->session->userdata('user_level_id');
			// developer & admin
			$auth_level = array('0', '1');

			if (in_array($token_id, $auth_level)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	function authUserDeveloper() {
		$ci =& get_instance();

		if ($ci->session->userdata('user_level_id') !== NULL) {
			$token_id = $ci->session->userdata('user_level_id');

			if ($token_id == 0) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	function authUserLimited() {
		$ci =& get_instance();

		if ($ci->session->userdata('user_level_id') !== NULL) {
			$token_id = $ci->session->userdata('user_level_id');
			$auth_level = array('3');// for Kepsek -> gaji, pegawai, & laporan

			if (in_array($token_id, $auth_level)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
?>
