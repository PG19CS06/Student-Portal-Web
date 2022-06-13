<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function login($username,$password)
	{
	 $this->db->select('*');
	 $this->db->from('tbl_users');
	 $this->db->where('username',$username);
	 $this->db->where('password',$password);
	 $data=$this->db->get()->result_array();
	 return $data;
	}
}
