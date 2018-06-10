<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Comment_controller extends CI_Controller {
 // private $_ci;
	public function __construct()
        {
        		parent::__construct();
           		if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }
              
           		$this->load->model('comment_model');
  
        }
	
	public function index()
	{
	

		$data['result']=$this->comment_model->getAll_comment();
		$this->load->view('admin/comment/comment',$data);
		
	}

	
	public function add_comment_page_controller()
	{
        	
		$this->load->view('admin/comment/add/add_comment');
		
	}

	public function add_comment_controller()
	{	
    
      $this->form_validation->set_rules('yorum_icerik', 'İçerik', 'required'); 
      $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.');
      $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

    if ($this->form_validation->run() == FALSE)
    {
        $this->load->view('admin/comment/add/add_comment');
    }
    else
    {
      
      $data=array(
                'yorum_icerik'=>$this->input->post('yorum_icerik'),
       
                 );

      $result=$this->comment_model->add_comment($data);

      if ($result) {
      $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt başarılı. 
              </div>');
      redirect('comment_controller');
      }else{
      $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt Başarısız!... 
              </div>');
      redirect('comment_controller');
      }

      }
           	
		// }//validation control
	}


	public function delete_comment_controller($id)
	{

           
		    $result=$this->comment_model->delete_comment($id);
			   
         if ($result) {

           		 $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
         			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt silindi. 
              	</div>');
      			redirect('comment_controller');
           	}else{
           		$this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt silme işlemi Başarısız!... 
              </div>');
      			redirect('comment_controller');
           	}
	}

  public function edit_comment_controller($id)
  {
    $data['result']=$this->comment_model->edit_comment($id);
    $this->load->view('admin/comment/edit/edit_comment',$data);

  }

  public function update_comment_controller()
  {
    
       $id=$this->input->post('comment_id');

      $this->form_validation->set_rules('yorum_icerik', 'İçerik', 'required'); 
      $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.');
      $this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');

      if ($this->form_validation->run() == FALSE)
      {
          $data['result']=$this->comment_model->edit_comment($id);
          $this->load->view('admin/comment/edit/edit_comment',$data);
      }
      else
      {
                           
            $data=array(
                        'yorum_icerik'=>$this->input->post('yorum_icerik')
                       );

          $result=$this->comment_model->update_comment($id,$data);

          if ($result) {
          $this->session->set_flashdata('login_error','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                    Yorum güncellendi. 
                  </div>');
          redirect('comment_controller');
          }else{
          $this->session->set_flashdata('login_error','<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                    Güncelleme Başarısız!... 
                  </div>');
          redirect('comment_controller');
          }

        }

            
    // }//valitadation

  }

    public function isActive_set()
    {
      $id=$this->input->post('id');
      $isActive=($this->input->post('isActive')=="true")?1:0;
      $this->db->where('yorum_id',$id)->update('tbl_yorum',array('yorum_isActive'=>$isActive));
    }


	
}

?>