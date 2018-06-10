<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subcategory_controller extends CI_Controller {

	public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }

           		$this->load->model('subcategory_model');
                
        }
	
	public function index()
	{
		
		$data['result']=$this->subcategory_model->getAll_subcategory();
    /*print_r($data);
    die();*/
		$this->load->view('admin/subcategory/subcategory',$data);
		
	}

	
	public function add_subcategory_page_controller()
	{
		
		$this->load->view('admin/subcategory/add/add_subcategory');
		
	}

	public function add_subcategory_controller()
	{	

		$this->form_validation->set_message('required', '%s alanını doldurmak zorundasınız!');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

		if ($this->form_validation->run('subcategory') == FALSE)
		{

        	$this->load->view('admin/subcategory/add/add_subcategory');
		}
		else
		{
			$data = array(
                    'altkategori_adi' =>$this->input->post('altkategori_adi'),
                    'kategori_id' =>$this->input->post('kategori_id'),
                    'altkategori_isActive' =>0,
						        'altkategori_createdDate' =>date('d:m:y h:m:s')
						        );

			
        	
           	$result=$this->subcategory_model->add_subcategory($data);

           	if ($result) {
           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt eklendi. 
              	</div>');
      			redirect('subcategory_controller');
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt ekleme Başarısız!... 
              </div>');
      			redirect('subcategory_controller');
           	}
		}
	}


	public function delete_subcategory_controller($id)
	{
		$result=$this->subcategory_model->delete_subcategory($id);
			   if ($result) {
           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt silindi. 
              	</div>');
      			redirect('subcategory_controller');
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt silme işlemi Başarısız!... 
              </div>');
      			redirect('subcategory_controller');
           	}
	}

  public function edit_subcategory_controller($id)
  {
    $data['result']=$this->subcategory_model->edit_subcategory($id);
    $this->load->view('admin/subcategory/edit/edit_subcategory',$data);

  }

  public function update_subcategory_controller()
  {
    $id=$this->input->post('id');

    $data = array(
                  'altkategori_adi' =>$this->input->post('altkategori_adi'),
                  'kategori_id' =>$this->input->post('kategori_id'),
                  'altkategori_createdDate' =>date('d:m:y h:m:s') 
                 );
    //print_r($data);
    $result=$this->subcategory_model->update_subcategory($id,$data);
    //print_r($result);
          if ($result) {
               $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Güncelleme yapıldı. 
                </div>');
            redirect('subcategory_controller');
            }else{
              $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Güncelleme işlemi Başarısız!... 
              </div>');
            redirect('subcategory_controller');
            }

  }


   public function isActive_set()
    {
      $id=$this->input->post('id');
      $isActive=($this->input->post('isActive')=="true")?1:0;
      $this->db->where('altkategori_id',$id)->update('tbl_altkategori',array('altkategori_isActive'=>$isActive));
    }

    public function get_subcategory()
    {

        //$ilce_key = $this->input->post('ilce_key');
        $kategori_id = $this->uri->segment(3);
        //$kategori_id=5;
        
        $altkategoriler = $this->subcategory_model->get_subcategorybyId($kategori_id);
      /*print_r($altkategoriler);
        die();*/
        if(count($altkategoriler)>0)
        {
          $select_box = '';
          $select_box .= '<option value="">Alt Kategori Seçiniz</option>';
          foreach ($altkategoriler as $altkategori) {
            $select_box .='<option value="'.$altkategori->altkategori_id.'">'.$altkategori->altkategori_adi.'</option>';
          }
          echo json_encode($select_box);
    }
  }


	
}

?>