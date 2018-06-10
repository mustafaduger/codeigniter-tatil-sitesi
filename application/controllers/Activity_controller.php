<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Activity_controller extends CI_Controller {
 	public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }
              
           		$this->load->model('activity_model');
              
              
                
        }
	
	public function index()
	{
	

		$data['result']=$this->activity_model->getAll_activity();
		$this->load->view('admin/activity/activity',$data);
		
	}

	
	public function add_activity_page_controller()
	{
        	
		$this->load->view('admin/activity/add/add_activity');
		
	}

	public function add_activity_controller()
	{	
    if (empty($_FILES['image']['name']))
          {
              $this->form_validation->set_rules('image', 'Resim', 'callback_image');
          }
      
      $this->form_validation->set_rules('kesfet_title', 'Başlık', 'required');
      $this->form_validation->set_rules('firma_id', 'Firma Adı', 'required|is_Natural'); 
      $this->form_validation->set_rules('etkinlik_adi', 'Etkinlik Adı', 'required');    
      $this->form_validation->set_rules('etkinlik_mekanadi', 'Etkinlik Mekan Adı', 'required');
      $this->form_validation->set_rules('etkinlik_adres', 'Adres', 'required');
      $this->form_validation->set_rules('etkinliktip_id', 'Etkinlik Tipi', 'required|is_Natural');
      $this->form_validation->set_rules('il_id', 'Etkinlik İl Adı', 'required|is_Natural');
      $this->form_validation->set_rules('etkinlik_telefon', 'Telefon', 'required');    
      $this->form_validation->set_rules('etkinlik_url', 'Web Adresi', 'required');
      $this->form_validation->set_rules('etkinlik_baslangictarih', 'Başlangıç Tarihi', 'required');
      $this->form_validation->set_rules('etkinlik_saati', 'Saat', 'required');
      $this->form_validation->set_rules('etkinlik_bitistarih', 'Bitiş Tarihi', 'required');
      $this->form_validation->set_rules('etkinlik_fiyat', 'Etkinlik Fiyat', 'required');
      $this->form_validation->set_rules('etkinlik_goruntuleme', 'Etkinlik Görüntüleme', 'required');
      $this->form_validation->set_rules('etkinlik_keyword', 'Anahtar Kelimeler', 'required');
      $this->form_validation->set_rules('etkinlik_detay', 'Etkinlik Detay', 'required');



      $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.'); 
      $this->form_validation->set_message('is_Natural', 'Lütfen bir seçim yapınız.');
      $this->form_validation->set_message('image', 'Lütfen bir resim seçiniz');
      
          
      $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');
      
    
		if ($this->form_validation->run() == FALSE)
		{ 
          $this->load->view('admin/activity/add/add_activity');
		}
		else
		{
        
        $config['upload_path']           = FCPATH.'assets/images/activity/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['encrypt_name']        = TRUE;
        $config['max_size']             = 3000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);
        if ( $this->upload->do_upload('image'))
        {
            $image = $this->upload->data();
            $image_path=$image['file_name'];
            $image_record ='assets/images/activity/'.$image_path.'';
            $image_tmb   ='assets/images/activity/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='assets/images/activity/'.$image_path.'';
            $config['new_image']='assets/images/activity/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=1920;
            $config['height']=750;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
            //Thum bitiş
            //Mini başlangıç
            /*$config['image_library']='gd2';
            $config['source_image']='assets/front/images/haber/'.$image_path.'';
            $config['new_image']='assets/front/images/haber/mini/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=94;
            $config['height']=73;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();*/
            unlink($image_record);
      
      $data=array(
                'etkinlik_adi'=>$this->input->post('etkinlik_adi'),
                'firma_id' =>$this->input->post('firma_id'),
                'il_id'=>$this->input->post('il_id'),
                'etkinlik_mekanadi'=>$this->input->post('etkinlik_mekanadi'),
                'etkinliktip_id'=>$this->input->post('etkinliktip_id'),
                'etkinlik_telefon'=>$this->input->post('etkinlik_telefon'),
                'etkinlik_adres'=>$this->input->post('etkinlik_adres'),
                'etkinlik_url'=>$this->input->post('etkinlik_url'),
                'etkinlik_baslangictarih'=>$this->input->post('etkinlik_baslangictarih'),
                'etkinlik_bitistarih'=>$this->input->post('etkinlik_bitistarih'),
                'etkinlik_saati'=>$this->input->post('etkinlik_saati'),
                'etkinlik_fiyat'=>$this->input->post('etkinlik_fiyat'),
                'etkinlik_keyword'=>$this->input->post('etkinlik_keyword'),
                'etkinlik_goruntuleme'=>$this->input->post('etkinlik_goruntuleme'),
                'etkinlik_detay'=>$this->input->post('etkinlik_detay'),
                
                'etkinlik_isActive'=>0,
                //'etkinlik_resim'=>$image_record,
                'etkinlik_tmb'=>$image_tmb,
                
                 );

      $result=$this->activity_model->add_activity($data);

      if ($result) {
      $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt başarılı. 
              </div>');
      redirect('activity_controller');
      }else{
      $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt Başarısız!... 
              </div>');
      redirect('activity_controller');
      }

        }else
        {
              $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Resim Eklenemedi!... 
              </div>');
              redirect('activity_controller');
        }

           	
		  }//validation control
	}


	public function delete_activity_controller($id)
	{

            //$activity_image=$this->activity_model->activity_image_m($id);
            $activity_tmb=$this->activity_model->activity_tmb_m($id);
           
            //unlink($activity_image);
            unlink($activity_tmb);

		$result=$this->activity_model->delete_activity($id);
			   
         if ($result) {

            

           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt silindi. 
              	</div>');
      			redirect('activity_controller');
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt silme işlemi Başarısız!... 
              </div>');
      			redirect('activity_controller');
           	}
	}

  public function edit_activity_controller($id)
  {
    $data['result']=$this->activity_model->edit_activity($id);
    $this->load->view('admin/activity/edit/edit_activity',$data);

  }

  public function update_activity_controller()
  {

    $id=$this->input->post('etkinlik_id');
    
    /*if (empty($_FILES['image']['name']))
          {
              $this->form_validation->set_rules('image', 'Resim', 'callback_image');
          }*/
      
      $this->form_validation->set_rules('kesfet_title', 'Başlık', 'required');
      $this->form_validation->set_rules('firma_id', 'Firma Adı', 'required|is_Natural'); 
      $this->form_validation->set_rules('etkinlik_adi', 'Etkinlik Adı', 'required');    
      $this->form_validation->set_rules('etkinlik_mekanadi', 'Etkinlik Mekan Adı', 'required');
      $this->form_validation->set_rules('etkinlik_adres', 'Adres', 'required');
      $this->form_validation->set_rules('etkinliktip_id', 'Etkinlik Tipi', 'required|is_Natural');
      $this->form_validation->set_rules('il_id', 'Etkinlik İl Adı', 'required|is_Natural');
      $this->form_validation->set_rules('etkinlik_telefon', 'Telefon', 'required');    
      $this->form_validation->set_rules('etkinlik_url', 'Web Adresi', 'required');
      $this->form_validation->set_rules('etkinlik_baslangictarih', 'Başlangıç Tarihi', 'required');
      $this->form_validation->set_rules('etkinlik_saati', 'Saat', 'required');
      $this->form_validation->set_rules('etkinlik_bitistarih', 'Bitiş Tarihi', 'required');
      $this->form_validation->set_rules('etkinlik_fiyat', 'Etkinlik Fiyat', 'required');
      $this->form_validation->set_rules('etkinlik_goruntuleme', 'Etkinlik Görüntüleme', 'required');
      $this->form_validation->set_rules('etkinlik_keyword', 'Anahtar Kelimeler', 'required');
      $this->form_validation->set_rules('etkinlik_detay', 'Etkinlik Detay', 'required');



      $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.'); 
      $this->form_validation->set_message('is_Natural', 'Lütfen bir seçim yapınız.');
      //$this->form_validation->set_message('image', 'Lütfen bir resim seçiniz');
      
          
      $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

    if ($this->form_validation->run() == FALSE)
    { 
          $data['result']=$this->activity_model->edit_activity($id);
          $this->load->view('admin/activity/edit/edit_activity',$data);
    }
    else
    {
        

        $config['upload_path']           = FCPATH.'assets/images/activity/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['encrypt_name']        = TRUE;
        $config['max_size']             = 3000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);
        if ( $this->upload->do_upload('image'))
        {
            $image = $this->upload->data();
            $image_path=$image['file_name'];
            $image_record ='assets/images/activity/'.$image_path.'';
            $image_tmb   ='assets/images/activity/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='assets/images/activity/'.$image_path.'';
            $config['new_image']='assets/images/activity/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=1920;
            $config['height']=750;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
            //Thum bitiş
            //Mini başlangıç
            /*$config['image_library']='gd2';
            $config['source_image']='assets/front/images/haber/'.$image_path.'';
            $config['new_image']='assets/front/images/haber/mini/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=94;
            $config['height']=73;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();*/
            

            //$activity_image_delete=$this->activity_model->activity_image_m($id);
            $activity_tmb_delete=$this->activity_model->activity_tmb_m($id);
            
            //unlink($activity_image_delete);
           
            unlink($activity_tmb_delete);
            unlink($image_record);
                  
            $data=array(
                'etkinlik_adi'=>$this->input->post('etkinlik_adi'),
                'firma_id' =>$this->input->post('firma_id'),
                'il_id'=>$this->input->post('il_id'),
                'etkinlik_mekanadi'=>$this->input->post('etkinlik_mekanadi'),
                'etkinliktip_id'=>$this->input->post('etkinliktip_id'),
                'etkinlik_telefon'=>$this->input->post('etkinlik_telefon'),
                'etkinlik_adres'=>$this->input->post('etkinlik_adres'),
                'etkinlik_url'=>$this->input->post('etkinlik_url'),
                'etkinlik_baslangictarih'=>$this->input->post('etkinlik_baslangictarih'),
                'etkinlik_bitistarih'=>$this->input->post('etkinlik_bitistarih'),
                'etkinlik_saati'=>$this->input->post('etkinlik_saati'),
                'etkinlik_fiyat'=>$this->input->post('etkinlik_fiyat'),
                'etkinlik_keyword'=>$this->input->post('etkinlik_keyword'),
                'etkinlik_goruntuleme'=>$this->input->post('etkinlik_goruntuleme'),
                'etkinlik_detay'=>$this->input->post('etkinlik_detay'),
                
                'etkinlik_isActive'=>0,
                //'etkinlik_resim'=>$image_record,
                'etkinlik_tmb'=>$image_tmb,
                
                 );

          $result=$this->activity_model->update_activity($id,$data);

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Etkinlik güncellendi. 
                  </div>');
          redirect('activity_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('activity_controller');
          }

        }else
        { //Resim yüklenemedi

          $data=array(
                'etkinlik_adi'=>$this->input->post('etkinlik_adi'),
                'firma_id' =>$this->input->post('firma_id'),
                'il_id'=>$this->input->post('il_id'),
                'etkinlik_telefon'=>$this->input->post('etkinlik_telefon'),
                'etkinlik_adres'=>$this->input->post('etkinlik_adres'),
                'etkinlik_url'=>$this->input->post('etkinlik_url'),
                'etkinlik_baslangictarih'=>$this->input->post('etkinlik_baslangictarih'),
                'etkinlik_bitistarih'=>$this->input->post('etkinlik_bitistarih'),
                'etkinlik_fiyateski'=>$this->input->post('etkinlik_fiyateski'),
                'etkinlik_fiyatyeni'=>$this->input->post('etkinlik_fiyatyeni'),
                'etkinlik_keyword'=>$this->input->post('etkinlik_keyword'),
                'etkinlik_goruntuleme'=>$this->input->post('etkinlik_goruntuleme'),
                'etkinlik_detay'=>$this->input->post('etkinlik_detay'),

                'etkinlik_isActive'=>0,
                                
                 );

          $id=$this->input->post('etkinlik_id');
          $result=$this->activity_model->update_activity($id,$data);
          

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Etkinlik güncellendi. 
                  </div>');
          redirect('activity_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('activity_controller');
          }
        }

            
    }//valitadation

  }

    public function isActive_set()
    {
      $id=$this->input->post('id');
      $isActive=($this->input->post('isActive')=="true")?1:0;
      $this->db->where('etkinlik_id',$id)->update('tbl_etkinlik',array('etkinlik_isActive'=>$isActive));
    }


	
}

?>