<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Firmsettings_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_firmsettings($id)
	{
		$result=$this->db->select('*')
					->from('tbl_firma')
					->where('firma_id',$id)
					->get()->row();
		/*if (!$result){
			$result=$this->db->insert('tbl_firma',$data);	
		}
*/
		return $result;
	}

	public function get_firmsettings($id)
	{
		$result=$this->db->select('*')
					->from('tbl_firma')
					->where('firma_id',$id)
					->get()->result();
		/*if (!$result){
			$result=$this->db->insert('tbl_firma',$data);	
		}
*/
		return $result;
	}

	public function update_firmsettings($id,$data)
	{
		
		$result=$this->db
					->where('firma_id',$id)
					->update('tbl_firma',$data);
		return $result;
	}
	
	public function edit_settings($id)
	{
		$result=$this->db->select('*')
						->where('id',$id)
						->get()->result();

		return $result;
	}

	

	public function firmsettings_image($id)
	{
    

	    $result=$this->db->select('image')->from('tbl_firma')->where('firma_id',$id)->get()->row();
	    return $result->image;
	}

	public function firmsettings_tmb($id)
	{
	    
	    $result=$this->db->select('logo')->from('tbl_firma')->where('firma_id',$id)->get()->row();
	    return $result->logo;
	}

}
?>