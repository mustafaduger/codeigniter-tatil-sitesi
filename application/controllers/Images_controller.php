<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Images_controller extends CI_Controller {
 // private $_ci;
	public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }
              //$this->load->model('oppurtunity_model');
           		$this->load->model('images_model');
           // $this->load->library('googlemaps');           
   
        }
	
	public function index()
	{
	
    $firma_id=1;
		$data['row']=$this->images_model->getAll_images($firma_id);
		$this->load->view('admin/images/images',$data);
		
	}

	
	public function imageslist_controller()
	{
    $firma_id=1;
    $data['row']=$this->images_model->getAll_images($firma_id);  	
		$this->load->view('admin/images/list/list',$data);
		
	}

  public function imagesupper_controller()
  {
    $firma_id=1;
    $data['row']=$this->images_model->getAll_images($firma_id);   
    $this->load->view('admin/images/upper/upper',$data);
    
  }

  public function imagespromotion_controller()
  {
    $firma_id=1;
    $data['row']=$this->images_model->getAll_images($firma_id);   
    $this->load->view('admin/images/promotion/promotion',$data);
    
  }

	public function update_imageslist_controller()
  {   
      
      $id=$this->input->post('resim_id');
    
             

        $config['upload_path']           = FCPATH.'assets/images/imageslist/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['encrypt_name']        = TRUE;
        $config['max_size']             = 3000;
        

        $this->load->library('upload', $config);
        if ( $this->upload->do_upload('image'))
        {
            $image = $this->upload->data();
            $image_path=$image['file_name'];
            $image_record ='assets/images/imageslist/'.$image_path.'';
            $image_tmb   ='assets/images/imageslist/tumb/'.$image_path.'';
            $config['image_library']='gd2';
            $config['source_image']='assets/images/imageslist/'.$image_path.'';
            $config['new_image']='assets/images/imageslist/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=800;
            $config['height']=533;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
           
            
            
            $imageslist_tmb_delete=$this->images_model->imageslist_tmb($id);
            if ($imageslist_tmb_delete) {
              unlink($imageslist_tmb_delete);
            }
            unlink($image_record);
           
            $data=array(
                'resim_list'=>$image_tmb,
                'resim_isActive'=>0,
                 );

          $result=$this->images_model->update_images($id,$data);

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    İçerik güncellendi. 
                  </div>');
          redirect('images_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('images_controller');
          }

          }else
          { //Resim yüklenemedi

          $data=array(
               'resim_isActive'=>0,
                         
                 );

          
          $result=$this->images_model->update_images($id,$data);
          

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    İçerik güncellendi. 
                  </div>');
          redirect('images_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('images_controller');
          }
        }

         
   /* }//validation*/

  }


  public function update_imagesupper_controller()
  {   
      
      $id=$this->input->post('resim_id');
    
             

        $config['upload_path']           = FCPATH.'assets/images/imageslist/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['encrypt_name']        = TRUE;
        $config['max_size']             = 3000;
        

        $this->load->library('upload', $config);
        if ( $this->upload->do_upload('image'))
        {
            $image = $this->upload->data();
            $image_path=$image['file_name'];
            $image_record ='assets/images/imageslist/'.$image_path.'';
            $image_tmb   ='assets/images/imageslist/tumb/'.$image_path.'';
            $config['image_library']='gd2';
            $config['source_image']='assets/images/imageslist/'.$image_path.'';
            $config['new_image']='assets/images/imageslist/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=1400;
            $config['height']=470;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
           
            
            
            $imagesupper_tmb_delete=$this->images_model->imagesupper_tmb($id);
            if ($imagesupper_tmb_delete) {
              unlink($imagesupper_tmb_delete);
            }
            unlink($image_record);
           
            $data=array(
                'resim_ust'=>$image_tmb,
                'resim_isActive'=>0,
                 );

          $result=$this->images_model->update_images($id,$data);

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Resim güncellendi. 
                  </div>');
          redirect('images_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('images_controller');
          }

          }else
          { //Resim yüklenemedi

          $data=array(
               'resim_isActive'=>0,
                         
                 );

          
          $result=$this->images_model->update_images($id,$data);
          

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Resim güncellendi. 
                  </div>');
          redirect('images_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('images_controller');
          }
        }

         
   /* }//validation*/

  }


  public function update_imagespromotion_controller()
{   

    $id=$this->input->post('resim_id');


    $this->load->library('upload');
    $dataInfo = array();
    $files = $_FILES;
    $cpt = count($_FILES['userfile']['name']);
    
    for($i=0; $i<$cpt; $i++)
    {           
        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

        $this->upload->initialize($this->set_upload_options());
        //if ($this->upload->do_upload()) {
            $this->upload->do_upload();
            $data=array('upload_data' => $this->upload->data());
            $dataInfo[] =$this->images_resize($data['upload_data']['full_path'],$data['upload_data']['file_name']);
            unlink($data['upload_data']['full_path']);
        //}
        
                            
    }
     /* print_r($dataInfo);
      die();*/
    $data = array(
        
        'resim_tanitim1' => $dataInfo[0],
        'resim_tanitim2' => $dataInfo[1],
        'resim_tanitim3' => $dataInfo[2],
        'resim_tanitim4' => $dataInfo[3],
        'resim_tanitim5' => $dataInfo[4],
       
        //'created_time' => date('Y-m-d H:i:s')
     );
    $result= $this->images_model->update_images($id,$data);
    if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Resim güncellendi. 
                  </div>');
          redirect('images_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('images_controller');
          }
}

private function set_upload_options()
{   
    //upload an image options
    $config = array();
    $config['upload_path'] = 'assets/images/imageslist/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = '0';
    $config['overwrite']     = FALSE;

    return $config;
}


private function images_resize($path,$file)
{
    $image_tmb   ='assets/images/imageslist/tumb/'.$file.'';
    $configi['image_library']='gd2';
    $configi['source_image']=$path;
    $configi['create_thumb']=false;
    $configi['maintain_ratio']=false;
    $configi['quality']='60%';
    $configi['width']=1000;
    $configi['height']=660;
    $configi['new_image']='assets/images/imageslist/tumb/'.$file.'';

    $this->load->library('image_lib',$configi);
    $this->image_lib->initialize($configi);
    $this->image_lib->resize();
    $this->image_lib->clear();
   return $image_tmb;
}
    









  public function isActive_set()
    {
      
      $id=$this->input->post('resim_id');
      $isActive=($this->input->post('isActive')=="true")?1:0;
      $this->db->where('resim_id',$id)->update('tbl_resim',array('resim_isActive'=>$isActive));
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