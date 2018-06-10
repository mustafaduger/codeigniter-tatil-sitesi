<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_settings()
	{
		$result=$this->db->select('*')
					->from('settings')
					->get()->result();
		return $result;
	}

	
	public function edit_settings($id)
	{
		$result=$this->db->select('*')
						->where('id',$id)
						->get()->result();

		return $result;
	}

	public function update_settings($id,$data)
	{
		
		$result=$this->db
					->where('id',$id)
					->update('settings',$data);
		return $result;
	}

	public function settings_image($id)
	{
    

	    $result=$this->db->select('image')->from('settings')->where('id',$id)->get()->row();
	    return $result->image;
	}

	public function settings_tmb($id)
	{
	    
	    $result=$this->db->select('logo')->from('settings')->where('id',$id)->get()->row();
	    return $result->logo;
	}

}
?>