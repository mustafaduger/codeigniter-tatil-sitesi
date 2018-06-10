<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings_controller extends CI_Controller {
 // private $_ci;
	public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }
             
              $this->load->model('settings_model');
              
                
        }
	
	public function index()
	{
    //$id=1;
		$data['result']=$this->settings_model->getAll_settings();
		$this->load->view('admin/settings/edit_settings',$data);
	}

	
	/*public function settings_controller_kl()
	{
    
    $data['settings']=$this->category_model->getAll_settings();
    	
		$this->load->view('admin/item/add/add_item',$data);
		
	}*/

	

  public function update_settings_controller()
  {
    
    /*$this->form_validation->set_message('required', '* Alan boş geçilemez!..');
    $this->form_validation->set_message('greater_than', '* Seçim yapınız!..');
    $this->form_validation->set_message('is_natural_no_zero', '* Sadece sayı girebilirsiniz!..');
    $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

    if ($this->form_validation->run('item') == FALSE)
    { 
          $data['brand']=$this->brand_model->getAll_brand();
          $data['category']=$this->category_model->getAll_category();
          $this->load->view('admin/item/add/add_item',$data);
    }
    else
    {*/
        

        $config['upload_path']         = FCPATH.'assets/images/logo/';
        $config['allowed_types']       = 'gif|jpg|jpeg|png';
        $config['encrypt_name']        = TRUE;
        $config['max_size']            = 3000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);
        if ( $this->upload->do_upload('image'))
        {
            $image = $this->upload->data();
            $image_path=$image['file_name'];
            $image_record ='assets/images/logo/'.$image_path.'';
            $image_tmb   ='assets/images/logo/logo/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='assets/images/logo/'.$image_path.'';
            $config['new_image']='assets/images/logo/logo/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=313;
            $config['height']=103;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
            
            $id=1;

            $settings_image_delete=$this->settings_model->settings_image($id);

            $settings_tmb_delete=$this->settings_model->settings_tmb($id);
            

            unlink($settings_image_delete);
            unlink($settings_tmb_delete);
                  
            $data=array(

                'title'=>$this->input->post('title'),
                'url' =>$this->input->post('url'),
                'keywords'=>$this->input->post('keywords'),
                'author'=>$this->input->post('author'),
                'description'=>$this->input->post('description'),
                'telephon'=>$this->input->post('telephon'),
                'gsm'=>$this->input->post('gsm'),
                'fax'=>$this->input->post('fax'),
                'email'=>$this->input->post('email'),
                'adress'=>$this->input->post('adress'),
                'ilce'=>$this->input->post('ilce'),
                'fax'=>$this->input->post('fax'),
                'il'=>$this->input->post('il'),
                'mesai'=>$this->input->post('mesai'),
                'recapctha'=>$this->input->post('recapctha'),
                'googlemap'=>$this->input->post('googlemap'),
                'analystic'=>$this->input->post('analystic'),
                'facebook'=>$this->input->post('facebook'),
                'twitter'=>$this->input->post('twitter'),
                'youtube'=>$this->input->post('youtube'),
                'google'=>$this->input->post('google'),
                'smtphost'=>$this->input->post('smtphost'),
                'smtpuser'=>$this->input->post('smtpuser'),
                'smtppassword'=>$this->input->post('smtppassword'),
                'smtpport'=>$this->input->post('smtpport'),

                'image'=>$image_record,
                'logo'=>$image_tmb,
                
                 );
          $id=1;
          $result=$this->settings_model->update_settings($id,$data);

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Bilgiler güncellendi. 
                  </div>');
          redirect('settings_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('settings_controller');
          }

        }else
        { //Resim yüklenemedi

          $data=array(
                'title'=>$this->input->post('title'),
                'url' =>$this->input->post('url'),
                'keywords'=>$this->input->post('keywords'),
                'author'=>$this->input->post('author'),
                'description'=>$this->input->post('description'),
                'telephon'=>$this->input->post('telephon'),
                'gsm'=>$this->input->post('gsm'),
                'fax'=>$this->input->post('fax'),
                'email'=>$this->input->post('email'),
                'adress'=>$this->input->post('adress'),
                'ilce'=>$this->input->post('ilce'),
                'fax'=>$this->input->post('fax'),
                'il'=>$this->input->post('il'),
                'mesai'=>$this->input->post('mesai'),
                'recapctha'=>$this->input->post('recapctha'),
                'googlemap'=>$this->input->post('googlemap'),
                'analystic'=>$this->input->post('analystic'),
                'facebook'=>$this->input->post('facebook'),
                'twitter'=>$this->input->post('twitter'),
                'youtube'=>$this->input->post('youtube'),
                'google'=>$this->input->post('google'),
                'smtphost'=>$this->input->post('smtphost'),
                'smtpuser'=>$this->input->post('smtpuser'),
                'smtppassword'=>$this->input->post('smtppassword'),
                'smtpport'=>$this->input->post('smtpport'),
                                
                 );

          $id=1;
          $result=$this->settings_model->update_settings($id,$data);
          

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Bilgiler güncellendi. 
                  </div>');
          redirect('settings_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('settings_controller');
          }
        }

            
  /*  }*/

  }









	
}

?>