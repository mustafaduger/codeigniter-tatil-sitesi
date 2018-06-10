<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_controller extends CI_Controller {
	public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }

           		$this->load->model('category_model');
                
        }
	
	public function index()
	{
		
		$data['result']=$this->category_model->getAll_category();
		$this->load->view('admin/category/category',$data);
		
	}

	
	public function add_category_page_controller()
	{
		
		$this->load->view('admin/category/add/add_category');
		
	}

	public function add_category_controller()
	{	
    $this->form_validation->set_rules('kategori_adi', 'Kategori Adı', 'required'); 

		$this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

		if ($this->form_validation->run() == FALSE)
		{

        	$this->load->view('admin/category/add/add_category');
		}
		else
		{
			$data = array(
                    'kategori_adi' =>$this->input->post('kategori_adi'),
                    'kategori_isActive' =>0,
						        'kategori_createdDate' =>date('d:m:y h:m:s')
						        );

			
        	
           	$result=$this->category_model->add_category($data);

           	if ($result) {
           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt eklendi. 
              	</div>');
      			redirect('category_controller');
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt ekleme Başarısız!... 
              </div>');
      			redirect('category_controller');
           	}
		}
	}


	public function delete_category_controller($id)
	{
		$result=$this->category_model->delete_category($id);
			   if ($result) {
           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt silindi. 
              	</div>');
      			redirect('category_controller');
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt silme işlemi Başarısız!... 
              </div>');
      			redirect('category_controller');
           	}
	}

  public function edit_category_controller($id)
  {
    $result=$this->category_model->edit_category($id);
    $data['result']=$result;
    $this->load->view('admin/category/edit/edit_category',$data);

  }

  public function update_category_controller()
  {
    $id=$this->input->post('id');

    $this->form_validation->set_rules('kategori_adi', 'Kategori Adı', 'required'); 
    
    $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.');
    $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

    if ($this->form_validation->run() == FALSE)
    {

          $result=$this->category_model->edit_category($id);
          $data['result']=$result;
          $this->load->view('admin/category/edit/edit_category',$data);
    }
    else
    {

    $data = array(
                  'kategori_adi' =>$this->input->post('kategori_adi') ,
                  'kategori_createdDate' =>date('d:m:y h:m:s') 
                 );
    //print_r($data);
    $result=$this->category_model->update_category($id,$data);
    //print_r($result);
          if ($result) {
               $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Güncelleme yapıldı. 
                </div>');
            redirect('category_controller');
            }else{
              $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Güncelleme işlemi Başarısız!... 
              </div>');
            redirect('category_controller');
            }
      }

  }


  public function isActive_set()
    {
      $id=$this->input->post('id');
      $isActive=($this->input->post('isActive')=="true")?1:0;
      $this->db->where('kategori_id',$id)->update('tbl_kategori',array('kategori_isActive'=>$isActive));
    }




	
}

?>