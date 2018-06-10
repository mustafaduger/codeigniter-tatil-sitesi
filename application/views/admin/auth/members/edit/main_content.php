 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">


        <?php echo $this->session->flashdata('flash_message'); ?>

      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Üye Düzenle</h3>
            </div>
            <!-- /.box-header -->
           
            <!-- form start -->
            <form action="<?php echo base_url('auth/updatemembers');?>" method="post" class="form-horizontal">
              <div class="box-body">
    
                <div class="form-group">
                  <label class="col-sm-2 control-label">Adı</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  name="first_name"  value="<?php echo ($result->first_name) ?>">
                    <?php echo form_error('first_name');?>

                    <input type="hidden" name="id" value="<?php echo ($result->id) ?>"> 
                    
                  </div>
                  
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Soyadı</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  name="last_name" value="<?php echo ($result->last_name) ?>" >
                    <?php echo form_error('last_name');?>
                  </div>
                  
                </div>
              
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  name="email" value="<?php echo ($result->email) ?>" >
                    <?php echo form_error('email');?> 
                  </div>
                  
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Grup</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="role">
                      <?php foreach(get_Roles() as $value){ 
                      if ($value->role_id==$result->role) 
                        {;?>
                      <option selected value="<?php echo $value->role_id;?>"><?php echo $value->name;?></option>
                        <?php }else{ ; ?>
                      <option value="<?php echo $value->role_id;?>"><?php echo $value->name;?></option>
                      <?php }}; ?>
                    </select>
                  </div>
                  <?php echo form_error('role'); ?>
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
    
