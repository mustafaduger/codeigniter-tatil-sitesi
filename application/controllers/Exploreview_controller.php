<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Exploreview_controller extends CI_Controller {
	public function __construct()
        {
        		parent::__construct();
         /*  		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }*/

           		$this->load->model('explorecontent_model');
                
        }
	private $limit=5;

	public function index()
	{	

		$data['result']=$this->explorecontent_model->getAll_explorecontentpage();
		/*print_r($data);
		die();*/
		$total_rows=$this->explorecontent_model->count();

		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';
		$config["first_link"] = "İlk";	
		//$config["first_link"] = "&laquo;";
		$config["first_tag_open"] = "<li>";
		$config["first_tag_close"] = "</li>";
		$config["last_link"] = "Son";
		//$config["last_link"] = "&raquo;";
		$config["last_tag_open"] = "<li>";
		$config["last_tag_close"] = "</li>";
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '<li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '<li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['total_rows']=$total_rows;
		$config['per_page']=$this->limit;
		$config['uri_segment']=3;
		$config['base_url']=site_url('exploreview_controller/index');

		$this->load->library('pagination', $config);
		$data['page_links']=$this->pagination->create_links();

		$this->load->view('front/explore/explore',$data);
	}

	public function explorelistbyCategory($kategori_id)
	{	

		$data['result']=$this->explorecontent_model->getAll_explorecontentpagecategory($kategori_id);
		$total_rows=$this->explorecontent_model->countcategory($kategori_id);
		/*echo $total_rows;
		die();*/

		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';
		$config["first_link"] = "İlk";	
		//$config["first_link"] = "&laquo;";
		$config["first_tag_open"] = "<li>";
		$config["first_tag_close"] = "</li>";
		$config["last_link"] = "Son";
		//$config["last_link"] = "&raquo;";
		$config["last_tag_open"] = "<li>";
		$config["last_tag_close"] = "</li>";
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '<li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '<li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['total_rows']=$total_rows;
		$config['per_page']=$this->limit;
		$config['uri_segment']=4;//Kategoriye göre listelemede önemli
		$config['base_url']=site_url('exploreview_controller/explorelistbyCategory/'.$kategori_id.'');
		//$config['base_url']=base_url('exploreview_controller/explorelistbyCategory/'.$kategori_id.'');

		$this->load->library('pagination', $config);
		$data['page_links']=$this->pagination->create_links();

		$this->load->view('front/explore/explore',$data);
	}


	public function exploreviewsearch()
	{	
		if ($this->input->post('searchterm')){
			$searchterm=$this->input->post('searchterm');
			$this->session->set_userdata('searchterm',$searchterm);
		} 
		
		//$this->session->set_userdata("searchterm"=>$searchterm);
		


		/*echo $searchterm;
		die();*/
		$data['result']=$this->explorecontent_model->getAll_explorecontentsearch($this->session->userdata("searchterm"));
		/*print_r($data);
		die();*/
		$total_rows=$this->explorecontent_model->getAll_explorecontentsearchcount($this->session->userdata("searchterm"));
		/*echo $this->session->userdata("searchterm");
		die();*/



		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';
		$config["first_link"] = "İlk";	
		//$config["first_link"] = "&laquo;";
		$config["first_tag_open"] = "<li>";
		$config["first_tag_close"] = "</li>";
		$config["last_link"] = "Son";
		//$config["last_link"] = "&raquo;";
		$config["last_tag_open"] = "<li>";
		$config["last_tag_close"] = "</li>";
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '<li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '<li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		//$config['reuse_query_string'] = TRUE;
		$config['total_rows']=$total_rows;
		$config['per_page']=$this->limit;
		$config['uri_segment']=3;
		//$config['base_url']=site_url("exploreview_controller/exploreviewsearch");
		//$pagination['first_url'] = site_url('exploreview_controller/exploreviewsearch');
		$config['base_url']=site_url('exploreview_controller/exploreviewsearch');

		$this->load->library('pagination', $config);
		$data['page_links']=$this->pagination->create_links();

		$this->load->view('front/explore/explore',$data);


	}
	
	
	
}

?>