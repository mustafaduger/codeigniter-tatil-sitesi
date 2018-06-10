<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class subProperty_controller extends CI_Controller {

	public function __construct()
  {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }

           		$this->load->model('subproperty_model');
  }
	
	public function index()
	{
		
		$data['result']=$this->subproperty_model->edit_subpropertyby_propertyId($id);
    /*print_r($data);
    die();*/
		$this->load->view('admin/subproperty/subproperty',$data);
		
	}

  public function subpropertymain_controller($id)
  {
    
   
    $result=$this->subproperty_model->edit_subpropertyby_propertyId($id);
    $data['result']=$result;
    
    $ozellik_id=$this->uri->segment(3);
   
    $result=array(
                  'ozellik_id' =>$ozellik_id,
                     );
    $data['tempdata']=$result;      

    $this->load->view('admin/subproperty/subproperty',$data);
    
  }



	
	public function add_subproperty_page_controller()
	{
		
		$this->load->view('admin/subproperty/add/add_subproperty');
		
	}

	public function add_subproperty_controller()
	{	

		$this->form_validation->set_message('required', '%s alanını doldurmak zorundasınız!');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

		if ($this->form_validation->run('subproperty') == FALSE)
		{

        	$this->load->view('admin/subproperty/add/add_subproperty');
		}
		else
		{
			$data = array(
                    'altozellik_adi' =>$this->input->post('altozellik_adi'),
                    'ozellik_id' =>$this->input->post('ozellik_id'),
                    'altozellik_aciklama' =>$this->input->post('altozellik_aciklama'),
                    'altozellik_isActive' =>0,
						        'altozellik_createdDate' =>date('d:m:y h:m:s')
						        );

			     
        	
           	$result=$this->subproperty_model->add_subproperty($data);
            $tempRedirect=$this->input->post('ozellik_id');

           	if ($result) {
           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt eklendi. 
              	</div>');
             
      			redirect('subproperty_controller/subpropertymain_controller/'.$tempRedirect);
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt ekleme Başarısız!... 
              </div>');
      			redirect('subproperty_controller/subpropertymain_controller/'.$tempRedirect);
           	}
		}
	}


	public function delete_subproperty_controller($id)
	{
    $tempRedirect=$this->input->post('ozellik_id');
    
    $ozellik_id=$this->subproperty_model->get_subproperty_propertyId($id);
    

		$result=$this->subproperty_model->delete_subproperty($id);
			   if ($result) {
           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt silindi. 
              	</div>');
      			redirect('subproperty_controller/subpropertymain_controller/'.$ozellik_id);
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt silme işlemi Başarısız!... 
              </div>');
      			redirect('subproperty_controller/subpropertymain_controller/'.$ozellik_id);
           	}
	}

  public function edit_subproperty_controller($id)
  {
    $data['result']=$this->subproperty_model->edit_subproperty($id);
    $this->load->view('admin/subproperty/edit/edit_subproperty',$data);

  }

  public function update_subproperty_controller()
  {
    $id=$this->input->post('id');
    $ozellik_id=$this->input->post('ozellik_id');
    $data = array(
                  'altozellik_adi' =>$this->input->post('altozellik_adi'),
                  'ozellik_id' =>$this->input->post('ozellik_id'),
                  //'altozellik_isActive' =>0,
                  //  'altozellik_createdDate' =>date('d:m:y h:m:s')
                 );
   
    $result=$this->subproperty_model->update_subproperty($id,$data);
    
          if ($result) {
               $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Güncelleme yapıldı. 
                </div>');
            redirect('subproperty_controller/subpropertymain_controller/'.$ozellik_id);
            }else{
              $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Güncelleme işlemi Başarısız!... 
              </div>');
            redirect('subproperty_controller/subpropertymain_controller/'.$ozellik_id);
            }

  }


   public function isActive_set()
    {
      $id=$this->input->post('id');
      $isActive=($this->input->post('isActive')=="true")?1:0;
      $this->db->where('altozellik_id',$id)->update('tbl_altozellik',array('altozellik_isActive'=>$isActive));
    }




	
}

?>