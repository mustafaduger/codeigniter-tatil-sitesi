<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Eatingview_controller extends CI_Controller {
	public function __construct()
        {
        		parent::__construct();
         /*  		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }*/

           		//$this->load->model('explorecontent_model');
                
        }
	//private $limit=5;

	public function index()
	{	
		$this->load->view('front/eating/eating');

	}

		
	
}

?>