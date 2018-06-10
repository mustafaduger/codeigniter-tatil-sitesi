<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_Model {
   /* public $status; 
    public $roles;    */
    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->library('email');
        //$this->load->library('phpmailer');
        //$this->load->library('My_PHPMailer');        
        /*$this->status = $this->config->item('status');
        $this->roles = $this->config->item('roles');*/
    }

    public function insertUser($d)
    {  
            $string = array(
                'first_name'=>$d['firstname'],
                'last_name'=>$d['lastname'],
                'email'=>$d['email'],
                'role'=>$d['role'], 
                'status'=>0
            );
            $q = $this->db->insert_string('users',$string);             
            $this->db->query($q);
            return $this->db->insert_id();
    }
    
    public function isDuplicate($email)
    {     
        $this->db->get_where('users', array('email' => $email), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;         
    }
    
    public function insertToken($user_id)
    {   
        $token = substr(sha1(rand()), 0, 30); 
        $date = date('Y-m-d');
        
        $string = array(
                'token'=> $token,
                'user_id'=>$user_id,
                'created'=>$date
            );
        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token . $user_id;
        
    }


    public function isTokenValid($token)
    {
       $tkn = substr($token,0,30);
       $uid = substr($token,30);      
       
        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn, 
            'tokens.user_id' => $uid), 1);      
        
        if($this->db->affected_rows() > 0){
            $row = $q->row();             
            
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d'); 
            $todayTS = strtotime($today);
            
            if($createdTS != $todayTS){
                return false;
            }
            
            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
            
        }else{
            return false;
        }
        
    } 

    public function getUserInfo($id)
    {
        $q = $this->db->get_where('users', array('id' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }

    public function updateUserInfo($post)
    {
        

        $data = array(
               'password' => $post['password'],
               'last_login' => date('Y-m-d h:i:s A'), 
               'status' => 0
            );
       /* print_r ($data);
        die(); */

        $this->db->where('id', $post['user_id']);
        $this->db->update('users', $data); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updateUserInfo('.$post['user_id'].')');
            return false;
        }
        
        $user_info = $this->getUserInfo($post['user_id']); 
        return $user_info; 
    }

    public function checkLogin($post)
    {
        $this->load->library('password');       
        $this->db->select('*');
        $this->db->where('email', $post['email']);
        $query = $this->db->get('users');
        $userInfo = $query->row();
        
        if(!$this->password->validate_password($post['password'], $userInfo->password)){
            error_log('Unsuccessful login attempt('.$post['email'].')');
            return false; 
        }
        
        $this->updateLoginTime($userInfo->id);
        
        unset($userInfo->password);
        return $userInfo; 
    }
    
    public function updateLoginTime($id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', array('last_login' => date('Y-m-d h:i:s A')));
        return;
    }


    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('users', array('email' => $email), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$email.')');
            return false;
        }
    }


     function sendVerificatinEmail($email,$verificationText){
  
          /*$config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'ssl://smtp.gmail.com',
             'smtp_port' => 465,
             'smtp_user' => 'mustafaduger06@gmail.com', // change it to yours
             'smtp_pass' => 'Zeynep01', // change it to yours
             'mailtype' => 'html',
             'charset' => 'utf-8',
             'starttls' => TRUE,
             'wordwrap' => TRUE
          );*/
          
     

            //$mail = new PHPMailer();
            //$mail->IsSMTP(); // establecemos que utilizaremos SMTP
            //$mail->SMTPAuth   = true; // habilitamos la autenticación SMTP
            //$mail->SMTPSecure = "ssl";  // establecemos el prefijo del protocolo seguro de comunicación con el servidor
            //$mail->Host       = "smtp.tatilistanbul.com";      // establecemos GMail como nuestro servidor SMTP
            //$mail->Port       = 587;                   // establecemos el puerto SMTP en el servidor de GMail
            //$mail->Username   = "tatil@tatilistanbul.com";  // la cuenta de correo GMail
            //$mail->Password   = "TAtil2201";            // password de la cuenta GMail
            //$mail->SetFrom('info@tudominio.com', 'Nombre Apellido');  //Quien envía el correo
            //$mail->AddReplyTo($email,"Nombre Apellido");  //A quien debe ir dirigida la respuesta
            //$mail->Subject    = "Asunto del correo";  //Asunto del mensaje
            //$mail->Body      = "Linke tıklayınız. <br/>".$verificationText."";
            //$mail->AltBody    = "Yönetici";
            //$destino = "destinatario@otrodominio.com";
            //$mail->AddAddress($email, "Yönetici");

            $this->email->from('tatil@tatilistanbul.com', 'Mustafa');
  $this->email->to($email);
  $this->email->subject('This is my subject');
  $this->email->message('This is my message');
  $result=$this->email->send();

        
        if(!$result) {
            echo $this->email->print_debugger();
            return false;
        } 
            return true;
        
        //$this->load->view('sent_mail',$data);
    }


          // $body  = "Sevgili üyemiz,"."<br><br>";
          // $body .= "işleminizin tamamlanması için"."<br>";
          // $body .= "Aşağıdaki linke tıklayınız"."<br>";
          // $body .= $verificationText."<br>";
          // $body .= "Teşekkürler"."<br>";
          // $body .= "Yönetici";

          /*$this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from('mustafaduger06@gmail.com', "Yönetici");
          $this->email->to($email);  
          $this->email->subject("Tatil İstanbul Üyelik İşlemleri");
          $this->email->message($body);
         $this->email->message("Sevgili üyemiz,\nişleminizin tamamlanması için\n\n linke tıklayınız".$verificationText."\n"."\n\nTeşekkürler\nYönetici");
         
         $success=$this->email->send();*/

/*
         if(!$success){
             //error_log('Unable to send email('.$post['email'].')');
             echo "mail başarusuz";
             echo $this->phpmailer->ErrorInfo;
             return false;
            }

         return true;
      
        }
*/


            public function updatePassword($post)
            {   
                $this->db->where('id', $post['user_id']);
                $this->db->update('users', array('password' => $post['password'])); 
                $success = $this->db->affected_rows(); 
                
                if(!$success){
                    error_log('Unable to updatePassword('.$post['user_id'].')');
                    return false;
                }        
                return true;
            } 

        public function getAll_Members()
        {
            $result=$this->db->select('*')
                    ->from('users','roles')
                    ->join('roles', 'roles.role_id=users.role','LEFT OUTER')
                    ->get()->result();

            return $result;
        }

        public function getAll_Roles()
        {
            $result=$this->db->select('*')
                    ->from('roles')
                    ->get()->result();

            return $result;
        }

        public function getbyId_User($id)
        {
            $result=$this->db->select('*')
                    ->from('users')
                    ->where('id',$id)
                    ->get()->row();

            unset($result->password);
            return $result;
        }
        
        public function update_member($id,$data)
        {
            

            $result=$this->db
                        ->where('id',$id)
                        ->update('users',$data);
            return $result;
        }

        public function delete_member($id)
        {
            $result=$this->db
                        ->delete('users',array('id' => $id));
            return $result;
        }   


        public function insert_tables($id,$email)
        {
            $data=array('users_id' =>$id , 
                        'firma_mail'=>$email );
            $result=$this->db->insert('tbl_firma', $data);
            $firma_id=$this->db->insert_id();
            
            $data1=array('firma_id' =>$firma_id);
            $result=$this->db->insert('tbl_resim', $data1);
            return $result;
        }
} 
