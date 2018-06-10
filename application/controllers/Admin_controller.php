<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_controller extends CI_Controller {
	public function __construct()
        {
        		parent::__construct();
        		
           		if ($this->session->userdata('logged_in') ==FALSE) {
				redirect('auth/login');
           		}


           
        }
	
	public function index()
	{
		
		$this->load->view('admin/dashboard');   	
         /*  }*/
		
	}

	public function dashboard()
	{

		$this->load->view('admin/dashboard',$data);
		
	}

	public function login()
	{
		
		$this->load->view('admin/login');
		
	}

	public function register()
	{
		
		$this->load->view('admin/auth/register');
		
	}

	

}
?>
