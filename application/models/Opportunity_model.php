<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Opportunity_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_opportunity()
	{
		
		


		$result=$this->db->select('*')
					->from('tbl_firsat','tbl_firma')
					->join('tbl_firma', 'tbl_firma.firma_id=tbl_firsat.firma_id','LEFT OUTER')
					->get()->result();

		return $result;
	}

	public function add_opportunity($data)
	{
		$result=$this->db->insert('tbl_firsat',$data);
		return $result;
	}

	public function edit_opportunity($id)
	{
		$result=$this->db->select('*')
					->from('tbl_firsat')
					->where('firsat_id',$id)
					->get()->result();

		return $result;
	}

	public function delete_opportunity($id)
	{

		$result=$this->db
					->delete('tbl_firsat',array('firsat_id' => $id));
		return $result;
	}		

	public function update_opportunity($id,$data)
	{
		
		$result=$this->db
					->where('firsat_id',$id)
					->update('tbl_firsat',$data);
		return $result;
	}

	public function opportunity_image_m($id)
	{
    

	    $result=$this->db->select('firsat_resim')->from('tbl_firsat')->where('firsat_id',$id)->get()->row();
	    return $result->firsat_resim;
	}

	public function opportunity_tmb_m($id)
	{
	    
	    $result=$this->db->select('firsat_tmb')->from('tbl_firsat')->where('firsat_id',$id)->get()->row();
	    return $result->firsat_tmb;
	}

	public function getAll_firma()
	{
		
		$result=$this->db->select('*')
					->from('tbl_firma')
					->get()->result();

		return $result;
	}

	public function getAll_il()
	{
		
		$result=$this->db->select('*')
					->from('cities')
					->get()->result();

		return $result;
	}

	public function getAll_ilce()
	{
		
		$result=$this->db->select('*')
					->from('ilce')
					->where('ilce_sehirkey','34')
					->get()->result();

		return $result;
	}

	public function get_mahalle($ilce_key)
	{
		$query = $this->db->get_where('mahalle', array('mahalle_ilcekey' => $ilce_key));
		return $query->result();
	}

	

}
?>