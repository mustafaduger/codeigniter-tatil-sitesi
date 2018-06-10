<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_slider()
	{
		
		$result=$this->db->select('*')
					->from('slider')
					->get()->result();

		return $result;
	}

	public function add_slider($data)
	{
		$result=$this->db->insert('slider',$data);
		return $result;
	}

	public function edit_slider($id)
	{
		$result=$this->db->select('*')
					->from('slider')
					->where('slider_id',$id)
					->get()->result();

		return $result;
	}

	public function delete_slider($id)
	{

		$result=$this->db
					->delete('slider',array('slider_id' => $id));
		return $result;
	}		

	public function update_slider($id,$data)
	{
		
		$result=$this->db
					->where('slider_id',$id)
					->update('slider',$data);
		return $result;
	}

	public function slider_image_m($id)
	{
    

	    $result=$this->db->select('slider_image')->from('slider')->where('slider_id',$id)->get()->row();
	    return $result->slider_image;
	}

	public function slider_tmb_m($id)
	{
	    
	    $result=$this->db->select('slider_tmb')->from('slider')->where('slider_id',$id)->get()->row();
	    return $result->slider_tmb;
	}

}
?>