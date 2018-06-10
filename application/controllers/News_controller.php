<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News_controller extends CI_Controller {
 // private $_ci;
	public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }
              
           		$this->load->model('news_model');
              
              
                
        }
	
	public function index()
	{
	

		$data['result']=$this->news_model->getAll_news();
		$this->load->view('admin/news/news',$data);
		
	}

	
	public function add_news_page_controller()
	{
        	
		$this->load->view('admin/news/add/add_news');
		
	}

	public function add_news_controller()
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
        
        $config['upload_path']           = FCPATH.'assets/images/news/';
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
            $image_record ='assets/images/news/'.$image_path.'';
            $image_tmb   ='assets/images/news/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='assets/images/news/'.$image_path.'';
            $config['new_image']='assets/images/news/tumb/'.$image_path.'';
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
                'news_title'=>$this->input->post('news_title'),
                'news_date' =>$this->input->post('news_date'),
                'news_time'=>$this->input->post('news_time'),
                'news_detail'=>$this->input->post('news_detail'),
                'news_keyword'=>$this->input->post('news_keyword'),

                'news_isActive'=>1,
                'news_image'=>$image_record,
                'news_tmb'=>$image_tmb,
                
                 );

      $result=$this->news_model->add_news($data);

      if ($result) {
      $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt başarılı. 
              </div>');
      redirect('news_controller');
      }else{
      $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt Başarısız!... 
              </div>');
      redirect('news_controller');
      }

        }else
        {
              $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Resim Eklenemedi!... 
              </div>');
              redirect('news_controller');
        }

           	
		// }//validation control
	}


	public function delete_news_controller($id)
	{

            $news_image_delete=$this->news_model->news_image_m($id);
            $news_tmb_delete=$this->news_model->news_tmb_m($id);
            
            unlink($news_image_delete);
            unlink($news_tmb_delete);

		$result=$this->news_model->delete_news($id);
			   
         if ($result) {

            

           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt silindi. 
              	</div>');
      			redirect('news_controller');
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt silme işlemi Başarısız!... 
              </div>');
      			redirect('news_controller');
           	}
	}

  public function edit_news_controller($id)
  {
    $data['result']=$this->news_model->edit_news($id);
    $this->load->view('admin/news/edit/edit_news',$data);

  }

  public function update_news_controller()
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
        

        $config['upload_path']           = FCPATH.'assets/images/news/';
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
            $image_record ='assets/images/news/'.$image_path.'';
            $image_tmb   ='assets/images/news/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='assets/images/news/'.$image_path.'';
            $config['new_image']='assets/images/news/tumb/'.$image_path.'';
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
            $id=$this->input->post('news_id');

            $news_image_delete=$this->news_model->news_image_m($id);
            $news_tmb_delete=$this->news_model->news_tmb_m($id);
            
            unlink($news_image_delete);
            unlink($news_tmb_delete);
                  
            $data=array(
                'news_title'=>$this->input->post('news_title'),
                'news_date' =>$this->input->post('news_date'),
                'news_time'=>$this->input->post('news_time'),
                'news_detail'=>$this->input->post('news_detail'),
                'news_keyword'=>$this->input->post('news_keyword'),

                'news_isActive'=>1,
                'news_image'=>$image_record,
                'news_tmb'=>$image_tmb,
                
                 );

          $result=$this->news_model->update_news($id,$data);

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Haber güncellendi. 
                  </div>');
          redirect('news_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('news_controller');
          }

        }else
        { //Resim yüklenemedi

          $data=array(
                'news_title'=>$this->input->post('news_title'),
                'news_date' =>$this->input->post('news_date'),
                'news_time'=>$this->input->post('news_time'),
                'news_detail'=>$this->input->post('news_detail'),
                'news_keyword'=>$this->input->post('news_keyword'),

                'news_isActive'=>1,
                                
                 );

          $id=$this->input->post('news_id');
          $result=$this->news_model->update_news($id,$data);
          

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Haber güncellendi. 
                  </div>');
          redirect('news_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('news_controller');
          }
        }

            
    // }//valitadation

  }

    public function isActive_set()
    {
      $id=$this->input->post('id');
      $isActive=($this->input->post('isActive')=="true")?1:0;
      $this->db->where('news_id',$id)->update('news',array('news_isActive'=>$isActive));
    }


	
}

?>