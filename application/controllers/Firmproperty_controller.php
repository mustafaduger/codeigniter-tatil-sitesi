<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Firmproperty_controller extends CI_Controller {
	public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }

           		$this->load->model('firmproperty_model');
                
        }
	
	public function index()
	{
		
		//$data['result']=$this->firmproperty_model->getAll_firmproperty();


    //kategori ıd alınacak
    $data['result']=7;
		$this->load->view('admin/firmproperty/edit_firmproperty',$data);
		
	}


	
   public function update_firmproperty_controller()
  {
    $firma_id=1;

    $firma_ozellikmetin=htmlspecialchars(implode(',', $this->input->post('firmaozellik_metin_adi')), ENT_QUOTES, 'UTF-8');

    $data = array(
                  'firma_ozellikmetin' =>$firma_ozellikmetin,
                  'firma_mesai'=>20
                 );
  /*  print_r($data);
    die();*/

    $result=$this->firmproperty_model->update_firmsettings($firma_id,$data);
    //print_r($result);
          if ($result) {
               $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Güncelleme yapıldı. 
                </div>');
            redirect('firmproperty_controller');
            }else{
              $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Güncelleme işlemi Başarısız!... 
              </div>');
            redirect('firmproperty_controller');
            }
  
  }



	
}

?>