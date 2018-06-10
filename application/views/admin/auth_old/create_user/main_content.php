 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">


     <?php if ($message): ?>
          <div class="alert alert-error alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <div id="infoMessage"><?php echo $message;?></div> 
         </div>  
        <?php endif ?>


      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Üye Ekle</h3>
            </div>
            <!-- /.box-header -->
       
            <!-- form start -->
            <form action="<?php echo base_url('auth/create_user');?>" method="post" class="form-horizontal">
              <div class="box-body">
                

                <div class="form-group">
                  <label class="col-sm-2 control-label">Adı</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  name="first_name"  value="<?php echo $this->input->post('first_name') ?>"> 
                  </div>
                  
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Soyadı</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  name="last_name" value="<?php echo $this->input->post('last_name') ?>" > 
                  </div>
                  
                </div>
              
                  <?php if ($identity_column!=='email'): ?>
                    <div class="form-group">
                                    <label class="col-sm-2 control-label">Identity</label>
                                    <div class="col-sm-6">
                                      <input type="text" class="form-control"  name="identity"  > 
                                      <?php echo form_error('identity'); ?>
                                      
                                    </div>
                                    
                                  </div>
                  <?php endif ?>

              
              
               <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  name="email"  > 
                  </div>
                  
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Telefon</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  name="phone"  value="<?php echo $this->input->post('phone') ?>"> 
                  </div>
                  
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Şifre</label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control"  name="password"  > 
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Şifre Tekrarı</label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control"  name="password_confirm"  > 
                  </div>
                </div>
          
            
                
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('auth'); ?>">Vazgeç</a>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
              </div>
              <!-- /.box-footer -->
            </form>
         </div>
          </div>
        
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->
    
