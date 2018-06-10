<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Explorecontent_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    	$this->load->database();
    }

	public function getAll_explorecontent()
	{
		
		$result=$this->db->select('*')
					->from('tbl_kesfet','tbl_kategorikesfet','ilce','mahalle')
					->join('tbl_kategorikesfet', 'tbl_kategorikesfet.kategori_id=tbl_kesfet.kesfet_kategoriid','LEFT OUTER')
					->join('ilce', 'ilce.ilce_key=tbl_kesfet.ilce','LEFT OUTER')
					->join('mahalle', 'mahalle.mahalle_key=tbl_kesfet.mahalle','LEFT OUTER')
					->get()->result();

		return $result;
	}

	public function getAll_explorecontentpage()
	{
		
		$result=$this->db->select('*')
					->from('tbl_kesfet','tbl_kategorikesfet','ilce','mahalle')
					->where('kesfet_isActive',1)
					->join('tbl_kategorikesfet', 'tbl_kategorikesfet.kategori_id=tbl_kesfet.kesfet_kategoriid','LEFT OUTER')
					->join('ilce', 'ilce.ilce_key=tbl_kesfet.ilce','LEFT OUTER')
					->join('mahalle', 'mahalle.mahalle_key=tbl_kesfet.mahalle','LEFT OUTER')
					->limit(5)
					->offset($this->uri->segment(3))
					->get()->result();

		return $result;
	}

	public function getAll_explorecontentpagecategory($id)
	{
		$array = array('kesfet_kategoriid' => $id, 'kesfet_isActive' => 1);
		$result=$this->db->select('*')
					->from('tbl_kesfet','tbl_kategorikesfet','ilce','mahalle')
					->where($array)
					->join('tbl_kategorikesfet', 'tbl_kategorikesfet.kategori_id=tbl_kesfet.kesfet_kategoriid','LEFT OUTER')
					->join('ilce', 'ilce.ilce_key=tbl_kesfet.ilce','LEFT OUTER')
					->join('mahalle', 'mahalle.mahalle_key=tbl_kesfet.mahalle','LEFT OUTER')
					->limit(5)
					->offset($this->uri->segment(4))//Kategoriye göre listeleme için önemli
					->get()->result();

		return $result;
	}


	public function countcategory($id)
	{
		$this->db->select('*');
		$this->db->where('kesfet_kategoriid',$id);
		
		$query = $this->db->get('tbl_kesfet');
		$num = $query->num_rows();
		return $num;
	}

	public function count()
	{
		return $this->db->count_all_results('tbl_kesfet');		
	}


	public function getAll_explorecontentsearch($searchterm)
	{
		
		/*$this->db->select('*');
		$this->db->from('tbl_kesfet');*/
		$this->db->like('kesfet_title', $searchterm);
		$this->db->or_like('kesfet_detail', $searchterm);
		$this->db->or_like('kesfet_keyword', $searchterm);
		$this->db->or_like('location', $searchterm);
		$this->db->limit(5);
		$this->db->where('kesfet_isActive',1);
		$this->db->offset($this->uri->segment(3));//Kategoriye göre listeleme için önemli
		$query = $this->db->get('tbl_kesfet');
        $result = $query->result();
        /*print_r($result);
        die();*/
		if($query->num_rows()>0)
        {
            return $result; 
        }
        else
        {
            return null;
        }
		


	}

	public function getAll_explorecontentsearchcount($searchterm)
	{
		
		//$this->db->select('*');
		//$this->db->where('kesfet_kategoriid',$id);
		$this->db->like('kesfet_title', $searchterm);
		$this->db->or_like('kesfet_detail', $searchterm);
		$this->db->or_like('kesfet_keyword', $searchterm);
		$this->db->or_like('location', $searchterm);
		$this->db->where('kesfet_isActive',1);
		$query = $this->db->get('tbl_kesfet');
		$num = $query->num_rows();
		return $num;
		
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

	public function edit_explorecontentview($id)
	{
		$result=$this->db->select('*')
					->from('tbl_kesfet')
					->where('kesfet_id',$id)
					->get()->row();

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

	public function explorecontent_tmb_m($id)
	{
	    
	    $result=$this->db->select('kesfet_tmb')->from('tbl_kesfet')->where('kesfet_id',$id)->get()->row();
	    return $result->kesfet_tmb;
	}


	public function get_mahalle($ilce_key)
	{
		$query = $this->db->get_where('mahalle', array('mahalle_ilcekey' => $ilce_key));
		return $query->result();
	}




}
?>