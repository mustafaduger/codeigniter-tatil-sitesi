 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">


        <?php echo $this->session->flashdata('flash_message'); ?>

      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Üye Ekle</h3>
            </div>
            <!-- /.box-header -->
       
            <!-- form start -->
            <form action="<?php echo base_url('auth/register');?>" method="post" class="form-horizontal">
              <div class="box-body">
                

                <div class="form-group">
                  <label class="col-sm-2 control-label">Adı</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  name="firstname"  value="<?php echo $this->input->post('firstname') ?>">
                    <?php echo form_error('firstname');?>
                    <input type="hidden" name="kayittipi" value="1"> 
                  </div>
                  
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Soyadı</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  name="lastname" value="<?php echo $this->input->post('lastname') ?>" >
                    <?php echo form_error('lastname');?>
                  </div>
                  
                </div>
              
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  name="email"  >
                    <?php echo form_error('email');?> 
                  </div>
                  
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Grup</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="role">
                      <option >Grup Seçiniz</option>
                      <?php foreach (get_Roles() as $value) {;?>
                        <option value="<?php echo $value->role_id?>"><?php echo $value->name; ?></option>
                      <?php } ?>
                    </select>

                    <?php echo form_error('role');?> 
                  </div>
                  
               </div>
                    
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('auth/members_controller'); ?>">Vazgeç</a>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
              </div>
              <!-- /.box-footer -->
            </form>
         </div>
          </div>
        
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->
    
