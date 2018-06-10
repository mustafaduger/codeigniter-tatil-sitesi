<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Firmoperation_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_firm()
	{
		$result=$this->db->select('*')
					->from('tbl_firma')
					->get()->result();

		return $result;
	}


	public function get_firmbyId($id)
	{
		$result=$this->db->select('*')
					->from('tbl_firma')
					->where('firma_id',$id)
					->get()->row();

		return $result;
	}



































	public function add_category($data)
	{
		$result=$this->db->insert('tbl_kategori',$data);
		return $result;
	}

	public function edit_category($id)
	{
		$result=$this->db->select('*')
					->from('tbl_kategori')
					->where('kategori_id',$id)
					->get()->result();

		return $result;
	}

	public function delete_category($id)
	{
		$result=$this->db
					->delete('tbl_kategori',array('kategori_id' => $id));
		return $result;
	}		

	public function update_category($id,$data)
	{
		
		$result=$this->db
					->where('kategori_id',$id)
					->update('tbl_kategori',$data);
		return $result;
	}

}
?>