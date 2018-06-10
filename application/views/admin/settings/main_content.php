 <!-- Main content -->
    <section class="content">
     <div class="row">
      <div class="col-md-12 ">
        <?php echo $this->session->flashdata('login_error'); ?>
       
          <div class="box box-info" >
            <div class="box-header with-border">
              <h3 class="box-title">Ayarları Düzenleme</h3>
            </div>
           <!-- /.box-header -->
         
           
                <?php foreach ($result as $row) : ?>
                <!-- form start -->
                <form action="<?php echo base_url('settings_controller/update_settings_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
                  <div class="box-body">

                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Logo</label>
                      <div class="col-sm-6">
                         <img src="<?php echo base_url($row->logo);?>" class="profile-user-image image-responsive">
                        <p class="text-blue">Mevcut Logoyu değiştirmiyecekseniz seçim yapmayınız...</p>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Yeni Logo Yükleme</label>
                      <div class="col-sm-3">
                        <input type="file" name="image" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Site Adresi</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="url" value ="<?php echo $row->url;?>" > 
                        <input type="hidden" name="id" value="<?php echo $row->id;?>">
                      </div>
           
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Site Başlığı</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="title" value ="<?php echo $row->title;?>" > 
                      </div>
                    
                    </div>

                     <div class="form-group">
                      <label class="col-sm-2 control-label">Site Açıklaması</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="description" value ="<?php echo $row->description;?>" > 
                      </div>
                
                    </div>

                     <div class="form-group">
                      <label class="col-sm-2 control-label">Site Anahtar Kelimeleri</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="keywords" value ="<?php echo $row->keywords;?>" > 
                      </div>
                     
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Site Yazar Adı</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="author" value ="<?php echo $row->author;?>" > 
                      </div>
                     
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Telefon Numarası</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="telephon" value ="<?php echo $row->telephon;?>" > 
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">GSM Numarası</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="gsm" value ="<?php echo $row->gsm;?>" > 
                      </div>
                    
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Fax Numarası</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="fax" value ="<?php echo $row->fax;?>" > 
                      </div>
                   
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Mail Adresi</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="email" value ="<?php echo $row->email;?>" > 
                      </div>
                     
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Adres</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="adress" value ="<?php echo $row->adress;?>" > 
                      </div>
                     
                    </div>

                     <div class="form-group">
                      <label class="col-sm-2 control-label">İlçe</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="ilce" value ="<?php echo $row->ilce;?>" > 
                      </div>
                
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">İl</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="il" value ="<?php echo $row->il;?>" > 
                      </div>
                   
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Mesai Saatleri</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="mesai" value ="<?php echo $row->mesai;?>" > 
                      </div>
                  
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Google Recaptcha Api</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="recapctha" value ="<?php echo $row->recapctha;?>" > 
                      </div>
                  
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Google MAP Api</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="googlemap" value ="<?php echo $row->googlemap;?>" > 
                      </div>
                   
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Google Analystic</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="analystic" value ="<?php echo $row->analystic;?>" > 
                      </div>
                    
                    </div>

                     <div class="form-group">
                      <label class="col-sm-2 control-label">Facebook</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="facebook" value ="<?php echo $row->facebook;?>" > 
                      </div>
                   
                    </div>

                     <div class="form-group">
                      <label class="col-sm-2 control-label">Twitter</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="twitter" value ="<?php echo $row->twitter;?>" > 
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Youtube</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="youtube" value ="<?php echo $row->youtube;?>" > 
                      </div>
                  
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Google</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="google" value ="<?php echo $row->google;?>" > 
                      </div>
                    
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Mail Smtp Host</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="smtphost" value ="<?php echo $row->smtphost;?>" > 
                      </div>
                   
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Mail Adresiniz</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="smtpuser" value ="<?php echo $row->smtpuser;?>" > 
                      </div>
                     
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Mail Şifreniz</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="smtppassword" value ="<?php echo $row->smtppassword;?>" > 
                      </div>
                    
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Smpt Port</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control"  name="smtpport" value ="<?php echo $row->smtpport;?>" > 
                      </div>
                  
                    </div>
                    
                                   
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Açıklama</label>
                      <div class="col-sm-6">
                        <textarea name="description"  rows="8" cols="80" ><?php echo $row->description;?></textarea>
                      </div>
                    
                    </div>


                    </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                      <div class="form-group">
                        <div class="col-sm-8">
                     <button type="submit" class="btn btn-info pull-right">Güncelle</button>
                      </div>
                     </div>
                  </div>
                
                  <!-- /.box-footer -->
                </form>
              <?php endforeach;?>
           
           </div>
           
         </div>
        </div>
      
      
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->
    