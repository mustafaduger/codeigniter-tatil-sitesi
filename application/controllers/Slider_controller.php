<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider_controller extends CI_Controller {
 // private $_ci;
	public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }
              
           		$this->load->model('slider_model');
              
              
                
        }
	
	public function index()
	{
	

		$data['result']=$this->slider_model->getAll_slider();
		$this->load->view('admin/slider/slider',$data);
		
	}

	
	public function add_slider_page_controller()
	{
        	
		$this->load->view('admin/slider/add/add_slider');
		
	}

	public function add_slider_controller()
	{	
    
      
    //$this->load->view('admin/item/add/add_item',$data);
/*
		$this->form_validation->set_message('required', '* Alan boş geçilemez!..');
    $this->form_validation->set_message('greater_than', '* Seçim yapınız!..');
    $this->form_validation->set_message('is_natural_no_zero', '* Sadece sayı girebilirsiniz!..');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

		if ($this->form_validation->run('item') == FALSE)
		{ 
          $this->load->view('admin/slider/add/add_slider',$data);
		}
		else
		{*/
        
        $config['upload_path']           = FCPATH.'assets/images/slider/';
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
            $image_record ='assets/images/slider/'.$image_path.'';
            $image_tmb   ='assets/images/slider/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='assets/images/slider/'.$image_path.'';
            $config['new_image']='assets/images/slider/tumb/'.$image_path.'';
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
      
      $data=array(
                'slider_name'=>$this->input->post('slider_name'),
                'slider_url' =>$this->input->post('slider_url'),
                'slider_sira'=>$this->input->post('slider_sira'),
                'slider_isActive'=>1,
                'slider_image'=>$image_record,
                'slider_tmb'=>$image_tmb,
                
                 );

      $result=$this->slider_model->add_slider($data);

      if ($result) {
      $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt başarılı. 
              </div>');
      redirect('slider_controller');
      }else{
      $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt Başarısız!... 
              </div>');
      redirect('slider_controller');
      }

        }else
        {
              $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Resim Eklenemedi!... 
              </div>');
              redirect('slider_controller');
        }

           	
		// }//validation control
	}


	public function delete_slider_controller($id)
	{

            $slider_image_delete=$this->slider_model->slider_image_m($id);
            $slider_tmb_delete=$this->slider_model->slider_tmb_m($id);
            
            unlink($slider_image_delete);
            unlink($slider_tmb_delete);

		$result=$this->slider_model->delete_slider($id);
			   
         if ($result) {

            

           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt silindi. 
              	</div>');
      			redirect('slider_controller');
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt silme işlemi Başarısız!... 
              </div>');
      			redirect('slider_controller');
           	}
	}

  public function edit_slider_controller($id)
  {
    $data['result']=$this->slider_model->edit_slider($id);
    $this->load->view('admin/slider/edit/edit_slider',$data);

  }

  public function update_slider_controller()
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
        

        $config['upload_path']           = FCPATH.'assets/images/slider/';
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
            $image_record ='assets/images/slider/'.$image_path.'';
            $image_tmb   ='assets/images/slider/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='assets/images/slider/'.$image_path.'';
            $config['new_image']='assets/images/slider/tumb/'.$image_path.'';
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
            $id=$this->input->post('slider_id');

            $slider_image_delete=$this->slider_model->slider_image_m($id);
            $slider_tmb_delete=$this->slider_model->slider_tmb_m($id);
            
            unlink($slider_image_delete);
            unlink($slider_tmb_delete);
                  
            $data=array(
                'slider_name'=>$this->input->post('slider_name'),
                'slider_url' =>$this->input->post('slider_url'),
                'slider_sira'=>$this->input->post('slider_sira'),
                'slider_isActive'=>1,
                'slider_image'=>$image_record,
                'slider_tmb'=>$image_tmb,
                
                 );

          $result=$this->slider_model->update_slider($id,$data);

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Güncelleme başarılı. 
                  </div>');
          redirect('slider_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('slider_controller');
          }

        }else
        { //Resim yüklenemedi

          $data=array(
                'slider_name'=>$this->input->post('slider_name'),
                'slider_url' =>$this->input->post('slider_url'),
                'slider_sira'=>$this->input->post('slider_sira'),
                'slider_isActive'=>1,
                                
                 );

          $id=$this->input->post('slider_id');
          $result=$this->slider_model->update_slider($id,$data);
          

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Güncelleme başarılı. 
                  </div>');
          redirect('slider_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('slider_controller');
          }
        }

            
    // }//valitadation

  }

    public function isActive_set()
    {
      $id=$this->input->post('id');
      $isActive=($this->input->post('isActive')=="true")?1:0;
      $this->db->where('slider_id',$id)->update('slider',array('slider_isActive'=>$isActive));
    }


	
}

?>