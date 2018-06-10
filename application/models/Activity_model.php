<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Activity_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_activity()
	{
		$result=$this->db->select('*')
					->from('tbl_etkinlik','tbl_firma','tbl_etkinliktip')
					->join('tbl_firma', 'tbl_firma.firma_id=tbl_etkinlik.firma_id','LEFT OUTER')
					->join('tbl_etkinliktip', 'tbl_etkinliktip.etkinliktip_id=tbl_etkinlik.etkinliktip_id','LEFT OUTER')
					->get()->result();

		return $result;
	}

	public function add_activity($data)
	{
		$result=$this->db->insert('tbl_etkinlik',$data);
		return $result;
	}

	public function edit_activity($id)
	{
		$result=$this->db->select('*')
					->from('tbl_etkinlik')
					->where('etkinlik_id',$id)
					->get()->result();

		return $result;
	}

	public function delete_activity($id)
	{

		$result=$this->db
					->delete('tbl_etkinlik',array('etkinlik_id' => $id));
		return $result;
	}		

	public function update_activity($id,$data)
	{
		
		$result=$this->db
					->where('etkinlik_id',$id)
					->update('tbl_etkinlik',$data);
		return $result;
	}

	public function activity_image_m($id)
	{
    

	    $result=$this->db->select('etkinlik_resim')->from('tbl_etkinlik')->where('etkinlik_id',$id)->get()->row();
	    return $result->etkinlik_resim;
	}

	public function activity_tmb_m($id)
	{
	    
	    $result=$this->db->select('etkinlik_tmb')->from('tbl_etkinlik')->where('etkinlik_id',$id)->get()->row();
	    return $result->etkinlik_tmb;
	}

	public function getAll_etkinliktip()
	{
		
		$result=$this->db->select('*')
					->from('tbl_etkinliktip')
					->get()->result();

		return $result;
	}

	

	

}
?>