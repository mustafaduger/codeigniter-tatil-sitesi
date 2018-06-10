<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categoryexplore_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_category()
	{
		$result=$this->db->select('*')
					->from('tbl_kategorikesfet')
					->get()->result();

		return $result;
	}

	public function add_category($data)
	{
		$result=$this->db->insert('tbl_kategorikesfet',$data);
		return $result;
	}

	public function edit_category($id)
	{
		$result=$this->db->select('*')
					->from('tbl_kategorikesfet')
					->where('kategori_id',$id)
					->get()->result();

		return $result;
	}

	public function delete_category($id)
	{
		$result=$this->db
					->delete('tbl_kategorikesfet',array('kategori_id' => $id));
		return $result;
	}		

	public function update_category($id,$data)
	{
		
		$result=$this->db
					->where('kategori_id',$id)
					->update('tbl_kategorikesfet',$data);
		return $result;
	}

	public function getAll_categoryActive()
	{
		$result=$this->db->select('*')
					->from('tbl_kategorikesfet')
					->where('kategori_isActive',1)
					->get()->result();

		return $result;
	}

}
?>