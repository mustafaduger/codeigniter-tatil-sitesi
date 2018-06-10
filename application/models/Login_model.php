<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	
	public function admin_login($username,$password)
	{
		$result=$this->db->select('*')
					->from('admin')
					->where('username',$username)
					->where('password',$password)
					//->where('sifre',sha1(md5($sifre)))
					->get()->row();

		return $result;
	}
}
?>