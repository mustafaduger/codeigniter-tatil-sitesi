<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_news()
	{
		
		$result=$this->db->select('*')
					->from('news')
					->get()->result();

		return $result;
	}

	public function add_news($data)
	{
		$result=$this->db->insert('news',$data);
		return $result;
	}

	public function edit_news($id)
	{
		$result=$this->db->select('*')
					->from('news')
					->where('news_id',$id)
					->get()->result();

		return $result;
	}

	public function delete_news($id)
	{

		$result=$this->db
					->delete('news',array('news_id' => $id));
		return $result;
	}		

	public function update_news($id,$data)
	{
		
		$result=$this->db
					->where('news_id',$id)
					->update('news',$data);
		return $result;
	}

	public function news_image_m($id)
	{
    

	    $result=$this->db->select('news_image')->from('news')->where('news_id',$id)->get()->row();
	    return $result->news_image;
	}

	public function news_tmb_m($id)
	{
	    
	    $result=$this->db->select('news_tmb')->from('news')->where('news_id',$id)->get()->row();
	    return $result->news_tmb;
	}

}
?>