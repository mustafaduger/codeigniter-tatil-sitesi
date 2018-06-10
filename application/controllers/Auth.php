<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
        public $status; 
        public $roles;
        function __construct(){
            parent::__construct();
            $this->load->model('Auth_model', 'auth_model', TRUE);
            $this->load->library('form_validation');    
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            //$this->session->keep_flashdata('flash_message');
            $this->status = $this->config->item('status'); 
            $this->roles = $this->config->item('roles');
        }


        public function members_controller()
         {
             $data['result']=$this->auth_model->getAll_Members();
            $this->load->view('admin/auth/members/members',$data);
         } 

         public function membersregister_controller()
         {
             
            $this->load->view('admin/auth/members/add/add');
         } 

         public function membersedit_controller($id)
         {
            $data['result']=$this->auth_model->getbyId_User($id);
            $this->load->view('admin/auth/members/edit/edit',$data);
         } 



        public function register()
        {
            $this->form_validation->set_rules('firstname', 'Ad', 'required');
            $this->form_validation->set_rules('lastname', 'Soyad', 'required');    
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            if ($this->input->post('kayittipi')==1) {
                $this->form_validation->set_rules('role', 'Grup Seçimi', 'required|is_Natural');
                 $this->form_validation->set_message('is_Natural', 'Lütfen bir grup seçiniz');
            }

            $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.');
           
                       
            if ($this->form_validation->run() == FALSE) {   
                if ($this->input->post('kayittipi')==1) {
                $this->load->view('admin/auth/members/add/add');
                }
                $this->load->view('admin/auth/register');
                
            }else{                
                if($this->auth_model->isDuplicate($this->input->post('email'))){
                    $this->session->set_flashdata('flash_message', '<div class="error" style="color:red">Farklı bir email giriniz.</div>');
                    if ($this->input->post('kayittipi')==1) {
                     redirect('auth/membersregister_controller');
                    } 
                    
                    redirect('admin_controller/register');
                }else{
                    
                    $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                    $id = $this->auth_model->insertUser($clean); 
                    $token = $this->auth_model->insertToken($id);                                        
                    
                    $qstring = $this->base64url_encode($token);                      
                    $url = site_url() . 'auth/complete/token/' . $qstring;
                    $link = '<a href="' . $url . '">' . $url . '</a>'; 
                               
                    $message = '';                     
                    $message .= '<strong>Sitemize kaydınız başarılı.</strong><br>';
                    $message .= '<strong>Kayıt işlemlerinizi tamamlamak için linke tıklayınız:</strong> ' . $link; 
                    $email=$this->input->post('email');                         
                    //echo $message;
                    //echo $this->email->print_debugger();
                    //send this in email
                    if($this->auth_model->sendVerificatinEmail($email,$message)){

                        if ($this->input->post('kayittipi')==1) {
                            $this->session->set_flashdata('flash_message','<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Başarılı!</h4>Onay linki üye mail adresine gönderildi.</div>');
                        }else{

                            $this->session->set_flashdata('flash_message', '<div class="error" style="color:red">Mail adresinize gönderildi.</div>');        
                        }
                    
                    }else{

                        if ($this->input->post('kayittipi')==1) {
                            $this->session->set_flashdata('flash_message','<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                                Onay linki üye mail adresine gönderilemedi.
                                </div>');
                        }else{

                            $this->session->set_flashdata('flash_message', '<div class="error" style="color:red">Mesaj gönderme işlemi başarısız.</div>');        
                        }
                    
                    }
                //echo $message;
                if ($this->input->post('kayittipi')==1) {
                     redirect('auth/members_controller');
                 } 
                redirect(site_url().'admin_controller/login');
                exit;
                };              
            }
        }


        public function base64url_encode($data) { 
            return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
        } 
        public function base64url_decode($data) { 
            return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
        }


        public function complete()
        {                                   
            $token = base64_decode($this->uri->segment(4));       
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->auth_model->isTokenValid($cleanToken); //either false or array();           
             
            if(!$user_info){
                $this->session->set_flashdata('flash_message', '<div class="error" style="color:red">Token geçersiz veya süresi sona ermiş!</div>');
                redirect(site_url().'admin_controller/login');
            }            
            $data = array(
                'firstName'=> $user_info->first_name, 
                'email'=>$user_info->email, 
                'user_id'=>$user_info->id, 
                'token'=>$this->base64url_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
                
                $this->load->view('admin/auth/complete', $data);
                
            }else{
                
                $this->load->library('password');                 
                $post = $this->input->post(NULL, TRUE);
                
                $cleanPost = $this->security->xss_clean($post);
                
                $hashed = $this->password->create_hash($cleanPost['password']);
                /*print_r($hashed) ;
                die();    */            
                $cleanPost['password'] = $hashed;
                unset($cleanPost['passconf']);
                $userInfo = $this->auth_model->updateUserInfo($cleanPost);
                

                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', '<div class="error" style="color:red">Kayıt işlemi başarısız!</div>');
                    redirect(site_url().'admin_controller/login');
                }
                
                unset($userInfo->password);
                
                /*foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }*/

                $data_session = array(
                    'firstName'=> $userInfo->first_name,
                    'lastName'=> $userInfo->last_name, 
                    'email'=>$userInfo->email,
                    'user_id'=>$userInfo->id, 
                    'rol' => $userInfo->role,
                    'status' => $userInfo->status,
                    'logged_in' => TRUE
                );

                // Save data to session
                //$this->session->set_userdata($data);
                $this->session->set_userdata($data_session);
                redirect(site_url().'admin_controller/');
                
            }
        }

        public function login()
        {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
            $this->form_validation->set_rules('password', 'Şifre', 'required'); 
            
            if($this->form_validation->run() == FALSE) {
                
                $this->load->view('admin/login');
                
            }else{
                
                $post = $this->input->post();  
                $clean = $this->security->xss_clean($post);
                
                $userInfo = $this->auth_model->checkLogin($clean);
                /*print_r($userInfo);
                die();*/
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', '<div class="error" style="color:red">Giriş başarısız!</div>');
                    redirect(site_url().'auth/login');
                }                
                /*foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }
*/
                

                $data_session = array(
                    'firstName'=> $userInfo->first_name, 
                    'email'=>$userInfo->email, 
                    'user_id'=>$userInfo->id, 
                    'rol' => $userInfo->role,
                    'status' => $userInfo->status,
                    'logged_in' => TRUE
                );
                /*print_r($data_session);
                die();*/
                $this->session->set_userdata($data_session);

                redirect(site_url().'admin_controller/');
            }
            
        }


        public function forgot()
        {
            
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.'); 
            
            if($this->form_validation->run() == FALSE) {
                
                $this->load->view('admin/auth/forgot');
                
            }else{
                $email = $this->input->post('email');  
                $clean = $this->security->xss_clean($email);
                $userInfo = $this->auth_model->getUserInfoByEmail($clean);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', '<div class="error" style="color:red">Email adresiniz kayıtlarımızda bulunmamaktadır!</div>');
                    redirect(site_url().'admin_controller/login');
                }   
                
                if($userInfo->status = 0){ //if status is not approved
                    $this->session->set_flashdata('flash_message', '<div class="error" style="color:red">Üye hesabınız onaylanmamıştır.</div>');
                    redirect(site_url().'admin_controller/login');
                }
                
                //build token 
                
                $token = $this->auth_model->insertToken($userInfo->id);                    
                $qstring = $this->base64url_encode($token);                      
                $url = site_url() . 'auth/reset_password/token/' . $qstring;
                $link = '<a href="' . $url . '">buraya tıklayınız</a>'; 
                
                $message = '';                     
                $message .= '<strong>Şifre yenileme işleminiz  gönderilmiştir.</strong><br>';
                $message .= '<strong>Lütfen buraya tıklayınız:</strong> ' . $link;             
                echo $message; //send this through mail
                
                //$email="mustafaduger06@gmail.com";
                //$result=$this->auth_model->sendVerificatinEmail($email,$message);
                
                if($this->auth_model->sendVerificatinEmail($email,$message)){
                    $this->session->set_flashdata('flash_message', '<div class="error" style="color:red">Mail adresinize gönderildi.</div>');
                }else{
                    
                    $this->session->set_flashdata('flash_message', '<div class="error" style="color:red">Mesaj gönderme işlemi başarısız.</div>');
                }
                redirect(site_url().'admin_controller/login');

                exit;
            }
            
        }

        public function reset_password()
        {
            $token = $this->base64url_decode($this->uri->segment(4)); 
            $cleanToken = $this->security->xss_clean($token);
            $user_info = $this->auth_model->isTokenValid($cleanToken);
            

            if(!$user_info){
                $this->session->set_flashdata('flash_message', '<div class="error" style="color:red">Token geçersiz veya süresi sona ermiş!</div>');
                redirect(site_url().'admin_controller/login');
            }            
            $data = array(
                'firstName'=> $user_info->first_name, 
                'email'=>$user_info->email,                
                'token'=>base64_encode($token)
            );
             //either false or array();               
           
           
            $this->form_validation->set_rules('password', 'Şifre', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Şifre Tekrarı', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
                
                $this->load->view('admin/auth/reset_password', $data);
               
            }else{
                                
                $this->load->library('password');                 
                $post = $this->input->post(NULL, TRUE);                
                $cleanPost = $this->security->xss_clean($post);                
                $hashed = $this->password->create_hash($cleanPost['password']);                
                $cleanPost['password'] = $hashed;
                $cleanPost['user_id'] = $user_info->id;
                unset($cleanPost['passconf']);                
                if(!$this->auth_model->updatePassword($cleanPost)){
                    $this->session->set_flashdata('flash_message', '<div class="error" style="color:red">Şifre güncelleme işlemi başarısız.</div>');
                }else{
                    $this->session->set_flashdata('flash_message', '<div class="error" style="color:red">Şifre güncelleme işleminiz yapıldı. Siteye giriş yapabilirisiniz</div>');
                }
                redirect(site_url().'admin_controller/login');                
            }
        }


        public function updatemembers()
        {
             $id=$this->input->post('id');

            $this->form_validation->set_rules('first_name', 'Ad', 'required');
            $this->form_validation->set_rules('last_name', 'Soyad', 'required');    
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('role', 'Grup Seçimi', 'required|is_Natural');
            $this->form_validation->set_message('is_Natural', 'Lütfen bir grup seçiniz');
            $this->form_validation->set_message('required', '{field} alanının doldurulması zorunludur.');

            $result=$this->auth_model->getbyId_User($id);
            $data['result']=$result;
            $tempMail=$result->email;
                   
            if ($this->form_validation->run() == FALSE) {
                 
                $this->load->view('admin/auth/members/edit/edit',$data);
                               
            }else{                
                
                if ($tempMail!=$this->input->post('email')) {
                    
                    if($this->auth_model->isDuplicate($this->input->post('email'))){
                    $this->session->set_flashdata('flash_message', '<div class="error" style="color:red">Farklı bir email giriniz.</div>');
                    redirect('auth/membersedit_controller/'.$id);
                   
                    }
                }

                    $data = array(
                                    'first_name' =>$this->input->post('first_name'),
                                    'last_name' =>$this->input->post('last_name'),
                                    'email' =>$this->input->post('email'),
                                    'role' =>$this->input->post('role'),
                                  );

                    $result=$this->auth_model->update_member($id,$data);
                   
                    if($result){
                            $this->session->set_flashdata('flash_message','<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Başarılı!</h4>Üye bilgileri güncellendi.</div>');
                            redirect('auth/members_controller');
                    }else{
                            $this->session->set_flashdata('flash_message','<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                                Üye bilgileri güncellenemedi.
                                </div>');
                            redirect('auth/members_controller');
                        }
              
            }
        }

        public function deletemember($id)
    {
        $result=$this->auth_model->delete_member($id);
               if ($result) {
                 $this->session->set_flashdata('flash_message','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-check"></i> Başarılı!</h4>
                Kayıt silindi. 
                </div>');
                redirect('auth/members_controller');
            }else{
                $this->session->set_flashdata('flash_message','<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-ban"></i> HATA!</h4>
                Kayıt silme işlemi başarısız! 
              </div>');
                redirect('auth/members_controller');
            }
    }

        public function logout()
        {
        $this->session->unset_userdata('data_session');
        $this->session->sess_destroy();
        redirect('admin_controller');
        
        }


        public function isActive_set()
        {
          $id=$this->input->post('id');
          $isActive=($this->input->post('isActive')=="true")?1:0;
          $this->db->where('id',$id)->update('users',array('status'=>$isActive));
        }
}
?>