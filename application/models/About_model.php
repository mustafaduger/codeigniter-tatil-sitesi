<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class About_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }
   

	public function getAll_about()
	{
		$result=$this->db->select('*')
					->from('about')
					->get()->result();
		return $result;
	}

	
	public function edit_about($id)
	{
		$result=$this->db->select('*')
						->where('id',$id)
						->get()->result();

		return $result;
	}

	public function update_about($id,$data)
	{
		
		$result=$this->db
					->where('id',$id)
					->update('about',$data);
		return $result;
	}

	
}
?>