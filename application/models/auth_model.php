<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class auth_model extends CI_Model {

// untuk mengecek jumlah username dan password yang sesuai

	function login($username,$password) {
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('user');
		return $query->num_rows();
	}

//untuk mengambil data hasil login
	function data_login($username,$password) {
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get('user')->row();
	}

}