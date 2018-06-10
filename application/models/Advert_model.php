<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Advert_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_advert()
	{
		$result=$this->db->select('*')
					->from('tbl_reklam','tbl_firma','tbl_reklamyeri')
					->join('tbl_firma', 'tbl_firma.firma_id=tbl_reklam.firma_id','LEFT OUTER')
					->join('tbl_reklamyeri', 'tbl_reklamyeri.reklamyeri_id=tbl_reklam.reklamyeri_id','LEFT OUTER')
					->get()->result();

		return $result;
	}

	public function getAll_advertById($id=null)
	{
		$result=$this->db->select('*')
					->from('tbl_reklam','tbl_firma','tbl_reklamyeri')
					->where('firma_id',$id)
					/*->join('tbl_firma', 'tbl_firma.firma_id=tbl_reklam.firma_id','LEFT OUTER')*/
					->join('tbl_reklamyeri', 'tbl_reklamyeri.reklamyeri_id=tbl_reklam.reklamyeri_id','LEFT OUTER')
					->get()->result();

		return $result;
	}

	public function add_advert($data)
	{
		$result=$this->db->insert('tbl_reklam',$data);
		return $result;
	}

	public function edit_advert($id)
	{
		$result=$this->db->select('*')
					->from('tbl_reklam')
					->where('reklam_id',$id)
					->get()->result();

		return $result;
	}

	public function delete_advert($id)
	{

		$result=$this->db
					->delete('tbl_reklam',array('reklam_id' => $id));
		return $result;
	}		

	public function update_advert($id,$data)
	{
		
		$result=$this->db
					->where('reklam_id',$id)
					->update('tbl_reklam',$data);
		return $result;
	}

	public function advert_image_m($id)
	{
    

	    $result=$this->db->select('reklam_resim')->from('tbl_reklam')->where('reklam_id',$id)->get()->row();
	    return $result->reklam_resim;
	}

	public function advert_tmb_m($id)
	{
	    
	    $result=$this->db->select('reklam_tmb')->from('tbl_reklam')->where('reklam_id',$id)->get()->row();
	    return $result->reklam_tmb;
	}

	public function getAll_reklamyeri()
	{
		
		$result=$this->db->select('*')
					->from('tbl_reklamyeri')
					->get()->result();

		return $result;
	}

	

	

}
?>