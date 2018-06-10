<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Firmproperty_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	

	public function update_firmsettings($id,$data)
	{
		
		$result=$this->db
					->where('firma_id',$id)
					->update('tbl_firma',$data);
		return $result;
	}




	public function getAll_firmpropertytext($id)
	{
		$result=$this->db->select('*')
					->from('tbl_ozellik')
					->where('firma_id',$id)
					->get()->result();

		return $result;
	}

	public function getAll_firmpropertycontent($id)
	{
		$result=$this->db->select('*')
					->from('tbl_kategori')
					->get()->result();

		return $result;
	}

	public function add_firmproperty($data)
	{
		$result=$this->db->insert('tbl_kategori',$data);
		return $result;
	}

	public function edit_firmproperty($id)
	{
		$result=$this->db->select('*')
					->from('tbl_kategori')
					->where('kategori_id',$id)
					->get()->result();

		return $result;
	}

	public function delete_firmproperty($id)
	{
		$result=$this->db
					->delete('tbl_kategori',array('kategori_id' => $id));
		return $result;
	}		



}
?>