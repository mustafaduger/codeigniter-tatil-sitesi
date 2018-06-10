<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Images_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_images($id)
	{
		
		$result=$this->db->select('*')
					->from('tbl_resim')
					->where('firma_id',$id)
					->get()->row();

		return $result;
	}

	public function update_images($id,$data)
	{
		
		$result=$this->db
					->where('resim_id',$id)
					->update('tbl_resim',$data);
		return $result;
	}


	public function imageslist_tmb($id)
	{
	    
	    $result=$this->db->select('resim_list')->from('tbl_resim')->where('resim_id',$id)->get()->row();
	    return $result->resim_list;
	}

	public function imagesupper_tmb($id)
	{
	    
	    $result=$this->db->select('resim_ust')->from('tbl_resim')->where('resim_id',$id)->get()->row();
	    return $result->resim_ust;
	}















	public function add_explorecontent($data)
	{
		$result=$this->db->insert('tbl_kesfet',$data);
		return $result;
	}

	public function edit_explorecontent($id)
	{
		$result=$this->db->select('*')
					->from('tbl_kesfet')
					->where('kesfet_id',$id)
					->get()->result();

		return $result;
	}

	public function delete_explorecontent($id)
	{

		$result=$this->db
					->delete('tbl_kesfet',array('kesfet_id' => $id));
		return $result;
	}		

	public function update_explorecontent($id,$data)
	{
		
		$result=$this->db
					->where('kesfet_id',$id)
					->update('tbl_kesfet',$data);
		return $result;
	}

	public function explorecontent_image_m($id)
	{
    

	    $result=$this->db->select('kesfet_image')->from('tbl_kesfet')->where('kesfet_id',$id)->get()->row();
	    return $result->kesfet_image;
	}

	


	public function get_mahalle($ilce_key)
	{
		$query = $this->db->get_where('mahalle', array('mahalle_ilcekey' => $ilce_key));
		return $query->result();
	}

}
?>