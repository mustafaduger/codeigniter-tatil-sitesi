<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Comment_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_comment()
	{
		$result=$this->db->select('*')
					->from('tbl_yorum','tbl_firma')
					->join('tbl_firma', 'tbl_firma.firma_id=tbl_yorum.firma_id','LEFT OUTER')
					->get()->result();

		return $result;
	}

	public function add_comment($data)
	{
		$result=$this->db->insert('tbl_yorum',$data);
		return $result;
	}

	public function edit_comment($id)
	{
		
		$result=$this->db->select('*')
					->from('tbl_yorum','tbl_firma')
					->where('yorum_id',$id)
					->join('tbl_firma', 'tbl_firma.firma_id=tbl_yorum.firma_id','LEFT OUTER')
					->get()->result();

		return $result;


	}

	public function delete_comment($id)
	{
		$result=$this->db
					->delete('tbl_yorum',array('yorum_id' => $id));
		return $result;
	}		

	public function update_comment($id,$data)
	{
		
		$result=$this->db
					->where('yorum_id',$id)
					->update('tbl_yorum',$data);
		return $result;
	}

}
?>