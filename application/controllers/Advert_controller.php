<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Advert_controller extends CI_Controller {
 // private $_ci;
	public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }
              
           		$this->load->model('advert_model');
              
              
                
        }
	
	public function index($id=null)
	{
	 if ($id==null) {
     $id=1;
   }

		$data['result']=$this->advert_model->getAll_advertById($id);
		$this->load->view('admin/advert/advert',$data);
		
	}

	
	public function add_advert_page_controller()
	{
        	
		$this->load->view('admin/advert/add/add_advert');
		
	}

	public function add_advert_controller()
	{	

     if (empty($_FILES['image']['name']))
          {
              $this->form_validation->set_rules('image', 'Resim', 'callback_image');
          }
      $this->form_validation->set_rules('firma_id', 'Firma Adı', 'required|is_Natural'); 
      $this->form_validation->set_rules('reklam_adi', 'Reklam Başlık', 'required');    
      $this->form_validation->set_rules('reklamyeri_id', 'Gösterim Konumu', 'required|is_Natural');
      $this->form_validation->set_rules('reklam_bitistarih', 'Bitiş Tarihi', 'required');
      $this->form_validation->set_rules('reklam_baslangictarih', 'Başlangıç Tarihi', 'required');
 
      $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.'); 
      $this->form_validation->set_message('is_Natural', 'Lütfen bir seçim yapınız.');
      $this->form_validation->set_message('image', 'Lütfen bir resim seçiniz');
      
          
      $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

		if ($this->form_validation->run() == FALSE)
		{ 
          $this->load->view('admin/advert/add/add_advert');
		}
		else
		{
        
        $config['upload_path']           = FCPATH.'assets/images/advert/';
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
            $image_record ='assets/images/advert/'.$image_path.'';
            $image_tmb   ='assets/images/advert/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='assets/images/advert/'.$image_path.'';
            $config['new_image']='assets/images/advert/tumb/'.$image_path.'';
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
                'reklam_adi'=>$this->input->post('reklam_adi'),
                'firma_id' =>$this->input->post('firma_id'),
                'reklamyeri_id'=>$this->input->post('reklamyeri_id'),
                'reklam_baslangictarih'=>$this->input->post('reklam_baslangictarih'),
                'reklam_bitistarih'=>$this->input->post('reklam_bitistarih'),
                'reklam_isActive'=>0,
                'reklam_tmb'=>$image_tmb,
                );

      $result=$this->advert_model->add_advert($data);

      if ($result) {
      $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt başarılı. 
              </div>');
      redirect('advert_controller');
      }else{
      $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt Başarısız!... 
              </div>');
      redirect('advert_controller');
      }

        }else
        {
              $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Resim Eklenemedi!... 
              </div>');
              redirect('advert_controller');
        }

           	
		}//validation control
	}


	public function delete_advert_controller($id)
	{

            //$advert_image=$this->advert_model->advert_image_m($id);
            $advert_tmb=$this->advert_model->advert_tmb_m($id);
           
            //unlink($advert_image);
            unlink($advert_tmb);

		$result=$this->advert_model->delete_advert($id);
			   
         if ($result) {

            

           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt silindi. 
              	</div>');
      			redirect('advert_controller');
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt silme işlemi Başarısız!... 
              </div>');
      			redirect('advert_controller');
           	}
	}

  public function edit_advert_controller($id)
  {
    $data['result']=$this->advert_model->edit_advert($id);
    $this->load->view('admin/advert/edit/edit_advert',$data);

  }

  public function update_advert_controller()
  {
      $id=$this->input->post('reklam_id');
   /* if (empty($_FILES['image']['name']))
          {
              $this->form_validation->set_rules('image', 'Resim', 'callback_image');
          }*/
      $this->form_validation->set_rules('firma_id', 'Firma Adı', 'required|is_Natural'); 
      $this->form_validation->set_rules('reklam_adi', 'Reklam Başlık', 'required');    
      $this->form_validation->set_rules('reklamyeri_id', 'Gösterim Konumu', 'required|is_Natural');
      $this->form_validation->set_rules('reklam_bitistarih', 'Bitiş Tarihi', 'required');
      $this->form_validation->set_rules('reklam_baslangictarih', 'Başlangıç Tarihi', 'required');
 
      $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.'); 
      $this->form_validation->set_message('is_Natural', 'Lütfen bir seçim yapınız.');
      //$this->form_validation->set_message('image', 'Lütfen bir resim seçiniz');
      
          
      $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

    if ($this->form_validation->run() == FALSE)
    { 
          $data['result']=$this->advert_model->edit_advert($id);
    $this->load->view('admin/advert/edit/edit_advert',$data);
    }
    else
    {
        

        $config['upload_path']           = FCPATH.'assets/images/advert/';
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
            $image_record ='assets/images/advert/'.$image_path.'';
            $image_tmb   ='assets/images/advert/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='assets/images/advert/'.$image_path.'';
            $config['new_image']='assets/images/advert/tumb/'.$image_path.'';
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
            $id=$this->input->post('reklam_id');

            //$advert_image_delete=$this->advert_model->advert_image_m($id);
            $advert_tmb_delete=$this->advert_model->advert_tmb_m($id);
            
            //unlink($advert_image_delete);
           
            unlink($advert_tmb_delete);
            unlink($image_record);
                  
            $data=array(
                'reklam_adi'=>$this->input->post('reklam_adi'),
                'firma_id' =>$this->input->post('firma_id'),
                'reklamyeri_id'=>$this->input->post('reklamyeri_id'),
                'reklam_baslangictarih'=>$this->input->post('reklam_baslangictarih'),
                'reklam_bitistarih'=>$this->input->post('reklam_bitistarih'),
                'reklam_isActive'=>0,
                'reklam_tmb'=>$image_tmb,
                 );

          $result=$this->advert_model->update_advert($id,$data);

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Reklam güncellendi. 
                  </div>');
          redirect('advert_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('advert_controller');
          }

        }else
        { //Resim yüklenemedi

          $data=array(
                'reklam_adi'=>$this->input->post('reklam_adi'),
                'firma_id' =>$this->input->post('firma_id'),
                'reklamyeri_id'=>$this->input->post('reklamyeri_id'),
                'reklam_baslangictarih'=>$this->input->post('reklam_baslangictarih'),
                'reklam_bitistarih'=>$this->input->post('reklam_bitistarih'),
                'reklam_isActive'=>0,
                 );

          
          $result=$this->advert_model->update_advert($id,$data);
          

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Reklam güncellendi. 
                  </div>');
          redirect('advert_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('advert_controller');
          }
        }

            
    }//valitadation

  }

    public function isActive_set()
    {
      $id=$this->input->post('id');
      $isActive=($this->input->post('isActive')=="true")?1:0;
      $this->db->where('reklam_id',$id)->update('tbl_reklam',array('reklam_isActive'=>$isActive));
    }


	
}

?>