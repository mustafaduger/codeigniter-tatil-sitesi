<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class About_controller extends CI_Controller {
 // private $_ci;
	public function __construct()
        {
        		parent::__construct();

            	if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }
             
              $this->load->model('about_model');
              
                
        }
	
	public function index()
	{
    //$id=1;
		$data['result']=$this->about_model->getAll_about();
		$this->load->view('admin/about/edit_about',$data);
	}

	
	/*public function settings_controller_kl()
	{
    
    $data['settings']=$this->category_model->getAll_settings();
    	
		$this->load->view('admin/item/add/add_item',$data);
		
	}*/

	

  public function update_about_controller()
  {
      
      $id=1;

      $data = array(
                  'title' =>$this->input->post('title') ,
                  'contentabout' =>$this->input->post('contentabout') ,
                  'video' =>$this->input->post('video') ,
                  'vision' =>$this->input->post('vision') ,
                  'mission' =>$this->input->post('mission') ,
                  
                 );
    //print_r($data);
    $result=$this->about_model->update_about($id,$data);
    //print_r($result);
          if ($result) {
               $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Güncelleme yapıldı. 
                </div>');
            redirect('about_controller');
            }else{
              $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Güncelleme işlemi Başarısız!... 
              </div>');
            redirect('about_controller');
            }
   
      

  }









	
}

?>