<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Firmsettings_controller extends CI_Controller {
 // private $_ci;
	public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }
             
              $this->load->model('firmsettings_model');
              
                
        }
/*	
	public function index()
	{
    $id=1;
		$result=$this->firmsettings_model->getAll_firmsettings($id);
    $data['result']=$result;
   
		$this->load->view('admin/firmsettings/edit_firmsettings',$data);
	}*/

  public function firmsettingsadmin_controller($id=null)
  {
    if ($id==null) {
      $id=1;
    }
    $result=$this->firmsettings_model->getAll_firmsettings($id);
    $data['result']=$result;
   
    $this->load->view('admin/firmsettings/edit_firmsettings',$data);
  }

	
		

  public function update_firmsettings_controller()
  {
      $id=$this->input->post('firma_id');
      //$id=65;
      $this->form_validation->set_rules('firma_adi', 'Firma Adı', 'required'); 
      $this->form_validation->set_rules('ilce', 'İlçe', 'required|is_Natural');    
      $this->form_validation->set_rules('mahalle', 'Mahalle', 'required|is_Natural');
      $this->form_validation->set_rules('firma_kategori_id', 'Kategori', 'required|is_Natural');    
      $this->form_validation->set_rules('firma_altkategori_id', 'Alt Kategori', 'required|is_Natural');
      $this->form_validation->set_rules('firma_yetkilisi', 'Firma Yetkilisi', 'required');
      $this->form_validation->set_rules('firma_tel', 'Telefon', 'required');
      $this->form_validation->set_rules('firma_url', 'Web adresi', 'required');
      $this->form_validation->set_rules('firma_aciklama', 'Firma Açıklama', 'required');
      $this->form_validation->set_rules('firma_keywords', 'Anahtar Kelimelerr', 'required');
      $this->form_validation->set_rules('firma_gsm', 'GSM', 'required');
      $this->form_validation->set_rules('firma_sabittel', 'Sabit Telefon', 'required');

      $this->form_validation->set_rules('location', 'Konum Bilgileri', 'required');
      
      
      $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.'); 
      $this->form_validation->set_message('is_Natural', 'Lütfen bir grup seçiniz');
      //$this->form_validation->set_message('image', 'Lütfen bir resim seçiniz');
          
      $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

    if ($this->form_validation->run() == FALSE)
    { 
        $data['result']=$this->firmsettings_model->getAll_firmsettings($id);
        $this->load->view('admin/firmsettings/edit_firmsettings',$data);
    }
    else
    {
        

        $config['upload_path']         = FCPATH.'assets/images/firmsettings/';
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
            $image_record ='assets/images/firmsettings/'.$image_path.'';
            $image_tmb   ='assets/images/firmsettings/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='assets/images/firmsettings/'.$image_path.'';
            $config['new_image']='assets/images/firmsettings/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=313;
            $config['height']=103;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
            
            

            $firmsettings_image_delete=$this->firmsettings_model->firmsettings_image($id);

            $firmsettings_tmb_delete=$this->firmsettings_model->firmsettings_tmb($id);
            if ($firmsettings_image_delete) {
              unlink($firmsettings_image_delete);
              unlink($firmsettings_tmb_delete);
            }
      
            $data=array(

                'ilce'=>$this->input->post('ilce'),
                'mahalle'=>$this->input->post('mahalle'),
                'firma_kategori_id'=>$this->input->post('firma_kategori_id'),
                'firma_altkategori_id'=>$this->input->post('firma_altkategori_id'),
                'firma_yetkilisi'=>$this->input->post('firma_yetkilisi'),
                'firma_tel'=>$this->input->post('firma_tel'),
                'firma_url'=>$this->input->post('firma_url'),
                'firma_mail'=>$this->input->post('firma_mail'),
                'firma_gsm'=>$this->input->post('firma_gsm'),
                'firma_sabittel'=>$this->input->post('firma_sabittel'),
                'firma_fax'=>$this->input->post('firma_fax'),
                'firma_whatsupno'=>$this->input->post('firma_whatsupno'),
                'firma_facebook'=>$this->input->post('firma_facebook'),
                'firma_twitter'=>$this->input->post('firma_twitter'),
                'firma_instagram'=>$this->input->post('firma_instagram'),
                'firma_google'=>$this->input->post('firma_google'),
                'firma_keywords'=>$this->input->post('firma_keywords'),
                'firma_aciklama'=>$this->input->post('firma_aciklama'),
                'lat'=>$this->input->post('lat'),
                'lng'=>$this->input->post('lng'),
                'location'=>$this->input->post('location'),

                'image'=>$image_record,
                'logo'=>$image_tmb,
                
                 );
         
          $result=$this->firmsettings_model->update_firmsettings($id,$data);

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Bilgiler güncellendi. 
                  </div>');
          redirect('firmsettings_controller/firmsettingsadmin_controller/'.$id);
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('firmsettings_controller/firmsettingsadmin_controller/'.$id);
          }

        }else
        { //Resim yüklenemedi

          $data=array(
               'ilce'=>$this->input->post('ilce'),
                'mahalle'=>$this->input->post('mahalle'),
                'firma_kategori_id'=>$this->input->post('firma_kategori_id'),
                'firma_altkategori_id'=>$this->input->post('firma_altkategori_id'),
                'firma_yetkilisi'=>$this->input->post('firma_yetkilisi'),
                'firma_tel'=>$this->input->post('firma_tel'),
                'firma_url'=>$this->input->post('firma_url'),
                'firma_mail'=>$this->input->post('firma_mail'),
                'firma_gsm'=>$this->input->post('firma_gsm'),
                'firma_sabittel'=>$this->input->post('firma_sabittel'),
                'firma_fax'=>$this->input->post('firma_fax'),
                'firma_whatsupno'=>$this->input->post('firma_whatsupno'),
                'firma_facebook'=>$this->input->post('firma_facebook'),
                'firma_twitter'=>$this->input->post('firma_twitter'),
                'firma_instagram'=>$this->input->post('firma_instagram'),
                'firma_google'=>$this->input->post('firma_google'),
                'firma_keywords'=>$this->input->post('firma_keywords'),
                'firma_aciklama'=>$this->input->post('firma_aciklama'),
                'lat'=>$this->input->post('lat'),
                'lng'=>$this->input->post('lng'),
                'location'=>$this->input->post('location'),
                                
                 );

         
          $result=$this->firmsettings_model->update_firmsettings($id,$data);
          

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Bilgiler güncellendi. 
                  </div>');
          redirect('firmsettings_controller/firmsettingsadmin_controller/'.$id);
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('firmsettings_controller/firmsettingsadmin_controller/'.$id);
          }
        }
        
    }

  }


	
}

?>