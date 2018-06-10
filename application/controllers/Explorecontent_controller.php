<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Explorecontent_controller extends CI_Controller {
 // private $_ci;
	public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }
              //$this->load->model('oppurtunity_model');
           		$this->load->model('explorecontent_model');
           // $this->load->library('googlemaps');           
   
        }
	
	public function index()
	{
	

		$data['result']=$this->explorecontent_model->getAll_explorecontent();
		$this->load->view('admin/explore/content/content',$data);
		
	}

	
	public function add_explorecontent_page_controller()
	{
        	
		$this->load->view('admin/explore/content/add/add_content');
		
	}

	public function add_explorecontent_controller()
	{	
    
     if (empty($_FILES['image']['name']))
          {
              $this->form_validation->set_rules('image', 'Resim', 'callback_image');
          }
      
      $this->form_validation->set_rules('kesfet_title', 'Başlık', 'required'); 
      $this->form_validation->set_rules('ilce', 'İlçe', 'required|is_Natural');    
      $this->form_validation->set_rules('mahalle', 'Mahalle', 'required|is_Natural');
      $this->form_validation->set_rules('kesfet_detail', 'İçerik', 'required');
      $this->form_validation->set_rules('kesfet_keyword', 'Anahtar kelimeler', 'required');
      $this->form_validation->set_rules('location', 'Konum Bilgileri', 'required');       
      
      $this->form_validation->set_rules('kesfet_kategoriid', 'Grup Seçimi', 'required|is_Natural');

      $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.'); 
      $this->form_validation->set_message('is_Natural', 'Lütfen bir grup seçiniz');
      $this->form_validation->set_message('image', 'Lütfen bir resim seçiniz');
      
          
      $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

		if ($this->form_validation->run() == FALSE)
		{ 
          $this->load->view('admin/explore/content/add/add_content');
		}
		else
		{
        
        $config['upload_path']  = FCPATH.'assets/images/explorecontent/';
        $config['allowed_types']= 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $config['max_size']     = 3000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);
        if ( $this->upload->do_upload('image'))
        {
            $image = $this->upload->data();
            $image_path=$image['file_name'];
            $image_record ='assets/images/explorecontent/'.$image_path.'';
            $image_tmb   ='assets/images/explorecontent/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='assets/images/explorecontent/'.$image_path.'';
            $config['new_image']='assets/images/explorecontent/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=950;
            $config['height']=375;

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
                'kesfet_title'=>$this->input->post('kesfet_title'),
                'ilce' =>$this->input->post('ilce'),
                'mahalle'=>$this->input->post('mahalle'),
                'lat'=>$this->input->post('lat'),
                'lng'=>$this->input->post('lng'),
                'name'=>$this->input->post('name'),
                'location'=>$this->input->post('location'),

                'kesfet_detail'=>$this->input->post('kesfet_detail'),
                'kesfet_keyword'=>$this->input->post('kesfet_keyword'),
                'kesfet_kategoriid'=>$this->input->post('kesfet_kategoriid'),
                'kesfet_isActive'=>0,
                'kesfet_tmb'=>$image_tmb,
                
                 );
      
      $result=$this->explorecontent_model->add_explorecontent($data);

      if ($result) {
      $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt başarılı. 
              </div>');
      redirect('explorecontent_controller');
      }else{
      $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt Başarısız!... 
              </div>');
      redirect('explorecontent_controller');
      }

        }else
        {
              $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Resim Eklenemedi!... 
              </div>');
              redirect('explorecontent_controller');
        }

           	
	}//validation control*/
	}


	public function delete_explorecontent_controller($id)
	{

            
        $explorecontent_tmb_delete=$this->explorecontent_model->explorecontent_tmb_m($id);
        unlink($explorecontent_tmb_delete);

		    $result=$this->explorecontent_model->delete_explorecontent($id);
			   
         if ($result) {

            

           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt silindi. 
              	</div>');
      			redirect('explorecontent_controller');
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt silme işlemi Başarısız!... 
              </div>');
      			redirect('explorecontent_controller');
           	}
	}

  public function edit_explorecontent_controller($id)
  {
    $data['result']=$this->explorecontent_model->edit_explorecontent($id);
    $this->load->view('admin/explore/content/edit/edit_content',$data);

  }

  public function update_explorecontent_controller()
  {   
      $id=$this->input->post('kesfet_id');
    
      /*if (empty($_FILES['image']['name']))
          {
              $this->form_validation->set_rules('image', 'Resim', 'callback_image');
          }*/
      $this->form_validation->set_rules('kesfet_title', 'Başlık', 'required'); 
      $this->form_validation->set_rules('ilce', 'İlçe', 'required|is_Natural');    
      $this->form_validation->set_rules('mahalle', 'Mahalle', 'required|is_Natural');
      $this->form_validation->set_rules('kesfet_detail', 'İçerik', 'required');
      $this->form_validation->set_rules('kesfet_keyword', 'Anahtar kelimeler', 'required');    
      $this->form_validation->set_rules('location', 'Konum Bilgileri', 'required');
      $this->form_validation->set_rules('kesfet_kategoriid', 'Grup Seçimi', 'required|is_Natural');
      
      $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.'); 
      $this->form_validation->set_message('is_Natural', 'Lütfen bir grup seçiniz');
      $this->form_validation->set_message('image', 'Lütfen bir resim seçiniz');
          
      $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

    if ($this->form_validation->run() == FALSE)
    { 
          
         $data['result']=$this->explorecontent_model->edit_explorecontent($id);
        $this->load->view('admin/explore/content/edit/edit_content',$data);
    }
    else
    {
        

        $config['upload_path']           = FCPATH.'assets/images/explorecontent/';
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
            $image_record ='assets/images/explorecontent/'.$image_path.'';
            $image_tmb   ='assets/images/explorecontent/tumb/'.$image_path.'';
            $config['image_library']='gd2';
            $config['source_image']='assets/images/explorecontent/'.$image_path.'';
            $config['new_image']='assets/images/explorecontent/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=950;
            $config['height']=375;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
           
            
            
            $explorecontent_tmb_delete=$this->explorecontent_model->explorecontent_tmb_m($id);
            
            unlink($image_record);
            unlink($explorecontent_tmb_delete);
                  
            $data=array(
                'kesfet_title'=>$this->input->post('kesfet_title'),
                'ilce' =>$this->input->post('ilce'),
                'mahalle'=>$this->input->post('mahalle'),
                'lat'=>$this->input->post('lat'),
                'lng'=>$this->input->post('lng'),
                'name'=>$this->input->post('name'),
                'location'=>$this->input->post('location'),
                'kesfet_detail'=>$this->input->post('kesfet_detail'),
                'kesfet_keyword'=>$this->input->post('kesfet_keyword'),
                'kesfet_kategoriid'=>$this->input->post('kesfet_kategoriid'),
                'kesfet_isActive'=>0,
                'kesfet_tmb'=>$image_tmb,
                
                 );

          $result=$this->explorecontent_model->update_explorecontent($id,$data);

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    İçerik güncellendi. 
                  </div>');
          redirect('explorecontent_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('explorecontent_controller');
          }

          }else
          { //Resim yüklenemedi

          $data=array(
               'kesfet_title'=>$this->input->post('kesfet_title'),
                'ilce' =>$this->input->post('ilce'),
                'mahalle'=>$this->input->post('mahalle'),
                'lat'=>$this->input->post('lat'),
                'lng'=>$this->input->post('lng'),
                'name'=>$this->input->post('name'),
                'location'=>$this->input->post('location'),
                'kesfet_detail'=>$this->input->post('kesfet_detail'),
                'kesfet_keyword'=>$this->input->post('kesfet_keyword'),
                'kesfet_kategoriid'=>$this->input->post('kesfet_kategoriid'),
                'kesfet_isActive'=>0,
                                
                 );

          $id=$this->input->post('kesfet_id');
          $result=$this->explorecontent_model->update_explorecontent($id,$data);
          

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    İçerik güncellendi. 
                  </div>');
          redirect('explorecontent_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('explorecontent_controller');
          }
        }

         
     }//valitadation

  }


    public function isActive_set()
    {
      $id=$this->input->post('id');
      $isActive=($this->input->post('isActive')=="true")?1:0;
      $this->db->where('kesfet_id',$id)->update('tbl_kesfet',array('kesfet_isActive'=>$isActive));
    }

    public function get_mahalle()
    {

        //$ilce_key = $this->input->post('ilce_key');
        $ilce_key = $this->uri->segment(3);
        //$ilce_key=1103;

        $mahalleler = $this->explorecontent_model->get_mahalle($ilce_key);
        /*print_r($mahalleler);
        die();*/
        if(count($mahalleler)>0)
        {
          $pro_select_box = '';
          $pro_select_box .= '<option value="">Mahalle Seçiniz</option>';
          foreach ($mahalleler as $mahalle) {
            $pro_select_box .='<option value="'.$mahalle->mahalle_key.'">'.$mahalle->mahalle_title.'</option>';
          }
          echo json_encode($pro_select_box);
    }
  }
	
}

?>