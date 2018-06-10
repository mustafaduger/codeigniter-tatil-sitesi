<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Property_controller extends CI_Controller {
	public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }

           		$this->load->model('property_model');
                
        }
	
	public function index()
	{
		
		$data['result']=$this->property_model->getAll_property();
    /*print_r($data);
    die();*/
		$this->load->view('admin/property/property',$data);
		
	}

	
	public function add_property_page_controller()
	{
		
		$this->load->view('admin/property/add/add_property');
		
	}

	public function add_property_controller()
	{	

		  $this->form_validation->set_rules('ozellik_adi', 'Özellik Adı', 'required');
      $this->form_validation->set_rules('kategori_id', 'Grup SeÖzellik Adıçimi', 'required|is_Natural');

      $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.'); 
      $this->form_validation->set_message('is_Natural', 'Lütfen bir seçim yapınız');
      $this->form_validation->set_message('image', 'Lütfen bir resim seçiniz');
      
          
      $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

		if ($this->form_validation->run() == FALSE)
		{

        	$this->load->view('admin/property/add/add_property');
		}
		else
		{
			$data = array(
                    'ozellik_adi' =>$this->input->post('ozellik_adi'),
                    'kategori_id' =>$this->input->post('kategori_id'),
                    'ozellik_isActive' =>0,
						        'ozellik_createdDate' =>date('d:m:y h:m:s')
						        );

			
        	
           	$result=$this->property_model->add_property($data);

           	if ($result) {
           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt eklendi. 
              	</div>');
      			redirect('property_controller');
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt ekleme Başarısız!... 
              </div>');
      			redirect('property_controller');
           	}
		}
	}


	public function delete_property_controller($id)
	{
		$result=$this->property_model->delete_property($id);
			   if ($result) {
           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt silindi. 
              	</div>');
      			redirect('property_controller');
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt silme işlemi Başarısız!... 
              </div>');
      			redirect('property_controller');
           	}
	}

  public function edit_property_controller($id)
  {
    $data['result']=$this->property_model->edit_property($id);
    $this->load->view('admin/property/edit/edit_property',$data);

  }

  public function update_property_controller()
  {
      $id=$this->input->post('id');

      $this->form_validation->set_rules('ozellik_adi', 'Özellik Adı', 'required');
      $this->form_validation->set_rules('kategori_id', 'Grup SeÖzellik Adıçimi', 'required|is_Natural');

      $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.'); 
      $this->form_validation->set_message('is_Natural', 'Lütfen bir seçim yapınız');
      $this->form_validation->set_message('image', 'Lütfen bir resim seçiniz');
      
          
      $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

    if ($this->form_validation->run() == FALSE)
    {

          $data['result']=$this->property_model->edit_property($id);
          $this->load->view('admin/property/edit/edit_property',$data);;
    }
    else
    {


          $data = array(
                        'ozellik_adi' =>$this->input->post('ozellik_adi'),
                        'kategori_id' =>$this->input->post('kategori_id'),
                        'ozellik_createdDate' =>date('d:m:y h:m:s') 
                       );
          //print_r($data);
          $result=$this->property_model->update_property($id,$data);
          //print_r($result);
                if ($result) {
                     $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                      Güncelleme yapıldı. 
                      </div>');
                  redirect('property_controller');
                  }else{
                    $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                      Güncelleme işlemi Başarısız!... 
                    </div>');
                  redirect('property_controller');
                  }
      }

  }


   public function isActive_set()
    {
      $id=$this->input->post('id');
      $isActive=($this->input->post('isActive')=="true")?1:0;
      $this->db->where('ozellik_id',$id)->update('tbl_ozellik',array('ozellik_isActive'=>$isActive));
    }




	
}

?>