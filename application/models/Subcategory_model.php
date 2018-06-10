<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subcategory_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_subcategory()
	{
			  $result=$this->db->select('*')
					->from('tbl_altkategori','tbl_kategori')
					->join('tbl_kategori', 'tbl_altkategori.kategori_id=tbl_kategori.kategori_id','LEFT OUTER')
					->get()->result();

		return $result;
 		
	}

	public function add_subcategory($data)
	{
		$result=$this->db->insert('tbl_altkategori',$data);
		return $result;
	}

	public function edit_subcategory($id)
	{
		$result=$this->db->select('*')
					->from('tbl_altkategori')
					->where('altkategori_id',$id)
					->get()->result();

		return $result;
	}

	public function delete_subcategory($id)
	{
		$result=$this->db
					->delete('tbl_altkategori',array('altkategori_id' => $id));
		return $result;
	}		

	public function update_subcategory($id,$data)
	{
		
		$result=$this->db
					->where('altkategori_id',$id)
					->update('tbl_altkategori',$data);
		return $result;
	}

	public function get_subcategorybyId($kategori_id)
	{
		$result=$this->db->select('*')
					->from('tbl_altkategori')
					->where('kategori_id',$kategori_id)
					->get()->result();

		return $result;
	}

	

}
?>