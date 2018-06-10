<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Property_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_property()
	{
			  $result=$this->db->select('*')
					->from('tbl_ozellik','tbl_kategori')
					->join('tbl_kategori', 'tbl_ozellik.kategori_id=tbl_kategori.kategori_id','LEFT OUTER')
					->get()->result();

		return $result;
 		
	}

	public function add_property($data)
	{
		$result=$this->db->insert('tbl_ozellik',$data);
		return $result;
	}

	public function edit_property($id)
	{
		$result=$this->db->select('*')
					->from('tbl_ozellik')
					->where('ozellik_id',$id)
					->get()->result();

		return $result;
	}

	

	public function get_propertyName($id)
	{
		$result=$this->db->select('ozellik_adi')
					->from('tbl_ozellik')
					->where('ozellik_id',$id)
					->get()->result();

		return $result;
	}

	public function get_propertyByCategoryId($id)
	{
		$result=$this->db->select('*')
					->from('tbl_ozellik')
					->where('kategori_id',$id)
					->get()->result();

		return $result;
	}



	public function delete_property($id)
	{
		$result=$this->db
					->delete('tbl_ozellik',array('ozellik_id' => $id));
		return $result;
	}		

	public function update_property($id,$data)
	{
		
		$result=$this->db
					->where('ozellik_id',$id)
					->update('tbl_ozellik',$data);
		return $result;
	}

}
?>