<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subproperty_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_subproperty()
	{
			  $result=$this->db->select('*')
					->from('tbl_altozellik','tbl_ozellik','tbl_kategori')
					->join('tbl_ozellik', 'tbl_altozellik.ozellik_id=tbl_ozellik.ozellik_id','LEFT OUTER')
					->join('tbl_kategori', 'tbl_ozellik.kategor_id=tbl_kategori.kategori_id','LEFT OUTER')
					->get()->result();

		return $result;
 		
	}

	public function add_subproperty($data)
	{
		$result=$this->db->insert('tbl_altozellik',$data);
		return $result;
	}

	public function edit_subpropertyby_propertyId($id)
	{
		$result=$this->db->select('*')
					->from('tbl_altozellik','tbl_ozellik')
					->where('tbl_ozellik.ozellik_id',$id)
					->join('tbl_ozellik', 'tbl_altozellik.ozellik_id=tbl_ozellik.ozellik_id','LEFT OUTER')
					//->join('tbl_kategori', 'tbl_ozellik.kategori_id=tbl_kategori.kategori_id','LEFT OUTER')
					->get()->result();

		return $result;

		/*$result=$this->db->select('*')
					->from('tbl_altozellik')
					->where('ozellik_id',$id)
					->get()->result();

		return $result;*/
	}

	public function edit_subpropertyby_propertyIdOne($id)
	{
		$result=$this->db->select('tbl_altozellik.ozellik_id')
					->from('tbl_altozellik','tbl_ozellik','tbl_kategori')
					->where('tbl_altozellik.ozellik_id',$id)
					->join('tbl_ozellik', 'tbl_altozellik.ozellik_id=tbl_ozellik.ozellik_id','LEFT OUTER')
					//->join('tbl_kategori', 'tbl_ozellik.kategori_id=tbl_kategori.kategori_id','LEFT OUTER')
					->get()->row();

		return $result;

		/*$result=$this->db->select('*')
					->from('tbl_altozellik')
					->where('ozellik_id',$id)
					->get()->result();

		return $result;*/
	}


	public function edit_subproperty($id)
	{
		$result=$this->db->select('*')
					->from('tbl_altozellik')
					->where('altozellik_id',$id)
					->get()->result();

		return $result;
	}

	public function get_subproperty_propertyId($id)
	{
		$result=$this->db->select('ozellik_id')
					->from('tbl_altozellik')
					->where('altozellik_id',$id)
					->get()->row('ozellik_id');

		return $result;
	}

	public function get_subpropertypropertyId($id)
	{
		$result=$this->db->select('*')
					->from('tbl_altozellik')
					->where('ozellik_id',$id)
					->get()->result();

		return $result;
	}

	public function get_subpropertyName($id)
	{
		$result=$this->db->select('altozellik_adi')
					->from('tbl_altozellik')
					->where('altozellik_id',$id)
					->get()->result();

		return $result;
	}

	public function delete_subproperty($id)
	{
		$result=$this->db
					->delete('tbl_altozellik',array('altozellik_id' => $id));
		return $result;
	}		

	public function update_subproperty($id,$data)
	{
		
		$result=$this->db
					->where('altozellik_id',$id)
					->update('tbl_altozellik',$data);
		return $result;
	}

}
?>