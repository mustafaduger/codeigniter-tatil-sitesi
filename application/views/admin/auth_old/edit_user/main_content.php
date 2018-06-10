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
              <h3 class="box-title">Üye Düzenle</h3>
            </div>
            <!-- /.box-header -->
       
            <!-- form start -->
            <form action="<?php echo base_url('auth/edit_user/'.$user->id.'');?>" method="post" class="form-horizontal">
              <div class="box-body">
                

                <div class="form-group">
                  <label class="col-sm-2 control-label">Adı</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  name="first_name"  value="<?php echo $user->first_name ?>"> 
                    <?php echo form_input($user->first_name);?>
                    
                  </div>
                  
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Soyadı</label>
                  <div class="col-sm-4">
                    <?php echo form_input($user->last_name);?> 
                  </div>
                  
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Firma Adı</label>
                  <div class="col-sm-4">
                    <?php echo form_input($user->company);?>
                  </div>
                  
                </div>
                            
              
              

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Telefon</label>
                  <div class="col-sm-4">
                    <?php echo form_input($user->phone);?>
                  </div>
                  
                </div>

                <?php if ($this->ion_auth->is_admin()): ?>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Grup</label>
                  <div class="col-sm-4">
                     <?php echo form_dropdown('',$get_all_users_group,$user->usertype,$usertype);?>
                  </div>
                </div>
              <?php endif?>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Şifre</label>
                  <div class="col-sm-4">
                     <?php echo form_input($user->password);?>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Şifre Tekrarı</label>
                  <div class="col-sm-4">
                    <?php echo form_input($password_confirm);?>
                  </div>
                </div>
            
                <?php echo form_hidden('id', $user->id);?>
                <?php echo form_hidden($csrf); ?>
                
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
    
