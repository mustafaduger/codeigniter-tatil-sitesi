<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Opportunity_controller extends CI_Controller {
 // private $_ci;
	public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }
              
           		$this->load->model('opportunity_model');
              
              
                
        }
	
	public function index()
	{
	

		$data['result']=$this->opportunity_model->getAll_opportunity();
		$this->load->view('admin/opportunity/opportunity',$data);
		
	}

	
	public function add_opportunity_page_controller()
	{
        	
		$this->load->view('admin/opportunity/add/add_opportunity');
		
	}

	public function add_opportunity_controller()
	{	
    
      if (empty($_FILES['image']['name']))
          {
              $this->form_validation->set_rules('image', 'Resim', 'callback_image');
          }
      
      
      $this->form_validation->set_rules('firma_id', 'Firma Adı', 'required|is_Natural'); 
      $this->form_validation->set_rules('firsat_adi', 'Fırsat Adı', 'required');    
      $this->form_validation->set_rules('firsat_adres', 'Adres', 'required');
      $this->form_validation->set_rules('il_id', 'İl Adı', 'required|is_Natural');
      $this->form_validation->set_rules('firsat_telefon', 'Telefon', 'required');    
      $this->form_validation->set_rules('firsat_url', 'Web Adresi', 'required');
      $this->form_validation->set_rules('firsat_baslangictarih', 'Başlangıç Tarihi', 'required');
      $this->form_validation->set_rules('firsat_saati', 'Saat', 'required');
      $this->form_validation->set_rules('firsat_bitistarih', 'Bitiş Tarihi', 'required');
      $this->form_validation->set_rules('firsat_fiyatyeni', 'Fırsat Fiyat Yeni', 'required');
      $this->form_validation->set_rules('firsat_fiyateski', 'Fırsat Fiyat Eski', 'required');
      $this->form_validation->set_rules('firsat_goruntuleme', 'Fırsat Görüntüleme', 'required');
      $this->form_validation->set_rules('firsat_keyword', 'Anahtar Kelimeler', 'required');
      $this->form_validation->set_rules('firsat_detay', 'Fırsat Detay', 'required');



      $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.'); 
      $this->form_validation->set_message('is_Natural', 'Lütfen bir seçim yapınız.');
      $this->form_validation->set_message('image', 'Lütfen bir resim seçiniz');
      
          
      $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

  		if ($this->form_validation->run() == FALSE)
  		{ 
            $this->load->view('admin/opportunity/add/add_opportunity');
  		}
  		else
  		{
        
        $config['upload_path']           = FCPATH.'assets/images/opportunity/';
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
            $image_record ='assets/images/opportunity/'.$image_path.'';
            $image_tmb   ='assets/images/opportunity/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='assets/images/opportunity/'.$image_path.'';
            $config['new_image']='assets/images/opportunity/tumb/'.$image_path.'';
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
                'firsat_adi'=>$this->input->post('firsat_adi'),
                'firma_id' =>$this->input->post('firma_id'),
                'il_id'=>$this->input->post('il_id'),
                'firsat_telefon'=>$this->input->post('firsat_telefon'),
                'firsat_adres'=>$this->input->post('firsat_adres'),
                'firsat_url'=>$this->input->post('firsat_url'),
                'firsat_baslangictarih'=>$this->input->post('firsat_baslangictarih'),
                'firsat_bitistarih'=>$this->input->post('firsat_bitistarih'),
                'firsat_fiyateski'=>$this->input->post('firsat_fiyateski'),
                'firsat_fiyatyeni'=>$this->input->post('firsat_fiyatyeni'),
                'firsat_keyword'=>$this->input->post('firsat_keyword'),
                'firsat_goruntuleme'=>$this->input->post('firsat_goruntuleme'),
                'firsat_detay'=>$this->input->post('firsat_detay'),
                'firsat_saati'=>$this->input->post('firsat_saati'),
                'firsat_isActive'=>0,
                //'firsat_resim'=>$image_record,
                'firsat_tmb'=>$image_tmb,
                
                 );

      $result=$this->opportunity_model->add_opportunity($data);

      if ($result) {
      $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt başarılı. 
              </div>');
      redirect('opportunity_controller');
      }else{
      $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt Başarısız!... 
              </div>');
      redirect('opportunity_controller');
      }

        }else
        {
              $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Resim Eklenemedi!... 
              </div>');
              redirect('opportunity_controller');
        }

           	
		}//validation control
	}


	public function delete_opportunity_controller($id)
	{

            //$opportunity_image=$this->opportunity_model->opportunity_image_m($id);
            $opportunity_tmb=$this->opportunity_model->opportunity_tmb_m($id);
           
            //unlink($opportunity_image);
            unlink($opportunity_tmb);

		$result=$this->opportunity_model->delete_opportunity($id);
			   
         if ($result) {

            

           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt silindi. 
              	</div>');
      			redirect('opportunity_controller');
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt silme işlemi Başarısız!... 
              </div>');
      			redirect('opportunity_controller');
           	}
	}

  public function edit_opportunity_controller($id)
  {
    $data['result']=$this->opportunity_model->edit_opportunity($id);
    $this->load->view('admin/opportunity/edit/edit_opportunity',$data);

  }

  public function update_opportunity_controller()
  {
      
      $id=$this->input->post('firsat_id');
    /*if (empty($_FILES['image']['name']))
          {
              $this->form_validation->set_rules('image', 'Resim', 'callback_image');
          }*/
      
      
      $this->form_validation->set_rules('firma_id', 'Firma Adı', 'required|is_Natural'); 
      $this->form_validation->set_rules('firsat_adi', 'Fırsat Adı', 'required');    
      $this->form_validation->set_rules('firsat_adres', 'Adres', 'required');
      $this->form_validation->set_rules('il_id', 'İl Adı', 'required|is_Natural');
      $this->form_validation->set_rules('firsat_telefon', 'Telefon', 'required');    
      $this->form_validation->set_rules('firsat_url', 'Web Adresi', 'required');
      $this->form_validation->set_rules('firsat_baslangictarih', 'Başlangıç Tarihi', 'required');
      $this->form_validation->set_rules('firsat_saati', 'Saat', 'required');
      $this->form_validation->set_rules('firsat_bitistarih', 'Bitiş Tarihi', 'required');
      $this->form_validation->set_rules('firsat_fiyatyeni', 'Fırsat Fiyat Yeni', 'required');
      $this->form_validation->set_rules('firsat_fiyateski', 'Fırsat Fiyat Eski', 'required');
      $this->form_validation->set_rules('firsat_goruntuleme', 'Fırsat Görüntüleme', 'required');
      $this->form_validation->set_rules('firsat_keyword', 'Anahtar Kelimeler', 'required');
      $this->form_validation->set_rules('firsat_detay', 'Fırsat Detay', 'required');



      $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.'); 
      $this->form_validation->set_message('is_Natural', 'Lütfen bir seçim yapınız.');
      $this->form_validation->set_message('image', 'Lütfen bir resim seçiniz');
      
          
      $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

    if ($this->form_validation->run() == FALSE)
    { 
          $data['result']=$this->opportunity_model->edit_opportunity($id);
          $this->load->view('admin/opportunity/edit/edit_opportunity',$data);
    }
    else
    {
        

        $config['upload_path']           = FCPATH.'assets/images/opportunity/';
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
            $image_record ='assets/images/opportunity/'.$image_path.'';
            $image_tmb   ='assets/images/opportunity/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='assets/images/opportunity/'.$image_path.'';
            $config['new_image']='assets/images/opportunity/tumb/'.$image_path.'';
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
            

            //$opportunity_image_delete=$this->opportunity_model->opportunity_image_m($id);
            $opportunity_tmb_delete=$this->opportunity_model->opportunity_tmb_m($id);
            
            //unlink($opportunity_image_delete);
           
            unlink($opportunity_tmb_delete);
            unlink($image_record);
                  
            $data=array(
                'firsat_adi'=>$this->input->post('firsat_adi'),
                'firma_id' =>$this->input->post('firma_id'),
                'il_id'=>$this->input->post('il_id'),
                'firsat_telefon'=>$this->input->post('firsat_telefon'),
                'firsat_adres'=>$this->input->post('firsat_adres'),
                'firsat_url'=>$this->input->post('firsat_url'),
                'firsat_baslangictarih'=>$this->input->post('firsat_baslangictarih'),
                'firsat_bitistarih'=>$this->input->post('firsat_bitistarih'),
                'firsat_fiyateski'=>$this->input->post('firsat_fiyateski'),
                'firsat_fiyatyeni'=>$this->input->post('firsat_fiyatyeni'),
                'firsat_keyword'=>$this->input->post('firsat_keyword'),
                'firsat_goruntuleme'=>$this->input->post('firsat_goruntuleme'),
                'firsat_detay'=>$this->input->post('firsat_detay'),
                'firsat_saati'=>$this->input->post('firsat_saati'),

                'firsat_isActive'=>0,
                //'firsat_resim'=>$image_record,
                'firsat_tmb'=>$image_tmb,
                
                 );

          $result=$this->opportunity_model->update_opportunity($id,$data);

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Şehir fırsatı güncellendi. 
                  </div>');
          redirect('opportunity_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('opportunity_controller');
          }

        }else
        { //Resim yüklenemedi

          $data=array(
                'firsat_adi'=>$this->input->post('firsat_adi'),
                'firma_id' =>$this->input->post('firma_id'),
                'il_id'=>$this->input->post('il_id'),
                'firsat_telefon'=>$this->input->post('firsat_telefon'),
                'firsat_adres'=>$this->input->post('firsat_adres'),
                'firsat_url'=>$this->input->post('firsat_url'),
                'firsat_baslangictarih'=>$this->input->post('firsat_baslangictarih'),
                'firsat_bitistarih'=>$this->input->post('firsat_bitistarih'),
                'firsat_fiyateski'=>$this->input->post('firsat_fiyateski'),
                'firsat_fiyatyeni'=>$this->input->post('firsat_fiyatyeni'),
                'firsat_keyword'=>$this->input->post('firsat_keyword'),
                'firsat_goruntuleme'=>$this->input->post('firsat_goruntuleme'),
                'firsat_detay'=>$this->input->post('firsat_detay'),

                'firsat_isActive'=>0,
                                
                 );

          $id=$this->input->post('firsat_id');
          $result=$this->opportunity_model->update_opportunity($id,$data);
          

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Şehir fırsatı güncellendi. 
                  </div>');
          redirect('opportunity_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('opportunity_controller');
          }
        }

            
      }//valitadation

  }

    public function isActive_set()
    {
      $id=$this->input->post('id');
      $isActive=($this->input->post('isActive')=="true")?1:0;
      $this->db->where('firsat_id',$id)->update('tbl_firsat',array('firsat_isActive'=>$isActive));
    }


	
}

?>