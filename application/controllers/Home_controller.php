<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_controller extends CI_Controller {
	/*public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }

           		//$this->load->model('category_model');
                
        }*/
	
	public function index()
	{
		
		//$data['result']=$this->category_model->getAll_category();
		$this->load->view('front/home');
		
	}

	
	
	
}

?>